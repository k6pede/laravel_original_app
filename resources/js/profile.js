$(function(){
  $('#editProfileBtn').on('click', function(e) {
      e.preventDefault();

      // フォームデータを収集
      let profile_username = $('.input-profilename').val();
      let profile_email = $('.input-profileemail').val();
      let subscribe_is_checked = $('.subscriber-check').is(':checked');

      console.log(profile_username);
      console.log(profile_email);
      console.log(subscribe_is_checked);

      $.ajax({
        headers: {
          'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
          url: '/editProfile',
          type: "POST",
          data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'profile-username': profile_username,
            'profile-email': profile_email,
            'subscribe-is-checked': subscribe_is_checked,
          },
          
      })
      .done(function () {
        window.location.href = "/"; 
        alert('登録情報を変更しました');
      })
      .fail(function (error) {
        if(error.status == 422) {
          let errors = error.responseJSON.errors;
  
          if (errors["profile-username"]) {
              $('#username_error').text(errors["profile-username"][0]);
          }
          if (errors["profile-email"]) {
              $('#email_error').text(errors["profile-email"][0]);
          }
        }
      });
  });

});
