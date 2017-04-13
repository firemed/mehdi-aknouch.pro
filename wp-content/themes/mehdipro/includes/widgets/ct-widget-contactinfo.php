<?php
/**
 * Contact Info
 *
 * @package WP Portico
 * @subpackage Widget
 */
 
class ct_ContactInfo extends WP_Widget {

   function ct_ContactInfo() {
	   $widget_ops = array('description' => 'Use this widget to display your contact information.' );
	   parent::WP_Widget(false, __('CT Contact Info', 'contempo'),$widget_ops);      
   }

   function widget($args, $instance) {  
	extract( $args );
	$title = $instance['title'];
	$blurb = $instance['blurb'];
	$company = $instance['company'];
	$street = $instance['street'];
	$city = $instance['city'];
	$state = $instance['state'];
	$postal = $instance['postal'];
	$country = $instance['country'];
	$email = $instance['email'];
	$viewalltext = $instance['viewalltext'];
	$viewalllink = $instance['viewalllink'];
	?>
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . esc_attr($title) . $after_title; } ?>
        <?php if($blurb) { ?><p class="marB8"><?php echo $blurb; ?></p><?php } ?>
        <ul>
            <?php if($company) { ?><li id="company-name"><?php echo esc_attr($company); ?></li><?php } ?>
            <?php if($street) { ?><li><?php echo esc_attr($street); ?></li><?php } ?>
            <?php if($city) { ?><li><?php echo esc_attr($city); ?>, <?php echo esc_attr($state); ?> <?php echo esc_attr($postal); ?></li><?php } ?>
            <?php if($country) { ?><li><?php echo esc_attr($country); ?></li><?php } ?>
            <?php if($email) { ?><li id="company-email"><a href="mailto:<?php echo esc_attr($email); ?>"><?php _e('Email Us', 'contempo'); ?></a></li><?php } ?>
            <?php if($viewalltext && $viewalllink) { ?><li id="viewmore" class="right"><a class="read-more" href="<?php echo esc_attr($viewalllink); ?>"><?php echo esc_attr($viewalltext); ?> <em>&rarr;</em></a></li><?php } ?>
        </ul>		
		<?php echo $after_widget; ?>   
    <?php
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {    
   
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';    
		$blurb = isset( $instance['blurb'] ) ? esc_attr( $instance['blurb'] ) : '';
		$company = isset( $instance['company'] ) ? esc_attr( $instance['company'] ) : '';
		$street = isset( $instance['street'] ) ? esc_attr( $instance['street'] ) : '';
		$city = isset( $instance['city'] ) ? esc_attr( $instance['city'] ) : '';
		$state = isset( $instance['state'] ) ? esc_attr( $instance['state'] ) : '';
		$postal = isset( $instance['postal'] ) ? esc_attr( $instance['postal'] ) : '';
		$country = isset( $instance['country'] ) ? esc_attr( $instance['country'] ) : '';
		$country = isset( $instance['country'] ) ? esc_attr( $instance['country'] ) : '';
		$email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
		$viewalltext = isset( $instance['viewalltext'] ) ? esc_attr( $instance['viewalltext'] ) : '';
		$viewalllink = isset( $instance['viewalllink'] ) ? esc_attr( $instance['viewalllink'] ) : '';

		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('blurb'); ?>"><?php _e('Blurb:','contempo'); ?></label>
			<textarea name="<?php echo $this->get_field_name('blurb'); ?>" class="widefat" id="<?php echo $this->get_field_id('blurb'); ?>"><?php echo $blurb; ?></textarea>
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('company'); ?>"><?php _e('Company Name:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('company'); ?>"  value="<?php echo $company; ?>" class="widefat" id="<?php echo $this->get_field_id('company'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('street'); ?>"><?php _e('Street Address:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('street'); ?>"  value="<?php echo $street; ?>" class="widefat" id="<?php echo $this->get_field_id('street'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('city'); ?>"><?php _e('City:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('city'); ?>"  value="<?php echo $city; ?>" class="widefat" id="<?php echo $this->get_field_id('city'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('state'); ?>"><?php _e('State:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('state'); ?>"  value="<?php echo $state; ?>" class="widefat" id="<?php echo $this->get_field_id('state'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('postal'); ?>"><?php _e('Postal:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('postal'); ?>"  value="<?php echo $postal; ?>" class="widefat" id="<?php echo $this->get_field_id('postal'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('country'); ?>"><?php _e('Country:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('country'); ?>"  value="<?php echo $country; ?>" class="widefat" id="<?php echo $this->get_field_id('country'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('email'); ?>"  value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('viewalltext'); ?>"><?php _e('View More Link Text','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('viewalltext'); ?>"  value="<?php echo $viewalltext; ?>" class="widefat" id="<?php echo $this->get_field_id('viewalltext'); ?>" />
		</p>
        <p>
		   <label for="<?php echo $this->get_field_id('viewalllink'); ?>"><?php _e('View More Link URL','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('viewalllink'); ?>"  value="<?php echo $viewalllink; ?>" class="widefat" id="<?php echo $this->get_field_id('viewalllink'); ?>" />
		</p>
		<?php
	}
} 

register_widget('ct_ContactInfo');
?>