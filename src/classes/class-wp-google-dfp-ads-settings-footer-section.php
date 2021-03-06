<?php

class WP_Google_DFP_Ads_Settings_Footer_Section {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Settings_Footer_Section
     */
    protected static $instance = null;

    /**
     * Class id.
     *
     * @var string
     */
    protected $id = 'wp-google-dfp-ads-settings-footer-section';

    /* Public
    ---------------------------------------------------------------------------------- */

    /**
     * Gets class id.
     *
     * @return string Class id.
     */
    public function get_id() {

        return $this->id;

    }

    /**
     * Gets instance of class.
     *
     * @return WP_Google_DFP_Ads_Settings_Footer_Section Instance of the class.
     */
    public static function get_instance() {

        if ( null == self::$instance ) {

            self::$instance = new self;

        }

        return self::$instance;

    }

    /* Constructor
    ---------------------------------------------------------------------------------- */

    /**
     * Initialize class.
     */
    public function __construct() {

        add_action( 'admin_init', array( $this, '__initialize' ) );

    }

    /* Private
    ---------------------------------------------------------------------------------- */

    /**
     * Initializes settings.
     */
    public function __initialize() {

        add_settings_section(
            $this->id,
            __( 'Footer Ads', WP_Google_DFP_Ads::get_instance()->get_slug() ),
            array( $this, '__render' ),
            WP_Google_DFP_Ads_Settings::get_instance()->get_id()
        );

    }

    /**
     * Renders view.
     */
    public function __render() {

        $description = __( 'Enter the Google DFP Ads that should appear just above the closing <code>&lt;/body&gt;</code> tag, otherwise known as the footer.', WP_Google_DFP_Ads::get_instance()->get_slug() );

        echo '<p>' . $description . '</p>';

    }

}
