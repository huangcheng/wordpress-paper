<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$posts_per_page = get_theme_mod('posts_per_page');

$category_name = get_query_var('category_name');

$args = array('posts_per_page' => $posts_per_page, 'paged' => $paged, 'category_name' => $category_name);

$query = new WP_Query($args);

get_template_part('template-parts/post/list', null, array('query' => $query,));
?>

<?php get_footer(); ?>
