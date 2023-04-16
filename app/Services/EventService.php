<?php

namespace App\Services;

use App\Models\Event;
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

    
}