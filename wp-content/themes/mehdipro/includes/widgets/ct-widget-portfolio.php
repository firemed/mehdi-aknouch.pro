<?php
/**
 * Testimonials
 *
 * @package WP Portico
 * @subpackage Widget
 */
 
class ct_Portfolio extends WP_Widget {

   function ct_Portfolio() {
	   $widget_ops = array('description' => 'Display your portfolio.' );
	   parent::WP_Widget(false, __('CT Portfolio', 'contempo'),$widget_ops);      
   }

   function widget($args, $instance) {  
	extract( $args );
	$title = $instance['title'];
	$number = $instance['number'];
	?>
		<?php echo $before_widget; ?>
        <ul class="right">
            <li><a class="prev port-item" href="#"><i class="icon-chevron-left"></i></a></li>
            <li><a class="next port-item" href="#"><i class="icon-chevron-right"></i></a></li>
        </ul>
		<?php if ($title) { echo $before_title . $title . $after_title; }
		echo '<div class="clear"></div>';
		echo '<ul class="portfolio grid cs-style-3">';
		global $post;
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $number,
		);
		$query = new WP_Query($args);
            
        if ( have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
        
            <li>
                <?php ct_first_image_linked_portfolio_widget(); ?>
            </li>

        <?php endwhile; endif; wp_reset_query();
		echo '</ul>';
		
		echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {
   
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? esc_attr( $instance['number'] ) : '';
		
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number:','contempo'); ?></label>
            <select name="<?php echo $this->get_field_name('number'); ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>">
                <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
                <option value="<?php echo $i; ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </p>
		<?php
	}
} 

register_widget('ct_Portfolio');
?>