<?php
if( ! is_admin() ) {
	return;
}

function astro_stt_tabs_nav($panel) {

	// active tab class
	$active_class = 'nav-tab-active';

	echo '<nav class="nav-tab-wrapper">';

	$setting_tab_url = esc_url('?page='.ASTRO_STT_TEXTDOMAIN.'&tab=settings');
	echo '<a href="' . $setting_tab_url . '" class="nav-tab ';
	if ($panel == 'settings') { echo $active_class; }
	echo '">' . esc_html__('Settings', 'astro-scroll-to-top' ) . '</a>';

	$support_tab_url = esc_url('?page='.ASTRO_STT_TEXTDOMAIN.'&tab=support');
	echo '<a href="' . $support_tab_url . '" class="nav-tab ';
	if ($panel == 'support') { echo $active_class; }
	echo '">' . esc_html__('Support', 'astro-scroll-to-top' ) . '</a>';

	echo '</nav>';

}