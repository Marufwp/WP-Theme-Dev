<?php

	/**
	 * Theme menu rendering function
	 *
	 * @author RelyonTask
	 * @since  0.1.0
	 * @link https://relyontask.com
	*/
	if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	    function mytheme_register_nav_menu(){
	        register_nav_menus( array(
	            'primary' => __('Primary Menu', 'text_domain' ),
	        ) );
	    }
	    add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
	}