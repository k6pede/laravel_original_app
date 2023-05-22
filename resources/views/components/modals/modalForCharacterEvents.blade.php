
{{-- CreateCharacterEvent --}}
<div class="modal fade" id="addCharacterEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('addevent') }}">
      @csrf
    <div class="modal-content">
      <div class="modal-header text-center">
        <p class="text-center" style="color: green; font-size: 1rem; margin-bottom: 0; margin-left: 0.5em;">カレンダーにこのイベントを追加しますか？</p>
          {{-- <input  size="30" type="text" class="modal-title modal-event-title event-title" id="exampleModalLabel" style="border:none; "> --}}
        @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="box_con03">
  

              
                <table class="formTable">
                   
                  <tr>
                      <th class="short">日時</th>
                      <td><input type="number" class="start_at_year event-date" name = "year" min="{{ $now->year }}" style="width: 7ch;" value="{{ $year }}"><span class="event-date"></span></td>
                      <input type="hidden" class="start_at_month" name = "month" >                                             
                      <input type="hidden" class="start_at_day" name = "day" >
                  </tr>
                  <tr>
                    <th class="short">タイトル</th>
                    <td class="event-title"></td>
                    <input type="hidden" class="event-title-form" name="event_title">
                  </tr>
                          
                </table>
            
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
              <button type="submit" class="btn btn-primary" id="submitEventBtn">追加</button>
            </div>
          </div>
        </form>
  </div>
</div>

