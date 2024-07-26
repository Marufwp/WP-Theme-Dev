<?php

	/**
	 * Theme fonts rendering function
	 *
	 * @author RelyonTask
	 * @since  0.1.0
	 * @link   https://relyontask.com/
	 */  

	/**
	 * Defined files path constants
	 * 
	 * @since  0.1.0
	 */
	define( 'WP_QP_CSS_PATH', get_template_directory_uri() . '/assets/css/' );
	define( 'WP_QP_JS_PATH', get_template_directory_uri() . '/assets/js/' );

	/**
	 * Enqueue scripts and styles.
	 *
	 * @author RelyonTask
	 * @since  0.1.0
	 * @link   https://relyontask.com/
	 */

	function wp_quick_start_pack_scripts() {

		/*---------------------------------------*/
		/* CSS Files
		/*---------------------------------------*/

		//all.min.css
		wp_enqueue_style(
			'css-1',
			WP_QP_CSS_PATH . 'animate.min.css',
			array(),
			'0.4.0',
			'all'
		);


		//fontawesome.min.css
		wp_enqueue_style(
			'css-2',
			WP_QP_CSS_PATH . 'bootstrap-4.5.3.min.css',
			array(),
			'0.4.0',
			'all'
		);


		//animate.min.css
		wp_enqueue_style(
			'css-3',
			WP_QP_CSS_PATH . 'font-awesome-5.9.0.min.css',
			array(),
			'0.4.0',
			'all'
		);

		//bootstrap-select.min.css
		wp_enqueue_style(
			'css-4',
			WP_QP_CSS_PATH . 'magnific-popup.min.css',
			array(),
			'0.1.0',
			'all'
		);

		//bootstrap.min.css
		wp_enqueue_style(
			'css-5',
			WP_QP_CSS_PATH . 'nice-select.min.css',
			array(),
			'0.1.0',
			'all'
		);

		//jarallax.css
		wp_enqueue_style(
			'css-6',
			WP_QP_CSS_PATH . 'slick.min.css',
			array(),
			'0.1.0',
			'all'
		);

		//jquery.bxslider.css
		wp_enqueue_style(
			'css-7',
			WP_QP_CSS_PATH . 'style.css',
			array(),
			'0.1.0',
			'all'
		);


		
		//style.css
		wp_enqueue_style(
			'style',
			get_stylesheet_uri()
		);


		/*=======================================*/
		/* JS Files
		/*=======================================*/

		//jquery-3.6.0.min.js
		wp_enqueue_script(
			'js-1',
			WP_QP_JS_PATH . 'jquery-3.6.0.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//bootstrap.min.js
		wp_enqueue_script(
			'js-2',
			WP_QP_JS_PATH . 'bootstrap.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//slick.min.js
		wp_enqueue_script(
			'js-3',
			WP_QP_JS_PATH . 'slick.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);		

		//jquery.magnific-popup.min.js
		wp_enqueue_script(
			'js-4',
			WP_QP_JS_PATH . 'jquery.magnific-popup.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);


		//jquery.nice-select.min.js
		wp_enqueue_script(
			'js-5',
			WP_QP_JS_PATH . 'jquery.nice-select.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//jquery.ajaxchimp.min.js
		wp_enqueue_script(
			'js-6',
			WP_QP_JS_PATH . 'jquery.ajaxchimp.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//form-validator.min.js
		wp_enqueue_script(
			'js-7',
			WP_QP_JS_PATH . 'form-validator.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//contact-form-script.js
		wp_enqueue_script(
			'js-8',
			WP_QP_JS_PATH . 'contact-form-script.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//wow.min.js
		wp_enqueue_script(
			'js-9',
			WP_QP_JS_PATH . 'wow.min.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		//script.js
		wp_enqueue_script(
			'js-10',
			WP_QP_JS_PATH . 'script.js',
			array( 'jquery' ),
			'3.5.1',
			true
		);

		
		
		

	}
	add_action( 'wp_enqueue_scripts', 'wp_quick_start_pack_scripts' );
	// end of wp_quick_start_pack_scripts

