<?php
function materialize_paginations(){
  $big = 99999;
  $output = paginate_links(array(
  	'base'               => str_replace($big,'%#%',esc_url( get_pagenum_link($big))),
  	'format'             => '?paged=%#%',
    'current'            => max(1, get_query_var('paged')),
    'custom_query'       => false,
    'prev_text'          => __('<i class="material-icons">chevron_left</i>'),
    'next_text'          => __('<i class="material-icons">chevron_right</i>'),
    'type'               => 'list',
    'prev_next'          => true,
  ) );

  echo $output;
}
