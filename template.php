<?php

define('HOMEPAGE', 4);
define('PORTFOLIO', 7);
define('CONTACT', 29);

function rubydesign_alpha_preprocess_region(&$vars) {

  if ($vars['region'] == 'content') {

    $nid = rubydesign_elements_path();

    // don't show the web check link on specific nodes
    $no_webcheck_nodes = array(
//      PORTFOLIO,
      CONTACT,
    );
    $webcheck = $nid && !in_array($nid, $no_webcheck_nodes);
    $vars['webcheck'] = $webcheck;

    // replace the page title on specific nodes
    $slogan_nodes = array(
      HOMEPAGE,
      PORTFOLIO,
    );

    // do special stuff for portfolio page
    if ($nid == PORTFOLIO) {
      $vars['page_title'] = 'Passionate About <span class="design">Design</span>';
    }
    elseif (in_array($nid, $slogan_nodes)) {
      $vars['page_title'] = variable_get('site_slogan', '');
    }
    elseif (array_key_exists('title', $vars)) {
      $vars['page_title'] = $vars['title'];
    }
    $divider_after_title = array(
      'portfolio/service',
    );
    $vars['divider_after_title'] = $nid && in_array($nid, $divider_after_title);
  }
}

function rubydesign_alpha_preprocess_zone(&$vars) {

  $nid = rubydesign_elements_path();

  // add the divider strip on certain pages
  if ($vars['zone'] == 'header') {

    $divider_header_top = array(
      PORTFOLIO,
    );

    $vars['divider_top'] = $nid && in_array($nid, $divider_header_top);

    $divider_header_bottom = array(
      PORTFOLIO,
    );

    $vars['divider_header_bottom'] = $nid && in_array($nid, $divider_header_bottom);
  }
  elseif ($vars['zone'] == 'content') {

    $divider_content_top = array(
//      PORTFOLIO,
    );
    $vars['content_divider_top'] = $nid && in_array($nid, $divider_content_top);

    $divider_content_bottom = array(
//      PORTFOLIO,
      'portfolio/service',
    );

    $vars['content_divider_bottom'] = $nid && in_array($nid, $divider_content_bottom);
  }
}

function rubydesign_elements_path() {
  $views = array('portfolio');

  // get the node ID
  if ((arg(0) == 'node' && is_numeric(arg(1)))) {
    $nid = arg(1);
  }
  elseif (in_array(arg(0), $views)) {
    $nid = arg(0) . '/' . arg(1);
  }
  else {
    $nid = FALSE;
  }
  return $nid;
}