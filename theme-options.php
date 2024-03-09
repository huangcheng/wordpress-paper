<?php

function paper_customize_register($wp_customize)
{
    $wp_customize->add_panel('theme_options', array(
        'title' => __('Theme Options'),
        'priority' => 100,
    ));

    $wp_customize->add_section('header_section', array(
        'title' => __('Header'),
        'priority' => 10,
        'panel' => 'theme_options',
    ));

    $wp_customize->add_setting('avatar', array(
        'default' => '',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'avatar', array(
        'label' => __('Avatar'),
        'section' => 'header_section',
        'settings' => 'avatar',
    )));

    $wp_customize->add_setting('username', array(
        'default' => 'Cheng',
    ));

    $wp_customize->add_control('username', array(
        'label' => __('User Name'),
        'section' => 'header_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('bio', array(
        'default' => '',
    ));

    $wp_customize->add_control('bio', array(
        'label' => __('Bio'),
        'section' => 'header_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'paper_customize_register');
