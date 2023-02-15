<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class ShowController extends Controller
{
    //
    public function show(Request $request){
        $name = $request->name;
        $title = $request->title;
        $characters = Character::where('title',$title)->paginate(50);
  

        //キャラクター単体の紹介ページは作らず、作品と所属キャラクターを並べる形で良くね？
        //SQL where nameとtitleからキャラクターの情報持ってきて変数に入れる

        return view('show')->with([
            "name" => $name,
            "title" => $title,
            "characters" =>$characters,

        ]);
    }

    // public function showTitle(Request $request) {

    //     $title = $request->title;
    //     if(empty($title)) {
    //         $characters = Character::where('name', $name);

    //     }else if(empty($name)){
    //         $characters = Character::where('title', $title);
    //     }

    //     return view('showTitle')->with([
    //         "name"=> $name,
    //         "characters" =>$characters
    //         "title" => $title
    //     ])

        
    // }
}
