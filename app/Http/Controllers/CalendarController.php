<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function getCalendarDates(Request $request) {
       $now = Carbon::now();
       $year = $now->year;
       $month = $request->month;
        if(empty($month)){
            $month = $now->month;
        }
        
        if(empty($year) || empty($month)){    
            $year = $now->year;
            $day = $now->day;
            $dateStr = sprintf('%04d-%02d-01d', $year, $month);
            $date = new Carbon($dateStr);
        }
        else{
            $dateStr = sprintf('%04d-%02d-01', $year, $month);
            $date = new Carbon($dateStr);
        }
        
        $addDay = ($date->copy()->endOfMonth()->isSunday());
        $date->subDay($date->dayOfWeek);
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count /7) * 7;
        $dates = [];

        for($i=0;$i<$count;$i++, $date->addDay()) {
            $dates[] = $date->copy();
        }


        //一ヶ月前
        // $sub = Carbon::createFromDate($date->year,$date->month,$date->month,$date->day);
        // $subMonth = $sub->subMonth();
        // $subY = $subMonth->year;
        // $subM = $subMonth->month;
        return response()->json(['dates' => $dates]);

        return view('calendar')->with([
            "dates" => $dates,
            "now" =>$now,
            "dateStr" =>$dateStr
        ]);
    }
}
