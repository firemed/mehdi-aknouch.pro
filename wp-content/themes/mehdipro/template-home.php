<?php
/**
 * Template Name: Home
 *
 * @package WP Longshore
 * @subpackage Template
 */

get_header();


//	get_template_part('archive-portfolio-home');
motoPressSlider( "demo-slider-1" );

#do_shortcode('mpsl demo-slider-1');

get_footer(); ?>