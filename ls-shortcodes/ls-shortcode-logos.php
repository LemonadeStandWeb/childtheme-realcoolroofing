<?php
/**
 * Shortcode to display logos
 * 
 * TODO: Longer description of the shortcode
 */
function ls_shortcode_logo() {

    ob_start();

    echo '<h1>Hello World!<h1>';

    return ob_get_clean();

}
add_shortcode( 'ls_logos', 'ls_shortcode_logo' );