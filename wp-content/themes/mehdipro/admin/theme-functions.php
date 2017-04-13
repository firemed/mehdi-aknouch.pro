<?php
/**
 * Theme Functions
 *
 * @package WP Longshore
 * @subpackage Admin
 */

/*-----------------------------------------------------------------------------------*/
/* Body IDs */
/*-----------------------------------------------------------------------------------*/

function ct_body_id() {

	if (is_home()) {
		echo ' id="home"';
	} elseif (is_single()) {
		echo ' id="single"';
	} elseif (is_page()) {
		echo ' id="page"';
	} elseif (is_search()) {
		echo ' id="search"';
	} elseif (is_archive()) {
		echo ' id="archive"';
	}
}

/*-----------------------------------------------------------------------------------*/
/* Set Content Width */
/*-----------------------------------------------------------------------------------*/

if (!isset($content_width))
	$content_width = 700;

/*-----------------------------------------------------------------------------------*/
/* Add Post Thumbnail Support */
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-thumbnails'); 

/*-----------------------------------------------------------------------------------*/
/* Set Content Width */
/*-----------------------------------------------------------------------------------*/

if(!isset($content_width)) $content_width = 940;

/*-----------------------------------------------------------------------------------*/
/* Add WordPress 3.0 Menu Support */
/*-----------------------------------------------------------------------------------*/

if (function_exists('register_nav_menu')) {
	register_nav_menus( array( 'primary' => __( 'Primary Menu', 'contempo' ) ) );
}

function ct_nav() { ?>
	<nav>
    	<?php wp_nav_menu( array( 'container_id' => 'nav', 'menu_class' => 'primary', 'menu_id' => '', 'theme_location' => 'primary', 'fallback_cb' => false) ); ?>
    </nav>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Enqueue main stylesheet
/*-----------------------------------------------------------------------------------*/

function ct_theme_style() {
    wp_enqueue_style( 'ct-theme-style', get_bloginfo( 'stylesheet_url' ), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'ct_theme_style' );

/*-----------------------------------------------------------------------------------*/
/* Register Scripts and CSS */
/*-----------------------------------------------------------------------------------*/

function ct_register_cssjs() {
	wp_register_script('tooltipMenu', get_template_directory_uri() . '/js/ct.tooltipmenu.min.js', 'jquery', '1.0', false);
	wp_register_script('validationEngine', get_template_directory_uri() . '/js/jquery.validationEngine.js', 'jquery', '1.0', true);
	wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', '1.0', true);
	wp_register_script('retina', get_template_directory_uri() . '/js/retina.js', 'jquery', '1.0', true);
	wp_register_script('foresight', get_template_directory_uri() . '/js/foresight.min.js', 'jquery', '1.0', true);
	wp_register_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.lite.js', 'jquery', '1.0', true);
	wp_register_script('mobileMenu', get_template_directory_uri() . '/js/ct.mobile.menu.js', 'jquery', '1.0', true);
	wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery', '1.0', true);
	wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0', true);
//	wp_register_script('gmaps', 'http://maps.google.com/maps/api/js?sensor=false', '', '1.0', false);
	wp_register_script('marker', get_template_directory_uri() . '/js/markerwithlabel.js', 'gmaps', '1.0', true);
	wp_register_script('geocode', get_template_directory_uri() . '/js/ct.geocode.markers.js', 'gmaps', '1.0', true);
	wp_register_script('touchEffects', get_template_directory_uri() . '/js/toucheffects.js', 'jquery', '1.0', true);
	wp_register_script('modernizer', get_template_directory_uri() . '/js/modernizr.custom.js', 'jquery', '1.0', true);
	wp_register_script('hammer', get_template_directory_uri() . '/js/jquery.hammer.min.js', 'jquery', '1.0', true);
	wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '1.0', true);
	wp_register_script('classie', get_template_directory_uri() . '/js/classie.js', 'jquery', '1.0', true);
	wp_register_script('shiv', 'http://html5shiv.googlecode.com/svn/trunk/html5.js', 'jquery', '1.0', true);
	wp_register_script('base', get_template_directory_uri() . '/js/base.js', 'jquery', '1.0', true);
	wp_register_style('base', get_template_directory_uri() . '/css/base.css', '', '', 'screen, projection');
	wp_register_style('framework', get_template_directory_uri() . '/css/responsive-gs-12col.css', '', '', 'screen, projection');
	wp_register_style('ie', get_template_directory_uri() . '/css/ie.css', '', '', 'screen, projection');
	wp_register_style('layout', get_template_directory_uri() . '/css/layout.css', '', '', 'screen, projection');
	wp_register_style('dropdowns', get_template_directory_uri() . '/css/ct-dropdowns.css', '', '', 'screen, projection');
	wp_register_style('comments', get_template_directory_uri() . '/css/comments.css', '', '', 'screen, projection');
	wp_register_style('validationEngine', get_template_directory_uri() . '/css/validationEngine.jquery.css', '', '', 'screen, projection');
	wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', '', '', 'screen, projection');
	wp_register_style('flexsliderNav', get_template_directory_uri() . '/css/flexslider-nav.css', '', '', 'screen, projection');
	wp_register_style('pageBuilder', get_template_directory_uri() . '/css/page-builder-blocks.css', '', '', 'screen, projection');
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', '', '', 'screen, projection');
	wp_register_style('animate', get_template_directory_uri() . '/css/animate.min.css', '', '', 'screen, projection');
	wp_register_style('ctSlideMenu', get_template_directory_uri() . '/css/ct-slide-menu.css', '', '', 'screen, projection');
	wp_register_style('ctPortfolio', get_template_directory_uri() . '/css/ct-portfolio.css', '', '', 'screen, projection');
	wp_register_style('isotope', get_template_directory_uri() . '/css/isotope.css', '', '', 'screen, projection');
}
add_action('wp_enqueue_scripts', 'ct_register_cssjs');

function ct_init_scripts() {
	
	global $ct_options;
	
	// Enqueue Styles
	wp_enqueue_style('base');
	wp_enqueue_style('framework');
	wp_enqueue_style('ie');
	wp_enqueue_style('layout');
	wp_enqueue_style('flexslider');
	wp_enqueue_style('pageBuilder');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('portCaptions');
	wp_enqueue_style('flexsliderNav');
	wp_enqueue_style('animate');
	wp_enqueue_style('ctSlideMenu');
	wp_enqueue_style('ctPortfolio');
	wp_enqueue_style('isotope');
	
	if(is_single() || is_page()) {
		wp_enqueue_style('comments');
	}
	
	if(is_page_template('template-contact.php')) {
		wp_enqueue_style('validationEngine');
	}
	
	// Enqueue Scripts
	
	if(!is_home()) {
		wp_enqueue_script('customSelect');
		wp_enqueue_script('ctSelect');
	}

	wp_enqueue_script('fitvids');
	wp_enqueue_script('nav');
	wp_enqueue_script('retina');
	wp_enqueue_script('foresight');
	wp_enqueue_script('classie');
	wp_enqueue_script('cycle');
	wp_enqueue_script('flexslider');
	wp_enqueue_script('gmaps');
	wp_enqueue_script('modernizer');
	wp_enqueue_script('hammer');
	wp_enqueue_script('touchEffects');
	wp_enqueue_script('base');
	wp_enqueue_script('isotope');

	if(is_single() || is_page()) {
		wp_enqueue_script('comment-reply');
	}
	
	if(is_page_template('template-contact.php')) {
		wp_enqueue_script('validationEngine');
	}
}
add_action('wp_enqueue_scripts', 'ct_init_scripts');

/*-----------------------------------------------------------------------------------*/
/* CT Head */
/*-----------------------------------------------------------------------------------*/

function ct_wp_head() {
	
	/* Load Theme Options */
	global $ct_options; ?>

	<link href='http://fonts.googleapis.com/css?family=Montserrat:700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
	<script> 
        jQuery(window).load(function() {
            // Slider			
//            jQuery('.flexslider').flexslider({
//                animation: "<?php //echo strtolower($ct_options['ct_flex_animation']); ?>//",
//                slideDirection: "<?php //echo strtolower($ct_options['ct_flex_direction']); ?>//",
//                slideshow: true,
//                slideshowSpeed: <?php //echo $ct_options['ct_flex_speed'] > 0 ? $ct_options['ct_flex_speed'] : 1000; ?>//,
//                animationDuration: <?php //echo $ct_options['ct_flex_duration'] > 0 ? $ct_options['ct_flex_duration'] : 1000 ; ?>//,
//                controlNav: false,
//                directionNav: true,
//                keyboardNav: true,
//                randomize: <?php //echo !empty(strtolower($ct_options['ct_flex_randomize'])) ? strtolower($ct_options['ct_flex_randomize']) : 'false'; ?>//,
//                pauseOnAction: true,
//                pauseOnHover: false,
//                animationLoop: true
//            });
//
        });
    </script>
    
    <?php if(is_page_template('template-contact.php')) { ?>
		<script>
		jQuery(document).ready(function() {

			jQuery("#contactform").validationEngine({
				ajaxSubmit: true,
				ajaxSubmitFile: "<?php echo get_template_directory_uri(); ?>/includes/ajax-submit-contact.php",
				ajaxSubmitMessage: "<?php echo stripslashes($ct_options['ct_contact_success']); ?>",
				success :  false,
				failure : function() {}
			})
		});
		</script>
	<?php } ?>
    
	<?php
		/* Inject Custom Google Fonts */
		$ct_heading_font = isset( $instance['ct_heading_font'] ) ? esc_attr( $instance['ct_heading_font'] ) : '';
		$ct_body_font = isset( $instance['ct_body_font'] ) ? esc_attr( $instance['ct_body_font'] ) : '';
		
		$ct_heading_font = str_replace(' ','+',$ct_options['ct_heading_font']);
		$ct_body_font = str_replace(' ','+',$ct_options['ct_body_font']);

		if(!empty($ct_heading_font)){

		?>

	<link href='http://fonts.googleapis.com/css?family=<?php echo $ct_heading_font; ?>:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=<?php echo $ct_body_font; ?>:300,400,300italic,400italic' rel='stylesheet' type='text/css'>

	<style type="text/css">
		h1, h2, h3, h4, #masthead { font-family: '<?php echo $ct_options['ct_heading_font']; ?>' !important;}
		body, #masthead, .slider-wrap { font-family: '<?php echo $ct_options['ct_body_font']; ?>' !important;}
		<?php if (Browser::isIE()) { echo '.widget_ct_portfolio ul.portfolio li { width: 244px; overflow: hidden;}'; } ?>
		<?php if (Browser::isFirefox()) { echo '.widget_ct_portfolio ul.portfolio li { width: 244px; overflow: hidden;}'; } ?>
	</style>
		<?php

		}

	?>

    
    <?php    
	/* Inject Custom Stylesheet */
	if($ct_options['ct_use_styles'] == "Yes") {
		get_template_part('/includes/custom-stylesheet');
    }
	
	/* Date format */
	$GLOBALS['ctdate'] = get_option('ct_dateformat');	
	if ( $GLOBALS['ctdate'] == "" )
		$GLOBALS['ctdate'] = "M j, Y";	

}

/*-----------------------------------------------------------------------------------*/
/* Post Social */
/*-----------------------------------------------------------------------------------*/

function ct_post_social() { ?>

	<div class="col span_12 first post-social">
		<h6><?php _e('Parlez-en !', 'woc'); ?></h6>

		<ul>
	        <li class="facebook"><a href="javascript:void(0);" onclick="popup('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php _e('Check out this great article on', 'warriorsofcode'); ?> <?php bloginfo('name'); ?> &mdash; <?php the_title(); ?>', 'facebook',658,225);"><i class="fa fa-facebook"></i></a></li>
	        <li class="twitter"><a href="javascript:void(0);" onclick="popup('http://twitter.com/home/?status=<?php _e('Check out this great article on', 'warriorsofcode'); ?> <?php bloginfo('name'); ?> &mdash; <?php the_title(); ?> &mdash; <?php the_permalink(); ?>', 'twitter',500,260);"><i class="fa fa-twitter"></i></a></li>
	        <li class="linkedin"><a href="javascript:void(0);" onclick="popup('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php _e('Check out this great article on', 'warriorsofcode'); ?> <?php bloginfo('name'); ?> &mdash; <?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>', 'linkedin',560,400);"><i class="fa fa-linkedin"></i></a></li>
	        <li class="google"><a href="javascript:void(0);" onclick="popup('https://plusone.google.com/_/+1/confirm?hl=en&url=<?php the_permalink(); ?>', 'google',500,275);"><i class="fa fa-google-plus"></i></a></a></li>
	    </ul>
    </div>
    	<div class="clear"></div>

<?php }

/*-----------------------------------------------------------------------------------*/
/* Add featured image to post columns */
/*-----------------------------------------------------------------------------------*/

add_image_size( 'admin-list-thumb', 100, 100, false );

// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'ct_add_post_thumbnail_column', 5);
add_filter('manage_portfolio_posts_columns', 'ct_add_post_thumbnail_column', 5);

// Add the column
function ct_add_post_thumbnail_column($cols){
//  $cols['ct_post_thumb'] = __('Featured');
  return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'ct_add_post_thumbnail_column', 5, 2);
add_action('manage_portfolio_posts_columns', 'ct_add_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function ct_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'ct_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in theme';
      break;
  }
}

/*-----------------------------------------------------------------------------------*/
/* Author Info */
/*-----------------------------------------------------------------------------------*/

function ct_author_info() {

	$facebookurl = get_the_author_meta('facebookurl');
	$twitterhandle = get_the_author_meta('twitterhandle');
	$linkedinurl = get_the_author_meta('linkedinurl');
	$gplus = get_the_author_meta('gplus');

	$active = false;

	if($active){


	?>

	<div id="authorinfo">
		<h5 class="marB30"><?php _e('About The Author', 'woc'); ?></h5>
	    <div class="col span_3 first">
	        <a href="<?php the_author_meta('url'); ?>"><?php echo get_avatar( get_the_author_meta('email'), '160' ); ?></a>
	    </div>
	    <div class="col span_9">
		    <div class="author-inner">
		        <h5 class="the-author marB10"><a href="<?php the_author_meta('url'); ?>"><?php the_author(); ?></a></h5>
		        <p><?php the_author_meta('description'); ?></p>
		        <ul>
		            <?php if($facebookurl != '') { ?>
		                <li class="facebook"><a href="<?php echo $facebookurl; ?>"><i class="icon-facebook"></i></a></li>
		            <?php } ?>
		            <?php if($twitterhandle != '') { ?>
		                <li class="twitter"><a href="http://twitter.com/<?php echo $twitterhandle; ?>"><i class="icon-twitter"></i></a></li>
		            <?php } ?>
		            <?php if($linkedinurl != '') { ?>
		                <li class="linkedin"><a href="<?php echo $linkedinurl; ?>"><i class="icon-linkedin"></i></a></li>
		            <?php } ?>
		            <?php if($gplus != '') { ?>
		                <li class="google"><a href="<?php echo $gplus; ?>"><i class="icon-google-plus"></i></a></li>
		            <?php } ?>
		        </ul>
	        </div>
	    </div>
	        <div class="clear"></div>
	</div>

<?php }
}


/*-----------------------------------------------------------------------------------*/
/* Custom Length Excerpt */
/*-----------------------------------------------------------------------------------*/

function custom_length_excerpt($word_count_limit) {
    echo '<p>' . wp_trim_words(get_the_content(), $word_count_limit) . '</p>';
}

/*-----------------------------------------------------------------------------------*/
/* Contact Us Map */
/*-----------------------------------------------------------------------------------*/

function contact_us_map() {
	global $ct_options;
	if($ct_options['ct_contact_map'] =="Yes") { ?>
		<script>
        function setMapAddress(address) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { address : address }, function( results, status ) {
                if( status == google.maps.GeocoderStatus.OK ) {
                    var location = results[0].geometry.location;
                    var options = {
                        zoom: 15,
                        center: location,
                        mapTypeId: google.maps.MapTypeId.<?php echo strtoupper($ct_options['ct_contact_map_type']); ?>, 
                        streetViewControl: true,
						scrollwheel: false,
						draggable: false,
						styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]
                    };
                    var mymap = new google.maps.Map( document.getElementById( 'map' ), options );   
                    var marker = new google.maps.Marker({
                    	map: mymap, 
						flat: true,
						icon: '<?php echo get_template_directory_uri(); ?>/images/map-pin.png',   
						position: results[0].geometry.location
                	});		
            	}
        	});
        }
        setMapAddress( "<?php echo $ct_options['ct_contact_map_location']; ?>" );
        </script>
        <div id="location">
            <div id="map"></div>
        </div>
    <?php }
}

/*-----------------------------------------------------------------------------------*/
/* Homepage Slider */
/*-----------------------------------------------------------------------------------*/

function ct_slider() {
	global $ct_options;
	$slides = $ct_options['ct_flex_slider'];
	if($slides > 1) { ?>
        <div id="slider" class="flexslider">
            <ul class="slides">
    
                <?php 
                    foreach ($slides as $slide => $value) {
                        if (!empty ($value['url'])) {
                        $imgURL = $value['url'];
                        $imgID = get_attachment_id_from_src($imgURL);
                ?>
                <li>
    
                    <?php if (!empty ($value['link'])) { ?>
                    <a href="<?php echo $value['link']; ?>">
                            <img src="<?php echo aq_resize($imgURL,960); ?>" />
                    </a>
                    <?php } else { ?>
                            <img src="<?php echo aq_resize($imgURL,960); ?>" />
                    <?php } ?>
    
                    <?php if (!empty ($value['title']) || !empty ($value['description'])) { ?>
                        <div class="flex-caption">
                        <?php if (!empty ($value['title'])) { ?>
                            <?php if (!empty ($value['link'])) { ?>
                                <h1><a href="<?php echo $value['link']; ?>"><?php echo $value['title']; ?></a></h1>
                                <p><?php echo $value['description']; ?></p>
                            <?php } else { ?>
                                <h1><?php echo $value['title']; ?></h1>
                                <p><?php echo $value['description']; ?></p>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    <?php } ?>
                </li>
    
                <?php } else {
                        if (!empty ($value['embed'])) {
                            echo '<li class="video">';
                            echo stripslashes($value['embed']);
                            echo '</li>';
                        }
                    }
                } ?>
            </ul>
        </div>
            <div class="clear"></div>

	<?php }
}

/*-----------------------------------------------------------------------------------*/
/* Pagination */
/*-----------------------------------------------------------------------------------*/

function ct_pagination($pages = '', $range = 2) {  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }   

     if(1 != $pages) {
		 echo '<div class="clear"></div>';
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		 echo "<div class='clear'></div>\n";
         echo "</div>\n";
     }
}

/**
 * Returns the URL from the post.
 *
 * @uses get_the_link() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 */
function ct_get_link_url() {
	$has_url = get_the_post_format_url();

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/*-----------------------------------------------------------------------------------*/
/* Add user profile fields. */
/*-----------------------------------------------------------------------------------*/

function ct_modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitterhandle'] = 'Twitter Username';
	$profile_fields['facebookurl'] = 'Facebook URL';
	$profile_fields['linkedinurl'] = 'LinkedIn URL';
	$profile_fields['gplus'] = 'Google+ URL';

	return $profile_fields;
}
add_filter('user_contactmethods', 'ct_modify_contact_methods');

/*-----------------------------------------------------------------------------------*/
/* Add 100% width to default audio player */
/*-----------------------------------------------------------------------------------*/

function my_audio_shortcode( $html ){
	return str_replace('<audio', '<audio width="100%"', $html);
}
add_filter('wp_audio_shortcode', 'my_audio_shortcode');



function ct_fix_page_builder_select() {
  echo '<style>
    #page-builder select { height: auto !important;}
  </style>';
}
add_action('admin_head', 'ct_fix_page_builder_select');

/*-----------------------------------------------------------------------------------*/
/* Content Navigation */
/*-----------------------------------------------------------------------------------*/

function ct_content_nav() { ?>
        <div class="clear"></div>
    <nav class="content-nav">
        <div class="nav-prev left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'contempo' ) ); ?></div>
        <div class="nav-next right"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'contempo' ) ); ?></div>
    </nav>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Post Navigation */
/*-----------------------------------------------------------------------------------*/

function ct_post_nav() { ?>
    <nav class="post-nav">
        <div class="nav-prev left"><?php next_post_link('%link', '<i class="icon-chevron-left"></i> %title', TRUE); ?></div>
        <div class="nav-next right"><?php previous_post_link('%link', '%title <i class="icon-chevron-right"></i>', TRUE); ?></div>
            <div class="clear"></div>
    </nav>
        <div class="clear"></div>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Get the Slug */
/*-----------------------------------------------------------------------------------*/

function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}

/*-----------------------------------------------------------------------------------*/
/* Filter p tags from wrapping images */
/*-----------------------------------------------------------------------------------*/

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/*-----------------------------------------------------------------------------------*/
/* Tags Navigation for Portfolio */
/*-----------------------------------------------------------------------------------*/

function ct_tags_filter() { ?>
<ul id="tags-nav">
    <li><a href="#" data-filter="*"><?php _e('All','contempo'); ?></a></li>
    <?php
	$terms = get_terms('portfolio_tags');
    $count = count($terms);
	if ( $count > 0 ){
		foreach ( $terms as $term ) {
			echo "<li><a href='#' data-filter='.$term->slug'>" . ucfirst($term->name) . "</a></li>";
         }
     } ?>
</ul>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Output all term slugs */
/*-----------------------------------------------------------------------------------*/

function ct_terms() {
	if(is_post_type_archive('portfolio')) { 
		$terms = get_the_terms( $post->id, 'portfolio_tags' );
	}
	if ($terms) {
		foreach($terms as $term) {
			echo $term->slug;
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Show the first term name only slug */
/*-----------------------------------------------------------------------------------*/
 
function ct_first_term() {
	global $post;
	$terms = get_the_terms( $post->id, 'portfolio_tags' );
	$count = 0;
	if ($terms) {
		foreach($terms as $term) {
			$count++;
				echo $term->slug . ' ';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Show the first term name only */
/*-----------------------------------------------------------------------------------*/
 
function ct_first_term_name() {
	global $post;
	$terms = get_the_terms( $post->id, 'portfolio_tags' );
	$count = 0;
	if ($terms) {
		foreach($terms as $term) {
			$count++;
			if (1 == $count) {
				echo ucfirst($term->name);
			}
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Get image ID from URL - http://goo.gl/q9D9L
/*-----------------------------------------------------------------------------------*/
function get_attachment_id_from_src($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}

/*-----------------------------------------------------------------------------------*/
/* Custom excerpt length */
/*-----------------------------------------------------------------------------------*/

function new_excerpt_length($length) {
	global $ct_options;
	$ct_excerpt_length = isset( $instance['ct_excerpt_length'] ) ? esc_attr( $instance['ct_excerpt_length'] ) : '';
	
	$ct_excerpt_length = $ct_options['ct_excerpt_length'];
	
	return $ct_excerpt_length;
}
add_filter('excerpt_length', 'new_excerpt_length');

/*-----------------------------------------------------------------------------------*/
/* Add read more link to excerpt */
/*-----------------------------------------------------------------------------------*/

function new_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*-----------------------------------------------------------------------------------*/
/* Custom Author */
/*-----------------------------------------------------------------------------------*/

function ct_author() {
	global $post;
	if(get_post_meta($post->ID, "_ct_custom_author", true)) {
		echo get_post_meta($post->ID, "_ct_custom_author", true);
	} else {
		the_author_meta('display_name');
	}
}

/*-----------------------------------------------------------------------------------*/
/* Related Posts */
/*-----------------------------------------------------------------------------------*/

function ct_related_posts() {
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
	  echo '<h5 class="related-title marT40 marB30">' . __('Related Posts', 'contempo') . '</h5>';
	  echo '<ul class="related">';
	  $first_tag = $tags[0]->term_id;
	  $args=array(
		'tag__in' => array($first_tag),
		'post__not_in' => array($post->ID),
		'showposts'=>3,
		'ignore_sticky_posts'=>1
	   );
	  $my_query = new WP_Query($args);
	  if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post(); ?>
        
			<li>            
                <h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
            </li>
            
		  <?php
		endwhile; wp_reset_query();
	  }
	  echo '</ul>';
	}	
}

/*-----------------------------------------------------------------------------------*/
/* Related Posts */
/*-----------------------------------------------------------------------------------*/

function ct_related_portfolio() {
	
	$terms = wp_get_post_terms( get_the_ID(), 'portfolio_category');
	$related_query = $tax_query = NULL;
	
	$related_query = new WP_Query(
	array(
		'post_type' => 'portfolio',
		'posts_per_page' => '-1',
		'exclude' => get_the_ID(),
		'no_found_rows' => true,
		)
	);
				
	if( $related_query->posts ) {
		
		echo '<ul class="grid cs-style-3 related-portfolio marB40">';
		
		$wpex_count=0;
		while( $related_query->have_posts() ) : $related_query->the_post();
		$wpex_count++;
		echo '<li class="col span_3">';
		ct_first_image_linked_portfolio();
        echo '</li>';
		
		endwhile;
		wp_reset_postdata(); $related_query = NULL;
		
		echo '<div class="clear"></div>';
		echo '</ul>';

    }
}

/*-----------------------------------------------------------------------------------*/
/* Allow Shortcodes to be used in widgets */
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/* Get all of the images attached to the current post */
/*-----------------------------------------------------------------------------------*/
 
function ct_get_images($size = 'full') {
	global $post;
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	$results = array();
	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
			$results[] = wp_get_attachment_url($photo->ID);
		}
	}
	return $results;
}

/*-----------------------------------------------------------------------------------*/
/* Display all images attached to post - detail */
/*-----------------------------------------------------------------------------------*/

function ct_gallery_images() {
	$photos = ct_get_images('full');
	$alt = get_post_meta($photos, '_wp_attachment_image_alt', true);
	if ($photos) {
		foreach ($photos as $photo) { ?>
            <img class="marB18" src="<?php echo aq_resize($photo,945); ?>" alt="<?php echo $alt; ?>" />
		<?php }
	}	
}

/*-----------------------------------------------------------------------------------*/
/* Display all images attached to portfolio - detail */
/*-----------------------------------------------------------------------------------*/

function ct_portfolio_images() {
	$photos = ct_get_images('full');
	if ($photos) {
		foreach ($photos as $photo) { ?>
            <img class="portfolio-image marB30" data-src="<?php echo aq_resize($photo,1100); ?>" data-width="1100" data-height="600" class="fs-image" />
		<?php }
	}	
}

/*-----------------------------------------------------------------------------------*/
/* Display first image thumbnail - float right */
/*-----------------------------------------------------------------------------------*/

function ct_first_image_tn_right() {
	global $post;
	if(has_post_thumbnail()) { ?>
        <div class="tn">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(69,40); ?>
            </a>
        </div>
    <?php }
}

/*-----------------------------------------------------------------------------------*/
/* Get the first image attached to the current post */
/*-----------------------------------------------------------------------------------*/

function ct_get_post_image() {
	global $post;
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID'));
	if ($photos) {
		$photo = array_shift($photos);
		return wp_get_attachment_url($photo->ID);
	}
	return false;
}

/*-----------------------------------------------------------------------------------*/
/* Display first image thumb */
/*-----------------------------------------------------------------------------------*/

function ct_first_image_tn() { ?>
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail(array(150,150)); ?>
    </a>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Display first image thumb */
/*-----------------------------------------------------------------------------------*/

function ct_first_image_lrg() {
	the_post_thumbnail(array(600,250));
}

/*-----------------------------------------------------------------------------------*/
/* Display first image linked portfolio widget */
/*-----------------------------------------------------------------------------------*/

function ct_first_image_linked_portfolio_widget() { ?>
    <figure>
        <a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium'); ?>
        </a>
    </figure>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Display all images attached to post */
/*-----------------------------------------------------------------------------------*/

function ct_slider_images() {
	$photos = ct_get_images('full');
	if ($photos) {
		foreach ($photos as $photo) { ?>
			<li data-thumb=""<?php echo aq_resize($photo,960); ?>">
                <img src="<?php echo aq_resize($photo,960); ?>" title="<?php the_title(); ?>" />
			</li>
		<?php }
	}	
}

/*-----------------------------------------------------------------------------------*/
/* Display all images attached to post backstretch slider */
/*-----------------------------------------------------------------------------------*/

function ct_backslider_images() {
	$photos = ct_get_images('full');
	if ($photos) {
		foreach ($photos as $photo) {
			echo '"' . aq_resize($photo,2000) . '",';
		}
	}	
}

/*-----------------------------------------------------------------------------------*/
/* Display first image linked portfolio */
/*-----------------------------------------------------------------------------------*/

function ct_first_image_linked_portfolio() {
	$photo = ct_get_post_image();
	global $post; ?>
	<a href="<?php the_permalink(); ?>">
	    <figure class="portfolio-item">
			<?php the_post_thumbnail('large'); ?>
			<div class="info">
	            <div class="info-wrapper">
	                <h4 class="marB0"><?php the_title(); ?></h4>
	                <?php if(get_post_meta($post->ID, "_ct_short_desc", true) != '') { ?>
		                <p class="marB0"><?php echo get_post_meta($post->ID, "_ct_short_desc", true); ?></p>
	                <?php } ?>
	                <p class="view-btn"><span><?php _e('Voir', 'contempo'); ?></span></p>
	            </div>
	        </div>
	    </figure>
    </a>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Display first image linked */
/*-----------------------------------------------------------------------------------*/

function ct_first_image_linked() { ?>
    <a class="thumb" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
    </a>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Content Navigation */
/*-----------------------------------------------------------------------------------*/

function ct_archive_content_nav() { ?>

        <div class="nav-previous"><?php previous_posts_link('Previous') ?></div>
        <div class="nav-next"><?php next_posts_link('Next','') ?></div>

<?php }

function ct_single_content_nav() { ?>

	<div class="nav-previous"><?php previous_post_link( __( '%link', 'contempo' ) ); ?></div>
    <div class="nav-next"><?php next_post_link( __( '%link', 'contempo' ) ); ?></div>

<?php }

/*-----------------------------------------------------------------------------------*/
/* Browser Detection */
/*-----------------------------------------------------------------------------------*/

class Browser {
 
  private static $known_browsers = array(
      'msie', 'firefox', 'safari',
      'webkit', 'opera', 'netscape',
      'konqueror', 'gecko', 'chrome'
  );
 
  private function __construct() {}
 
  static public function get_info ($agent = null) {
    // Clean up agent and build regex that matches phrases for known browsers
    // (e.g. "Firefox/2.0" or "MSIE 6.0" (This only matches the major and minor
    // version numbers.  E.g. "2.0.0.6" is parsed as simply "2.0"
    $agent = strtolower($agent ? $agent : $_SERVER['HTTP_USER_AGENT']);
 
    // This pattern throws an exception if server is not up to date on regex lib
    //$pattern = '#(?<browser>' . join('|', $known) .
    //           ')[/ ]+(?<version>[0-9]+(?:.[0-9]+)?)#';
    // So we use this one
    $pattern = '#(' . join('|',self::$known_browsers) .
               ')[/ ]+([0-9]+(?:.[0-9]+)?)#';
 
    // Find all phrases (or return empty array if none found)
    if (!preg_match_all($pattern, $agent, $matches)) return array();
 
    // Since some UAs have more than one phrase (e.g Firefox has a Gecko phrase,
    // Opera 7,8 have a MSIE phrase), use the last two found (the right-most one
    // in the UA).  That's usually the most correct.
 
    $i = count($matches[1])-1;
    $r = array($matches[1][$i] => $matches[2][$i]);
    if ($i) $r[$matches[1][$i-1]] = $matches[2][$i-1];
 
    return $r;
  }
 
/******************************************************************************/
 
  /**
   * Is the user's browser that %#$@! of IE ?
   * @return boolean
   */
  static public function isIE () {
    $bi = self::get_info();
    return (!empty($bi['msie']));
  }
  static public function isIE6 () {
    $bi = self::get_info();
    return (!empty($bi['msie']) && $bi['msie'] == 6.0);
  }
  static public function isIE7 () {
    $bi = self::get_info();
    return (!empty($bi['msie']) && $bi['msie'] == 7.0);
  }
  static public function isIE8 () {
    $bi = self::get_info();
    return (!empty($bi['msie']) && $bi['msie'] == 8.0);
  }
  static public function isIE9 () {
    $bi = self::get_info();
    return (!empty($bi['msie']) && $bi['msie'] == 9.0);
  }
 
  /**
   * Is the user's browser da good ol' Firefox ?
   * @return boolean
   */
  static public function isFirefox () {
    return (strpos ($_SERVER['HTTP_USER_AGENT'], "Firefox") !== false);
  }
 
  /**
   * Is the user's browser the shiny Chrome ?
   * @return boolean
   */
  static public function isChrome () {
    $bi = self::get_info();
    return (!empty($bi['chrome']));
  }
 
  /**
   * Is the user's browser Safari ?
   * @return boolean
   */
  static public function isSafari () {
    $bi = self::get_info();
    return (!empty($bi['safari']) && !empty($bi['webkit']));
  }
 
  /**
   * Is the user's browser the almighty Opera ?
   * @return boolean
   */
  static public function isOpera () {
    $bi = self::get_info();
    return ( strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera') !== false );
  }
 
  /**
   * Is the user's platform iPhone ?
   * @return boolean
   */
  static public function isIphone () {
    return ( strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone') !== false );
  }
 
  /**
   * Is the user's platform iPad ?
   * @return boolean
   */
  static public function isIpad () {
    return ( strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'ipad') !== false );
  }
 
  /**
   * Is the user's platform the awesome Android ?
   * @return boolean
   */
  static public function isAndroid () {
    return ( strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'android') !== false );
  }
 
}

/**
 * The code below is inspired by Justin Tadlock's Hybrid Core.
 *
 * ct_breadcrumbs() shows a breadcrumb for all types of pages.  Themes and plugins can filter $args or input directly.
 * Allow filtering of only the $args using get_the_breadcrumb_args.
 *
 * @since 3.7.0
 * @param array $args Mixed arguments for the menu.
 * @return string Output of the breadcrumb menu.
 */
function ct_breadcrumbs( $args = array() ) {
	global $wp_query, $wp_rewrite;

	/* Get the textdomain. */
	$textdomain = 'contempo';

	/* Create an empty variable for the breadcrumb. */
	$breadcrumb = '';

	/* Create an empty array for the trail. */
	$trail = array();
	$path = '';

	/* Set up the default arguments for the breadcrumb. */
	$defaults = array(
		'separator' => '<i class="icon-angle-right"></i>',
		'before' => '<span class="breadcrumb-title"></span>',
		'after' => false,
		'front_page' => true,
		'show_home' => __( 'Home', $textdomain ),
		'echo' => true
	);

	/* Allow singular post views to have a taxonomy's terms prefixing the trail. */
	if ( is_singular() )
		$defaults["singular_{$wp_query->post->post_type}_taxonomy"] = false;

	/* Apply filters to the arguments. */
	$args = apply_filters( 'ct_breadcrumbs_args', $args );

	/* Parse the arguments and extract them for easy variable naming. */
	extract( wp_parse_args( $args, $defaults ) );

	/* If $show_home is set and we're not on the front page of the site, link to the home page. */
	if ( !is_front_page() && $show_home )
		$trail[] = '<a href="' . home_url() . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" class="trail-begin">' . $show_home . '</a>';

	/* If viewing the front page of the site. */
	if ( is_front_page() ) {
		if ( !$front_page )
			$trail = false;
		elseif ( $show_home )
			$trail['trail_end'] = "{$show_home}";
	}

	/* If viewing the "home"/posts page. */
	elseif ( is_home() ) {
		$home_page = get_page( $wp_query->get_queried_object_id() );
		$trail = array_merge( $trail, ct_breadcrumbs_get_parents( $home_page->post_parent, '' ) );
		$trail['trail_end'] = get_the_title( $home_page->ID );
	}

	/* If viewing a singular post (page, attachment, etc.). */
	elseif ( is_singular() ) {

		/* Get singular post variables needed. */
		$post = $wp_query->get_queried_object();
		$post_id = absint( $wp_query->get_queried_object_id() );
		$post_type = $post->post_type;
		$parent = $post->post_parent;

		/* If a custom post type, check if there are any pages in its hierarchy based on the slug. */
		if ( 'page' !== $post_type ) {

			$post_type_object = get_post_type_object( $post_type );

			/* If $front has been set, add it to the $path. */
			if ( 'post' == $post_type || 'attachment' == $post_type || ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front ) )
				$path .= trailingslashit( $wp_rewrite->front );

			/* If there's a slug, add it to the $path. */
			if ( !empty( $post_type_object->rewrite['slug'] ) )
				$path .= $post_type_object->rewrite['slug'];

			/* If there's a path, check for parents. */
			if ( !empty( $path ) )
				$trail = array_merge( $trail, ct_breadcrumbs_get_parents( '', $path ) );

			/* If there's an archive page, add it to the trail. */
			if ( !empty( $post_type_object->rewrite['archive'] ) && function_exists( 'get_post_type_archive_link' ) )
				$trail[] = '<a href="' . get_post_type_archive_link( $post_type ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . $post_type_object->labels->name . '</a>';
		}

		/* If the post type path returns nothing and there is a parent, get its parents. */
		if ( empty( $path ) && 0 !== $parent || 'attachment' == $post_type )
			$trail = array_merge( $trail, ct_breadcrumbs_get_parents( $parent, '' ) );

		/* Display terms for specific post type taxonomy if requested. */
		if ( isset( $args["singular_{$post_type}_taxonomy"] ) && $terms = get_the_term_list( $post_id, $args["singular_{$post_type}_taxonomy"], '', ', ', '' ) )
			$trail[] = $terms;

		/* End with the post title. */
		$post_title = get_the_title( $post_id ); // Force the post_id to make sure we get the correct page title.
		if ( !empty( $post_title ) )
			$trail['trail_end'] = $post_title;
	}

	/* If we're viewing any type of archive. */
	elseif ( is_archive() ) {

		/* If viewing a taxonomy term archive. */
		if ( is_tax() || is_category() || is_tag() ) {

			/* Get some taxonomy and term variables. */
			$term = $wp_query->get_queried_object();
			$taxonomy = get_taxonomy( $term->taxonomy );

			/* Get the path to the term archive. Use this to determine if a page is present with it. */
			if ( is_category() )
				$path = get_option( 'category_base' );
			elseif ( is_tag() )
				$path = get_option( 'tag_base' );
			else {
				if ( $taxonomy->rewrite['with_front'] && $wp_rewrite->front )
					$path = trailingslashit( $wp_rewrite->front );
				$path .= $taxonomy->rewrite['slug'];
			}

			/* Get parent pages by path if they exist. */
			if ( $path )
				$trail = array_merge( $trail, ct_breadcrumbs_get_parents( '', $path ) );

			/* If the taxonomy is hierarchical, list its parent terms. */
			if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent )
				$trail = array_merge( $trail, ct_breadcrumbs_get_term_parents( $term->parent, $term->taxonomy ) );

			/* Add the term name to the trail end. */
			$trail['trail_end'] = $term->name;
		}

		/* If viewing a post type archive. */
		elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) {

			/* Get the post type object. */
			$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

			/* If $front has been set, add it to the $path. */
			if ( $post_type_object->rewrite['with_front'] && $wp_rewrite->front )
				$path .= trailingslashit( $wp_rewrite->front );

			/* If there's a slug, add it to the $path. */
			if ( !empty( $post_type_object->rewrite['archive'] ) )
				$path .= $post_type_object->rewrite['archive'];

			/* If there's a path, check for parents. */
			if ( !empty( $path ) )
				$trail = array_merge( $trail, ct_breadcrumbs_get_parents( '', $path ) );

			/* Add the post type [plural] name to the trail end. */
			$trail['trail_end'] = $post_type_object->labels->name;
		}

		/* If viewing an author archive. */
		elseif ( is_author() ) {

			/* If $front has been set, add it to $path. */
			if ( !empty( $wp_rewrite->front ) )
				$path .= trailingslashit( $wp_rewrite->front );

			/* If an $author_base exists, add it to $path. */
			if ( !empty( $wp_rewrite->author_base ) )
				$path .= $wp_rewrite->author_base;

			/* If $path exists, check for parent pages. */
			if ( !empty( $path ) )
				$trail = array_merge( $trail, ct_breadcrumbs_get_parents( '', $path ) );

			/* Add the author's display name to the trail end. */
			$trail['trail_end'] = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
		}

		/* If viewing a time-based archive. */
		elseif ( is_time() ) {

			if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
				$trail['trail_end'] = get_the_time( __( 'g:i a', $textdomain ) );

			elseif ( get_query_var( 'minute' ) )
				$trail['trail_end'] = sprintf( __( 'Minute %1$s', $textdomain ), get_the_time( __( 'i', $textdomain ) ) );

			elseif ( get_query_var( 'hour' ) )
				$trail['trail_end'] = get_the_time( __( 'g a', $textdomain ) );
		}

		/* If viewing a date-based archive. */
		elseif ( is_date() ) {

			/* If $front has been set, check for parent pages. */
			if ( $wp_rewrite->front )
				$trail = array_merge( $trail, ct_breadcrumbs_get_parents( '', $wp_rewrite->front ) );

			if ( is_day() ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', $textdomain ) ) . '">' . get_the_time( __( 'Y', $textdomain ) ) . '</a>';
				$trail[] = '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( esc_attr__( 'F', $textdomain ) ) . '">' . get_the_time( __( 'F', $textdomain ) ) . '</a>';
				$trail['trail_end'] = get_the_time( __( 'j', $textdomain ) );
			}

			elseif ( get_query_var( 'w' ) ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', $textdomain ) ) . '">' . get_the_time( __( 'Y', $textdomain ) ) . '</a>';
				$trail['trail_end'] = sprintf( __( 'Week %1$s', $textdomain ), get_the_time( esc_attr__( 'W', $textdomain ) ) );
			}

			elseif ( is_month() ) {
				$trail[] = '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y', $textdomain ) ) . '">' . get_the_time( __( 'Y', $textdomain ) ) . '</a>';
				$trail['trail_end'] = get_the_time( __( 'F', $textdomain ) );
			}

			elseif ( is_year() ) {
				$trail['trail_end'] = get_the_time( __( 'Y', $textdomain ) );
			}
		}
	}

	/* If viewing search results. */
	elseif ( is_search() )
		$trail['trail_end'] = sprintf( __( 'Search results for &quot;%1$s&quot;', $textdomain ), esc_attr( get_search_query() ) );

	/* If viewing a 404 error page. */
	elseif ( is_404() )
		$trail['trail_end'] = __( '404 Not Found', $textdomain );

	/* Connect the breadcrumb trail if there are items in the trail. */
	if ( is_array( $trail ) ) {

		/* Open the breadcrumb trail containers. */
		$breadcrumb = '<div class="breadcrumb breadcrumbs ct-breadcrumbs"><div class="breadcrumb-trail">';

		/* If $before was set, wrap it in a container. */
		if ( !empty( $before ) )
			$breadcrumb .= '<span class="trail-before">' . $before . '</span> ';

		/* Wrap the $trail['trail_end'] value in a container. */
		if ( !empty( $trail['trail_end'] ) )
			$trail['trail_end'] = '<span class="trail-end">' . $trail['trail_end'] . '</span>';

		/* Format the separator. */
		if ( !empty( $separator ) )
			$separator = '<span class="sep">' . $separator . '</span>';

		/* Join the individual trail items into a single string. */
		$breadcrumb .= join( " {$separator} ", $trail );

		/* If $after was set, wrap it in a container. */
		if ( !empty( $after ) )
			$breadcrumb .= ' <span class="trail-after">' . $after . '</span>';

		/* Close the breadcrumb trail containers. */
		$breadcrumb .= '</div></div>';
	}

	/* Allow developers to filter the breadcrumb trail HTML. */
	$breadcrumb = apply_filters( 'ct_breadcrumbs', $breadcrumb );

	/* Output the breadcrumb. */
	if ( $echo )
		echo $breadcrumb;
	else
		return $breadcrumb;

}

/*-----------------------------------------------------------------------------------*/
/* Get parents */
/*-----------------------------------------------------------------------------------*/

function ct_breadcrumbs_get_parents( $post_id = '', $path = '' ) {

	/* Set up an empty trail array. */
	$trail = array();

	/* If neither a post ID nor path set, return an empty array. */
	if ( empty( $post_id ) && empty( $path ) )
		return $trail;

	/* If the post ID is empty, use the path to get the ID. */
	if ( empty( $post_id ) ) {

		/* Get parent post by the path. */
		$parent_page = get_page_by_path( $path );

		if( empty( $parent_page ) )
		        // search on page name (single word)
			$parent_page = get_page_by_title ( $path );

		if( empty( $parent_page ) )
			// search on page title (multiple words)
			$parent_page = get_page_by_title ( str_replace( array('-', '_'), ' ', $path ) );

		/* End Modification */

		/* If a parent post is found, set the $post_id variable to it. */
		if ( !empty( $parent_page ) )
			$post_id = $parent_page->ID;
	}

	/* If a post ID and path is set, search for a post by the given path. */
	if ( $post_id == 0 && !empty( $path ) ) {

		/* Separate post names into separate paths by '/'. */
		$path = trim( $path, '/' );
		preg_match_all( "/\/.*?\z/", $path, $matches );

		/* If matches are found for the path. */
		if ( isset( $matches ) ) {

			/* Reverse the array of matches to search for posts in the proper order. */
			$matches = array_reverse( $matches );

			/* Loop through each of the path matches. */
			foreach ( $matches as $match ) {

				/* If a match is found. */
				if ( isset( $match[0] ) ) {

					/* Get the parent post by the given path. */
					$path = str_replace( $match[0], '', $path );
					$parent_page = get_page_by_path( trim( $path, '/' ) );

					/* If a parent post is found, set the $post_id and break out of the loop. */
					if ( !empty( $parent_page ) && $parent_page->ID > 0 ) {
						$post_id = $parent_page->ID;
						break;
					}
				}
			}
		}
	}

	/* While there's a post ID, add the post link to the $parents array. */
	while ( $post_id ) {

		/* Get the post by ID. */
		$page = get_page( $post_id );

		/* Add the formatted post link to the array of parents. */
		$parents[]  = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . get_the_title( $post_id ) . '</a>';

		/* Set the parent post's parent to the post ID. */
		$post_id = $page->post_parent;
	}

	/* If we have parent posts, reverse the array to put them in the proper order for the trail. */
	if ( isset( $parents ) )
		$trail = array_reverse( $parents );

	/* Return the trail of parent posts. */
	return $trail;

}

/*-----------------------------------------------------------------------------------*/
/* Get term parents */
/*-----------------------------------------------------------------------------------*/

function ct_breadcrumbs_get_term_parents( $parent_id = '', $taxonomy = '' ) {

	/* Set up some default arrays. */
	$trail = array();
	$parents = array();

	/* If no term parent ID or taxonomy is given, return an empty array. */
	if ( empty( $parent_id ) || empty( $taxonomy ) )
		return $trail;

	/* While there is a parent ID, add the parent term link to the $parents array. */
	while ( $parent_id ) {

		/* Get the parent term. */
		$parent = get_term( $parent_id, $taxonomy );

		/* Add the formatted term link to the array of parent terms. */
		$parents[] = '<a href="' . get_term_link( $parent, $taxonomy ) . '" title="' . esc_attr( $parent->name ) . '">' . $parent->name . '</a>';

		/* Set the parent term's parent as the parent ID. */
		$parent_id = $parent->parent;
	}

	/* If we have parent terms, reverse the array to put them in the proper order for the trail. */
	if ( !empty( $parents ) )
		$trail = array_reverse( $parents );

	/* Return the trail of parent terms. */
	return $trail;
}

require_once( ADMIN_PATH . '/../MAP/admin/map-walker.php');


?>