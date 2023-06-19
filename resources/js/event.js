//const { error } = require("jquery");

// 数秒後に要素を非表示にする
setTimeout(function() {
  $('.alert-success').hide(300);
}, 3000); 

$(function(){


  $('#liveToastBtn').on('click', function(){
    $('.toast').show();
  })



  // イベント作成用モーダルopen
  $('.create-my-event-btn').on('click', function(){
    
    $('.modal-event-title').val('');
    $('.event-id').val('');
    $('.event-title').val('');
    $('.event-start-ymd').val('');
    $('.event-start-hm').val('');
    $('.event-end-ymd').val('');
    $('.event-end-hm').val('');
    $('.event-description').val('');

    
    $('.modal-event-title').attr('placeholder', '新しい予定');
    $('.modal-event-title').attr('value', '新しい予定');
    
  })


  //登録済みイベントの編集モーダルに値を渡す
  $('.eventbtn').on('click', function (event) {

    let $this = $(this);
    let eventdata = $this.data('event');
    let start_at = eventdata['start_at'];
    let end_at = eventdata['end_at'];
    let start_at_ymd = start_at.split(' ')[0];
    let start_at_hm = start_at.split(' ')[1];
    let event_description = eventdata['description'];
    
    
    
    $('.modal-event-title').text(eventdata['title']);
    
    $('.event-id').val(eventdata['id']);
    $('.character-id').val(eventdata['character_id'])
    $('.event-title').val(eventdata['title']);
    $('.event-start-ymd').text(start_at_ymd);
    $('input.event-start-ymd').val(start_at_ymd);
    $('.event-start-hm').text(start_at_hm);
    $('input.event-start-hm').val(start_at_hm);
    if(eventdata['end_at'] !== null){
      let end_at_ymd = end_at.split(' ')[0];
      let end_at_hm = end_at.split(' ')[1];
      $('input.event-end-ymd').val(end_at_ymd);
      $('input.event-end-hm').val(end_at_hm);
      $('.event-end-ymd').text(end_at_ymd);
      $('.event-end-hm').text(end_at_hm);
    }
    $('.event-description-for-edit').val(event_description);
    
  })

  //ユーザー作成のイベントを作成する
  $('#eventCreateBtn').on('click', function(e){
    e.preventDefault();
    
    let title = $('#createModal .modal-title').val();
    let start_at_ymd = $('#createModal .event-start-ymd').val();
    let start_at_hm = $('#createModal .event-start-hm').val();
    let end_at_ymd = $('#createModal .event-end-ymd').val();
    let end_at_hm = $('#createModal .event-end-hm').val();
    let description = $('#createModal .event-description').val();

    console.log(start_at_hm);
    
    
    $.ajax({
      headers: {
        'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/createUsersEvent',
      type: 'post',
      data: {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'title': title,
        'start_at_ymd' : start_at_ymd,
        'start_at_hm' : start_at_hm,
        'end_at_ymd' : end_at_ymd,
        'end_at_hm' : end_at_hm,
        'description' : description,
      }
      
    })
  
    .done(function () {
      window.location.href = "/"; 
      alert('新しいイベントを作成しました');
    })
    .fail(function (error) {
      if(error.status == 422) {
        let errors = error.responseJSON.errors;
        console.log(errors);
        console.log(start_at_ymd);
        if (errors.title !== null) {
          let titleError = errors.title;
          $('#title_error_create').text(titleError);
        }
        if (errors.start_at_ymd !== null) {
          let startAtError = errors.start_at_ymd;
          $('#start_at_error_create').text(startAtError);
        }
      }
      
      
    });

  })

  //モーダル内　編集確定・削除
  $('#eventEditBtn').on('click', function(e){
    e.preventDefault();

    let title = $('#editModal .modal-event-title').val();
    let event_id = $('#editModal .event-id').val();
    let start_at_ymd = $('#editModal input.event-start-ymd').val();
    let start_at_hm = $('#editModal input.event-start-hm').val();
    let end_at_ymd = $('#editModal input.event-end-ymd').val();
    let end_at_hm = $('#editModal input.event-end-hm').val();
    
    let description = $('textarea.event-description-for-edit').val();
    let character_id = $('.character-id').val();


    
    $.ajax({
      headers: {
        'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/editEvent',
      type: 'post',
      data: {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'title': title,
        'event_id': event_id,
        'start_at_ymd' : start_at_ymd,
        'start_at_hm' : start_at_hm,
        'end_at_ymd' : end_at_ymd,
        'end_at_hm' : end_at_hm,
        'description' : description,
        'character_id' : character_id,
        '_method' : 'put'
      }
      
    })
  
    .done(function (data) {
      window.location.href = "/";
      console.log(start_at_ymd);
      alert('編集内容を保存しました');
    })
    .fail(function (error) {
      console.log(error.status);
      console.log(error.responseJSON.errors.start_at_ymd[0]);
      if(error.status === 422 ) {
        let errors = error.responseJSON.errors;
        console.log(errors);
        if (errors.title !== null) {
          let titleError = errors.title;
          $('#title_error_edit').text(titleError);
        }
        if (errors.start_at_ymd !== null) {
          let startAtError = errors.start_at_ymd;
          $('#start_at_error_edit').text(startAtError);
        }
      }
    });

  })

  //イベント削除
  $('#eventDeleteBtn').on('click', function(){
    let event_id = $('.event-id').val();
    $.ajax({
      headers: {
        'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/deleteEvent',
      type: 'get',
      data: {
        'event_id': event_id,
        '_method': 'DELETE',
      }
      
    })
  
    .done(function (data) {
      console.log('done');
      window.location.href = "/";
    })
    .fail(function () {
      console.log('fail');
    });
    
    window.location.href = "/";
    alert('削除しました');
  })

  //日時入力用フォームopen
  $('.row-btn').on('click', function(e) {
    e.preventDefault();
    $('.start-row').toggle();
    $('.end-row').toggle();
  });

  //日時入力用フォームに入力された値を表示
  $('.event-start-ymd').on('input', function() {
    let startYmd = $(this).val();
    $('span.esy').text('').text(startYmd); 
  });
  
  $('.event-start-hm').on('input', function() {
    let startHm = $(this).val();
    $('span.esh').text('').text(startHm);
  });
  
  $('.event-end-ymd').on('input', function() {
    let endYmd = $(this).val();
    $('span.eey').text('').text(endYmd);
  });
  
  $('.event-end-hm').on('input', function() {
    let endHm = $(this).val();
    $('span.eeh').text('').text(endHm);
  });


})