@extends('layouts.layout')
@section('content')
{{-- <div id = "calendar">
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach(['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
                <th>{{ $dayOfWeek }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dates as $date)
                @if($date->dayOfWeek == 0)
                <tr>
                @endif
                    <td
                        @if ($date->month != $currentMonth)
                        class = "bg-secondary"
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
</div> --}}

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