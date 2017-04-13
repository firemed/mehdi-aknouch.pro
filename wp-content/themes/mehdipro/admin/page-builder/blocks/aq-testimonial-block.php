<?php
/** Features Block 
 * A simple block that output the "features" HTML */
if(!class_exists('AQ_Testimonial_Block')) {
	class AQ_Testimonial_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Testimonial',
				'size' => 'span12'
			);
			
			parent::__construct('aq_testimonial_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'testnum' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
            <p class="description">This block pulls posts from the Testimonials custom post type, and cycles through them automatically.</p>
			<p class="testnum">
				<label for="<?php echo $this->get_field_id('testnum') ?>">
					<?php _e('Number of items', 'contempo'); ?>
					<?php echo aq_field_input('testnum', $block_id, $testnum) ?>
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '<div class="flexslider">';
				echo '<ul class="slides">';
				global $post;
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => $testnum,
				);
				$query = new WP_Query($args);
					
				if ( have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				
					<li>
						<p class="marB10"><?php the_content(); ?>
						<h5 class="marB0"><?php the_title(); ?></h5>
					</li>
		
				<?php endwhile; endif; wp_reset_query(); ?>
			
			<?php
				echo '</ul>';
			echo '</div>';
			
		}
		
	}
}

