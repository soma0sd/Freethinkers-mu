<?php
/**
* 카드 루프
*
*
* @package somad
* @subpackage template
* @since   somad 0.0.2
* @version somad 0.0.2
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
  echo '<div class="row s6 m4 l3 box">';
  while( $the_query->have_posts() ):
    $the_query->the_post();
    echo '<div class="col s6 m4 l3">';
    echo '<div class="card white loop-content">';
    if(has_post_thumbnail()):
      echo '<a class="loop-content" href="'.get_the_permalink().'">';
      the_post_thumbnail('loop-thumbnail');
      echo '</a>';
    elseif(wp_get_attachment_image(get_the_ID())):
      echo '<a class="loop-content" href="'.get_the_permalink().'">';
      echo wp_get_attachment_image(get_the_ID(), 'loop-thumbnail');
      echo '</a>';
    else:
      echo '<div class="loop-content">';
      $content = get_the_content();
      $content = preg_replace('/<img[^>]+./' , '' , $content);
      $content = preg_replace("!<svg(.*?)<\/svg>!is" , '' , $content);
      echo $content;
      echo '<a class="post_permalink">';
      echo '</a>';
      echo '</div>';
    endif;
      echo '<a class="title-header" href="'.get_the_permalink().'">';
      echo '<span>'.get_the_title().'</span></a>';
      echo '</div></div><!-- end post box wraper -->';
  endwhile;
endif;
wp_reset_postdata();
echo '</div><!-- end post-loop wraper -->';

// pagination
echo '<div class="col s12 card white center-align">';
echo '<ul class="pagination">';
$page_links = paginate_links(array(
  'prev_next' => FALSE,
  'type' => 'array',
));
$prev_link = get_previous_posts_link('<i class="material-icons">navigate_before</i>');
if(!$prev_link){
  $prev_link='<li class="disabled"><a><i class="material-icons">navigate_before</i></a></li>';
} else {
  $prev_link = '<li class="waves-effect">'.$prev_link.'</li>';
}
$next_link = get_next_posts_link('<i class="material-icons">navigate_next</i>');
if(!$next_link){
  $next_link='<li class="disabled"><a><i class="material-icons">navigate_next</i></a></li>';
} else {
  $next_link = '<li class="waves-effect">'.$next_link.'</li>';
}
if(!is_array($page_links)) {
  unset($page_links);
  $page_links = array('<span aria-current="page" class="page-numbers current">1</span>');
}
array_unshift($page_links, $prev_link);
$page_links[] = $next_link;
foreach ($page_links as $value) {
  if(strpos($value, 'page-numbers current')){
    echo '<li class="active"><a>'.$value.'</a></li>';
  } elseif (strpos($value, 'page-numbers dots')) {
    echo '<li class=""><a>'.$value.'</a></li>';
  } else {
    echo '<li class="waves-effect">'.$value.'</li>';
  }
}
$wp_query = NULL;
$wp_query = $temp_query;
echo '</ul>';
echo '</div><!-- end pagination -->';
?>
