<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php $theme_ver = wp_get_theme( '' )[ 'Version' ] ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo get_bloginfo('title'); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_enqueue_style( 'style', get_stylesheet_uri() ); ?>
    <?php wp_enqueue_style( 'paper', get_template_directory_uri() . '/assets/css/paper.css', false, $theme_ver, 'all'); ?>
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
