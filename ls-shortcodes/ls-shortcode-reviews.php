<?php
function lemonade_create_reviews() {
	$labels = array(
		'name'                => 'Reviews',
		'singular_name'       => 'Review',
		'add_new'             => 'Add Review',
		'all_items'           => 'All Reviews',
		'add_new_item'        => 'Add New Review',
		'edit_item'           => 'Edit Review',
		'new_item'	          => 'New Review',
		'view_item'           => 'View Review',
		'search_items'        => 'Search Reviews',
		'not_found'           => 'No Reviews found',
		'not_found_in_trash'  => 'No Reviews found in Trash',
		'parent_item_colon'   => 'Parent Review:',
		'menu_name'           => 'Reviews',
		'update_item'         => 'Update Review',	
	);

	$args = array(
		'label'               => 'Reviews',
		'description'         => 'Reviews post type',
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'query_var' 	      => true,
		'rewrite'			  => true,
		'capability_type'	  => 'post',	
		'hierarchical'        => false,	
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'editor'),
		'taxonomies'		  => array('review_type'),
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

	register_post_type( 'reviews', $args );
}
add_action( 'init', 'lemonade_create_reviews', 0 );


//Review Type
function create_review_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Review Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Review Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Review Categories', 'textdomain' ),
		'all_items'         => __( 'All Review Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Review Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Review Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Review Category', 'textdomain' ),
		'update_item'       => __( 'Update Review Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Review Category', 'textdomain' ),
		'new_item_name'     => __( 'New Review Category Name', 'textdomain' ),
		'menu_name'         => __( 'Review Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'review_category' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'review_category', array( 'reviews' ), $args );
}
add_action( 'init', 'create_review_taxonomies', 0 );





add_action( 'init', function () {
	add_ux_builder_post_type( 'reviews' );
} );