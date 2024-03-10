<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/vendor/kirki-framework/kirki/kirki.php');

require_once(__DIR__ . '/inc/constants.php');

global $THEME_NAME;

if (!class_exists('Kirki')) {
    return;
}

new \Kirki\Panel(
    'theme_options_panel',
    [
        'priority' => 1,
        'title' => esc_html__('Theme Options', $THEME_NAME),
        'description' => esc_html__('Contains sections for all kirki controls.', 'kirki'),
    ]
);

/**
 * Blog Section
 */
new Kirki\Section(
    'blog_section',
    [
        'title' => esc_html__('Blog', $THEME_NAME),
        'panel' => 'theme_options_panel',
        'priority' => 10,
    ]
);

new \Kirki\Field\Number(
    [
        'settings' => 'posts_per_page',
        'label' => esc_html__('Posts Per Page', $THEME_NAME),
        'default' => 5,
        'section' => 'blog_section',
        'priority' => 10,
        'choices' => [
            'min' => 5,
            'max' => 10,
            'step' => 1,
        ],
    ]
);

/**
 * Header Section
 */
new \Kirki\Section(
    'header_section',
    [
        'title' => esc_html__('Header', $THEME_NAME),
        'panel' => 'theme_options_panel',
        'priority' => 20,
    ]
);

new Kirki\Field\Image(
    [
        'settings' => 'profile_image',
        'label' => esc_html__('Profile Image', $THEME_NAME),
        'description' => esc_html__('Square size, same width as height', $THEME_NAME),
        'default' => '',
        'section' => 'header_section',
        'priority' => 10,
    ]
);

new \Kirki\Field\Text(
    [
        'settings' => 'profile_name',
        'label' => esc_html__('Profile Name', $THEME_NAME),
        'description' => esc_html__('Your name appears right after the image', $THEME_NAME),
        'default' => esc_html__(''),
        'section' => 'header_section',
        'priority' => 20,
    ]
);

new \Kirki\Field\Textarea(
    [
        'settings' => 'profile_description',
        'label' => esc_html__('Profile Description', $THEME_NAME),
        'description' => esc_html__('A short description about yourself', $THEME_NAME),
        'default' => esc_html__(''),
        'section' => 'header_section',
        'priority' => 30,
    ]
);

/**
 * Social Links Section
 */
new \Kirki\Section(
    'social_links_section',
    [
        'title' => esc_html__('Social Links', $THEME_NAME),
        'panel' => 'theme_options_panel',
        'priority' => 30,
    ]
);

new Kirki\Field\Repeater(
    [
        'settings' => 'social_links',
        'label' => esc_html__('Social Links', $THEME_NAME),
        'section' => 'social_links_section',
        'priority' => 10,
        'default' => [],
        'fields' => [
            'title' => [
                'label' => esc_html__('Title', $THEME_NAME),
                'description' => esc_html__('Ex: GitHub', $THEME_NAME),
                'type' => 'text',
                'default' => '',
            ],
            'icon' => [
                'label' => esc_html__('Icon', $THEME_NAME),
                'description' => 'Ex: fa-brands fa-github <br> <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank">View All</a>',
                'type' => 'text',
                'default' => '',
            ],
            'link' => [
                'label' => esc_html__('Link', $THEME_NAME),
                'description' => esc_html__('Enter the full url for your icon button', $THEME_NAME),
                'type' => 'text',
                'default' => '',
            ],
//            'color' => [
//                'label' => esc_html__('Icon Color', $THEME_NAME),
//                'description' => esc_html__('Set a unique color for your icon (optional)', $THEME_NAME),
//                'type' => 'color',
//                'default' => '',
//            ],
            'new' => [
                'label' => esc_html__('Open in New Tab', $THEME_NAME),
                'description' => esc_html__('Check this box to open the link in a new tab', $THEME_NAME),
                'type' => 'checkbox',
                'default' => false,
            ],
        ],
    ]
);
