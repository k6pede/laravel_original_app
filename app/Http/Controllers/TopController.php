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
    private $eventService;
    private $datesService;
    private $calendarService;

    public function __construct(CharacterService $characterService, DatesService $datesService, EventService $eventService, CalendarService $calendarService)
    {
        $this->characterService = $characterService;
        $this->datesService = $datesService;
        $this->eventService = $eventService;
        $this->calendarService = $calendarService;
    }
    
    public function top(Request $request) {
        

        //日付を取得　指定された日付がなければ現在の日時
        list($now, $month, $year, $day) = $this->datesService->getDate($request);

        $auths = Auth::user();
                    
        //キャラクター情報の取得
        $characters = $this->characterService->getCharactersByDate($request);
        
        //カレンダーの表示に必要な情報を取得
        list($dates, $date, $dateStr, $nextMonth, $lastMonth, $nextYear, $lastYear, $eto) = $this->calendarService->calcCalendar($year,$month);
        
        //祝日情報を取得
        $holidaysInCurrentMonth = $this->calendarService->getHolidays($year, $month);
        
        //ユーザ別当月のスケジュールを取得
        $events = $this->eventService->getEvents($year, $month);

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
