<?php
/**
 Adds and register blocks for the Aqua Page Builder
 
 */

$aqpb = md5('Cuvette');

//add_filter('aqpb_contextual_helps', 'aqpb_custom_contextual_helps', 10, 1);
function aqpb_custom_contextual_helps($contextual_helps = array()) {
	$contextual_helps[] = array(
		'id'		=> 'page-builder',
		'title'		=> __('Page Builder' ,'contempo'),
		'content'	=> '<p>Hey there. Thanks for using Aqua Page Builder! :)</p>',
	);
	return $contextual_helps;
}

if(class_exists('AQ_Page_Builder')) {
	define('AQPB_CUSTOM_DIR', get_template_directory() . '/admin/page-builder/');
	define('AQPB_CUSTOM_URI', get_template_directory_uri() . '/admin/page-builder/');
	
	//include the block files
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-googlemap-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-portfolio-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-slogan-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-slider-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-image-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-testimonial-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-pricetable-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-media-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-contact-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-gallery-posts-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-posts-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-featured-posts-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-carousel-posts-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-social-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-twitter-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-features-block.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/aq-team-member-block.php');
	
	//register the blocks
	aq_register_block('AQ_Googlemap_Block');
	aq_register_block('AQ_Slogan_Block');
	aq_register_block('AQ_Slider_Block');
	aq_register_block('AQ_Image_Block');
	aq_register_block('AQ_Team_Member_Block');
	aq_register_block('AQ_Testimonial_Block');
	aq_register_block('AQ_Pricetable_Block');
	aq_register_block('AQ_Media_Block');
	aq_register_block('AQ_Portfolio_Block');
	aq_register_block('AQ_Contact_Block');
	aq_register_block('AQ_Featured_Posts_Block');
	aq_register_block('AQ_Carousel_Posts_Block');
	aq_register_block('AQ_Gallery_Posts_Block');
	aq_register_block('AQ_Posts_Block');
	aq_register_block('AQ_Social_Block');
	aq_register_block('AQ_Twitter_Block');
	aq_register_block('AQ_Features_Block');
	
	if(is_admin()) add_action('aq-page-builder-admin-enqueue', 'aqpb_custom_admin_js');
	function aqpb_custom_admin_js() {
		wp_register_style( 'aqpb-custom-admin-css',  AQPB_CUSTOM_URI . 'css/aqpb-custom-admin.css', array(), time(), 'all');
		wp_register_script('aqpb-custom-admin-js', AQPB_CUSTOM_URI . 'js/aqpb-custom-admin.js', array('jquery', 'aqpb-js'), '', true);
		
		wp_enqueue_style('aqpb-custom-admin-css');
		wp_enqueue_script('aqpb-custom-admin-js');
	}
}

/* @todo 
	teams
	services (uses pages to add services), with icons, layout options
	header (styles, font-size, color)
	search
	call individual widget from custom sidebar
	skills bar
*/