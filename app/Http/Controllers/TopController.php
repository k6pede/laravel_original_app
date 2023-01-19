<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Carbon\Carbon;

class TopController extends Controller
{
    //
    
    public function top(Request $request) {

        $now = Carbon::now();
        $year = $now->year;
        $month = $request->month;
        $day = $request->day;
            
        if(empty($month) || empty($day)){
            $month = $now->month;
            $day = $now->day;
            $characters = Character::where('month', $month)->where('day', $day)->paginate(30);
        }
        else{
            $characters = Character::where('month', $month)->where('day', $day)->paginate(30);
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
     
        return view('top')->with([
            "characters" => $characters,
            "now" =>$now,
            "month" =>$month,
            "day" =>$day,
            "nextMonth" =>$nextMonth,
            "lastMonth" =>$lastMonth,
            "dates" => $dates
        ]);
    }

    // public function getData()
    // {
    //     return response()->json();
    // }

    
    
}
