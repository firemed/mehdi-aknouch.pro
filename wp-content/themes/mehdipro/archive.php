<?php
/**
 * Archive Template
 *
 * @package WP Longshore
 * @subpackage Template
 */

get_header();

$cpt = 0;
?>

<div class="main-content archive">

	<div class="col span_12">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php
				global $post;
				$post_slug=$post->post_name;
			?>

			<div class="subpage-container <?php echo $post_slug; ?> <?php echo ($cpt++ % 2) == 0 ? 'odd' : 'even' ; ?>  ">

				<?php get_template_part( 'content', get_post_format() ); ?>

			</div>
			
		<?php endwhile; ?>
		
			<?php ct_pagination(); ?>
		
		<?php else : ?>
		
			<?php get_template_part( 'content', 'none' ); ?>
		
		<?php endif; ?>

	</div>
		
	<?php get_sidebar(); ?>
		
    <div class="clear"></div>
        
</div>

<?php get_footer(); ?>