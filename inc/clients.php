<?php
/**
 * Client profiles
 * @author Wthemes
 */
 
 
if ( !class_exists('ClientProfiles') ):

class ClientProfiles
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
			'name' => _x("Client", "post type general name"),
			'singular_name' => _x("Client", "post type singular name"),
			'menu_name' => 'Client',
			'all_items' => _x('All Client', ''),
			'add_new' => _x("Add New", "client item"),
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
		register_post_type('clients' , array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 99,
			'rewrite' => false,
			'supports' => array('title', 'editor', 'thumbnail')
		) );
	}
		
	
}

$ClientProfiles = new ClientProfiles();

endif;