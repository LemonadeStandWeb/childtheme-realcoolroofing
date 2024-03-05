<?php
/**
 * Register a custom post type called "Services".
 */
function lemonade_create_services() {
	$labels = array(
		'name'                => 'Services',
		'singular_name'       => 'Service',
		'add_new'             => 'Add Service',
		'all_items'           => 'All Services',
		'add_new_item'        => 'Add New Service',
		'edit_item'           => 'Edit Service',
		'new_item'	          => 'New Service',
		'view_item'           => 'View Service',
		'search_items'        => 'Search Services',
		'not_found'           => 'No Services found',
		'not_found_in_trash'  => 'No Services found in Trash',
		'parent_item_colon'   => 'Parent Service:',
		'menu_name'           => 'Services',
		'update_item'         => 'Update Service',	
	);

	$args = array(
		'label'               => 'Services',
		'description'         => 'Services post type',
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'query_var' 	      => true,
		'rewrite'			  => true,
		'capability_type'	  => 'post',	
		'hierarchical'        => false,	
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor'),
		'taxonomies'		  => array('service_type'),
		'menu_position'       => 6,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'show_in_rest'		  => true,	
		'menu_icon' => 'dashicons-clipboard',
	);

	register_post_type( 'services', $args );
}
add_action( 'init', 'lemonade_create_services', 0 );


/**
 * Register a custom taxonomy for the Services CPT.
 */
function create_service_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Service Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Service Categories', 'textdomain' ),
		'all_items'         => __( 'All Service Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Service Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Service Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Service Category', 'textdomain' ),
		'update_item'       => __( 'Update Service Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Service Category', 'textdomain' ),
		'new_item_name'     => __( 'New Service Category Name', 'textdomain' ),
		'menu_name'         => __( 'Service Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'service_category' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'service_category', array( 'services' ), $args );
}
add_action( 'init', 'create_service_taxonomies', 0 );

add_action( 'init', function () {
	add_ux_builder_post_type( 'services' );
} );