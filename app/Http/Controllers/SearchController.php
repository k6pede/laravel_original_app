<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function search(Request $request) {

        $now = Carbon::now();
        $year = $now->year();
        $month = $request->month;
        $day = $request->day;

        if(!empty($_REQUEST['c'])){
            $searchWord = $_REQUEST['c'];
            $characters = Character::where('name','LIKE','%'. $searchWord .'%')->paginate(30);
        }
        if(!empty($_REQUEST['t'])){
            $searchWord = $_REQUEST['t'];
            $characters = Character::where('title','LIKE','%'. $searchWord .'%')->paginate(30);
        }
        if(!empty($_REQUEST['v'])){
            $searchWord = $_REQUEST['v'];
        }
        if(!empty($request->search)){
            $searchWord  = $request->search;
            $characters = Character::where('title','LIKE','%'. $searchWord .'%')->paginate(30);
        }

        $result = $searchWord;
     
        return view('search')->with([
            "result"=> $result,
            "characters"=> $characters,
            "month"=> $month,
            "day"=> $day,
            "now"=> $now,
            "year"=> $year
        ]);
    }


}
