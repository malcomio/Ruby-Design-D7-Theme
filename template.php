<?php

define('HOMEPAGE', 4);
define('PORTFOLIO', 7);

function rubydesign_alpha_preprocess_region(&$vars) {

  if($vars['region'] == 'content') {
    // get the nid
    if(arg(0) == 'node' && is_numeric(arg(1))) {
      $nid = arg(1);
    }
    else {
      $nid = FALSE;
    }
    
    // don't show the web check link on specific nodes
    $no_webcheck_nodes = array(
//      PORTFOLIO,
    );
    $webcheck = $nid && !in_array($nid, $no_webcheck_nodes);
    $vars['webcheck'] = $webcheck;

    // replace the page title on specific nodes
    $slogan_nodes = array(
      HOMEPAGE,
      PORTFOLIO, 
    );

    // do special stuff for portfolio page
    if($nid == PORTFOLIO) {
      $vars['page_title'] = 'Passionate About <span class="design">Design</span>';
    }
    elseif(in_array($nid, $slogan_nodes)) {
      $vars['page_title'] = variable_get('site_slogan', '');
    }
    elseif(array_key_exists('title', $vars)) {
      $vars['page_title'] = $vars['title'];
    }
  }
}

function rubydesign_alpha_preprocess_zone(&$vars) {
  // get the node ID
  if(arg(0) == 'node' && is_numeric(arg(1))) {
    $nid = arg(1);
  }
  else
    $nid = FALSE;

  // add the divider strip on certain pages
  if($vars['zone'] == 'header') {

    $divider_top_nodes = array(
      PORTFOLIO,
    );

    $vars['divider_top'] = $nid && in_array($nid, $divider_top_nodes);

    $divider_header_bottom_nodes = array(
      PORTFOLIO,
    );

    $vars['divider_header_bottom'] = $nid && in_array($nid, $divider_header_bottom_nodes);
  }
  elseif($vars['zone'] == 'content') {

    $content_divider_top_nodes = array(
//      PORTFOLIO,
    );
    $vars['content_divider_top'] = $nid && in_array($nid, $content_divider_top_nodes);

    $content_divider_bottom_nodes = array(
//      PORTFOLIO,
    );

    $vars['content_divider_bottom'] = $nid && in_array($nid, $content_divider_bottom_nodes);
  }
}