<?php
/**
 * 메인 사이드바 워커
 */
 class WalkerMainMenu extends Walker {
 	public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
 	public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

 	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
 		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
 			$t = '';
 			$n = '';
 		} else {
 			$t = "\t";
 			$n = "\n";
 		}
 		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

 		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 		$classes[] = 'menu-item-' . $item->ID;
 		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
 		$class_names = $class_names ? ' class="collapsible-body ' . esc_attr( $class_names ) . '"' : '';

 		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
 		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

 		// $output .= $indent . '<div' . $id . $class_names .'>';

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
// collapsible-body
		if (strpos($class_names, 'menu-item-has-children') !== false) {
			$item_output = $args->before;

			$item_output .= '<li class="no-padding">';
			$item_output .= '<ul class="collapsible collapsible-accordion">';
			$item_output .= '<li class="no-padding">';
			$item_output .= '<a class="collapsible-header" style="padding-left: 32px;">';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '<span class="badge">';
			$item_output .= '<i class="material-icons">arrow_drop_down</i>';
			$item_output .= '</span></a>';
			$item_output .= '<div class="collapsible-body"><ul>';
			$item_output .= '<li class="no-padding">';
			$item_output .= '<a'. $attributes .'>';
			$item_output .= '<i class="material-icons">play_arrow</i>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a></li>';

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		} else {
	 		$item_output = $args->before;
	 		$item_output .= '<li class="no-padding"><a'. $attributes .'>';
	 		$item_output .= $args->link_before . $title . $args->link_after;
	 		$item_output .= '</a></li>';
	 		$item_output .= $args->after;

	 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
 	}

 	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
 		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
 			$t = '';
 			$n = '';
 		} else {
 			$t = "\t";
 			$n = "\n";
 		}

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 		$classes[] = 'menu-item-' . $item->ID;
 		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
 		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
 		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		if (strpos($class_names, 'menu-item-has-children') !== false) {
			$output .= "</ul></div></li></ul></li>{$n}";
		}
 		$output .= "</li>{$n}";
 	}

 }
