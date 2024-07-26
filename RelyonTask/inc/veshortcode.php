<?php

	function rt_custom_visual_Elements(){

		//SECTION TITLE
		vc_map(	array(
			'name'	=>	esc_html__('Section Title', 'psolution'),
			'description'	=>	esc_html__('Add Section Title', 'psolution'),
			'base'			=> 	'sectionTitle',
			'class'			=>	'',
			'category'		=>	esc_html__('PressTechit Elements', 'psolution'),
			'icon'			=>	'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
					'type'		=>	'textfield',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__( 'Section Title', 'psolution' ),
					'param_name'=>	'section_title',
					'std'		=>	'',
				),
				array(
					'type'		=>	'textarea',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__( 'Section Subtitle', 'psolution' ),
					'param_name'=>	'section_subtitle',
					'std'		=>	'',
				),
			)
		));

		//ABOUT Element
		vc_map(	array(
		
			'name'	=>	esc_html__('About Me', 'psolution'),
			'description'	=>	esc_html__('Add About Information', 'psolution'),
			'base'			=> 	'aboutmeElement',
			'class'			=>	'',
			'category'		=>	esc_html__('PressTechit Elements', 'psolution'),
			'icon'			=>	'vc_mgt_clients_reviews',
			'params'		=> array(

				array(
					'type'		=>	'textarea',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__( 'About Left Info', 'psolution' ),
					'param_name'=>	'about_left',
					'std'		=>	'',
				),

				array(
					'type'		=>	'textarea',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__( 'About Right Info', 'psolution' ),
					'param_name'=>	'about_right',
					'std'		=>	'',
				),
				array(
					'type'		=>	'textarea',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__( 'About Description', 'psolution' ),
					'param_name'=>	'about_description',
					'std'		=>	'',
				),
				array(
                    'type'          =>    'param_group',
                    'param_name'    =>    'aboutitem',
                    'heading'       =>    esc_html__( 'Single About Item', 'presstechit'),
                    'class'         =>    'hide_in_vc_editor',
                    'params'        =>    array(
                        
                        array(
							'type'        => 'iconpicker',
							'heading'     => esc_html__('About Item Icon', 'backend', 'vc-elements-pt' ),
							'param_name'  => 'abouticon',
							'value'       => 'fa fa-facebook',
							'description' => esc_html__('Select icon from library.', 'backend', 'vc-elements-pt' ),
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'iconsPerPage' => 100, // default 100, how many icons per/page to display
							),
						),
						array(
							'type'		=>	'textfield',
							'param_name'=>	'aboutitemtitle',
							'holder'	=>	'div',
							'class'		=>	'hide_in_vc_editor',
							'heading'	=>	esc_html__('About Item Title', 'presstechit' ),
							'std'		=>	'',
						),
						array(
							'type'		=>	'textfield',
							'param_name'=>	'aboutitemcontent',
							'holder'	=>	'div',
							'class'		=>	'hide_in_vc_editor',
							'heading'	=>	esc_html__('About Item Content', 'presstechit' ),
							'std'		=>	'',
						),
                    
                    ),
                ),
			)
		));	

		//CUSTOM BUTTON
		vc_map(	array(
			'name'			=>	esc_html__('Custom Button', 'psolution'),
			'description'	=>	esc_html__('Add Custom Button', 'psolution'),
			'base'			=> 	'custombtn',
			'class'			=>	'',
			'category'		=>	esc_html__('PressTechit Elements', 'psolution'),
			'icon'			=>	'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
                    'param_name'    =>    'btntitle',
                    'heading'       =>    esc_html__( 'Add Button Title', 'presstechit'),
                    'type'          =>    'textfield',
                    'class'         =>    'hide_in_vc_editor',
                    'std'           =>    '',
                    'description'   =>    esc_html__( 'Your Title Text here.', 'presstechit')
                ),
				array(
					'type'		=>	'vc_link',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__( 'Button URL', 'psolution' ),
					'param_name'=>	'btn_url',
					'std'		=>	'',
				),

			)
		));

		// ADDRESS BOX
        vc_map( array(
            'name'        	=>__('Address','presstechit'),
            'description'	=>__('Add New Info Box', 'presstechit'),
            'base'        	=>'contactwithsocial',
            'category'    	=>'PressTechit Elements',
            'icon'        	=> 'vc_mgt_clients_reviews',
            'params'    	=>array(
                
                array(
					'type'		=>	'textfield',
					'param_name'=>	'contacttitle',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__('Contat Title', 'presstechit' ),
					'std'		=>	'Bhumit Pal',
				),
				array(
					'type'		=>	'textfield',
					'param_name'=>	'contactsubtitle',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__('Contact Subtitle', 'presstechit' ),
					'std'		=>	'Dynamic Game Programmer',
				),

                array(
                    'type'          => 'param_group',
                    'param_name'    => 'contactinfo',
                    'heading'       => esc_html__('Contact Address Info', 'presstechit'),
                    'description'   => esc_html__('Contact Box With Icon.', 'presstechit' ),
                    'class'         => 'hide_in_vc_editor',
                    'params'        => array(
                        array(
							'param_name'  => 'addressicon',
							'type'        => 'iconpicker',
							'heading'     => esc_html__('Address Icon', 'backend', 'vc-elements-pt' ),
							'value'       => 'fa fa-home',
							'description' => esc_html__('Select icon from library.', 'backend', 'vc-elements-pt' ),
							'settings'    => array(
								'emptyIcon'    => false, // default true, display an "EMPTY" icon?
								'iconsPerPage' => 100, // default 100, how many icons per/page to display
							),
						),
                    
                        array(
                            'param_name'    =>    'addresstitle',
                            'heading'       =>    esc_html__( 'Enter Address Title', 'presstechit'),
                            'type'          =>    'textfield',
                            'class'         =>    'hide_in_vc_editor',
                            'std'           =>    '',
                            'description'   =>    esc_html__( 'Your Address Title Text here.', 'presstechit')
                        ),
                        array(
                            'param_name'    =>    'addressdesc',
                            'heading'       =>    esc_html__( 'Enter Address Description', 'presstechit'),
                            'type'          =>    'textarea',
                            'class'         =>    'hide_in_vc_editor',
                            'std'           =>    '',
                            'description'   =>    esc_html__( 'Your Description Text here.', 'presstechit')
                        ),
                    ),
                ),

				array(
					'type'		=>	'textfield',
					'param_name'=>	'signature',
					'holder'	=>	'div',
					'class'		=>	'hide_in_vc_editor',
					'heading'	=>	esc_html__('Signature', 'presstechit' ),
					'std'		=>	'Bhumit Pal',
				),
            ),
        ));

        // Other Tools & Systems
        vc_map( array(
            'name'        	=>__('Other Tools & Systems','presstechit'),
            'description'	=>__('Add New Systems', 'presstechit'),
            'base'        	=>'otherToolSystemView',
            'category'    	=>'PressTechit Elements',
            'icon'        	=> 'vc_mgt_clients_reviews',
            'params'    	=>array(
                
                array(
                    'type'          => 'param_group',
                    'param_name'    => 'skillinfos',
                    'heading'       => esc_html__('Tools & Systems Info', 'presstechit'),
                    'description'   => esc_html__('Add Other Tools & Systems', 'presstechit' ),
                    'class'         => 'hide_in_vc_editor',
                    'params'        => array(
                        array(
                            'param_name'    =>    'percentage',
                            'heading'       =>    esc_html__( 'Add Percentage', 'presstechit'),
                            'type'          =>    'textfield',
                            'class'         =>    'hide_in_vc_editor',
                            'std'           =>    '',
                            'description'   =>    esc_html__( 'Your Address Title Text here.', 'presstechit')
                        ),
                        array(
                            'param_name'    =>    'toolskill',
                            'heading'       =>    esc_html__( 'Other Tools Title', 'presstechit'),
                            'type'          =>    'textfield',
                            'class'         =>    'hide_in_vc_editor',
                            'std'           =>    '',
                            'description'   =>    esc_html__( 'Your Other Tools Title here.', 'presstechit')
                        ),

                        array(
                            'param_name'    =>    'toolsDescriptio',
                            'heading'       =>    esc_html__( 'Other Tools Description', 'presstechit'),
                            'type'          =>    'textarea',
                            'class'         =>    'hide_in_vc_editor',
                            'std'           =>    '',
                            'description'   =>    esc_html__( 'Description Text here.', 'presstechit')
                        ),
                    ),
                ),
            ),
        ));

		//PORTFOLIO CUSTOM POST PARAM
		vc_map(array(
			'name'			=> 'All Projects',
			'description' 	=> 'Show Projects View in page' ,
			'base'			=> 'project_view',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'naillash'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'	=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'naillash' ),
					'param_name' 	=> 'projects',
					'std'			=> '6',
				),

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'naillash' ),
					'param_name' 	=> 'post_order',
					'std'			=> 'DESC',
				),
				
			)
		));

		//THE PACKAGES CUSTOM POST PARAM 
		vc_map( array(
			'name'			=> 'Pricing',
			'description' 	=> 'Show The Packages in page' ,
			'base'			=> 'packages_view',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'presstechit'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'presstechit' ),
					'param_name'	=> 'package',
					"std"			=> "6",
				),
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'presstechit' ),
					'param_name' 	=> 'post_order',
					"std"			=> "DESC",
				),	
			)
		));

		//THE EXPERIENCE POST PARAM 
		vc_map( array(
			'name'			=> 'Experiences',
			'description' 	=> 'Show The Experience in page' ,
			'base'			=> 'experiences',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'stiwari'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'stiwari' ),
					'param_name'	=> 'experience',
					"std"			=> "6",
				),
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'stiwari' ),
					'param_name' 	=> 'post_order',
					"std"			=> "DESC",
				),	
			)
		));

		//THE EDUCATIONS POST PARAM 
		vc_map( array(
			'name'			=> 'Educations',
			'description' 	=> 'Show The Education in page' ,
			'base'			=> 'educations',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'stiwari'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'stiwari' ),
					'param_name'	=> 'education',
					"std"			=> "6",
				),
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'stiwari' ),
					'param_name' 	=> 'post_order',
					"std"			=> "DESC",
				),	
			)
		));
		
		//THE SKILLS POST PARAM 
		vc_map( array(
			'name'			=> 'Skills',
			'description' 	=> 'Show The Skills in page' ,
			'base'			=> 'skill_view',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'stiwari'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'stiwari' ),
					'param_name'	=> 'skills',
					"std"			=> "6",
				),
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'stiwari' ),
					'param_name' 	=> 'post_order',
					"std"			=> "DESC",
				),	
			)
		));
		
		//PORTFOLIO CUSTOM POST PARAM
		vc_map(array(
			'name'			=> 'Portfolio',
			'description' 	=> 'Show Portfolio View in page' ,
			'base'			=> 'portfolio_view',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'naillash'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'	=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'naillash' ),
					'param_name' 	=> 'portfolios',
					'std'			=> '6',
				),

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'naillash' ),
					'param_name' 	=> 'post_order',
					'std'			=> 'DESC',
				),
				
			)
		));

		//THE TESTIMONILAS POST PARAM 
		vc_map( array(
			'name'			=> 'Reviews',
			'description' 	=> 'Show The Testimonial in page' ,
			'base'			=> 'testimonial',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'stiwari'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'		=> array(

				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts?', 'stiwari' ),
					'param_name'	=> 'testimonial',
					"std"			=> "6",
				),
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> 'hide_in_vc_editor',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'stiwari' ),
					'param_name' 	=> 'post_order',
					"std"			=> "DESC",
				),	
			)
		));

	    //PIT PARTNER SLIDER
	    vc_map(    array(
	        'name'    	  =>    esc_html__('Partner', 'psolution'),
	        'description' =>    esc_html__('Add Partner Images', 'psolution'),
	        'base'        =>     'partnerCurowsel',
	        'class'       =>    '',
	        'category'    =>    esc_html__('PressTechit Elements', 'psolution'),
	        'icon'        =>    'vc_mgt_clients_reviews',
	        'params'      => array(
	            array(
	                'param_name'    =>    'partnerlogo',
	                'heading'       =>    esc_html__( 'Upload Your Partner Logo', 'presstechit'),
	                'type'          =>    'attach_images',
	                'class'         =>    'hide_in_vc_editor',
	                'std'           =>    '',
	                'description'   =>    esc_html__( 'Seclet Your Partner', 'presstechit')
	            ),
	        )
	    ));	

		//THE WORDPRESS DEFALUT CUSTOM POST PARAM 
		vc_map( array(
			'name'			=> 'PIT Posts',
			'description' 	=> 'Show The Posts in page' ,
			'base'			=> 'blogpost',
			'class'			=> '',
			'category'		=> esc_html__('PressTechit Elements', 'stiwari'),
			'icon'			=> 'vc_mgt_clients_reviews',
			'params'		=> array(
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> '',
					'heading' 		=> esc_html__( 'How Many Posts?', 'stiwari' ),
					'param_name'	=> 'post',
					"std"			=> '2',
				),
				array(
					'type' 			=> 'textfield',
					'holder' 		=> 'div',
					'class' 		=> '',
					'heading' 		=> esc_html__( 'How Many Posts Show ASC OR DESC ?', 'stiwari' ),
					'param_name' 	=> 'post_order',
					"std"			=> "DESC",
				),
					
			)
		));

		//FUN FACTS ELEMENTS
		vc_map(	array(
		
			'name'	=>	esc_html__('PIT Fun-Fact', 'psolution'),
			'description'	=>	esc_html__('Add Single Fun-Fact', 'psolution'),
			'base'			=> 	'funfact',
			'class'			=>	'',
			'category'		=>	esc_html__('PressTechit Elements', 'psolution'),
			'icon'			=>	'vc_mgt_clients_reviews',
			'params'		=> array(


				array(
	                'param_name'    =>    'factimages',
	                'heading'       =>    esc_html__( 'Upload Your Fun-Fact Logo', 'presstechit'),
	                'type'          =>    'attach_images',
	                'class'         =>    'hide_in_vc_editor',
	                'std'           =>    '',
	                'description'   =>    esc_html__( 'Seclet Your Fun-Fact Images', 'presstechit')
	            ),
	            array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'backend', 'vc-elements-pt' ),
					'param_name'  => 'facticon',
					'value'       => 'fa fa-home',
					'description' => esc_html__( 'Select icon from library.', 'backend', 'vc-elements-pt' ),
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'iconsPerPage' => 100, // default 100, how many icons per/page to display
					),
				),
				array(
					'param_name'	=>	'factnumber',
					'heading'		=>	esc_html__( 'Type Fun-Fact Number', 'presstechit'),
					'type'			=>	'textfield',
					'class'			=>	'hide_in_vc_editor',
					'std'			=>	'',
					'description'	=>	esc_html__( 'Type Fun-Fact Here', 'presstechit')
				),
				array(
					'param_name'	=>	'facttitle',
					'heading'		=>	esc_html__( 'Type Fun-Fact Title', 'presstechit'),
					'type'			=>	'textfield',
					'class'			=>	'hide_in_vc_editor',
					'std'			=>	'',
					'description'	=>	esc_html__( 'Type Fun-Fact Title Here', 'presstechit')
				),

			)
		));

	}
	add_action('vc_before_init', 'rt_custom_visual_Elements');