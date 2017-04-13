<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Longshore
 * @subpackage Template
 */
$video = get_post_meta($post->ID, "_ct_video", true);
$post_lead = get_post_meta($post->ID, "_ct_post_lead", true);
$post_title = get_post_meta($post->ID, "_ct_post_title", true);
$port_post_title = get_post_meta($post->ID, "_ct_port_post_title", true);
$post_meta = get_post_meta($post->ID, "_ct_post_meta", true);

$attachments = get_children(
	array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID
	)
);

$to_display_single = is_single();

?>
<?php

if($to_display_single) { ?>


			
		<!-- Article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('post row animated fadeInUpBig'); ?> <?php #if(!has_post_thumbnail() || $post_lead == 'No') { echo 'data-type="no-thumb"'; } ?>>
		    <?php
			    // Post Lead Slider or Featured Image
				echo '<div class="post-thumb">';
					if($video != '') {
						echo $video;
					} elseif(count($attachments) > 1) {
						echo '<div class="flexslider">';
						echo	'<ul class="slides">';
									ct_slider_images();
						echo	'</ul>';
						echo '</div>';
					} elseif(has_post_thumbnail()) {
						echo '<figure>';
								the_post_thumbnail(620,200);  
						echo '</figure>';
					}
				echo '</div>';
				// End Post Lead Slider or Featured Image
			?>

			<!-- Post Content Inner -->
			<div class="post-content-inner">

				<!-- Post Header -->
				<?php if($post_title == 'Yes' || $port_post_title == 'Yes') { ?>
				<header class="center marT40 marB20">
		            <h1 class="entry-title marT0"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
		            <?php if($post_meta == 'Yes') { ?>
		            <p class="marB0">
						<span class="meta">
							<?php
							#e('By', 'contempo'); ?> <?php #the_author_posts_link(); ?>
							<?php #_e('-', 'contempo'); $cat = get_the_category(); $cat = $cat[0]; ?>
							<!--
							<a href="<?php echo home_url(); ?>/?cat=<?php echo $cat->cat_ID; ?>"><?php echo $cat->cat_name; ?></a>
							<?php #_e('with', 'contempo'); ?>
							<a href="<?php comments_link(); ?>">
							<?php //comments_number('0 Comments','1 Comment','% Comments'); ?>
							-->
						</span>
					</p>
					<?php } ?>
			    </header>
			    <?php } ?>
			    <!-- //Post Header -->

			    <!-- Post Content -->
			    <div class="content marT30">
			        <?php the_content(); ?>
			    </div>
			    <!-- //Post Content -->

				    <div class="clear"></div>

			</div>
			<!-- //Post Content Inner -->

<?php } else { ?>

	<!-- Article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('post row'); ?> <?php # if(!has_post_thumbnail() || $post_lead == 'No') { echo 'data-type="no-thumb"'; } ?>>
	    <?php
		    // Post Lead Slider or Featured Image
		$post_lead = 'Yes';
		$display_slider = false;
		    if($post_lead == 'Yes') {
				echo '<div class="post-thumb">';
					if($video != '') {
						echo $video;
					} elseif(count($attachments) > 1 && $display_slider) {
						echo '<div class="flexslider">';
						echo	'<ul class="slides">';
									ct_slider_images();
						echo	'</ul>';
						echo '</div>';
					} elseif(has_post_thumbnail()) {
						echo '<figure>';
								the_post_thumbnail(620,200);  
						echo '</figure>';
					}
				echo '</div>';
			}
			// End Post Lead Slider or Featured Image
		?>

		<!-- Post Content Inner -->
		<div class="post-content zzpost-content-inner" id="<?php the_permalink() ?>">

			<!-- Post Header -->
			<header class="center marB20">
<!--	            <h1 class="entry-title marT0"><a href="--><?php //the_permalink() ?><!--">--><?php //the_title(); ?><!--</a></h1>-->
	            <p class="marB0">
					<span class="meta">
						<?php #e('By', 'contempo'); ?> <?php #the_author_posts_link(); ?> <?php # _e('-', 'contempo'); ?>
						<?php $cat = get_the_category(); $cat = $cat[0]; ?>
						<a href="<?php echo home_url(); ?>/?cat=<?php echo $cat->cat_ID; ?>">
							<?php echo $cat->cat_name; ?></a> <?php #_e('with', 'contempo'); ?>
<!--						<a href="--><?php //comments_link(); ?><!--">--><?php //comments_number('0 Comments','1 Comment','% Comments'); ?>
							<!--</a>-->
					</span>
				</p>
				<div class="clear"></div>
		    </header>
		    <!-- //Post Header -->

		    <!-- Post Excerpt -->
		    <div class="excerpt zzcenter marT30">
		        <?php #custom_length_excerpt('55'); ?>
				<?php the_content() ; ?>
		    </div>
		    <!-- //Post Excerpt -->

			    <div class="clear"></div>

<!--		    <!-- Read More -->
<!--		    <p class="center marT40">-->
<!--		    	<a class="btn" href="--><?php //the_permalink() ?><!--">--><?php //_e('ça m\'intéresse', 'contempo'); ?><!--</a>-->
<!--			</p>-->
			<!-- //Read More -->

		</div>
		<!-- //Post Content Inner -->

	</article>
	<!-- //Article -->  

<?php } ?>    