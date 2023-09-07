<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the Plugin Data.
 */
function astro_stt_plugin_data($var = false) {
	$plugin_file = plugin_dir_path(__FILE__) . 'astro-scroll-to-top.php';
	if( !function_exists('get_plugin_data') ){
		require_once(ABSPATH . 'wp-admin/includes/plugin.php');
	}
	$get_plugin_data = get_plugin_data( $plugin_file );
	if ($var) { $get_plugin_data = $get_plugin_data[$var]; }
	return $get_plugin_data;
}

/**
 * Set the plugin options names.
 */
function astro_stt_option_names($tab = false) {

	$option_names = false;

	switch ($tab) {
		case 'settings' :
			$option_names = array(
				ASTRO_STT_PREFIX . 'enable_everywhere' => ASTRO_STT_PREFIX . 'enable_everywhere',
			);
			break;
	}

	return $option_names;
}

/**
 * Unregister the option names if the plugin will delete.
 */
register_uninstall_hook(__FILE__, 'astro_stt_unregister_option_names');
function astro_stt_unregister_option_names() {
	$tab = 'settings';
	$option_group = ASTRO_STT_PREFIX . '_' . $tab;
	$option_names = astro_stt_option_names($tab);

	foreach ($option_names as $option_name) {
		register_setting( $option_group, $option_name );
	}
}

/**
 * Return the Astro Scroll To Top template.
 */
function astro_stt_output() {
	// Get the Template
	$template_file = plugin_dir_path(__FILE__) . 'templates/astro-scroll-to-top.php';
	if (file_exists($template_file)) { // Check if the template file exists.
		ob_start();
		include($template_file);
		$content = ob_get_clean();
		echo $content;
	}
}
//add_shortcode('astro-scroll-to-top', 'astro_stt_shortcode_output');
add_action( 'wp_footer', 'astro_stt_output' );
