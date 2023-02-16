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
    //
    public function eventAdd(Request $request){

        // $request->validate([
        //     'start_date' =>'required|integer',
        //     'end_date' => 'required|integer',
        //     'event_name' => 'required|max:100',
        // ]);
        $user_id = Auth::id();
        
        $now = Carbon::now();

        $year = $now->year;
        $month = $request->month;
        $day = $request->day;
        $event_name = $request->eventName;

        
        $start_date = Carbon::create($year, $month, $day, 0, 0, 0);
        $end_date = Carbon::create($year, $month, $day, 24, 0, 0);

        

        //登録処理
        Event::create([
            'user_id' => $user_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'event_name' => $event_name,
        ]);
        // $event = new Event;
        // $event->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        // $event->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        // $event->event_name = $request->input('event_name');
        // $event->save();

        return;

    }


}
