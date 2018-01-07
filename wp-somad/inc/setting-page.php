<?php
/**
  * 테마 세팅
	*
	* @package somad
	* @subpackage setting page
	* @since   somad 0.0.1
  * @version somad 0.0.1
  */

add_option('S0_setup_options',
  array(
    "google-adsense"   => '',
    "google-analytics" => '',
    "naver-analytics"  => '',
  )
);

class S0SettingPage {
  private $options;
  function __construct() {
    $this->options = get_option( 'S0_setup_options' );
    add_action( "admin_menu", array( $this, admin_menu ) );
    add_action( "admin_init", array( $this, admin_init ) );
  }
  function admin_menu() {
    $title = "SOMAD 설정";
    $slug  = "SOMAD-setting";
    $capability = "edit_themes";
    $function   = array( $this, page_form );
    add_theme_page( $title, $title, $capability, $slug, $function );
  }
  function admin_init() {
    $group       = "SOMAD-setting";
    $option_name = "S0_setup_options";
    $section     = "meta-section-01";
    $display = function($name){return array($this, "display_".$name);};

    register_setting( $section, $option_name );
    add_settings_section($section, "SOMAD 설정", null, $group);
    add_settings_field('adsense', "Google AdSense", $display("adsense"), $group, $section);
    add_settings_field('google-analytics', "Google Analytics", $display("google_analytics"), $group, $section);
    add_settings_field('naver-analytics', "네이버 Analytics", $display("naver_analytics"), $group, $section);
  }
  function page_form() {
    ?>
    <div class="wrap">
      <form method="post" action="options.php">
        <?php settings_fields( "meta-section-01" ); ?>
        <?php do_settings_sections( "SOMAD-setting" ); ?>
        <?php submit_button(); ?>
      </form>
    </div>
    <?php
  }

  function display_adsense(){
    ?>
      <textarea name="S0_setup_options[google-adsense]" cols="50" rows="2"><?php echo $this->options['google-adsense']; ?></textarea>
      <p><a href="https://www.google.com/adsense/" target="_blank">구글 AdSense</a>의 페이지 수준 광고코드를 삽입합니다.</p>
    <?php
  }
  function display_google_analytics(){
    ?>
      <textarea name="S0_setup_options[google-analytics]" cols="50" rows="2"><?php echo $this->options['google-analytics']; ?></textarea>
      <p><a href="https://analytics.google.com" target="_blank">구글 Analytics</a> 추적코드를 삽입합니다</p>
    <?php
  }
  function display_naver_analytics(){
    ?>
      <textarea name="S0_setup_options[naver-analytics]" cols="50" rows="2"><?php echo $this->options['naver-analytics']; ?></textarea>
      <p><a href="http://analytics.naver.com/" target="_blank">네이버 애널리틱스</a> 추적코드를 삽입합니다</p>
    <?php
  }
}
