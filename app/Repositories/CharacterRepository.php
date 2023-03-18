<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterRepository
{
  //日付関連の命名
  //getCharactersByDate
  //get...
  public static function getCharactersByDate(Request $request)
  {
    $now = Carbon::now();
    
    $month = $request->month;
    $day = $request->day;
    if(empty($month) || empty($day)){
      $month = $now->month;
      $day = $now->day;
      $characters = Character::where('month', $month)->where('day', $day)->orderBy('ruby','asc')->paginate(30);            
    }
    else{            
        $characters = Character::where('month', $month)->where('day', $day)->orderBy('ruby','asc')->paginate(30);                         
    }

    return $characters;

  }
}
