<?php
/**
 * Custom Taxonomies
 *
 * @package WP Portico
 * @subpackage Admin
 */

// Portfolio Tags
$porttlabels = array(
	'name' => _x( 'Portfolio Tags', 'taxonomy general name', 'contempo' ),
	'singular_name' => _x( 'Portfolio Tag', 'taxonomy singular name', 'contempo' ),
	'search_items' =>  __( 'Search Portfolio Tags', 'contempo' ),
	'popular_items' => __( 'Popular Portfolio Tags', 'contempo' ),
	'all_items' => __( 'All Portfolio Tags', 'contempo' ),
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => __( 'Edit Portfolio Tag', 'contempo' ),
	'update_item' => __( 'Update Portfolio Tag', 'contempo' ),
	'add_new_item' => __( 'Add New Portfolio Tag', 'contempo' ),
	'new_item_name' => __( 'New Portfolio Tag Name', 'contempo' ),
	'separate_items_with_commas' => __( 'Separate Portfolio Tags with commas', 'contempo' ),
	'add_or_remove_items' => __( 'Add or remove Portfolio Tags', 'contempo' ),
	'choose_from_most_used' => __( 'Choose from the most used Portfolio Tags', 'contempo' )
);
register_taxonomy( 'portfolio_tags', 'portfolio', array(
	'hierarchical' => false,
	'labels' => $porttlabels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'type' ),
));

?>