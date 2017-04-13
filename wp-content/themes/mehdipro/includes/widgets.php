<?php

	include( get_template_directory() . '/includes/widgets/ct-widget-tabs.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-adspace.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-blogauthor.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-flickr.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-search.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-latestposts.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-contactinfo.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-portfolio-tags-filter.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-portfolio.php');
	include( get_template_directory() . '/includes/widgets/ct-widget-testimonials.php');
	
	if (!function_exists('ct_deregister_widgets')) {
		function ct_deregister_widgets(){
			unregister_widget('WP_Widget_Search');         
		}
	}
	add_action('widgets_init', 'ct_deregister_widgets');
?>