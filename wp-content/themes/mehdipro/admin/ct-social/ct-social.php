<?php
/*
Plugin Name: Contempo Social Widget
Plugin URI: http://contemporealestatethemes.com
Description: A simple social profile widget
Version: 1.0.0
Author: Chris Robinson
Author URI: http://contemporealestatethemes.com
*/

/*-----------------------------------------------------------------------------------*/
/* Include CSS */
/*-----------------------------------------------------------------------------------*/
 
function ct_social_css() {		
	wp_enqueue_style( 'ct_font_awesome', get_template_directory_uri() . '/admin/ct-social/assets/font-awesome.css', false, '1.0' );
	wp_enqueue_style( 'ct_social_css', get_template_directory_uri() . '/admin/ct-social/assets/style.css', false, '1.0' );
}
add_action( 'wp_enqueue_scripts', 'ct_social_css' );

/*-----------------------------------------------------------------------------------*/
/* Include JS */
/*-----------------------------------------------------------------------------------*/

function ct_social_scripts() {
	wp_enqueue_script( 'core', get_template_directory_uri() . '/admin/ct-social/assets/core.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ct_social_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Register Widget */
/*-----------------------------------------------------------------------------------*/

class ct_Social extends WP_Widget {

	function ct_Social() {
	   $widget_ops = array('description' => 'Use this widget to display your social profiles.' );
	   parent::WP_Widget(false, __('CT Social', 'contempo'),$widget_ops);      
	}
	
	function widget($args, $instance) {  
	
		extract( $args );
		global $ct_options;
		
		$title = $instance['title'];
		$dribbble = $instance['dribbble'];
		$email = $instance['email'];
		$facebook = $instance['facebook'];
		$flickr = $instance['flickr'];
		$foursquare = $instance['foursquare'];
		$github = $instance['github'];
		$googleplus = $instance['googleplus'];
		$instagram = $instance['instagram'];
		$linkedin = $instance['linkedin'];
		$pinterest = $instance['pinterest'];
		$skype = $instance['skype'];
		$twitter = $instance['twitter'];
		$youtube = $instance['youtube'];
		$links = $instance['links'];
		$size = $instance['size'];
	
	?>
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; } ?>
        <ul>
			<?php if($dribbble) { ?>
                <li class="dribbble"><a href="<?php echo $dribbble; ?>" target="<?php echo $links; ?>"><i class="icon-dribbble"></i></a></li>
            <?php } ?>
            <?php if($facebook) { ?>
                <li class="facebook"><a href="<?php echo $facebook; ?>" target="<?php echo $links; ?>"><i class="icon-facebook"></i></a></li>
            <?php } ?>
            <?php if($flickr) { ?>
                <li class="flickr"><a href="<?php echo $flickr; ?>" target="<?php echo $links; ?>"><i class="icon-flickr"></i></a></li>
            <?php } ?>
            <?php if($foursquare) { ?>
                <li class="foursquare"><a href="<?php echo $foursquare; ?>" target="<?php echo $links; ?>"><i class="icon-foursquare"></i></a></li>
            <?php } ?>
            <?php if($github) { ?>
                <li class="github"><a href="<?php echo $github; ?>" target="<?php echo $links; ?>"><i class="icon-github"></i></a></li>
            <?php } ?>
            <?php if($googleplus) { ?>
                <li class="gplus"><a href="<?php echo $googleplus; ?>" target="<?php echo $links; ?>"><i class="icon-google-plus"></i></a></li>
            <?php } ?>
            <?php if($instagram) { ?>
                <li class="instagram"><a href="<?php echo $instagram; ?>" target="<?php echo $links; ?>"><i class="icon-instagram"></i></a></li>
            <?php } ?>
            <?php if($linkedin) { ?>
                <li class="linkedin"><a href="<?php echo $linkedin; ?>" target="<?php echo $links; ?>"><i class="icon-linkedin"></i></a></li>
            <?php } ?>
            <?php if($pinterest) { ?>
                <li class="pinterest"><a href="<?php echo $pinterest; ?>" target="<?php echo $links; ?>"><i class="icon-pinterest"></i></a></li>
            <?php } ?>
            <?php if($skype) { ?>
                <li class="skype"><a href="<?php echo $skype; ?>" target="<?php echo $links; ?>"><i class="icon-skype"></i></a></li>
            <?php } ?>
            <?php if($twitter) { ?>
                <li class="twitter"><a href="<?php echo $twitter; ?>" target="<?php echo $links; ?>"><i class="icon-twitter"></i></a></li>
            <?php } ?>
            <?php if($youtube) { ?>
                <li class="youtube"><a href="<?php echo $youtube; ?>" target="<?php echo $links; ?>"><i class="icon-youtube"></i></a></li>
            <?php } ?>
             <?php if($email) { ?>
                <li class="email"><a href="mailto:<?php echo $email; ?>"><i class="icon-envelope"></i></a></li>
            <?php } ?>
        </ul>	
		<?php echo $after_widget; ?>   
    <?php
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {
	   
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$dribbble = isset( $instance['dribbble'] ) ? esc_attr( $instance['dribbble'] ) : '';
			$email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
			$facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
			$flickr = isset( $instance['flickr'] ) ? esc_attr( $instance['flickr'] ) : '';
			$foursquare = isset( $instance['foursquare'] ) ? esc_attr( $instance['foursquare'] ) : '';
			$github = isset( $instance['github'] ) ? esc_attr( $instance['github'] ) : '';
			$googleplus = isset( $instance['googleplus'] ) ? esc_attr( $instance['googleplus'] ) : '';
			$instagram = isset( $instance['instagram'] ) ? esc_attr( $instance['instagram'] ) : '';
			$linkedin = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
			$pinterest = isset( $instance['pinterest'] ) ? esc_attr( $instance['pinterest'] ) : '';
			$skype = isset( $instance['skype'] ) ? esc_attr( $instance['skype'] ) : '';
			$twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
			$youtube = isset( $instance['youtube'] ) ? esc_attr( $instance['youtube'] ) : '';
			$links = isset( $instance['links'] ) ? esc_attr( $instance['links'] ) : '';
			$size = isset( $instance['size'] ) ? esc_attr( $instance['size'] ) : '';
		
		?>
        <p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('dribbble'); ?>"  value="<?php echo $dribbble; ?>" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('email'); ?>"  value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>"  value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('flickr'); ?>"  value="<?php echo $flickr; ?>" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('foursquare'); ?>"><?php _e('Foursquare:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('foursquare'); ?>"  value="<?php echo $foursquare; ?>" class="widefat" id="<?php echo $this->get_field_id('foursquare'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('GitHub:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('github'); ?>"  value="<?php echo $github; ?>" class="widefat" id="<?php echo $this->get_field_id('github'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('googleplus'); ?>"  value="<?php echo $googleplus; ?>" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>"  value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>"  value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('skype'); ?>"  value="<?php echo $skype; ?>" class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>"  value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>"  value="<?php echo $youtube; ?>" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('links'); ?>"><?php _e('Links:', 'contempo'); ?></label> 
			<select id="<?php echo $this->get_field_id('links'); ?>" name="<?php echo $this->get_field_name('links'); ?>">
				<option value="_self"<?php if($links == '_self') echo ' selected="selected"'; ?>>Same Window</option>
				<option value="_blank"<?php if($links == '_blank') echo ' selected="selected"'; ?>>New Window</option>
			</select>
		</p>
		<?php
	}
} 

add_action( 'widgets_init', create_function( '', 'register_widget("ct_Social");' ) );

?>