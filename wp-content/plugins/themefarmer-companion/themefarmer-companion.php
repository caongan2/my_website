<?php
/*
Plugin Name: ThemeFarmer Companion
Description: Advance Extension For Theme from ThemeFarmer. enjoy full functionality of compatible theme by installing this plugin.
Author: ThemeFarmer
Author URI: https://www.themefarmer.com/
Domain Path: /lang/
Version: 1.3.6
Text Domain: themefarmer-companion

ThemeFarmer Companion is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

ThemeFarmer Companion is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with ThemeFarmer Companion. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

define('THEMEFARMER_COMPANION_DIR', plugin_dir_path(__FILE__));
define('THEMEFARMER_COMPANION_URI', plugin_dir_url(__FILE__));
define('THEMEFARMER_COMPANION_VAR', '1.3.4');

function themefarmer_companion_init() {
	load_plugin_textdomain('themefarmer-companion', false, dirname(plugin_basename(__FILE__)) . '/languages');

}
add_action('plugins_loaded', 'themefarmer_companion_init');

function themefarmer_is_this_themefarmer_theme() {
	$theme     = wp_get_theme();
	$tf_themes = array(
		'Scope',
		'Amazica',
	);

	if (in_array($theme->name, $tf_themes) || in_array($theme->parent_theme, $tf_themes)) {
		return true;
	}
	return false;
}

function themefarmer_is_this_themefarmer_theme2() {
	$theme     = wp_get_theme();
	$tf_themes = array(
		'NewStore',
	);

	if (in_array($theme->name, $tf_themes) || in_array($theme->parent_theme, $tf_themes)) {
		return true;
	}
	return false;
}

require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/sanitize-cb.php';

if (themefarmer_is_this_themefarmer_theme()) {
	if (!class_exists('ThemeFarmer_Load_Fields')) {
		require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'fields/fields-init.php';
	}
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/home-sections.php';
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/companion-customizer.php';
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/class-themefarmer-menu-icon-walker.php';

}

if (themefarmer_is_this_themefarmer_theme2()) {
	if (!class_exists('ThemeFarmer_Load_Fields')) {
		require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'fields/fields-init.php';
	}
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'theme-files/newstore-functions.php';
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/class-themefarmer-menu-icon-walker.php';
}

$theme = wp_get_theme();
if ($theme->name === 'StoreZ' || $theme->parent_theme === 'StoreZ') {
	if (!class_exists('ThemeFarmer_Load_Fields')) {
		require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'fields/fields-init.php';
	}
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'theme-files/storez-functions.php';
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/class-themefarmer-menu-icon-walker.php';
	
}

function themefarmer_action_woocommerce_loaded(){
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/class-themefarmer-wc-widget-products.php';
}
add_action( 'woocommerce_loaded', 'themefarmer_action_woocommerce_loaded', 10, 1 ); 


function themefarmer_companion_loader() {
	require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'inc/functions.php';
}
add_action('init', 'themefarmer_companion_loader');

function themefarmer_theme_releted_func_init() {
	$theme = wp_get_theme();
	if ($theme->name === 'Scope' || $theme->parent_theme === 'Scope') {
		require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'theme-files/scope-customizer.php';
		define('THEMEFARMER_COMPANION_PRO_LINK', 'https://themefarmer.com/product/scope-pro/');
	}

	if ($theme->name === 'Amazica' || $theme->parent_theme === 'Amazica') {
		require_once trailingslashit(THEMEFARMER_COMPANION_DIR) . 'theme-files/amazica-customizer.php';
		define('THEMEFARMER_COMPANION_PRO_LINK', 'https://themefarmer.com/product/amazica-pro/');
	}

	if ($theme->name === 'NewStore' || $theme->parent_theme === 'NewStore') {
		define('THEMEFARMER_COMPANION_PRO_LINK', 'https://themefarmer.com/product/newestore-pro/');
	}

	if ($theme->name === 'StoreZ' || $theme->parent_theme === 'StoreZ') {
		define('THEMEFARMER_COMPANION_PRO_LINK', 'https://themefarmer.com/product/storez-pro/');
	}

}
add_action('init', 'themefarmer_theme_releted_func_init');

if (!function_exists('themefarmer_companion')) {
	function themefarmer_companion() {

	}
}

function themefarmer_companion_front_scripts() {
	wp_enqueue_script('themefarmer-companion-front-script', THEMEFARMER_COMPANION_URI . 'assets/js/themefarmer-front.js', array('jquery'), THEMEFARMER_COMPANION_VAR, true);
	wp_localize_script('themefarmer-companion-front-script', 'themefarmer_companion_obj', array(
		'ajax_url' => esc_url(admin_url('admin-ajax.php')),
	));
}
add_action('wp_enqueue_scripts', 'themefarmer_companion_front_scripts');

function themefarmer_companion_storez_activation() {
	$imgsDir = trailingslashit(THEMEFARMER_COMPANION_DIR) . 'theme-files/demos/storez/images/';

	$uploadImgs = array(
		$imgsDir . 'logo.png',
		$imgsDir . 'banner1.jpg',
		$imgsDir . 'banner2.jpg',
		$imgsDir . 'banner3.jpg',
		$imgsDir . 'slide1-left-img.jpg',
		$imgsDir . 'slide2-left-img.jpg',
		$imgsDir . 'slide3-left-img.jpg',
	);

	$parent_id = null;
	foreach ($uploadImgs as $imgUp) {
		$filename    = basename($imgUp);
		$upload_file = wp_upload_bits($filename, null, file_get_contents($imgUp));
		if (!$upload_file['error']) {
			$wp_filetype = wp_check_filetype($filename, null);
			$attachment  = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_parent'    => $parent_id,
				'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
				'post_excerpt'   => '',
				'post_status'    => 'inherit',
			);
			$ImageId[] = $attachment_id = wp_insert_attachment($attachment, $upload_file['file'], $parent_id);

			if (!is_wp_error($attachment_id)) {
				require_once ABSPATH . "wp-admin" . '/includes/image.php';
				$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
				wp_update_attachment_metadata($attachment_id, $attachment_data);
			}
		}

	}
	update_option('storez_media_upload_ids', $ImageId);
}

function themefarmer_companion_activation() {
	$theme = wp_get_theme();
	if (themefarmer_is_this_themefarmer_theme() || themefarmer_is_this_themefarmer_theme2() || $theme->name === 'StoreZ' || $theme->parent_theme === 'StoreZ') {

		$front_page = get_option('show_on_front');
		if ($front_page !== 'page') {

			$page_home    = get_page_by_path('home');
			$page_home_id = 0;
			if (empty($page_home)) {
				$page_home_id = wp_insert_post(array(
					'post_type'   => 'page',
					'post_title'  => esc_html__('Home', 'themefarmer-companion'),
					'post_status' => 'publish',
					'post_name'   => 'home',
				));
			} else if (absint($page_home->ID) > 0) {
				$page_home_id = $page_home->ID;
			}

			$page_blog    = get_page_by_path('blog');
			$page_blog_id = 0;
			if (empty($page_blog)) {
				$page_blog_id = wp_insert_post(array(
					'post_type'   => 'page',
					'post_title'  => esc_html__('Blog', 'themefarmer-companion'),
					'post_status' => 'publish',
					'post_name'   => 'blog',
				));
			} else if (absint($page_blog->ID) > 0) {
				$page_blog_id = $page_blog->ID;
			}

			if (absint($page_home_id) > 0 && absint($page_blog_id) > 0) {
				update_option('page_on_front', $page_home_id);
				update_option('page_for_posts', $page_blog_id);
				update_option('show_on_front', 'page');
			}
		}
	}

	if (themefarmer_is_this_themefarmer_theme2() || $theme->name === 'StoreZ' || $theme->parent_theme === 'StoreZ') {
		$page_home = get_page_by_path('home');
		if (!empty($page_home) && absint($page_home->ID) > 0) {
			update_post_meta($page_home->ID, '_wp_page_template', 'templates/frontpage.php');
		}
	}

	if ($theme->name === 'StoreZ' || $theme->parent_theme === 'StoreZ') {
		themefarmer_companion_storez_activation();
	}

	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'themefarmer_companion_activation');
