<?php get_header(); ?>

<?php
require_once(__DIR__ . '/inc/utils.php');

$query = get_query(1);

get_template_part('template-parts/post/list', null, array('query' => $query,));
?>

<?php get_footer(); ?>
