<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {

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

    

        $result = $searchWord;
      

        
        // $characters = Character::SELECT * From Characters WHERE name LIKE "%$result%" -> paginate(30);
        
        return view('search')->with([
            "result"=> $result,
            "characters"=> $characters
        ]);
    }


}
