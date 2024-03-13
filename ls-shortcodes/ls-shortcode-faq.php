<?php
/**
 * Shortcode to display FAQs
 * 
 * TODO: Longer description of the shortcode
 */
function ls_shortcode_faq() {

    ob_start();

    // Define query arguments
    $args = array(
        'post_type' => 'faqs',
        'posts_per_page' => -1,
    );

    // Run the query
    $query = new WP_Query($args);

    // Check if any faqs posts exist
    if ($query->have_posts()) {

        $shortcodes = '[accordion]';
        
        while ($query->have_posts()) {
            $query->the_post();

            // Grab ACF Fields
            $ls_faq_question = get_field('question');
            $ls_faq_answer = get_field('answer');

            if ( $ls_faq_answer && $ls_faq_question ) {
                $shortcodes .= '[accordion-item title="' . $ls_faq_question . '"]';
                $shortcodes .= '<p>' . $ls_faq_answer . '</p>';
                $shortcodes .= '[/accordion-item]';
            }
        }

        $shortcodes .= '[/accordion]';
        wp_reset_postdata();
        echo do_shortcode($shortcodes);
    }

    return ob_get_clean();

}
add_shortcode( 'ls_faqs', 'ls_shortcode_faq' );
