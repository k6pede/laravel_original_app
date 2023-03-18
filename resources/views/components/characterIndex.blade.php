<div id="character-index" class="card" style="width: 100%">
  <div class="card-header">
      キャラクターインデックス
  </div>
  <ul class="list-group list-group-flush character-index">
      @if(!empty($characters) && $characters->count())               
              @foreach($characters as $key => $value)
                  
                  <li class="list-group-item index-item">
                      <td class="index-num">{{ $key +1}}</td>
                      <a>{{ $value->name }}</a>                       
                      
                  </li>
              @endforeach
          @else
              <li class="list-group-item">
                <p style="margin-bottom: 0;">該当するキャラクターがいません</p>
              </li>
          @endif
  </ul>
</div>