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

    /**
     * Class id.
     *
     * @var string
     */
    protected $id = 'wp-google-dfp-ads-settings';

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
            $this->id,
            array( $this, '__render' )
        );

    }

    /**
     * Renders view.
     */
    public function __render() {

        $title = __( 'Google DFP Ads Settings', WP_Google_DFP_Ads::get_instance()->get_slug() );

        echo '<h2>' . $title . '</h2>';

        echo '<form class="' . $this->id . '" method="post" action="options.php">';

            do_settings_sections( $this->id );

            settings_fields( WP_Google_DFP_Ads_Settings_Fields::get_instance()->get_id() );

            submit_button();

        echo '</form>';

    }

}
