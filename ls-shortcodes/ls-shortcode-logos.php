<?php
/**
 * Shortcode to display logos
 * 
 * TODO: Longer description of the shortcode
 */
function ls_shortcode_logo() {

    ob_start();

    // Define query arguments
    $args = array(
        'post_type' => 'logos',
        'posts_per_page' => -1,
    );

    // Run the query
    $query = new WP_Query( $args );

    // Check if any logos posts exist
    if ( $query->have_posts() ) {

        $shortcodes = '';
        $shortcodes .= '[ux_slider slide_width="33.3%" nav_pos="outside" arrows="false" bullets="false" timer="4000" class="reviews-slider"]'; 

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