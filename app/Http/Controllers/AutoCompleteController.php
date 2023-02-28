<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class AutoCompleteController extends Controller
{
    public function index()
    {
        //
    }


    public function autocomplete(Request $request) {
        $query = $request->input('query');

        $result = Character::where('title','LIKE','%'.$query.'%') ->pluck('title');

        return response()->json($result);
    }
}
