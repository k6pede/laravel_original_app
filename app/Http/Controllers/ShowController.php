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

class ShowController extends Controller
{
    //
    public function show(Request $request){

        $now = Carbon::now();
        $year = $now->year;       
        $month = $request->month;
        $day = $request->day;
        $sort = $request->sort;
        $auths = Auth::user();
        $user_id = Auth::id();
        
            
        
        
        
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
        $name = $request->name;
        $title = $request->title;
        $characters = Character::where('title',$title)->paginate(50);
  

        
        return view('show')->with([
            "characters" => $characters,
            "now" => $now,
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
            "title" => $title,
        ]);
    }

    
}
