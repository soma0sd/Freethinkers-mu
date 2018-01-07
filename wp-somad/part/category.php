<?php
/**
 * 카테고리 템플릿
 *
 * @link
 *
 * @package somad
 * @subpackage template part
 * @since   somad 0.0.1
 * @version somad 0.0.1
 */
 ?>
<?php if ( have_posts() ) : ?>
<div class="contents-wrap">
<?php  while ( have_posts() ) : the_post(); ?>
  <div class="loop-square dp1">
    <?php
    if(has_post_thumbnail()):
      echo '<a href="'.get_the_permalink().'">';
      the_post_thumbnail('loop-thumbnail');
      echo '</a>';
    else:
      echo '<div class="loop-content">'.get_the_content('', true).'</div>';
      echo '<a class="loop-content" href="'.get_the_permalink().'">';
      echo '</a>';
    endif;
      echo '<a class="title-text vertical-drag">';
      echo get_the_title().'</a>';
    ?>
  </div><!-- end post box wraper -->
  <?php endwhile; ?>
</div><!-- end post-loop wraper -->
 <?php endif; ?>
<div class="pagination">
  <?php
  $page_links = paginate_links(array(
    'prev_next' => FALSE,
    'type' => 'array',
  ));
  if(!$page_links){
    $page_links[] = '<span aria-current="page" class="page-numbers current">1</span>';
  }
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
  ?>
</div><!-- end pagination -->
