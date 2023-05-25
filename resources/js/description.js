const toggleBtn = document.querySelector('.toggle-btn');
const closeBtn = document.querySelector('.close-btn');
const sidebar = document.querySelector('.sidebar');

// toggleBtn.addEventListener('click', () => {
//   if (sidebar.style.left === '-200px') {
//     sidebar.style.left = '0';
//   } else {
//     sidebar.style.left = '-200px';
//   }
// });

// closeBtn.addEventListener('click', () => {
//   if (sidebar.style.left = '-200px') {
//     sidebar.stayle.left = '0px';
//   }
// });


//キャラクターの誕生日イベントの作成
$(function () {

  $('.addEventBtn').on('click', function(event) {
  
    event.preventDefault();
    let $this = $(this);
    const dataAttributes = $this.data();
    let name = $this.data('chara-name');
    let title = $this.data('chara-title');
    let year = $this.data('year');
    let month = $this.data('chara-month');
    
    let day = $this.data('chara-day');
    let user_id = $this.data('user-id');
    let chara_id = $this.data('character-id');

    let start_at = month + '/' + day ;
    let event_title = name + '(' + title + ')の誕生日';

      
    console.log(dataAttributes);
    $('.event-date').text(year + '/' + month + '/' + day );
    $('.event-title').text(event_title);
    
    $('.event-title-form').val(event_title);
    $('.start_at_year').val(year);
    $('.start_at_month').val(month);
    $('.start_at_day').val(day);
  });

  // $('.create-my-event-btn').on('click', function(event) {
  //   event.preventDefault();
  //   let $this = $(this);
  //   const dataAttributes = $this.data();
    
  // })





 
})