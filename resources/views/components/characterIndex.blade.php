<div id="character-index" class="card" style="width: 100%">
  <div class="card-header">
      キャラクターインデックス
  </div>
  <ul class="list-group list-group-flush character-index">
      @if(!empty($characters) && $characters->count())               
              @foreach($characters as $key => $value)
                  
                  <li class="list-group-item index-item">
                      <td class="index-num" style="color:red">{{ $key +1}}</td>
                      <a href="/show?name={{$value->title}}">{{ $value->name }}</a>                         
                  </li>
              @endforeach
          @else
              <tr>
                  <td colspan="10">該当するキャラクターがいません...</td>
                  
              </tr>
          @endif
  </ul>
</div>