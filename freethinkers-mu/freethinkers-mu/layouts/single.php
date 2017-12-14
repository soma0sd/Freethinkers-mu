<div class="container">
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <h2 class="serf-w6"><?php the_title(); ?></h2>
    <hr />
    <ul>
      <li>Author : <?php the_author(); ?></li>
      <li>Date : <?php echo get_the_date(); ?> <?php echo get_the_time(); ?></li>
      <li>Category : <?php the_category( ', ' ); ?></li>
      <?php if( has_tag() ) : ?>
        <li>Tag : <?php the_tags( '', ' ', '' ); ?></li>
      <?php endif; ?>
    </ul>
    <hr />
    <article>
      <?php the_content(); ?>
    </article>
    <?php
      if ( comments_open() || get_comments_number() ) :
        echo "<hr />";
        comments_template();
      endif;
    ?>
  <?php endwhile; ?>
<?php endif; ?>
