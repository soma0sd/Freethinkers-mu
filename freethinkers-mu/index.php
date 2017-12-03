<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php require_once(get_template_directory().'/layout/meta.php'); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <?php require_once(get_template_directory().'/layout/header.php'); ?>
    </header>
    <content>
      <?php require_once(get_template_directory().'/layout/content.php'); ?>
    </content>
    <footer class="footer">
      <?php require_once(get_template_directory().'/layout/footer.php'); ?>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
