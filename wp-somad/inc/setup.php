<?php
/**
* 테마 초기화
*
* @package somad
* @subpackage setup class
* @since somad 0.0.1
* @version somad 0.0.1
*/

class S0_theme_setup {
  private $options;
  private $support = array(
    'custom-logo' => array(
      'height'      => 200,
      'width'       => 300,
      'flex-height' => true,
      'flex-width'  => true,
    ),
  );
  private $meta = array(
    'viewport' => 'width=device-width, initial-scale=1, user-scalable=no',
  );
  private $css = array(
    "css/somad-common" => "all",
    "css/somad-tablet" => "(min-width:600px)",
    "css/somad-laptop" => "(min-width:900px)",
    "css/ripple"       => "all",
    "inc/katex/katex"  => "all",
    "inc/highlight_js/styles/androidstudio" => "all",
  );
  private $js = array(
    "jQuery"       => "js/jquery-3.2.1.min.js",
    "ripple"       => "js/ripple.min.js",
    "highlight.js" => "inc/highlight_js/highlight.pack.js",
    "katex"        => "inc/katex/katex.min.js",
    "katex-auto"   => "inc/katex/contrib/auto-render.min.js",
    "common"       => "js/theme-common.js",
  );

  public function __construct(){
    $this->options = get_option( 'S0_setup_options' );
    add_action( 'wp_head',   array( $this, expend_meta ) );
    add_action( 'wp_head',   array( $this, expend_css ) );
    add_action( 'wp_footer', array( $this, expend_js_footer ) );
    $this->expend_support();
    add_image_size( 'loop-thumbnail', 200, 200, array( 'center', 'top' ) );
  }

  public function expend_support(){
    foreach ($this->support as $item => $arg) {
      add_theme_support($item, $arg);
    }
    add_action( 'init', array( $this, register_nav_menu) );
  }
  public function expend_meta(){
    foreach($this->meta as $name => $content) {
      echo $this->append_meta_tag($name, $content);
    }
    echo '<title>'.S0_get_the_title().'</title>';
    echo $this->options['google-adsense'];
    echo $this->options['google-analytics'];
    echo $this->options['naver-analytics'];
  }
  public function expend_css(){
    foreach($this->css as $name => $media) {
      echo $this->append_link_css($name, $media);
    }
  }
  public function expend_js_footer(){
    foreach($this->js as $name => $file) {
      echo $this->append_script($name, $file);
    }
  }
  public function register_nav_menu(){
    register_nav_menus(
      array(
        'nav-menu' => __( 'Nav Menu' ),
        'extra-menu' => __( 'Extra Menu' )
      )
    );
  }

  private function append_meta_tag($name, $content){
    return "<meta name=\"$name\" content=\"$content\" />";
  }
  private function append_link_css($name, $media){
    $src = get_template_directory_uri()."/$name.min.css";
    return "<link rel=\"stylesheet\" href=\"$src\" media=\"$media\" />";
  }
  private function append_script($name, $file){
    $src = get_template_directory_uri()."/$file";
    return "<script id=\"$name\" src=\"$src\" ></script>";
  }
}
