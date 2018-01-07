<?php
/**
 * 워커
 *
 * @package somad
 * @subpackage walker class
 * @since   somad 0.0.1
 * @version somad 0.0.1
 */
class S0_Walker_Nav extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth=0, $args=array(), $id=0 ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = ''; $n = '';
		} else {
			$t = "\t"; $n = "\n";
		}
    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    $classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );
    $classes[] = ( $depth ) ? 'sub-item' : 'front-item';
		$class_names = join( ' ', $classes );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= $indent . '<li' . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;

    if (in_array('front-item', $classes)) {
      if (in_array('menu-item-has-children', $classes)) {
        $item_output .= '<a class="submenu-control">';
        $item_output .= '<i class="material-icons icon">folder</i>';
      } else {
        $item_output .= '<a'. $attributes .'>';
        $item_output .= '<i class="material-icons icon">insert_drive_file</i>';
      }
    } else {
      $item_output .= '<a'. $attributes .'>';
    }

		$item_output .= $args->link_before . $title . $args->link_after;

    if (in_array('menu-item-has-children', $classes)) {
      $item_output .= '<i class="material-icons drop-down">arrow_drop_down</i>';
    }

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
	}
}
