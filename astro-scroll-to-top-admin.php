<?php
if( ! is_admin() ) {
	return;
}

/**
 * Load Admin files.
 */
function astro_stt_load_admin_files() {
    if(!is_admin_bar_showing()) return;

	/**
	 * Main admin styles and scripts
	 */
	wp_enqueue_style ( 'astro-scroll-to-top-admin-styles', plugins_url('/css/astro-scroll-to-top-admin.css', __FILE__), array(), astro_stt_plugin_data('Version') );

	wp_register_script( 'astro-scroll-to-top-admin-scripts', plugins_url('/js/astro-scroll-to-top-admin.js', __FILE__), array('jquery'), astro_stt_plugin_data('Version'), true );
	wp_enqueue_script( 'astro-scroll-to-top-admin-scripts' );

	/**
     * Include the plugin navigation.
     */
    include(plugin_dir_path(__FILE__) . 'includes/tabs/tabs-nav.php');
}
add_action( 'admin_enqueue_scripts', 'astro_stt_load_admin_files' );

/**
 * Register options settings.
 */
function astro_stt_register_settings() {


    if (isset($_REQUEST['option_page']) && !empty($_REQUEST['option_page'])) {

		if (strpos($_REQUEST['option_page'], ASTRO_STT_PREFIX) === 0) {

            $option_page = sanitize_text_field($_REQUEST['option_page']);
            $tab = explode('_', $option_page);
            $option_group = $option_page;
            $option_names = astro_stt_option_names(end($tab));

            if (!empty($option_names)) {

                foreach ($option_names as $option_name) {
                    $arr = array();
                    if (strpos($option_name, '_options')) {
                        $arr = array('type' => 'array');
                    }
                    register_setting( $option_group, $option_name, array($arr) );
                }

            }

		}

	}else{
		$tab = 'settings';
		$option_group = ASTRO_STT_PREFIX . '_' . $tab;
		$option_names = astro_stt_option_names($tab);

		if (!empty($option_names)) {
			foreach ($option_names as $option_name) {
				$arr = array();
				if (strpos($option_name, '_options')) {
					$arr = array('type' => 'array');
				}
				register_setting($option_group, $option_name, array($arr));
			}
		}

    }

}
add_action( 'admin_init', 'astro_stt_register_settings' );

/**
 * Display the plugin pages in menu.
 */
if (class_exists('Astro_Plugin_Panel')) {

	add_action('astro_plugin_panel_pages', 'astro_stt_plugin_panel_submenu');

	function astro_stt_plugin_panel_submenu() {
		add_submenu_page(
			'astro-plugin-panel',
			__('Scroll to top', 'astro-scroll-to-top'),
			__('Scroll to top', 'astro-scroll-to-top'),
			'manage_options',
			'astro-scroll-to-top',
			'astro_stt_options'
		);
	}

}

/**
 * Display the plugin panel to do define the settings.
 */
function astro_stt_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.', 'astro-scroll-to-top' ) );
    }

    ?>
    <div class="wrap">
        <h1><?php echo astro_stt_plugin_data('Name'); ?></h1>
        <?php

        $tab  = 'settings'; // default panel
        if (isset($_REQUEST['tab']) && !empty($_REQUEST['tab'])) {
			$tab  = sanitize_text_field($_REQUEST['tab']);
            if (str_contains('-',$tab)) {
				$tab = explode('-', $tab);
				$tab = end($tab);
			}
        }

		astro_stt_tabs_nav($tab);

        $tab_file = plugin_dir_path( __FILE__ ) . 'includes/tabs/tab-' . $tab .'.php';
        if (file_exists($tab_file)) {
			include( plugin_dir_path( __FILE__ ) . 'includes/tabs/tab-' . $tab .'.php' );
		}

        ?>
    </div>
    <?php
}