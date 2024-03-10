<!DOCTYPE html>
<html <?php language_attributes(); ?> class="lg:text-base" style="--bg:#faf8f1">
<head>
    <?php
    $title = get_bloginfo('title');

    $post_title = get_the_title();

    $title = is_single() ? get_the_title() . ' - ' . $title : $title;
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo $title ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="theme-color" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="author" content="<?php echo get_bloginfo('author'); ?>" />
    <meta name="keywords" content="<?php echo get_bloginfo('keywords'); ?>" />
    <?php global $THEME_VERSION; ?>
    <?php wp_enqueue_style('style', get_stylesheet_uri(), array(), $THEME_VERSION, 'all'); ?>
    <?php is_single() ? wp_enqueue_style('atom-one-dark-reasonable',  'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark-reasonable.min.css', array(), $THEME_VERSION, 'all') : ''; ?>
    <?php wp_enqueue_style('font-awesome',  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css', array(), $THEME_VERSION, 'all'); ?>
    <?php echo is_single() ? '<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js" defer onload="hljs.highlightAll()"></script>' : '' ?>
    <style>
        .btn-dark {
            background: <?php echo 'url(' . get_template_directory_uri() . '/assets/images/theme.png?ver=' . $THEME_VERSION .')' ?> 0 / auto 1.5rem no-repeat;
        }

        :is(:where(.dark) .dark\:\[background-position\:right\]) {
            background-position: 100% !important;
        }
    </style>
    <?php wp_head(); ?>
</head>
