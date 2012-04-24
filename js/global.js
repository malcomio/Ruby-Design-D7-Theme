jQuery(document).ready(function($){
  var windowWidth = $(window).width();
  
  if(windowWidth < 960) {
    // hide twitter
//    $('.block-block-1').addClass('element-invisible');
  }
  
  $('ul.menu').mobileMenu({prependTo: '.zone-menu', combine: false, switchWidth: 500});

  // move the secondary mobile menu 
  $('#mm1').prependTo('#zone-postscript-wrapper');
  
  // resize the h1
  $('h1#page-title').fitText();
});