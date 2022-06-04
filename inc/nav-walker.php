<?php
/* wp_nav_menu walker */
class theme_walker extends Walker_Nav_Menu {

	function start_el( & $output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$class_names = $value = '';
		// $tm = unset($item->classes[0]);
		$classes = empty( $item->classes ) ? array() : (array) array_splice($item->classes,1,10);
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		$output .= '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

		if( $item->object == 'page' ) {
			  $varpost = get_post($item->object_id);
				$attributes .= ' href="'.home_url().'/#' . $varpost->post_name . '"';
		}else {
			 $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		}

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		if(!empty($item->classes[0])){
				$item_output .= '<i class="fa '.esc_attr($item->classes[0] ).'"></i>';
		}
		$item_output .= '<span>' .$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ). '</span>';
		$item_output .= $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );

	}

}
?>
