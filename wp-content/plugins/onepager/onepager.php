<?php

/**
Plugin Name: OnePager for WordPress
Plugin URI: http://zweidesign.ch
Description: This WordPress Plugin transforms children pages into OnePager sections of their respective parent page.
Version: 0.1
Author: zweidesign GmbH
Author URI: http://zweidesign.ch
License: GPLv2 or later

Copyright 2014  zweidesign GmbH  (email: thierry.hinder@zweidesign.ch)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace OnePager;

register_activation_hook( __FILE__, 'activation' );
function activation() {
    //do cool activation stuff
}

register_deactivation_hook( __FILE__, 'deactivation' );
function deactivation() {
    //do something
}


function frm_get_onepager($query) {
	global $pageID, $isOnepager;
	
	if ($query->is_main_query()) {
	
		if ($query->get("page_id") != 0) {
			$pageID = $query->get("page_id");
		} else if (get_queried_object_id() != 0) {
			$pageID = get_queried_object_id();
		} else {
			$pageID = 0;
		}
		
		$isOnepager = get_post_meta($pageID, "zdIsOnepager", TRUE);
		
		if ($isOnepager) {
			$query->init();
			$query->set("post_type", "page");
			$query->set("post_parent", $pageID);
			$query->set("orderby", "menu_order");
			$query->set("order", "ASC");
		}
		
	}
	
}
add_action('pre_get_posts', __NAMESPACE__.'\frm_get_onepager');


if (is_admin()) {
	include(plugin_dir_path( __FILE__ ).'inc/backend.inc.php');
} else {
	include(plugin_dir_path( __FILE__ ).'inc/frontend.inc.php');
}

?>
