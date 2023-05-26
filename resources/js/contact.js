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

  



})