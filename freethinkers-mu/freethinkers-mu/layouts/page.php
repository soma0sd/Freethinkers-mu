<div class="container">
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <ul>
      <li>Author : <?php the_author(); ?></li>
      <li>Date : <?php echo get_the_date(); ?> <?php echo get_the_time(); ?></li>
    </ul>
    <?php the_content(); ?>
    <?php
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    ?>
  <?php endwhile; ?>
<?php endif; ?>
</div>
