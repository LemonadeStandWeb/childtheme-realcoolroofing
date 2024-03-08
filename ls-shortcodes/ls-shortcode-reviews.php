<?php

function ls_shortcode_reviews($atts){
    ob_start();

    $shorties ='';

    $shorties .= '[row style="small" col_bg="rgb(255,255,255)" v_align="equal" h_align="center" padding="40px 40px 40px 40px" depth="5"] 
    
    [col span="4" span__sm="12" span__md="10" align="left" animate="fadeInUp"]

    [featured_box img="262" icon_color="rgb(60, 156, 214)"]
    
    <p class="mb-0">Review goes here</p>
    
    [/featured_box]
    [gap height="15px"]
    
    <h6>Name hERE</h6>
    
    [/col] 

    [col span="4" span__sm="12" span__md="10" align="left" animate="fadeInUp"]

    [featured_box img="262" icon_color="rgb(60, 156, 214)"]
    
    <p class="mb-0">Review goes here</p>
    
    [/featured_box]
    [gap height="15px"]
    
    <h6>Name hERE</h6>
    
    [/col] 

    [col span="4" span__sm="12" span__md="10" align="left" animate="fadeInUp"]

    [featured_box img="262" icon_color="rgb(60, 156, 214)"]
    
    <p class="mb-0">Review goes here</p>
    
    [/featured_box]
    [gap height="15px"]
    
    <h6>Name hERE</h6>
    
    [/col] 
    
    [/row]';

    echo do_shortcode($shorties);

    return ob_get_clean();
}
add_shortcode( 'ls_reviews','ls_shortcode_reviews') ;

;