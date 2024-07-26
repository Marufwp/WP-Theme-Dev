<?php 
    /*
        This is the template for the hedaer
        @package RT
    */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Global Variable -->
        <?php  global $redux_opt; ?>
        <title><?php bloginfo( 'name' ); wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <!-- Link to your favicon -->
        <link rel="shortcut icon" type="image/png" href="<?php echo $redux_opt['favicon']['url']; ?>">

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

        
        <?php 
            $custom_css = esc_attr( get_option( 'sunset_css' ) );
            if( !empty( $custom_css ) ):
                echo '<style>' . $custom_css . '</style>';
            endif;
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="js/respond.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

    <body data-spy="scroll" data-target="#fixedNavbar" <?php body_class('hidden-bar-wrapper');

        // Header options
        $site_logo          = $redux_opt['site-logo']['url'];
        $site_st_logo       = $redux_opt['site-sticky-logo']['url'];
        $site_mobile_logo   = $redux_opt['site-mobile-logo']['url'];
        $site_logo_text     = $redux_opt['logo-text'];


        // Banner options
        $banner_img_1       = $redux_opt['banner-img-1']['url'];
        $banner_img_2       = $redux_opt['banner-img-2']['url'];
        $banner_title       = $redux_opt['banner-title'];
        $banner_subtitle    = $redux_opt['banner-subtitle'];
        $banner_btn_text    = $redux_opt['banner-btn-text'];
        /*$banner_btn_link    = $redux_opt['banner-btn-link'];*/

        //preloader
         $preloader         = $redux_opt['preloader'];

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';
       
    ?>>


   
    <div data-spy="scroll" data-target="#fixedNavbar" <?php body_class('');

        // Header options
        $site_logo          = $redux_opt['site-logo']['url'];
        $site_st_logo       = $redux_opt['site-sticky-logo']['url'];
        $site_mobile_logo   = $redux_opt['site-mobile-logo']['url'];
        $site_logo_text     = $redux_opt['logo-text'];


        
        //preloader
         $preloader         = $redux_opt['preloader'];

        //
        $dri_url            = get_template_directory_uri();
        $dft_thum           = $dri_url.'/assets/images/backgrounds/background.jpg';
       
    ?>>

        <?php if($preloader == '1' ): ?>

        <!-- Preloader -->
        <div class="preloader"></div>


        <?php endif; ?>


     <!-- main header -->
        <header class="main-header">
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container-fluid clearfix">

                    <div class="header-inner d-flex align-items-center justify-content-between">
                        <div class="logo-outer d-lg-flex align-items-center">
                            <div class="logo"><a href="index-2.html"><img src="http://relyontask.local/wp-content/uploads/2023/09/RelyonTask-1.png" alt="Logo" title="Logo"></a></div>
                            <!-- <select name="select-languages" id="select-languages">
                                <option value="English">English</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Arabic">Arabic</option>
                            </select> -->
                        </div>

                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    
                                   <div class="mobile-logo p-15 m-auto">
                                       <a href="index-2.html">
                                            <img src="assets/images/logo.png" alt="Logo" title="Logo">
                                       </a>
                                   </div>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation onepage clearfix">
                                        <li><a href="#home">home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#projects">project</a></li>
                                        <li><a href="#pricing">pricing</a></li>
                                        <li><a href="#blog">blog</a></li>
                                        <li><a href="#contact">Contact</a></li>
                                        <li class="dropdown"><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="#services">Services</a></li>
                                                <li><a href="#about">about Us</a></li>
                                                <li><a href="#what-we-want">what we want</a></li>
                                                <li><a href="#why-choose-us">why choose us</a></li>
                                                <li><a href="#faqs">core features</a></li>
                                                <li><a href="#technologies">technologies</a></li>
                                                <li><a href="#feedbacks">clients feedback</a></li>
                                                
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        
                        <!-- Menu Button -->
                        <div class="menu-btn-sidebar onepage d-flex align-items-center">
                            <a href="#contact" class="theme-btn">Let’s Talk <i class="fas fa-long-arrow-alt-right"></i></a>
                            
                            <!-- menu sidbar -->
                            <div class="menu-sidebar">
                                <button>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>

     <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="#">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->


    