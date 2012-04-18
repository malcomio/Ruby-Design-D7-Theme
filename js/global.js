jQuery(document).ready(function($){
  var windowWidth = $(window).width();
  
  if(windowWidth < 960) {
    // hide twitter
//    $('.block-block-1').addClass('element-invisible');
  }
  
  $('ul.menu').mobileMenu({prependTo: '.zone-menu', combine: false});
//  $('.block-menu-secondary-navigation ul').mobileMenu({prependTo: '.zone-postscript', combine: false});

  // move the secondary mobile menu 
  $('#mm1').prependTo('#zone-postscript-wrapper');
});