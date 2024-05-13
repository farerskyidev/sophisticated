<?php
/**
 * The file includes necessary functions for theme.
 *
 * @package lex
 * @since 1.0
 */

if (!defined('V_PREFIX')) define('V_PREFIX', 'villanova');
if (!defined('V_TEMP_PATH')) define('V_TEMP_PATH', get_template_directory());
if (!defined('V_TEMP_URL')) define('V_TEMP_URL', get_template_directory_uri());

require_once get_theme_file_path( '/inc/action-config.php' );
require_once get_theme_file_path( '/inc/init-gutenberg.php' );
require_once get_theme_file_path( '/inc/helper-functions.php' );
require_once get_theme_file_path( '/inc/custom-post-type.php' );

// Register ACF Gravity Forms field
add_action( 'init', function () {
    if ( class_exists( 'ACF' ) ) {
        require_once get_stylesheet_directory() . '/inc/class-acf-field-gravity-v5.php'; 
    }
} );


function lex_after_theme_setup() {

    register_nav_menus(
        array(
            'main-menu' => esc_html__( 'Main menu', 'lex' ),
        )
    );

    add_theme_support( 'custom-header' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );    
    add_theme_support( 'editor-styles' );

    add_editor_style( array('assets/css/style-editor.css') );
}
add_action( 'after_setup_theme', 'lex_after_theme_setup' );
