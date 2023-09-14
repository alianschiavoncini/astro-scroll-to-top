<?php
/*
 * Plugin Name:       Astro Scroll To Top
 * Plugin URI:        https://wordpress.org/plugins/astro-scroll-to-top
 * Description:       This plugin displays the scroll to the top button on your website.
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            AstroThemes
 * Author URI:        https://www.astrothemes.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       astro-scroll-to-top
 * Domain Path:       /languages
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class file inclusions.
 */
require_once(dirname(__FILE__) . '/includes/classes/class-astro-plugin-panel.php');

/**
 * File inclusions.
 */
require_once(dirname(__FILE__) . '/astro-scroll-to-top-common.php');

if ( is_admin() ) {
	require_once(dirname(__FILE__) . '/astro-scroll-to-top-admin.php');
}

/**
 * Plugin constants.
 */
define('ASTRO_STT_PREFIX', 'astro_stt_');
define('ASTRO_STT_TEXTDOMAIN', astro_stt_plugin_data('TextDomain'));

/**
 * Loading Text Domain.
 */
add_action( 'init', 'astro_stt_load_textdomain' );
function astro_stt_load_textdomain() {
	load_plugin_textdomain( 'astro-scroll-to-top', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Enqueue plugin files.
 */
add_action('init', 'astro_stt_enqueue_files');
function astro_stt_enqueue_files() {

	$plugin_version = astro_stt_plugin_data('Version');

	// Enqueue main files
	wp_register_style( 'astro-scroll-to-top', plugin_dir_url( __FILE__ ) . 'css/astro-scroll-to-top.css', array(), $plugin_version );
	wp_enqueue_style( 'astro-scroll-to-top' );
	wp_enqueue_script( 'astro-scroll-to-top', plugin_dir_url( __FILE__ ) . 'js/astro-scroll-to-top.js', array( 'jquery' ), $plugin_version );
}

/**
 * Add Settings Link.
 */
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'astro_stt_add_plugin_page_settings_link');
function astro_stt_add_plugin_page_settings_link( $links ) {
	array_unshift(
		$links,
		'<a href="' .
		admin_url('admin.php?page=' . ASTRO_STT_TEXTDOMAIN ) .
		'">' . __('Settings', 'astro-scroll-to-top' ) . '</a>'
	);
	return $links;
}
