<?php 

// Adding some stylesheets
function theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('index', get_stylesheet_directory_uri() . '/assets/styles/index.css');
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}


// addins css
function my_styles()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style('index', get_stylesheet_directory_uri() . '/assets/styles/index.css');
}
add_action('wp_enqueue_scripts', 'my_styles');