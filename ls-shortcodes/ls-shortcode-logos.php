<?php
/**
 * Shortcode to display logos
 * Usage: [ls_logos]
 */
function ls_shortcode_logo() {

    ob_start();

    // Define query arguments
    $args = array(
        'post_type' => 'logos',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    // Run the query
    $query = new WP_Query( $args );

    // Check if any logos posts exist
    if ( $query->have_posts() ) {

        // Check how many posts are returned
        $count = $query->post_count;

        // Slider will infinite scroll if more than 3 logos
        $slider_atts = '';
        if ( $count > 3 ) {
            $slider_atts = '[ux_slider slide_width="33%" slide_align="left" arrows="false" bullets="false" timer="4000" class="reviews-slider"]';
        } else {
            $slider_atts = '[ux_slider slide_width="33%" slide_align="left" infinitive="false" arrows="false" bullets="false" timer="4000" class="reviews-slider"]';
        }

        $shortcodes = '';
        $shortcodes .= $slider_atts;

        // Start the loop
        while ( $query->have_posts() ) {
            $query->the_post();

            // Grab ACF Fields
            $ls_logo_image = get_field( 'ls_logo_image' );

            if ( $ls_logo_image ) {
                $shortcodes .= '[ux_image id="' . $ls_logo_image . '" height="80px"]';
            }

        }

        // Close the slider
        $shortcodes .= '[/ux_slider]';

        wp_reset_postdata();

        echo do_shortcode( $shortcodes );
    }

    return ob_get_clean();

}
add_shortcode( 'ls_logos', 'ls_shortcode_logo' );
