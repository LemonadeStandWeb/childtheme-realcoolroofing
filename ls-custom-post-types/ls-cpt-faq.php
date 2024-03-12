<?php
/**
 * Register a custom post type called "Faqs".
 */
function ls_create_faqs() {
	$labels = array(
		'name'                => 'Faqs',
		'singular_name'       => 'Faq',
		'add_new'             => 'Add Faq',
		'all_items'           => 'All Faqs',
		'add_new_item'        => 'Add New Faq',
		'edit_item'           => 'Edit Faq',
		'new_item'	          => 'New Faq',
		'view_item'           => 'View Faq',
		'search_items'        => 'Search Faqs',
		'not_found'           => 'No Faqs found',
		'not_found_in_trash'  => 'No Faqs found in Trash',
		'parent_item_colon'   => 'Parent Faq:',
		'menu_name'           => 'Faqs',
		'update_item'         => 'Update Faq',	
	);

	$args = array(
		'label'               => 'Faqs',
		'description'         => 'Faq post type',
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'query_var' 	      => true,
		'rewrite'			  => true,
		'capability_type'	  => 'post',	
		'hierarchical'        => false,	
		'supports'            => array( 'title', 'page-attributes'),
		'taxonomies'		  => array('faq_type'),
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

	register_post_type( 'faqs', $args );
}
add_action( 'init', 'ls_create_faqs', 0 );


/**
 * Register a custom taxonomy for the Faqs CPT.
 */
function ls_create_faq_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Faq Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Faq Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Faq Categories', 'textdomain' ),
		'all_items'         => __( 'All Faq Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Faq Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Faq Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Faq Category', 'textdomain' ),
		'update_item'       => __( 'Update Faq Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Faq Category', 'textdomain' ),
		'new_item_name'     => __( 'New Faq Category Name', 'textdomain' ),
		'menu_name'         => __( 'Faq Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'faq_category' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'faq_category', array( 'faqs' ), $args );
}
add_action( 'init', 'ls_create_faq_taxonomies', 0 );

add_action( 'init', function () {
	add_ux_builder_post_type( 'faqs' );
} );