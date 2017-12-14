<?php
$TPL_DIR = get_template_directory();
$TPL_URL = get_template_directory_uri();

$LAYOUT_DIR = $TPL_DIR . '/layouts';
$MOD_DIR = $TPL_DIR . '/modules';

/* core module import */
require_once($MOD_DIR . '/MaterializeWalkerMainMenu.php'); // Menu Walker
require_once($MOD_DIR . '/MaterializePagination.php'); // Menu Walker
// require_once($CORE_DIR . '/customizer.php'); // Theme Customizer

/* Setup Action */
function freethinkers_setup() {
  global $TPL_URL;
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  register_nav_menus(array('main_menu' => '사이드 메뉴'));
  // CSS IMPORT
  wp_enqueue_style('Material_Icons', "https://fonts.googleapis.com/icon?family=Material+Icons");
  wp_enqueue_style('materialize', $TPL_URL . '/css/materialize.css');
  wp_enqueue_style('fonts', $TPL_URL . '/css/fonts.css');
  wp_enqueue_style('style', $TPL_URL . '/style.css');
  // JS import
  wp_enqueue_script('materialize', $TPL_URL . '/js/materialize.min.js', array(), false, true);
}
add_action( 'after_setup_theme', 'freethinkers_setup' );
