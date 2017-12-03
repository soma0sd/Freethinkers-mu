<?php if ( is_single() ) : ?>
  single
<?php elseif ( is_page() ) : ?>
  page
<?php elseif ( is_category() ) : ?>
  category
<?php elseif ( is_tag() ) : ?>
  tag
<?php elseif ( is_404() ) : ?>
  404
<?php else : ?>
  <?php require_once(get_template_directory().'/layout/index.php'); ?>
<?php endif; ?>
  Pagination
