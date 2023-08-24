<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EventService;
use App\Services\CalendarService;
use App\Services\CharacterService;
use App\Services\DatesService;

class ShowController extends Controller
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
    //
    public function show(Request $request){

        //日付を取得　指定された日付がなければ現在の日時
        list($now, $month, $year, $day) = $this->datesService->getDate($request);
        
        $title = $request->title;
        $characters = $this->characterService->getCharactersFromTitle($request);

        $auths = Auth::user();

        //カレンダーの計算
        list($dates, $date, $dateStr, $nextMonth, $lastMonth, $nextYear, $lastYear, $eto) = $this->calendarService->calcCalendar($year,$month);

        //祝日判定
        $holidaysInCurrentMonth = $this->calendarService->getHolidays($year, $month);

        //
        $events = $this->eventService->getEvents($year, $month);
        
        
        return view('show')->with([
            "title" => $title,
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
