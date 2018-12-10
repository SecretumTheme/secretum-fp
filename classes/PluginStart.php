<?php
namespace SecretumFP;


/**
 * Start SecretumFP Plugin
 * 
 * @method init()       Init Plugin
 * @method instance()   Class Instance
 * 
 * @package Secretum
 * @subpackage SecretumFP
 */
class PluginStart
{
    // Holds Instance Object
    protected static $instance = NULL;


    /**
     * Initiate Plugin
     */
    final public function init()
    {
        // Register Post Types
        add_action('init', array('\SecretumFP\Posttypes', 'init'));

        // Register Taxonomies
        add_action('init', array('\SecretumFP\Taxonomies', 'init'));

        // Register Display Frontpages Action
        // @see secretum-fp/functions.php
        add_action('secretum_fp', '\SecretumFP\Functions\display', 10, 1);

        if (is_admin()) {
            // Inject Plugin Links
            add_filter('plugin_row_meta', array('\SecretumFP\PluginLinks', 'add'), 10, 2);

            // Display Taxonomy Submenu Links Under Appearance Menu
            add_action('admin_menu', array('\SecretumFP\TaxonomyMenus', 'instance'));

            // Add Post Type Column Names
            add_filter('manage_secretum_fp_posts_columns', array('\SecretumFP\PosttypeColumns', 'setColumns'));

            // Add Post Type Column Content
            add_action('manage_secretum_fp_posts_custom_column' , array('\SecretumFP\PosttypeColumns','columnContent'), 10, 2);
        }
    }


    /**
    * Create Instance
    */
    final public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }

        return self::$instance;
    }
}
