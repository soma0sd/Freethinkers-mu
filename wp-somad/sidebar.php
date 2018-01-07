<?php
/**
  * 사이드바 템플릿
	*
	* @package somad
	* @subpackage template
	* @since   somad 0.0.1
  * @version somad 0.0.1
  */
?>
<div id="overlay" onclick="sidebar_close()"></div>
<nav id="sidebar" class="dp1">
  <a class="sidebar-header-link" href="<?php bloginfo('url'); ?>">
    <?php
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    if ( has_custom_logo() ) {
      echo '<img class="sidebar-header-img" src="'. esc_url( $logo[0] ) .'">';
    }
    echo '<h1 class="sidebar-header-text">'. get_bloginfo( 'name' ) .'</h1>';
    ?>
  </a>
  <?php
  wp_nav_menu(array(
    'menu'           => 'nav-menu',
    'theme_location' => 'nav-menu',
    'menu_class'     => 'list-box nav-list',
    'container'      => false,
    'walker'         => new S0_Walker_Nav(),
  ) );
  ?>
</nav>
