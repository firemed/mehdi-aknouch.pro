<?php
/**
 * Latest Posts
 *
 * @package WP Portico
 * @subpackage Widget
 */
 
class ct_Latest extends WP_Widget {

   function ct_Latest() {
	   $widget_ops = array('description' => 'Display your latest posts.' );
	   parent::WP_Widget(false, __('CT Latest Posts', 'contempo'),$widget_ops);      
   }

   function widget($args, $instance) {  
	extract( $args );
	$title = $instance['title'];
	$number = $instance['number'];
	?>
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; }
		echo '<ul>';
		global $post;
		query_posts(array(
            'order' => 'DSC',
            'posts_per_page' => $number
		));
            
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <li>
                <h5 class="marB5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <?php the_excerpt(); ?>
            </li>

        <?php endwhile; endif; wp_reset_query(); ?>
		
		<?php echo '</ul>'; ?>
		
		<?php echo $after_widget; ?>   
    <?php
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {
	   
		$taxonomies = array (
			'property_type' => 'property_type',
			'beds' => 'beds',
			'baths' => 'baths',
			'status' => 'status',
			'city' => 'city',
			'state' => 'state',
			'zipcode' => 'zipcode',
			'additional_features' => 'additional_features'
		);
   
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

register_widget('ct_Latest');
?>