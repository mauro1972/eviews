<?php

/**
 * @file
 * template.php
 */
/**
 * Variables preprocess function for the "page" theming hook.
 */
function eviews_preprocess_page(&$vars) {

$highchartPath = libraries_get_path('highcharts');
drupal_add_js($highchartPath . '/js/highcharts.js');

  global $language;
  //get the current language
  $current_lang = $language->language;

$path = drupal_get_path('theme', 'eviews') . '/compass/javascripts/eviews.js';
  if (file_exists($path)) {
    drupal_add_js(drupal_get_path('theme', 'eviews') . '/compass/javascripts/eviews.js');
    $vars['scripts'] = drupal_get_js(); // necessary in D7?
  } 
  // Add information about the number of sidebars.
  if (!empty($vars['page']['sidebar_first']) && !empty($vars['page']['sidebar_second'])) {
    $vars['content_column_class'] = ' class="col-sm-4"';
  }
  elseif (!empty($vars['page']['sidebar_first']) || !empty($vars['page']['sidebar_second'])) {
    $vars['content_column_class'] = ' class="col-sm-8"';
  }
  else {
    $vars['content_column_class'] = ' class="col-sm-12"';
  }

  $mb_menu = array();
  $mb_menu['es'] = menu_tree_all_data('menu-menu-principal-espa-ol');
  $mb_menu['en'] = menu_tree_all_data('menu-main-menu-english');   

  $vars['mb_menu'] = menu_tree_output($mb_menu[$current_lang]);
}

function eviews_preprocess_block(&$vars) {
	//print dpr($vars['block']);
	/* Set shortcut variables */
  $block_id = $vars['block']->module . '-' . $vars['block']->delta;
  $classes = &$vars['attributes_array']['class'];

  /* Add classes based on the block delta */
  switch ($block_id) {
    /* Add .badge class to block #14 */
    case 'superfish-1':
      $classes[] = 'hidden-xs';
      break;
  }
  //print dpr($vars['attributes_array']);
}

function eviews_preprocess_node(&$variables) {
 
  if (isset($variables['field_category'][0]['taxonomy_term'])) {
    $variables['categoria'] = $variables['field_category'][0]['taxonomy_term']->tid;
  }
 
  if($variables['view_mode'] == 'teaser') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type . '__teaser';   
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->nid . '__teaser';
  }
}