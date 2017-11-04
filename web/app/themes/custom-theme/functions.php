<?php

// Declare variables

global $publicDir;
global $includesDir;

$publicDir = get_stylesheet_directory_uri() . '/public/';
$includesDir = get_stylesheet_directory_uri() . '/includes/';


// Inherit parent styles

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


// Deregister WP JQuery and Add latest
?>