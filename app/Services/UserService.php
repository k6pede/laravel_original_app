<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\EmailSubscriber;
use App\Models\User;

class UserService
{

  public function update(Request $request)
  {
    $request->validate([
      'profile-username' => ['required', 'string', 'max:255'],
      'profile-email' => ['email:strict,dns,spoof', 'max:255', 'nullable'],
      'subscribe-check' => ['boolean'],
    ],[
      'required' => '必須項目です',
      'email' => 'emailの形式で入力してください。',
    ]);
    
    $user = auth()->user();
    $user_id = $user->id;
    $params = $request->only(['profile-username', 'profile-email', 'subscribe-is-checked']);
    $profileUsername = $params['profile-username'];
    $profileEmail = $params['profile-email'];
    $subscribeIsChecked = $request->input('subscribe-is-checked') === 'true';

    User::where('id', $user_id)
          ->update(['name' => $profileUsername, 'email' => $profileEmail]);

    if($subscribeIsChecked) {
      EmailSubscriber::firstOrCreate(['user_id' => $user_id]);
    } else {
      EmailSubscriber::where('user_id', $user_id)->delete();
    }


    return redirect()->route('home')->with('success', 'ユーザ情報を更新しました');
  }

    
}