<?php

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

?>

<!-- Article -->
	<div class="map-post "  id="<?php the_ID() ?>">

		<div class="content">
			<?php the_content() ; ?>
		</div>

		<div class="clear"></div>

	</div>
