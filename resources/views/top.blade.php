@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection

@section('content')

<div class="main-bg">

</div>

<div id="contents">
    <div class="top-title text-center">
        <h1 class="border">{{ $now->year }}</h1>
        <div>
            <div>

            </div>
            <div></div>
            
        </div>
    </div>

    <div class="wrapper">
        <div class="contents-left">
            {{-- 検索欄 --}}
            <div class="wrap-input-word mb-2">
                <div id="wrap-tab">
                    <span id="tab_t">作品</span>
                    <span id="tab_c">キャラクター</span>
                    <span id="tab_v">声優</span>
                    <script>
                        //どのタブが選択されているかによって、inputのnameを変える
                        //⇨ 検索方法を切り替える
                    </script>
                </div>
                <div class="align-items-center search-box" id="search-box">
                    <input type="text" class="input-text-box" placeholder="キーワード">
                    <input type="submit" class="search-box fas" id="gbox" value="&#xf002;">
                </div>
            </div>


            {{-- カレンダー --}}
            <div id="calendar">
                <table class="table table-bordered table-striped " id="calendar_table">
                    <h2 class="text-center calendar-head">{{ $now->year }}年　{{ $month }}月</h2>
                    {{-- 月送り --}}
                    <div class="month-form">
                        <form action="#" method="GET" id="lastmonth" name="lastmonth" class="justiry-content-start">           
                            <input type="hidden" name="month" value="{{ $lastMonth->month }}" class="lastmonth">
                            <input type="hidden" name="day" value="{{ $day }}" class="lastday">
                            <button type="submit" class="lastmonthbtn"><i class="fa-solid fa-arrow-left"></i> Last</button>
                        </form>
                        
                            <form action="#" method="GET" id="today" name="today" class="today ms-auto">
                                <input type="hidden" name="today" value="{{ $now->month }},{{ $now->day }}">
                                <button type="submit" class="today">Today</button>
                            </form>
                        
                        <form action="#" method="GET" id="nextmonth" class="ms-auto">           
                            <input type="hidden" name="month" value="{{ $nextMonth->month }}">
                            <input type="hidden" name="day" value="{{ $day }}">
                            <button type="submit" class="nextmonth">Next <i class="fa-solid fa-arrow-right"></i></button>
                        </form>
                    </div>

                    <thead class="dayOfWeek">
                        <tr class="dayOfWeekCell">
                            @foreach(['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                            <th class="text-center">
                                {{ $dayOfWeek }}          
                            </th>
                            @endforeach
            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dates as $date)
                            @if($date->dayOfWeek == 0)
                            <tr class="sunday">
                            @endif
                                <td
                                    @if ($date->month != $month)                      
                                    class = "bg-secondary disable_cell text-center"
                                    @else
                                    id = "day_{{ $date->day }}"
                                    class = "currentMonth text-center"
                                    @endif
                                >
                                <form action="" method="GET">
                                    <input type="hidden" name="month" value="{{$date->month}}">
                                    <input type="hidden" name="day" value="{{$date->day}}">
                                    <button type="submit" class="dayButton">{{ $date->day }}</button>
                                </form>
                                </td>
                            @if ($date->dayOfWeek == 6)
                            </tr>
                            @endif
                        @endforeach            
                    </tbody>
                </table>
            </div>

            {{-- キャラクターインデックス --}}
            <div class="card" style="width: 100%">
                <div class="card-header">
                    キャラクターインデックス
                </div>
                <ul class="list-group list-group-flush character-index">
                    @if(!empty($characters) && $characters->count())
                            @foreach($characters as $key => $value)
                                <li class="list-group-item">
                                    <a href="/show?name={{$value->name}}">{{ $value->name }}</a>       
                                </li>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">該当するキャラクターがいません...</td>
                            </tr>
                        @endif

                </ul>

            </div>
           
        </div>
        
        {{-- キャラクターカード --}}
        <div class="character-card">
        <h4>
           
            {{$month}}月{{ $day}}日が誕生日のキャラクター
        </h4>
            @if(!empty($characters) && $characters->count())
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
            @else
            <div class="card">
                <div class="card-body">
                該当するキャラクターがいません...
                </div>
            </div>
            @endif
        {{-- <table class="table table-bordered">
            <thead>
                <tr>
                    <th>キャラクター名</th>
                    <th width="300px;">作品名</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($characters) && $characters->count())
                    @foreach($characters as $key => $value)
                        <tr>
                            <td><a href="/show?name={{ $value->name }}">{{ $value->name }}</a></td>
                            <td><a href="/show?title={{ $value->title }}" >{{ $value->title }}</a></td>                
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">該当するキャラクターがいません。</td>
                    </tr>
                @endif
            </tbody>
        </table> --}}
                
        {!! $characters->links() !!}
        
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>

    </script>
@endsection