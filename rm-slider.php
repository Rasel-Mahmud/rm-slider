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

            // Admin menu
            add_action( 'admin_menu', [$this, 'add_menu'] );

            include_once( RM_plugin_path . 'post-types/class.rm-slider-post-type.php');
            new RM_Slider_Post_Type();

            include_once( RM_plugin_path . 'class.slider-settings.php' );
            new RM_Slider_Settings();

            include_once( RM_plugin_path . 'shortcode/class.rm-slider-shortcode.php' );
            new RM_Slider_Shortcode();

            add_action( 'wp_enqueue_scripts', [$this, 'register_scripts'], 999 );
        }

        public function define_constant(){
            define( 'RM_plugin_path', plugin_dir_path( __FILE__ ) );
            define( 'RM_plugin_url', plugin_dir_url( __FILE__ ) );
            define( 'RM_plugin_version', '1.0.0' );
        }

        public static function active(){
            update_option( 'rewrite_rules', '');
        }
        public static function deactive(){
            flush_rewrite_rules();
            unregister_post_type( 'rm_slider' );
        }
        public static function uninstall(){

        }

        /**
         * Add Admin Menu
         */
        public function add_menu(){
            add_submenu_page(
                "options-general.php",
                "RM Slider",
                "RM Slider",
                "manage_options",
                "rm-slider",
                [$this, 'rm_slider_menu'],
            );
        }

        /**
         * Admin Menu Content
         */
        public function rm_slider_menu(){
            if( ! current_user_can( 'manage_options' ) ){
                return;
            }
            include RM_plugin_path . 'views/slider-options.php';
        }

        public function register_scripts(){
            wp_register_script( 'rm-slider-mian-jq', RM_plugin_url . 'vendor/flexslider/jquery.flexslider.js', ['jquery'], RM_plugin_version, true );
            wp_register_script( 'rm-slider-option-jq', RM_plugin_url . 'vendor/flexslider/flexslider.js', ['jquery'], RM_plugin_version, true );
            wp_register_style( 'rm-slider-style', RM_plugin_url . 'vendor/flexslider/flexslider.css', [],RM_plugin_version, 'all');
        }
    }
}

if( class_exists( 'RM_Slider' ) ) {
    register_activation_hook( __FILE__, ['RM_Slider', 'active'] );
    register_deactivation_hook( __FILE__, ['RM_Slider', 'deactive'] );
    register_uninstall_hook( __FILE__, ['RM_Slider', 'uninstall'] );
    $init = new RM_Slider();
}