<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EventRepository
{
  //ユーザ別のイベントの取得
  public static function getSpecifiedEvents($user_id, $FirstDayOfMonth, $LastDayOfMonth)
  {
    //当月の登録されたイベントコレクション
    $events = Event::where('user_id' , $user_id)
                    ->whereBetween('start_at',[$FirstDayOfMonth, $LastDayOfMonth])
                    ->get();
    
    return $events;
  }


  //キャラクターの誕生日イベントの作成
  public static function addCharactersEvent($user_id, $character_id, $start_at, $end_at, $title, $description) {
    Event::create([
      'user_id' => $user_id,
      'character_id' => $character_id,
      'start_at' => $start_at,
      'end_at' => $end_at,
      'title' => $title,
      'description' => $description,

    ]);
  }
}