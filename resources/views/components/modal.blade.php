<!-- Modal -->
{{-- Edit&DElete --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form action="#">
          @csrf
          <input  size="30" type="text" class="modal-title modal-event-title event-title" id="exampleModalLabel" style="border:none; width:100%; ">
        </form>
        @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="box_con03">
  

              <form method="POST" action="{{ route('editevent') }}" id="myForm">
                @csrf
                <input type="hidden" class="event-id" name="event_id" >
                <input type="hidden" class="character-id" name="character_id" >
                <table class="formTable">
    
                  <tr>
                      <th class="wide">開始<span>必須</span></th>
                      <td><input size="30" type="date" class="wide event-start-ymd" name="start_at"></td>
                      <td><input size="30" type="time" class="wide event-start-hm" name="start_at"></td>
                      <td>
                        @if ($errors->has('start_at'))
                        <p class="error-message">{{ $errors->first('start_at') }}</p>
                        @endif                
                      </td>                                                                
                  </tr>
                  <tr>
                      <th class="wide">終了</th>
                      <td><input size="30" type="date" class="wide event-end-ymd" name="start_at"></td>
                      <td><input size="30" type="time" class="wide event-end-hm" name="start_at"></td>
                      <td>
                        @if ($errors->has('end_at'))
                        <p class="error-message">{{ $errors->first('end_at') }}</p>
                        @endif                
                      </td>                                                                
                  </tr>
                  
                  
                  
                  <tr>
                      <th>詳細</th>
                      <td><textarea row="5" col = '30' class="wide event-description" name="description" style="width: 100%;"></textarea>
                        @if ($errors->has('description'))
                        <p class="error-message">{{ $errors->first('description') }}</p>
                      @endif</td>                
                  </tr>
                </table>
            
                
                {{-- <div>
                  <p class="btn mx-auto">
                      <span><input type="submit" value="送信"></span>
                  </p>
                </div> --}}
              </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
        <button type="button" class="btn btn-primary" id="modalDeleteBtn">削除</button>
        <button type="button" class="btn btn-primary" id="modalEditBtn">保存</button>
      </div>
    </div>
  </div>
</div>

{{-- Create --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form action="#">
          @csrf
          <input  size="30" type="text" class="modal-title modal-event-title event-title" id="exampleModalLabel" style="border:none; width:100%; ">
        </form>
        @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="box_con03">
  

              <form method="POST" action="{{ route('createevent') }}">
                @csrf
              
                <table class="formTable">
    
                  <tr>
                      <th class="wide">開始<span>必須</span></th>
                      <td><input size="30" type="date" class="wide event-start-ymd" name="start_at"></td>
                      <td><input size="30" type="time" class="wide event-start-hm" name="start_at"></td>
                      <td>
                        @if ($errors->has('start_at'))
                        <p class="error-message">{{ $errors->first('start_at') }}</p>
                        @endif                
                      </td>                                                                
                  </tr>
                  <tr>
                      <th class="wide">終了</th>
                      <td><input size="30" type="date" class="wide event-end-ymd" name="start_at"></td>
                      <td><input size="30" type="time" class="wide event-end-hm" name="start_at"></td>
                      <td>
                        @if ($errors->has('end_at'))
                        <p class="error-message">{{ $errors->first('end_at') }}</p>
                        @endif                
                      </td>                                                                
                  </tr>
                  
                  
                  
                  <tr>
                      <th>詳細</th>
                      <td><textarea row="5" col = '30' class="wide event-description" name="description" style="width: 100%;"></textarea>
                        @if ($errors->has('description'))
                        <p class="error-message">{{ $errors->first('description') }}</p>
                      @endif</td>                
                  </tr>
                </table>
            
                
              </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
        <button type="button" class="btn btn-primary" id="modalCreateBtn">追加</button>
      </div>
    </div>
  </div>
</div>

