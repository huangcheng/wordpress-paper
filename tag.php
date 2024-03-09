<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$posts_per_page = get_theme_mod('posts_per_page');

$tag_id = get_query_var('tag_id');

$args = array('posts_per_page' => $posts_per_page, 'paged' => $paged, 'tag_id' => $tag_id);

if (is_admin() && is_user_logged_in()) {
    $args['post_status'] = array('publish', 'private');
} else {
    $args['post_status'] = 'publish';
}

$query = new WP_Query($args);

get_template_part('template-parts/post/list', null, array('query' => $query,));
?>

<?php get_footer(); ?>
