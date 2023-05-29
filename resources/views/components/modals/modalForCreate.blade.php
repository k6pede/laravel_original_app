{{-- Create --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <p class="text-center" style="color: green; font-size: 1rem; margin-bottom: 0; margin-left: 0.5em;">イベントを新たに作成する</p>         
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
          <div class="box_con03">
  

              <form method="POST" action="{{ route('createusersevent') }}">
                @csrf
                <table class="formTable">

                  <tr style="padding: .5em;">
                      <input size="30" name="title" type="text" class="modal-title modal-event-title event-title" id="createModalLabel" style="border:none; width: 100%; padding: .5em .5em; border-bottom: 1px solid rgb(199, 199, 199);">    
                  </tr>
                  <p id="title_error_create" class="error-message" style="padding: .5em 0; margin: 0 0.5em;">
                  </p>

                  <tr>
                    <td>
                      <button class="row-btn" style="border: none; color: rgb(220, 154, 113);">
                        <span class="esy" style="margin-right: .3em;"></span>
                        <span class="esh" style="margin-right: .3em;"></span>
                        {{ html_entity_decode('&#xFF5E;', ENT_QUOTES, 'UTF-8') }}
                        <span class="eey" style="margin: 0 .3em; 0 .3em;"></span>
                        <span class="eeh"></span>
                      </button>
                    </td>           
                  </tr>

                  <tr class="start-row" style="display: none;">
                    <td style="padding: .5em;">
                      {{-- start --}}
                      <label style="margin-right: 1em;">開始</label>
                      <input size="10" type="date" class="event-start-ymd" name="start_at_ymd">
                      <input size="30" type="time" class="event-start-hm" name="start_at_hm">                                         
                      
                       <p id="start_at_error_create" class="error-message" style="padding: .5em 0; margin: 0;">
                        {{-- {{ $errors->first('start_at') }} --}}
                       </p>                                                                                     
                    </td>
                  </tr>

                  <tr class="end-row" style="display: none;">                    
                    <td style="padding: .5em;">
                      {{-- end --}}
                      <label style="margin-right: 1em;">終了</label>
                      <input size="30" type="date" class="event-end-ymd" name="end_at_ymd">
                      <input size="30" type="time" class="event-end-hm" name="end_at_hm">
                      @if ($errors->has('end_at'))                        
                          <p class="error-message">{{ $errors->first('end_at') }}</p>                                                                                        
                      @endif                
                    </td>
                  </tr>
                  <tr>
                      <td colspan="3">
                        <textarea row="3" col = '30' class="event-description" name="description" placeholder="メモ" style="width: 100%; border-color: rgb(199, 199, 199);">
                        </textarea>              
                  </tr>
                </table>
            
                
                {{-- <div>
                  <p class="btn mx-auto">
                      <span><input type="submit" value="送信"></span>
                  </p>
                </div> --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                  <button type="submit" class="btn btn-primary" id="eventCreateBtn">追加</button>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
</div>