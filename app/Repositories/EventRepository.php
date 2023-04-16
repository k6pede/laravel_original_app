<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EventRepository
{
  public static function getSpecifiedEvents($user_id, $FirstDayOfMonth, $LastDayOfMonth)
  {
    //当月の登録されたイベントコレクション
    $events = Event::where('user_id' , $user_id)
                    ->whereBetween('start_at',[$FirstDayOfMonth, $LastDayOfMonth])
                    ->get();
    
    return $events;
  }
}