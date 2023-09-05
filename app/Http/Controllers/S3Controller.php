<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Aws\S3\Exception\S3Exception;


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
        try {
            $result = Storage::disk('s3')->put('/', $request->file('file'));
            if (!$result) {
                throw new \Exception('S3へのアップロードに失敗しました。');
            }
        

            //s3のurl取得
            $url = Storage::disk('s3')->url($result);

            //DBにurl保存
            $user->update(['profile_image_url' => $url]);

            //古いプロフィール画像を削除する
            if ($oldProfileImageUrl) {
                $oldProfileImageName = basename($oldProfileImageUrl);
                Storage::disk('s3')->delete($oldProfileImageName);
            }

            return redirect()->route('top');

        } catch (S3Exception $e) {
            Log::error('AWS S3エラー:', [
                'user_id' => $user->id,
                'file_name' => $request->file('file')->getClientOriginalName(),
                'aws_error_message' => $e->getMessage(),
                'aws_error_code' => $e->getAwsErrorCode(),
                'aws_request_id' => $e->getAwsRequestId(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString()
            ]);
            return 'アップロード失敗';
        
        } catch (\Exception $e) {
            Log::error('ファイルのアップロードに失敗しました。', [
                'user_id' => $user->id,
                'file_name' => $request->file('file')->getClientOriginalName(),
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString()
            ]);
            return 'アップロード失敗';
        }
        
    }
}
