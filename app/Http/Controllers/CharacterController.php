<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //キャラクター情報の生成は月、日とセットで扱うためTopControllerでまとめて処理
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
       return view('characters.create');
        //
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'birth' => 'required|integer',
            'day' => 'required|integer',
            
        ],[
            'required' => '必須項目です。',
        ]);

        $inputs = $request->all();
        foreach($inputs as $key => $value) {
            if(empty($value)) {
                $inputs[$key] = null;
            }
        }
        
        Character::updateOrCreate(['name' => $inputs['name'], 'title' => $inputs['title']],[

            'name' => $inputs['name'],
            'ruby' => $inputs['ruby'],
            'title' => $inputs['title'],
            'month' => $inputs['month'],
            'day' => $inputs['day'],
            'blood' => $inputs['blood'],
            'gender' => $inputs['gender'],

        ]);
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $character_id = $request->input('character_id');

        $character = Character::where('id', $character_id)->first();

        return view('characters.show')->with([
            "character" => $character
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'month' => 'required|integer',
            'day' => 'required|integer',
            
        ],[
            'required' => '必須項目です。',
        ]);
        $inputs = $request->all();
        foreach($inputs as $key => $value) {
            if(empty($value)) {
                $inputs[$key] = null;
            }
        }
        Character::where('id',$inputs['character_id'])
        ->update([

            'name' => $inputs['name'],
            'ruby' => $inputs['ruby'],
            'title' => $inputs['title'],
            'month' => $inputs['month'],
            'day' => $inputs['day'],
            'blood' => $inputs['blood'],
            'gender' => $inputs['gender'],

        ]);
        return redirect()->route('top');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $character_id = $request->input('character_id');

        $character = Character::where('id', $character_id)->first();

        return view('characters.update')->with([
            "character" => $character
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $character_id = $request->input('character_id');

        Character::where('id', $character_id)->delete();
        return redirect()->route('top');
    }
}
