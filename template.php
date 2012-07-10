<?php

define('HOMEPAGE', 4);
define('PORTFOLIO', 7);
define('CONTACT', 29);
define('TERMS', 11);
define('SERVICES', 6);
define('ABOUT', 5);

function rubydesign_alpha_preprocess_region(&$vars) {

  if($vars['region'] == 'content') {

    $nid = rubydesign_elements_path();

    // don't show the web check link on specific nodes
    $no_webcheck_nodes = array(
      CONTACT,
    );
    
    if($nid && !in_array($nid, $no_webcheck_nodes)) {
      $vars['webcheck'] = ctools_modal_text_button(t('Contact Us'), 'modalcontact/nojs/contact', t('Contact Us'),  'ctools-modal-modal-popup free-web-check');
    }
    else {
      $vars['webcheck'] = '';
    }

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
    $divider_after_title = array(
      'portfolio/service',
    );
    $vars['divider_after_title'] = $nid && in_array($nid, $divider_after_title);
  }
}

function rubydesign_alpha_process_region(&$vars) {
  if($vars['region'] == 'branding') {
    $vars['logo_img'] = $vars['logo'] ? '<img src="' . $vars['logo'] . '" alt="' . check_plain($vars['site_name']) . '" id="logo" width="168" height="93"/>' : '';
    $vars['linked_logo_img'] = $vars['logo'] ? l($vars['logo_img'], '<front>', array('attributes' => array('rel' => 'home', 'title' => check_plain($vars['site_name'])), 'html' => TRUE)) : '';
  }
}

function rubydesign_alpha_preprocess_zone(&$vars) {

  $nid = rubydesign_elements_path();

  // add the divider strip on certain pages
  if($vars['zone'] == 'header') {

    $divider_header_top = array(
      PORTFOLIO,
    );

    $vars['divider_top'] = $nid && in_array($nid, $divider_header_top);

    $divider_header_bottom = array(
      PORTFOLIO,
    );

    $vars['divider_header_bottom'] = $nid && in_array($nid, $divider_header_bottom);
  }
  elseif($vars['zone'] == 'content') {

    
    $no_divider_content_top = array(
      PORTFOLIO
    );
    $vars['content_divider_top'] = $nid && (!in_array($nid, $no_divider_content_top));

    $no_divider_content_bottom = array(

    );

    $vars['content_divider_bottom'] = $nid && !in_array($nid, $no_divider_content_bottom);
  }
}

function rubydesign_elements_path() {
  $views = array('portfolio');

  // get the node ID
  if((arg(0) == 'node' && is_numeric(arg(1)))) {
    $nid = arg(1);
  }
  elseif(in_array(arg(0), $views)) {
    $nid = arg(0) . '/' . arg(1);
  }
  else {
    $nid = FALSE;
  }
  return $nid;
}