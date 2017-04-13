<?php
/**
 * Portfolio Archive Home Template
 *
 * @package Trident
 * @subpackage Template
 */

get_header();

?>

	<!-- // Isotope Container -->
	<div id="isotope-container">
	    <?php get_template_part('loop','portfolio-home'); ?>
		    <div class="clear"></div>
	</div>

<?php get_footer(); ?>
