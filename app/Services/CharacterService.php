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
    public static function getCharacters(Request $request)
    {
      $characters = CharacterRepository::getCharactersByDate($request);
      return $characters;
    }

    
}