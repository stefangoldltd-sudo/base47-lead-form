<?php
/**
 * Base47 Lead Form – WHATSAPP HANDLER
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * WhatsApp Handler (AJAX)
 * JS action: b47lf_whatsapp_lead
 */
function base47_lf_whatsapp_handler() {

    // Nonce
    if (
        ! isset($_POST['nonce']) ||
        ! wp_verify_nonce($_POST['nonce'], 'base47_lf_submit')
    ) {
        wp_send_json_error(['message'=>'Security check failed.'], 400);
    }

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
    $form_id = sanitize_text_field( $_POST['form_id'] ?? 'form-1' );
    $msg     = wp_strip_all_tags( $_POST['message'] ?? '' );
    $page_url = esc_url_raw( $_POST['page_url'] ?? home_url('/') );

    // Save Lead (use SAME CPT as email leads)
    $post_id = wp_insert_post(array(
        'post_type'   => 'b47_lead',
        'post_status' => 'publish',
        'post_title'  => "WhatsApp Lead – $name",
    ));

    if ($post_id) {
        update_post_meta($post_id, '_name',   $name);
        update_post_meta($post_id, '_email',  $email);
        update_post_meta($post_id, '_phone',  $phone);
        update_post_meta($post_id, '_form_id', $form_id);
        update_post_meta($post_id, '_source', 'whatsapp');
        update_post_meta($post_id, '_message', $msg);
        update_post_meta($post_id, '_page_url', $page_url);
    }

    // Settings
    $s = get_option('b47lf_settings', []);

    // WhatsApp number
    $wa = isset($s['whatsapp_number']) ? preg_replace('/\D+/','',$s['whatsapp_number']) : '';

    if (!$wa) {
        wp_send_json_error(['message'=>'WhatsApp number missing'],400);
    }

    // Build WA text
    $text  = "Hi, my name is $name.\n";
    $text .= "I'm interested in your services ($form_id).\n\n";

    if ($phone) $text .= "Phone: $phone\n";
    if ($email) $text .= "Email: $email\n";
    if ($msg)   $text .= "\nMessage:\n$msg\n";

    $text .= "\nPage: $page_url";

    $encoded = rawurlencode($text);

    $redirect = "https://wa.me/{$wa}?text={$encoded}";

    // Admin email?
    if (!empty($s['include_admin_email']) || !empty($s['additional_emails'])) {

        $recipients = [];
        if (!empty($s['include_admin_email'])) {
            $recipients[] = get_option('admin_email');
        }

        if (!empty($s['additional_emails'])) {
            foreach (explode("\n",$s['additional_emails']) as $e) {
                $e = trim($e);
                if (is_email($e)) $recipients[] = $e;
            }
        }

        $recipients = array_unique($recipients);
        if (!empty($recipients)) {

            $subject = "New WhatsApp Lead – $form_id";

            $body  = "WhatsApp Lead Received:\n\n";
            $body .= "Name: $name\n";
            $body .= "Phone: $phone\n";
            $body .= "Email: $email\n";
            $body .= "Message: $msg\n";
            $body .= "Page: $page_url\n\n";
            $body .= "WA Link: $redirect\n";

            wp_mail($recipients, $subject, $body);
        }
    }

    wp_send_json_success([
        'redirect_url' => $redirect,
        'lead_id'      => $post_id,
    ]);
}

add_action('wp_ajax_b47lf_whatsapp_lead', 'base47_lf_whatsapp_handler');
add_action('wp_ajax_nopriv_b47lf_whatsapp_lead', 'base47_lf_whatsapp_handler');