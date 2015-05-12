<?php

class WP_Google_DFP_Ads_Enqueue_Admin_Styles {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Enqueue_Admin_Styles
     */
    protected static $instance = null;

    /* Constructor
    ---------------------------------------------------------------------------------- */

    /**
     * Initialize class.
     */
    public function __construct() {

        add_action( 'admin_enqueue_scripts', array( $this, '__enqueue_styles' ) );

    }

    /* Public
    ---------------------------------------------------------------------------------- */

    /**
     * Gets instance of class.
     *
     * @return WP_Google_DFP_Ads_Enqueue_Admin_Styles Instance of the class.
     */
    public static function get_instance() {

        if ( null == self::$instance ) {

            self::$instance = new self;

        }

        return self::$instance;

    }

    /* Private
    ---------------------------------------------------------------------------------- */

    /**
     * Enqueues styles.
     */
    public function __enqueue_styles() {

        $handle = WP_Google_DFP_Ads::get_instance()->get_slug() . '-admin-styles';
        $relative_path = __DIR__ . '/../admin/css/';
        $filename = 'wp-google-dfp-ads.min.css';
        $filename_debug = 'wp-google-dfp-ads.css';
        $dependencies = array();

        $options = new WP_Enqueue_Options(
            $handle,
            $relative_path,
            $filename,
            $filename_debug,
            $dependencies,
            WP_Google_DFP_Ads::get_instance()->get_version()
        );

        WP_Enqueue_Util::get_instance()->enqueue_style( $options );

    }

}
