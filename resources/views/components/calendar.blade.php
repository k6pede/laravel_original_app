<div id="calendar">
  <table class="table table-bordered table-striped " id="calendar_table">
        @auth
        <div>
            <div class="create-my-event">
                <a class="create-my-event-btn" data-bs-toggle="modal" data-bs-target="#createModal" href="#">
                    <i class="fa-regular fa-calendar-plus"></i>
                </a>
            </div>
        </div>
        @endauth

    {{-- 年送り --}}
    <div  class="year-form d-flex">
        <form action="#" method="GET" id="lastyear" name="lastyear" class="justiry-content-start">           
            <input type="hidden" name="year" value="{{ $year-1 }}">
            <input type="hidden" name="month" value="{{ $month }}">
            <input type="hidden" name="day" value="{{ $day }}">
            <button type="submit" class="lastyearbtn"><i class="fa-solid fa-angle-left"></i></button>
        </form>
        <div class="ms-auto">

            <h2 style="display: inline-block;" >{{ $year }}年　{{ $month }}月</h2>
        </div>

        <form action="#" method="GET" id="nextyear" name="nextyear" class="ms-auto">           
            <input type="hidden" name="year" value="{{ $year+1 }}">
            <input type="hidden" name="month" value="{{ $month }}">
            <input type="hidden" name="day" value="{{ $day }}">
            <button type="submit" class="nextyearbtn"><i class="fa-solid fa-angle-right"></i></button>
        </form>
    </div>
      {{-- 月送り --}}
      <div class="month-form">
          <form action="#" method="GET" id="lastmonth" name="lastmonth" class="justiry-content-start"> 
              <input type="hidden" name="year" value="{{ $year}}">          
              <input type="hidden" name="month" value="{{ $lastMonth->month }}" class="lastmonth">
              <input type="hidden" name="day" value="{{ $day }}" class="lastday">
              <button type="submit" class="lastmonthbtn"><i class="fa-solid fa-angle-left"></i></button>
          </form>
          
              <form action="#" method="GET" id="today" name="today" class="today ms-auto">
                  <input type="hidden" name="month" value="{{ $now->month }}">
                  <input type="hidden" name="day" value="{{ $now->day }}">
                  <button type="submit" class="today">Today</button>
              </form>
          
          <form action="#" method="GET" id="nextmonth" class="ms-auto">   
              <input type="hidden" name="year" value="{{ $year}}">                  
              <input type="hidden" name="month" value="{{ $nextMonth->month }}">
              <input type="hidden" name="day" value="{{ $day }}">
              <button type="submit" class="nextmonthbtn"><i class="fa-solid fa-angle-right"></i></button>
          </form>
      </div>

      <thead class="dayOfWeek">
          <tr class="dayOfWeekCell">
              
              @foreach(['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
              <th class="text-center cellOfDay">
                {{ $dayOfWeek }}<br>
                @if($dayOfWeek === '日')
                <p class="mb-0">Sun</p>
                @elseif($dayOfWeek === '月')
                <p class="mb-0">Mon</p>
                @elseif($dayOfWeek === '火')
                <p class="mb-0">Tue</p>
                @elseif($dayOfWeek === '水')
                <p class="mb-0">Wed</p>
                @elseif($dayOfWeek === '木')
                <p class="mb-0">Thu</p>
                @elseif($dayOfWeek === '金')
                <p class="mb-0">Fri</p>
                @elseif($dayOfWeek === '土')
                <p class="mb-0">Sat</p>
                @endif
              </th>
              
              @endforeach

            </tr>
            {{-- <tr class="dayOfWeekCellEn" style="border-top:none;">
                
                @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thi', 'Fri', 'Sat'] as $dayOfWeek)
                <th class="text-center">
                    {{ $dayOfWeek }}   
                </th>
                @endforeach
    
            </tr> --}}
        </thead>
      <tbody>
            @foreach ($dates as $date)
              @if($date->dayOfWeek == 0)
              <tr>
              @endif
                <td
                    @if ($date->month != $month)                      
                    {{-- 今月以外 --}}
                        class = "bg-secondary disable_cell text-center"
     
                    @else                   
                    {{-- 今月の日付 --}}
                        id = "day_{{ $date->day }}"
                        {{-- class ="currentMonth text-center" --}}
                        @if($date->day == $day)
                        {{-- 選択中 --}}
                            style ="background-color: rgba(248, 182, 53, 0.5);"
                        @endif
                        @if(!empty($events))
                            @foreach($events as $key => $value)
                                {{-- イベントがある場合 --}}
                                @if(substr(date('Y/m/d', strtotime($value->start_at)), 8) == $date->day && $date->month == $month)
                                class ="currentMonth text-center has-event"
                                @endif
                            @endforeach
                        @endif
                        class ="currentMonth text-center"
                    @endif                
                >
                    @if(!empty($events))
                        @foreach($events as $key => $value)
                            {{-- イベントがある場合 --}}
                            @if(substr(date('Y/m/d', strtotime($value->start_at)), 8) == $date->day && $date->month == $month)
                                <button class="triangle-button modal-edit-btn eventbtn"
                                data-bs-toggle="modal" 
                                data-event="{{ $value }}" 
                                data-bs-target="#exampleModal">
                                </button>                                
                            @endif
                        @endforeach
                    @endif

                    <form action="" method="GET">
                      <input type="hidden" name="month" value="{{$date->month}}">
                      <input type="hidden" name="day" value="{{$date->day}}">
                      <button type="submit" class="dayButton">{{ $date->day }}</button>
                    </form>
                    
                    {{-- 当月のイベントがある場合表示 --}}
                    {{-- @if(!empty($events))
                        @foreach($events as $key => $value)
                            @if(substr(date('Y/m/d', strtotime($value->start_at)), 8) == $date->day && $date->month == $month)
                                <div>                                                         
                                    <button type="button" class="eventbtn btn btn-primary" data-bs-toggle="modal" data-event="{{$value}}" data-bs-target="#exampleModal" >
                                        {{ Str::limit($value->title, 5, '...') }}
                                    </button>                                    
                                </div>
                            @endif
                        @endforeach
                    @endif --}}
                </td>
              @if ($date->dayOfWeek == 6)
              </tr>
              @endif
            @endforeach            
      </tbody>
  </table>
  {{-- 祝日 --}}
  <div class="holidays">
      <h4>{{ $year }}年　{{ $month }}月の祝日</h4>
      @foreach($holidaysInCurrentMonth as $holiday)

      <td>{{ $holiday->format('j日') }}</td>
      <td>{{ $holiday->getName() }}</td><br>
      @endforeach
  </div>
  @auth
    <div class="events">
        <h4>今月のスケジュール</h4>
        <ul class="event-list">
            @if(!empty($events))
                @foreach ($events as $key => $value)
                <li class="event-list-item">
                    <a href="#" class = "modal-edit-btn eventbtn"
                        data-bs-toggle="modal" 
                        data-event="{{ $value }}" 
                        data-bs-target="#exampleModal"
                        >{{$value->title}}
                    </a>
                </li>
                @endforeach
            @endif
        </ul>
    </div> 
  @endauth
</div>