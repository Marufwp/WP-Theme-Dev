<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('pit_Theme_Config')) {

    class pit_Theme_Config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field   set with compiler=>true is changed.

         * */
        function compiler_action($options, $css, $changed_values) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r($changed_values); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => esc_html__('Section via hook', 'rt-solutions'),
                'desc' => esc_html__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'rt-solutions'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(esc_html__('Customize &#8220;%s&#8221;', 'rt-solutions'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'rt-solutions'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'rt-solutions'); ?>" />
                <?php endif; ?>

                <h4><?php echo esc_html($this->theme->display('Name')); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(esc_html__('By %s', 'rt-solutions'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(esc_html__('Version %s', 'rt-solutions'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . esc_html__('Tags', 'rt-solutions') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo esc_html($this->theme->display('Description')); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . esc_html__('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'rt-solutions') . '</p>', esc_html__('http://codex.wordpress.org/Child_Themes', 'rt-solutions'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
           

            // General
            $this->sections[] = array(
                'title'     => esc_html__('General', 'rt-solutions'),
                'desc'      => esc_html__('General theme options', 'rt-solutions'),
                'icon'      => 'el-icon-cog',
                'subsection'=> true,
                'fields'    => array(


                    //SITE LOGO
                    array(
                        'id'        =>  'site-logo',
                        'type'      =>  'media',
                        'title'     =>  esc_html__('Brand logo', 'rt-solutions'),
                        'compiler'  =>  'true',
                        'default'   =>  array('url' => get_template_directory_uri().'/assets/images/logo.png'),
                        'mode'      =>  false,
                        'url'       =>  true,
                        'desc'      =>  esc_html__('Upload site logo here.', 'rt-solutions'),
                    ),

                    //SITE STICKY LOGO
                    array(
                        'id'        =>  'site-sticky-logo',
                        'type'      =>  'media',
                        'title'     =>  esc_html__('Brand sticky logo', 'rt-solutions'),
                        'compiler'  =>  'true',
                        'default'   =>  array('url' => get_template_directory_uri().'/assets/images/logo.png'),
                        'mode'      =>  false,
                        'url'       =>  true,
                        'desc'      =>  esc_html__('Upload site sticky logo here.', 'rt-solutions'),
                    ),

                    //SITE MOBILE LOGO
                    array(
                        'id'        =>  'site-mobile-logo',
                        'type'      =>  'media',
                        'title'     =>  esc_html__('Brand mobile logo', 'rt-solutions'),
                        'compiler'  =>  'true',
                        'default'   =>  array('url' => get_template_directory_uri().'/assets/images/logo.png'),
                        'mode'      =>  false,
                        'url'       =>  true,
                        'desc'      =>  esc_html__('Upload site mobile logo here.', 'rt-solutions'),
                    ),


                     array(
                        'id'        => 'logo-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Type your Company Name', 'rt-solutions'),
                        'subtitle'  => esc_html__('your Brand Name', 'rt-solutions'),
                        'desc'      => esc_html__('Your Brand Here.', 'rt-solutions'),
                        'default'   => esc_html__('RelyonTask', 'rt-solutions'),
                    ),


                    //FAVICON
                    array(
                        'id'            =>  'favicon',
                        'type'          =>  'media',
                        'title'         =>  esc_html__('Website Favicon', 'pit'),
                        'subtitle'      =>  esc_html__('Upload your website favicon. <br>Recomended: 152px x 152px transparent .png file', 'pit'),
                        'url'           =>  true,
                        'mode'          =>  false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'default'       =>  array('url' => get_template_directory_uri().'/assets/images/logos/favicon.png'),
                        'hint'          =>  array(
                          'content' =>  'Please respect the recommended dimensions, in order to have a perfect-look branding.',
                        )
                    ),

                    // PreLoader Switch
                    array(
                        'id'        =>  'preloader',
                        'type'      =>  'switch',
                        'title'     =>  esc_html__('PreLoader On\Off ', 'presstechit'),
                        'compiler'  =>  'true',
                        'desc'      =>  esc_html__('If you Want add PreLoader on your website, it\'s on!', 'presstechit'),
                        'default'  => true,
                    ),
                    
                    // BackToTop Switch
                    array(
                        'id'        =>  'backtotop',
                        'type'      =>  'switch',
                        'title'     =>  esc_html__('Back To Top On\Off ', 'presstechit'),
                        'compiler'  =>  'true',
                        'desc'      =>  esc_html__('If you Want to add one click BackToTop on your website, it\'s on!', 'presstechit'),
                        'default'  => true,
                    ),
                    
                ),
            );


            // Banner Section
            $this->sections[] = array(
                'title'     => esc_html__('Banner Section', 'rt-solutions'),
                'desc'      => esc_html__('Banner Section theme options', 'rt-solutions'),
                'icon'      => 'el el-photo',
                'subsection'=> false,
                'fields'    => array(


                    //SITE LOGO
                    array(
                        'id'        =>  'banner-img-1',
                        'type'      =>  'media',
                        'title'     =>  esc_html__('Banner section image one', 'rt-solutions'),
                        'compiler'  =>  'true',
                        'default'   =>  array('url' => get_template_directory_uri().'/assets/images/banner.png'),
                        'mode'      =>  false,
                        'url'       =>  true,
                        'desc'      =>  esc_html__('Upload site banner image here.', 'rt-solutions'),
                    ),

                    array(
                        'id'        =>  'banner-img-2',
                        'type'      =>  'media',
                        'title'     =>  esc_html__('Banner section image two', 'rt-solutions'),
                        'compiler'  =>  'true',
                        'default'   =>  array('url' => get_template_directory_uri().'/assets/images/banner.png'),
                        'mode'      =>  false,
                        'url'       =>  true,
                        'desc'      =>  esc_html__('Upload site banner image here.', 'rt-solutions'),
                    ),


                    array(
                        'id'        => 'banner-title',
                        'type'      => 'text',
                        'title'     => esc_html__('Type your banner title', 'rt-solutions'),
                        'subtitle'  => esc_html__('Your banner title', 'rt-solutions'),
                        'desc'      => esc_html__('Your banner title.', 'rt-solutions'),
                        'default'   => esc_html__('RelyonTask', 'rt-solutions'),
                    ),

                    array(
                        'id'        => 'banner-subtitle',
                        'type'      => 'text',
                        'title'     => esc_html__('Type your banenr subtitle', 'rt-solutions'),
                        'subtitle'  => esc_html__('Your banner subtitle', 'rt-solutions'),
                        'desc'      => esc_html__('Your banner subtitle.', 'rt-solutions'),
                        'default'   => esc_html__('RelyonTask', 'rt-solutions'),
                    ),

                    array(
                        'id'        => 'banner-btn-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Type your banenr btn text', 'rt-solutions'),
                        'subtitle'  => esc_html__('Your banner btn text', 'rt-solutions'),
                        'desc'      => esc_html__('Your banner btn text.', 'rt-solutions'),
                        'default'   => esc_html__('button', 'rt-solutions'),
                    ),

                    array(
                        'id'        => 'banner-btn-link',
                        'type'      => 'text',
                        'title'     => 'Type your banenr btn link',
                        'url'       => 'https://github.com/marufhossain',
                    ),

                    
                    
                ),
            );


            //ACE EDITOR AREA
            $this->sections[] = array(
                'title'         => esc_html__('ACE Editor', 'rt-solutions'),
                'icon'          => 'el el-edit',
                'subsection'    => false,
                'fields'        => array(
                    array(
                        'id'       => 'custom-css',
                        'type'     => 'ace_editor',
                        'title'    => esc_html__('Custom CSS Code', 'rt-solutions'),
                        'subtitle' => esc_html__('Paste your CSS code here.', 'rt-solutions'),
                        'mode'     => 'css',
                        'theme'    => 'monokai', //chrome
                        'default'  => ""
                    ),
                    array(
                        'id'       => 'opt-ace-editor-js',
                        'type'     => 'ace_editor',
                        'title'    => esc_html__( 'JS Code', 'rt-solutions' ),
                        'subtitle' => esc_html__( 'Paste your JS code here.', 'rt-solutions' ),
                        'mode'     => 'javascript',
                        'theme'    => 'chrome',
                        'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                        'default'  => "jQuery(document).ready(function($){\n\n});"
                    ),
                ),
            );

    

            //FOOTER AREA
            $this->sections[] = array(
                'title'     => esc_html__('Footer Information', 'rt-solutions'),
                'desc'      => esc_html__('This option will show the HERO from the page', 'rt-solutions'),
                'icon'      => 'el el-hand-down',
                'fields'    => array(
                    
                
                    array(
                        'id'               => 'copyrighttext',
                        'type'             => 'editor',
                        'title'            => esc_html__('Copyright information', 'rt-solutions'),
                        'subtitle'         => esc_html__('HTML tags allowed: a, br, em, strong', 'rt-solutions'),
                        'default'          => 'portLab. All Rights Reserved.',
                        'args'             => array(
                            'teeny'             => true,
                            'textarea_rows'     => 5,
                            'media_buttons'     => false,
                        )
                    ),
                ),
            );

            
            //Footer About Colam 
            $this->sections[] = array(
                'title'     => esc_html__('About Colam', 'rt-solutions'),
                'desc'      => esc_html__('About Informations', 'rt-solutions'),
                'subsection'=> true,
                'icon'      => 'el el-share',
                'fields'    => array(
                    array(
                        'id'        =>  'logo',
                        'type'      =>  'media',
                        'title'     =>  esc_html__('Upload your footer logo', 'rt-solutions'),
                        'compiler'  =>  'true',
                        'default'   =>  array('url' => get_template_directory_uri().'/assets/images/logos/sandrakaspa.png'),
                        'mode'      =>  false,
                        'url'       =>  true,
                        'desc'      =>  esc_html__('Upload logo here.', 'rt-solutions'),
                    ),
                    array(
                        'id'               => 'about-content',
                        'type'             => 'editor',
                        'title'            => esc_html__('About content', 'rt-solutions'),
                        'subtitle'         => esc_html__('HTML tags allowed: a, br, em, strong', 'rt-solutions'),
                        'default'          => 'How do we increase your productivity and elevate global economy to new heights? portLab will be the main contributor as a portable Laboratory, that puts innovations of tomorrow into place and works as a prolific support system for new and established enterprises in the tech area. We pour our almost decade strong experience into each tech related...',
                        'args'             => array(
                            'teeny'             => true,
                            'textarea_rows'     => 5,
                            'media_buttons'     => false,
                        )
                    ),
                    array(
                        'id'        => 'facebook',
                        'type'      => 'text',
                        'title'     => esc_html__('Facebook Url', 'rt-solutions'),
                        'default'   => esc_html__('#', 'rt-solutions'),
                    ),
                    array(
                        'id'        => 'twitter',
                        'type'      => 'text',
                        'title'     => esc_html__('Twitter Url', 'rt-solutions'),
                        'default'   => esc_html__('#', 'rt-solutions'),
                    ),
                    array(
                        'id'        => 'instagram',
                        'type'      => 'text',
                        'title'     => esc_html__('Instagram Url', 'rt-solutions'),
                        'default'   => esc_html__('#', 'rt-solutions'),
                    ),
                    array(
                        'id'        => 'youtube',
                        'type'      => 'text',
                        'title'     => esc_html__('Youtube Url', 'rt-solutions'),
                        'default'   => esc_html__('#', 'rt-solutions'),
                    ),
                ),
            );


            //Footer Contact Colam
            $this->sections[] = array(
                'title'     => esc_html__('Contact Colam', 'rt-solutions'),
                'desc'      => esc_html__('Contact Informations', 'rt-solutions'),
                'subsection'=> true,
                'icon'      => 'el el-share',
                'fields'    => array(
                    array(
                        'id'        => 'c-title',
                        'type'      => 'text',
                        'title'     => esc_html__('Type your col title', 'rt-solutions'),
                        'subtitle'  => esc_html__('Enter your col content', 'rt-solutions'),
                        'default'   => esc_html__('Footer content', 'rt-solutions'),
                    ),

                    array(
                        'id'        => 'address',
                        'type'      => 'editor',
                        'title'     => esc_html__('My Address', 'rt-solutions'),
                        'subtitle'  => esc_html__('Enter My Address', 'rt-solutions'),
                        'desc'      => esc_html__('My Address here', 'rt-solutions'),
                        'default'   => '<b>Head office:</b> 89 Greenview Ave.<br> Temple Hills, MD 20748', 'rt-solutions',
                        'args'             => array(
                            'teeny'             => true,
                            'textarea_rows'     => 5,
                            'media_buttons'     => false,
                        )
                    ),


                    array(
                        'id'        => 'email',
                        'type'      => 'text',
                        'title'     => esc_html__('Email', 'rt-solutions'),
                        'subtitle'  => esc_html__('Your Email', 'rt-solutions'),
                        'desc'      => esc_html__('Your Email Here.', 'rt-solutions'),
                        'default'   => esc_html__('skaspar@bluewin.ch', 'rt-solutions'),
                    ),

                    array(
                        'id'        => 'phone',
                        'type'      => 'text',
                        'title'     => esc_html__('Phone Number', 'rt-solutions'),
                        'subtitle'  => esc_html__('Placed Your Contact Phone Number', 'rt-solutions'),
                        'desc'      => esc_html__('Phone Number Here.', 'rt-solutions'),
                        'default'   => esc_html__('<b>Phone:</b> (541) 754-3010', 'rt-solutions'),
                    ),
                    
                ),
            );
            
        
            
            $this->sections[] = array(
                'title'     => esc_html__('Import / Export', 'rt-solutions'),
                'desc'      => esc_html__('Import and Export your Theme settings from file, text or URL.', 'rt-solutions'),
                'icon'      => 'el-icon-refresh',
                'subsection' => false,
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );
            
            





            
            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . esc_html__('<strong>Theme URL:</strong> ', 'rt-solutions') . '<a target="_blank" href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . esc_html__('<strong>Author:</strong> ', 'rt-solutions') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . esc_html__('<strong>Version:</strong> ', 'rt-solutions') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . esc_html__('<strong>Tags:</strong> ', 'rt-solutions') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

           
            $this->sections[] = array(
                'icon'      => 'el-icon-info',
                'title'     => esc_html__('Theme Information', 'rt-solutions'),
                //'desc'      => esc_html__('<p class="description">This is the Description. Again HTML is allowed</p>', 'rt-solutions'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-raw-info',
                        'type'      => 'raw',
                        'content'   => $item_info,
                    )
                ),
            );
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => esc_html__('Theme Information 1', 'rt-solutions'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'rt-solutions')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => esc_html__('Theme Information 2', 'rt-solutions'),
                'content'   => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'rt-solutions')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'rt-solutions');
        }







        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'redux_opt',            // Global Variable This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'submenu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => esc_html__('Theme Options', 'rtsolutions'),
                'page_title'        => esc_html__('Theme Options', 'rtsolutions'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => true,                    // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/marufhossain',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/relyontask',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                //$this->args['intro_text'] = sprintf(esc_html__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'rt-solutions'), $v);
            } else {
                //$this->args['intro_text'] = esc_html__('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'rt-solutions');
            }

            // Add content after the form.
            //$this->args['footer_text'] = esc_html__('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'rt-solutions');
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new pit_Theme_Config();
}

/**
  Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;