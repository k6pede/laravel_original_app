<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplyMail;
use App\Mail\ApplyMailforModify;
use App\Mail\FormUserMail;

class ContactController extends Controller
{
    //キャラクター作成依頼
    public function contact() {
        return view('contacts.contact');
    }

    //contactで入力した内容をrequestで受け取り、confirm.bladeに渡す
    public function confirm(Request $request) {
        $request->validate([
            'email' => 'email:strict,dns,spoof|max:255',
            'title' => 'required',
            'name' => 'required|max:100',
            'ruby' => 'regex:/^[ぁ-ん]*$/u',
            'birth' => 'required|integer|between:1,12',
            'day' => 'required|integer|between:1,31',
        ],[
            'required' => '必須項目です。',
            'regex' => 'ひらがなで入力してください。',
            'email' => 'メールアドレスの形式で入力してください。',

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


    //修正依頼
    public function modify(){
        return view('contacts.modify');
    }
    public function confirmModify(Request $request){
        $request->validate([
            'email' => 'email:strict,dns,spoof|max:255',
            'details' => 'required',
            
        ],[
            'required' => '必須項目です。',
            'email' => 'メールアドレスの形式で入力してください。',

        ]);
        $inputs = $request->all();
        
        foreach($inputs as $key => $value) {
            if(empty($value)) {
                $inputs[$key] = '入力なし';
            }
        }
        
        return view('contacts.confirmModify')->with([
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
    public function sendModifyEmail(Request $request) {

        $action = $request->input('action');
        $inputs = $request->except('action');
        foreach($inputs as $key => $value) {
            if(empty($value)) {
                $inputs[$key] = '入力なし';
            }
        }

        if($action !== 'submit'){
            
            return redirect()
            ->route('modify')
            ->withInput($inputs);

        }else{
            // if(!empty($inputs['email'])){
            //     Mail::to($inputs['email'])->send( new FormUserMail($inputs) );
            // }

            Mail::to('runa720.bump@icloud.com')->send( new ApplyMailforModify($inputs) );
            $request->session()->regenerateToken();
        }
        return view('contacts.thanks');


    }
   

    public function thanks(){
        return view('contacts.thanks');
    }
}
