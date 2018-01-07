
$(document).ready(function(){
  $('code').addClass('vertical-drag');
  $('pre').addClass('vertical-drag');
  $('.vertical-drag').mousedown(function(event){
    $(this)
      .data('down', true)
      .data('x', event.clientX)
      .data('scrollLeft', this.scrollLeft)
      .addClass("dragging");
    return false;
  })
    .mouseup(function (event) {
      $(this)
       .data('down', false)
       .removeClass("dragging");
    })
    .mousemove(function (event) {
      if ($(this).data('down') == true) {
        this.scrollLeft = $(this).data('scrollLeft') + $(this).data('x') - event.clientX;
      }
    })
    .css({
      'overflow' : 'hidden',
      'cursor' : '-moz-grab'
    });
  $('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
  renderMathInElement(document.body);
});

function sidebar_close(){
  $('#overlay').fadeOut();
  $('#sidebar').animate({left: '-280px'}, 100);
}
function sidebar_open(){
  $('#overlay').fadeIn();
  $('#sidebar').animate({left: '0px'}, 100);
}

$('.nav-list a').ripple({
          color:'RGBA(0,0,0,0.4)',
          time:'.3s'
        });

$('.submenu-control').click(function(){
  if($(this).hasClass('active')){
    $(this).removeClass('active');
    $(this).next('.sub-menu').slideUp("fast");
  }else{
    $(".nav-list").find('.sub-menu').slideUp("fast");
    $('.submenu-control').removeClass('active');
    $(this).addClass('active');
    $(this).next('.sub-menu').slideDown("fast");
  }
});
