<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Event;
use App\Models\Admin;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;
use JpCarbon\JpCarbon;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    //
    
    
    public function top(Request $request) {
        
        $now = Carbon::now();
        if(empty($request->year)) {
            $year = $now->year;
        }else{
            $year = $request->year;
        }
        $year = $now->year;

        $month = $request->month;
        $day = $request->day;
        $sort = $request->sort;
        $auths = Auth::user();
        $user_id = Auth::id();
        
            
        if(empty($month) || empty($day)){
            $month = $now->month;
            $day = $now->day;
            $characters = Character::where('month', $month)->where('day', $day)->orderBy('ruby','asc')->paginate(30);
            
        }
        else{
            
            $characters = Character::where('month', $month)->where('day', $day)->orderBy('ruby','asc')->paginate(30);             
            
        }
        
        
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        
        // $nextMonth = (new Carbon($dateStr))->addMonthsNoOverflow()->format("Y-m-d");
        $nextMonth = (new Carbon($dateStr))->addMonthsNoOverflow();
        $lastMonth = (new Carbon($dateStr))->subMonthsNoOverflow();
        
        $date = new Carbon($dateStr);

        $addDay = ($date->copy()->endOfMonth()->isSunday()) ? 7 : 0;
        $date->subDay($date->dayOfWeek);
        $currentMonth = $date->month;
        


        //日数の計算
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count /7) * 7;
        $dates = [];
        for($i=0;$i<$count;$i++, $date->addDay()) {
            $dates[] = $date->copy();
        }

        //祝日判定
        $setYear = $year;
        $setMonth = $month;

        $FirstDayOfMonth = Carbon::create($setYear, $setMonth, 1)->firstOfMonth();
        $LastDayOfMonth  = Carbon::create($setYear, $setMonth, 1)->lastOfMonth();

       
        $holidays = Yasumi::create('Japan',$year,'ja_JP');
        $holidaysInCurrentmonth = $holidays->between(
            new DateTime($FirstDayOfMonth.$year),
            new DateTime($LastDayOfMonth.$year)
        );
        
        //干支判定
        $eto = JpCarbon::createFromDate($year)->eto; 

        //当月の登録されたイベントコレクション
        $events = Event::where('user_id' , $user_id)
                        ->whereBetween('start_at',[$FirstDayOfMonth, $LastDayOfMonth])
                        ->get();
        
        

       
        return view('top')->with([
            "characters" => $characters,
            "now" => $now,
            "year" => $year,
            "month" => $month,
            "day" => $day,
            "nextMonth" => $nextMonth,
            "lastMonth" => $lastMonth,
            "date" => $date,
            "dates" => $dates,
            "holidaysInCurrentMonth" => $holidaysInCurrentmonth,
            "eto" => $eto,
            "dateStr" => $dateStr,
            "auths" =>$auths,
            "events" => $events,
        ]);
    }

    // public function getData()
    // {
    //     return response()->json();
    // }

    
    
}
