<?php
/**
* 싱글 포스트 페이지
*
* @link
*
* @package somad
* @subpackage template part
* @since   somad 0.0.1
* @version somad 0.0.1
*/
?>
<div id="post-meta" class="col s12 card">
  <section class="valign-wrapper">
    <i class="material-icons">perm_identity</i>
    <?php the_author(); ?>&nbsp;&nbsp;/&nbsp;
    <i class="material-icons">today</i>
    <?php the_date('y년 n월 j일'); ?>
  </section>
  <?php
  if ( has_category() ){
    echo '<section>';
    foreach (get_the_category() as $cat) {
      echo '<div class="chip cat valign-wrapper lime lighten-4">';
      echo '<a href="'.get_category_link($cat->term_id).'">';
      echo '<i class="material-icons">folder_open</i>';
      echo $cat->name."</a></div>\n";
    }
    echo '</section>';
  }
  if ( has_tag() ){
    echo '<section>';
    foreach (get_the_tags() as $tag) {
      echo '<div class="chip tag valign-wrapper blue lighten-4">';
      echo '<a href="'.get_tag_link($tag->term_id).'">';
      echo '<i class="material-icons">label_outline</i>';
      echo $tag->name."</a></div>\n";
    }
    echo '</section>';
  }
  ?>
</div>
<article class="col s12 card">
  <?php the_content(); ?>
</article>
