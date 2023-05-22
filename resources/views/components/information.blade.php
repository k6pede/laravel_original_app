


 {{-- ページネーション --}}
 {{-- @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
 @endcomponent --}}
 <div class="character-card character-info">
     @if(!empty($characters) && $characters->count())
     <div class="col-12 character-info">
 
         @foreach($characters as $key => $value)

             <div class="card-info">
                <div class="card">
                    <div class="card-header">
                    <p class="text-center mb-0">{{ $title }}</p>
                            @auth
                                <div class="addevent-show">
                                    <a class="addEventBtn" data-bs-toggle="modal" data-bs-target="#addCharacterEventModal" href="#" 
                                        data-chara-month={{$value->month}} 
                                        data-chara-day={{$value->day}} 
                                        data-chara-name={{ $value->name }}
                                        data-chara-title={{ $value->title }}
                                        data-character-id={{ $value->id }}                    
                                        ><i class="fa-regular fa-calendar-plus"></i>
                                    </a>
                                </div>
                            @endauth
                    </div>
                    <div class="card-body">
                        <div class="card-body-name">
                            <p class="text-center ruby mb-0">{{ $value->ruby }}</p>
                            <h5 class="text-center">{{ $value->name }}</h5>

                        </div>
                        <div class="card-body-info">
                            <td class="card-text birthday">誕生日</td>
                            <td class="card-text">{{ $value->month }}月{{ $value->day}}日</td><br>
                            
                            <td class="card-text gender">性別</td>
                            <td class="card-text">{{ $value->gender }}</td><br>
                            <td class="card-text gender">血液型</td>
                            <td class="card-text">{{ $value->blood }}</td><br>
                        </div>
                            
                            @auth
                            <div class="addevent-show">
                                <a class="addEventBtn" data-bs-toggle="modal" data-bs-target="#addCharacterEventModal" href="#" 
                                    data-chara-month={{$value->month}} 
                                    data-chara-day={{$value->day}} 
                                    data-chara-name={{ $value->name }}
                                    data-chara-title={{ $value->title }}
                                    data-character-id={{ $value->id }}                    
                                    ><i class="fa-regular fa-calendar-plus"></i>
                                </a>
                            </div>
                            @endauth

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