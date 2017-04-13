<?php
/**
 * Loop
 *
 * @package Trident
 * @subpackage Template
 */
?>
<ul class="grid cs-style-3 effect-6">
<?php
if (have_posts()) {

	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => -1,
		'category_name'  => 'formules'
	);
	$query = new WP_Query($args);

$first_count = 3;

while ( $query->have_posts() ) : $query->the_post(); ?>

    <li class="<?php ct_first_term(); ?> item col span_4 <?php if($first_count-- > 0){ ?> first <?php } ?>">
		<?php ct_first_image_linked_portfolio(); ?>
    </li>

<?php endwhile; ?>

</ul>

<?php } else { ?>

    <p class="nomatches left clear"><?php _e( 'Apologies, but no results were found for the requested archive.<br />Perhaps searching will help find a related post.', 'contempo' ); ?></p>

<?php } wp_reset_query(); ?>
