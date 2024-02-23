<?php
$link_text = get_post_meta( get_the_ID(), 'rm_slider_link_text', true );
$link_url = get_post_meta( get_the_ID(), 'rm_slider_link_url', true );

?>
<table class="form-table rm-slider-meta-box">
<input type="hidden" name="_rm_slider_nonce" value="<?php echo wp_create_nonce( '_rm_slider_nonce' ); ?>">
    <tr>
        <th>
            <label for="rm_slider_link_text">Link Text</label>
        </th>
        <td>
            <input
                type="text"
                class="regular-text link-text"
                name="rm_slider_link_text"
                id="rm-slider-link-text"
                value="<?php echo $link_text ? esc_html( $link_text ) : ''; ?>"
                required
            >
        </td>
    </tr>
    <tr>
        <th>
            <label for="rm_slider_link_url">Link URL</label>
        </th>
        <td>
            <input
                type="text"
                class="regular-text link-text"
                name="rm_slider_link_url"
                id="rm-slider-link-url"
                value="<?php echo $link_url ? esc_url( $link_url ) : '' ?>"
                required
            >
        </td>
    </tr>
</table>