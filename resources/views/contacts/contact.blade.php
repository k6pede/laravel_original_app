@extends('layouts.layout')

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

  <div class="information mb-3" style="border: 2px solid rgb(237, 109, 31">
    <div class="information-txt">
      <p>こちらはキャラクターの新規登録の依頼用メールフォームです。</p>
      <p>以下のフォームに情報を入力し、送信して下さい。</p>
      <p>登録されたキャラクターについてはトップページにてお知らせいたします。</p>
      <p>キャラクターの情報修正は<a href="/modify" style="color:red">こちら</a>から。</p>
    </div>

  </div>

  <form method="POST" action="{{ route('create') }}" id="myForm">
    @csrf
    <table class="formTable">
      @if($errors->any())
        <div class="mb-3">
          <p class="error-message text-center">※入力内容に誤りがあります。</p>
        </div>
      @endif
      
      <tr>
        <th>作品名<span>必須</span></th>
        <td><input size="30" type="text" class="wide"  name="title" placeholder="キャラクターが登場する作品名を入力してください" value="{{old('title')}}">
          @if ($errors->has('title'))
            <p class="error-message">{{ $errors->first('title') }}</p>
          @endif
        </td>
      </tr>
      <tr>
        <th>キャラ名<span>必須</span></th>
        <td><input size="20" type="text" class="wide" name="name" placeholder="キャラクターの名前を入力してください"  value="{{old('name')}}"/>
          @if ($errors->has('name'))
          <p class="error-message">{{ $errors->first('name') }}</p>
        @endif</td>
          
      </tr>
      <tr>
        <th>ふりがな</th>
        <td><input size="20" type="text" class="wide" name="ruby" placeholder="ひらがなで入力してください"  value="{{old('ruby')}}"/>
          @if ($errors->has('ruby'))
          <p class="error-message">{{ $errors->first('ruby') }}</p>
        @endif</td>
      </tr>
      <tr>
        <th>誕生日（月・日）<span>必須</span></th>
        <td>
          <div style="margin-bottom: 1em;">
            <input type="number" class="short" name="birth" value='1' min='1' max='12'/>
            <label for="">月</label>
            
          </div>
          <div class="birth-month-form">
            @foreach($months as $month)
              <button href="#" class="birth-month" data-value="{{$month}}" >{{ $month }}</button>
            @endforeach

          </div>
          <div style="margin-bottom: 1em;">
            
            <input type="number" class="short" name="day" min="1" max="31" value='1'/>
            <label for="">日</label>
          </div>
          <div class="birth-day-form">
            @foreach($days as $day)
              <button href="#" class="birth-day" data-value="{{$day}}">{{ $day }}</button>
            @endforeach

          </div>
        </td>
      </tr>
      <tr>
        <th>年齢</th>
        <td><input size="10" type="number" class="short" name="age" placeholder="年齢を入力してください" min='0'/></td>
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
    <div class="d-flex align-content-center">
      <p class="btn mx-auto">
          <span><input type="submit" value="送信" form="myForm"></span>
      </p>
    </div>
  </form>
</div>


@endsection