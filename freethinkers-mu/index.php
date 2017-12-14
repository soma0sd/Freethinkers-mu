<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
  <?php require_once($LAYOUT_DIR . '/head.php'); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="navbar-fixed hide-on-large-only">
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo serf-w7"><?php bloginfo( 'name' ); ?></a>
        <a href="#" data-activates="slide-out" class="button-collapse">
          <i class="material-icons">menu</i>
        </a>
      </div>
    </nav>
  </header>
  <main>
    <?php if ( is_single() ) : ?>
      <?php require_once($LAYOUT_DIR . '/single.php'); ?>
    <?php elseif ( is_page() ) : ?>
      <?php require_once($LAYOUT_DIR . '/page.php'); ?>
    <?php elseif ( is_category() ) : ?>
      <h2>Category : <?php single_cat_title(); ?></h2>
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php endwhile; ?>
        <?php endif; ?>
    <?php elseif ( is_tag() ) : ?>
      <h2>Tag : <?php single_tag_title(); ?></h2>
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php endwhile; ?>
        <?php endif; ?>
    <?php elseif ( is_404() ) : ?>
      <p>Page Not Found</p>
    <?php else : ?>
      <?php require_once($LAYOUT_DIR . '/list_post.php'); ?>
    <?php endif; ?>
      <?php materialize_paginations(); ?>
  </main>
  <?php require_once($LAYOUT_DIR . '/footer.php'); ?>
  <?php require_once($LAYOUT_DIR . '/sidebar.php'); ?>
  <?php wp_footer(); ?>
  <script>
  $('.button-collapse').sideNav({
        menuWidth: 300,
        edge: 'left',
        closeOnClick: true,
        draggable: true
      } );
  $("ul.page-numbers").addClass('pagination center');
  $("ul.page-numbers li").each(function(i, el) {
    if($(el).find("span").hasClass("current") === true){
      $(el).addClass('active');
      $(el).html('<a>'+$(el).find("span").html()+'</a>');
    }
    $(el).addClass('waves-effect');
  });
  </script>
</body>
</html>
