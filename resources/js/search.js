$(function(){


  //選択したタブによって検索先を変更
  $('#tab_t').on({
    'click': function() {
      if(!$(this).hasClass('selected')){
        $(this).removeClass('not-selected');
        $(this).addClass('selected');
      }
      if($('#tab_c').hasClass('selected')){
        $('#tab_c').removeClass('selected');
        $('#tab_c').addClass('not-selected');
      }
      $('.input-text-box').attr('name','t');
      
      console.log('clicked t');
    }
  })
  $('#tab_c').on({
    'click': function() {
      if(!$(this).hasClass('selected')){
        $(this).removeClass('not-selected');
        $(this).addClass('selected');
        
      }
      if($('#tab_t').hasClass('selected')){
        $('#tab_t').removeClass('selected');
        $('#tab_t').addClass('not-selected');
      }
      $('.input-text-box').attr('name','c');
      console.log('clicked c');
      
    }
  })

  // $('#searchForm').on('submit', function(e) {
  //   e.preventDefault();
  //   let serach_word = $('.input-text-box').val();

  //   if($('.input-text-box').attr('name') === 't') {
  //     $.ajax({
  //       headers: {
  //         'X-CSRF_TOKEN' : $('meta[name="csrf-token"]').attr('content')
  //       },
  //       url: '/search',
  //       type: 'get',
  //       data: {
  //         '_token': $('meta[name="csrf-token"]').attr('content'),
  //         'search_word': serach_word,
  //       }
        
  //     }).done(function(data) {
  //       console.log("Success: ", data);
  //   }).fail(function(xhr, status, error) {
  //       console.log("Error: ", error);
  //   });
  //   }
  //   else if($('.input-text-box').attr('name') === 'c'){

  //   }
  // })

  

})