$(function(){
  let addE = $('.addEventBtn');
  addE.on('click', function() {
    let $this = $(this);
    let info = $this.data();
    let month = $this.data('chara-month');
    let day = $this.data('chara-day');
    console.log(month);
    console.log(day);

    // $.ajax({
    //   headers: {
    //     'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
    //   },
    //   url: '/event-add',
    //   method: 'POST',
    //   data: {
    //     'month': month,
    //     'day': day,
    //   },
    // })
  
    // .done(function (data) {
    //   console.log('done');
    // })
    // .fail(function () {
    //   console.log('fail');
    // });
  })

})