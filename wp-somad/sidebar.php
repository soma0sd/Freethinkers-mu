<?php
/**
* 사이드바 템플릿
*
*
* @package somad
* @subpackage template
* @since   somad 0.0.1
* @version somad 0.0.2
*/
?>
<ul id="slide-out" class="side-nav fixed">
  <li>
    <div class="user-view">
      <div class="background">
        <?php
        if ( has_custom_logo() ) {
          the_custom_logo();
        } else {
          echo '<img src="'.get_template_directory_uri().'/img/basic_logo.png" />';
        }
        ?>
      </div>
      <?php
      echo '<h1 class="sidebar-header-text"><a href="'.get_bloginfo('url').'">'. get_bloginfo( 'name' ) .'</a></h1>';
      ?>
    </div>
  </li>
  <li class="no-padding">
  <?php
  wp_nav_menu(array(
    'menu'           => 'nav-menu',
    'theme_location' => 'nav-menu',
    'menu_class'     => 'collapsible',
    'container'      => 'ul',
    'walker'         => new S0_Walker_Nav(),
  ) );
  ?>
  </li>
</ul>

<?php wp_footer(); ?>
</body>
</html>
