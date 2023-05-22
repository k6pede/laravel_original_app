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

  $('.nextmonth').on('click', function(){
    $.ajax({
      type: "GET",
      url: "{{ route('updateContent') }}",
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        console.log('nextmonth')
      },
      error: function (error) {
        console.log("Error:", error);
      }
    })
  })

  $('.nextmonthbtn').on('click', function(e) {
    // e.preventDefault();
    
    var month = $('input[name="month"]').val() + 1;
    var day = $('input[name="day"]').val();
    
    $.ajax({
        url: '/calcCalendar',
        method: 'POST',
        data: {
            month: month,
            day: day
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          
        }
        
    });
});
  


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