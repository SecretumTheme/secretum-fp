<?php
namespace SecretumFP;

/**
 * Plugin Name: Secretum Custom Frontpages
 * Plugin URI: https://github.com/SecretumTheme/secretum-fp
 * Description: Secretum Frontpages allows developers to provide a custom frontpage post type that can be any adapted theme.
 * Version: 0.0.2
 * License: GNU GPLv3
 * Copyright (c) 2018 Secretum Theme
 * Author: Secretum Theme
 * Author URI: https://github.com/SecretumTheme
 * Text Domain: secretum-fp
 *
 * @package Secretum
 * @subpackage SecretumFP
 */


// Constants
define('SECRETUM_FP',                   '0.0.2');
define('SECRETUM_FP_WP_MIN_VERSION',    '3.8');
define('SECRETUM_FP_PLUGIN_FILE',       __FILE__);
define('SECRETUM_FP_PLUGIN_DIR',        dirname(SECRETUM_FP_PLUGIN_FILE));
define('SECRETUM_FP_PLUGIN_BASE',       plugin_basename(SECRETUM_FP_PLUGIN_FILE));


// Activate Plugin
register_activation_hook(SECRETUM_FP_PLUGIN_FILE, array('\SecretumFP\PluginRegister', 'activate'));

// Deactivate Plugin
register_deactivation_hook(SECRETUM_FP_PLUGIN_FILE, array('\SecretumFP\PluginRegister', 'deactivate'));


/**
 * Register Classes
 *
 * @param string $class Fully-qualified class name
 * @return void
 */
spl_autoload_register(function ($class) {
    // Namespace Prefix
    $prefix = 'SecretumFP\\';

    // Base Dir For Namespace Prefix
    $base_dir = __DIR__ . '/classes/';

    // Move To Next Rgistered autoloader
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Build Class Name
    $relative_class = substr($class, $len);

    // Replace Dir Separators & Replace Namespace with Base Dir
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Include File
    if (file_exists($file)) {
        require $file;
    }
});

// Include Functions
require SECRETUM_FP_PLUGIN_DIR . '/functions.php';

// Run Plugin
add_action('after_setup_theme', array('\SecretumFP\PluginStart', 'instance'), 0);

// Secretum Updater Plugin
if (file_exists(WP_PLUGIN_DIR . '/secretum-updater/puc/plugin-update-checker.php')) {
    include_once(WP_PLUGIN_DIR . '/secretum-updater/puc/plugin-update-checker.php');
    $secretum_hf_updater = \Puc_v4_Factory::buildUpdateChecker(
        'https://raw.githubusercontent.com/SecretumTheme/secretum-fp/master/updates.json',
        SECRETUM_FP_PLUGIN_FILE,
        'secretum-fp'
    );
}
