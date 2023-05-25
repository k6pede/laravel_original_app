@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection


@section('content')


    <!-- サイドバーのトグルボタン -->
	{{-- <button class="toggle-btn">
		<i class="fas fa-bars"></i>
	</button>
    <!-- サイドバー -->
    <div class="sidebar">
        <div style="padding-top: 24px">
            <button class="close-btn">
                <i class="fas fa-bars"></i>
            </button>
            <ul>
                <li><a href="#">メニュー1</a></li>
                <li><a href="#">メニュー2</a></li>
                <li><a href="#">メニュー3</a></li>
                <li><a href="#">メニュー4</a></li>
                <li><a href="#">メニュー5</a></li>
            </ul>
        </div>
    </div>

    {{-- アラート --}}
    {{--@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif --}}
{{-- <div class="main-visual">
    <img src="{{ asset('images/mainvisual_08.png') }}" alt="Main Visual">
    <div class="description">
    </div>
</div> --}}


<div id="contents">
    {{-- モーダル --}}
    @component('components.modals.modal')
    @endcomponent
    @component('components.modals.modalForCharacterEvents', ['now' => $now, 'year' => $year])
    @endcomponent
    
    {{-- トースト --}}
    @component('components.toast')
    @endcomponent


    <div class="wrapper">

        <div class="contents-left">

           
            {{-- カレンダー --}}
            @component('components.calendar',[
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
            @endcomponent
            

            {{-- キャラクターインデックス --}}
            @component('components.characterIndex',[
                'characters' => $characters])
            @endcomponent
            
           
        </div>

        <div class="contents-right">

            {{-- 検索欄 --}}
            @component('components.searchForm',[
                'year'  => $year,
                'month' => $month,
                'day' => $day,
             ])
            @endcomponent

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

            <div class="todays-character">
                <div class="todays-character-head">
                    <h4>           
                        {{ $month }}月{{ $day }}日が誕生日のキャラクター
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
                    'eto' => $eto,
                    'auths' => $auths,
                    'dateStr' => $dateStr,])
                @endcomponent
            </div>

        </div>
        
    </div>
</div>


@endsection

