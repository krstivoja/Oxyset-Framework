<?php
/*
Plugin Name:    OxySet Framework
Plugin URI:     https://www.cleanplugins.com/
Description:    SCSS Files
Version:        0.0.1
Author:         Marko Krstic
Author URI:     https://www.cleanplugins.com/

*/
if (!defined('WPINC')) {
    die;
}

define('CP_FRAMEWORK_URL', plugin_dir_url(__FILE__));
define('CP_FRAMEWORK_DIR', plugin_dir_path(__FILE__));

function asset_version($path)
{
    $file = CP_FRAMEWORK_DIR . $path;
    if (is_file($file)) {
        return filemtime($file);
    }

    return null;
}

// Website Styles
add_action('wp_enqueue_scripts', function () {
    // Do not add styles on the Oxygen builder UI
    if (defined("SHOW_CT_BUILDER") && !defined("OXYGEN_IFRAME")) return;
    
    wp_enqueue_style('theme_css', CP_THEME_URL . 'dist/css/custom.css', [], asset_version('dist/css/custom.css'));
}, 1000, 1);


