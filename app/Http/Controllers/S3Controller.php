<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    // S3へのファイルアップロード
    public function uploadS3(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                //画像のみ、2048MBまで保存可能
                'file' => 'required|file|mimes:jpeg,png,bmp,gif,svg|max:2048',
            ]
        );

        $user = auth()->user();

        //現在のプロフィール画像へのUrlを取得
        $oldProfileImageUrl = $user->profile_image_url;

        // S3へファイルをアップロード
        $result = Storage::disk('s3')->put('/', $request->file('file'));
        if ($result) {

            //s3のurl取得
            $url = Storage::disk('s3')->url($result);

            //DBにurl保存
            $user->update(['profile_image_url' => $url]);

            //古いプロフィール画像を削除する
            if ($oldProfileImageUrl) {
                $oldProfileImageName = basename($oldProfileImageUrl);
                Storage::disk('s3')->delete($oldProfileImageName);
            }

            return redirect()
            ->route('top');
        } else {
            return 'アップロード失敗';
        }
    }
}
