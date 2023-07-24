<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EventService;
use App\Services\CalendarService;
use App\Services\CharacterService;
use App\Services\DatesService;

class TopController extends Controller
{
    private $characterService;

    public function __construct(CharacterService $characterService)
    {
        $this->characterService = $characterService;
    }
    
    public function top(Request $request) {
        

        //日付を取得　指定された日付がなければ現在の日時
        list($now, $month, $year, $day) = DatesService::getDate($request);

        $auths = Auth::user();
                    
        //キャラクター情報の取得
        $characters = $this->characterService->getCharactersByDate($request);
        
        //カレンダーの計算
        list($dates, $date, $count, $addDay, $dateStr, $nextMonth, $lastMonth, $nextYear, $lastYear, $eto) = CalendarService::calcCalendar($year,$month);
        
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
            "nextYear" => $nextYear,
            "lastYear" => $lastYear,
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
