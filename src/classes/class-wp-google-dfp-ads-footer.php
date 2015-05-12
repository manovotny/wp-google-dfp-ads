<?php

class WP_Google_DFP_Ads_Footer {

    /* Properties
    ---------------------------------------------------------------------------------- */

    /**
     * Instance of the class.
     *
     * @var WP_Google_DFP_Ads_Footer
     */
    protected static $instance = null;

    /* Public
    ---------------------------------------------------------------------------------- */

    /**
     * Gets instance of class.
     *
     * @return WP_Google_DFP_Ads_Footer Instance of the class.
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

        add_action( 'wp_footer', array( $this, '__render' ) );

    }

    /* Private
    ---------------------------------------------------------------------------------- */

    /**
     * Renders view.
     */
    public function __render() {

        $script = get_option( WP_Google_DFP_Ads_Settings_Footer_Input::get_instance()->get_id() );

        if ( empty( $script ) ) {

            return;

        }

        $comment = __( 'WP Google DFP Ads: Footer', WP_Google_DFP_Ads::get_instance()->get_slug() );

        echo '<!-- ' . $comment . ' -->' . PHP_EOL;
        echo $script . PHP_EOL;

    }

}
