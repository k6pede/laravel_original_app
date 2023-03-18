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
      if($('#tab_v').hasClass('selected')){
        $('#tab_v').removeClass('selected');
        $('#tab_v').addClass('not-selected');
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
      if($('#tab_v').hasClass('selected')){
        $('#tab_v').removeClass('selected');
        $('#tab_v').addClass('not-selected');
      }
      $('.input-text-box').attr('name','c');
      console.log('clicked c');
      
    }
  })
  $('#tab_v').on({
    'click': function() {
      if(!$(this).hasClass('selected')){
        $(this).removeClass('not-selected');
        $(this).addClass('selected');
      }
      if($('#tab_t').hasClass('selected')){
        $('#tab_t').removeClass('selected');
        $('#tab_t').addClass('not-selected');
      }
      if($('#tab_c').hasClass('selected')){
        $('#tab_c').removeClass('selected');
        $('#tab_c').addClass('not-selected');
      }
      $('.input-text-box').attr('name','v');
      console.log('clicked v');
    }
  })
})