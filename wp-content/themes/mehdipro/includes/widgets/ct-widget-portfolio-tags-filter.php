<?php
/**
 * Portfolio Tags Filter
 *
 * @package WP Longshore
 * @subpackage Widget
 */
 
class ct_PortfolioTagsFilter extends WP_Widget {

   function ct_PortfolioTagsFilter() {
	   $widget_ops = array('description' => 'This is a portfolio tags filter widget to use on portfolio pages only, use in left sidebar.' );
       parent::WP_Widget(false, __('CT Portfolio Tags Filter', 'contempo'),$widget_ops);      
   }

   function widget($args, $instance) {  
    extract( $args );
   	$title = $instance['title'];

        echo $before_widget;
			if ($title) {
				echo $before_title . $title . $after_title;
			}
			ct_tags_filter();
		echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
   
       $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

       ?>
       <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
         <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
      </p>
      <p><?php _e('Use this widget on portfolio pages only in the left sidebar.', 'contempo'); ?></p>
      <?php
   }
} 

register_widget('ct_PortfolioTagsFilter');
?>