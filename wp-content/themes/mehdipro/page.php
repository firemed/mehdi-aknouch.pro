<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Longshore
 * @subpackage Template
 */

$inside_page_title = get_post_meta($post->ID, "_ct_inside_page_title", true);

get_header();
	
	echo '<div class="zzmain-content-inner main-content page">';

		echo '<div class="col span_12">';
			
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<h3> PAGE </h3>
				<article class="post row animated fadeInUpBig">

					<div class="inner-pad">

						<?php if($inside_page_title == "Yes") { ?>
							<!-- Post Header -->
							<header class="center marB60">
					            <h1 class="entry-title marT0"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
						    </header>
						    <!-- //Post Header -->
					    <?php } ?>

					    <!-- Post Content -->
					    <div class="content marT30">
					        <?php the_content(); ?>
					    </div>
					    <!-- //Post Content -->

						    <div class="clear"></div>

					</div>

				</article>
				<!-- //Article -->

				<?php endwhile; endif;

		echo '</div>';
		
		get_sidebar();
		
			echo '<div class="clear"></div>';
        
	echo '</div>';

get_footer(); ?> 