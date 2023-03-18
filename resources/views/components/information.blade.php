
 {{-- ページネーション --}}
 {{-- @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
 @endcomponent --}}
 <div class="character-card character-info">
     @if(!empty($characters) && $characters->count())
     <div class="col-12 character-info">
 
         @foreach($characters as $key => $value)

             <div class="col-6">
                <div class="card">
                    <div class="card-header">
                    <p class="text-center mb-0">{{ $title }}</p>
                    </div>
                    <div class="card-body">
                        <div class="card-body-name">
                            <p class="text-center ruby mb-0">{{ $value->ruby }}</p>
                            <h5 class="card-title text-center">{{ $value->name }}</h5>

                        </div>
                        <div class="card-body-info">
                            <td class="card-text birthday">誕生日</td>
                            <td class="card-text">{{ $value->month }}月{{ $value->day}}日</td><br>
                            
                            <td class="card-text gender">性別</td>
                            <td class="card-text">{{ $value->gender }}</td><br>
                            <td class="card-text gender">血液型</td>
                            <td class="card-text">{{ $value->blood }}</td><br>
                        </div>
                        <div>
                            @auth
                                <div class="create-my-event">
                                    <a class="create-my-event-btn" data-bs-toggle="modal" data-bs-target="#createModal" href="#">
                                        <i class="fa-regular fa-calendar-plus"></i>
                                    </a>
                                </div>
                            @endauth

                        </div>

                    </div>               
                </div>
            </div>
         @endforeach
     </div>
     @else
     <div class="card">
        <li class="list-group-item">
            <p style="margin-bottom: 0;">該当するキャラクターがいません</p>
          </li>
     </div>
     @endif
 </div>
 {{-- ページネーション --}}
 {{-- @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
 @endcomponent --}}