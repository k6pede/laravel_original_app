@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection

@section('content')



<div id="contents">
   

    <div class="wrapper">
        <div class="contents-left">
            {{-- 検索欄 --}}
            @component('components.searchForm')
            @endcomponent
            


            {{-- カレンダー --}}
            @component('components.calendar',[
                'month' => $month,'day' => $day,
                'holidaysInCurrentMonth' => $holidaysInCurrentMonth,
                'now' =>$now, 'dates' => $dates, 
                'lastMonth' => $lastMonth, 
                'nextMonth'=> $nextMonth])
            @endcomponent
            

            {{-- キャラクターインデックス --}}
            @component('components.characterIndex',[
                'characters' => $characters])
            @endcomponent
            
           
        </div>
        
        {{-- キャラクターカード --}}
        <div class="contents-right">
             {{-- 現在表示している年月日 --}}
            <div class="top text-align-center">
                <div class="top-month text-center">
                    <h1>{{ $now->year }}</h1>                  
                    <h1>{{ date('F',strtotime($dateStr))}}</h1>
                    <h1>{{ $eto }}</h1>
                </div>
                <div class="top-day align-items-center">
                    <div class="day">
                        <h1 class="text-center">{{ $day }}</h1>
                    </div>
                    <div class="day-info">
            
                    </div> 
                </div>
            </div>
            <div>
                <h4>           
                    {{$month}}月{{ $day}}日が誕生日のキャラクター
                </h4>
                <p>{{ $characters->total()}} 件中{{ $characters->count() }}件を表示中</p>
                {{-- <form action="" method="GET" class="justify-content-start" class="form-asc">
                    <input type="hidden" name="month" value="{{ $month }}">
                    <input type="hidden" name="day" value="{{ $day }}">
                    <input type="hidden" name="sort" value="asc">
                    <button type="submit">昇順</button>
                </form>
                <form action="" method="GET" class="justify-content-start" class="form-desc">
                    <input type="hidden" name="month" value="{{ $month }}">
                    <input type="hidden" name="day" value="{{ $day }}">
                    <input type="hidden" name="sort" value="desc">
                    <button type="submit">降順</button>
                </form> --}}
            </div>

            @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
            @endcomponent
            <div class="character-card">
                @if(!empty($characters) && $characters->count())
                    @foreach($characters as $key => $value)
                        <div class="card text-center">
                                <div class="card-body">
                                    <p class="card-title mb-0">{{$value->ruby}}</p>             
                                    <h4 class="card-title mb-0">{{$value->name}}</h4>            
                                </div>
                                @auth
                                <div>
                                    <button type="button" class="addEventBtn" 
                                        data-chara-month={{$value->month}} 
                                        data-chara-day={{$value->day}} 
                                        data-chara-name={{ $value->name }}
                                        data-chara-title={{ $value->title }}
                                        data-user-id={{ $auths->id }}
                                        >addEvent
                                    </button>
                                </div>
                            @endauth
                            <div class="card-footer text-muted text-end">
                                <a href="/show?title={{ $value->title }}">{{ $value->title }}</a> 
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="card">
                    <div class="card-body">
                    該当するキャラクターがいません...
                    </div>
                </div>
                @endif
            </div>
            @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
            @endcomponent
            
            
        
        </div>
    </div>
</div>


@endsection

