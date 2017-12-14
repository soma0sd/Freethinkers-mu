<ul id="slide-out" class="side-nav fixed">
  <li><h1 class="title flow-text center-align serf-w7">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <?php bloginfo( 'name' ); ?>
    </a>
  </h1></li>
  <li class="no-padding">
  <?php
  wp_nav_menu( array(
      'menu'              => 'main_menu',
      'depth'             => 0,
      'container'         => false,
      'container_class'   => 'none',
      'container_id'      => 'main-menu-bar',
      'menu_class'        => 'flow-text no-padding',
      'menu_id'           => 'main-menu',
      'walker'            => new WalkerMainMenu,
  ) );
  ?>
  </li>
</ul>
