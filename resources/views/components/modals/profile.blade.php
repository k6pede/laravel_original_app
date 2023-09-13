<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/top.css">
    <link rel="stylesheet" href="/css/form.css">
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    @yield('pageCss')
</head>


<div class="profile-card whole-profile-modal">
  {{-- 最上段　画像とユーザー名の表示 --}}
  <div class="profile-top-div">
      <a class="generic-profile-a profile-img-name" href="#">
          <div class="profile-user-img-div">

            {{-- ユーザ設定のアイコン --}}
            <img src="{{ auth()->user()->profile_image_url ?? asset('images/icon_user.png') }}" class="profile-user-image" onclick="document.getElementById('fileInput').click();">
            <i class="fa-solid fa-wrench"></i>

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
                const maxSize = 2 * 1024 * 1024; // 2MBの画像まで
        
                if (fileSize > maxSize) {
                    alert('ファイルサイズは2MB以下である必要があります。');
                    e.target.value = '';  // ファイル選択をクリア
                } else {
                  if (confirm('選択した画像をプロフィールに設定しますか？')) {
                  // ユーザーがOKをクリックした場合のみ、フォームをサブミット
                  document.getElementById('uploadForm').submit();
                  }
                }
            });
          </script>

          <div class="profile-user-name-div">
              <p class="profile-user-name">
                {{ auth()->user()->name ?? 'ゲストユーザー' }}
              </p>
          </div>
      </a>
      {{-- プロフィールを編集button --}}
      
        <div class="kHkxMW">
            <a class="generic-profile-a hyaIFO" href="#" id="profileEditToggle">
                <div class="useTouchArea__TouchArea-sc-101jzj6-0 jUmWuS">
                    @csrf
                    <button type="submit" height="36" font-size="14" elevation="0" shape="R100" class="Button__StyledButton-sc-627uvk-0 Button__StyledSolidButton-sc-627uvk-1 wcQLJ bSGazq profile-edit-button">
                      プロフィールを編集
                    </button>
                </div>
            </a>
        </div>
      
  </div>

  {{-- 中段　リスト項目 --}}
  <div class="profile-mid-div">
    <div class="group">
      <form action="{{ route('editprofile')}}" method="post">
        @csrf
        <div>
          <label for="text4">name</label>
          <span id="username_error" class="text-danger" style="font-size:.8em;"></span>
          <div class="password_box">
             <div class="password_inner">
                <input id="text4" type="string" name="profile-username" class="input-profilename">
                <div class="password_string">新しいユーザー名</div>
             </div>
          </div>
        </div>
        <div>
          <label for="text4">email</label>
          <span id="email_error" class="text-danger" style="font-size:.8em;"></span>
          <div class="password_box">
             <div class="password_inner">
                <input id="text4" type="email" name="profile-email" class="input-profileemail">
                <div class="password_string">新しいアドレス</div>
             </div>
          </div>
        </div>
        <div class="profile-li">
          <a class="generic-profile-a profile-li-a profile-li-a-mid" href="#">
            <div class="profile-li-a-middiv subscribe-check-div">
              <label for=".subscriber-check" class="label-for-profileEdit">メールの配信を希望する</label>
              <input type="checkbox" class="subscriber-check" name="subscribe-check" checked>
            </div>
          </a>
        </div>
        <div class="profile-edit-footer">
          <button type="submit" class="btn btn-primary" id="editProfileBtn">変更を保存</button>        
        </div>
      </form>
      <style>
        .group {
          padding: 0 16px;
        }
        .password_box{
            display: flex; /*アイコン、テキストボックスを調整する*/
            align-items: center; /*アイコン、テキストボックスを縦方向の中心に*/
            justify-content: center; /*アイコン、テキストボックスを横方向の中心に*/
            width: 100%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid lightgray;
        }

        .password_inner{
            width: 100%;
            height: 100%;
            background-color: transparent; /*.password_boxの枠線お角一部被るため透明に*/
            position: relative;
        }

        #text4{
            position: absolute;
            z-index: 1; /*.password_stringよりも上に配置*/
            height: 100%;
            width: 100%;
            top: 0; left: 0; bottom: 0; right: 0;
            border: none; /*枠線非表示*/
            outline: none; /*フォーカス時の枠線非表示*/
            padding: 0 10px;
            font-size: 16px;
            background-color: transparent; /*後ろの.password_stringを見せるため*/
            box-sizing: border-box; /*横幅の解釈をpadding, borderまでとする*/
        }

        .password_string{
            position: absolute;
            height: 100%;
            width: 140px; /*文字列分の長さ*/
            top: 0; left: 0; bottom: 0; right: 0;
            padding-left: 10px; /*position: absolute;でのmarginは親要素はみ出す*/
            font-size: 16px;
            line-height: 50px; /*文字列を縦方向にmiddleに見せるため*/
            background-color: transparent;
            color: #80868b;
            box-sizing: border-box; /*横幅の解釈をpadding, borderまでとする*/
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .fa-eye-slash{ /*アイコンに一定のスペースを設ける*/
            height: 20px;
            width: 20px;
            padding: 5px 5px;
        }

        /*アニメーション*/
        #text4:focus + .password_string{
            color: #3be5ae;
            font-size: 10px;
            line-height: 10px;
            width: 85px;
            height: 10px;
            padding: 0 2px;
            background-color: white;
            transform:translate3d(5px, -6px, 0);
        }
        .profile-edit-footer {
            display: flex;
            flex-wrap: wrap;
            flex-shrink: 0;
            align-items: center;
            justify-content: flex-end;
            padding: .75rem;
            border-top: 1px solid #dee2e6;
            border-bottom-right-radius: calc(.3rem - 1px);
            border-bottom-left-radius: calc(.3rem - 1px);
        }

      </style>
   </div>
      {{-- <ul class="profile-ul">
        
       
        
        <li class="profile-li">
          <a class="generic-profile-a profile-li-a profile-li-a-mid" href="#">
            <div class="profile-li-a-middiv">
              <label for=".profile-name-edit" class="lavel-for-profileEdit">ユーザー名</label>
              <input type="text" class="profile-name-edit profile-input">
              <div class="text_underline"></div>
            </div>
          </a>
        </li>
        <li class="profile-li">
          <a class="generic-profile-a profile-li-a profile-li-a-mid" href="#">
            <div class="profile-li-a-middiv">
              <label for=".profile-email-edit" class="label-for-profileEdit">メールアドレス</label>
              <input type="text" class="profile-email-edit profile-input">
              <div class="text_underline"></div>
            </div>
          </a>
        </li>
        <li class="profile-li">
          <a class="generic-profile-a profile-li-a profile-li-a-mid" href="#">
            <div class="profile-li-a-middiv subscribe-check-div">
              <label for=".subscriber-check" class="label-for-profileEdit">メールの配信を希望する</label>
              <input type="checkbox" class="subscriber-check">
            </div>
          </a>
        </li>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
          <button type="submit" class="btn btn-primary" id="eventCreateBtn">変更を保存</button>        
        </div>
      </ul> --}}
  </div>
  <script>
    // "profileEditToggle" idを持つ要素に対するクリックイベントリスナーを設定
    document.getElementById("profileEditToggle").addEventListener("click", function(e) {
    e.preventDefault(); // デフォルトのクリック動作を停止
    // ".profile-mid-div" クラスを持つ要素を取得
    var element = document.querySelector(".profile-mid-div");
    // 要素の現在の表示状態をチェックし、切り替える
    if (element.style.display === "none" || element.style.display === "") {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  });
  </script>

  {{-- 最下段 --}}
  <ul class="gLDpht fguJZQ">
      <li class="profile-li">
        <a class="generic-profile-a profile-li-a cRrRcS" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <p class="profile-li-a-p">{{ __('messages.Logout') }}</p>
        </a>
          
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
         </form>
      </li>
  </ul>
</div>

<style>
  .whole-profile-modal {
    position: absolute;
    top: 81px;
    right: 7%;
    width: 320px;
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0.02) 0px 0px 0px 1px, rgba(0, 0, 0, 0.1) 0px 8px 16px 0px;
    z-index: 100;
    border-radius: 4px;
    cursor: default;
  }
  .profile-img-name {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    margin: 8px 0px;
    padding: 8px 15px;
    text-decoration: none;
  }
  .generic-profile-a {
      cursor: pointer;
      font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
      text-decoration: none;
  }
  .kHkxMW {
    margin: -6px 12px 0px;
  }
  .kHkxMW > a > div {
    width: 100%;
    box-sizing: border-box;
}
.jUmWuS {
    cursor: pointer;
    display: inline-block;
    padding: 6px 4px;
}
.wcQLJ {
    box-sizing: border-box;
    padding: 0px 32px;
    margin: 0px;
    background: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255));
    border: none;
    outline: none;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 0px 0px 1px, rgba(0, 0, 0, 0.1) 0px 0px 0px 1px;
    border-radius: 9999vmax;
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
    font-weight: 600;
    display: block;
    cursor: pointer;
    user-select: none;
    height: 36px;
    line-height: 36px;
    font-size: 14px;
    text-decoration: none;
    transition: all 200ms cubic-bezier(0.5, 0.5, 0.5, 1) 0s;
}

.profile-user-name {
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.4;
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: rgba(0, 0, 0, 0.84);
    margin-bottom: 0 !important;
}
.profile-edit-button {
    color: rgba(0, 0, 0, 0.56);
    font-size: 14px;
    font-weight: 600;
    line-height: 24px;
    width: 100%;
    display: block;
    padding: 6px 0px;
    margin: 2px auto;
    float: none;
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
}

.profile-user-image {
  width: 72px;
  height: 72px;
  border-radius: 50%;
}
.profile-user-img-div {
  position: relative;
  display: inline-block;
}
.profile-user-img-div:hover {
  opacity: .6;
  transition: opacity 0.3s ease; /* スムーズな遷移 */
}
.profile-user-img-div:hover .fa-wrench {
  display: block; /* hover時にアイコンを表示する */
}
.fa-wrench {
  display: none; /* 最初は非表示にしておく */
  position: absolute; /* 絶対位置で要素を配置する */
  top: 50%;  /* 上から50%の位置に配置 */
  left: 50%; /* 左から50%の位置に配置 */
  transform: translate(-50%, -50%); /* 50%ずらして中央に持ってくる */
  font-size: 24px; /* あなたの設定に合わせて調整してください */
  z-index: 2; /* 必要に応じてz-indexを設定 */
}


.profile-user-name-div {
    margin-left: 16px;
}

.profile-mid-div {
    margin: 16px 4px;
    display: none;
}
.profile-ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
}
.profile-li {
    display: flex;
    justify-content: space-between;
    color: rgba(0, 0, 0, 0.56);
    width: 100%;
    font-size: 14px;
    line-height: 14px;
    width: 100%;
    display: block;
    padding: 6px 0px;
    margin: 2px auto;
    float: none;
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;

}
.profile-li-a-mid {
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    height: 40px;
    width: 100%;
    padding: 0px 16px;
}
.profile-li-a-middiv {
    -webkit-box-align: center;
    align-items: center;
    padding: 0px 16px;
}
.profile-li-a-svg {
    color: rgba(0, 0, 0, 0.56);
    width: 20px;
    height: 20px;
}
.heSaID {
    margin-left: 18px;
    margin-bottom: 0 !important;
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
    font-size: 14px;
    font-weight: 600;
    line-height: 40px;
    color: rgba(0, 0, 0, 0.84);
}

.count {
    margin-left: auto;
    margin-bottom: 0 !important;
    color: rgba(0, 0, 0, 0.56);
    font-family: Lato, "Helvetica Neue", Helvetica, "Hiragino Sans", "ヒラギノ角ゴシック Pro", "Hiragino Kaku Gothic Pro", メイリオ, Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
    font-size: 14px;
    line-height: 24px;
    max-width: 120px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
a:visited {
  opacity: 0.8;
}
.profile-edit-button:hover {
    transform: translateY(-1px); /* ボタンを少し上に移動 */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* より強調された影 */
}
/* .profile-li:hover {
    background-color: #f5f5f5; /* グレーの背景色 */
    transition: background-color 0.3s ease; /* スムーズな遷移 */
} */


/* 最下段 */
.fguJZQ {
    padding: 16px 0px;
}

.cRrRcS {
    text-decoration: none;
    text-align: left;
    color: rgb(36, 40, 42);
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    font-family: Lato, "Helvetica Neue", Helvetica, "Hiragino Sans", "ヒラギノ角ゴシック Pro", "Hiragino Kaku Gothic Pro", メイリオ, Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
}
.profile-li-a-p {
    //padding: 0px 16px;
    margin: 0 !important;
    font-size: 14px;
    font-weight: normal;
    line-height: 32px;
    color: rgba(0, 0, 0, 0.84);
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
}

.label-for-profileEdit {
  display: block;
  margin: 2px 0;
}
.profile-input {
  font-size: 16px;
    width: 100%;
    border: none;
    outline: none;
    padding-bottom: 8px;
    box-sizing: border-box; /*横幅の解釈をpadding, borderまでとする*/
}

.text_underline{
    position: relative; /*.text_underline::beforeの親要素*/
    border-top: 1px solid #c2c2c2; /*text3の下線*/
}

.subscribe-check-div {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

</style>
