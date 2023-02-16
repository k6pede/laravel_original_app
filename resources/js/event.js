$(function(){
  let addE = $('.addEventBtn');
  addE.on('click', function() {

    
    let $this = $(this);
    let info = $this.data();
    let user_id = $this.data('user-id');
    let month = $this.data('chara-month');
    let day = $this.data('chara-day');
    let title = $this.data('chara-title');
    let name = $this.data('chara-name');
    let eventName = name + '(' + title + ')の誕生日';
    console.log(month);
    console.log(day);
    console.log(eventName);
    
    
    Swal.fire({
      title: '確認',
      text: '本当に通信しますか？',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'はい',
      cancelButtonText: 'キャンセル',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          headers: {
            'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
          },
          url: '/eventAdd',
          method: 'POST',
          data: {
            'month': month,
            'day': day,
            'eventName' : eventName,
            'user_id' : user_id,
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

})