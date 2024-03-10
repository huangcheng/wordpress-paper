<?php get_header(); ?>

<?php
$query = get_query(0);

get_template_part('template-parts/post/list', null, array('query' => $query,));
?>

<?php get_footer(); ?>
