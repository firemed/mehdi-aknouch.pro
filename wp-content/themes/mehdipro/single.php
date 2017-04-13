<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Longshore
 * @subpackage Template
 */

$social = $ct_options['ct_post_social'];

$attachments = get_children(
	array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	)
);

get_header();
	
	echo '<div class="zzmain-content-inner main-content single">';

		echo '<div class="col span_12">';
			
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				?>
<?php

				get_template_part('content');

					echo '<div class="inner-pad">';

						ct_post_social();

					 endwhile; endif;

						// Link Pages
				        wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'contempo' ) . '</span>', 'after' => '</div>' ) );

				        // Author Info
				        ct_author_info();

				        // Related Posts
						ct_related_posts();

						// Post Nav
						ct_post_nav();

						// Comments
				        if ($ct_options['ct_post_comments'] == "Yes" && comments_open() || '0' != get_comments_number() ) :

				        	// If comments are open or we have at least one comment, load up the comment template
							comments_template();
						
						endif;
						// End Comments

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