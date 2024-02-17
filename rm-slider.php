<?php

/*
* Plugin Name:       RM Slider
* Plugin URI:        https://rashel.pro/plugins/rm-slider/
* Description:       Handle the basics with this plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Mahamud Hasan Rashel
* Author URI:        https://rashel.pro/author
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://rashel.pro/rm-slider/
* Text Domain:       rm-slider
* Domain Path:       /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main Plugin Class
 */
if ( ! class_exists( 'RM_Slider' ) ) {
    class RM_Slider {
        public function __construct(){
            $this->define_constant();
        }

        public function define_constant(){
            define( 'RM_plugin_path', plugin_dir_path( __FILE__ ) );
            define( 'RM_plugin_url', plugin_dir_url( __FILE__ ) );
            define( 'RM_plugin_version', '1.0.0' );
        }
    }
}

if( class_exists( 'RM_Slider' ) ) {
    $init = new RM_Slider();
}