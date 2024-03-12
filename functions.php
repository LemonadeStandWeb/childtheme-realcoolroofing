<?php

// Load Custom Post Types
require_once get_stylesheet_directory() . '/ls-custom-post-types/ls-cpt-logos.php';
require_once get_stylesheet_directory() . '/ls-custom-post-types/ls-cpt-reviews.php';
require_once get_stylesheet_directory() . '/ls-custom-post-types/ls-cpt-faq.php';

// Load Custom Shortcodes
require_once get_stylesheet_directory() . '/ls-shortcodes/ls-shortcode-logos.php';
require_once get_stylesheet_directory() . '/ls-shortcodes/ls-shortcode-reviews.php';
require_once get_stylesheet_directory() . '/ls-shortcodes/ls-shortcode-faq.php';

// Add custom Theme Functions here

// Disable WordPress Administration email verification prompt 
add_filter( 'admin_email_check_interval', '__return_false' );

//Remove Gravity Forms Label "* Indicates Required"
add_filter( 'gform_required_legend', '__return_empty_string' );

require_once get_stylesheet_directory() . '/ls-shortcodes/ls-shortcodes-faq.php';