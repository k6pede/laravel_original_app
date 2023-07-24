<?php

namespace App\Repositories;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterRepository
{

  public function getCharactersByDate($month, $day)
  {

    $characters = Character::where('month', $month)
                              ->where('day', $day)
                              ->orderBy('ruby','asc')
                              ->paginate(30);            
    
    return $characters;

  }

  public function getCharactersFromTitle($title)
  {
    $characters = Character::where('title',$title)
                            ->paginate(50);
    return $characters;
  }
  
  public function getCharactersBySearchWord($searchWord)
  {
    $characters = Character::where('title','LIKE','%'. $searchWord .'%')
                            ->paginate(30);

    return $characters;
  }
  public function getCharactersByName($searchWord)
  {
    $characters = Character::where('name','LIKE','%'. $searchWord .'%')
                            ->paginate(30);

    return $characters;
  }
}
