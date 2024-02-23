<?php
function rm_slider_options(){
    $show_bullets = isset(RM_Slider_Settings::$options['rm_slider_bullet']) && RM_Slider_Settings::$options['rm_slider_bullet'] == 1 ? true : false;

    wp_enqueue_script( 'rm-slider-option-jq', RM_plugin_url . 'vendor/flexslider/flexslider.js', ['jquery'], RM_plugin_version, true );
    wp_localize_script( 'rm-slider-option-jq', 'SLIDER_OPTIONS', [
        'controlNav' =>  $show_bullets
    ] );
}