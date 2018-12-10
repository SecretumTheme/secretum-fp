<?php
namespace SecretumFP;


/**
 * Register Custom Taxonomies
 * 
 * @method init() Register Taxonomies
 * 
 * @package Secretum
 * @subpackage SecretumFP
 */
class Taxonomies
{
    /**
     * Register Taxonomies
     */
    final public static function init()
    {
        // Frontpage Groups
        register_taxonomy('secretum_fp_group', 'secretum_fp', apply_filters('secretum_fp_taxonomy_array', array(
            'public'            => true,
            'show_in_nav_menus' => true,
            'query_var'         => false,
            'show_ui'           => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'secretum_fp_group', 'with_front' => false),
            'labels'            => array(
                'name'              => _x('Frontpage Groups', 'taxonomy general name', 'secretum-fp'),
                'singular_name'     => _x('Frontpage Group', 'taxonomy singular name', 'secretum-fp'),
                'new_item_name'     => __('New Frontpage Group', 'secretum-fp'),
                'edit_item'         => __('Edit Frontpage Groups', 'secretum-fp'),
                'update_item'       => __('Update Frontpage Groups', 'secretum-fp'),
                'add_new_item'      => __('Add New Frontpage Group', 'secretum-fp'),
                'search_items'      => __('Search Frontpage Groups', 'secretum-fp'),
                'all_items'         => __('All Frontpage Groups', 'secretum-fp'),
                'parent_item'       => __('Parent Frontpage Groups', 'secretum-fp'),
                'parent_item_colon' => __('Parent Frontpage Groups:', 'secretum-fp'),
                'not_found'         => __('No Frontpage Groups Found', 'secretum-fp'),
            )
        ), 10, 1));
    }
}
