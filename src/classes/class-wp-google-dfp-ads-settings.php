<?php

class WP_Google_DFP_Ads_Settings {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Settings
     */
    protected static $instance = null;

    protected $section_fields_id = 'wp-google-dfp-ads-head-settings-section-fields';
    protected $page_id = 'wp-google-dfp-ads-settings';

    /* Public
    ---------------------------------------------------------------------------------- */

    /**
     * Gets instance of class.
     *
     * @return WP_Google_DFP_Ads_Settings Instance of the class.
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

        add_action( 'admin_menu', array( $this, '__initialize' ) );

    }

    /* Private
    ---------------------------------------------------------------------------------- */

    /**
     * Initializes view.
     */
    public function __initialize() {

        $menu_title = __( 'Google DFP Ads', WP_Google_DFP_Ads::get_instance()->get_slug() );

        add_options_page(
            $menu_title,
            $menu_title,
            'manage_options',
            $this->page_id,
            array( $this, '__render' )
        );

    }

    /**
     * Renders view.
     */
    public function __render() {

        echo '<h2>Google DFP Ads Settings</h2>';

        echo '<form method="post" action="options.php">';

            do_settings_sections( $this->page_id );

            settings_fields( $this->section_fields_id );

            submit_button();

        echo '</form>';

    }

    public function get_page_id() {

        return $this->page_id;

    }

    public function get_section_fields_id() {

        return $this->section_fields_id;

    }

}
