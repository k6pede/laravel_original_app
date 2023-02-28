
@extends('layouts.layout')
@section('content')
<div>
    <table class="table table-bordered">
        <thead>
            <h2>現在時刻は{{ $now }}です</h2>
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
                        @if ($date->month != 1)
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
</div>

{{-- <div class="container">
  <h1>Laravel 8 Pagination Example - ItSolutionStuff.com</h1>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>Name</th>
              <th width="300px;">Anime</th>
          </tr>
      </thead>
      <tbody>
          @if(!empty($characters) && $characters->count())
              @foreach($characters as $key => $value)
                  <tr>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->title }}</td>
                      
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
</div> --}}
@endsection