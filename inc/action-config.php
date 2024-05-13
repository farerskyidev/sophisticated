<?php

/**
 * Enqueue scripts.
 */
function wht_enqueue_scripts() {
    if ( is_admin() ) return false;
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/css/style.css' ); 
    wp_enqueue_style( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
    
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '1.0.0', true );}
add_action( 'wp_enqueue_scripts', 'wht_enqueue_scripts' );
