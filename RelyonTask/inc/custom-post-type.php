<?php
    /**
     * THEME CUSTOM POST TYPES
     * @package RT
    */

    /* CUSTOM POST RT */
    if( !function_exists('rt_custom_post_type') ) :

        //Slider custom post
        function rtsoution_slider_custom_post_type() {
            register_post_type( 'custom_slider',
                array(
                    'labels'            => array(
                        'name'          => __( 'Sliders', 'psolution' ),
                        'singular_name' => __( 'Slider', 'psolution' ),
                        'add_new_item'  => __( 'Add New Slider', 'psolution' ),
                        'edit_item'     => __( 'Edit Slider', 'psolution' ),
                        'new_item'      => __( 'Add New Slider', 'psolution' ),
                        'view_item'     => __( 'View Slider', 'psolution' ),
                        'search_items'  => __( 'Search Slider', 'psolution' ),
                        'not_found'     => __( 'No Slider found' ),
                        'not_found_in_trash' => __( 'No Slider found in trash', 'psolution' ),
                        'all_items'     => __( 'All Slider', 'psolution' ),
                        'featured_image' => __( 'Slider Background Image' ),
                        'set_featured_image' => __( 'Set Slider Background Image' ),
                        'remove_featured_image' => __( 'Remove Slider Background Image' ),
                        'use_featured_image' => __( 'Use as Slider Background Image' ),
                    ),
                    'public'            => true,
                    'supports'          => array( 'title', 'editor', 'thumbnail'),
                    'capability_type'   => 'post',
                    'menu_position'     => 5,
                    'menu_icon'         => 'dashicons-images-alt2',
                )
            );
        }
        add_action( 'init', 'rtsoution_slider_custom_post_type' );

        

endif;