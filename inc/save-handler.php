<?php
/**
 * Base47 Lead Form – SAVE HANDLER (FIXED)
 * Handles standard submissions (AJAX + POST),
 * saves leads into CPT, sends admin emails,
 * optional auto-reply, etc.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register Lead CPT
 */
function base47_lf_register_cpt() {

    $labels = array(
        'name'          => __( 'Leads', 'base47-lead-form' ),
        'singular_name' => __( 'Lead', 'base47-lead-form' ),
        'menu_name'     => __( 'Leads', 'base47-lead-form' ),
    );

    $args = array(
        'labels'        => $labels,
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_position' => 26,
        'menu_icon'     => 'dashicons-email-alt',
        'supports'      => array( 'title', 'editor', 'custom-fields' ),
    );

    register_post_type( 'b47_lead', $args );
}
add_action( 'init', 'base47_lf_register_cpt' );



/**
 * Helper to extract POST values safely
 */
function base47_lf_post_field( $keys, $default = '' ) {

    $keys = is_array( $keys ) ? $keys : array( $keys );

    foreach ( $keys as $key ) {
        if ( isset( $_POST[$key] ) && $_POST[$key] !== '' ) {
            return sanitize_text_field( wp_unslash( $_POST[$key] ) );
        }
    }

    return $default;
}



/**
 * Core Processor (shared AJAX + POST)
 */
function base47_lf_process_submission( $is_ajax = false ) {

    // Validate nonce
    if (
        ! isset( $_POST['base47_lf_nonce'] )
        || ! wp_verify_nonce( $_POST['base47_lf_nonce'], 'base47_lf_submit' )
    ) {
        $msg = __( 'Security check failed.', 'base47-lead-form' );
        if ( $is_ajax ) wp_send_json_error( array( 'message' => $msg ) );
        wp_die( esc_html( $msg ) );
    }

    // Basic Fields
    $name    = base47_lf_post_field( array( 'name','full_name','b47lf_name' ) );
    $email   = base47_lf_post_field( array( 'email','b47lf_email' ) );
    $phone   = base47_lf_post_field( array( 'phone','tel','b47lf_phone' ) );
    $message = base47_lf_post_field( array( 'message','msg','b47lf_message' ) );
    $form_id = base47_lf_post_field( array( 'base47_lf_form_id','form_id' ), 'form-1' );

    // Form 4 & 5 specific fields
    $firstName = base47_lf_post_field( 'firstName' );
    $lastName  = base47_lf_post_field( 'lastName' );
    $branch    = base47_lf_post_field( 'branch' );
    $doctorLicense = base47_lf_post_field( 'doctorLicense' );
    
    // Form 2 specific fields
    $company_name = base47_lf_post_field( 'company_name' );
    $website      = base47_lf_post_field( 'website' );
    $services     = base47_lf_post_field( 'services' );

    // Combine firstName + lastName if provided
    if ( $firstName && $lastName ) {
        $name = $firstName . ' ' . $lastName;
    }

    $page_url = isset($_POST['b47lf_page_url'])
        ? esc_url_raw( wp_unslash($_POST['b47lf_page_url']) )
        : ( $_SERVER['HTTP_REFERER'] ?? '' );

    // Basic validation
    if ( ! $name ) {
        $msg = __( 'Please enter your name.', 'base47-lead-form' );
        if ( $is_ajax ) wp_send_json_error( array( 'message'=>$msg ) );
        wp_die( esc_html($msg) );
    }

    if ( ! $phone && ! $email ) {
        $msg = __( 'Please enter at least a phone number or email address.', 'base47-lead-form' );
        if ( $is_ajax ) wp_send_json_error( array( 'message'=>$msg ) );
        wp_die( esc_html($msg) );
    }

    // Save Lead (CPT)
    $post_id = wp_insert_post(array(
        'post_type'    => 'b47_lead',
        'post_status'  => 'publish',
        'post_title'   => "$name – $form_id",
        'post_content' => $message ?: '',
    ));

    if ( $post_id ) {
        update_post_meta( $post_id, '_name',    $name );
        update_post_meta( $post_id, '_email',   $email );
        update_post_meta( $post_id, '_phone',   $phone );
        update_post_meta( $post_id, '_form_id', $form_id );
        update_post_meta( $post_id, '_message', $message );
        update_post_meta( $post_id, '_page_url', $page_url );
        
        // Form 4 & 5 specific
        if ( $firstName ) update_post_meta( $post_id, '_firstName', $firstName );
        if ( $lastName )  update_post_meta( $post_id, '_lastName',  $lastName );
        if ( $branch )    update_post_meta( $post_id, '_branch',    $branch );
        if ( $doctorLicense ) update_post_meta( $post_id, '_doctorLicense', $doctorLicense );
        
        // Form 2 specific
        if ( $company_name ) update_post_meta( $post_id, '_company_name', $company_name );
        if ( $website )      update_post_meta( $post_id, '_website',      $website );
        if ( $services )     update_post_meta( $post_id, '_services',     $services );
    }

    // Load Settings
    $s = get_option( 'b47lf_settings', array() );

    $include_admin    = ! empty( $s['include_admin_email'] );
    $extra_recipients = ! empty( $s['additional_emails'] ) ? explode("\n",$s['additional_emails']) : [];

    $from_email = ! empty($s['from_email']) ? $s['from_email'] : get_option('admin_email');
    $from_name  = ! empty($s['from_name'])  ? $s['from_name']  : get_bloginfo('name');

    $recipients = [];
    if ( $include_admin ) $recipients[] = get_option('admin_email');

    foreach ($extra_recipients as $r) {
        $r = trim($r);
        if ( is_email($r) ) $recipients[] = $r;
    }

    $recipients = array_unique($recipients);

    // Admin email
    if (!empty($recipients)) {
        $subject = "New Lead – $form_id";

        ob_start(); ?>
        <h2>New Lead Received</h2>
        <p><strong>Name:</strong> <?php echo esc_html($name); ?></p>
        <p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
        <p><strong>Phone:</strong> <?php echo esc_html($phone); ?></p>
        <?php if ($message): ?>
            <p><strong>Message:</strong><br><?php echo nl2br(esc_html($message)); ?></p>
        <?php endif; ?>
        <?php if ($branch): ?>
            <p><strong>Branch:</strong> <?php echo esc_html($branch); ?></p>
        <?php endif; ?>
        <?php if ($doctorLicense): ?>
            <p><strong>Doctor License:</strong> <?php echo esc_html($doctorLicense); ?></p>
        <?php endif; ?>
        <?php if ($company_name): ?>
            <p><strong>Company:</strong> <?php echo esc_html($company_name); ?></p>
        <?php endif; ?>
        <?php if ($website): ?>
            <p><strong>Website:</strong> <?php echo esc_html($website); ?></p>
        <?php endif; ?>
        <?php if ($services): ?>
            <p><strong>Services:</strong> <?php echo esc_html($services); ?></p>
        <?php endif; ?>
        <p><strong>Page:</strong> <?php echo esc_url($page_url); ?></p>
        <?php $body = ob_get_clean();

        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . wp_specialchars_decode($from_name) . " <{$from_email}>",
        ];

        wp_mail($recipients, $subject, $body, $headers);
    }

    // Auto reply
    if (!empty($s['auto_reply_enabled']) && $email) {

        $auto_subject = !empty($s['auto_reply_subject'])
            ? $s['auto_reply_subject']
            : 'Thank you';

        $auto_message = !empty($s['auto_reply_message'])
            ? nl2br($s['auto_reply_message'])
            : 'Thank you for contacting us.';

        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . wp_specialchars_decode($from_name) . " <{$from_email}>",
        ];

        wp_mail($email, $auto_subject, $auto_message, $headers);
    }

    // Return
    if ($is_ajax) {
        wp_send_json_success(['message'=>'Thank you! We received your request.']);
    }

    // redirect fallback
    $redirect = add_query_arg('lead_status','success',$page_url);
    wp_safe_redirect( $redirect );
    exit;
}



/**
 * AJAX HOOK (Matches JS: base47_lf_submit)
 */
function base47_lf_handle_submit() {
    base47_lf_process_submission(true);
}
add_action( 'wp_ajax_base47_lf_submit', 'base47_lf_handle_submit' );
add_action( 'wp_ajax_nopriv_base47_lf_submit', 'base47_lf_handle_submit' );
