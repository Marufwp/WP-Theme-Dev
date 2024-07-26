<?php
/**
 * After setup themes executable functions.
 * 
 * @author  RT
 * @since   0.1.0
 */

if ( ! function_exists( 'rt_theme_support' ) ) :

    function cufa_theme_support() {
        /*------------------------------------*/
        /* Theme Supports
        /*------------------------------------*/
        load_theme_textdomain( 'wp-quick-start-pack', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
    } // end of cufa_theme_support
    add_action( 'after_setup_theme', 'cufa_theme_support' );
endif;
