<?php
function add_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'presstech-it',
        [
            'title' => __( 'RelyonTask', 'plugin-name' ),
            'icon' => 'fa fa-plug',
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
