<?php

class WP_Google_DFP_Ads_Head_Settings {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Head_Settings
     */
    protected static $instance = null;



    protected $field_id = 'wp-google-dfp-ads-head-script-input';
    protected $section_id = 'wp-google-dfp-ads-head-settings-section';


    /* Public
    ---------------------------------------------------------------------------------- */

    /**
     * Gets instance of class.
     *
     * @return WP_Google_DFP_Ads_Head_Settings Instance of the class.
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

        $this->section();
        $this->field();
        $this->setting();

    }

    /**
     * Renders message.
     */
    public function __render_section_description() {

        echo '<p>Enter the Google DFP Ads that should appear in the <code>&lt;head&gt;</code> below.</p>';

    }

    /**
     * Renders field.
     */
    public function __field() {

        $value = get_option( $this->field_id );

        echo '<p>';
            echo '<textarea id="' . $this->field_id . '" name="' . $this->field_id . '" rows="20"">';
                echo $value;
            echo '</textarea>';
        echo '</p>';

    }

    public function section()
    {
        $section_title = __( 'Head Ads', WP_Google_DFP_Ads::get_instance()->get_slug() );
        $callback = array( $this, '__render_section_description' );

        add_settings_section(
            $this->section_id,
            $section_title,
            $callback,
            WP_Google_DFP_Ads_Settings::get_instance()->get_page_id()
        );
    }

    public function field()
    {
        $title = 'Script Block';
        $callback = array( $this, '__field' );

        add_settings_field(
            $this->field_id,
            $title,
            $callback,
            WP_Google_DFP_Ads_Settings::get_instance()->get_page_id(),
            $this->section_id
        );
    }

    public function setting()
    {
        register_setting(
            WP_Google_DFP_Ads_Settings::get_instance()->get_section_fields_id(),
            $this->field_id
        );
    }

    public function get_field_id() {

        return $this->field_id;

    }

}
