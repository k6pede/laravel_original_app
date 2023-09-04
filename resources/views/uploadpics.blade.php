{{-- <!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ファイルアップロード</title>
</head> --}}
@extends('layouts.layout')
@section('content')
<div id="contents">
    <form action="{{ route('s3') }}" method="post" enctype="multipart/form-data">
       
        <label for="file">画像ファイルを選択</label>
        <input type="file" name="file" id="" accept="image/jpeg,image/png">
        <input type="submit" value="アップロード">

        <div>
            <img src="{{ auth()->user()->profile_image_url ?? asset('images/icon_user.png') }}" width="45" height="45">
        </div>
        <script>
            document.getElementById('file').addEventListener('change', function (e) {
                const fileSize = e.target.files[0].size;
                const maxSize = 2 * 1024 * 1024; // 2MB
        
                if (fileSize > maxSize) {
                    alert('ファイルサイズは2MB以下である必要があります。');
                    e.target.value = '';  // ファイル選択をクリア
                }
            });
        </script>
    </form>
</div>
<div>
    <div class="profile-user-img-div">
        <!-- プロフィール画像をクリックすると、fileInputをクリックしたことにする -->
        <img src="{{ auth()->user()->profile_image_url ?? asset('images/icon_user.png') }}" class="profile-user-image" onclick="document.getElementById('fileInput').click();">
    </div>
    
    <form action="{{ route('s3') }}" method="post" enctype="multipart/form-data" style="display: none;" id="uploadForm">
        @csrf
        <input type="file" name="file" id="fileInput" accept="image/jpeg,image/png" style="display: none;">
        <input type="submit" value="アップロード">
    </form>
    
    <script>
        const fileInput = document.getElementById('fileInput');
        fileInput.addEventListener('change', function (e) {
            const fileSize = e.target.files[0].size;
            const maxSize = 2 * 1024 * 1024; // 2MB
    
            if (fileSize > maxSize) {
                alert('ファイルサイズは2MB以下である必要があります。');
                e.target.value = '';  // ファイル選択をクリア
            } else {
                // ファイルサイズが問題なければ、フォームをサブミット
                document.getElementById('uploadForm').submit();
            }
        });
    </script>

</div>
@endsection
{{-- </html> --}}