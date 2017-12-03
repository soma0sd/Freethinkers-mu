<?php
// 요약 뒤에 붙는 문구
function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
          esc_url( get_permalink( get_the_ID() ) ),
          sprintf( __( '<br/> <i class="fa fa-arrow-right" aria-hidden="true"></i> %s', 'wpdocs' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
