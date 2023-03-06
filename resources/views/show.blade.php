@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection
@section('content')

<div id="contents" class="container">
  <div style="margin: 2rem 0">
    <a href="/" style="text-decoration: blue">HOME</a>
  </div>

  {{-- 作品の情報 --}}
  <div class="card mb-3 " style="max-width: 1300px">
    <div class="card-header">
      <h1 class="text-center">{{ $title }}</h1>
    </div>
    <div class="row g-0">
      <div class="col-md-4">
        <img src="..." alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <tr class="card-text">
            <td>原作</td>
            <td>ああああ</td><br>
            <td>出版社</td>
            <td>ああああ</td><br>
            <td>連載、放映開始日</td>
            <td>ああああ</td>
          </tr>
          <p class="card-text"><small class="text-muted">作者/出版社</small></p>
        </div>
      </div>
    </div>
  </div>

  
  {{-- 作品に所属するキャラクターの情報 --}}
  <div class="container">
    <div>
      <p class="text-center">この作品に登場する主なキャラクター</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="character-card">
      @if(!empty($characters) && $characters->count())
          @foreach($characters as $key => $value)
            
          <div class="col">
            <div class="card h-100">
              <div class="card-header">
                <p class="text-center mb-0">{{ $title }}</p>
              </div>
              <div class="card-body">
                <p class="text-center ruby">{{ $value->ruby }}</p>
                <h5 class="card-title text-center">{{ $value->name }}</h5>
                <td class="card-text birthday">誕生日</td>
                <td class="card-text">{{ $value->month }}月{{ $value->day}}日</td><br>
              
                <td class="card-text gender">性別</td>
                <td class="card-text">{{ $value->gender }}</td><br>
                <td class="card-text gender">血液型</td>
                <td class="card-text">{{ $value->blood }}</td><br>
                
                
              </div>
              
            </div>
          </div>
        @endforeach
        @else
        <li colspan="10">該当するキャラクターがいません。</td>
      @endif
    </div>
  </div>

</div>



@endsection
