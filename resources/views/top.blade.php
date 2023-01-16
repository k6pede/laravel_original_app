@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection

@section('content')

<div class="main-bg">

</div>

<div class="wrapper">
    <div class="contents-left">
        <div id="calendar">
            <table class="table table-bordered" id="calendar_table">
                <h2 class="text-center">{{ $now->year }}年　{{ $month }}月</h2>
                <div class="month-form">
                    <form action="#" method="GET" id="lastmonth" name="lastmonth" class="justiry-content-start">           
                        <input type="hidden" name="month" value="{{ $lastMonth->month }}" class="lastmonth">
                        <input type="hidden" name="day" value="{{ $day }}" class="lastday">
                        <button type="submit" class="lastmonthbtn"><i class="fa-solid fa-arrow-left"></i> Last</button>
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
                        <th class="">
                            {{ $dayOfWeek }}          
                        </th>
                        @endforeach
        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dates as $date)
                        @if($date->dayOfWeek == 0)
                        <tr>
                        @endif
                            <td
                                @if ($date->month != $month)                      
                                class = "bg-secondary disable_cell"
                                @else
                                id = "day_{{ $date->day }}"
                                class = "currentMonth"
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

        <div class="character-index">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>キャラクターインデックス</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($characters) && $characters->count())
                        @foreach($characters as $key => $value)
                            <tr>
                                <td><a href="">{{ $value->name }}</a></td>       
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">該当するキャラクターがいません。</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            
        </div>
    </div>
    
    <div class="character-card">
      <h2>{{$month}}月{{ $day}}日が誕生日のキャラクター</h2>
      <table class="table table-bordered">
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
                          <td>{{ $value->name }}</td>
                          <td><a href="#" >{{ $value->title }}</a></td>
                          
                      </tr>
                  @endforeach
              @else
                  <tr>
                      <td colspan="10">該当するキャラクターがいません。</td>
                  </tr>
              @endif
          </tbody>
      </table>
            
      {!! $characters->links() !!}
      
    </div>
</div>
@endsection

@section('js')
    <script>

    </script>
@endsection