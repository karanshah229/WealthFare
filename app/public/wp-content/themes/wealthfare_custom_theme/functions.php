<?php

function custom_css(){
    wp_enqueue_style('custom_css', get_stylesheet_uri());
}

function ui_kit(){
    wp_enqueue_style('ui_kit_css', get_stylesheet_directory_uri() . '/css/ui_kit/uikit.css');
    wp_enqueue_style('ui_kit_min_css', get_stylesheet_directory_uri() . '/css/ui_kit/uikit.min.css');
    wp_enqueue_style('styles_css', get_stylesheet_directory_uri() . '/css/styles.css');
    // wp_enqueue_style('ui_kit__rtl_css', get_stylesheet_directory_uri() . '/css/ui_kit/uikit-rtl.css');
    wp_enqueue_script('ui_kit_js', get_stylesheet_directory_uri() . '/js/ui_kit/uikit.js', NULL, '1.0', True);
    wp_enqueue_script('ui_kit_icons_js', get_stylesheet_directory_uri() . '/js/ui_kit/uikit-icons.js', NULL, '1.0', True);
}

function fonts(){
    wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    wp_enqueue_style('open_sans', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap');
}

add_action('wp_enqueue_scripts', 'custom_css');
add_action('wp_enqueue_scripts', 'ui_kit');
add_action('wp_enqueue_scripts', 'fonts');

function wealthfare_features(){
    register_nav_menu('headerMenu', 'Top Header Menu');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'wealthfare_features');

add_theme_support('post-thumbnails');

?>