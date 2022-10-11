<?php
function fastshop_ecommerce_theme_setup() {
    load_child_theme_textdomain( 'fastshop-ecommerce', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'fastshop_ecommerce_theme_setup' );

function fastshop_ecommerce_register_scripts() {
    $parent_style = 'newstore-style';
    if (function_exists('newstore_get_google_fonts_url')) {
        wp_enqueue_style( 'newstore-google-font', newstore_get_google_fonts_url(array('Lato:wght@400;800', 'PT+Sans:wght@400;800')));
    }
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'fastshop-ecommerce-style', get_stylesheet_directory_uri() . '/assets/css/min/main.css', array( $parent_style ));
}

add_action('wp_enqueue_scripts', 'fastshop_ecommerce_register_scripts', 15);

function fastshop_ecommerce_google_fonts($google_fonts){
    return array('Lato:wght@400;800', 'PT+Sans:wght@400;800');
}
add_filter('newstore_google_fonts_array', 'fastshop_ecommerce_google_fonts');

function fastshop_ecommerce_customize_register($wp_customize) {
    if($wp_customize->get_setting('newstore_theme_post_title_hover_color')){
        $wp_customize->get_setting('newstore_theme_post_title_hover_color')->default = '#a9810b';
    }
    if($wp_customize->get_setting('newstore_theme_post_meta_hover_color')){
        $wp_customize->get_setting('newstore_theme_post_meta_hover_color')->default = '#a9810b';
    }
}
add_action('customize_register', 'fastshop_ecommerce_customize_register', 999);