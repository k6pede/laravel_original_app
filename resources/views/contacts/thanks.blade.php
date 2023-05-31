@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
<div id="contents">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: transparent;">
                  <div class="mx-auto text-center">
                    <p >
                      {{ __('リクエストが送信されました') }}
                    </p>
                  </div>
                </div>
  
                <div class="card-body">
                  <div class="message-links">
                    <div class="message-links-item">
                      <a href="/"><i class="fas fa-home" style="padding-right: .5em;"></i>ホームに戻る</a>
                    </div>
                    <div class="message-links-item">
                      <a href="/contact"><i class="fas fa-pen" style="padding-right: .5em;"></i>続けて登録依頼を送る</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
  
@endsection