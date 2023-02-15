<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function eventAdd(Request $request){

        // $request->validate([
        //     'start_date' =>'required|integer',
        //     'end_date' => 'required|integer',
        //     'event_name' => 'required|max:100',
        // ]);

        

        //登録処理
        $event = new Event;
        $event->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $event->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $event->event_name = $request->input('event_name');
        $event->save();

        return;

    }


}
