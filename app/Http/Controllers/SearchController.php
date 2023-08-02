<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Event;
use App\Services\CharacterService;
use App\Services\DatesService;
use App\Services\EventService;
use App\Services\CalendarService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    private $characterService;
    private $datesService;
    private $calendarService;
    private $eventService;

    public function __construct(CharacterService $characterService, DatesService $datesService, CalendarService $calendarService, EventService $eventService)
    {
        $this->characterService = $characterService;
        $this->datesService = $datesService;
        $this->calendarService = $calendarService;
        $this->eventService = $eventService;
    }

    public function search(Request $request) {

        //日付を取得　指定された日付がなければ現在の日時
        list($now, $month, $year, $day) = $this->datesService->getDate($request);

        list($characters, $searchWord) = $this->characterService->getCharactersBySearchWord($request);
        $result = $searchWord;

        $auths = Auth::user();

        //カレンダーの計算
        list($dates, $date, $dateStr, $nextMonth, $lastMonth, $nextYear, $lastYear, $eto) = $this->calendarService->calcCalendar($year,$month);
        //祝日判定
        $holidaysInCurrentMonth = $this->calendarService->getHolidays($year, $month);
        //当月の登録されたイベントコレクション
        $events = $this->eventService->getEvents($year, $month);
     
        return view('search')->with([
            "result"=> $result,
            "characters"=> $characters,
            "now" => $now,
            "year"=> $year,
            "month"=> $month,
            "day"=> $day,
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
