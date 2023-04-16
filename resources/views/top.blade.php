@extends('layouts.layout')

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
    

    
    @auth
        <div class="create-my-event">
            <a class="create-my-event-btn" data-bs-toggle="modal" data-bs-target="#createModal" href="#">
                <i class="fa-regular fa-calendar-plus"></i>
            </a>
        </div>
    @endauth
  


    <div class="wrapper">
        <div class="contents-left">

           
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
        <div class="contents-right">

              {{-- 現在表示している年月日 --}}
            <div class="top text-align-center">
                <div class="top-month text-center">
                    <h2>{{ $year }}</h2>                  
                    <h2>{{ $eto }}</h2>
                    <h2>{{ date('F',strtotime($dateStr))}}</h2>
                </div>
                <div class="top-day align-items-center">
                    <div class="day">
                        <h1 class="text-center">{{ $day }}</h1>
                    </div>
                    <div class="day-info">

                    </div> 
                </div>
            </div>

             {{-- 検索欄 --}}
             @component('components.searchForm',[
                'month' => $month,
                'day' => $day,
             ])
             @endcomponent

             <div class="character-info">
                <h4>           
                    {{ $month }}月{{ $day }}日が誕生日のキャラクター
                </h4>
                <p>{{ $characters->total()}} 件中{{ (($characters->currentPage() -1)* 30)+1  }}〜{{ (($characters->currentPage() -1)* 30) + $characters->count() }}件を表示中</p>
            </div>

            {{-- キャラクターカード --}}
            @component('components.card',[
                'characters' => $characters,
                'now' => $now,
                'month' => $month,
                'day' => $day,
                'eto' => $eto,
                'auths' => $auths,
                'dateStr' => $dateStr,])
            @endcomponent
        </div>
        
    </div>
</div>


@endsection

