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
use App\Services\EventService;
use App\Services\CalendarService;
use App\Services\CharacterService;
use App\Services\DatesService;

class TopController extends Controller
{
    
    public function top(Request $request) {
        
        // $now = Carbon::now();
        // if(empty($request->year)) {
        //     $year = $now->year;
        // }else{
        //     $year = $request->year;
        // }
        // $year = $now->year;
        // $month = $request->month;
        // $day = $request->day;
        // if(empty($request->month)) {
        //     $month = $now->month;
        // }
        // if(empty($request->day)){
        //     $day = $now->day;
        // }


        //日付を取得　指定された日付がなければ現在の日時
        list($now, $month, $year, $day) = DatesService::getDate($request);

        
        $auths = Auth::user();
                    
        //キャラクター情報の取得
        $characters = CharacterService::getCharactersByDate($request);
        
        //カレンダーの計算
        list($dates, $date, $count, $addDay, $dateStr, $nextMonth, $lastMonth, $currentMonth, $eto) = CalendarService::calcCalendar($year,$month);

        //祝日判定
        $holidaysInCurrentMonth = CalendarService::getHolidays($year, $month);

        //当月の登録されたイベントコレクション
        $events = EventService::getEvents($year, $month);

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
            "dateStr" => $dateStr,
            "holidaysInCurrentMonth" => $holidaysInCurrentMonth,
            "eto" => $eto,
            "auths" =>$auths,
            "events" => $events,
        ]);
    }


    
    
}
