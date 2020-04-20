<?php

// Load Custom CSS and Fonts
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

/* Title Tag */
function wealthfare_features(){
    register_nav_menu('headerMenu', 'Top Header Menu');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'wealthfare_features');

/* Add Thumbnails for Post Type */
add_theme_support('post-thumbnails');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

/* Remove Black Top Wordpress Bar if not Admin */
function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}
add_action('wp_loaded', 'noSubsAdminBar');

/* Comment Moderation Policy */
function comment_policy($arg) {
    $arg['comment_notes_after'] = "<p class='comment-policy'>We are glad you have chosen to leave a comment. Please keep in mind that comments are moderated according to our <a href='http://wealthfare.local/comment-policy/'>Comment Policy</a>.</p>";
    return $arg;
}
add_filter('comment_form_defaults', 'comment_policy');

/* Push Comment field to bottom */
function comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
    }
add_filter( 'comment_form_fields', 'comment_field_to_bottom');

/* Remove Comment Url */
function wpbeginner_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');

/* Disable Auto Update for Wordpress and Theme */
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

/* Customise Login Screen */
function customHeaderUrl(){
    return esc_url(site_url('/'));
}
add_filter('login_headerurl', 'customHeaderUrl');

/* Custom Login Styles */
function loginCSS(){
    wp_enqueue_style('styles_css', get_stylesheet_directory_uri() . '/css/login.css');
}
add_action('login_enqueue_scripts', 'loginCSS');

/* Change Title on Hover */
function loginTitle(){
    return get_bloginfo('name');
}
add_filter('login_header_title', 'loginTitle');

?>