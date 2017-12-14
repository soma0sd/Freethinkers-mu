<div id="post-loop" class="row">
<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="col s12 m6 l6 xl4 card small">
        <?php if(has_post_thumbnail()) : ?>
          <div class="card-image">
            <a class="waves-effect waves-light" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail() ?>
            </a>
            <span class="card-title">
              <span class="right" style="background-color:rgba(0, 0, 0, 0.5);">
                <a class="white-text sans-w5" href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </span>
              <small style="background-color:rgba(0, 0, 0, 0.5);" class="right"><?php the_date('Y. n. j.') ?> <?php the_author() ?> </small>
          </span>
        </div>
        <?php endif; ?>
        <div class="card-content">
          <?php if(!has_post_thumbnail()) : ?>
            <a class="title" href="<?php the_permalink(); ?>">
              <span class="card-title sans-w5" style="font-weight: 500;"><?php the_title(); ?></span>
            </a>
            <small>
              | <?php the_date('Y. n. j.') ?> |
            </small>
            <span class="badge" data-badge-caption="<?php the_author() ?>"></span>
            <hr />
          <?php endif; ?>
            <p><?php the_excerpt() ?></p>
            <div class="list_mask_box"></div>
        </div>
      </div>
  <?php endwhile; ?>
<?php endif; ?>
</div>

<script>
  var delta = 300;
  var timer = null;

  $( window ).on( 'resize', function( ) {
      clearTimeout( timer );
      timer = setTimeout( postListiImgSizing, delta );
  } );

  window.addEventListener( 'resize', function( ) {
      clearTimeout( timer );
      timer = setTimeout( postListiImgSizing, delta );
  }, false );

  function postListiImgSizing( ) {
    $(".card-image").each(function(i, div) {
      img=$(div).find("img");
      img_width=$(img).attr("width");
      img_height=$(img).attr("height");
      div_width=$(div).width();
      div_height=$(div).height();

      img_ratio=img_width/img_height;
      div_ratio=div_width/div_height;
      // 이미지 확대 및 축소
      $(img).width(div_width);
      $(img).height(div_width/img_ratio);
      if ($(img).height() > div_height) {
        $(img).css("margin-top", -((img).height()-div_height)/2+"px")
      } else if ($(img).height() < div_height) {
        $(img).height(div_height);
        $(img).width(div_height*img_ratio);
      }
    });
  }

  $("#post-loop").ready(function() {
   postListiImgSizing();
  });
</script>
