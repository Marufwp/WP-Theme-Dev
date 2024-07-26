<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
exit;
}


// =================== Welcome Banner section start =======================================

if (!class_exists('Elementors_oEmbeds_SectionTitleBlock_widget')):
class Elementors_oEmbeds_SectionTitleBlock_widget extends Widget_Base {

    public function get_name() {
        return 'RTwelcomebox';
    }

    public function get_title() {
        return __( 'RT Banner box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {



        // Welcome-one start

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'tagline',
            [
                'label'         => __( 'Title tagline', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Section title tagline',

            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => __( 'Section Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Section Title',

            ]
        );

         $this->add_control(
            'desc1',
            [
                'label' => __( 'Welcome first description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


         $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        

        $this->add_control(
            'image',
            [
                'label'         => __( 'Welcome image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );



        $this->end_controls_section();

    }

    protected function render() {

        // CONTROLS SETTING DISPLAY
        $settings = $this->get_settings_for_display();
        
        // ALL CONTROLS LIST
        $tagline       = $settings['tagline'];
        $title         = $settings['title'];
        $desc1         = $settings['desc1'];
        $image         = wp_get_attachment_image_url( $settings['image']['id'], 'large' );
        $readmore_link      = $settings['readmore_link'];
        
       
    ?>
    <!-- Hero Section Start -->
        <section class="hero-section rel z-1 bg-dark-blue pt-25 rpt-5" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-10 col-sm-11">
                        <div class="hero-content text-white mt-250 mb-215">

                         <?php if($tagline): ?>
                           <span class="sub-title wow fadeInUp delay-0-2s"><?php echo $tagline;?></span>
                        <?php endif;?>

                         <?php if($title): ?>
                            <h1 class="wow fadeInUp delay-0-4s"><?php echo $title;?></h1>
                        <?php endif;?>

                         <?php if($desc1): ?>
                            <p class="wow fadeInUp delay-0-6s"><?php echo $desc1;?></p>
                        <?php endif;?>

                            <div class="hero-btn mt-35 wow fadeInUp delay-0-8s">

                            <?php if( $readmore_link): ?>
                                <a href="<?php echo $readmore_link;?>" class="theme-btn style-two">Start  a Project <i class="fas fa-long-arrow-alt-right"></i></a>
                            <?php endif?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-right-image wow fadeInLeft delay-0-2s" data-wow-duration="2s">

            <?php if($image): ?>
                <img src="<?php echo $image;?>" alt="Hero">
            <?php endif;?>

            </div>
            <div class="hero-right-circles wow customSlideInRight"></div>
            <div class="hero-dot-one"></div>
            <div class="hero-dot-two"></div>
            <div class="hero-dot-three"></div>
        </section>
    <!-- Hero Section End -->
       
    <?php

    }

    protected function _content_template() {

    ?>
        <!-- section title -->
        <div class="section-title text-center">
            <span class="subtitle">{{{ settings.sub_title }}}</span>
            <h2 class="title">{{{ settings.section_title }}}</h2>
            <p>{{{ settings.section_description }}}</p>
        </div>
        <!-- //. sectoin title -->

        <?php
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_SectionTitleBlock_widget );
endif;

// =================== Welcome Banner section end =======================================


// ============= Services Box start ==============//

if (!class_exists('Elementors_oEmbeds_servicesBox')):
class Elementors_oEmbeds_servicesBox extends Widget_Base {


    public function get_name() {
        return 'servicesBox';
    }

    public function get_title() {
        return __( 'RT Services Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );


        
        $repeater->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'benifit_title', [
                'label'         => __( 'Section Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'benifit_descs',
            [
                'label' => __( 'Benifit Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );

        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        $this->add_control(
            'benifitboxs',
            [
                'label'     => __( 'Benifit boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Benifit Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        /*$boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );*/
       

    ?>
        
        

       
            
            
    <!-- Services Section Start -->
        <section class="services-section text-center pt-125 rpt-95" id="services">
            <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xl-6 col-lg-8 col-md-10">
                       <div class="section-title mb-50">

                        
                        <?php if( $boxshorttitle): ?>
                            <span class="sub-title"><?php echo $boxshorttitle;?></span>
                        <?php endif;?>

                        <?php if( $boxmaintitle): ?>
                            <h2><?php echo $boxmaintitle;?></h2>
                        <?php endif;?>

                        </div>
                   </div>
               </div>
                <div class="row">

                <?php foreach (  $settings['benifitboxs'] as $benifitboxs): ?>

                    <div class="col-lg-4 col-sm-6">


                        <div class="service-item wow fadeInUp delay-0-2s">

                        <?php if($benifitboxs['boximg']): ?>
                            <img src="<?php echo $benifitboxs['boximg'] ['url']; ?>" alt="Icon">
                        <?php endif;?>

                        <?php if($benifitboxs['benifit_title']): ?>
                            <h4><a href="#"><?php echo $benifitboxs['benifit_title']; ?></a></h4>
                        <?php endif; ?>


                        <?php if($benifitboxs['benifit_descs']): ?>
                            <p><?php echo $benifitboxs['benifit_descs']; ?></p>
                        <?php endif; ?>


                        <?php if($benifitboxs['readmore_link']): ?>
                            <a href="<?php echo $benifitboxs['readmore_link']; ?>" class="read-more">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        <?php endif;?>


                        </div>

 
                    </div>

                <?php endforeach;?>

                    
                </div>
            </div>
        </section>
        <!-- Services Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_servicesBox );

// ============= Services Box end ==============//


// ============= About Box start ==============//

if (!class_exists('Elementors_oEmbeds_aboutBox')):
class Elementors_oEmbeds_aboutBox extends Widget_Base {


    public function get_name() {
        return 'aboutBox';
    }

    public function get_title() {
        return __( 'RT About Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );

        $this->add_control(
            'about_descs',
            [
                'label' => __( 'Benifit Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );

        $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        
        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Section Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'image_shape',
            [
                'label' => esc_html__( 'Choose Bg Shape', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



        $repeater->add_control(
            'benifit_title', [
                'label'         => __( 'Section Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );




        $this->add_control(
            'benifitboxs',
            [
                'label'     => __( 'Benifit boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Benifit Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        /*$boxbgimage         = $settings['boxbgimage']['id'];*/

        $boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );
        $image_shape         = wp_get_attachment_image_url( $settings['image_shape']['id'], 'large' );
        $boxshorttitle       = $settings['boxshorttitle'];
        $boxmaintitle        = $settings['boxmaintitle'];
        $about_descs         = $settings['about_descs'];
        $readmore_link       = $settings['readmore_link'];
        
       

    ?>
        
        

       
            
            
    <!-- About Section Start -->
        <section class="about-section rel z-1 pt-100 rpt-70" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left rmb-55 wow fadeInLeft delay-0-2s">

                        <?php if( $boximg): ?>
                            <img src="<?php echo $boximg;?>" alt="About">
                        <?php endif;?>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content wow fadeInRight delay-0-2s">
                            <div class="section-title mb-30">

                            <?php if( $boxshorttitle): ?>
                                <span class="sub-title"><?php echo $boxshorttitle;?></span>
                            <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>

                            </div>

                        <?php if( $about_descs): ?>
                            <p><?php echo $about_descs;?></p>
                        <?php endif;?>


                            <ul class="list-style-one pt-5 pb-30">

                            <?php foreach (  $settings['benifitboxs'] as $benifitboxs): ?>

                                <?php if($benifitboxs['benifit_title']): ?>
                                <li><?php echo $benifitboxs['benifit_title']; ?></li>
                                <?php endif; ?>

                             <?php endforeach;?>

                                
                            </ul>

                        <?php if( $boximg): ?>
                            <a href="<?php echo $readmore_link;?>" class="theme-btn">Learn More Us <i class="fas fa-long-arrow-alt-right"></i></a>
                        <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="about-bg-shape">

            <?php if( $image_shape): ?>
                <img src="<?php echo $image_shape;?>" alt="About Shape">
            <?php endif;?>

            </div>
        </section>
        <!-- About Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_aboutBox );

// ============= About Box end ==============//



// ============= Mission/vission Box start ==============//

if (!class_exists('Elementors_oEmbeds_missionBox')):
class Elementors_oEmbeds_missionBox extends Widget_Base {


    public function get_name() {
        return 'missionBox';
    }

    public function get_title() {
        return __( 'RT Mission Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );


        
        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $repeater->add_control(
            'tabButton', [
                'label'         => __( 'Button Text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Default' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'innerBox_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


       

        $repeater->add_control(
            'inner_btn_text_1', [
                'label'         => __( 'Bottom Btn text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inner_btn_text_2', [
                'label'         => __( 'Bottom Btn text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Benifit boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Benifit Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        $boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );

        $tabs = array();

        foreach ($settings['innerBoxs'] as $index => $innerBox) {
            $tab_id = 'tab-' . $index;
            $tabs[$tab_id] = $innerBox['tabButton']; // Use the appropriate field here
         }
           

    ?>
        
        

       
            
            
    <!-- What We Want Start -->
    <section class="what-we-want-area rel z-1 pt-125 rpt-100 pb-115 rpb-85" id="what-we-want">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-3">
                    <div class="what-we-want-image rmb-55 wow fadeInLeft delay-0-2s">
                        <?php if ($boximg): ?>
                            <img src="<?php echo $boximg;?>" alt="What We Want">
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="what-we-want-content wow fadeInRight delay-0-2s">
                        <div class="section-title mb-45">
                            <?php if ($settings['boxshorttitle']): ?>
                                <span class="sub-title"><?php echo $settings['boxshorttitle'];?></span>
                            <?php endif;?>
                            <?php if ($settings['boxmaintitle']): ?>
                                <h2><?php echo $settings['boxmaintitle'];?></h2>
                            <?php endif;?>
                        </div>
                        <div class="what-we-want-tab">
                            <ul class="nav nav-tabs">

                                <?php foreach ($tabs as $tab_id => $tab_title): ?>

                                    <li><a class="nav-link <?php echo ($tab_id === 'tab-0') ? 'active' : ''; ?>" data-toggle="tab" href="#<?php echo esc_attr($tab_id); ?>"><?php echo esc_html($tab_title); ?></a></li>

                                <?php endforeach; ?>

                            </ul>
                            <div class="tab-content pt-10">


                                <?php foreach ($settings['innerBoxs'] as $index => $innerBox): ?>

                                    <?php $tab_id = 'tab-' . $index; ?>
                                    <div class="tab-pane fade <?php echo ($tab_id === 'tab-0') ? 'show active' : ''; ?>" id="<?php echo esc_attr($tab_id); ?>">
                                        <?php if ($innerBox['innerBox_descs']): ?>
                                            <p><?php echo $innerBox['innerBox_descs']; ?></p>
                                        <?php endif; ?>
                                        <ul class="list-style-one">
                                            <?php if ($innerBox['inner_btn_text_1']): ?>
                                                <li><?php echo $innerBox['inner_btn_text_1']; ?></li>
                                            <?php endif; ?>
                                            <?php if ($innerBox['inner_btn_text_2']): ?>
                                                <li><?php echo $innerBox['inner_btn_text_2']; ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                <?php endforeach; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What We Want End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_missionBox );

// ============= Mission/vission Box end ==============//



// ============= Project Box start ==============//

if (!class_exists('Elementors_oEmbeds_projectBox')):
class Elementors_oEmbeds_projectBox extends Widget_Base {


    public function get_name() {
        return 'projectBox';
    }

    public function get_title() {
        return __( 'RT Project Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );

        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'contact_link',
            [
                'label' => __( 'Contact Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );



        
        $repeater->add_control(
            'innerBoxImg',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'project_title', [
                'label'         => __( 'Project Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Type your title here' , 'elementor' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'project_desc',
            [
                'label' => __( 'Project Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );

        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        


        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Inner boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inner Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';


        /*$boxbgimage         = $settings['boxbgimage']['id'];*/

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        $boximg             = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );
        $contact_link       = $settings['contact_link'];
       

    ?>
        
             
            
    <!-- Projects Section Start -->
        <section id="projects" class="projects-section bg-dark-blue text-center text-white pt-125 pb-120 rpt-95 rpb-90" style="background-image: url(<?php if($boximg){ echo $boximg; } else{ echo $dft_thum; } ?>);">
            <div class="container-fluid">
               <div class="row justify-content-center">
                   <div class="col-xl-6 col-lg-8 col-md-10">
                       <div class="section-title mb-50">
                            <?php if( $boxshorttitle): ?>
                            <span class="sub-title"><?php echo $boxshorttitle;?></span>
                            <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>
                        </div>
                   </div>
               </div>
                <div class="project-wrap">


                 <?php foreach (  $settings['innerBoxs'] as $innerBoxs): ?>

                    <div class="project-item wow fadeInUp delay-0-2s">

                    <?php if($innerBoxs['innerBoxImg']): ?>
                        <img src="<?php echo $innerBoxs['innerBoxImg'] ['url']; ?>" alt="Project">
                    <?php endif;?>

                    <?php if($innerBoxs['readmore_link']): ?>
                        <a href="<?php echo $readmore_link; ?>">
                    <?php endif;?>

                            <?php if($innerBoxs['project_title']): ?>
                                <i class="fas fa-plus"><h4><a href="<?php echo $readmore_link; ?>"><?php echo $innerBoxs['project_title']; ?></h4></i>
                            <?php endif;?>
                        </a>
                    

                    </div>

                 <?php endforeach;?>
                    
                </div>
                <div class="project-help-btn pt-25">
                    <h5>Need Any Project On Your Minds ?
                        <?php if( $contact_link): ?> 
                            <a href="<?php echo $contact_link; ?>">Contact Us</a>
                        <?php endif;?>
                    </h5>
                </div>
            </div>
        </section>
        <!-- Projects Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_projectBox );

// ============= Project Box end ==============//


// ============= Choose Box start ==============//

if (!class_exists('Elementors_oEmbeds_chooseBoxs')):
class Elementors_oEmbeds_chooseBoxs extends Widget_Base {


    public function get_name() {
        return 'chooseBox';
    }

    public function get_title() {
        return __( 'RT Choose Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );

        

        $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        
        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Section Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );




        $repeater->add_control(
            'inner_title', [
                'label'         => __( 'Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inner_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );




        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Inner boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inner Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        /*$boxbgimage         = $settings['boxbgimage']['id'];*/

        $boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );
    
        $boxshorttitle       = $settings['boxshorttitle'];
        $boxmaintitle        = $settings['boxmaintitle'];
        $readmore_link       = $settings['readmore_link'];
        
       

    ?>
        
        

       
            
            
     <!-- Why Choose Us Start -->
        <section class="why-choose-us rel z-1 pt-120 rpt-100" id="why-choose-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="why-choose-us-image rmb-55 wow fadeInLeft delay-0-2s">

                        <?php if( $boximg): ?>
                            <img src="<?php echo $boximg;?>" alt="Why Choose Us">
                        <?php endif;?>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="why-choose-us-content wow fadeInRight delay-0-2s">
                            <div class="section-title mb-30">

                            <?php if( $boxshorttitle): ?>
                                <span class="sub-title"><?php echo $boxshorttitle;?></span>
                            <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>

                            </div>
                            <ul class="list-style-one py-5">

                            <?php foreach (  $settings['innerBoxs'] as $innerBoxs): ?>
                                <li>
                                    <div class="list-content">

                                    <?php if($innerBoxs['inner_title']): ?>
                                        <h5><?php echo $innerBoxs['inner_title']; ?></h5>
                                    <?php endif; ?>

                                    <?php if($innerBoxs['inner_descs']): ?>
                                        <p><?php echo $innerBoxs['inner_descs']; ?></p>
                                    <?php endif; ?>

                                    </div>
                                </li>
                            <?php endforeach;?>
                                
                            </ul>

                             <?php if( $boximg): ?>
                                <a href="<?php echo $readmore_link;?>" class="theme-btn">Learn More Us <i class="fas fa-long-arrow-alt-right"></i></a>
                            <?php endif;?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Choose Us End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_chooseBoxs );

// ============= Choose Box end ==============//


// ============= Faq Box start ==============//

if (!class_exists('Elementors_oEmbeds_faqBoxs')):
class Elementors_oEmbeds_faqBoxs extends Widget_Base {


    public function get_name() {
        return 'faqBox';
    }

    public function get_title() {
        return __( 'RT Faq Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );

        

        $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        
        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Section Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );




        $repeater->add_control(
            'inner_title', [
                'label'         => __( 'Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inner_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );




        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Inner boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inner Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        /*$boxbgimage         = $settings['boxbgimage']['id'];*/

        $boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );
    
        $boxshorttitle       = $settings['boxshorttitle'];
        $boxmaintitle        = $settings['boxmaintitle'];
        $readmore_link       = $settings['readmore_link'];
        
       

    ?>
        
        

       
            
            
    <!-- FAQs Section Start -->
        <section class="faqs-section rel z-1 pt-125 rpt-95 pb-130 rpb-100" id="faqs">
            <div class="container">
                <div class="row align-items-center">


                    <div class="col-lg-6">
                        <div class="faq-content rmb-55 wow fadeInLeft delay-0-2s">
                            <div class="section-title mb-30">

                            <?php if( $boxshorttitle): ?>
                                <span class="sub-title"><?php echo $boxshorttitle;?></span>
                            <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>

                            </div>
                             <div class="faq-accordion" id="faq-accordion">

                            <?php foreach (  $settings['innerBoxs'] as $innerBoxs): ?>
                                <div class="card">

                                <?php if($innerBoxs['inner_title']): ?>
                                    <a class="collapsed card-header" id="heading1" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"><span class="toggle-btn"></span><?php echo $innerBoxs['inner_title']; ?>
                                    </a>
                                <?php endif; ?>

                                    <div id="collapse1" class="collapse" data-parent="#faq-accordion">
                                        <div class="card-body">

                                         <?php if($innerBoxs['inner_descs']): ?>
                                            <p><?php echo $innerBoxs['inner_descs']; ?></p>
                                        <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="faq-image wow fadeInRight delay-0-2s">

                        <?php if( $boximg): ?>
                            <img src="<?php echo $boximg;?>" alt="FAQs">
                        <?php endif;?>

                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- FAQs Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_faqBoxs );

// ============= Faq Box end ==============//


// ============= Technologies Box start ==============//

if (!class_exists('Elementors_oEmbeds_technologiesBox')):
class Elementors_oEmbeds_technologiesBox extends Widget_Base {


    public function get_name() {
        return 'Technologies';
    }

    public function get_title() {
        return __( 'RT Technologies Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );




        
        $repeater->add_control(
            'innerBoxImg',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'project_title', [
                'label'         => __( 'Project Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Type your title here' , 'elementor' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'project_desc',
            [
                'label' => __( 'Project Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );

        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        


        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Inner boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inner Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';


        /*$boxbgimage         = $settings['boxbgimage']['id'];*/

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        
       

    ?>
        
             
            
    <!-- Technologies Section Start -->
        <section class="technologies-section bg-light text-center pt-125 rpt-95 pb-100 rpb-70" id="technologies">
            <div class="container">
               <div class="row justify-content-center">
                   <div class="col-xl-6 col-lg-8 col-md-10">
                       <div class="section-title mb-50">

                        <?php if( $boxshorttitle): ?>
                            <span class="sub-title"><?php echo $boxshorttitle;?></span>
                        <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>
                        </div>
                   </div>
               </div>
                <div class="row justify-content-center">

                <?php foreach (  $settings['innerBoxs'] as $innerBoxs): ?>
                    <div class="col-xl-2 col-md-3 col-sm-4 col-6">

                     <?php if($innerBoxs['readmore_link']): ?>
                        <a class="technology-item wow fadeInUp delay-0-2s" href="<?php echo $readmore_link; ?>">

                        <?php if($innerBoxs['innerBoxImg']): ?>
                            <img src="<?php echo $innerBoxs['innerBoxImg'] ['url']; ?>" alt="technology">
                        <?php endif;?>

                        </a>
                    <?php endif;?>

                    </div>
                <?php endforeach;?>
                    
                </div>
            </div>
        </section>
        <!-- Technologies Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_technologiesBox );

// ============= Technologies Box end ==============//



// ============= Feedback Box start ==============//

if (!class_exists('Elementors_oEmbeds_feedbackBox')):
class Elementors_oEmbeds_feedbackBox extends Widget_Base {


    public function get_name() {
        return 'Feedback';
    }

    public function get_title() {
        return __( 'RT Feedback Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );


        
        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Click button link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        $repeater->add_control(
            'tabImage',
            [
                'label' => esc_html__( 'Tab Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $repeater->add_control(
            'tabButton', [
                'label'         => __( 'Button Text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Default' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'innerBox_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


       

        $repeater->add_control(
            'name', [
                'label'         => __( 'Bottom Btn text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'designations', [
                'label'         => __( 'Bottom Btn text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Benifit boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Benifit Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        $boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );
        $readmore_link      = $settings['readmore_link'];

         $tabs = array();

        foreach ($settings['innerBoxs'] as $index => $innerBox) {
            $tab_id = 'tab-' . $index;
            $tabs[$tab_id] = [
                'text' => $innerBox['tabButton'],
                'image' => $innerBox['tabImage'], // Use the appropriate field here
            ];
        }
           

    ?>
        
             
            
    <!-- Feedback Section Start -->
        <section class="feedback-section rel z-1 pt-125 rpt-95 pb-130 rpb-100" id="feedbacks">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feedback-left-content rmb-55 wow fadeInLeft delay-0-2s">
                            <div class="section-title mb-40">
                            
                            <?php if( $boxshorttitle): ?>
                            <span class="sub-title"><?php echo $boxshorttitle;?></span>
                            <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>

                            </div>

                        <?php if( $readmore_link): ?> 
                            <a href="<?php echo $readmore_link; ?>" class="theme-btn style-three">View More Reviews <i class="fas fa-long-arrow-alt-right"></i></a>
                        <?php endif;?>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feedbacks-wrap wow fadeInRight delay-0-2s">


                         <?php foreach ($tabs as $tab_id => $tab_data): ?>
                            <div class="feedback-logo-area">

                               
                                   
                                        <div class="feedback-logo-item <?php echo ($tab_id === 'tab-0') ? 'active' : ''; ?>">
                                            <img src="<?php echo esc_url($tab_data['image']['url']); ?>" alt="Feedback">
                                        </div>
                                   
                                

                            </div>

                        <?php endforeach; ?>

                            <div class="feedback-content-wrap">


                            <?php foreach ($settings['innerBoxs'] as $index => $innerBox): ?>

                                <?php $tab_id = 'tab-' . $index; ?>
                                <div class="feedback-content-item <?php echo ($tab_id === 'tab-0') ? 'show active' : ''; ?>" id="<?php echo esc_attr($tab_id); ?>">

                                <?php if ($innerBox['innerBox_descs']): ?>
                                    <span class="feedback-text">
                                        <?php echo $innerBox['innerBox_descs']; ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($innerBox['name']): ?>
                                    <h5><?php echo $innerBox['name']; ?></h5>
                                <?php endif; ?>

                                <?php if ($innerBox['designations']): ?>
                                    <h6><?php echo $innerBox['designations']; ?></h6>
                                <?php endif; ?>

                                </div>
                            <?php endforeach; ?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feedback Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_feedbackBox );

// ============= Feedback Box end ==============//


// ============= Package Services Box start ==============//

if (!class_exists('Elementors_oEmbeds_packageBoxs')):
class Elementors_oEmbeds_packageBoxs extends Widget_Base {


    public function get_name() {
        return 'packageBox';
    }

    public function get_title() {
        return __( 'RT Package Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        //  CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'ShortTitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Benefit from our online learning expertise Earn professional',

            ]
        );

        

        
        $this->add_control(
            'boximg',
            [
                'label' => esc_html__( 'Choose Section Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );




        $repeater->add_control(
            'inner_title', [
                'label'         => __( 'Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inner_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


        $repeater->add_control(
            'inner_price', [
                'label'         => __( 'Price', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inner_price_type', [
                'label'         => __( 'Price type', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inner_package_list', [
                'label'         => __( 'Package Item', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Section Main Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );



        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );




        $this->add_control(
            'innerBoxs',
            [
                'label'     => __( 'Inner boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inner Title', 'elementor' ),
                    ],
                ]
            ]
        );


        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        /*$boxbgimage         = $settings['boxbgimage']['id'];*/

        $boximg              = wp_get_attachment_image_url( $settings['boximg']['id'], 'large' );
    
        $boxshorttitle       = $settings['boxshorttitle'];
        $boxmaintitle        = $settings['boxmaintitle'];
        
        
       

    ?>
        
        

       
            
            
    <!-- Pricing Section Start -->
        <section class="pricing-section rel z-1 bg-dark-blue pt-125 rpt-95 pb-80 rpb-50" id="pricing">
            <div class="container">
                <div class="row justify-content-center">
                   <div class="col-xl-8 col-lg-9 col-md-10">
                       <div class="section-title text-center text-white mb-55">
                            <?php if( $boxshorttitle): ?>
                                <span class="sub-title"><?php echo $boxshorttitle;?></span>
                            <?php endif;?>

                            <?php if( $boxmaintitle): ?>
                                <h2><?php echo $boxmaintitle;?></h2>
                            <?php endif;?>
                        </div>
                   </div>
               </div>
                <div class="row large-gap justify-content-center">

                <?php foreach (  $settings['innerBoxs'] as $innerBoxs): ?>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pricing-item wow fadeInUp delay-0-2s">

                        <?php if($innerBoxs['inner_price_type']): ?>
                            <span class="price-type"><?php echo $innerBoxs['inner_price_type']; ?></span>
                        <?php endif; ?>

                        <?php if($innerBoxs['inner_title']): ?>
                            <h5><?php echo $innerBoxs['inner_title']; ?></h5>
                        <?php endif; ?>

                        <?php if($innerBoxs['inner_descs']): ?>
                            <p><?php echo $innerBoxs['inner_descs']; ?></p>
                        <?php endif; ?>

                        <?php if($innerBoxs['inner_price']): ?>
                            <span class="price"><?php echo $innerBoxs['inner_price']; ?></span>
                        <?php endif; ?>

                        <?php if($innerBoxs['readmore_link']): ?>
                            <a href="<?php echo $innerBoxs['readmore_link']; ?>" class="theme-btn">Choose Package <i class="fas fa-long-arrow-alt-right"></i></a>
                        <?php endif; ?>

                            <ul class="list-style-two">

                        <?php foreach (  $settings['innerBoxs'] as $innerBoxs): ?>
                            <?php if($innerBoxs['inner_package_list']): ?>
                                <li><?php echo $innerBoxs['inner_package_list']; ?></li>
                            <?php endif;?>
                        <?php endforeach;?>

                                
                            </ul>
                        </div>
                    </div>

                <?php endforeach;?>
                    
                </div>
            </div>
            <div class="pricing-right-circles wow customSlideInLeft delay-0-5s"></div>
        </section>
        <!-- Pricing Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_packageBoxs );

// ============= Package Services Box end ==============//




// ============= Blog Box start ==============//

if (!class_exists('Elementors_oEmbeds_blogBoxx')):
class Elementors_oEmbeds_blogBoxx extends Widget_Base {


    public function get_name() {
        return 'blogbox';
    }

    public function get_title() {
        return __( 'RT Blog Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // INSTRUCTOR CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shorttitle',
            [
                'label'         => __( 'Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

        $this->add_control(
            'maintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'         => __( 'Subtitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

        $this->add_control(
            'blogimage1',
            [
                'label'         => __( 'Blog Photo', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );   

         
  

        $repeater = new Repeater(); 

        $repeater->add_control(
            'inct_title', [
                'label'         => __( 'Instructor Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Instructor Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'date', [
                'label'         => __( 'Publishing date', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Publishing date' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inct_descs',
            [
                'label' => __( 'Instructor Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Title link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


        $this->add_control(
                'post',
                [
                    'label'         => __( 'How Many Posts Show:?', 'elementor' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => '6',

                ]
            );


     


            $this->add_control(
                'postase',
                [
                    'label'     => __( 'Select Post Order', 'elementor' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'ASC',
                    'options'   => [
                        'ASC'     => __( 'ASC', 'elementor' ),
                        'DESC'    => __( 'DESC', 'elementor' ),
                    ],
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'         => __( 'Order By', 'elementor' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => '',
                    'options'       => [
                        ''              => __( 'Default', 'elementor' ),
                        'date'          => __( 'Date', 'elementor' ),
                        'title'         => __( 'Title', 'elementor' ),
                        'name'          => __( 'Name', 'elementor' ),
                        'modified'      => __( 'Modified', 'elementor' ),
                        'author'        => __( 'Author', 'elementor' ),
                        'rand'          => __( 'Random', 'elementor' ),
                        'ID'            => __( 'ID', 'elementor' ),
                        'comment_count' => __( 'Comment Count', 'elementor' ),
                        'menu_order'    => __( 'Menu Order', 'elementor' ),
                    ],
                ]
            );

             
        $this->add_control(
            'inctboxs',
            [
                'label'     => __( 'Inctractor boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inctractor Title', 'elementor' ),
                    ],
                ]
            ]
        );


         $this->add_control(
            'click_btn_link',
            [
                'label' => __( 'Click button link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render() {
        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        $paged              = get_query_var('paged');

        $shorttitle         = $settings['shorttitle'];
        $maintitle          = $settings['maintitle'];
        $subtitle           = $settings['subtitle'];
        $blogimage1         = wp_get_attachment_image_url( $settings['blogimage1']['id'], 'large' );

        $post               =  $settings['post'];
        $postase            =  $settings['postase'];
        $orderby            =  $settings['orderby'];

        $args = array(
                'posts_per_page'   => $post,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => $orderby,
                'order'            => $postase,
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'custom_slider',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'           => '',
                'author_name'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true,
                'pages'            => true,
                'paged' => $paged,
            );
            
        $posts = new \WP_Query($args);

        $month_year = get_the_date( 'F j, Y' );
        //Cooments Number Count
        $comments_num = get_comments_number();


    ?>
        
               
            
        <!-- Blog Section Start -->
        <section class="blog-section rel z-1 pt-125 rpt-95" id="blog">
            <div class="container">
                <div class="row align-items-end pb-35">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title mb-25">

                        <?php if($shorttitle):?>
                            <span class="sub-title"><?php echo $shorttitle;?></span>
                        <?php endif;?>

                        <?php if($maintitle):?>
                            <h2><?php echo $maintitle;?></h2>
                        <?php endif;?>

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4 text-lg-right">

                    <?php if($click_btn_link):?>
                        <a href="<?php echo $click_btn_link;?>" class="theme-btn style-three mb-25">View More <i class="fas fa-long-arrow-alt-right"></i></a>
                    <?php endif;?>

                    </div>
                </div>
                <div class="row">


                    

                <?php
                    if ( $posts->have_posts() ) :
                        
                        $post_count = 1;

                        while( $posts->have_posts() ) : $posts->the_post();

                        $thumbnails     = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
                        $content        = get_the_content();
                        $desc           = get_post_meta(get_the_ID() , 'desc', true);
                        /*$button_link    = get_field("button_link");*/


                        $button_link     = get_field('button_link');
                    
                ?>

                    <div class="col-xl-4 col-md-6">

                        <div class="blog-item wow fadeInUp delay-0-2s">

                        <?php if(!empty($thumbnails)): ?>
                            <div class="image">
                                <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                            </div>
                        <?php endif; ?>

                            <div class="blog-content">
                                <a href="blog-details.html" class="details-btn"><i class="fas fa-long-arrow-alt-right"></i></a>

                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <?php if($content): ?>
                                <p><?php echo wpautop($content); ?></p>
                            <?php endif; ?>

                                <ul class="blog-footer">
                                    <li><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><?php the_author(); ?> | <?php echo $month_year; ?></a></li>
                                    <li><span class="dot"></span></li>
                                    <li><i class="far fa-comments"></i> <a href="<?php the_permalink(); ?>"><?php echo $comments_num; ?></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

                <?php $post_count++; endwhile;  wp_reset_postdata(); ?>

                <?php else : //ECHO POST NOT FOUND ?>
                    <p style=" color: red; text-align: center;">
                    <?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                <?php  endif; ?>
            
                </div>
            </div>
        </section>
        <!-- Blog Section End -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_blogBoxx );

// ============= Blog Box end ==============//


// ============= **Pre Slider Box start ==============//

if ( !class_exists('Elementors_oEmbeds_sliderBlock_widget')):
    class Elementors_oEmbeds_sliderBlock_widget extends Widget_Base {


        public function get_name() {
            return 'sliderblock';
        }

        public function get_title() {
            return __( 'RT Sliders', 'plugin-name' );
        }

        public function get_icon() {
            return 'eicon-navigator';
        }

        public function get_categories() {
            return [ 'relyontask' ];
        }

        protected function _register_controls() {



            $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => __( 'URL to embed', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => __( 'https://your-link.com', 'plugin-name' ),
            ]
        );

        $this->add_control(
            'click_btn_link',
            [
                'label' => __( 'Click button link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );


         $this->add_control(
                'slider',
                [
                    'label'         => __( 'How Many Posts Show:?', 'elementor' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => '6',

                ]
            );


     


            $this->add_control(
                'postase',
                [
                    'label'     => __( 'Select Post Order', 'elementor' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'ASC',
                    'options'   => [
                        'ASC'     => __( 'ASC', 'elementor' ),
                        'DESC'    => __( 'DESC', 'elementor' ),
                    ],
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'         => __( 'Order By', 'elementor' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => '',
                    'options'       => [
                        ''              => __( 'Default', 'elementor' ),
                        'date'          => __( 'Date', 'elementor' ),
                        'title'         => __( 'Title', 'elementor' ),
                        'name'          => __( 'Name', 'elementor' ),
                        'modified'      => __( 'Modified', 'elementor' ),
                        'author'        => __( 'Author', 'elementor' ),
                        'rand'          => __( 'Random', 'elementor' ),
                        'ID'            => __( 'ID', 'elementor' ),
                        'comment_count' => __( 'Comment Count', 'elementor' ),
                        'menu_order'    => __( 'Menu Order', 'elementor' ),
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $click_btn_link     = $settings['click_btn_link'];
            
            $paged        = get_query_var('paged');

            $slider       =  $settings['slider'];
            $postase      =  $settings['postase'];
            $orderby      =  $settings['orderby'];

            $dri_url      = get_template_directory_uri();
            $dft_thum     = $dri_url.'/assets/images/backgrounds/background.jpg';


            
            $args = array(
                'posts_per_page'   => $slider,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => $orderby,
                'order'            => $postase,
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'custom_slider',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'           => '',
                'author_name'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true,
                'pages'            => true,
                'paged' => $paged,
            );
            
            $posts = new \WP_Query($args);


        ?>


    

     <!-- Banner One Start -->
        <section class="main-slider">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                 "pagination": {
                    "el": "#main-slider-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                "navigation": {
                    "nextEl": "#main-slider__swiper-button-next",
                    "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                    "delay": 5000
                }}'>
                <div class="swiper-wrapper ">

                <!-- Slider single carousel -->
                <?php
                if ( $posts->have_posts() ) :
                    
                    $post_count = 1;

                    while( $posts->have_posts() ) : $posts->the_post();

                    $thumbnails     = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
                    $content        = get_the_content();
                    $desc           = get_post_meta(get_the_ID() , 'desc', true);
                    /*$button_link    = get_field("button_link");*/


                    $button_link     = get_field('button_link');
                    
                ?>
                    <div class="swiper-slide <?php if($post_count==1){echo'swiper-slide'; $post_count++;}?> ">
                        <div class="image-layer"
                            style="background-image: url('<?php echo $thumbnails[0]; ?>')">
                             <img class="" src="" alt="First slide">
                        </div>

                        <div class="image-layer-overlay"></div>
                        <div class="main-slider-shape-1"></div>
                        <div class="main-slider-shape-2"></div>
                        <div class="main-slider-shape-3"></div>
                        <div class="main-slider-shape-4"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-slider__content">
                                        <p><?php echo wpautop($content); ?></p>
                                        <h2><?php the_title(); ?></h2>
                                        <a href="<?php echo $button_link;?>" class="thm-btn"><span>Free consultation</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $post_count++; endwhile;  wp_reset_postdata(); ?>

                <?php else : //ECHO POST NOT FOUND ?>
                    <p style=" color: red; text-align: center;">
                    <?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                <?php  endif; ?>

                </div>
                <!-- If we need navigation buttons -->
                <div class="slider-bottom-box clearfix">

                    <div class="main-slider__nav">
                        <div class="swiper-button-prev" id="main-slider__swiper-button-next"></i>
                                <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="fas fa-arrow-left"></i>
                        </div>
                    </div>
                    <div class="swiper-pagination" id="main-slider-pagination"></div>
                </div>
            </div>
        </section>
        <!--Banner One End-->

        <?php

        }
    }
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_sliderBlock_widget() );


// ============= **Pre Slider Box end ==============//



// ============= **Pre Counter section start ==============//

if (!class_exists('Elementors_oEmbeds_CounterBlock_widget')):
class Elementors_oEmbeds_CounterBlock_widget extends Widget_Base {

    public function get_name() {
        return 'counterblock';
    }

    public function get_title() {
        return __( 'PIT Counter', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'presstech-it' ];
    }

    protected function _register_controls() {

        // SLIDER SETTING CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'countertitle',
            [
                'label'         => __( 'Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Happy Clients',

            ]
        );

        $this->add_control(
            'counternumber',
            [
                'label'         => __( 'Counter Number', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => '2020',

            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $counternumber  = $settings['counternumber'];
        $countertitle   = $settings['countertitle'];
       
    ?>
        

        <!--Counter One Start-->
        <section class="counters-one">
            <div class="container">
                <ul class="counters-one__box list-unstyled">
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                        <div class="counter-one__icon">
                            <span class="ct-favicon fas fa-hands-helping"></span>
                        </div>
                        <h3 class="odometer" data-count="860"><?php echo $counternumber; ?></h3>
                        <p class="counter-one__text"><?php echo $countertitle;  ?></p>
                    </li>
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms">
                        <div class="counter-one__icon">
                            <span class="ct-favicon fas fa-award"></span>
                        </div>
                        <h3 class="odometer" data-count="50">00</h3>
                        <p class="counter-one__text">Active clients</p>
                    </li>
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms">
                        <div class="counter-one__icon">
                            <span class="ct-favicon fas fa-coffee"></span>
                        </div>
                        <h3 class="odometer" data-count="93">00</h3>
                        <p class="counter-one__text">Cups of coffee</p>
                    </li>
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="400ms">
                        <div class="counter-one__icon">
                            <span class="ct-favicon fab fa-creative-commons-by"></span>
                        </div>
                        <h3 class="odometer" data-count="970">00</h3>
                        <p class="counter-one__text">Happy clients</p>
                    </li>
                    <li class="counter-one__shape wow fadeInUp" data-wow-delay="500ms"></li>    
                </ul>
            </div>
        </section>
        <!--Counter One End-->

        
    <?php }

    protected function _content_template() {

    ?>

        <!--Counter One Start-->
        <section class="counters-one">
            <div class="container">
                <ul class="counters-one__box list-unstyled">
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                        <div class="counter-one__icon">
                            <span class="icon-recommend"></span>
                        </div>
                        <h3 class="odometer" data-count="860">{{{ settings.counternumber }}}</h3>
                        <p class="counter-one__text">{{{ settings.countertitle }}}</p>
                    </li>    
                </ul>
            </div>
        </section>
        <!--Counter One End-->

    <?php }

}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_CounterBlock_widget );
// ============= **Pre Counter section end ==============//


// ============= ** Pre Banner Box start ==============//

if (!class_exists('Elementors_oEmbeds_BannerBoxx')):
class Elementors_oEmbeds_BannerBoxx extends Widget_Base {


    public function get_name() {
        return 'BannerBoxx';
    }

    public function get_title() {
        return __( 'RT Banner Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // INSTRUCTOR CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Banner from our online learning expertise Earn professional',

            ]
        );


        $this->add_control(
            'boxbgimage1',
            [
                'label'         => __( 'Block Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'boxbgimage2',
            [
                'label'         => __( 'Block Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        $boxbgimage1        = wp_get_attachment_image_url( $settings['boxbgimage1']['id'], 'large' );
        $boxbgimage2        = wp_get_attachment_image_url( $settings['boxbgimage2']['id'], 'large' );
        $readmore_link      = $settings['readmore_link'];

    ?>
              
            

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="auto-container">
            <div class="pattern-layer-six" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/pattern-4.png)"></div>
            <div class="pattern-layer-seven" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/pattern-5.png)"></div>
            <div class="pattern-layer-eight" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/icon-2.png)"></div>
            <div class="row clearfix">
            
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="pattern-layer-one" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/pattern-1.png)"></div>
                        <div class="pattern-layer-two" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/pattern-2.png)"></div>
                        <div class="pattern-layer-three" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/icon-1.png)"></div>
                        <div class="pattern-layer-four" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/pattern-3.png)"></div>
                        <div class="pattern-layer-five" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/icon-2.png)"></div>

                       
                    <?php if($boxbgimage1): ?>
                        <div class="image">
                            <img src="<?php echo $boxbgimage1;?>" alt="" />
                        </div>
                    <?php endif;?>

                    <?php if($boxbgimage2): ?>
                        <div class="image-two">
                            <img src="<?php echo $boxbgimage2;?>" alt="" />
                        </div>
                    <?php endif;?>

                        <div class="image-content" style="background-image: url(<?php echo $dri_url;?>/images/main-slider/pattern-6.png)">
                            <p>87% of people <br> learning</p>
                        </div>
                    </div>
                </div>
                
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">

                    <?php if( $boxshorttitle): ?>
                        <div class="title"><?php echo $boxshorttitle;?></div>
                    <?php endif;?>

                    <?php if( $boxmaintitle): ?>
                        <h1><?php echo $boxmaintitle;?></h1>
                    <?php endif?>

                    <?php if( $readmore_link): ?>
                        <div class="btns-box">
                            <a href="<?php echo $readmore_link;?>" class="theme-btn btn-style-one"><span class="txt">Join For free</span></a>
                        </div>
                    <?php endif?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Banner Section -->
    


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_BannerBoxx );

// ============= **Pre Banner Box end ==============//




// ============= **Pre Instructor Box start ==============//

if (!class_exists('Elementors_oEmbeds_InstructorBoxx')):
class Elementors_oEmbeds_InstructorBoxx extends Widget_Base {


    public function get_name() {
        return 'Instructorbox';
    }

    public function get_title() {
        return __( 'RT Instructor Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // INSTRUCTOR CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater(); 

        $this->add_control(
            'inctimage',
            [
                'label'         => __( 'Author Instructor Official Photo', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'inct_title', [
                'label'         => __( 'Instructor Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Instructor Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Title link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );



        $repeater->add_control(
            'inct_descs',
            [
                'label' => __( 'Instructor Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


        $this->add_control(
            'inctboxs',
            [
                'label'     => __( 'Inctractor boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inctractor Title', 'elementor' ),
                    ],
                ]
            ]
        );

        //<!-- Instructor 3rd Column --> 

         $this->add_control(
            'boxbgimage',
            [
                'label'         => __( 'Block Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'boxtitle',
            [
                'label'         => __( 'Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

         $this->add_control(
            'boxcontent',
            [
                'label'         => __( 'Content', 'elementor' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => 'Top instructors from around the world teach millions of students Duis       baute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.',
            ]
        );



         $this->add_control(
            'click_btn_link',
            [
                'label' => __( 'Click button link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render() {
        $settings           = $this->get_settings_for_display();

        $thumbnails         = wp_get_attachment_image_url( $settings['inctimage']['id'], 'large' );

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];
        $boxbgimage         = wp_get_attachment_image_url( $settings['boxbgimage']['id'], 'large' );
        $boxtitle           = $settings['boxtitle'];
        $boxcontent         = $settings['boxcontent'];
        $click_btn_link     = $settings['click_btn_link'];

    ?>
        
        

       
            
            
        <!--We Change Start-->
        <section class="we-change">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="we-change__left-faqs">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Frequently asked questions</span>
                                <h2 class="section-title__title">We’re here to change your business look</h2>
                            </div>
                            <div class="we-change__faqs">
                                <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                    <div class="accrodion active">
                                        <div class="accrodion-title">
                                            <h4>Few resons why you should choose us</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum
                                                    leo ligula, vitae commodo nisl.</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4>Few resons why you should choose us</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum
                                                    leo ligula, vitae commodo nisl.</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                    <div class="accrodion last-chiled">
                                        <div class="accrodion-title">
                                            <h4>Few resons why you should choose us</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum
                                                    leo ligula, vitae commodo nisl.</p>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="we-change__right">
                            <div class="we-change__right-img">
                                <img src="<?php echo $boxbgimage;?>" alt="">
                                <div class="we-change__agency">
                                    <div class="we-change__agency-icon">
                                        <span class="icon-development"></span>
                                    </div>
                                    <div class="we-change__agency-text">
                                        <h3>Our agency is one of the most <br> successful agency.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--We Change End-->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_InstructorBoxx );

// ============= **Pre Instructor Box end ==============//



// ============= **Pre Feature Box start ==============//

if (!class_exists('Elementors_oEmbeds_FeatureBoxx')):
class Elementors_oEmbeds_FeatureBoxx extends Widget_Base {


    public function get_name() {
        return 'FeatureBoxx';
    }

    public function get_title() {
        return __( 'RT Feature Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // INSTRUCTOR CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Banner from our online learning expertise Earn professional',

            ]
        );

        $this->add_control(
            'left_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );

        $this->add_control(
            'lft_readmore_link',
            [
                'label' => __( 'Left Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'boximgtitle',
            [
                'label'         => __( 'Image Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Banner from our online learning expertise Earn professional',

            ]
        );

        $this->add_control(
            'right_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );



        $this->add_control(
            'boxbgimage1',
            [
                'label'         => __( 'Box Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'boxbgimage2',
            [
                'label'         => __( 'Box Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );


        $this->add_control(
            'right_readmore_link',
            [
                'label' => __( 'Right Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle             = $settings['boxshorttitle'];
        $boxmaintitle              = $settings['boxmaintitle'];
        $boximgtitle               = $settings['boximgtitle'];
        $left_descs                = $settings['left_descs'];
        $right_descs               = $settings['right_descs'];
        $boxbgimage1               = wp_get_attachment_image_url( $settings['boxbgimage1']['id'], 'large' );
        $boxbgimage2               = wp_get_attachment_image_url( $settings['boxbgimage2']['id'], 'large' );
        $lft_readmore_link         = $settings['lft_readmore_link'];
        $right_readmore_link       = $settings['right_readmore_link'];

    ?>
              
            

    <!-- Feature Section -->
    <section class="feature-section">
        <div class="pattern-layer" style="background-image:url(<?php echo $dri_url;?>/images/background/pattern-7.png)"></div>
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">


                    <?php if( $boxshorttitle): ?>
                            <div class="title"><?php echo $boxshorttitle;?></div>
                    <?php endif;?>

                    <?php if( $boxmaintitle): ?>
                            <h2><?php echo $boxmaintitle;?></h2>
                    <?php endif?>

                    <?php if( $left_descs): ?>
                            <div class="text"><?php echo $left_descs;?></div>
                    <?php endif?>

                        </div>

                    <?php if( $lft_readmore_link): ?>
                        <div class="btn-box">
                            <a href="<?php echo $lft_readmore_link;?>" class="theme-btn btn-style-two"><span class="txt">Short courses</span></a>
                        </div>
                     <?php endif?>

                    </div>
                </div>
                
                <!-- Image Column -->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="color-layer"></div>
                        <div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                        <?php if( $boxbgimage1): ?>
                            <img src="<?php echo $boxbgimage1;?>" alt="" />
                        <?php endif?>

                            <div class="overlay-box">
                                <div class="content">

                                <?php if( $boxshorttitle): ?>
                                    <h2><?php echo $boximgtitle;?></h2>
                                <?php endif?>

                                <?php if( $right_descs): ?>
                                    <p><?php echo $right_descs;?> </p>
                                <?php endif?>

                                <?php if( $right_readmore_link): ?>
                                    <a href="<?php echo $right_readmore_link;?>" class="learn">Learn 3 Class</a>
                                <?php endif?>

                                </div>
                            </div>
                        </div>
                        <div class="feature-icon wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">

                        <?php if( $boxbgimage2): ?>
                            <img src="<?php echo $boxbgimage2;?>" alt="" />
                        <?php endif?>

                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
    <!-- End Benefit Section -->
    


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_FeatureBoxx );

// ============= **Pre Feature Box end ==============//

// ============= **Pre Career Box start ==============//

if (!class_exists('Elementors_oEmbeds_CareerBoxx')):
class Elementors_oEmbeds_CareerBoxx extends Widget_Base {


    public function get_name() {
        return 'CareerBoxx';
    }

    public function get_title() {
        return __( 'RT Career Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // CAREER CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Banner from our online learning expertise Earn professional',

            ]
        );


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'Sub Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'right_descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );




        $this->add_control(
            'boxbgimage1',
            [
                'label'         => __( 'Block Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );



        $this->add_control(
            'readmore_link',
            [
                'label' => __( 'Button Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        $right_descs        = $settings['right_descs'];
        $boxbgimage1        = wp_get_attachment_image_url( $settings['boxbgimage1']['id'], 'large' );
        $boxbgimage1        = wp_get_attachment_image_url( $settings['boxbgimage1']['id'], 'large' );
        $readmore_link      = $settings['readmore_link'];

    ?>
              
            

    <!-- Career Section -->
    <section class="career-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">

            <?php if( $boxmaintitle): ?>
                <h2><?php echo $boxmaintitle;?></h2>
            <?php endif?>

            </div>
            
            <div class="row clearfix">
                
                <!-- Image Column -->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image titlt" data-tilt data-tilt-max="4">

                        <?php if($boxbgimage1): ?>
                            <img src="<?php echo $boxbgimage1;?>" alt="" />
                        <?php endif?>

                        </div>
                    </div>
                </div>
                
                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">

                    <?php if( $boxshorttitle): ?>
                        <h5><?php echo $boxshorttitle;?></h5>
                    <?php endif?>

                        <div class="text">

                    <?php if( $right_descs): ?>
                        <?php echo $right_descs;?>
                     <?php endif?>

                        </div>

                    <?php if( $readmore_link): ?>
                        <a href="<?php echo $readmore_link;?>" class="theme-btn btn-style-three">Read it now <span class="fa fa-caret-right"></span></a>
                     <?php endif?>

                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Career Section -->
    


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_CareerBoxx );

// ============= **Pre Career Box end ===============//

// ============= **Pre Skill Box start ==============//

if (!class_exists('Elementors_oEmbeds_SkillBoxx')):
class Elementors_oEmbeds_SkillBoxx extends Widget_Base {


    public function get_name() {
        return 'SkillBoxx';
    }

    public function get_title() {
        return __( 'RT Skill Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // Skill CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();


        $this->add_control(
            'boxshorttitle',
            [
                'label'         => __( 'Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Learn anything',

            ]
        );

        $this->add_control(
            'boxmaintitle',
            [
                'label'         => __( 'Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Banner from our online learning expertise Earn professional',

            ]
        );

        $this->add_control(
            'descs',
            [
                'label' => __( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );

        $this->add_control(
            'boxbgimage',
            [
                'label'         => __( 'Box Image', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );


        $repeater->add_control(
            'skill_title', [
                'label'         => __( 'Skill Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Slide Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'skill_button_text', [
                'label'         => __( 'skill button text', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Slide Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'skill_percentage',
            [
                'label'         => __( 'Skill Percentage', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( '90' , 'elementor' ),
                'show_label'    => true,
            ]
        );


        $this->add_control(
            'skillboxs',
            [
                'label'     => __( 'Skillboxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'Skill_title'   => __( 'Skill Title', 'elementor' ),
                    ],
                ]
            ]
        );




        
        $this->end_controls_section();


    }

    protected function render() {


        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        //$boxbgimage         = $settings['boxbgimage']['id'];

        $boxshorttitle      = $settings['boxshorttitle'];
        $boxmaintitle       = $settings['boxmaintitle'];
        $descs              = $settings['descs'];
        $boxbgimage         = wp_get_attachment_image_url( $settings['boxbgimage']['id'], 'large' );
    ?>
              
            

    <!-- Skill Section -->
    <section class="skill-section">
        <div class="pattern-layer" style="background-image:url(<?php echo $dri_url;?>/images/background/pattern-8.png)"></div>
        <div class="auto-container">
            <div class="row clearfix">
                
                <!-- Skill Column -->
                <div class="skill-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">

                        <?php if( $boxshorttitle): ?>
                            <div class="title"><?php echo $boxshorttitle;?></div>
                        <?php endif?>

                         <?php if( $boxmaintitle): ?>
                            <h2><?php echo $boxmaintitle;?></h2>
                        <?php endif?>

                        <?php if( $descs): ?>
                            <div class="text"><?php echo $descs;?></div>
                        <?php endif?>
                        </div>
                        
                        <!-- Skills -->
                        <div class="skills">

                            <!-- Skill Item -->
                        <?php foreach (  $settings['skillboxs'] as $skillbox ):?>

                            <div class="skill-item">
                                <div class="skill-header clearfix">

                                <?php if($skillbox['skill_title']): ?>
                                    <div class="skill-title"><?php echo $skillbox['skill_title']; ?></div>
                                <?php endif; ?>

                                    <div class="skill-percentage">
                                        <div class="count-box">
                                            <span class="count-text" data-speed="2000" data-stop="<?php echo $skillbox['skill_percentage']; ?>">0</span>%
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-bar">

                                <?php if($skillbox['skill_percentage']): ?>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="<?php echo $skillbox['skill_percentage']; ?>"> <?php echo $skillbox['skill_percentage']; ?>  
                                        </div>
                                    </div>

                                <?php endif; ?>

                                </div>
                            </div>

                        <?php endforeach; ?>

                        </div>
                        
                    </div>
                </div>
                
                <!-- Image Column -->
                <div class="image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="circle-one"></div>
                        <div class="circle-two"></div>
                        <div class="image titlt" data-tilt data-tilt-max="4">

                         <?php if( $boxbgimage): ?>
                            <img src="<?php echo $boxbgimage;?>" alt="" />
                        <?php endif;?>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Skill Section -->
    


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_SkillBoxx );

// ============= **Pre Skill Box end ===============//


// ============= **Pre Testimonial Box start ==============//

if ( !class_exists('Elementors_oEmbeds_testimonialBlock_widget')):
    class Elementors_oEmbeds_testimonialBlock_widget extends Widget_Base {


        public function get_name() {
            return 'testimonialblock';
        }

        public function get_title() {
            return __( 'RT Testimonial', 'plugin-name' );
        }

        public function get_icon() {
            return 'eicon-navigator';
        }

        public function get_categories() {
            return [ 'relyontask' ];
        }

        protected function _register_controls() {



            // SLIDER SETTING CONTROLS
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Content', 'plugin-name' ),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );


        $this->add_control(
            'shorttitle',
            [
                'label'         => __( 'Box Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'App Design',

            ]
        );

        $this->add_control(
            'maintitle',
            [
                'label'         => __( 'Section Subtitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Section Subtitle',

            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'         => __( 'Section Subtitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Section Subtitle',

            ]
        );
     

            $this->add_control(
                'testimonial',
                [
                    'label'         => __( 'How Many Posts Show:?', 'elementor' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => '6',

                ]
            );

            $this->add_control(
                'postase',
                [
                    'label'     => __( 'Select Post Order', 'elementor' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'ASC',
                    'options'   => [
                        'ASC'     => __( 'ASC', 'elementor' ),
                        'DESC'    => __( 'DESC', 'elementor' ),
                    ],
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'         => __( 'Order By', 'elementor' ),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => '',
                    'options'       => [
                        ''              => __( 'Default', 'elementor' ),
                        'date'          => __( 'Date', 'elementor' ),
                        'title'         => __( 'Title', 'elementor' ),
                        'name'          => __( 'Name', 'elementor' ),
                        'modified'      => __( 'Modified', 'elementor' ),
                        'author'        => __( 'Author', 'elementor' ),
                        'rand'          => __( 'Random', 'elementor' ),
                        'ID'            => __( 'ID', 'elementor' ),
                        'comment_count' => __( 'Comment Count', 'elementor' ),
                        'menu_order'    => __( 'Menu Order', 'elementor' ),
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            
            $paged        = get_query_var('paged');

            $testimonial  =  $settings['testimonial'];
            $postase      =  $settings['postase'];
            $orderby      =  $settings['orderby'];


            $shorttitle   = $settings['shorttitle'];
            $maintitle    = $settings['maintitle'];
            $subtitle     = $settings['subtitle'];

            $dri_url      = get_template_directory_uri();
            $dft_thum     = $dri_url.'/assets/images/backgrounds/background.jpg';


            
            $args = array(
                'posts_per_page'   => $testimonial,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => $orderby,
                'order'            => $postase,
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'testimonial',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'           => '',
                'author_name'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true,
                'pages'            => true,
                'paged' => $paged,
            );
            
            $posts = new \WP_Query($args);


        ?>


    <!-- Testimonial n Section -->
    <section class="testimonial-section">
        <div class="circle-one paroller" data-paroller-factor="-0.20" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="horizontal"></div>
        <div class="circle-two paroller" data-paroller-factor="0.20" data-paroller-factor-lg="-0.20" data-paroller-type="foreground" data-paroller-direction="horizontal"></div>
        <div class="pattern-layer-two" style="background-image:url(<?php echo $dri_url; ?>/images/background/pattern-10.png)"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="pattern-layer" style="background-image:url(<?php echo $dri_url; ?>/images/background/pattern-9.png)"></div>
                <!-- Sec Title -->
                <div class="sec-title centered">

                <?php if($shorttitle):?>
                    <div class="title"><?php echo $shorttitle;?></div>
                <?php endif;?>

                <?php if($maintitle):?>
                    <h2><?php echo $maintitle;?></h2>
                <?php endif;?>

                <?php if($subtitle):?>
                    <div class="text"><?php echo $subtitle;?></div>
                <?php endif;?>

                </div>
                <div class="testimonial-carousel owl-carousel owl-theme">
                    
                    <!-- testimonial carousel -->
                    <?php
                    if ( $posts->have_posts() ) :
                        
                        $post_count = 1;

                        while( $posts->have_posts() ) : $posts->the_post();

                        $thumbnails     = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
                        $content        = get_the_content();
                        $desc           = get_post_meta(get_the_ID() , 'desc', true);

                        $designation   = get_field('designation');
                        
                    ?>
                    <!-- Testimonial single post item -->
                    <div class="testimonial-block">
                        <div class="inner-box">

                            <div class="text"><?php echo wpautop($content); ?></div>

                            <div class="author-info">
                                <div class="info-inner">
                                    <div class="author-image">
                                        <img src="<?php echo $thumbnails[0]; ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                    <h6><?php the_title(); ?></h6>
                                    <div class="designation"><?php echo $designation;?></div>
                                </div>
                            </div>
                            <div class="quote-icon flaticon-quote-2"></div>
                        </div>
                    </div>
                    
                <?php $post_count++; endwhile;  wp_reset_postdata(); ?>

                <?php else : //ECHO POST NOT FOUND ?>
                    <p style=" color: red; text-align: center;">
                    <?php esc_html_e( 'Sorry, No Post matched your criteria. Please Add New Post Thank You..!' ); ?></p>
                <?php  endif; ?>

    
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial n Section -->

        <?php

        }
    }
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_testimonialBlock_widget() );


// ============= **Pre Testimonial Box end ==============//


// ============= **Pre News Box start ==============//

if (!class_exists('Elementors_oEmbeds_NewsBoxx')):
class Elementors_oEmbeds_NewsBoxx extends Widget_Base {


    public function get_name() {
        return 'Newsbox';
    }

    public function get_title() {
        return __( 'RT News Box', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-navigator';
    }

    public function get_categories() {
        return [ 'relyontask' ];
    }

    protected function _register_controls() {


        // INSTRUCTOR CONTENT CONTROLS
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shorttitle',
            [
                'label'         => __( 'Short Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

        $this->add_control(
            'maintitle',
            [
                'label'         => __( 'Main Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'         => __( 'Subtitle', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Become an instructor',

            ]
        );

        $this->add_control(
            'blogimage1',
            [
                'label'         => __( 'Blog Photo', 'elementor' ),
                'type'          => Controls_Manager::MEDIA,
            ]
        );   

         
  

        $repeater = new Repeater(); 

        $repeater->add_control(
            'inct_title', [
                'label'         => __( 'Instructor Title', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Instructor Title' , 'elementor' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'date', [
                'label'         => __( 'Publishing date', 'elementor' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'Publishing date' , 'elementor' ),
                'label_block'   => true,
            ]
        );


        $repeater->add_control(
            'inct_descs',
            [
                'label' => __( 'Instructor Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __( 'Default description', 'elementor' ),
                'placeholder' => __( 'Type your description here', 'elementor' ),
            ]
        );


        $repeater->add_control(
            'readmore_link',
            [
                'label' => __( 'Title link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

             
        $this->add_control(
            'inctboxs',
            [
                'label'     => __( 'Inctractor boxs', 'elementor' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'inct_title'   => __( 'Inctractor Title', 'elementor' ),
                    ],
                ]
            ]
        );


         $this->add_control(
            'click_btn_link',
            [
                'label' => __( 'Click button link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        
        $this->end_controls_section();


    }

    protected function render() {
        $settings           = $this->get_settings_for_display();

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';

        $shorttitle         = $settings['shorttitle'];
        $maintitle          = $settings['maintitle'];
        $subtitle           = $settings['subtitle'];
        $click_btn_link     = $settings['click_btn_link'];
        $blogimage1         = wp_get_attachment_image_url( $settings['blogimage1']['id'], 'large' );


    ?>
        
               
            
    <!-- News Section -->
    <section class="news-section">
        <div class="pattern-layer" style="background-image:url(<?php echo $dri_url;?>/images/background/pattern-11.png)"></div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">

            <?php if($shorttitle):?>
                <div class="title"><?php echo $shorttitle;?></div>
            <?php endif;?>

            <?php if($maintitle):?>
                <h2><?php echo $maintitle;?></h2>
            <?php endif;?>

            <?php if($subtitle):?>
                <div class="text"><?php echo $subtitle;?></div>
            <?php endif;?>

            </div>
            <div class="inner-container">
                <div class="icon-layer-one" style="background-image:url(<?php echo $dri_url;?>/images/icons/icon-1.png)"></div>
                <div class="icon-layer-two" style="background-image:url(<?php echo $dri_url;?>/images/icons/icon-2.png)"></div>
                <div class="icon-layer-three" style="background-image:url(<?php echo $dri_url;?>/images/icons/icon-2.png)"></div>
                <div class="row clearfix">
                
                    <!-- News Block -->
                <?php foreach (  $settings['inctboxs'] as $inctboxs ): ?>

                    <div class="news-block col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                    
                            <?php if($blogimage1): ?>
                                <div class="image">
                                    <a href="#"><img src="<?php echo $blogimage1;?>" alt="" /></a>
                                </div>
                            <?php endif; ?>

                            <div class="lower-content">
                                <div class="border-layer"></div>
                                <ul class="post-info">

                                <?php if($inctboxs['inct_title']): ?>
                                    <li><?php echo $inctboxs['inct_title']; ?></li>
                                 <?php endif; ?>

                                <?php if($inctboxs['date']): ?>
                                    <li><?php echo $inctboxs['date']; ?></li>
                                <?php endif; ?>


                                </ul>

                                <?php if($inctboxs['inct_descs']): ?>
                                    <h4><a href="#"><?php echo $inctboxs['inct_descs']; ?></a></h4>
                                <?php endif; ?>

                                <a href="<?php echo $inctboxs['readmore_link']; ?>" class="more">More <span class="fa fa-angle-double-right"></span></a>

                            </div>
                        </div>
                    </div>

                <?php endforeach;?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End News Section -->


    <?php

    }
}
endif;
Plugin::instance()->widgets_manager->register_widget_type( new Elementors_oEmbeds_NewsBoxx );

// ============= **Pre News Box end ==============//

