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

    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getEvents($year, $month)
    {
        $user_id = Auth::id();
        $setYear = $year;
        $setMonth = $month;

        $FirstDayOfMonth = Carbon::create($setYear, $setMonth, 1)->firstOfMonth();
        $LastDayOfMonth  = Carbon::create($setYear, $setMonth, 1)->lastOfMonth();

        $unprocessedEvents = $this->eventRepository->getEvents($user_id, $FirstDayOfMonth, $LastDayOfMonth);
        $events = [];
        foreach ($unprocessedEvents as $event) {
            $startAt = $event['start_at'];
            $dateTime = Carbon::parse($startAt);
            $dateTimeWithoutSeconds = $dateTime->format('Y-m-d H:i');
            $event['year'] = $dateTime->year;
            $event['month'] = $dateTime->month;
            $event['day'] = $dateTime->day;
            $event['start_at'] = $dateTimeWithoutSeconds;
            $events[] = $event;
        }
        return $events;
    }

    public function addEventFromCharactersInfo(Request $request) {

        $now = Carbon::now();

        //クエリパラメータから日付を生成する
        //デフォルトでは現在の日時になる
        $year = $request->input('year', $now->year);
        $month = $request->input('month', $now->month);
        $day = $request->input('day', $now->day);
   
        $user_id = Auth::id();
        $character_id = $request->input('character_id', null);
        $start_at = Carbon::create($year, $month, $day, 0, 0, 0);
        $end_at = null;
        $title = $request->event_title;
        $description = $character_id !== null? $title . 'の誕生日です。' : null;
        
        // if($character_id !== null){
        //     $description = $title . 'の誕生日です。';
        // }else{
        //     $description = null;
        // }
        
        $this->eventRepository->addCharactersEvent($user_id, $character_id, $start_at, $end_at, $title, $description);
    }

    public function createEvent(Request $request) {

        $user_id = Auth::id();
        
        //開始時間 required
        $start_at_time = $request->start_at_hm ? $request->start_at_hm : '00:00';
        $start_at = Carbon::createFromFormat('Y-m-d H:i', "{$request->start_at_ymd} {$start_at_time}");

        //終了時間　nullable
        $end_at = null;
        if(!empty($request->end_at_ymd)) {
            $end_at_time = !empty($request->end_at_hm) ? $request->end_at_hm : '00:00';
            $end_at = Carbon::createFromFormat('Y-m-d H:i', "{$request->end_at_ymd} {$end_at_time}");
        }
        // $end_at = null;
        // if(!empty($request->end_at_ymd)){
        //     $end_ymd = $request->end_at_ymd;
        //     if(!empty($request->end_at_hm)){
        //         $end_hm = $$request->end_at_hm;
        //     }else{
        //         $end_hm = '00:00';
        //     }
        //     $end_at = Carbon::createFromFormat('Y-m-d H:i', $end_ymd.' '.$end_hm);
        // }


        $title = $request->title;

        //イベント詳細 nullable
        $description = $request->description;

        $this->eventRepository->createEvent($user_id, $start_at, $end_at, $title, $description);
    }

    public function editEvent(Request $request) {

        $inputs = $request->all();
        $event_id = $request->inputs('event_id');
        $user_id = Auth::id();
        $title = $request->inputs('title');
        $character_id = $request->input('character_id', null);


        //$start_ymd = $inputs['start_at_ymd'];
        // if(!empty($inputs['start_at_hm'])) {
        //     $start_hm = $inputs['start_at_hm'];           
        // }else{
        //     $start_hm = '00:00';
        // }
        //$start_at = Carbon::createFromFormat('Y-m-d H:i', $start_ymd.' '.$start_hm);
        $start_at_time = $request->start_at_hm ? $request->start_at_hm : '00:00';
        $start_at = Carbon::createFromFormat('Y-m-d H:i', "{$request->start_at_ymd} {$start_at_time}");

        //終了時間　nullable
        $end_at = null;
        if(!empty($request->end_at_ymd)) {
            $end_at_time = !empty($request->end_at_hm) ? $request->end_at_hm : '00:00';
            $end_at = Carbon::createFromFormat('Y-m-d H:i', "{$request->end_at_ymd} {$end_at_time}");
        }
        
        // if(!empty($inputs['end_at_ymd'])){
        //     $end_ymd = $inputs['end_at_ymd'];
        //     if(!empty($inputs['end_at_hm'])){
        //         $end_hm = $inputs['end_at_hm'];
        //     }else{
        //         $end_hm = '00:00';
        //     }
        //     $end_at = Carbon::createFromFormat('Y-m-d H:i', $end_ymd.' '.$end_hm);
        // }else{
        //     $end_at = null;
        // }
  
        $description = $inputs['description'];
        $this->eventRepository->editEvent($event_id, $user_id, $character_id, $start_at, $end_at, $title, $description);
    }
    
    public function deleteEvent(Request $request) {

        $event_id = $request->input('event_id');
        $user_id = Auth::id();      
        $event = Event::where('id',$event_id)->where('user_id',$user_id);
        $this->eventRepository->deleteEvent($event);

    }
    
}