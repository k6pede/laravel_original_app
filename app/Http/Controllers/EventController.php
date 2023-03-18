<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;
use JpCarbon\JpCarbon;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{


    //ユーザオリジナルのイベント作成
    public function createEvent(Request $request){

        $inputs = $request->all();
        $user_id = Auth::id();
        $title = $inputs['title'];

        //開始時間 required
        $start_ymd = $inputs['start_at_ymd'];
        $start_hm = $inputs['start_at_hm'];
        if($start_hm == null){
            $start_hm = 0000;
        }
        $start_at = Carbon::createFromFormat('Y-m-d H:i:s', $start_ymd.' '.$start_hm.':00');

        //終了時間　nullable
        if(!empty($inputs['end_at_ymd'])){
            $end_ymd = $inputs['end_at_ymd'];
            if(!empty($inputs['end_at_hm'])){
                $end_hm = $inputs['end_at_hm'];
            }else{
                $end_hm = '00:00:00';
            }
            $end_at = Carbon::createFromFormat('Y-m-d H:i:s', $end_ymd.' '.$end_hm.':00');
        }else{
            $end_at = null;
        }

        //イベント詳細 nullable
        $description = $inputs['description'];

        Event::create([

            'user_id' => $user_id,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'title' => $title,
            'description' => $description,

        ]);
    }

    //キャラクターの誕生日から追加
    public function addEvent(Request $request){

        
        $now = Carbon::now();
    
        $year = $now->year;
        $month = $request->month;
        $day = $request->day;
        
        $user_id = Auth::id();
        if(!empty($request->character_id)){
            $character_id = $request->character_id;
        }else{
            $character_id = null;
        }
        $start_at = Carbon::create($year, $month, $day, 0, 0, 0);
        // $end_at = Carbon::create($year, $month, $day, 23, 59, 59);
        $end_at = null;
        $title = $request->eventName;
        if($character_id !== null){
            $description = $title . 'の誕生日です。';
        }else{
            $description = null;
        }

        //登録処理
        Event::create([
            'user_id' => $user_id,
            'character_id' => $character_id,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'title' => $title,
            'description' => $description,

        ]);
        

    }

    public function editEvent(Request $request){

        // $request->validate([
        //     'start_at' =>'required',
        //     'title' => 'required|max:100',
        // ]);
        $inputs = $request->all();
        $event_id = $inputs['event_id'];
        $user_id = Auth::id();
        $title = $inputs['title'];
        if(!empty($request->character_id)){
            $character_id = $request->character_id;
        }else{
            $character_id = null;
        }

        $start_ymd = $inputs['start_at_ymd'];
        $start_hm = $inputs['start_at_hm'];
        if($start_hm == null){
            $start_hm = 0000;
        }
        $start_at = Carbon::createFromFormat('Y-m-d H:i:s', $start_ymd.' '.$start_hm);

        if(!empty($inputs['end_at_ymd'])){
            $end_ymd = $inputs['end_at_ymd'];
            if(!empty($inputs['end_at_hm'])){
                $end_hm = $inputs['end_at_hm'];
            }else{
                $end_hm = '00:00:00';
            }
            $end_at = Carbon::createFromFormat('Y-m-d H:i:s', $end_ymd.' '.$end_hm);
        }else{
            $end_at = null;
        }

    
        $description = $inputs['description'];

        $event = Event::where('id',$event_id);
        $event->update([

            'character_id' => $character_id,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'title' => $title,
            'description' => $description,

        ]);
      
    }

    public function deleteEvent(Request $request){
        $event_id = $request->input('event_id');
        $user_id = Auth::id();
        
        $event = Event::where('id',$event_id)->where('user_id',$user_id);
        $event->delete();
    }



}
