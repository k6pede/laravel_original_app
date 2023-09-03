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
              <div class="iHuAOm">
                  <img src="{{  auth()->user()->profile_image ?? asset('images/icon_user.png') }}" class="profile-user-image">
              </div>
          </div>
          <div class="profile-user-name-div">
              <p class="profile-user-name">
                {{ auth()->user()->name ?? 'ゲストユーザー' }}
              </p>
          </div>
      </a>
      {{-- プロフィールを編集button --}}
      @if(auth()->check())
        <div class="kHkxMW">
            <a class="generic-profile-a hyaIFO" href="#">
                <div class="useTouchArea__TouchArea-sc-101jzj6-0 jUmWuS">
                  <button height="36" font-size="14" elevation="0" shape="R100" class="Button__StyledButton-sc-627uvk-0 Button__StyledSolidButton-sc-627uvk-1 wcQLJ bSGazq profile-edit-button">
                    プロフィールを編集
                  </button>
                </div>
            </a>
        </div>
      @endif
  </div>

  {{-- 中段　リスト項目 --}}
  <div class="profile-mid-div">
      <ul class="profile-ul">
        <li class="profile-li">
          <a class="generic-profile-a profile-li-a profile-li-a-mid" href="#">
            <div class="profile-list-a-middiv1">
              <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="profile-li-a-svg">
                <path d="M11 18h2v-7h-2v7z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8 4V2H6v2H5c-1.105 0-2 .895-2 2v16h18V6c0-1.105-.895-2-2-2h-1V2h-2v2H8zm11 5v11H5V9h14z" fill="currentColor"></path>
              </svg>
              <p class="heSaID">
                登録している予定
              </p>
            </div>
            <div class="profile-list-a-middiv2">
              <p class="count">{{ $events->count ?? '1'}}</p>
            </div>
          </a>
        </li>

        <li class="profile-li">
          <a class="generic-profile-a profile-li-a profile-li-a-mid" href="#">
            <div class="profile-list-a-middiv1">
              <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="profile-li-a-svg">
                <polygon points="12,2 14.3,8.6 21,9.2 15.5,14 17.8,20.8 12,16.5 6.2,20.8 8.5,14 3,9.2 9.7,8.6" fill="currentColor" />
              </svg>
              <p class="heSaID">
                お気に入りキャラクター
              </p>
            </div>
            <div class="profile-list-a-middiv2">
              <p class="count">{{ $events->count ?? '1'}}</p>
            </div>
          </a>
        </li>
      </ul>
  </div>

  {{-- 最下段 --}}
  <ul class="gLDpht fguJZQ">
      <li class="profile-li">
        <a class="generic-profile-a profile-li-a cRrRcS" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              <p class="profile-li-a-p">{{ __('Logout') }}</p>
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

.profile-user-name-div {
    margin-left: 16px;
}

.profile-mid-div {
    margin: 16px 0px;
}
.profile-ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
}
.profile-li {
    display: flex;
    width: 100%;
}
.profile-li-a-mid {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    justify-content: space-between;
    height: 40px;
    width: 100%;
    padding: 0px 16px;
}
.profile-list-a-middiv1 {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
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
.profile-list-a-middiv2 {
    display: flex;
    -webkit-box-align: center;
    align-items: center;
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
.profile-li:hover {
    background-color: #f5f5f5; /* グレーの背景色 */
    transition: background-color 0.3s ease; /* スムーズな遷移 */
}


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
    padding: 0px 16px;
    margin: 0 !important;
    font-size: 14px;
    font-weight: normal;
    line-height: 32px;
    color: rgba(0, 0, 0, 0.84);
    font-family: Poppins, "Helvetica Neue", Helvetica, Arial, "Hiragino Sans", ヒラギノ角ゴシック, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", Roboto, メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
}

</style>
