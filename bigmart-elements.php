<?php

/**
 * Plugin Name: Bigmart Elements
 * Description: Elementor blocks for Ecommerce Websites
 * Plugin URI: https://wpcirqle.com/plugins/bigmart-elements/
 * Version: 1.0.3
 * Author: wpcirqle
 * Author URI: https://wpcirqle.com/
 * Text Domain: bigmart-elements
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Main Elementor Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.1
 */
final class Bigmart_Elements {

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.1
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.1
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '5.0';

    /**
     * Instance
     *
     * @since 1.0.1
     *
     * @access private
     * @static
     *
     * @var Bigmart_Elements The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.1
     *
     * @access public
     * @static
     *
     * @return Bigmart_Elements An instance of the class.
     */
    public static function instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function __construct() {
        if (!function_exists('get_plugin_data')) {
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        /** Necessary Constants */
        $plugin_data = get_plugin_data(__FILE__);
        $plugin_version = $plugin_data['Version'];
        define("BMRT_VERSION", $plugin_version);

        /** Plugin URI */
        define("BMRT_PLUGIN_URI", plugin_dir_url(__FILE__));
        define("BMRT_ASSETS_URI", BMRT_PLUGIN_URI . 'assets/');
        define("BMRT_VENDOR_URI", BMRT_PLUGIN_URI . 'assets/vendor/');

        add_action('plugins_loaded', [$this, 'init']);
        add_action('init', [$this, 'i18n']);
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function i18n() {
        load_plugin_textdomain('bigmart-elements');

        /** Include Helper File */
        require_once( __DIR__ . '/inc/helper.php' );
    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function init() {

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

        add_action('elementor/frontend/before_enqueue_styles', array($this, 'enqueue_frontend_styles'));

        // Add Elementor Styles & Scripts
        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'add_elementor_styles_and_scripts']);

        // Add Elementor Categories
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);

        //Editor Scripts
        add_action('elementor/editor/before_enqueue_scripts', [$this, 'add_elementor_editor_scripts']);

        //Editor Style
        add_action('elementor/editor/after_enqueue_styles', [$this, 'add_elementor_editor_styles']);

        // Add Plugin actions
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/controls/controls_registered', [$this, 'init_controls']);

        if ('yes' !== get_option('elementor_disable_color_schemes')) {
            update_option('elementor_disable_color_schemes', 'yes');
        }

        if ('yes' !== get_option('elementor_disable_typography_schemes')) {
            update_option('elementor_disable_typography_schemes', 'yes');
        }
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin() {

        if (isset($_GET['activate']))
            unset($_GET['activate']);

        $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor */
                esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'bigmart-elements'), '<strong>' . esc_html__('Bigmart Elements', 'bigmart-elements') . '</strong>', '<strong>' . esc_html__('Elementor', 'bigmart-elements') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {

        if (isset($_GET['activate']))
            unset($_GET['activate']);

        $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'bigmart-elements'), '<strong>' . esc_html__('Bigmart Elements', 'bigmart-elements') . '</strong>', '<strong>' . esc_html__('Elementor', 'bigmart-elements') . '</strong>', self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function admin_notice_minimum_php_version() {

        if (isset($_GET['activate']))
            unset($_GET['activate']);

        $message = sprintf(
                /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'bigmart-elements'), '<strong>' . esc_html__('Bigmart Elements', 'bigmart-elements') . '</strong>', '<strong>' . esc_html__('PHP', 'bigmart-elements') . '</strong>', self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function add_elementor_editor_scripts() {
        wp_enqueue_script('bigmart-elements-editor', BMRT_ASSETS_URI . 'js/editor.js', array('jquery'), BMRT_VERSION, true);
        wp_localize_script('bigmart-elements-editor', 'bigmart_elements_obj', array('is_elementor_pro_installed' => $this->is_elementor_pro_installed()));
    }

    public function add_elementor_editor_styles() {
        wp_enqueue_style('bigmart-elements-editor-style', BMRT_ASSETS_URI . 'css/editor-styles.css', array(), BMRT_VERSION);
    }

    public function enqueue_frontend_styles() {
        /** Custom Widget Styles */
        wp_enqueue_style('bigmart-elements-style', BMRT_ASSETS_URI . 'css/bm-custom-styles.css', array(), BMRT_VERSION);

        /** Vendor Scripts & Styles */
        /** Elegant Icons */
        wp_enqueue_style('elegant-icons', BMRT_VENDOR_URI . 'elegant-icons/style.css', array(), BMRT_VERSION);

        /** Owl Carousel */
        wp_enqueue_style('owl-carousel', BMRT_VENDOR_URI . 'owl-carousel/css/owl.carousel.min.css', array(), BMRT_VERSION);
    }

    public function add_elementor_styles_and_scripts() {

        wp_enqueue_script('owl-carousel', BMRT_VENDOR_URI . 'owl-carousel/js/owl.carousel.min.js', array('jquery'), BMRT_VERSION);

        /** jQuery Countdown */
        wp_enqueue_script('jquery-countdown', BMRT_VENDOR_URI . 'jquery-countdown/jquery.countdown.min.js', array('jquery'), BMRT_VERSION);

        /** Custom Widget Scripts */
        wp_enqueue_script('bigmart-elements-scripts', BMRT_ASSETS_URI . 'js/bm-custom-scripts.js', array('jquery'), BMRT_VERSION);
    }

    /**
     * Add Elementor Categories
     */
    public function add_elementor_widget_categories($elements_manager) {
        $elements_manager->add_category(
                'bigmart-elements', array(
            'title' => __('Bigmart Elements', 'bigmart-elements'),
            'icon' => 'fa fa-plug',
                )
        );
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function register_widgets( $widgets_manager ) {
        // Include Widget files
        require_once( __DIR__ . '/widgets/slider.php' ); // Slider
        require_once( __DIR__ . '/widgets/blog-grid1.php' ); // Blog Grid 1
        require_once( __DIR__ . '/widgets/blog-grid2.php' ); // Blog Grid 2
        require_once( __DIR__ . '/widgets/testimonial-slider.php' ); // Testimonial Slider
        require_once( __DIR__ . '/widgets/cta.php' ); // CTA
        require_once( __DIR__ . '/widgets/countdown.php' ); // Countdown
        require_once( __DIR__ . '/widgets/vertical-menu.php' ); // Menu

        if (class_exists('woocommerce')) {
            require_once( __DIR__ . '/widgets/product-category-tab.php' ); // Product Tabs Grid
            require_once( __DIR__ . '/widgets/product-tabs-grid.php' ); // Product Tabs Grid
            require_once( __DIR__ . '/widgets/product-category-grid.php' ); // Product Tabs Grid
            require_once( __DIR__ . '/widgets/product-list.php' ); // Product List
            require_once( __DIR__ . '/widgets/product-category-list.php' ); // Product List
            require_once( __DIR__ . '/widgets/product-category-block1.php' ); // Product Category Block 1
            require_once( __DIR__ . '/widgets/product-category-block2.php' ); // Product Category Block 2
        }

        // Register widget
        if (class_exists('woocommerce')) {
            $widgets_manager->register(new \Bigmart_Product_Category_Tab_Widget()); // Product Category Tabs Grid
            $widgets_manager->register(new \Bigmart_Product_Category_Grid_Widget()); // Product Tabs Grid
            $widgets_manager->register(new \Bigmart_Product_Category_List_Widget()); // Product List
            $widgets_manager->register(new \Bigmart_Product_Tabs_Grid_Widget()); // Product Tabs Grid
            $widgets_manager->register(new \Bigmart_Product_List_Widget()); // Product List
            $widgets_manager->register(new \Bigmart_Product_Category_Block1_Widget()); // Procut Category Block 1
            $widgets_manager->register(new \Bigmart_Product_Category_Block2_Widget()); // Procut Category Block 2
        }

        $widgets_manager->register(new \Bigmart_Slider_Widget()); // Slider
        $widgets_manager->register(new \Bigmart_Blog_Grid1_Widget()); // Blog Grid 1
        $widgets_manager->register(new \Bigmart_Blog_Grid2_Widget()); // Blog Grid 2
        $widgets_manager->register(new \Bigmart_Testimonial_Slider_Widget()); // Testimonial Slider
        $widgets_manager->register(new \Bigmart_Cta_Widget()); // Call To Action
        $widgets_manager->register(new \Bigmart_Countdown_Widget()); // Countdown
        $widgets_manager->register(new \Bigmart_Vertical_Menu_Widget()); // Vertical Menu
    }

    /**
     * Init Controls
     *
     * Include controls files and register them
     *
     * @since 1.0.1
     *
     * @access public
     */
    public function init_controls() {

        // Include Control files
        require_once( __DIR__ . '/inc/controls/groups/group-control-pquery.php' );
        require_once( __DIR__ . '/inc/controls/groups/group-control-header.php' );
        require_once( __DIR__ . '/inc/controls/groups/group-control-extra.php' );
        require_once( __DIR__ . '/inc/controls/groups/group-control-header-style.php' );
        require_once( __DIR__ . '/inc/controls/class-selectize-control.php' );

        // Register control
        \Elementor\Plugin::instance()->controls_manager->add_group_control('bigmart-header', new Group_Control_Header());
        \Elementor\Plugin::instance()->controls_manager->add_group_control('bigmart-header-style', new Group_Control_Header_Style());
        \Elementor\Plugin::instance()->controls_manager->add_group_control('bigmart-pquery', new Group_Control_Produt_Query());
        \Elementor\Plugin::instance()->controls_manager->add_group_control('bigmart-extra', new Group_Control_Extra());
        \Elementor\Plugin::instance()->controls_manager->register_control('bigmart-selectize', new Selectize_Control()); // Image Selector
    }

    /**
     * Check if theme has elementor Pro installed
     *
     * @return boolean
     */
    public function is_elementor_pro_installed() {
        return function_exists('elementor_pro_load_plugin') ? 'yes' : 'no';
    }

}

Bigmart_Elements::instance();
