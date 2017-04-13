<?php
/**
 * Sidebar Template
 *
 * @package Longshore
 * @subpackage Template
 */

?>

<div id="sidebar" class="col span_3">
	<div id="sidebar-inner">

		<?php

			if (is_page()) {
	            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Pages') ) :else: endif;
	        } elseif(is_single()) {
	            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Single') ) :else: endif;
	        } elseif(is_archive() || is_search() || is_home()) {
	            if (function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar Blog') ) :else: endif;
	        }

        ?>

			<div class="clear"></div>
	</div>
</div>