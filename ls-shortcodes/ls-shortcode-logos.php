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
    $query = new WP_Query($args);

    // Check if any logos posts exist
    if ($query->have_posts()) {

        // TODO: Lay UX Builder shortcode groundwork

        // Start the loop
        while ($query->have_posts()) {
            $query->the_post();

            // Grab ACF Fields
            $ls_logo_image = get_field('ls_logo_image');
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)

            if ( $ls_logo_image ) {
                echo wp_get_attachment_image( $ls_logo_image, $size );
            }
            // Display the title
            echo '<h2>' . get_the_title() . '</h2>';
        }
        wp_reset_postdata();
    }

    return ob_get_clean();

}
add_shortcode( 'ls_logos', 'ls_shortcode_logo' );