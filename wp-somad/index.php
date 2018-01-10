<?php
/**
* 메인 템플릿
*
*
* @package somad
* @subpackage template
* @since   somad 0.0.1
* @version somad 0.0.2
*/
get_header();
?>
<main class="row">
  <div id="main-warper" class="col s12">
  <?php
  if ( is_single() ) :
    get_template_part( 'part/single' );
  elseif ( is_page() ) :
    get_template_part( 'part/single' );
  elseif ( is_category() ) :
    get_template_part( 'part/category' );
  elseif ( is_tag() ) :
    get_template_part( 'part/category' );
  elseif ( is_404() ) :
    get_template_part( 'part/404' );
  else :
    get_template_part( 'part/front-page' );
  endif;
  ?>
  </div><!-- main-warper -->
</main>
<?php get_footer(); ?>
<?php get_sidebar(); ?>
