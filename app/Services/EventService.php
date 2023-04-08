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
      $events = EventRepository::getSpecifiedEvents($year,$month)->get();
      return $events;
    }

    
}