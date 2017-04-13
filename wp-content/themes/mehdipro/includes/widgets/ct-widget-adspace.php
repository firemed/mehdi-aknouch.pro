<?php
/**
 * Adspace
 *
 * @package WP Portico
 * @subpackage Widget
 */

class ct_AdWidget extends WP_Widget {

	function ct_AdWidget() {
		$widget_ops = array('description' => 'Use this widget to add any type of Ad as a widget.' );
		parent::WP_Widget(false, __('CT Adspace Widget', 'contempo'),$widget_ops);      
	}

	function widget($args, $instance) { 
		extract( $args ); 
		$title = $instance['title'];
		$adcode = $instance['adcode'];
		$image = $instance['image'];
		$href = $instance['href'];
		$alt = $instance['alt'];

        echo $before_widget;

		if($title != '')
			echo $before_title .$title. $after_title;

		if($adcode != ''){
		?>
		
		<?php echo $adcode; ?>
		
		<?php } else { ?>
		
			<a href="<?php echo esc_attr($href); ?>"><img src="<?php echo $image; ?>" alt="<?php echo esc_attr($alt); ?>" /></a>
	
		<?php
		}
		
		echo $after_widget;

	}

	function update($new_instance, $old_instance) {                
		return $new_instance;
	}

	function form($instance) {  
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$adcode = isset( $instance['adcode'] ) ? esc_attr( $instance['adcode'] ) : '';
		$image = isset( $instance['image'] ) ? esc_attr( $instance['image'] ) : '';
		$href = isset( $instance['href'] ) ? esc_attr( $instance['href'] ) : '';
		$alt = isset( $instance['alt'] ) ? esc_attr( $instance['alt'] ) : '';
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','contempo'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Ad Code:','contempo'); ?></label>
            <textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"><?php echo $adcode; ?></textarea>
        </p>
        <p><strong>or</strong></p>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','contempo'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','contempo'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo $href; ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','contempo'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo $alt; ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <?php
	}
} 

register_widget('ct_AdWidget');
?>