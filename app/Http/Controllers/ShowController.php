<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Event;
use App\Models\Admin;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;
use JpCarbon\JpCarbon;
use Illuminate\Support\Facades\Auth;
use App\Services\TopService;
use App\Services\CalendarService;
use App\Services\CharacterService;
use App\Services\DatesService;

class ShowController extends Controller
{
    //
    public function show(Request $request){

        //日付を取得　指定された日付がなければ現在の日時
        list($now, $month, $year, $day) = DatesService::getDate($request);
        
        $title = $request->title;
        $characters = CharacterService::getCharactersFromTitle($request);
        
        
        return view('show')->with([
            "characters" => $characters,
            "title" => $title,
            "now" => $now,
            "month" => $month,
            "day" => $day,
 
        ]);
    }

    
}
