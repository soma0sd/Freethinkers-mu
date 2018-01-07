<?php
/**
 * 프론트 페이지 탬플릿
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
          <?php get_template_part( "part/post-loop", 'box' ) ?>
        </section>
        <?php get_footer(); ?>
      </div>
    </main>
  </div>  <!-- body-warper -->
  <?php get_sidebar(); ?>
  <?php wp_footer(); ?>
</body>
</html>
