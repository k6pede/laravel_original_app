{{-- ページネーション --}}
  <div id="pagination">
    
    
    @if($characters->lastPage() > 1)
        <ul class="pagination">
            {{-- 最初へ --}}
            <li class="page-item {{ ($characters->currentPage() == 1) ? 'disabled' : ''}}">
                @if (!empty($month) && !empty($day))
                <a class="page-link" href="{{ $characters->url(1) }}&month={{$month}}&day={{$day}}">≪</a>
                
                @else
                <a class="page-link" href="{{ $characters->url(1) }}">≪</a>                            
                @endif
            </li>
            {{-- 一つ前へ --}}
            <li class="page-item {{ ($characters->currentPage() == 1) ? 'disabled' : ''}}">
                @if (!empty($month) && !empty($day))
                    <a class="page-link" href="{{ $characters->url(1) }}&month={{$month}}&day={{$day}}">
                        <span aria-hidden="true">＜</span>                        
                    </a>
                @else
                    <a class="page-link" href="{{ $characters->url(1) }}">
                        <span aria-hidden="true">＜</span>                        
                    </a>
                @endif
            </li>



            {{-- 中間 --}}
            {{-- @for ($i = 1; $i <= $characters->lastPage(); $i++)
                <li class="page-item {{ ($characters->currentPage() == $i) ? ' active' : ''}}">
                @if (!empty($month) && !empty($day))
                <a class="page-link" href="{{ $characters->url($i) }}&month={{$month}}&day={{$day}}">{{ $i }}</a>
                @else
                <a class="page-link" href="{{ $characters->url($i) }}">{{ $i }}</a>
                @endif
                </li>
            @endfor --}}
            @for ($i = 1; $i <= $characters->lastPage(); $i++)
                @if($i==1 || $i ==$characters->lastPage() || ($i >= $characters->currentPage() -2 && $i <= $characters->currentPage() + 2))
                    <li class="page-item {{ ($characters->currentPage() == $i) ? ' active' : ''}}">
                    @if (!empty($month) && !empty($day))
                    <a class="page-link" href="{{ $characters->url($i) }}&month={{$month}}&day={{$day}}">{{ $i }}</a>
                    @else
                    <a class="page-link" href="{{ $characters->url($i) }}">{{ $i }}</a>
                    @endif
                    </li>
                @elseif ($i == 2 && $characters->currentPage() -2 >= 4)
                    <li class="page-item"><p class="page-link">…</p></li>
                @elseif ($i == 19 && $characters->currentPage() +2 <= $characters->lastPage() -3)
                    <li class="page-item"><p class="page-link">…</p></li>  
                @endif
            @endfor



            {{-- 次へ --}}
            <li class="page=item {{ ($characters->currentPage() == $characters->lastPage()) ? 'disabled':''}}">
                @if (!empty($month) && !empty($day))
                <a class="page-link" href="{{ $characters->url($characters->currentPage()+1) }}&month={{$month}}&day={{$day}}">
                <span aria-hidden="true">＞</span>
                </a>
                @else
                <a class="page-link" href="{{ $characters->url($characters->currentPage()+1) }}&month={{$month}}&day={{$day}}">
                    <span aria-hidden="true">＞</span>
                </a>
                @endif
            </li>
            {{-- 最後へ --}}
            <li class="page-item {{ ($characters->currentPage() == $characters->lastPage()) ? 'disabled':''}}">
                @if (!empty($month) && !empty($day))
                <a class="page-link" href="{{ $characters->url($characters->lastPage())}}&month={{$month}}&day={{$day}}">≫</a>
                @else
                <a class="page-link" href="{{ $characters->url($characters->lastPage())}}">≫</a>
                @endif
            </li>
        </ul>
    @endif
  </div>
