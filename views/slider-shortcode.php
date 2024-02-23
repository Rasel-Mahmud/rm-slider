<h3><?php echo esc_html( $content ); ?></h3>
<div class="flexslider <?php echo isset( RM_Slider_Settings::$options['rm_slider_style']) ? RM_Slider_Settings::$options['rm_slider_style'] : 'style-1'; ?>">
  <ul class="slides">
    <?php
    $args = [
        'post_type' => 'rm_slider',
        'post_status' => 'publish',
        'post__in' => $id,
        'orderby' => $orderby
    ];

    $rm_query = new WP_Query( $args );

    if( $rm_query->have_posts() ):
        while( $rm_query->have_posts() ) : $rm_query->the_post();
        $button_text = get_post_meta( get_the_ID(), 'rm_slider_link_text', true );
        $button_url = get_post_meta( get_the_ID(), 'rm_slider_link_url', true );
    ?>
    <li>
        <?php the_post_thumbnail( 'full', ['class' => 'img-fluid'] ); ?>
        <div class="wrap">
            <div class="slider-title">
                <h5>Title</h5>
            </div>
            <div class="slider-description">
                <div class="sub-title">Sub title</div>
                <a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
            </div>
        </div>
    </li>
    <?php endwhile; wp_reset_postdata(); endif; ?>
  </ul>
</div>