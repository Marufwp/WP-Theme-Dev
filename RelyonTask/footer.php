    <?php 
        /*
            This is the template for the footer
            @package RT
        */

    global $redux_opt;

    // About colom
    $logo                 = $redux_opt['logo'];
    $about_content        = $redux_opt['about-content'];
    $facebook             = $redux_opt['facebook'];
    $facebook             = $redux_opt['facebook'];
    $twitter              = $redux_opt['twitter'];
    $instagram            = $redux_opt['instagram'];
    $youtube              = $redux_opt['youtube'];

    // Contact colom
    $c_title              = $redux_opt['c-title'];
    $address              = $redux_opt['address'];
    $email                = $redux_opt['email'];
    $phone                = $redux_opt['phone'];

    $copyrighttext        = $redux_opt['copyrighttext'];
    $dri_url              = get_template_directory_uri();

    ?>


    <!--Site Footer One Start-->
        <footer class="site-footer">
            <div class="site-footer__top">
                <div class="site-footer-top-bg"
                    style="background-image: url(assets/images/backgrounds/site-footer-bg.jpg)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="index-2.html"><img src="assets/images/resources/footer-logo.png" alt=""></a>
                                </div>
                                <p class="footer-widget__about-text">Welcome to our website design agency. Lore ipsum
                                    simply text amet cing elit.</p>
                                <div class="footer-widget__about-social-list">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                    <a href="#" class="clr-dri"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__explore clearfix">
                                <h3 class="footer-widget__title">Explore</h3>
                                <ul class="footer-widget__explore-list list-unstyled">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="team.html">Meet our team</a></li>
                                    <li><a href="#">Case stories</a></li>
                                    <li><a href="blog.html">Latest news</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title">Contact</h3>
                                <p class="footer-widget__contact-text">66 Broklyn Street New York United States of
                                    America</p>
                                <div class="footer-widget__contact-info">
                                    <p>
                                        <a href="tel:92-666-888-0000" class="footer-widget__contact-phone">92 666 888
                                            0000</a>
                                        <a href="mailto:needhelp@company.com"
                                            class="footer-widget__contact-mail">needhelp@company.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__newsletter">
                                <h3 class="footer-widget__title">Sign up for newsletter</h3>
                                <form class="footer-widget__newsletter-form">
                                    <div class="footer-widget__newsletter-input-box">
                                        <input type="email" placeholder="Email Address" name="email">
                                        <button type="submit" class="footer-widget__newsletter-btn"><i
                                                class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                                <div class="footer-widget__newsletter-bottom">
                                    <div class="footer-widget__newsletter-bottom-icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="footer-widget__newsletter-bottom-text">
                                        <p>I agree to all terms and policies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer-bottom__inner">
                                <p class="site-footer-bottom__copy-right">© Copyright 2021 by <a
                                        href="#">Layerdrops.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer One End-->



    <?php wp_footer(); ?>
    
    </body>
</html>