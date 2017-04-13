<?php
/*
Plugin Name: Contempo Custom Posts
Plugin URI: http://contempographicdesign.com
Description: Register custom posts
Version: 1.0.0
Author: Chris Robinson
Author URI: http://contempographicdesign.com
*/

add_action( 'init', 'portfolio_init' );

function portfolio_init() {
	$labels = array(
		'name' => _x( 'Portfolio', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Portfolio', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'portfolio', 'contempo' ),
		'add_new_item' => __( 'Add New Portfolio Item', 'contempo' ),
		'edit_item' => __( 'Edit Portfolio Item', 'contempo' ),
		'new_item' => __( 'New Portfolio Item', 'contempo' ),
		'view_item' => __( 'View Portfolio Item', 'contempo' ),
		'search_items' => __( 'Search Portfolio', 'contempo' ),
		'not_found' =>  __( 'No portfolio items found', 'contempo' ),
		'not_found_in_trash' => __( 'No portfolio items found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array( 'labels' => $labels,
		'label' => __('Portfolio', 'contempo'),
		'singular_label' => __('Portfolio Item', 'contempo'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => false,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'portfolio'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category'),
		'supports' => array( 'title', 'editor', 'comments', 'author', 'page-attributes', 'thumbnail' )
	); 

	register_post_type( 'portfolio', $args );
}

add_action("manage_posts_custom_column", "ct_custom_portfolio_columns");
add_filter("manage_edit-portfolio_columns", "ct_portfolio_columns");

// Define columns to filter in the edit posts section
function ct_portfolio_columns($columns) {
	$columns = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"image" => "Image",
		"title" => "Title",
		"categories" => "Categories",
		"author" => "Author",
		"date" => "Created",
	);
	return $columns;
}

add_image_size( 'admin-list-thumb', 100, 100, false );

// Output custom columns
function ct_custom_portfolio_columns($column) {
	global $post;
	if ("ID" == $column) echo $post->ID;
	if ("image" ==$column) {

		if( function_exists('the_post_thumbnail') ) {
	        echo the_post_thumbnail( 'admin-list-thumb' );
		}

	}
}

// Register Testimonial custom post type
add_action( 'init', 'testimonial_init' );

function testimonial_init() {
	$labels = array(
		'name' => _x( 'Testimonials', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Testimonial', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'testimonial', 'contempo' ),
		'add_new_item' => __( 'Add New Testimonial', 'contempo' ),
		'edit_item' => __( 'Edit Testimonial', 'contempo' ),
		'new_item' => __( 'New Testimonial', 'contempo' ),
		'view_item' => __( 'View Testimonial', 'contempo' ),
		'search_items' => __( 'Search Testimonials', 'contempo' ),
		'not_found' =>  __( 'No Testimonials found', 'contempo' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'testimonials'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag'),
		'supports' => array( 'title', 'editor', 'comments', 'author', 'page-attributes', 'thumbnail' )
	);

	register_post_type( 'testimonial', $args );
}

add_action("manage_posts_custom_column", "ct_custom_testimonial_columns");
add_filter("manage_edit-testimonial_columns", "ct_testimonial_columns");

// Define columns to filter in the edit posts section
function ct_testimonial_columns($columns) {
	$columns = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Person or Company",
		"quote" => "Quote",
		"tags" => "Tags",
		"author" => "Author",
		"date" => "Created",
	);
	return $columns;
}

// Output custom columns
function ct_custom_testimonial_columns($column) {
	global $post;
	if ("ID" == $column) echo $post->ID;
	elseif ("quote" == $column) echo $post->post_content;
}

// Register Testimonial custom post type
add_action( 'init', 'galleries_init' );

function galleries_init() {
	$labels = array(
		'name' => _x( 'Galleries', 'post type general name', 'contempo' ),
		'singular_name' => _x( 'Gallery', 'post type singular name', 'contempo' ),
		'add_new' => _x( 'Add New', 'gallery', 'contempo' ),
		'add_new_item' => __( 'Add New Gallery', 'contempo' ),
		'edit_item' => __( 'Edit Gallery', 'contempo' ),
		'new_item' => __( 'New Gallery', 'contempo' ),
		'view_item' => __( 'View Gallery', 'contempo' ),
		'search_items' => __( 'Search Galleries', 'contempo' ),
		'not_found' =>  __( 'No Galleries found', 'contempo' ),
		'not_found_in_trash' => __( 'No Galleries found in Trash', 'contempo' ),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'galleries'),
		'menu_position' => 5,
		'has_archive' => true,
		'taxonomies' => array('category', 'post_tag'),
		'supports' => array( 'title', 'editor', 'comments', 'author', 'page-attributes', 'thumbnail' )
	);

	register_post_type( 'galleries', $args );
}

add_action("manage_posts_custom_column", "ct_custom_galleries_columns");
add_filter("manage_edit-galleries_columns", "ct_galleries_columns");

// Define columns to filter in the edit posts section
function ct_galleries_columns($columns) {
	$columns = array(
		//Create custom columns
		"cb" => "<input type=\"checkbox\" />",
		"image" => "Image",
		"title" => "Title",
		"tags" => "Tags",
		"author" => "Author",
		"date" => "Created",
	);
	return $columns;
}

// Output custom columns
function ct_custom_galleries_columns($column) {
	global $post;
	if ("ID" == $column) echo $post->ID;
}

?>