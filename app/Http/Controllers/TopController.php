<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Carbon\Carbon;

class TopController extends Controller
{
    //
    
    public function top(Request $request) {
        $date = Carbon::now();
        if(empty($request->month) || empty($request->day)){
            $characters = Character::where('month', $date->month)->where('day', $date->day)->paginate(30);
        }
        else{
            $characters = Character::where('month', $request->month)->where('day', $request->day)->paginate(30);
        }
        
        

        return view('top')->with([
            "characters" => $characters,
        ]);
        
    }

    // public function getCalendarDates($year,$month) {
    //     $date = Carbon::now();
    //     if(empty($year) || empty($month)){
    //         $dateStr = sprintf($date->$today);
    //     }
    //     else{
    //         $dateStr = sprintf('%04d-%02d-01', $year, $month);
    //     }
    //     // sprintf('文字列と型指定子を組み合わせたフォーマット','生成する文字列のもと')https://www.sejuku.net/blog/24090
    //     // $dateStr = sprintf('%04d-%02d-01', $year, $month);
    //     $date = new Carbon($dateStr);

    //     $date->subDay($date->dayOfWeek);
    //     $currentMonth = $date->month;

    //     $count = 31 + $date->dayOfWeek;
    //     $count = ceil($count /7) * 7;
    //     $dates = [];

    //     for($i=0;$i<$count;$i++, $date->addDay()) {
    //         $dates[] = $date->copy();
    //     }

    //     return view('calendar')->with([
    //         "dates" => $dates,
    //         "currentMonth" =>$currentMonth
    //     ]);
    // }

    
    
}
