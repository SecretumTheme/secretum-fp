<?php
namespace SecretumFP;


/**
 * Columns & Column Content For Custom Post Type
 * 
 * @method setColumns()     Custom Columns
 * @method columnContent()  Content For Columns
 * 
 * @package Secretum
 * @subpackage SecretumFP
 */
class PosttypeColumns
{
    /**
     * Post Type Custom Columns
     *
     * @param $columns array The column name
     */
    final public static function setColumns($columns)
    {
        // Remove Columns
        unset($columns['title']);
        unset($columns['author']);
        unset($columns['date']);

        // Set Columns
        $columns['title']   = __('Name', 'secretum-fp ');
        $columns['author']  = __('Author', 'secretum-fp ');
        $columns['groups']  = __('Groups', 'secretum-fp');
        $columns['date']    = __('Date', 'secretum-fp ');

        return $columns;
    }


    /**
     * Set Content For Columns
     *
     * @param $columns array The column name
     * @param $post_id int The ID of the Post
     */
    final public static function columnContent($column, $post_id)
    {
        switch ($column) {
            // Categories
            case 'groups' :
                $terms = get_the_term_list($post_id , 'secretum_fp_group', '', ', ', '');
                echo is_string( $terms ) ? $terms : '—';
                break;
        }
    }
}
