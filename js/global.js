jQuery(document).ready(function($){
  var windowWidth = $(window).width();
  
  if(windowWidth < 960) {
    // resize the h1
    $('h1#page-title').fitText();
  }

  // convert menu lists to dropdowns
  $('ul.menu').mobileMenu({
    prependTo: '.zone-menu', 
    combine: false, 
    switchWidth: 500
  });

  // move the secondary mobile menu 
  $('#mm1').prependTo('#zone-postscript-wrapper');
  
  // set the current page as the selected menu item
  var path = $(location).attr('pathname');
  $('.mnav option[value="' + path + '"]').attr('selected', 'selected');
  
});