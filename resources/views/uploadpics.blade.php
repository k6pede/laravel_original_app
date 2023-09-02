<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ファイルアップロード</title>
</head>
<body>
    <form action="{{ route('s3') }}" method="post" enctype="multipart/form-data">
        @csrf
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
</body>
</html>