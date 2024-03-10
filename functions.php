<?php

require_once(__DIR__ . '/inc/constants.php');
require_once(__DIR__ . '/theme-options.php');

function register_menu()
{
    register_nav_menu('primary', __('Primary Menu'));
}

add_action('init', 'register_menu');

function get_primary_menu_items(): array
{
    $menu_name = 'primary';
    $locations = get_nav_menu_locations();
    $id = $locations[$menu_name];
    $menus = wp_get_nav_menu_items($id);

    return array_filter($menus, function ($menu) {
        return $menu->menu_item_parent == 0;
    });
}

function load_locales()
{
    load_theme_textdomain('paper', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'load_locales');
