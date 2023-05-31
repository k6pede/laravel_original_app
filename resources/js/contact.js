$(function(){

  //誕生日入力フォームでの入力補助
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
  })

  //メール送信の非同期通信
  $('#submitConfirmModifyBtn').on('click', function(e) {
    e.preventDefault();
  
    // 入力された値の取得
    let title = $('input[name="title"]').val();
    let name = $('input[name="name"]').val();
    let details = $('input[name="details"]').val();
    let email = $('input[name="email"]').val();
  
    // 取得した値の表示
    console.log('Title:', title);
    console.log('Name:', name);
    console.log('Details:', details);
    console.log('Email:', email);
  
    // メールの送信とthanks.bladeの表示...
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/applyModify',
      type: 'POST',
      data: {
        'action': 'submit',
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'title' : title,
        'name'  : name,
        'details': details,
        'email' : email,
      },
      success: function(response) {
        // メール送信成功時の処理
        window.location.href = "/thanks";
        
      },
      error: function(error) {
        // メール送信エラー時の処理
        console.log('メール送信エラーが発生しました');
        // エラーメッセージの表示など適切な処理を行う
      }
    });

  
  });


})