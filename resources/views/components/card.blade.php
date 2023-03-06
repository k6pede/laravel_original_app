



<div class="character-info">
    <h4>           
        {{ $month }}月{{ $day }}日が誕生日のキャラクター
    </h4>
    <p>{{ $characters->total()}} 件中{{ (($characters->currentPage() -1)* 30)+1  }}〜{{ (($characters->currentPage() -1)* 30) + $characters->count() }}件を表示中</p>
</div>

 {{-- ページネーション --}}
 @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
 @endcomponent
 <div class="character-card">
     @if(!empty($characters) && $characters->count())
         @foreach($characters as $key => $value)
             <div class="card text-center">
                     <div class="card-body d-flex justify-content-center">
                         <div class="text-center">
                             <p class="ruby card-title mb-0">{{$value->ruby}}</p>             
                             <h4 class="name card-title mb-0">{{$value->name}}</h4>            
                         </div>

                         
                         {{-- ログイン済みユーザ用　スケジュール追加 --}}
                         @if(Auth::check())
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
         <div class="card-body">
         該当するキャラクターがいません...
         </div>
     </div>
     @endif
 </div>
 {{-- ページネーション --}}
 @component('components.pagination',['characters' => $characters,'month' => $month,'day' => $day])
 @endcomponent
 
 
