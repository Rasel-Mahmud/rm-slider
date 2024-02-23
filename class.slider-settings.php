<?php

if( ! class_exists( 'RM_Slider_Settings' ) ) {
    class RM_Slider_Settings {
        public static $options;
        public function __construct(){
            self::$options = get_option( 'rm_slider_settings' );
            add_action( 'admin_init', [$this, 'admin_init'] );
        }

        public function admin_init(){
            register_setting( 'rm_slider_settings_group', 'rm_slider_settings' );

            add_settings_section( 'rm_slider_main', 'How does it works?', null, 'rm_slide_page1');
            add_settings_field( 'rm_slider_shortcode', 'Shortcode', [$this, 'rm_slider_shortcode_callback'], 'rm_slide_page1', 'rm_slider_main');

            add_settings_section( 'rm_slider_second', 'Other plugin options', null, 'rm_slide_page2');
            add_settings_field( 'rm_slider_title', 'Title', [$this, 'rm_slider_title_callback'], 'rm_slide_page2', 'rm_slider_second');

            add_settings_field( 'rm_slider_buttet', 'Display bullet', [$this, 'rm_slider_bullet_callback'], 'rm_slide_page2', 'rm_slider_second');

            add_settings_field( 'rm_slider_style', 'Choice Style', [$this, 'rm_slider_style_callback'], 'rm_slide_page2', 'rm_slider_second');

        }

        public function rm_slider_shortcode_callback(){
            ?>
            <span>Use the shortcode [rm-slider] to display slider in post/page/widgets</span>
            <?php
        }

        public function rm_slider_title_callback(){
            ?>
            <input type="text" name="rm_slider_settings[rm_slider_title]" value="<?php echo isset(self::$options) ? self::$options['rm_slider_title'] : ''; ?>">
            <?php
        }
        
        public function rm_slider_bullet_callback(){
            ?>
            <input type="checkbox" name="rm_slider_settings[rm_slider_bullet]" value="1"
            <?php
                if( isset(self::$options['rm_slider_bullet']) ){
                    checked( "1", self::$options['rm_slider_bullet'], true );
                }
            ?>>
            <?php
        }

        public function rm_slider_style_callback(){
            ?>
            <select name="rm_slider_settings[rm_slider_style]">
                <option value="style-1"
                    <?php echo isset(self::$options['rm_slider_style']) ? selected('style-1', self::$options['rm_slider_style'], true) : ''; ?>
                > Style 1 </option>

                <option value="style-2"
                    <?php echo isset(self::$options['rm_slider_style']) ? selected('style-2', self::$options['rm_slider_style'], true) : ''; ?>
                > Style 2 </option>
            </select>
            <?php
        }
    }
}

// new RM_Slider_Settings();
// echo "<pre>";
// var_dump(RM_Slider_Settings::$options);
// echo "</pre>";
// die();