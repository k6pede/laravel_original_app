@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.2/jquery.typeahead.css"
        integrity="sha512-zPDjm5fHC6JUi5jEnhJetvp1zLvc1Dd5TuMFQQtqRH0KpOzrng4vHiFu2Eva+Xgu7umz0lqGHkmGjUYdeSW54w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.2/jquery.typeahead.js"
        integrity="sha512-8+3AF+qMeZ3HSeKKru1YD5pFbXnIxUvMH1UsK8sKbHwbj5ZixBtDP+8oMMkBeaZc8TIIOjHnxN++zCPhHWCrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
  @php
  $months = range(1,12);
  $days = range(1,31); 
  @endphp
<div id="contents">
  <h2 class="text-center mb-4">Edit</h2>
  <div class="d-flex col-12 ">

    <div class="col-12">
      <div class="box_con03">
        <div>
          <p>{{ $character->id }}</p>
          <p>{{ $character->name }}</p>
          <p>{{ $character->ruby }}</p>
          <p>{{ $character->title }}</p>
          <p>{{ $character->month }}</p>
          <p>{{ $character->day }}</p>
          <p>{{ $character->gender }}</p>
          <p>{{ $character->blood }}</p>
        </div>
 
        <form method="POST" action="/edit/character" id="myForm">
          @csrf
          <table class="formTable">
            
            @if($errors->any())
              <div class="mb-3">
                <p class="error-message text-center">※入力内容に誤りがあります。</p>
                
              </div>
            @endif
            <input type="hidden" name="character_id" value={{$character->id}}>
            <tr>
              <th>出典作品名<span>必須</span></th>
              <td><input size="30" 
                type="text" 
                class="wide typeahead"  
                name="title" 
                value={{$character->title}}
                >
                
                @if ($errors->has('title'))
                  <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
              </td>
              
            </tr>
      
            <tr>
              <th>キャラ名<span>必須</span></th>
              <td><input size="20" type="text" class="wide" name="name" value={{$character->name}}>
                @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
              @endif</td>
                
            </tr>
            <tr>
              <th>ふりがな</th>
              <td><input size="20" type="text" class="wide" name="ruby" value={{$character->ruby}}>
                @if ($errors->has('ruby'))
                <p class="error-message">{{ $errors->first('ruby') }}</p>
              @endif</td>
            </tr>
            <tr>
              <th>誕生日（月・日）<span>必須</span></th>
              <td>
                <input type="number" class="short" name="month" value={{$character->month}}>
                <input type="number" class="short" name="day" min="1" max="31" value={{$character->day}}>
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
              <td><input size="10" type="number" class="short" name="age" value={{$character->age}}></td>
            </tr>
            <tr>
              <th>血液型</th>
              <td>
                <select name="blood" class="short" value={{$character->blood}}>
                  <option value="A" >A</option>
                  <option value="B" >B</option>
                  <option value="O" >O</option>
                  <option value="AB">AB</option>
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

            
          </table>
      
          
          <div>
            <p class="btn mx-auto">
                <span><input type="submit" value="キャラクター情報の修正"></span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>


</div>
@endsection