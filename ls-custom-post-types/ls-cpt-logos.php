<?php
/**
 * Register a custom post type called "Logos".
 */
function ls_create_logos() {
	$labels = array(
		'name'                => 'Logos',
		'singular_name'       => 'Logo',
		'add_new'             => 'Add Logo',
		'all_items'           => 'All Logos',
		'add_new_item'        => 'Add New Logo',
		'edit_item'           => 'Edit Logo',
		'new_item'	          => 'New Logo',
		'view_item'           => 'View Logo',
		'search_items'        => 'Search Logos',
		'not_found'           => 'No Logos found',
		'not_found_in_trash'  => 'No Logos found in Trash',
		'parent_item_colon'   => 'Parent Logo:',
		'menu_name'           => 'Logos',
		'update_item'         => 'Update Logo',	
	);

	$args = array(
		'label'               => 'Logos',
		'description'         => 'Logo post type',
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'query_var' 	      => true,
		'rewrite'			  => true,
		'capability_type'	  => 'post',	
		'hierarchical'        => false,	
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor'),
		'taxonomies'		  => array('logo_type'),
		'menu_position'       => 6,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'show_in_rest'		  => true,	
		'menu_icon' => 'dashicons-images-alt',
	);

	register_post_type( 'logos', $args );
}
add_action( 'init', 'ls_create_logos', 0 );


/**
 * Register a custom taxonomy for the Logos CPT.
 */
function ls_create_logo_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Logo Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Logo Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Logo Categories', 'textdomain' ),
		'all_items'         => __( 'All Logo Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Logo Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Logo Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Logo Category', 'textdomain' ),
		'update_item'       => __( 'Update Logo Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Logo Category', 'textdomain' ),
		'new_item_name'     => __( 'New Logo Category Name', 'textdomain' ),
		'menu_name'         => __( 'Logo Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'logo_category' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'logo_category', array( 'logos' ), $args );
}
add_action( 'init', 'ls_create_logo_taxonomies', 0 );

add_action( 'init', function () {
	add_ux_builder_post_type( 'logos' );
} );