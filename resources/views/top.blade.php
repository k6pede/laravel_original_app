@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">

@endsection

@section('content')






<div id="contents">
    {{-- モーダル --}}
    @component('components.modal')
    @endcomponent
    
    {{-- トースト --}}
    @component('components.toast')
    @endcomponent
    
    <div>
        @foreach($events as $key => $value)
        <p>{{$value->title}}</p>
        <p>{{$value->start_at}}</p>
        <p>{{$value->end_at}}</p>
        @endforeach
    </div>

    {{-- @component('components.topform')
    @endcomponent --}}
   
    <div class="wrapper">
        <div class="contents-left">
            {{-- 検索欄 --}}
            @component('components.searchForm')
            @endcomponent
            


            {{-- カレンダー --}}
            @component('components.calendar',[
                'month'                  => $month,
                'day'                    => $day,
                'holidaysInCurrentMonth' => $holidaysInCurrentMonth,
                'now'                    => $now, 
                'dates'                  => $dates, 
                'lastMonth'              => $lastMonth, 
                'nextMonth'              => $nextMonth,
                'events'                 => $events])
            @endcomponent
            

            {{-- キャラクターインデックス --}}
            @component('components.characterIndex',[
                'characters' => $characters])
            @endcomponent
            
           
        </div>
        
        {{-- キャラクターカード --}}
        @component('components.card',[
            'characters' => $characters,
            'now' => $now,
            'month' => $month,
            'day' => $day,
            'eto' => $eto,
            'auths' => $auths,
            'dateStr' => $dateStr,
        ])
        @endcomponent
        
    </div>
</div>


@endsection

