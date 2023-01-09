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
        
        // sprintf('文字列と型指定子を組み合わせたフォーマット','生成する文字列のもと')https://www.sejuku.net/blog/24090
        // $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        // dd($month);

        $addDay = ($date->copy()->endOfMonth()->isSunday()) ? 7 : 0;
        $date->subDay($date->dayOfWeek);
        $currentMonth = $date->month;

        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count /7) * 7;
        $dates = [];

        for($i=0;$i<$count;$i++, $date->addDay()) {
            $dates[] = $date->copy();
        }
     
        return view('top')->with([
            "characters" => $characters,
            "month" =>$month,
            "dates" => $dates
        ]);
    }

    
    
}
