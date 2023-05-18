<?php

namespace App\Services;

use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;
use JpCarbon\JpCarbon;

class CalendarService{

    public static function calcCalendar($year,$month)
    {
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
            
        // $nextMonth = (new Carbon($dateStr))->addMonthsNoOverflow()->format("Y-m-d");
        $nextMonth = (new Carbon($dateStr))->addMonthsNoOverflow();
        $lastMonth = (new Carbon($dateStr))->subMonthsNoOverflow();
            
        $date = new Carbon($dateStr);

        $addDay = ($date->copy()->endOfMonth()->isSunday()) ? 7 : 0;
        $date->subDay($date->dayOfWeek);
            
        


        //日数の計算
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count /7) * 7;
        $dates = [];
        for($i=0;$i<$count;$i++, $date->addDay()) {
            $dates[] = $date->copy();
        }

        //干支判定
        $eto = JpCarbon::createFromDate($year)->eto;         

        return [$dates, $date, $count, $addDay, $dateStr, $nextMonth, $lastMonth, $eto];
    }


    public static function getHolidays($year,$month)
    {
        //祝日の取得
        $setYear = $year;
        $setMonth = $month;

        $FirstDayOfMonth = Carbon::create($setYear, $setMonth, 1)->firstOfMonth();
        $LastDayOfMonth  = Carbon::create($setYear, $setMonth, 1)->lastOfMonth();

      
        $holidays = Yasumi::create('Japan',$year,'ja_JP');
        $holidaysInCurrentMonth = $holidays->between(
            new DateTime($FirstDayOfMonth.$year),
            new DateTime($LastDayOfMonth.$year)
        );
        
        return $holidaysInCurrentMonth;
    }
  
}