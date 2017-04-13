<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Longshore
 * @subpackage Template
 */

$post_lead = get_post_meta($post->ID, "_ct_post_lead", true);
$post_social = get_post_meta($post->ID, "_ct_post_social", true);

$attachments = get_children(
	array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	)
);

get_header();
	
	echo '<div class="main-content-inner">';

		echo '<div class="col span_12">';
			
			if ( have_posts() ) : while ( have_posts() ) : the_post();

						get_template_part('content');

					echo '<div class="inner-pad">';

						if($ct_options['ct_portfolio_single_info'] == "Yes") { ?>
			                <ul id="portfolio-info" class="col span_7 first">
			                    <?php if(get_post_meta($post->ID, "_ct_client", true)) { ?>
			                    <li><strong><?php _e('Client:', 'contempo'); ?></strong> <?php echo get_post_meta($post->ID, "_ct_client", true); ?></li>
			                    <?php } ?>
			                    <li><strong><?php _e('Date:', 'contempo'); ?></strong> <?php the_time($GLOBALS['ctdate']); ?></li>
			                    <?php if(get_post_meta($post->ID, "_ct_site", true)) { ?>
			                    <?php } ?>
			                </ul>
			                <div class="col span_5">
				                <a class="btn right" href="<?php echo get_post_meta($post->ID, "_ct_site", true); ?>"><?php _e('View Project', 'contempo'); ?></a>
				                	<div class="clear"></div>
			                </div>
			            <?php }

						ct_post_social();

					 endwhile; endif;

				        // Related Posts
						ct_related_portfolio();

					echo '</div>';
					// End Inner Pad

				echo '</article>';
				// End Article 

		echo '</div>';

		// Sidebar
		get_sidebar();
		
			echo '<div class="clear"></div>';
        
	echo '</div>';

get_footer(); ?> 