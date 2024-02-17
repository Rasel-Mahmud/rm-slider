<?php

if( ! class_exists('RM_Slider_Post_Type') ){
    class RM_Slider_Post_Type {
        public function __construct(){
            add_action( 'init', [$this, 'create_post_type'] );
        }

        public function create_post_type(){
            register_post_type('rm_slider', [
                'labels' => [
                    'name'          => __('Sliders', 'rm-slider'),
                    'singular_name' => __('Slider', 'rm-slider'),
                ],
                'supports' => [
                    'title',
                    'editor',
                    'thumbnail'
                ],
                'public'      => true,
                'has_archive' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'show_in_admin_bar' => true,
                'show_in_nav_menu' => true,
                'can_export' => true,
                'has_archive' => false,
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-images-alt'
            ]);
        }
    }
}