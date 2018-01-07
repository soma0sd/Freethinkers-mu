<?php
/**
 * 메인 템플릿
 *
 * @link
 *
 * @package somad
 * @subpackage template
 * @since   somad 0.0.1
 * @version somad 0.0.1
 */
 ?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'charset' ); ?>">
<head><?php wp_head(); ?></head>
<body>
  <div id="body-warper">
    <?php get_header(); ?>
    <main>
      <div id="content">
        <section>
          <?php
          if ( is_single() ) :
            get_template_part( 'part/single' );
          elseif ( is_page() ) :
            get_template_part( 'part/page' );
          elseif ( is_category() ) :
            get_template_part( 'part/category' );
          elseif ( is_tag() ) :
            get_template_part( 'part/category' );
          elseif ( is_404() ) :
            get_template_part( 'part/404' );
          else :
            echo 'theme error';
          endif;
          ?>
        </section>
      </div>
      <?php get_footer(); ?>
    </main>
    <?php get_sidebar(); ?>
  </div>  <!-- body-warper -->
  <?php wp_footer(); ?>
</body>
</html>
