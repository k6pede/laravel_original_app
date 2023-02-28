@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection
@section('content')

<div id="contents">
    <div class="container">
      <p>{{ $result }}</p>
      <p>という文字列で検索されました</p>
      <p>{{ $characters->total() }}</p>
      @foreach($characters as $key => $value)
        <div class="card text-center mb-1">
            <div class="card-body">
                <h4 class="card-title mb-0"><a href="/show?name={{ $value->name }}">{{$value->name}}</a></h4>             
            </div>
            <div class="card-footer text-muted text-end">
            <a href="/show?title={{ $value->title }}">{{ $value->title }}</a> 
            </div>
        </div>
      @endforeach
    
      {{-- ページネート --}}
        @if($characters->lastPage() > 1)
                    <ul class="pagination">
                        <li class="page-item {{ ($characters->currentPage() == 1) ? 'disabled' : ''}}">
                            <a class="page-link" href="{{ $characters->url(1) }}">最初のページ</a>
                        </li>
                        <li class="page-item {{ ($characters->currentPage() == 1) ? 'disabled' : ''}}">
                            <a class="page-link" href="{{ $characters->url(1) }}">
                            <span aria-hidden="true">≪</span>
                            {{-- previous --}}
                            </a>
                        </li>
                        @for ($i = 1; $i <= $characters->currentPage()+5; $i++)
                            <li class="page-item {{ ($characters->currentPage() == $i) ? ' active' : ''}}">
                            <a class="page-link" href="{{ $characters->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page=item {{ ($characters->currentPage() == $characters->lastPage()) ? 'disabled':''}}">
                            <a class="page-link" href="{{ $characters->url($characters->currentPage()+1) }}">
                            <span aria-hidden="true">≫</span>
                            {{-- next --}}
                            </a>
                        </li>
                        <li class="page-item {{ ($characters->currentPage() == $characters->lastPage()) ? 'disabled':''}}">
                            <a class="page-link" href="{{ $characters->url($characters->lastPage())}}">最後のページ</a>
                        </li>
                    </ul>
         @endif
    </div>

</div>



@endsection