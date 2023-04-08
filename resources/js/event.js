
$(function(){


  $('#liveToastBtn').on('click', function(){
    $('.toast').show();
  })

  let addE = $('.addEventBtn');
  // addE.on('click', function() {

    
  //   let $this = $(this);
  //   let info = $this.data();
  //   let user_id = $this.data('user-id');
  //   let character_id = $this.data('character-id');
  //   let month = $this.data('chara-month');
  //   let day = $this.data('chara-day');
  //   let title = $this.data('chara-title');
  //   let name = $this.data('chara-name');
  //   let eventName = name + '(' + title  +')';
    
  //   Swal.fire({
  //     title: '確認',
  //     text: 'キャラクターの誕生日をスケジュールに追加しますか？',
  //     input: 'text',
  //     icon: 'question',
  //     showCancelButton: true,
  //     showLoaderOnConfirm: true,
  //     confirmButtonText: '追加',
  //     cancelButtonText: 'キャンセル',
  //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       $.ajax({
  //         headers: {
  //           'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
  //         },
  //         url: '/addEvent',
  //         method: 'get',
  //         data: {
  //           'month': month,
  //           'day': day,
  //           'eventName' : eventName,
  //           'user_id' : user_id,
  //           'character_id' : character_id,
  //         },
  //       })
      
  //       .done(function (data) {
  //         Swal.fire({
  //           icon: 'success',
  //           position: 'top-end',
  //           toast: true,
  //           title: 'Event added successfully!',
  //           text: 'Success!',
  //         })
  //         console.log('done');
  //       })
  //       .fail(function () {
  //         Swal.fire({

  //           icon: 'error',
  //           position: 'top-end',
  //           toast: true,
  //           title: 'Oops...',
  //           text: 'Something went wrong!',
  //         })
  //         console.log('fail');
  //       });
        
  //     }
  //   });
    
  // })
  addE.on('click', function() {

    
    let $this = $(this);
    let info = $this.data();
    let user_id = $this.data('user-id');
    let character_id = $this.data('character-id');
    let month = $this.data('chara-month');
    let day = $this.data('chara-day');
    let title = $this.data('chara-title');
    let name = $this.data('chara-name');
    let eventName = name + '(' + title  +')';
    
    Swal.fire({
      title: '確認',
      text: 'キャラクターの誕生日をスケジュールに追加しますか？',
      input: 'text',
      icon: 'question',
      showCancelButton: true,
      showLoaderOnConfirm: true,
      confirmButtonText: '追加',
      cancelButtonText: 'キャンセル',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          headers: {
            'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: '/addEventFromCharactersInfo',
          method: 'get',
          data: {
            'month': month,
            'day': day,
            'eventName' : eventName,
            'user_id' : user_id,
            'character_id' : character_id,
          },
        })
      
        .done(function (data) {
          Swal.fire({
            icon: 'success',
            position: 'top-end',
            toast: true,
            title: 'Event added successfully!',
            text: 'Success!',
          })
          console.log('done');
        })
        .fail(function () {
          Swal.fire({

            icon: 'error',
            position: 'top-end',
            toast: true,
            title: 'Oops...',
            text: 'Something went wrong!',
          })
          console.log('fail');
        });
        
      }
    });
    
  })


  // 新しい予定の作成用モーダルopen
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
    
  })



  $('.eventbtn').on('click', function (event) {

    let $this = $(this);
    let eventdata = $this.data('event');
    console.log(eventdata);
    let start_at = eventdata['start_at'];
    let start_at_ymd = start_at.split(' ')[0];
    let start_at_hm = start_at.split(' ')[1];
    
    
    
    $('.modal-event-title').text(eventdata['title']);
    
    $('.event-id').val(eventdata['id']);
    $('.character-id').val(eventdata['character_id'])
    $('.event-title').val(eventdata['title']);
    $('.event-start-ymd').val(start_at_ymd);
    $('.event-start-hm').val(start_at_hm);
    if(eventdata['end_at'] !== null){
      let end_at_ymd = end_at.split(' ')[0];
      let end_at_hm = end_at.split(' ')[1];
      $('.event-end-ymd').val(end_at_ymd);
      $('.event-end-hm').val(end_at_hm);
    }
    $('.event-description').val(eventdata['description']);
    
  })

  $('#modalCreateBtn').on('click', function(){
    let title = $('#createModal .modal-title').val();
    let start_at_ymd = $('#createModal .event-start-ymd').val();
    let start_at_hm = $('#createModal .event-start-hm').val();
    let end_at_ymd = $('#createModal .event-end-ymd').val();
    let end_at_hm = $('#createModal .event-end-hm').val();
    let description = $('#createModal .event-description').val();
    console.log(start_at_ymd);
    console.log(start_at_hm);
    
    
    $.ajax({
      headers: {
        'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/createUsersEvent',
      type: 'post',
      data: {
        'title': title,
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'start_at_ymd' : start_at_ymd,
        'start_at_hm' : start_at_hm,
        'end_at_ymd' : end_at_ymd,
        'end_at_hm' : end_at_hm,
        'description' : description,
      }
      
    })
  
    .done(function (data) {
      console.log('done');
      $(".toast").removeClass('hide');
      $(".toast").addClass('show');
    })
    .fail(function () {
      console.log('fail');
    });
 
    $('#exampleModal').hide();
    $("body").removeClass("modal-open");
    $(".modal-backdrop").remove();
  })


  $('#modalEditBtn').on('click', function(){
    let title = $('.modal-title').val();
    let event_id = $('.event-id').val();
    let start_at_ymd = $('.event-start-ymd').val();
    let start_at_hm = $('.event-start-hm').val();
    let end_at_ymd = $('.event-end-ymd').val();
    let end_at_hm = $('.event-end-hm').val();
    let description = $('.event-description').val();
    let character_id = $('.character-id').val();
    console.log(description);
    
    
    $.ajax({
      headers: {
        'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: '/editEvent',
      type: 'post',
      data: {
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
      console.log('done');
      $(".toast").removeClass('hide');
      $(".toast").addClass('show');
    })
    .fail(function () {
      console.log('fail');
    });

    $('#exampleModal').hide();
    $("body").removeClass("modal-open");
    $(".modal-backdrop").remove();
    
  })

  $('#modalDeleteBtn').on('click', function(){
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
    })
    .fail(function () {
      console.log('fail');
    });

    $('#exampleModal').hide();
    $("body").removeClass("modal-open");
    $(".modal-backdrop").remove();
    
  })

})