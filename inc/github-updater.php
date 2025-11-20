<?php
if (!defined('ABSPATH')) exit;

function b47_leadform_github_updater($transient)
{
    if (empty($transient->checked)) {
        return $transient;
    }

    $plugin_file = 'base47-lead-form/base47-lead-form.php';
    $current = $transient->checked[$plugin_file] ?? null;

    $response = wp_remote_get('https://api.github.com/repos/stefangoldltd-sudo/base47-lead-form/releases/latest');
    if (is_wp_error($response)) return $transient;

    $data = json_decode(wp_remote_retrieve_body($response));

    if (!empty($data->tag_name)) {

        $latest = ltrim($data->tag_name, 'v');

        if (version_compare($current, $latest, '<')) {

            $transient->response[$plugin_file] = [
                'slug'        => 'base47-lead-form',
                'plugin'      => $plugin_file,
                'new_version' => $latest,
                'package'     => $data->zipball_url,
                'url'         => 'https://github.com/stefangoldltd-sudo/base47-lead-form'
            ];
        }
    }

    return $transient;
}
add_filter('pre_set_site_transient_update_plugins', 'b47_leadform_github_updater');