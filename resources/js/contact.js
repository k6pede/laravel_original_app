$(function(){

  $('.birth-month').on('click', function(e){
    e.preventDefault();

    let value = $(this).data('value');
    $('input[name="birth"]').val(value); 
  })
  
  $('.birth-day').on('click', function(e){
    e.preventDefault();

    let value = $(this).data('value');
    $('input[name="day"]').val(value);
  })

  $('select[name="blood"]').on('change',function(){
    let val = $('select[name="blood"]').val();
    console.log(val);
    console.log('yes');
  })

  


  // $('.form').on('submit', function(){

  //   if(agree){
  //     Swal.fire({
  //       title: '確認',
  //       text: '本当に通信しますか？',
  //       icon: 'question',
  //       showCancelButton: true,
  //       confirmButtonText: 'はい',
  //       cancelButtonText: 'キャンセル',
  //     }).then((result) => {
  //       if (result.isConfirmed) {
  //         $.ajax({
  //           headers: {
  //             'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
  //           },
  //           url: '/eventAdd',
  //           method: 'POST',
  //           data: {
  //             'requestVal': requestVal,
  //             'genderVal': genderVal,
  //             'bloodtypeVal': bloodtypeVal,
  //             'name' : name,
  //             'age' : age,
  //             'ruby' : ruby,
  //             'title' : title,

  //           },
  //         })
        
  //         .done(function (data) {
  //           Swal.fire({
  //             icon: 'success',
  //             position: 'top-end',
  //             toast: true,
  //             title: 'Event added successfully!',
  //             text: 'Success!',
  //           })
  //           console.log('done');
  //         })
  //         .fail(function () {
  //           Swal.fire({
  //             icon: 'error',
  //             position: 'top-end',
  //             toast: true,
  //             title: 'Oops...',
  //             text: 'Something went wrong!',
  //           })
  //           console.log('fail2');
  //         });
          
  //       }
  //     });
  //   }else{
  //     console.log('fail');
  //   }

  // })

  



})