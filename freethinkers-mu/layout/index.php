
<div class="container">
  <div class="row">
    <?php $popular = new WP_Query(array(
      'posts_per_page' => 3,
      'meta_key'       => 'popular_posts',
      'orderby'        => 'meta_value_num',
      'order'          => 'DESC'
    ));
  	while ($popular->have_posts()) :
      $popular->the_post();
    ?>
    <div class="col-xs-12 col-sm-12 col-md-4 popular-loop-box">
      <div class="popular-loop-img img-responsive hidden-xs hidden-sm" style="background-image: url(<?php echo post_image_display(full); ?>)"></div>
      <div>
      <a class="post_title" href="<?php the_permalink(); ?>">
        <?php the_title(); ?></a>
      <?php the_excerpt(); ?>
      </div>
    </div>
  	<?php endwhile; wp_reset_postdata(); ?>
  </div>
</div>

<div class="container">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php the_excerpt(); ?>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
