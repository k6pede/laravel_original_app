@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')
@php
 $months = range(1,12);
 $days = range(1,31); 
@endphp

<div class="box_con03">

  <form method="POST" action="{{ route('create') }}" id="myForm">
    @csrf
    <table class="formTable">
      @if($errors->any())
        <div class="mb-3">
          <p class="error-message text-center">※入力内容に誤りがあります。</p>
        </div>
      @endif
      
      <tr>
        <th>出典作品名<span>必須</span></th>
        <td><input size="30" type="text" class="wide"  name="title" placeholder="銀河英雄伝説" value="{{old('title')}}">
          @if ($errors->has('title'))
            <p class="error-message">{{ $errors->first('title') }}</p>
          @endif
        </td>
      </tr>
      <tr>
        <th>キャラ名<span>必須</span></th>
        <td><input size="20" type="text" class="wide" name="name" placeholder="山田☆ジーク・太郎"  value="{{old('name')}}"/>
          @if ($errors->has('name'))
          <p class="error-message">{{ $errors->first('name') }}</p>
        @endif</td>
          
      </tr>
      <tr>
        <th>ふりがな</th>
        <td><input size="20" type="text" class="wide" name="ruby" placeholder="やまだじーくたろう"  value="{{old('ruby')}}"/>
          @if ($errors->has('ruby'))
          <p class="error-message">{{ $errors->first('ruby') }}</p>
        @endif</td>
      </tr>
      <tr>
        <th>誕生日（月・日）<span>必須</span></th>
        <td>
          <input type="number" class="short" name="birth" value='1'/>
          <input type="number" class="short" name="day" min="1" max="31" value='1'/>
          <div>
            <label for="">月</label>
            @foreach($months as $month)
              <a href="#" class="birth-month" data-value="{{$month}}">{{ $month }}</a>
            @endforeach

          </div>
          <div>
            <label for="">日</label>
            @foreach($days as $day)
              <a href="#" class="birth-day" data-value="{{$day}}">{{ $day }}</a>
            @endforeach

          </div>
        </td>
      </tr>
      <tr>
        <th>年齢</th>
        <td><input size="10" type="number" class="short" name="age" placeholder="17"/></td>
      </tr>
      <tr>
        <th>血液型</th>
        <td>
          <select name="blood" class="short">
            <option value="A" >A</option>
            <option value="B" >B</option>
            <option value="O" >O</option>
            <option value="AB" >AB</option>
            <option value="etc" >不明または無し</option>
        </select></td></td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          <input class="form-check-input radio" value="男性" type="radio" name="gender" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            男性
          </label>
          <input class="form-check-input radio" value="女性" type="radio" name="gender" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">
            女性
          </label>
          <input class="form-check-input radio" value="不明" type="radio" name="gender" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">
            不明
          </label>
        </td>
      </tr>
      
      <tr>
        <th>出展情報<br/></th>
        <td><textarea name="details" cols="50" rows="3"  value="{{old('details')}}"></textarea></td>
      </tr>
      <tr>
        <th>ご依頼者様のメールアドレス</th>
        <td><input size="30" type="text" value="{{old('email') }}" class="wide" name="email" />
          @if ($errors->has('email'))
              <p class="error-message">{{ $errors->first('email') }}</p>
          @endif
        </td>
      </tr>
    </table>

    <div class="con_pri">
        <div class="box_pri">
            <div class="box_tori text-center">
                <h4 style="color:red">注意</h4>
                <p class="txt">登録をお約束するものではありません。</p>
            </div>
            
            <div class="box_check align-content-center">             
              <input id="agreement" type="checkbox" name="acceptance-714" value="1" aria-invalid="false" class="agree" required>
              <label>
                <span class="check">同意する</span>
              </label>
            </div>
        </div>
    </div>
    <div>
      <p class="btn mx-auto">
          <span><input type="submit" value="送信" form="myForm"></span>
      </p>
    </div>
  </form>
</div>

{{-- <div id="contents">
  <div class="infomation" style="border: 2px solid red">
    <p>こちらは新規登録専用フォームです。</p>
    <p>漫画、アニメ、ノベルス、ゲームなどに登場するキャラクターを対象としています。</p>
    <p>既存キャラクターの登録情報修正のご依頼は<a href="" style="color:red">こちら</a>から。</p>
    <p>下記の注意点を踏まえた上でご依頼ください。なお、登録を確約できかねる点についてはご留意ください。</p>

    <div class="important-points">
      <p>登録できないキャラクター</p>
      <ul>
        <li>公式の出典元が確認できないキャラクター</li>
        <li>誕生日がない、あるいは366日以外のキャラクター</li>
        <li>名前がないようなモブキャラクター</li>
        <li>その他登録、掲載が適切でないと判断した作品、キャラクター</li>
      </ul>
    </div>

  </div>

  <div class="form-contents">
    <dl class="card mb-3">
      <dt class="card-header">aaa</dt>
      <dd class="mb-0">
        <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
      </dd>
    </dl>


    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">お名前 (任意)</label>

      <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
    </div>
  
  
   
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  
    
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
  </div>


</div> --}}

@endsection