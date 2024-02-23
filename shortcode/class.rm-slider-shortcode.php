<?php

if( ! class_exists('RM_Slider_Shortcode') ){
    class RM_Slider_Shortcode{
        public function __constract(){
            add_shortcode( 'rm-slider', [$this, 'add_shortcode'] );
        }

        public function add_shortcode( $atts = [], $content = null, $tag = '' ){
            $atts = array_change_key_case($atts, CASE_LOWER);

            extract(shortcode_atts( ['id' => '', 'orderby' => 'date'], $atts, $tag ));

            if( !empty($id) ){
                $id = array_map('absint', explode(',', $id));
            }
        }
    }
}