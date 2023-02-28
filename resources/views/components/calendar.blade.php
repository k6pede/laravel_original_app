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
                  <input type="hidden" name="month" value="{{ $now->month }}">
                  <input type="hidden" name="day" value="{{ $now->day }}">
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
                      @elseif ($date->month == $month && $date->day == $day)
                      id = "day_{{ $date->day }}"
                      class = "currentMonth text-center selectedDay"
                      style ="background-color: rgba(248, 182, 53, 0.5);"
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
                    @if(!empty($events))
                        @foreach($events as $key => $value)
                            @if(substr(date('Y/m/d', strtotime($value->start_at)), 8) == $date->day)
                                {{-- モーダル呼び出しボタン --}}
                                <div>                                   
                                    <button type="button" class="eventbtn btn btn-primary" data-bs-toggle="modal" data-event="{{$value}}" data-bs-target="#exampleModal">
                                        {{ Str::limit($value->title, 5, '...') }}
                                    </button>                                    
                                </div>
                            @endif
                        @endforeach
                    @endif
                  </td>
              @if ($date->dayOfWeek == 6)
              </tr>
              @endif
          @endforeach            
      </tbody>
  </table>
  {{-- 祝日 --}}
  <div class="holidays">
      <th>&#9632; {{ $now->year }}年　{{ $month }}月の祝日</th><br>
      @foreach($holidaysInCurrentMonth as $holiday)

      <td>{{ $holiday->format('j日') }}</td>
      <td>{{ $holiday->getName() }}</td><br>
      @endforeach
  </div>
  @auth
  <div class="events">
  <th>&#9632;今月のスケジュール</th><br>
    @if(!empty($events))
        @foreach ($events as $key => $value)
        <td>{{$value->title}}</td><br>
        @endforeach
    @endif
    @endauth
  </div> 
</div>