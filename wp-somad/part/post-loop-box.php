<?php
/**
 * 프론트 페이지 탬플릿
 *
 * @link
 *
 * @package somad
 * @subpackage template part
 * @since   somad 0.0.1
 * @version somad 0.0.1
 */

$args = array(
  'ignore_sticky_posts' => 1,
  'posts_per_page' => get_option( 'posts_per_page' ),
  'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
);
$the_query = new WP_Query( $args );
$temp_query = $wp_query;
$wp_query   = $the_query;

// loop contents
if( $the_query->have_posts() ) :
  echo '<div class="contents-wrap">';
  while( $the_query->have_posts() ):
    $the_query->the_post();
    echo '<div class="loop-square dp1">';
    if(has_post_thumbnail()):
      echo '<a href="'.get_the_permalink().'">';
      the_post_thumbnail('loop-thumbnail');
      echo '</a>';
    else:
      echo '<div class="loop-content" style="background: '.S0_random_color(.2).'">'.get_the_content('', true).'</div>';
      echo '<a class="loop-content" href="'.get_the_permalink().'">';
      echo '</a>';
    endif;
      echo '<a class="title-text vertical-drag">';
      echo get_the_title().'</a>';
      echo '</div><!-- end post box wraper -->';
  endwhile;
endif;
wp_reset_postdata();
echo '</div><!-- end post-loop wraper -->';

// pagination
echo '<div class="pagination">';
$page_links = paginate_links(array(
  'prev_next' => FALSE,
  'type' => 'array',
));
$prev_link = get_previous_posts_link('<i class="material-icons">navigate_before</i>');
if(!$prev_link){
  $prev_link='<a><i class="material-icons">navigate_before</i></a>';
}
$next_link = get_next_posts_link('<i class="material-icons">navigate_next</i>');
if(!$next_link){
  $next_link='<a><i class="material-icons">navigate_next</i></a>';
}
array_unshift($page_links, $prev_link);
$page_links[] = $next_link;
echo implode($page_links);
$wp_query = NULL;
$wp_query = $temp_query;
echo '</div><!-- end pagination -->';
?>
