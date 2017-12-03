<?php
require_once(get_template_directory().'/modules/popular_posts.php');
require_once(get_template_directory().'/modules/excerpt_more.php');
require_once(get_template_directory().'/modules/post_image_display.php');

// Setup
function freethinkers_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  register_nav_menus( array(
    'main_menu' => 'Main Menu',
  ) );
  require_once get_template_directory() . '/modules/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'freethinkers_setup' );

// Styles & Scripts
function freethinkers_scripts() {
}
add_action( 'wp_enqueue_scripts', 'freethinkers_scripts' );
