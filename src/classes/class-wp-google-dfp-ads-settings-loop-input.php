<?php

class WP_Google_DFP_Ads_Settings_Loop_Input {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Settings_Loop_Input
     */
    protected static $instance = null;

    /**
     * Class id.
     *
     * @var string
     */
    protected $id = 'wp-google-dfp-ads-loop-input';

    /* Public
    ---------------------------------------------------------------------------------- */

    /**
     * Gets class id
     *
     * @return string Class id.
     */
    public function get_id() {

        return $this->id;

    }

    /**
     * Gets instance of class.
     *
     * @return WP_Google_DFP_Ads_Settings_Loop_Input Instance of the class.
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

        add_settings_field(
            $this->id,
            __( 'Script Block', WP_Google_DFP_Ads::get_instance()->get_slug() ),
            array( $this, '__render' ),
            WP_Google_DFP_Ads_Settings::get_instance()->get_id(),
            WP_Google_DFP_Ads_Settings_Loop_Section::get_instance()->get_id()
        );

        register_setting(
            WP_Google_DFP_Ads_Settings_Fields::get_instance()->get_id(),
            $this->id
        );

    }

    /**
     * Renders view.
     */
    public function __render() {

        $value = get_option( $this->id );

        echo '<p>';
            echo '<textarea id="' . $this->id . '" name="' . $this->id . '" class="control" rows="20"">';
                echo $value;
            echo '</textarea>';
        echo '</p>';

    }

}
