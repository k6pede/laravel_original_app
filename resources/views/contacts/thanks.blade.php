@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
<div id="contents">
  <div class="message">
    <div class="mx-auto text-center">
      <p >
        {{ __('リクエストが送信されました') }}
      </p>
    </div>
    <div class="message-links">
      <div>

        <a href="/">ホームに戻る</a>
      </div>
      <div>

        <a href="/contact">続けて登録依頼を送る</a>
      </div>
    </div>

  </div>
</div>
  
@endsection