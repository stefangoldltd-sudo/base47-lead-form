<?php
/*
Plugin Name: Base47 Lead Form
Plugin URI: https://47-studio.com
Description: Lightweight lead capture system with HTML form templates, AJAX saving and optional WhatsApp integration.
Version: 2.7.2
Author: 47-Studio
Author URI: https://47-studio.com
Text Domain: base47-lead-form
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
define( 'BASE47_LF_VERSION', '2.7.2' );
define( 'BASE47_LF_PATH', plugin_dir_path( __FILE__ ) );
define( 'BASE47_LF_URL',  plugin_dir_url( __FILE__ ) );
define( 'BASE47_LF_BASENAME', plugin_basename( __FILE__ ) );

/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/
require_once BASE47_LF_PATH . 'inc/form-loader.php';
require_once BASE47_LF_PATH . 'inc/save-handler.php';
require_once BASE47_LF_PATH . 'inc/whatsapp-handler.php';
require_once BASE47_LF_PATH . 'inc/admin-page.php';
require_once BASE47_LF_PATH . 'inc/updater.php';

/*
|--------------------------------------------------------------------------
| ASSETS
|--------------------------------------------------------------------------
*/
add_action( 'wp_enqueue_scripts', function () {

    wp_enqueue_style(
        'base47-lead-form',
        BASE47_LF_URL . 'assets/css/base47-lead-form.css',
        [],
        BASE47_LF_VERSION
    );

    wp_enqueue_script(
        'base47-lead-form',
        BASE47_LF_URL . 'assets/js/base47-lead-form.js',
        [ 'jquery' ],
        BASE47_LF_VERSION,
        true
    );

    wp_localize_script(
        'base47-lead-form',
        'Base47LeadForm',
        [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'base47_lf_submit' ),
        ]
    );
} );

/*
|--------------------------------------------------------------------------
| ACTIVATION: CREATE LEADS TABLE (Optional - using CPT instead)
|--------------------------------------------------------------------------
*/
register_activation_hook( __FILE__, function () {
    // Flush rewrite rules for CPT
    base47_lf_register_cpt();
    flush_rewrite_rules();
} );

/*
|--------------------------------------------------------------------------
| DEACTIVATION
|--------------------------------------------------------------------------
*/
register_deactivation_hook( __FILE__, function () {
    flush_rewrite_rules();
} );

/*
|--------------------------------------------------------------------------
| AJAX HANDLERS
|--------------------------------------------------------------------------
*/

// Normal form submit (save to DB + email)
add_action( 'wp_ajax_base47_lf_submit', 'base47_lf_handle_submit' );
add_action( 'wp_ajax_nopriv_base47_lf_submit', 'base47_lf_handle_submit' );

// WhatsApp submit (redirect to WhatsApp)
add_action( 'wp_ajax_b47lf_whatsapp_lead', 'base47_lf_whatsapp_handler' );
add_action( 'wp_ajax_nopriv_b47lf_whatsapp_lead', 'base47_lf_whatsapp_handler' );
