<?php

namespace App\Services;

use App\Models\Character;
use App\Repositories\CharacterRepository;
use App\Repositories\CharacterRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yasumi\Yasumi;
use DateTime;use Illuminate\Http\Request;

class CharacterService
{

  private $characterRepository;

  public function __construct(CharacterRepositoryInterface $characterRepository)
  {
    $this->characterRepository = $characterRepository;
  }


  public function getCharactersByDate(Request $request)
  {
      $now = Carbon::now();
      $month = $request->month;
      $day = $request->day;

      if (empty($month) || empty($day)) {
        $month = $now->month;
        $day = $now->day;
      }
      $characters = $this->characterRepository->getCharactersByDate($month, $day);
      return $characters;
  }

  public function getCharactersFromTitle(Request $request)
  {
      $title = $request->title;
      $characters = $this->characterRepository->getCharactersFromTitle($title);
      return $characters;
  }

  public function getCharactersBySearchWord(Request $request)
  {
      if($request->has('t')){
        $searchWord = $_REQUEST['t'];
        $characters = $this->characterRepository->getCharactersBySearchWord($searchWord);
      }
      if($request->has('c')){
        $searchWord = $_REQUEST['c'];
        $characters = $this->characterRepository->getCharactersByName($searchWord);
      }

      return [$characters, $searchWord];
  }

    
}