// katex
$(document).ready(function(){
  renderMathInElement(document.body);
});

// Highlight.js
$(document).ready(function() {
  hljs.initHighlightingOnLoad();
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});

// sidebar
$('.button-collapse').sideNav({
  menuWidth: 280,
  edge: 'left',
});
$(document).ready(function() {
  $('.side-nav.fixed li').each( function(index, elem){
    if( $(this).hasClass('current-post-ancestor') || $(this).hasClass('current-post-ancestor') || $(this).hasClass('current-menu-ancestor') || $(this).hasClass('current-page-ancestor') || $(this).hasClass('current-menu-item') ){
      $(this).addClass('active');
      $(this).find('.collapsible-body').css('display', 'block');
    }
  } );
} );
