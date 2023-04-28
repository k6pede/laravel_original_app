
 {{-- ページネーション --}}
 @if(!empty($result))
     @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day, 'result' => $result])
     @endcomponent
 @else
     @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day, ])
     @endcomponent
 @endif
 <div class="character-card">
     @if(!empty($characters) && $characters->count())
         @foreach($characters as $key => $value)
             <div class="card text-center">
                     <div class="card-body d-flex justify-content-center">
                         <div class="text-center">
                             <p class="ruby card-title mb-0">{{$value->ruby}}</p>             
                             <h4 class="name card-title mb-0">{{$value->name}}</h4>            
                         </div>

                         
                         {{-- 管理ユーザ用　スケジュール追加 --}}
                         @if(Auth::check())
                            @if(isset($authgroup))                                
                                <div class="dropdown addevent">

                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-calendar-plus"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item addEventBtn" href="#" data-chara-month={{$value->month}} 
                                            data-chara-month={{$value->month}} 
                                            data-chara-day={{$value->day}} 
                                            data-chara-name={{ $value->name }}
                                            data-chara-title={{ $value->title }}
                                            data-user-id={{ $auths->id }}
                                            data-character-id={{ $value->id }}                      
                                        >AddEvent</a>
                                        </li>
                                        <li>
                                            <form action="/show/character" method="GET">
                                                @csrf
                                                <input type="hidden" name="character_id" value={{ $value->id }}>
                                                <button class="dropdown-item editCharaBtn" type="submit">
                                                    Edit
                                                </a>
                                            </form>
                                        </li>
                                        <li class="pb-0">
                                            <form action="/update/character" method="POST">
                                                @csrf
                                                <input type="hidden" name="character_id" value={{ $value->id }}>
                                                <button class="dropdown-item deleteCharaBtn" type="submit">
                                                    Delete
                                                </a>
                                            </form>
                                        </li>
                                    
                                    </ul>
                                </div>
                            @else
                                <div class="addevent">
                                    <a class="addEventBtn" data-bs-toggle="modal" data-bs-target="#addCharacterEventModal" href="#" 
                                        data-chara-month={{$value->month}} 
                                        data-chara-day={{$value->day}} 
                                        data-chara-name={{ $value->name }}
                                        data-chara-title={{ $value->title }}
                                        {{-- data-user-id={{ $auths->id }} --}}
                                        data-character-id={{ $value->id }}                    
                                        ><i class="fa-regular fa-calendar-plus"></i>
                                    </a>
                                </div>
                            @endif
                            
                         @endif
                         {{-- @auth
                            <div class="dropdown addevent">
                             <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                               
                             </button>
                             <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item addEventBtn" href="#" data-chara-month={{$value->month}} 
                                     data-chara-day={{$value->day}} 
                                     data-chara-name={{ $value->name }}
                                     data-chara-title={{ $value->title }}
                                     data-user-id={{ $auths->id }}
                                     data-character-id={{ $value->id }}
                                 >AddEvent</a>
                                 </li>
                                  <li>
                                     <form action="/show/character" method="GET">
                                         @csrf
                                         <input type="hidden" name="character_id" value={{ $value->id }}>
                                         <button class="dropdown-item editCharaBtn" type="submit">
                                             Edit
                                         </a>
                                     </form>
                                 </li>
                                  <li class="pb-0">
                                     <form action="/update/character" method="POST">
                                         @csrf
                                         <input type="hidden" name="character_id" value={{ $value->id }}>
                                         <button class="dropdown-item deleteCharaBtn" type="submit">
                                             Delete
                                         </a>
                                     </form>
                                 </li>
                               
                             </ul>
                           </div>
                         @endauth --}}
                     </div>
                 <div class="title card-footer text-muted text-end">
                    <a href="/show?title={{ $value->title }}" >{{ $value->title }}
                    </a> 
                 </div>
             </div>
         @endforeach
     @else
     <div class="card">
        <li class="list-group-item">
            <p style="margin-bottom: 0;">該当するキャラクターがいません</p>
          </li>
     </div>
     @endif
 </div>
 {{-- ページネーション --}}
 @if(!empty($result))
     @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day, 'result' => $result])
     @endcomponent
 @else
     @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day, ])
     @endcomponent
 @endif
 
 
