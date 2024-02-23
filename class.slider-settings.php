<?php

if( ! class_exists( 'RM_Slider_Settings' ) ) {
    class RM_Slider_Settings {
        public static $options;
        public function __construct(){
            self::$options = get_option( 'rm_slider_settings' );
            add_action( 'admin_init', [$this, 'admin_init'] );
        }

        public function admin_init(){
            register_setting( 'rm_slider_settings_group', 'rm_slider_settings', [$this, 'rm_slider_validation']);

            add_settings_section( 'rm_slider_main', 'How does it works?', null, 'rm_slide_page1');
            add_settings_field( 'rm_slider_shortcode', 'Shortcode', [$this, 'rm_slider_shortcode_callback'], 'rm_slide_page1', 'rm_slider_main');

            add_settings_section( 'rm_slider_second', 'Other plugin options', null, 'rm_slide_page2');
            add_settings_field( 'rm_slider_title', 'Title', [$this, 'rm_slider_title_callback'], 'rm_slide_page2', 'rm_slider_second', ['label_for' => 'rm_slider_title']);

            add_settings_field( 'rm_slider_buttet', 'Display bullet', [$this, 'rm_slider_bullet_callback'], 'rm_slide_page2', 'rm_slider_second', ['label_for' => 'rm_slider_bullet']);

            add_settings_field( 'rm_slider_style', 'Slider Style', [$this, 'rm_slider_style_callback'], 'rm_slide_page2', 'rm_slider_second', ['item' => ['style-1', 'style-2'], 'label_for' => 'rm_slider_style']);

        }

        public function rm_slider_shortcode_callback(){
            ?>
            <span>Use the shortcode [rm-slider] to display slider in post/page/widgets</span>
            <?php
        }

        public function rm_slider_title_callback(){
            ?>
            <input type="text" name="rm_slider_settings[rm_slider_title]" id="rm_slider_title" value="<?php echo isset(self::$options['rm_slider_title']) ? self::$options['rm_slider_title'] : ''; ?>">
            <?php
        }
        
        public function rm_slider_bullet_callback(){
            ?>
            <input type="checkbox" name="rm_slider_settings[rm_slider_bullet]" value="1" id="rm_slider_bullet"
            <?php
                if( isset(self::$options['rm_slider_bullet']) ){
                    checked( "1", self::$options['rm_slider_bullet'], true );
                }
            ?>>
            <label for="rm_slider_bullet">whether to display bullet or not</label>
            <?php
        }

        public function rm_slider_style_callback( $ags ){ ?>
            <select name="rm_slider_settings[rm_slider_style]" id="rm_slider_style">
            <?php foreach( $ags['item'] as $item) : ?>
                <option value="<?php echo $item; ?>"
                    <?php echo isset(self::$options['rm_slider_style']) ? selected($item, self::$options['rm_slider_style'], true) : ''; ?>
                > <?php echo $item; ?> </option>
                <?php endforeach; ?>
            </select>
            <?php
        }

        public function rm_slider_validation( $input ){
            $new_input = [];
            foreach($input as $key => $value){

                switch ($key) {
                    case 'rm_slider_title' :
                        $new_input[$key] = sanitize_text_field( $value );
                        break;
                    case 'rm_slider_bullet' :
                        $new_input[$key] = absint( $value );
                        break;
                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                        break;
                }

            }
            return $new_input;
        }
    }
}
