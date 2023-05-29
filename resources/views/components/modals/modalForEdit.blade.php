{{-- Edit&DElete --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
          <p class="text-center" style="color: green; font-size: 1rem; margin-bottom: 0; margin-left: 0.5em;">イベントを編集</p>         
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
                      <input size="50" type="text" class="modal-title modal-event-title event-title" id="editModalLabel" style="border:none; width: 100%; padding: .5em .5em; border-bottom: 1px solid rgb(199, 199, 199);">    
                  </tr>
                  <p id="title_error_edit" class="error-message" style="padding: .5em 0; margin: 0 0.5em;">
                  </p>
    
                  <tr>
                    <td>
                      <button type="button" class="row-btn" style="border: none; color: rgb(220, 154, 113);">
                        <span class="event-start-ymd esy" style="margin-right: .3em;"></span>
                        <span class="event-start-hm esh" style="margin-right: .3em;"></span>
                        {{ html_entity_decode('&#xFF5E;', ENT_QUOTES, 'UTF-8') }}
                        <span class="event-end-ymd eey" style="margin: 0 .3em; 0 .3em;"></span>
                        <span class="event-end-hm eeh"></span>
                      </button>
                    </td>           
                  </tr>

                  <tr class="start-row" style="display: none;">
                    <td style="padding: .5em .5em;">
                      {{-- start --}}
                      <label for="" style="margin-right: 1em;">開始</label>
                      <input size="10" type="date" class="event-start-ymd" name="start_at">
                      <input size="30" type="time" class="event-start-hm" name="start_at">
                      
                      <p id="start_at_error_edit" class="error-message" style="padding: .5em 0; margin: 0;">
                        {{ $errors->first('start_at') }}
                      </p>                        
                           
                    </td>
                  </tr>
                  <tr class="end-row" style="display: none;">                    
                    <td style="padding: .5em .5em;">
                      {{-- end --}}
                      <label for="" style="margin-right: 1em;">終了</label>
                      <input size="30" type="date" class="event-end-ymd" name="end_at">
                      <input size="30" type="time" class="event-end-hm" name="end_at">
                      @if ($errors->has('end_at'))                        
                          <p class="error-message">{{ $errors->first('end_at') }}</p>                                                                                        
                      @endif                
                    </td>
                  </tr>
                  <tr>
                      <td colspan="3">
                        <textarea row="3" col = '30' class="event-description-for-edit" name="description" style="width: 100%; border-color: rgb(199, 199, 199);" placeholder="メモ"></textarea>
                        @if ($errors->has('description'))
                        <p class="error-message">{{ $errors->first('description') }}</p>
                        @endif
                      </td>                
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
        <button type="button" class="btn btn-primary" id="eventDeleteBtn">削除</button>
        <button type="button" class="btn btn-primary" id="eventEditBtn">保存</button>
      </div>
    </div>
  </div>
</div>