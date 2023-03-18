<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EventRepository
{
  public static function getSpecifiedEvents($year,$month)
  {
    //当月の登録されたイベントコレクション
    $user_id = Auth::id();
    $setYear = $year;
    $setMonth = $month;

    $FirstDayOfMonth = Carbon::create($setYear, $setMonth, 1)->firstOfMonth();
    $LastDayOfMonth  = Carbon::create($setYear, $setMonth, 1)->lastOfMonth();

    $events = Event::where('user_id' , $user_id)
    ->whereBetween('start_at',[$FirstDayOfMonth, $LastDayOfMonth]);
    

    return $events;
  }
}