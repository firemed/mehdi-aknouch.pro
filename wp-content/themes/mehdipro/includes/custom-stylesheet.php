<?php

global $ct_options;

$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = '';

if(isset($ct_options['ct_background_image'])) {
	$use_bg = $ct_options['ct_background_image'];
}

if($use_bg) {

	$custom_bg = $ct_options['ct_body_bg_image'];
	
	if(!empty($custom_bg)) {
		$bg_img = $custom_bg;
	} else {
		$bg_img = isset( $ct_options['ct_custom_bg'] ) ? esc_attr( $ct_options['ct_custom_bg'] ) : '';
	}
	
	$bg_pos = $ct_options['ct_body_bg_pos'];
	
	$ct_custom_bg = isset( $ct_options['ct_custom_bg'] ) ? esc_attr( $ct_options['ct_custom_bg'] ) : '';
	
	if($ct_custom_bg) {
		$bg_rep = 'repeat';
	} else {
		$bg_rep = $ct_options['ct_body_bg_repeat'];
	}
	
	$background = 'url('. $bg_img .') '.$bg_pos.' '.$bg_rep ;

}

?>
<style type="text/css">
<?php if($ct_options['ct_body_bg_color']) { ?>
	#main-content { background:<?php echo $ct_options['ct_body_bg_color']; ?> <?php if($background != "") { echo $background; } ?> !important;}
<?php } ?>
<?php if($background) { ?>
	#main-content { background:<?php echo $background; ?> !important;}
<?php } ?>

<?php if(!empty($ct_options['ct_body_font_color'])) { echo " body { color: " . $ct_options['ct_body_font_color'] . " !important;}"; } ?>

<?php if(!empty($ct_options['ct_left_bg_color'])) { echo " body, #left-sidebar { background: " . $ct_options['ct_left_bg_color'] . " !important;}"; } ?>

<?php if(!empty($ct_options['ct_article_bg_color'])) { echo " article.post { background: " . $ct_options['ct_article_bg_color'] . " !important;}"; } ?>

<?php if(!empty($ct_options['ct_button_border_color'])) { echo "a.btn, btn, .pagination .current { border-color: " . $ct_options['ct_button_border_color'] . " !important;}"; } ?>

<?php if(!empty($ct_options['ct_link_color'])) { echo " #left-sidebar .widget.widget_ct_social a {background-color: " . $ct_options['ct_link_color'] . ";}"; } ?>

<?php if(!empty($ct_options['ct_nav_selected_link_color'])) { echo " #left-sidebar nav li.current-menu-item a, #left-sidebar .widget li a.selected {color: " . $ct_options['ct_nav_selected_link_color'] . ";}"; } ?>

<?php if(!empty($ct_options['ct_link_color'])) { echo " a:link, #left-sidebar nav a, #left-sidebar .widget a {color: " . $ct_options['ct_link_color'] . ";}"; } ?>

<?php if(!empty($ct_options['ct_visited_color'])) { echo " a:visited {color: " . $ct_options['ct_visited_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_hover_color'])) { echo " a:hover {color: " . $ct_options['ct_hover_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_active_color'])) { echo " a:active {color: " . get_option("ct_alink_color", true) . ";}"; } ?>

<?php if(!empty($ct_options['ct_widget_heading_color'])) { echo " .widget h5 { border-top-color: " . $ct_options['ct_widget_heading_color'] . ";}"; } ?>
<?php if(!empty($ct_options['ct_widget_heading_text_color'])) { echo " .widget h5 { color: " . $ct_options['ct_widget_heading_text_color'] . ";}"; } ?>

<?php if(!empty($ct_options['ct_custom_css'])) { print($ct_options['ct_custom_css']); } ?>
</style>