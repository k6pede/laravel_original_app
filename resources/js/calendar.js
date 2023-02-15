$(function () {

  
  $('.lastmonthbtn').on('click',function(event) {
    // event.preventDefault();

    let form = document.forms["lastmonth"];
    $.ajax( {
      url: "/",
      type: 'get',
      datatype: "json",
      data: $("#lastmonth").serialize(),
      timeout: 10000,
      

    }).done(function(data, textStatus, jqXHR){
      console.log(jqXHR.status);
      console.log('成功');
      
    }).fail(function(data) {
      console.log('失敗');
    })
  })

  // カレンダーenterイベント
  $('.currentMonth').on({
    'mouseenter': function() {

      $(this).css("background-color", "skyblue");

    },
    'mouseleave': function() {

      $(this).css("background-color", "transparent");

    }
})
  // キャラクターインデックスenterイベント
  $('.list-group-item').on({
    'mouseenter': function() {
      $(this).css("background-color", "skyblue");
    },
    'mouseleave': function() {

      $(this).css("background-color", "transparent");

    }

  })

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

  //トップに戻るボタン
  $('#pageTop').on({
    'click': function(){
      $('body,html').animate({
        scrollTop:0
      },200);
      return false;
    }
  })
  
  


 
 
})