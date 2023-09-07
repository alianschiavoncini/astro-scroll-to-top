<?php
if( ! is_admin() ) {
	return;
}

// Get the plugin Text Domain
$plugin_text_domain = astro_sb_plugin_data('TextDomain');

// Escape the main ASTRO_STT_PREFIX constant
$astro_stt_prefix = esc_attr(ASTRO_STT_PREFIX);

$tab = 'support';
$option_group = $astro_stt_prefix . $tab;

settings_fields($option_group);
do_settings_sections($option_group);
?>
<div class="<?php echo $astro_stt_prefix . 'wrapper'; ?> <?php echo esc_attr( $option_group ); ?>">

    <div class="section-wrapper">
        <div class="section-wrapper-inner">

            <h2 id="support" class="title"><?php esc_html_e('Support', 'astro-scroll-to-top' ); ?></h2>

            <hr>

            <h3 id="support-faqs" class="title"><?php esc_html_e( 'FAQs', 'astro-scroll-to-top' ); ?></h3>
            <p><span class="support-faq-question"><?php esc_html_e( 'Do you need support?', 'astro-scroll-to-top' ); ?></span><br>
                <span class="support-faq-answer"><?php esc_html_e( 'Request support at the ', 'astro-scroll-to-top' ); ?> <a href="https://wordpress.org/support/plugin/astro-scroll-to-top/" target="_blank"><?php _e( 'plugin support page', 'astro-scroll-to-top' ); ?></a> <?php _e( 'or write me an email to', 'astro-scroll-to-top' ); ?> <a href="mailto:info@astrothemes.com">info@astrothemes.com</a>.</span></p>

        </div>
    </div>

</div>
