@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection
@section('content')

{{-- <div id="contents" class="container">
  <div style="margin: 2rem 0">
    <a href="/" style="text-decoration: blue">HOME</a>
  </div>

  {{-- 作品の情報 --}}
  {{-- <div class="card mb-3 " style="max-width: 1300px">
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
  </div> --}}

  


{{-- </div> --}} 

<div id="contents">
  <div class="wrapper">

      <div class="contents-left">
          {{-- キャラクターインデックス --}}
          @component('components.characterIndex',[
              'characters' => $characters])
          @endcomponent
      </div>
      <div class="contents-right">

           {{-- 検索欄 --}}
           @component('components.searchForm',[
              'month' => $month,
              'day' => $day,
           ])
           @endcomponent

           <div class="character-info">
            <div clsss="d-flex">

              <h4>           
                  
                  「{{ $result }}」で検索した結果
              </h4>
              <p>{{ $characters->total()}} 件中{{ (($characters->currentPage() -1)* 30)+1  }}〜{{ (($characters->currentPage() -1)* 30) + $characters->count() }}件を表示中</p>
            </div>
          </div>

          {{-- キャラクターの情報 --}}
          @component('components.information',[
              'characters' => $characters,
              'now' => $now,
              'month' => $month,
              'day' => $day,
              'title' => $title,
              ])
          @endcomponent
  
         
      </div>
  </div>

</div>




@endsection
