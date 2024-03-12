<?php
// Add custom Theme Functions here

// Disable WordPress Administration email verification prompt 
add_filter( 'admin_email_check_interval', '__return_false' );

//Remove Gravity Forms Label "* Indicates Required"
add_filter( 'gform_required_legend', '__return_empty_string' );

require_once get_stylesheet_directory() . '/ls-shortcodes/ls-shortcodes-faq.php';