<?php
/**
 * Plugin Functions
 *
 * @package Secretum
 * @subpackage SecretumFP
 */


namespace SecretumFP\Functions {
	/**
	 * Display Custom Post Type Content
	 *
	 * @example echo do_action('secretum_fp');
	 * @example echo do_action('secretum_fp', array('orderby' => 'rand');
	 * @example echo do_action('secretum_fp', array('orderby' => 'rand', 'slug' => 'test-name'));
	 * @example echo do_action('secretum_fp', array('post_id' => '101'));
	 *
	 * @param array $args orderby|slug|post_id
	 * @return html Filtered Content
	 */
	function display($args = array()) {
		// Do Display
        if (post_type_exists('secretum_fp')) {
			// Build Vars From Args
			$orderby = isset($args['orderby']) ? sanitize_key($args['orderby']) : 'date';
			$slug = isset($args['slug']) ? sanitize_key($args['slug']) : '';
			$post_id = isset($args['post_id']) ? absint($args['post_id']) : '';

        	// Build Query Array
        	$wp_query = array_merge(
        		// Args
				array(
	                'post_type'      => 'secretum_fp',
	                'post_status'    => 'publish',
	                'order'          => 'DESC',
	                'orderby'        => $orderby,
	                'posts_per_page' => 1,
	            ),
	            (!empty($post_id)) ? array('p' => $post_id) : array(),
	            (!empty($slug)) ? array('tax_query' => array(array('taxonomy' => 'secretum_fp_group', 'field' => 'slug', 'terms' => sanitize_key($slug)))) : array()
        	);

            // Build Custom Query
            $query = new \WP_Query($wp_query);

            // If Query
            if ($query->have_posts()) {
                // Display Content
                while ($query->have_posts()) {
                    $query->the_post();

                    // Return Content
                    echo do_shortcode(get_the_content(NULL, false));
                }

                // Clear Post Data
                wp_reset_postdata();
            }
        }
	}
}
