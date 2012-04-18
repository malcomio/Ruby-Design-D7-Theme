<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
function rubydesign_alpha_preprocess_region(&$vars) {

  if($vars['region'] == 'content') {
    if(arg(0) == 'node' && is_numeric(arg(1))) {
      $nid = arg(1);
    }
    else $nid = FALSE;

    // don't show the web check link on specific nodes
    $no_webcheck_nodes = array(
//      7, // portfolio
    );
        $webcheck = $nid && !in_array($nid, $no_webcheck_nodes);
    $vars['webcheck'] = $webcheck;

   // replace the page title on specific nodes
    $slogan_nodes = array(
      4, // homepage
      7, // portfolio
    );

    if($nid == 7) {
      $vars['theme_hook_suggestions'][] = 'region__content__portfolio';
      $vars['page_title'] = 'Passionate About <span class="design">Design</span>';
    }
    elseif(in_array($nid, $slogan_nodes)) {
      $vars['page_title'] = variable_get('site_slogan', '');
    }
    elseif(array_key_exists ('title', $vars)){
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
      7, // portfolio
    );

    $vars['divider_top'] = $nid && in_array($nid, $divider_top_nodes);

    $divider_header_bottom_nodes = array(
      7, // portfolio
    );

    $vars['divider_header_bottom'] = $nid && in_array($nid, $divider_header_bottom_nodes);
  }
  elseif($vars['zone'] == 'content') {

    $content_divider_top_nodes = array(
//      7, // portfolio
    );

    $vars['content_divider_top'] = $nid && in_array($nid, $content_divider_top_nodes);

    $content_divider_bottom_nodes = array(
//      7, // portfolio
    );

    $vars['content_divider_bottom'] = $nid && in_array($nid, $content_divider_bottom_nodes);
  }
}

function rubydesign_preprocess_node(&$vars) {
 
}