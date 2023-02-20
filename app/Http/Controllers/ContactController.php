<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplyMail;
use App\Mail\FormUserMail;

class ContactController extends Controller
{
    //contactページを返す
    public function contact(Request $request) {
        return view('contacts.contact');
    }



    //contactで入力した内容をrequestで受け取り、confirm.bladeに渡す
    public function confirm(Request $request) {
        $request->validate([
            'email' => 'email:strict,dns,spoof|max:255',
            'title' => 'required',
            'name' => 'required|max:100',
            'birth' => 'required|integer|between:1,12',
            'day' => 'required|integer|between:1,31',
        ]);
        $inputs = $request->all();
        
        foreach($inputs as $key => $value) {
            if(empty($value)) {
                $inputs[$key] = '入力なし';
            }
        }
        
        return view('contacts.confirm')->with([
            "inputs" => $inputs,
        ]);
    }

    //メール送信処理
    public function sendEmail(Request $request) {

        $action = $request->input('action');
        $inputs = $request->except('action');
        foreach($inputs as $key => $value) {
            if(empty($value)) {
                $inputs[$key] = '入力なし';
            }
        }

        if($action !== 'submit'){
            
            return redirect()
            ->route('contact')
            ->withInput($inputs);

        }else{
            if(!empty($inputs['email'])){
                Mail::to($inputs['email'])->send( new FormUserMail($inputs) );
            }

            Mail::to('runa720.bump@icloud.com')->send( new ApplyMail($inputs) );
            $request->session()->regenerateToken();
        }
        return view('contacts.thanks');


    }

    public function thanks(){
        return view('contacts.thanks');
    }
}
