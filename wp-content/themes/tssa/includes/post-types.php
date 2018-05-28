<?php
/**
 * Custom Post Type: Awards
 */
function awards_post_type() {

	$labels = array(
		'name'                  => _x( 'Awards', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Award', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Awards', 'text_domain' ),
		'name_admin_bar'        => __( 'Award', 'text_domain' ),
		'archives'              => __( '', 'text_domain' ),
		'parent_item_colon'     => __( '', 'text_domain' ),
		'all_items'             => __( 'All Awards', 'text_domain' ),
		'add_new_item'          => __( 'Add New Award', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Award', 'text_domain' ),
		'edit_item'             => __( 'Edit Award', 'text_domain' ),
		'update_item'           => __( 'Update Award', 'text_domain' ),
		'view_item'             => __( 'View Award', 'text_domain' ),
		'search_items'          => __( 'Search Awards', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Acknowledgement', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'awards', $args );

}
add_action( 'init', 'awards_post_type', 0 );

// Register Custom Taxonomy
function testimonial_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'view_item'                  => __( 'View Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Categories', 'text_domain' ),
		'search_items'               => __( 'Search Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Categories', 'text_domain' ),
		'items_list'                 => __( 'Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug' => 'testimonials',
		'with_front' => false,
		'hierarchical' => false
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => $rewrite
	);
	register_taxonomy( 'testimonial_category', array( 'testimonial' ), $args );

}
add_action( 'init', 'testimonial_taxonomy', 0 );


/**
 * Custom Post Type: Testimonial
 */
function cws_testimonial() {
	$labels = array(
		'name'               => 'Testimonial',
		'singular_name'      => 'Testimonial',
		'add_new'            => 'Add New Testimonial',
		'add_new_item'       => 'Add New Testimonial',
		'edit_item'          => 'Edit Testimonial',
		'new_item'           => 'New Testimonial',
		'all_items'          => 'All Testimonials',
		'view_item'          => 'View Testimonial',
		'search_items'       => 'Search Testimonials',
		'not_found'          => 'No event found',
		'not_found_in_trash' => 'No event found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials',
	);

	$args = array(
		'labels'             => $labels,
		'with_front'         => false,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'rewrite'            => array( 'slug' => 'testimonials', 'with_front' => false, ),
		'taxonomies'         => array( 'testimonial_category' ),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

register_post_type( 'testimonial', $args );
}
add_action( 'init', 'cws_testimonial' );

/**
 * Custom Post Type: Attorney
 */
function cws_attorney() {
	$labels = array(
		'name'               => 'Attorney',
		'singular_name'      => 'Attorney',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Attorney',
		'edit_item'          => 'Edit Attorney',
		'new_item'           => 'New Attorney',
		'all_items'          => 'All Attorneys',
		'view_item'          => 'View Attorney',
		'search_items'       => 'Search Attorney',
		'not_found'          => 'No event found',
		'not_found_in_trash' => 'No event found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Attorneys',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'rewrite'            => array( 'slug' => 'attorneys', 'with_front' => false, ),
		'taxonomies'         => array( 'category', 'post_tag' ),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

register_post_type( 'attorney', $args );
}
add_action( 'init', 'cws_attorney' );

/**
 * Custom Post Type: Result
 */
/*
function cws_result() {
	$labels = array(
		'name'               => 'Result',
		'singular_name'      => 'Result',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Result',
		'edit_item'          => 'Edit Result',
		'new_item'           => 'New Result',
		'all_items'          => 'All Practice Areas',
		'view_item'          => 'View Result',
		'search_items'       => 'Search Result',
		'not_found'          => 'No event found',
		'not_found_in_trash' => 'No event found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Results',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'rewrite'            => array( 'slug' => 'case-results', 'with_front' => false, ),
		'taxonomies'         => array( 'category', 'post_tag' ),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

register_post_type( 'result', $args );
}
add_action( 'init', 'cws_result' );
*/
