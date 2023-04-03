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


  $('.currentMonth').on({
    'mouseenter': function() {

      // $(this).css("background-color", "skyblue");
      $(this).addClass("hovered-day");

    },
    'mouseleave': function() {

      // $(this).css("background-color", "transparent");
      $(this).removeClass("hovered-day");

    }
})
  // キャラクターインデックスenterイベント
  // $('.list-group-item').on({
  //   'mouseenter': function() {
  //     $(this).css("background-color", "skyblue");
  //   },
  //   'mouseleave': function() {

  //     $(this).css("background-color", "transparent");

  //   }

  // })


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