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
    

    //ユーザオリジナルのイベント作成
    public function createUsersEvent(Request $request){

        $request->validate([
            'start_at_ymd' =>'required',
            'title' => 'required|max:100',
        ]);

        EventService::createEvent($request);
        return redirect('/')->with('success','登録しました。');
    }

    //キャラクターの誕生日から追加
    public function addEventFromCharactersInfo(Request $request){

        EventService::addEventFromCharactersInfo($request);
        return redirect('/')->with('success','登録しました。');

    }

    //既存イベントの編集
    public function editEvent(Request $request){

        $request->validate([
            'title' => 'required|max:50',
            'start_at_ymd' =>'required',
        ]);
        EventService::editEvent($request);
        return redirect('/')->with('success','変更を保存しました。');

        
    }

    //既存イベントの削除
    public function deleteEvent(Request $request){
        EventService::deleteEvent($request);
    }



}
