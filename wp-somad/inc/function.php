<?php
/**
* 테마 함수
*
* @package somad
* @subpackage functions
* @since somad 0.0.1
* @version somad 0.0.1
*/

function S0_the_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
  ");
  if($copyright_dates) {
    $copyright  = "<i class=\"material-icons\">copyright</i>";
    $copyright .= $copyright_dates[0]->firstdate;
  }
  if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
  }
  if(get_the_author()){
    $copyright .= ' '.get_the_author().'@'.get_bloginfo('name').'. ';
  } else {
    $copyright .= ' '.get_bloginfo('name').'. ';
  }
  $copyright .= "All rights reserved";
  return $copyright;
}

function S0_get_the_title() {
  if ( is_home() ) {
    return get_bloginfo( 'name' );
  } elseif ( is_404() ) {
    return get_bloginfo( 'name' );
  } else {
    $title = get_the_title();
    $title .= ' | '.get_bloginfo( 'name' );
  }
  return $title;
}
function S0_get_post_title() {
  if ( is_home() ) {
    return get_bloginfo( 'name' );
  } elseif ( is_category() ) {
    return '<i class="material-icons">folder_open</i> '.single_term_title( '', FALSE );
  } elseif ( is_tag() ){
    return '<i class="material-icons">label_outline</i> '.single_term_title( '', FALSE );
  } elseif ( is_404() ) {
    return '<i class="material-icons">error_outline</i> 페이지를 찾을 수 없습니다';
  } else {
    return get_the_title();
  }
}

function S0_random_color($alpha=1){
  $R = random_int(0, 255);
  $G = random_int(0, 255);
  $B = random_int(0, 255);
  return "RGBA($R,$G,$B,$alpha)";
}
