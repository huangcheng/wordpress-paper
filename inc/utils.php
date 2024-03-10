<?php

/**
 * @param int $type 0: category, 1: tag
 * @return WP_Query
 */
function get_query(int $type = null): WP_Query
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $posts_per_page = get_theme_mod('posts_per_page');

    $args = array('posts_per_page' => $posts_per_page, 'paged' => $paged);

    if (!is_null($type) && in_array($type, [0, 1])) {
        if ($type === 0) {
            $category_name = get_query_var('category_name');
            $args['category_name'] = $category_name;
        } else {
            $tag_id = get_query_var('tag_id');
            $args['tag_id'] = $tag_id;
        }
    }

    if (is_user_logged_in()) {
        $args['post_status'] = array('publish', 'private');
    } else {
        $args['post_status'] = 'publish';
    }

    return new WP_Query($args);
}
