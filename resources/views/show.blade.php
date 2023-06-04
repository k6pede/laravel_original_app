@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection
@section('content')


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

  
        
      </div>
      <div class="contents-right">

           {{-- 検索欄 --}}
           @component('components.searchForm',[
              'month' => $month,
              'day' => $day,
           ])
           @endcomponent

           <div class="character-info">
            <div clsss="d-flex search-result-txt">
              <h4>               
                  「{{ $title }}」で検索した結果
              </h4>
              <p>{{ $characters->total()}} 件中{{ (($characters->currentPage() -1)* 30)+1  }}〜{{ (($characters->currentPage() -1)* 30) + $characters->count() }}件を表示中</p>
            </div>
          </div>

          
          
        </div>
        
      </div>
       {{-- ページネーション --}}
      @if(!empty($title))
        @component('components.pagination',['characters' => $characters, 'title' => $title ])
        @endcomponent
      @endif

      {{-- キャラクター一覧 --}}
      @component('components.information',[
          'characters' => $characters,
          'now' => $now,
          'month' => $month,
          'day' => $day,
          'title' => $title,
          ])
      @endcomponent

</div>




@endsection
