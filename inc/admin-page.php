<?php
/**
 * Admin Settings Page for Base47 Lead Form
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Add menu item
 */
function base47_lf_admin_menu() {
    add_menu_page(
        'Base47 Lead Forms',
        'Base47 Lead Forms',
        'manage_options',
        'base47-lead-form',
        'base47_lf_admin_page_html',
        'dashicons-feedback',
        57
    );
}
add_action( 'admin_menu', 'base47_lf_admin_menu' );



/**
 * Register settings
 */
function base47_lf_register_settings() {

    register_setting(
        'base47_lf_settings_group',
        'b47lf_settings',
        [
            'sanitize_callback' => 'base47_lf_sanitize_settings'
        ]
    );

}
add_action( 'admin_init', 'base47_lf_register_settings' );



/**
 * Sanitize all settings
 */
function base47_lf_sanitize_settings( $input ) {

    $output = [];

    $output['include_admin_email'] =
        ! empty( $input['include_admin_email'] ) ? 1 : 0;

    $output['additional_emails'] =
        sanitize_textarea_field( $input['additional_emails'] ?? '' );

    $output['from_name'] =
        sanitize_text_field( $input['from_name'] ?? '' );

    $output['from_email'] =
        sanitize_email( $input['from_email'] ?? '' );

    // Auto-reply settings
    $output['auto_reply_enabled'] =
        ! empty( $input['auto_reply_enabled'] ) ? 1 : 0;

    $output['auto_reply_subject'] =
        sanitize_text_field( $input['auto_reply_subject'] ?? '' );

    $output['auto_reply_message'] =
        sanitize_textarea_field( $input['auto_reply_message'] ?? '' );

    // WhatsApp number
    $output['whatsapp_number'] =
        sanitize_text_field( $input['whatsapp_number'] ?? '' );

    return $output;
}



/**
 * Admin Page HTML
 */
function base47_lf_admin_page_html() {

    if ( ! current_user_can('manage_options') ) {
        return;
    }

    $s = get_option( 'b47lf_settings', [] );

    ?>

    <div class="wrap">
        <h1>Base47 Lead Form – Settings</h1>

        <form method="post" action="options.php" style="max-width:850px;margin-top:30px;">

            <?php
            settings_fields( 'base47_lf_settings_group' );
            ?>

            <table class="form-table">

                <!-- EMAIL SETTINGS -->
                <tr>
                    <th><label>Email Recipients</label></th>
                    <td>
                        <label>
                            <input type="checkbox" name="b47lf_settings[include_admin_email]" value="1"
                                <?php checked( !empty($s['include_admin_email']) ); ?>>
                            Send copy to WP Admin Email (<?php echo esc_html( get_option('admin_email') ); ?>)
                        </label>

                        <p><strong>Additional Emails</strong> (one per line):</p>
                        <textarea name="b47lf_settings[additional_emails]" rows="4" style="width:100%;"><?php
                            echo esc_textarea( $s['additional_emails'] ?? '' );
                        ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th><label>“From” Email Settings</label></th>
                    <td>
                        <p>
                            <label>From Name:<br>
                                <input type="text" name="b47lf_settings[from_name]" value="<?php echo esc_attr($s['from_name'] ?? ''); ?>" style="width:100%;">
                            </label>
                        </p>

                        <p>
                            <label>From Email:<br>
                                <input type="email" name="b47lf_settings[from_email]" value="<?php echo esc_attr($s['from_email'] ?? ''); ?>" style="width:100%;">
                            </label>
                        </p>
                    </td>
                </tr>

                <!-- AUTO-REPLY -->
                <tr>
                    <th><label>Auto-Reply Email</label></th>
                    <td>
                        <label>
                            <input type="checkbox" name="b47lf_settings[auto_reply_enabled]" value="1"
                                <?php checked( !empty($s['auto_reply_enabled']) ); ?>>
                            Enable auto-reply to customer
                        </label>

                        <p><label>Subject:<br>
                            <input type="text" name="b47lf_settings[auto_reply_subject]"
                                   value="<?php echo esc_attr($s['auto_reply_subject'] ?? ''); ?>"
                                   style="width:100%;">
                        </label></p>

                        <p><label>Message:<br>
                            <textarea name="b47lf_settings[auto_reply_message]" rows="5" style="width:100%;"><?php
                                echo esc_textarea( $s['auto_reply_message'] ?? '' );
                            ?></textarea>
                        </label></p>
                    </td>
                </tr>

                <!-- WHATSAPP -->
                <tr>
                    <th><label>WhatsApp Number</label></th>
                    <td>
                        <input type="text" name="b47lf_settings[whatsapp_number]"
                               value="<?php echo esc_attr($s['whatsapp_number'] ?? ''); ?>"
                               style="width:100%;">

                        <p class="description">
                            Enter digits only. Example: <strong>972501234567</strong><br>
                            Used for the WhatsApp "Send Message" button.
                        </p>
                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>

        </form>
    </div>

    <?php
}