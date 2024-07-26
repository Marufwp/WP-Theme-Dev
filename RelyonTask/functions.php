<?php
    /**
     * Deactive demo mode of reduxframework plugin and will not display and addvertisement.
     * 
     * @author 	RT
     * @since 	0.1.0
     */
    if( ! function_exists( 'redux_disable_dev_mode_plugin' ) ) {

        function redux_disable_dev_mode_plugin( $redux ) {
            if ( $redux->args['opt_name'] != 'psolution_opt' ) {
                $redux->args['dev_mode']   = false;
            }
        }
        add_action( 'redux/construct', 'redux_disable_dev_mode_plugin' );
    }

    if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/lib/ReduxCore/framework.php' ) ) {

        require_once( dirname( __FILE__ ) . '/lib/ReduxCore/framework.php' );
    }
    // Add sample config to overwrite reduxcore/framework.php
    if ( !isset( $redux_opt ) && file_exists( dirname( __FILE__ ) . '/inc/theme-options.php' ) ) {

        require_once( dirname( __FILE__ ) . '/inc/theme-options.php' );
    }

    require get_template_directory().'/inc/breadcums.php';
    require get_template_directory().'/inc/custom-post-type.php';
    require get_template_directory().'/lib/cmb2/init.php';
    require get_template_directory().'/lib/cmb2/custom-field.php';
    require get_template_directory().'/inc/enqueue.php';
    require get_template_directory().'/inc/post-duplicate.php';
    require get_template_directory().'/inc/post-view-count.php';
    require get_template_directory().'/inc/shortcodes.php';
    require get_template_directory().'/inc/pagination.php';
    require get_template_directory().'/inc/theme-options.php';
    require get_template_directory().'/inc/theme-setup.php';
    require get_template_directory().'/inc/theme-support.php';
    require get_template_directory().'/inc/walker.php';
    require get_template_directory().'/inc/tab-categories.php';


        /**
    * ---------------------------------
    * 9.0 - Custom Nav Menu 
    * ---------------------------------
    */

    function register_my_menus() {
      register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu' ),
          'extra-menu' => __( 'Footer Menu' )
         )
           );
     }
     add_action( 'init', 'register_my_menus' );



    function rt_menu(){

        wp_nav_menu(
            array(
                'items_wrap'        => '<ul id="%1$s" class="%2$s  navigation onepage clearfix">%3$s</ul>',
                'depth'             => 0,
                'theme_location'    => 'primary',
                'container'         => true,
                'menu_id'           => 'menu-main-menu',
                'menu_class'        => 'navbar-collapse nav-outer main-menu navbar-expand-lg collapse clearfix',
                'fallback_cb'       => 'Walker_Nav_Primary::fallback',
                
            )

           /* array(
                'items_wrap'        => '<ul id="%1$s" class="%2$s  navigation onepage clearfix">%3$s</ul>',
                'theme_location'    => 'header-menu',
                'container_class'   => 'navbar-collapse collapse clearfix',
                'fallback_cb'       => 'Walker_Nav_Primary::fallback',
                
            )*/
        );
   }

    function add_menuclass_li($ulclass) {
       return preg_replace('/<li /', '<li class="current dropdown dropdown"', $ulclass);
    }
    add_filter('wp_nav_menu','add_menuclass_li');

    function add_menuclass_a($ulclass) {
       return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
    }
    add_filter('wp_nav_menu','add_menuclass_a');

    // ReduxFreamwork Global Variable
    function rtReduxFreamworkGlobal(){
        global $redux_opt;
    }
    

    /**
     * Adds webp filetype to allowed mimes
     * 
     * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
     * 
     * @param array $mimes Mime types keyed by the file extension regex corresponding to
     *                     those types. 'swf' and 'exe' removed from full list. 'htm|html' also
     *                     removed depending on '$user' capabilities.
     *
     * @return array
     */
    add_filter( 'upload_mimes', 'wpse_mime_types_webp' );
    function wpse_mime_types_webp( $mimes ) {
        $mimes['webp'] = 'image/webp';

      return $mimes;
    }


   



//
class ElementorCustomElement{

    private static $instance = null;

    public static function get_instance()
    {
        if (!self::$instance)
            self::$instance = new self;
        return self::$instance;
    }

    public function init()
    {
        add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));
    }

    public function widgets_registered()
    {
 
      // We check if the Elementor plugin has been installed / activated.
        if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {
 
         // We look for any theme overrides for this custom Elementor element.
         // If no theme overrides are found we use the default one in this plugin.

            $widget_file = get_template_directory() . '/lib/ElementorElement/extension.php';
            $template_file = locate_template($widget_file);
            if (!$template_file || !is_readable($template_file)) {
                $template_file = get_template_directory() . '/lib/ElementorElement/extension.php';
            }
            if ($template_file && is_readable($template_file)) {
                require_once $template_file;
            }
        }
    }
}

ElementorCustomElement::get_instance()->init();
