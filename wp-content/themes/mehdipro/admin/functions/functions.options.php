<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		// Shortname
		$shortname = "ct";
		
		// Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		// Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_posts( array('sort_column'=>'post_title', 'post_type' => 'home', 'numberposts' => 1000));    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_title;
		}
		$of_pages['placebo'] = 'placebo';
	
		// Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		// Homepage Blocks
		$ct_options_homepage_blocks = array( 
			"disabled" => array (
				"placebo" 				=> "placebo", //REQUIRED!
				"builder"				=> "Page Builder",
				"slider"				=> "Slider",			
			), 
			"enabled" => array (
				"placebo" 				=> "placebo", //REQUIRED!
				"cta"					=> "CTA",
				"portfolio"				=> "Portfolio",	
			),
		);
		
		$ct_options_homepage_pages = array( 
			"disabled" => $of_pages, 
			"enabled" => array (
				"placebo" 				=> "placebo", //REQUIRED!
			),
		);

		$ct_options_homepage_pages = array( 
			"disabled" => $of_pages, 
			"enabled" => array (
				"placebo" 				=> "placebo", //REQUIRED!
			),
		);
		
		$layout_style = array (
			"full"		=> "Full Width",
			"boxed"		=> "Boxed"
		);
		
		$port_types = array (
			"ajax"		=> "Ajax",
			"pile"		=> "Pile"
		);
		
		$skins = array (
			"light"		=> "Light",
			"dark"		=> "Dark"
		);
		
		$color_schemes = array (
			"concrete"		=> "Concrete",
			"blue"			=> "Blue",
			"purple"		=> "Purple",
			"yellow"		=> "Yellow",
			"orange"		=> "Orange",
			"pomegranate"	=> "Pomegranate",
			"asphalt"		=> "Asphalt",
		);

		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) {
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
		            if(stristr($alt_stylesheet_file, ".css") !== false) {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}

		// Background Images Reader
		$bg_images_path = get_stylesheet_directory() . '/images/skins/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri() . '/images/skins/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		
		$yes_no = array("Yes","No"); 
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// General Settings
$of_options[] = array(	"name" => __("General Settings", "contempo"),
						"type" => "heading");
						
$of_options[] = array( 	"name" => __("Choose a heading font", "contempo"),
						"desc" => __("Select an alternative font.", "contempo"),
						"id" => $shortname."_heading_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => ct_get_fonts());
							
$of_options[] = array( 	"name" => __("Choose a body font", "contempo"),
						"desc" => __("Select an alternative font.", "contempo"),
						"id" => $shortname."_body_font",
						"std" => "Open Sans",
						"type" => "select",
						"options" => ct_get_fonts());
						
// Header
$of_options[] = array(	"name" => __("Header", "contempo"),
						"type" => "heading");
						
$of_options[] = array(	"name" => __("Custom Logo", "contempo"),
						"desc" => __("Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)", "contempo"),
						"id" => $shortname."_logo",
						"std" => "",
						"type" => "upload");
						
$of_options[] = array(	"name" => __("Use Text Logo?", "contempo"),
						"desc" => __("Choose if you would like to use the Blog Title in place of an image logo. Text can be setup in WP Settings > General.", "contempo"),
						"id" => $shortname."_text_logo",
						"std" => "No",
						"type" => "select",
						"options" => $yes_no);
						
// Flex Slider Options
$of_options[] = array(	"name" => __("FlexSlider", "contempo"),
	                    "type" => "heading");
						
$of_options[] = array(	"name" => __("These options control the Slider Block for Posts & Page Builder, (Appearance > Page Builder > Slider).", "contempo"),
						"desc" => "",
						"id" => "flexslider-info",
						"std" => "These options control the Slider Block for Posts & Page Builder, (Appearance > Page Builder > Slider).",
						"type" => "info");
						
$of_options[] = array(	"name" => __("Animation", "contempo"),
						"desc" => __("Select your animation type.", "contempo"),
						"id" => $shortname."_flex_animation",
						"std" => "fade",
						"type" => "select",
						"options" => array(
							'fade' => 'Fade',
							'slide' => 'Slide'
						));	
						
$of_options[] = array(	"name" => __("Slide Direction", "contempo"),
						"desc" => __("Select sliding direction.", "contempo"),
						"id" => $shortname."_flex_direction",
						"std" => "horizontal",
						"type" => "select",
						"options" => array(
							'horizontal' => 'Horizontal',
							'vertical' => 'Vertical'
						));	
						
$of_options[] = array(	"name" => __("Slideshow Speed", "contempo"),
						"desc" => __("Set the speed of the slideshow cycling, in milliseconds.", "contempo"),
						"id" => $shortname."_flex_speed",
						"std" => "7000",
						"type" => "text");
						
$of_options[] = array(	"name" => __("Animation Duration", "contempo"),
						"desc" => __("Set the speed of animations, in milliseconds.", "contempo"),
						"id" => $shortname."_flex_duration",
						"std" => "600",
						"type" => "text");
						
$of_options[] = array(	"name" => __("Randomize Slides?", "contempo"),
						"desc" => __("Randomize slide order.", "contempo"),
						"id" => $shortname."_flex_randomize",
						"std" => "False",
						"type" => "select",
						"options" => array(
							'false' => 'False',
							'true' => 'True'
						));
						
// Create a Skin
$of_options[] = array(	"name" => __("Create a Skin", "contempo"),
						"type" => "heading");
						
$of_options[] = array(	"name" => __("Use Custom Styles?", "contempo"),
						"desc" => __("Select whether or not you'd like to use these custom styles.", "contempo"),
						"id" => $shortname."_use_styles",
						"std" => "No",
						"type" => "select",
						"options" => $yes_no);
					
$of_options[] = array(	"name" => __("Body Background Color", "contempo"),
						"desc" => __("Pick a background color for the theme (default: #fff).", "contempo"),
						"id" => $shortname."_body_bg_color",
						"std" => "",
						"type" => "color");
						
$of_options[] = array(	"name" => "Enable Background Image Below",
						"desc" => "Check this to use a background image for the theme, otherwise only the solid color you chose above will be displayed.",
						"id" => $shortname."_background_image",
						"std" => 1,
						"type" => "checkbox");
						
$of_options[] = array(	"name" => "Background Images",
						"desc" => "Select a background pattern.",
						"id" =>  $shortname."_custom_bg",
						"std" => "",
						"type" => "tiles",
						"options" => $bg_images,);
						
$of_options[] = array(	"name" => __("Body Background Image", "contempo"),
						"desc" => __("Upload a custom body background image.", "contempo"),
						"id" => $shortname."_body_bg_image",
						"std" => "",
						"type" => "upload");
						
$of_options[] = array(	"name" => __("Body Background Position", "contempo"),
						"desc" => __("Choose the position for your background image.", "contempo"),
						"id" => $shortname."_body_bg_pos",
						"std" => "top left",
						"type" => "select",
						"options" => $body_pos);
						
$of_options[] = array(	"name" => __("Body Background Repeat", "contempo"),
						"desc" => __("Choose the position for your background image.", "contempo"),
						"id" => $shortname."_body_bg_repeat",
						"std" => "no-repeat",
						"type" => "select",
						"options" => $body_repeat);	

$of_options[] = array(	"name" => __("Body Font Color", "contempo"),
						"desc" => __("Pick a body font color.", "contempo"),
						"id" => $shortname."_body_font_color",
						"std" => "",
						"type" => "color");				

$of_options[] = array(	"name" => __("Left Sidebar Background Color", "contempo"),
						"desc" => __("Pick a background color for the left sidebar.", "contempo"),
						"id" => $shortname."_left_bg_color",
						"std" => "",
						"type" => "color");

$of_options[] = array(	"name" => __("Left Sidebar Nav Current Color", "contempo"),
						"desc" => __("", "contempo"),
						"id" => $shortname."_nav_selected_link_color",
						"std" => "",
						"type" => "color");

$of_options[] = array(	"name" => __("Article Background Color", "contempo"),
						"desc" => __("Pick a background color for the articles.", "contempo"),
						"id" => $shortname."_article_bg_color",
						"std" => "",
						"type" => "color");

$of_options[] = array(	"name" => __("Buttons Border Color", "contempo"),
						"desc" => __("Pick a border color all the buttons.", "contempo"),
						"id" => $shortname."_button_border_color",
						"std" => "",
						"type" => "color");
					
$of_options[] = array(	"name" => __("Link Color", "contempo"),
						"desc" => __("", "contempo"),
						"id" => $shortname."_link_color",
						"std" => "",
						"type" => "color");
					
$of_options[] = array(	"name" => __("Visited Link Color", "contempo"),
						"desc" => __(".", "contempo"),
						"id" => $shortname."_visited_color",
						"std" => "",
						"type" => "color");
					
$of_options[] = array(	"name" => __("Hover Link Color", "contempo"),
						"desc" => __("", "contempo"),
						"id" => $shortname."_hover_color",
						"std" => "",
						"type" => "color");
					
$of_options[] = array(	"name" => __("Active Link Color", "contempo"),
						"desc" => __("", "contempo"),
						"id" => $shortname."_active_color",
						"std" => "",
						"type" => "color");
						
$of_options[] = array(	"name" => __("Widget Heading Border Color", "contempo"),
						"desc" => __("Pick a border color for the widget headings.", "contempo"),
						"id" => $shortname."_widget_heading_color",
						"std" => "",
						"type" => "color");

$of_options[] = array(	"name" => __("Widget Heading Text Color", "contempo"),
						"desc" => __("Pick a border color for the widget headings.", "contempo"),
						"id" => $shortname."_widget_heading_text_color",
						"std" => "",
						"type" => "color");
					
$of_options[] = array(	"name" => __("Custom CSS", "contempo"),
	                    "desc" => __("Quickly add some CSS to your theme by adding it to this block.", "contempo"),
	                    "id" => $shortname."_custom_css",
	                    "std" => "",
	                    "type" => "textarea");
						
// Single Post Options
$of_options[] = array(	"name" => __("Single Post", "contempo"),
	                    "type" => "heading");
						
$of_options[] = array(	"name" => __("Display Social?", "contempo"),
						"desc" => __("Select whether or not you'd like to display social links globally for posts.", "contempo"),
						"id" => $shortname."_post_social",
						"std" => "Yes",
						"type" => "select",
						"options" => $yes_no);
						
$of_options[] = array(	"name" => __("Display Comments?", "contempo"),
						"desc" => __("Select whether or not you'd like to display comments globally for posts.", "contempo"),
						"id" => $shortname."_post_comments",
						"std" => "Yes",
						"type" => "select",
						"options" => $yes_no);	
						
// Portfolio Single Options
$of_options[] = array(	"name" => __("Portfolio Single", "contempo"),
	                    "type" => "heading");
						
$of_options[] = array(	"name" => __("Display Project Information?", "contempo"),
						"desc" => __("Select whether or not you'd like to display the project information, client, date and site link.", "contempo"),
						"id" => $shortname."_portfolio_single_info",
						"std" => "Yes",
						"type" => "select",
						"options" => $yes_no);	
						
// Contact Options
$of_options[] = array(	"name" => __("Contact", "contempo"),
	                    "type" => "heading");

$of_options[] = array(	"name" => __("Facebook", "contempo"),
						"desc" => __("Enter your Facebook URL'.", "contempo"),
						"id" => $shortname."_fb_url",
						"std" => "",
						"type" => "text");
						
$of_options[] = array(	"name" => __("Twitter", "contempo"),
						"desc" => __("Enter your Twitter URL'.", "contempo"),
						"id" => $shortname."_twitter_url",
						"std" => "",
						"type" => "text");
	                    
$of_options[] = array(	"name" => __("Email Address", "contempo"),
						"desc" => __("The email address you would like your form submissions sent to (e.g. youremail@yourdomain.com).", "contempo"),
						"id" => $shortname."_contact_email",
						"std" => "",
						"type" => "text");
						
$of_options[] = array(	"name" => __("Subject", "contempo"),
						"desc" => __("Subject of the email sent by the contact form.", "contempo"),
						"id" => $shortname."_contact_subject",
						"std" => "",
						"type" => "text");

$of_options[] = array(	"name" => __("Success Message", "contempo"),
						"desc" => __("This is the text displayed if the form submission has been successful.", "contempo"),
						"id" => $shortname."_contact_success",
						"std" => "",
						"type" => "textarea");
						
$of_options[] = array(	"name" => __("Phone", "contempo"),
						"desc" => __("Enter your phone number here.", "contempo"),
						"id" => $shortname."_contact_phone",
						"std" => "",
						"type" => "text");
						
$of_options[] = array(	"name" => __("Display Google Map?", "contempo"),
						"desc" => __("Select whether or not you'd like to display a Google map of your location.", "contempo"),
						"id" => $shortname."_contact_map",
						"std" => "Yes",
						"type" => "select",
						"options" => $yes_no);
						
$of_options[] = array(	"name" => __("Google Map Type?", "contempo"),
						"desc" => __("Choose your map display type.", "contempo"),
						"id" => $shortname."_contact_map_type",
						"std" => "Roadmap",
						"type" => "select",
						"options" => array(
							"ROADMAP" => "Roadmap",
							"SATELLITE" => "Satellite",
							"HYBRID" => "Hybrid",
							"TERRAIN" => "Terrain"
						));
						
$of_options[] = array(	"name" => __("Map Address", "contempo"),
						"desc" => __("The address of your location to be used in the Google Map, needs to be entered in this format: 303 W Harbor Dr, San Diego, CA 92101", "contempo"),
						"id" => $shortname."_contact_map_location",
						"std" => "303 W Harbor Dr, San Diego, CA 92101",
						"type" => "text");
											
// Footer Options
$of_options[] = array(	"name" => __("Footer", "contempo"),
	                    "type" => "heading");

$of_options[] = array(	"name" => __("Tracking Code", "contempo"),
						"desc" => __("Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.", "contempo"),
						"id" => $shortname."_tracking_code",
						"std" => "",
						"type" => "textarea"); 
						
// Backup Options
$of_options[] = array( "name" => "Backup Restore",
                    	"type" => "heading");

$of_options[] = array( "name" => __("Backup and Restore Options", "contempo"),
                    	"desc" => "",
                    	"id" => "aq_backup",
                    	"std" => "",
                    	"type" => "backup",
                    	"options" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.');
						
// Framework Options
$of_options[] = array(	"name" => __("Framework", "contempo"),
						"type" => "heading");
						
$of_options[] = array(	"name" => __("Custom Framework Name", "contempo"),
						"desc" => __("Use this field to specify a custom name to replace the theme name in the top right corner of options panel.", "contempo"),
						"id" => $shortname."_custom_framework_name",
						"std" => "",
						"type" => "text");
						
$of_options[] = array(	"name" => __("Disable Changelog and Theme Documentation links?", "contempo"),
						"desc" => __("Disable changelog and theme documentation links under theme name in the options panel.", "contempo"),
						"id" => $shortname."_changelog_doc_links",
						"std" => "No",
						"type" => "select",
						"options" => $yes_no);

$of_options[] = array(	"name" => __("Note", "contempo"),
						"desc" => "",
						"id" => "framework-info",
						"std" => "After any of these settings are saved you must hit the browser refresh button in order for them to show in the options panel.",
						"type" => "info");
	}
}
?>
