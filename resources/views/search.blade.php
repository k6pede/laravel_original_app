@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection
@section('content')

<div id="contents">
    <div class="wrapper">

        <div class="contents-left">

            {{-- カレンダー --}}
            {{-- @component('components.calendar',[
                'year'                   => $year,
                'month'                  => $month,
                'day'                    => $day,
                'holidaysInCurrentMonth' => $holidaysInCurrentMonth,
                'now'                    => $now, 
                'dates'                  => $dates, 
                'lastMonth'              => $lastMonth, 
                'nextMonth'              => $nextMonth,
                'lastYear'              => $lastYear, 
                'nextYear'              => $nextYear,
                'events'                 => $events])
            @endcomponent --}}

            {{-- キャラクターインデックス --}}
            @component('components.characterIndex',[
                'characters' => $characters])
            @endcomponent

        </div>


        <div class="contents-right">
             {{-- 検索欄 --}}
             @component('components.searchForm',[
                'year' => $year,
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
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'result' => $result,
                ])
            @endcomponent
    
           
        </div>
    </div>

</div>



@endsection