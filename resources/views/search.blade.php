@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection
@section('content')

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
                <h4>           
                    
                    「{{ $result }}」で検索した結果
                </h4>
                <p>{{ $characters->total()}} 件中{{ (($characters->currentPage() -1)* 30)+1  }}〜{{ (($characters->currentPage() -1)* 30) + $characters->count() }}件を表示中</p>
            </div>

            {{-- キャラクターカード --}}
            @component('components.card',[
                'characters' => $characters,
                'now' => $now,
                'month' => $month,
                'day' => $day,
                ])
            @endcomponent
    
           
        </div>
    </div>

</div>



@endsection