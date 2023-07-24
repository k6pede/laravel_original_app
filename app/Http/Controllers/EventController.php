<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Repositories\EventRepository;
use App\Services\EventService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    private $eventService;
    
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    //ユーザオリジナルのイベント作成
    public function createUsersEvent(Request $request){

        $request->validate([
            'start_at_ymd' =>'required',
            'title' => 'required|max:100',
        ]);

        $this->eventService->createEvent($request);
        return redirect('/')->with('success','登録しました。');
    }

    //キャラクターの誕生日から追加
    public function addEventFromCharactersInfo(Request $request){

        $this->eventService->addEventFromCharactersInfo($request);
        return redirect('/')->with('success','登録しました。');

    }

    //既存イベントの編集
    public function editEvent(Request $request){

        $request->validate([
            'title' => 'required|max:50',
            'start_at_ymd' =>'required',
        ]);
        $this->eventService->editEvent($request);
        return redirect('/')->with('success','変更を保存しました。');

        
    }

    //既存イベントの削除
    public function deleteEvent(Request $request){
        $this->eventService->deleteEvent($request);
    }



}
