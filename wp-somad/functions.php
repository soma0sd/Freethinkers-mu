<?php
/**
*
* 메인 함수
*
* @package somad
* @subpackage function
* @since   somad 0.0.1
* @version somad 0.0.2
*
*/

require_once get_template_directory()."/inc/setting-page.php";
require_once get_template_directory()."/inc/setup.php";
require_once get_template_directory()."/inc/module.php";
require_once get_template_directory()."/inc/walker.php";

if( is_admin() ){
  new S0SettingPage();
}
new S0SetupClass();
