<?php
drupal_add_css(path_to_theme().'/css/ie.css', array(
  'group' => CSS_THEME,
  'weight' => 111,
  'browsers' => array(
    'IE' => 'lte IE 8',
    '!IE' => FALSE
    ),
  'preprocess' => FALSE)
);