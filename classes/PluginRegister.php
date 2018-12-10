<?php
namespace SecretumFP;


/**
 * Activate & Deactivate Requirements
 * 
 * @method activate()   Activate Plugin
 * @method deactivate() Deactivate Plugin
 * 
 * @package Secretum
 * @subpackage SecretumFP
 */
class PluginRegister
{
    /**
     * Activate Plugin
     */
    final public static function activate()
    {
        // Wordpress Version Check
        global $wp_version;

        // Version Check
        if(version_compare($wp_version, SECRETUM_FP_WP_MIN_VERSION, "<")) {
            wp_die(__('Activation Failed: The ' . SECRETUM_FP_PAGE_NAME . ' plugin requires WordPress version ' . SECRETUM_FP_WP_MIN_VERSION . ' or higher. Please Upgrade Wordpress, then try activating this plugin again.', 'secretum-fp'));
        }

        // Flush Rewrite Rules
        add_action('after_switch_theme', 'PluginRegister::deactivate');
    }


    /**
     * Deactivate Plugin
     */
    final public static function deactivate()
    {
        // Clear Plugin Permalinks
        flush_rewrite_rules();
    }
}
