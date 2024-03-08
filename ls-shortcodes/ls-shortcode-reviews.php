<?php

function ls_shortcode_reviews($atts){
    ob_start();

    // Define query arguments
    $args = array(
        'post_type' => 'reviews',
        'posts_per_page'=> 3,
    );

    // Run the query
    $query = new WP_Query( $args );

    if( $query->have_posts() ) {

        $shorties ='';
        $shorties .= '[row style="small" col_bg="rgb(255,255,255)" v_align="equal" h_align="center" padding="40px 40px 40px 40px" depth="5"]';
        
        while( $query->have_posts() ) {
            $query->the_post();

            $ls_review_text = get_field( 'ls_review_text' );
            $ls_name = get_field('ls_name');

            if( $ls_review_text && $ls_name ) {

                $shorties .= '[col span="4" span__sm="12" span__md="10" align="left" animate="fadeInUp"]

                [featured_box img="262" icon_color="rgb(60, 156, 214)"]
                
                <p class="mb-0"> ' . $ls_review_text . ' </p>
                
                [/featured_box]
                [gap height="15px"]
                
                <h6>' . $ls_name . '</h6>
                
                [/col]';
                
            }
        }

        $shorties .= '[/row]';

        echo do_shortcode($shorties);
    }

    return ob_get_clean();
}
add_shortcode( 'ls_reviews','ls_shortcode_reviews') ;

;