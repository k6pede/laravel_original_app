@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')

<div id="contents">
  <div class="box_con03">
    <div class="information" style="border: 2px solid red">
      <p>こちらは新規登録専用フォームです。</p>
      <p>漫画、アニメ、ノベルス、ゲームなどに登場するキャラクターを対象としています。</p>
      <p>既存キャラクターの登録情報修正のご依頼は<a href="" style="color:red">こちら</a>から。</p>
      <p>下記の注意点を踏まえた上でご依頼ください。なお、登録を確約できかねる点についてはご留意ください。</p>
  
      <div class="important-points">
        <p>登録できないキャラクター</p>
        <ul class="important-texts">
          <li>公式の出典元が確認できないキャラクター</li>
          <li>誕生日がない、あるいは366日以外のキャラクター</li>
          <li>名前がないようなモブキャラクター</li>
          <li>その他登録、掲載が適切でないと判断した作品、キャラクター</li>
        </ul>
      </div>
  
    </div>
  
    <form method="POST" action="{{ route('sendEmail') }}">
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
          <th>ふりがな</th>
          <td>
            {{$inputs['ruby']}}
            <input type="hidden" value="{{$inputs['ruby']}}" name="ruby">
          </td>
        </tr>
        <tr>
          <th>誕生日</th>
          <td>
            {{$inputs['birth']}}月{{$inputs['day']}}日
            <input type="hidden" value="{{$inputs['birth']}}" name="birth">
            <input type="hidden" value="{{$inputs['day']}}" name="day">
          </td>
        </tr>
        <tr>
          <th>年齢</th>
          <td>
            {{$inputs['age']}}
            <input type="hidden" value="{{$inputs['age']}}" name="age">
          </td>
        </tr>
        <tr>
          <th>血液型</th>
          <td>
            {{$inputs['blood']}}
            <input type="hidden" value="{{$inputs['blood']}}" name="blood">
          </td>
        </tr>
        <tr>
          <th>性別</th>
          <td>
            {{$inputs['gender']}}
            <input type="hidden" value="{{$inputs['gender']}}" name="gender">
          </td>
        </tr>
        <tr>
          <th>出展情報</th>
          <td>
            {{$inputs['details']}}
            <input type="hidden" value="{{$inputs['details']}}" name="details">
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            {{$inputs['email']}}
            <input type="hidden" value="{{$inputs['email']}}" name="email">
          </td>
        </tr>
        
        
      </table>
  
     
      
      <div class="d-flex align-content-center confirm">
        <button type="submit" name="action" value="back">入力内容修正</button>
   
        <button type="submit" name="action" value="submit">送信する</button>
      </div>
    </form>
  </div>
  

 
</div>

@endsection