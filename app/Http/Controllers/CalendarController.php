<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function getCalendarDates($year,$month) {
        $date_now = Carbon::now();
        if(empty($year) || empty($month)){
            $dateStr = sprintf($date_now->$today);
        }
        else{
            $dateStr = sprintf('%04d-%02d-01', $year, $month);
        }
        // sprintf('文字列と型指定子を組み合わせたフォーマット','生成する文字列のもと')https://www.sejuku.net/blog/24090
        // $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);

        $date->subDay($date->dayOfWeek);
        $currentMonth = $date->month;

        $count = 31 + $date->dayOfWeek;
        $count = ceil($count /7) * 7;
        $dates = [];

        for($i=0;$i<$count;$i++, $date->addDay()) {
            $dates[] = $date->copy();
        }

        return view('calendar')->with([
            "dates" => $dates,
            "currentMonth" =>$currentMonth
        ]);
    }
}
