@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection

@section('content')
<div>
    {{-- ここid="calendarにしたら別のカレンダーが出てきよる fullcalendar?" --}}
    <table class="table table-bordered">
        <h1 class="m-0">{{ $month }}月</h1>
        <thead>
            <tr>
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
                    {{ $date->day }}
                    </td>
                @if ($date->dayOfWeek == 6)
                </tr>
                @endif
            @endforeach            
        </tbody>
    </table>
</div>

<div class="container">
  <h1>Laravel 8 Pagination Example - ItSolutionStuff.com</h1>
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
                  <td colspan="10">There are no data.</td>
              </tr>
          @endif
      </tbody>
  </table>
        
  {!! $characters->links() !!}
</div>
@endsection