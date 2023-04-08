<?php

namespace App\Services;

use App\Models\Character;
use App\Repositories\CharacterRepository;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;use Illuminate\Http\Request;

class CharacterService
{
    public static function getCharactersByDate(Request $request)
    {
      $characters = CharacterRepository::getCharactersByDate($request);
      return $characters;
    }

    public static function getCharactersFromTitle(Request $request)
    {
      $title = $request->title;
      $characters = Character::where('title',$title)->paginate(50);
      return $characters;
    }

    
}