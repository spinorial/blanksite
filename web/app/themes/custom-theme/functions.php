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

// Deregister WP JQuery and add latest JQuery

function jquery_script() {
   
    global $publicDir;
    
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', $publicDir . 'js/jquery.js', array(), null, true);
    
}
add_action('wp_enqueue_scripts', 'jquery_script');

// Register Bootstrap

function bootstrap_script() {
   
    global $publicDir;
    
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', $publicDir . 'js/bootstrap.js', array(), null, true);
    
}
add_action('wp_enqueue_scripts', 'bootstrap_script');

// Register React

function react_script() {
   
    global $publicDir;
    
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', $publicDir . 'js/react.development.js', array(), null, true);
    
}
add_action('wp_enqueue_scripts', 'bootstrap_script');

// Custom Article Post

add_action( 'init', 'create_article_post_type' );

function create_article_post_type()
{
// Articles post type
register_post_type('article',
        array(
            'labels' => array(
                'name' => __('Articles'),
                'singular_name' => __('Article')
            ),
            'public' => true,
            'description' => 'Neurology case study articles',
            'menu_position' => 4,
            'menu_icon' => 'dashicons-media-document',
            'show_in_rest' => true,
            'supports' => [
                'thumbnail',
                'title',
//            'editor',
                'author',
//                'comments',
                'revisions'

            ],
            'taxonomies' => [
                'category',
                'post_tag'
            ],
            'hierarchical' => false,
            'has_archive' => false
        )
    );
}


?>