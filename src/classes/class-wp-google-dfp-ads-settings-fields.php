<?php

class WP_Google_DFP_Ads_Settings_Fields {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Settings_Fields
     */
    protected static $instance = null;

    /**
     * Class id.
     *
     * @var string
     */
    protected $id = 'wp-google-dfp-ads-head-settings-fields';

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
     * @return WP_Google_DFP_Ads_Settings_Fields Instance of the class.
     */
    public static function get_instance() {

        if ( null == self::$instance ) {

            self::$instance = new self;

        }

        return self::$instance;

    }

}
