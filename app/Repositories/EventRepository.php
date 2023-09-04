<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EventRepository
{
  // public function countEvents($user_id) 
  // {
  //   $counts = Event::where('user_id', $user_id)->count();
  //   return $counts;
  // }

  //ユーザ別のイベントの取得
  public function getEvents($user_id, $FirstDayOfMonth, $LastDayOfMonth)
  {
    //当月の登録されたイベントコレクション
    $events = Event::where('user_id' , $user_id)
                    ->whereBetween('start_at',[$FirstDayOfMonth, $LastDayOfMonth])
                    ->orderBy('start_at')
                    ->get();
    
    return $events;
  }


  //キャラクターの誕生日イベントの作成
  public function addCharactersEvent($user_id, $character_id, $start_at, $end_at, $title, $description) {
    Event::create([
      'user_id' => $user_id,
      'character_id' => $character_id,
      'start_at' => $start_at,
      'end_at' => $end_at,
      'title' => $title,
      'description' => $description,

    ]);
  }

  public function createEvent($user_id, $start_at, $end_at, $title, $description) {

    Event::create([

      'user_id' => $user_id,
      'start_at' => $start_at,
      'end_at' => $end_at,
      'title' => $title,
      'description' => $description,

    ]);
  }

  //イベントの編集
  public function editEvent($event_id, $user_id, $character_id, $start_at, $end_at, $title, $description) {
    $event = Event::where('id',$event_id)->first();
    $event->update([

      'character_id' => $character_id,
      'user_id' => $user_id,
      'start_at' => $start_at,
      'end_at' => $end_at,
      'title' => $title,
      'description' => $description,

    ]);   
  }

  public function deleteEvent($event) {
    $event->delete();
  }
}