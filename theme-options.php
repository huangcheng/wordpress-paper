<?php

function paper_customize_register($wp_customize)
{
    $wp_customize->add_panel('theme_options', array(
        'title' => __('Theme Options'),
        'priority' => 100,
    ));

    $wp_customize->add_section('blog_section', array(
        'title' => __('Blog'),
        'priority' => 1,
        'panel' => 'theme_options',
    ));

    $wp_customize->add_setting('posts_per_page', array(
        'default' => 5,
    ));


    $wp_customize->add_control('posts_per_page', array(
        'label' => __('Posts Per Page'),
        'section' => 'blog_section',
        'type' => 'number',
    ));

    $wp_customize->add_section('header_section', array(
        'title' => __('Header'),
        'priority' => 2,
        'panel' => 'theme_options',
    ));

    $wp_customize->add_setting('profile_image', array(
        'default' => '',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'avatar', array(
        'label' => __('Profile Image'),
        'section' => 'header_section',
        'settings' => 'profile_image',
    )));

    $wp_customize->add_setting('profile_name', array(
        'default' => '',
    ));

    $wp_customize->add_control('profile_name', array(
        'label' => __('Profile Name'),
        'section' => 'header_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('profile_description', array(
        'default' => '',
    ));

    $wp_customize->add_control('profile_description', array(
        'label' => __('Profile Description'),
        'section' => 'header_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'paper_customize_register');
