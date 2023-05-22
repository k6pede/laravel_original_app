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

$(function () {

  $('.addEventBtn').on('click', function(event) {
  
    event.preventDefault();
    let $this = $(this);
    const dataAttributes = $this.data();
    let name = $this.data('chara-name');
    let title = $this.data('chara-title');
    let month = $this.data('chara-month');
    let day = $this.data('chara-day');
    let user_id = $this.data('user-id');
    let chara_id = $this.data('character-id');

    let start_at = month + '月 ' + day + '日';
    let event_title = name + '(' + title + ')の誕生日';

      
    console.log(dataAttributes);
    $('.event-date').text('年 '+start_at);
    $('.event-title').text(event_title);
    
    $('.event-title-form').val(event_title);
    $('.start_at_month').val(month);
    $('.start_at_day').val(day);
  });

  // $('.create-my-event-btn').on('click', function(event) {
  //   event.preventDefault();
  //   let $this = $(this);
  //   const dataAttributes = $this.data();
    
  // })





 
})