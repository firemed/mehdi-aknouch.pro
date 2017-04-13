<?php

function frm_get_onepager_template($template) {
	global $isOnepager;

	/*
	global $post;
	if ($post->ID != "") {
		$id = $post->ID;
	} else {
		$id = 0;
	}

	$isOnepager = get_post_meta($id, "zdIsOnepager", TRUE);
	*/
	
	if ($isOnepager) {
		$template = locate_template(array('index.php'));
	}

	return $template;
	
}
add_filter('template_include', __NAMESPACE__.'\frm_get_onepager_template', 99);


function frm_get_onepager_link($url, $id) {
	$ancestors = get_post_ancestors($id);
	$parent = $ancestors[0];
	$parentIsOnepager = get_post_meta($parent, "zdIsOnepager", TRUE);
	if ($parentIsOnepager) {
		return get_permalink($parent)."#".get_post($id)->post_name;
	} else {
		return $url;
	}
}
add_filter('page_link', __NAMESPACE__.'\frm_get_onepager_link', 10, 2);


function callback($buffer) {
	// modify buffer here, and then return the updated code
	preg_match_all("#<article id=\"post-([0-9]+)\"[^>]*>#", $buffer, $matches);
	foreach($matches[1] as $key => $value) {
		$buffer = preg_replace("%article id=\"post-$value\"%", "article id=\"".get_post($value)->post_name."\"", $buffer);
		$buffer = preg_replace("%(<h1[^>]*>)[\s]*<a href=\"".get_permalink($value)."\"[^>]*>([^<]*)</a>[\s]*</h1>%s", "$1$2</h1>", $buffer);
	}
	return $buffer;
}
function buffer_start() {
	ob_start(__NAMESPACE__.'\callback');
}
function buffer_end() {
	ob_end_flush();
}
add_action('wp_head', __NAMESPACE__.'\buffer_start');
add_action('wp_footer', __NAMESPACE__.'\buffer_end');

?>
