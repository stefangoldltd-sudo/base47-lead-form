<?php
/**
 * GitHub Updater for Base47 Lead Form Plugin
 */

if (!defined('ABSPATH')) exit;

/**
 * Inject update data into WP update system
 */
add_filter('pre_set_site_transient_update_plugins', function ($transient) {

    if (empty($transient->checked)) {
        return $transient;
    }

    $plugin_slug = 'base47-lead-form/base47-lead-form.php'; // main plugin file
    $plugin_data = get_file_data(
        WP_PLUGIN_DIR . '/base47-lead-form/base47-lead-form.php',
        ['Version' => 'Version'],
        'plugin'
    );
    $current_version = $plugin_data['Version'];

    // GitHub API — latest release
    $response = wp_remote_get(
        'https://api.github.com/repos/stefangoldltd-sudo/base47-lead-form/releases/latest',
        ['timeout' => 10]
    );

    if (is_wp_error($response)) {
        return $transient;
    }

    $data = json_decode(wp_remote_retrieve_body($response));

    if (!isset($data->tag_name)) {
        return $transient;
    }

    $latest_version = ltrim($data->tag_name, 'v'); // support "v1.2.3" or "1.2.3"

    // Compare versions
    if (version_compare($current_version, $latest_version, '<')) {

        $transient->response[$plugin_slug] = (object)[
            'slug'        => 'base47-lead-form',
            'plugin'      => $plugin_slug,
            'new_version' => $latest_version,
            'url'         => 'https://github.com/stefangoldltd-sudo/base47-lead-form',
            'package'     => $data->zipball_url, // GitHub zip
        ];
    }

    return $transient;
});

/**
 * Clear cache on plugin page load (recommended)
 */
add_filter('site_transient_update_plugins', function ($value) {
    return $value;
});