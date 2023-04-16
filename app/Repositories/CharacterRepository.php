<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterRepository
{

  public static function getCharactersByDate($month, $day)
  {

    $characters = Character::where('month', $month)
                              ->where('day', $day)
                              ->orderBy('ruby','asc')
                              ->paginate(30);            
    
    return $characters;

  }

  public static function getCharactersFromTitle($title)
    {
      $characters = Character::where('title',$title)
                              ->paginate(50);
      return $characters;
    }
  
}
