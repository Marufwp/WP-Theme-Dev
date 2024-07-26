<?php



add_action( 'cmb2_admin_init', 'metadata_testmonial' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function metadata_testmonial() {
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => 'testmonial',
		'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'testimonial' ), // Post type		
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Test Text', 'cmb2' ),
		'id'         => 'desc',
		'type'       => 'text',
	) );

}

