<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;

class EventService
{
    public static function getEvents($year, $month)
    {
      
        $user_id = Auth::id();
        $setYear = $year;
        $setMonth = $month;
        $FirstDayOfMonth = Carbon::create($setYear, $setMonth, 1)->firstOfMonth();
        $LastDayOfMonth  = Carbon::create($setYear, $setMonth, 1)->lastOfMonth();


        $events = EventRepository::getSpecifiedEvents($user_id, $FirstDayOfMonth, $LastDayOfMonth);
        return $events;
    }

    public static function addEventFromCharactersInfo(Request $request) {

        $now = Carbon::now();

        if(!empty($request->year)) {
            $year = $request->year;  
            $year = $now->year;
        }else {
            $year = $now->year;
        }
        $month = $request->month;
        $day = $request->day;
        
        $user_id = Auth::id();
        if(!empty($request->character_id)){
            $character_id = $request->character_id;
        }else{
            $character_id = null;
        }
        $start_at = Carbon::create($year, $month, $day, 0, 0, 0);
        $end_at = null;
        $title = $request->event_title;
        if($character_id !== null){
            $description = $title . 'の誕生日です。';
        }else{
            $description = null;
        }
        
        EventRepository::addCharactersEvent($user_id, $character_id, $start_at, $end_at, $title, $description);
    }

    
}