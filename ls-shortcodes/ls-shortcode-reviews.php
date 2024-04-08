<?php

function ls_shortcode_reviews( $atts, $content = null ) {
    ob_start();

    $a = shortcode_atts( array(
        'num_posts' => '3',
        'post_color' =>'rgb(255,255,255)',
        'icon_color' => 'rgb(60, 156, 214)',
        'col_border_radius' => '0px',
    ), $atts );

    // Define query arguments
    $args = array(
        'post_type' => 'reviews',
        'posts_per_page'=> $a['num_posts'],
    );

    // Run the query
    $query = new WP_Query( $args );

    if( $query->have_posts() ) {

        $shortcodes ='';
        $shortcodes .= '[row style="small" col_bg="' . $a['post_color'] . '" col_bg_radius="' . $a['col_border_radius'] . '" v_align="equal" h_align="center" padding="40px 40px 40px 40px" depth="5"]';
        
        while( $query->have_posts() ) {
            $query->the_post();

            $ls_review_text = get_field( 'ls_review_text' );
            $ls_name = get_field('ls_name');

            if( $ls_review_text && $ls_name ) {

                $shortcodes .= '[col span="4" span__sm="12" span__md="10" align="left" animate="fadeInUp"]

                [featured_box img="262" icon_color="' . $a['icon_color'] . '"]
                
                <p class="mb-0"> ' . $ls_review_text . ' </p>
                
                [/featured_box]
                [gap height="15px"]
                
                <h6>' . $ls_name . '</h6>
                
                [/col]';
                
            }
        }

        $shortcodes .= '[/row]';

        echo do_shortcode($shortcodes);
    }
    else {
        $empty_code = '';
        $empty_code .= '[row style="small" col_bg="' . $a['post_color'] . '" v_align="equal" h_align="center" padding="40px 40px 40px 40px" depth="5"]
        
        [col span="4" span__sm="12" span__md="10" align="left" animate="fadeInUp"]

        [featured_box img="262" icon_color="rgb(60, 156, 214)"]
        
        <h6> No Reviews Found </h6>
        
        [/featured_box]
        [gap height="15px"]
                
        [/col]

        [/row]';

        echo do_shortcode($empty_code);
    }

    return ob_get_clean();
}
add_shortcode( 'ls_reviews','ls_shortcode_reviews') ;

;