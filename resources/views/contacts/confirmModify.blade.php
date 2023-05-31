@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')

<div id="contents">
  <div class="box_con03">
    <div class="information mb-3" style="border: 2px solid red">
      <p>こちらは情報修正依頼用フォームです。</p>
      <p>間違ったデータなど、何らかの問題がありましたらご報告いただけますと幸いです。</p>
      <p>修正後、トップページにてお知らせいたします。</p>
      <p>キャラクター新規登録のご依頼は<a href="/contact" style="color:red">こちら</a>から。</p>
  
    </div>
  
    
  
    <form method="POST" action="/applyModify" id="confirmModifyForm">
      @csrf
      <table class="formTable">
        
        <tr>
          <th>出典作品名</th>
          <td>
            {{$inputs['title']}}
            <input type="hidden" value="{{$inputs['title']}}" name="title">
          </td>
        </tr>
        <tr>
          <th>キャラクター名</th>
          <td>
            {{$inputs['name']}}
            <input type="hidden" value="{{$inputs['name']}}" name="name">
          </td>
        </tr>
        <tr>
          <th>修正内容</th>
          <td>
            {{$inputs['details']}}
            <input type="hidden" value="{{$inputs['details']}}" name="details">
          </td>
        </tr>
        <tr>
          <th>ご依頼者様のメールアドレス</th>
          <td>
            {{$inputs['email']}}
            <input type="hidden" value="{{$inputs['email']}}" name="email">
          </td>
        </tr>
        
        
        
      </table>
  
     
      <div class="d-flex align-content-center confirm">
          <button type="submit" name="action" value="back" class="">入力内容修正</button>
          <button id="submitConfirmModifyBtn" type="submit" name="action" value="submit">送信する</button>
      </div>
    </form>
  </div>
  

 
</div>

@endsection