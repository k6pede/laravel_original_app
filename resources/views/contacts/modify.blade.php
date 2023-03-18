@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
@endsection

@section('content')


<div class="box_con03">
  <div class="information mb-3" style="border: 2px solid rgb(237, 109, 31">
    <div class="information-txt">
      <p>こちらは情報修正依頼用フォームです。</p>
      <p>間違ったデータなど、何らかの問題がありましたらご報告いただけますと幸いです。</p>
      <p>修正後、トップページにてお知らせいたします。</p>
      <p>キャラクター新規登録のご依頼は<a href="/contact" style="color:red">こちら</a>から。</p>
    </div>
  </div>

  <form method="POST" action="{{ route('confirmModify') }}" id="myForm">
    @csrf
    <table class="formTable">
      @if($errors->any())
        <div class="mb-3">
          <p class="error-message text-center">※入力内容に誤りがあります。</p>
          @foreach($errors as $key => $value)
          <p>{{ $value }}</p>
          @endforeach
        </div>
      @endif
      
      <tr>
        <th>出典作品名</th>
        <td><input size="30" type="text" class="wide"  name="title" value="{{old('title')}}">
          @if ($errors->has('title'))
            <p class="error-message">{{ $errors->first('title') }}</p>
          @endif
        </td>
      </tr>
      <tr>
        <th>キャラクター名</th>
        <td><input size="30" type="text" class="wide" name="name" value="{{old('name')}}"/>
          @if ($errors->has('name'))
          <p class="error-message">{{ $errors->first('name') }}</p>
        @endif</td>
          
      </tr>
      
      
      <tr>
        <th>修正内容<br/><span>必須</span></th>
        <td><textarea name="details" cols="50" rows="3" value="{{old('details')}}"></textarea></td>
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
                <p class="txt">修正をお約束するものではありません。</p>
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
          <span><input type="submit" value="入力内容の確認" form="myForm"></span>
      </p>
    </div>
  </form>
</div>

@endsection