<?php
/**
*
* 테마 초기화 클래스
*
* @package somad
* @subpackage setup class
* @since   somad 0.0.1
* @version somad 0.0.2
*
*/

class S0SetupClass{

  private $options;

  function __construct(){
    $this->options = get_option( 'S0_setup_options' );
    add_action('wp_head',   array($this, expand_head_html));
    add_action('wp_footer', array($this, expand_footer_html));
    $this->setup_actions();
  }

  function setup_actions(){
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    add_action( 'init', array( $this, registe_nav) );
    add_image_size( 'loop-thumbnail', 200, 200, array( 'center', 'top' ) );
    add_theme_support('custom-logo', array(
      'height'      => 200,
      'width'       => 300,
      'flex-height' => true,
      'flex-width'  => true,
    ));
  }
  function expand_head_html(){
    the_post();
    $theme_src = function($dir){
      return get_template_directory_uri().$dir;};
    $cdnjs_src = function($dir){
      return 'https://cdnjs.cloudflare.com/ajax/libs'.$dir;};
    $google_font = function($dir){
      return 'https://fonts.googleapis.com'.$dir;};
    $list_style = array(
      array($google_font('/earlyaccess/notosanskr.css'),
            array()),
      array($google_font('/earlyaccess/nanumgothiccoding.css'),
            array()),
      array($google_font('/earlyaccess/notosanskr.css'),
            array()),
      array($google_font('/icon?family=Material+Icons'),
            array()),
      array($cdnjs_src('/font-awesome/4.7.0/css/font-awesome.css'),
            array()),
      array($cdnjs_src('/materialize/0.100.2/css/materialize.min.css'),
            array()),
      array($cdnjs_src('/KaTeX/0.9.0-alpha2/katex.min.css'),
            array()),
      array($cdnjs_src('/highlight.js/9.12.0/styles/androidstudio.min.css'),
            array()),
      array($theme_src('/css/somad-common.min.css'),
            array()),
      array($theme_src('/css/somad-laptop.min.css'),
            array('media' => '(min-width:992px)')),
    );
    ?>
    <!-- 포스트 메타 -->
    <meta http-equiv="content-language" content="<?php echo get_locale(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="resource-type" content="document" />

    <?php if( has_excerpt() ): ?>
      <meta name="author" content="<?php get_the_author(); ?>" />
    <?php else: ?>
      <meta name="author" content="<?php get_bloginfo('name'); ?>" />
    <?php endif; ?>

    <meta name="contact" content="<?php bloginfo('admin_email'); ?>" />
    <meta name="copyright" content="<?php echo '(c)'.S0_the_copyright(); ?>" />

    <?php if( has_excerpt() ): ?>
      <meta name="description" content="<?php echo get_the_excerpt(); ?>" />
    <?php else: ?>
      <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php endif; ?>

    <?php if( has_tag() ): ?>
      <meta name="keywords" content="<?php echo $this->the_tags(); ?>" />
    <?php endif; ?>
    <title> <?php bloginfo( 'name' ); ?> <?php wp_title(); ?> </title>
    <?php
    foreach ($list_style as $value) {
      $this->append_css($value[0], $value[1]);
    }
    echo $this->options['google-adsense'];
    echo $this->options['google-analytics'];
    echo $this->options['naver-analytics'];
  }
  function expand_footer_html(){
    $theme_src = function($dir){
      return get_template_directory_uri().$dir;};
    $cdnjs_src = function($dir){
      return 'https://cdnjs.cloudflare.com/ajax/libs'.$dir;};
    $list_script = array(
      $cdnjs_src('/jquery/3.2.1/jquery.min.js'),
      $cdnjs_src('/materialize/0.100.2/js/materialize.min.js'),
      $cdnjs_src('/highlight.js/9.12.0/highlight.min.js'),
      $cdnjs_src('/KaTeX/0.9.0-alpha2/katex.min.js'),
      $cdnjs_src('/KaTeX/0.9.0-alpha2/contrib/auto-render.min.js'),
      $theme_src('/js/theme-common.js'),
    );
    ?>
    <!-- WP-FOOTER -->
    <?php
    foreach ($list_script as $value) {
      $this->append_js($value);
    }
  }

  function the_tags(){
    $posttags = get_the_tags();
    $tagstr = '';
    foreach($posttags as $tag) {
      $tagstr .= $tag->name.', ';
    }
    return substr($tagstr, 0, -2);
  }
  function registe_nav(){
    register_nav_menus( array(
        'nav-menu' => __( 'Nav Menu' ),
        'extra-menu' => __( 'Extra Menu' )
    ) );
  }
  function append_js($src){
    echo "<script src=\"$src\"></script>";
  }
  function append_css($src, $option){
    $defult = array(
      'media' => 'all',
    );
    foreach ($option as $key => $value) {
      if ( array_key_exists( $key, $defult ) ) {
        $defult[$key] = $value;
      }
    }
    $tag = "<link rel=\"stylesheet\" href=\"$src\"";
    foreach ($option as $key => $value) {
      $tag .= "$key=\"$value\"";
    }
    $tag .= '/>';
    echo $tag;
  }

}
