<?php
if( ! is_admin() ) {
	return;
}

// Escape the main ASTRO_STT_PREFIX constant
$astro_stt_prefix = esc_attr(ASTRO_STT_PREFIX);

$tab = 'settings';
$option_group = $astro_stt_prefix . $tab;
?>
<div class="<?php echo $astro_stt_prefix . 'wrapper'; ?> <?php echo esc_attr( $option_group ); ?>">

    <form method="post" action="options.php" class="<?php echo esc_attr($option_group); ?>_form">
        <?php
        settings_fields($option_group);
        do_settings_sections($option_group);
        ?>

        <div class="section-wrapper">
            <div class="section-wrapper-inner">

                <h2 id="settings" class="title"><?php _e('Settings', 'astro-scroll-to-top' ); ?></h2>

                <hr>

                <table class="form-table">
					<?php
					$field_label = esc_html__( 'Enable', 'astro-scroll-to-top' );
					$field_description = __('Check to show the button on every post', 'astro-scroll-to-top' );
					$field_name = ASTRO_STT_PREFIX.'enable_everywhere';
					$field_value = get_option($field_name);
					?>
                    <tr>
                        <th scope="row"><label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($field_label); ?></label></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text"><span><?php echo esc_html($field_label); ?></span></legend>
                                <label for="<?php echo esc_attr($field_name); ?>"><input id="<?php echo esc_attr($field_name); ?>"
                                                                                         name="<?php echo esc_attr($field_name); ?>" type="checkbox"
                                                                                         value="1" <?php if ($field_value == "1") {
										echo 'checked="checked"';
									} ?>><?php echo esc_html($field_description); ?></label>
                            </fieldset>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <?php
        submit_button();
        ?>
    </form>

</div>

