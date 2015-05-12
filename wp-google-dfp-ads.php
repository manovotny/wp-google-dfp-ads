<?php
/**
 * Plugin Name: WP Google DFP Ads
 * Plugin URI: https://github.com/manovotny/wp-google-dfp-ads
 * Description: Adds Google DFP Ads to WordPress.
 * Version: 1.0.0
 * Author: Michael Novotny
 * Author URI: http://manovotny.com
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /lang
 * Text Domain: wp-google-dfp-ads
 * GitHub Plugin URI: https://github.com/manovotny/wp-google-dfp-ads
 */

/* Composer
---------------------------------------------------------------------------------- */

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {

    require_once __DIR__ . '/vendor/autoload.php';

}

/* Initialization
---------------------------------------------------------------------------------- */

require_once __DIR__ . '/src/initialize.php';