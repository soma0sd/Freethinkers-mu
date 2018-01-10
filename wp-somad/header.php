<?php
/**
* Footer
*
*
* @package somad
* @subpackage template
* @since   somad 0.0.1
* @version somad 0.0.2
*/
?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'charset' ); ?>">
<head>
 <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<nav class="z-depth-2 row">
  <div class="nav-wrapper col s12 l11 offset-l1">
    <ul class="left">
      <li>
        <a data-activates="slide-out" class="button-collapse">
          <i class="material-icons">menu</i>
        </a>
      </li>
      <li class="title valign-wrapper"><?php echo S0_get_post_title(); ?></li>
    </ul>
  </div> <!-- nav-wrapper -->
</nav>
<div id="body-warper" class="grey lighten-2 row">
<header class="grey lighten-3 row">
  <div id="header-warper" class="col s12">
  </div>
</header>
