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
      $now = Carbon::now();
      $month = $request->month;
      $day = $request->day;

      if (empty($month) || empty($day)) {
        $month = $now->month;
        $day = $now->day;
      }
      $characters = CharacterRepository::getCharactersByDate($month, $day);
      return $characters;
    }

    public static function getCharactersFromTitle(Request $request)
    {
      $title = $request->title;
      $characters = CharacterRepository::getCharactersFromTitle($title);
      return $characters;
    }

    
}