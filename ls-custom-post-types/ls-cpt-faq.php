<?php
/**
 * Register a custom post type called "Faqs".
 */
function ls_create_faqs() {
	$labels = array(
		'name'                => 'FAQs',
		'singular_name'       => 'FAQ',
		'add_new'             => 'Add FAQ',
		'all_items'           => 'All FAQs',
		'add_new_item'        => 'Add New FAQ',
		'edit_item'           => 'Edit FAQ',
		'new_item'	          => 'New FAQ',
		'view_item'           => 'View FAQ',
		'search_items'        => 'Search FAQs',
		'not_found'           => 'No FAQs found',
		'not_found_in_trash'  => 'No FAQs found in Trash',
		'parent_item_colon'   => 'Parent FAQ:',
		'menu_name'           => 'FAQs',
		'update_item'         => 'Update FAQ',	
	);

	$args = array(
		'label'               => 'FAQs',
		'description'         => 'FAQ post type',
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
		'menu_icon' => 'dashicons-info',
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
		'name'              => _x( 'FAQ Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'FAQ Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search FAQ Categories', 'textdomain' ),
		'all_items'         => __( 'All FAQ Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent FAQ Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent FAQ Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit FAQ Category', 'textdomain' ),
		'update_item'       => __( 'Update FAQ Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New FAQ Category', 'textdomain' ),
		'new_item_name'     => __( 'New FAQ Category Name', 'textdomain' ),
		'menu_name'         => __( 'FAQ Category', 'textdomain' ),
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