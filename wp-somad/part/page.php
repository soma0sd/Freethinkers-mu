<?php
/**
 * 싱글 페이지
 *
 * @link
 *
 * @package somad
 * @subpackage template part
 * @since   somad 0.0.1
 * @version somad 0.0.1
 */
if ( have_posts() ) :
   while ( have_posts() ) : the_post();
?>
<article>
  <?php the_content(); ?>
  <div id="post-meta">
    <section>
      <i class="material-icons">perm_identity</i>
      <span><?php the_author(); ?>&nbsp;&nbsp;/&nbsp;&nbsp;</span>
      <i class="material-icons">today</i>
      <span><?php the_date('y년 n월 j일'); ?></span>
    </section>
    <?php
    if ( has_category() ){
      echo '<section>';
      foreach (get_the_category() as $cat) {
        echo '<a class="btn cat dp1"';
        echo ' href="'.get_category_link($cat->term_id).'"';
        echo ' >';
        echo $cat->name."</a>\n";
      }
      echo '</section>';
    }
    if ( has_tag() ){
      echo '<section>';
      foreach (get_the_tags() as $tag) {
        echo '<a class="btn tag dp1"';
        echo ' href="'.get_tag_link($tag->term_id).'"';
        echo 'style="background: '.S0_random_color(.1).'" >';
        echo $tag->name."</a>\n";
      }
      echo '</section>';
    }
    ?>
  </div>
</article>
<?php
endwhile;
endif;
?>
