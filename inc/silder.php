<?php
/**
 * Client profiles
 * @author Wthemes
 */
 
 
if ( !class_exists('Slider') ):

class Slider
{
	/**
	 * Initialize & hook into WP
	 */
	public function __construct() {
		add_action( 'init', array($this, 'register_post_type'), 0 );
		
	}
	
	/**
	 * Register post type
	 */
	public function register_post_type() {
	   
	   // Labels
		$labels = array(
			'name' => _x("Slider", "post type general name"),
			'singular_name' => _x("Slider", "post type singular name"),
			'menu_name' => 'Slider',
			'all_items' => _x('All Slider', ''),
			'add_new' => _x("Add New", "slider item"),
			'add_new_item' => __("Add New Profile"),
			'edit_item' => __("Edit Profile"),
			'new_item' => __("New Profile"),
			'view_item' => __("View Profile"),
			'search_items' => __("Search Profiles"),
			'not_found' =>  __("No Profiles Found"),
			'not_found_in_trash' => __("No Profiles Found in Trash"),
			'parent_item_colon' => ''
		);
		
		// Register post type
		register_post_type('slides' , array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => false,
			'menu_icon' => get_template_directory_uri() . "../inc/img/team-icon.png",
			'rewrite' => false,
			'supports' => array('title', 'editor', 'thumbnail')
		) );
	}
		
	
}

$Slider = new Slider();

endif;