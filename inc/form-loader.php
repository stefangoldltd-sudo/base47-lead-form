<?php
if (!defined('ABSPATH')) exit;

/**
 * Register available form templates
 * IMPORTANT:
 * Keys and filenames must match your real form files.
 */
function b47lf_get_form_templates() {

    return [
        'form1-general' => [
            'label' => 'Form 1 – General',
            'file'  => 'form1-general.php'
        ],

        'form2-minimal' => [
            'label' => 'Form 2 – Minimal',
            'file'  => 'form2-minimal.php'
        ],

        'form3-extended' => [
            'label' => 'Form 3 – Extended',
            'file'  => 'form3-extended.php'
        ],

        'form4-medical' => [
            'label' => 'Form 4 – Medical',
            'file'  => 'form4-medical.php'
        ],

        'form5-doctor' => [
            'label' => 'Form 5 – Doctor',
            'file'  => 'form5-doctor.php'
        ],
    ];
}


/**
 * Shortcode: [lead_form id="form1-general"]
 * Renders selected form template.
 */
function b47lf_render_form_shortcode($atts) {

    $atts = shortcode_atts([
        'id' => 'form1-general'
    ], $atts);

    $forms = b47lf_get_form_templates();

    if (!isset($forms[$atts['id']])) {
        return '<p>Form not found.</p>';
    }

    $file = BASE47_LF_PATH . 'forms/' . $forms[$atts['id']]['file'];

    if (!file_exists($file)) {
        return '<p>Form template missing.</p>';
    }

    ob_start();
    include $file;
    return ob_get_clean();
}
add_shortcode('lead_form', 'b47lf_render_form_shortcode');
