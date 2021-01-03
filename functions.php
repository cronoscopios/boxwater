<?php

//add Social Network
require_once("socialNetwork.php");


//add CSS & Js files
function add_css_js() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
    
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), 
    filemtime(get_template_directory() . '/style.css'), false);

    wp_enqueue_style( 'google-fonts-Open', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
    wp_enqueue_style( 'google-fonts-Source', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    
    wp_enqueue_script( 'main', get_template_directory_uri() .'/js/main.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_css_js' );


//add theme support
function box_init(){
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
}
add_action( 'after_setup_theme', 'box_init' );


//Projects Post Type
function box_custom_post_type() {
    register_post_type('project', 
        array(
            'rewrite' => array( 'slug' => 'projects' ),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
    );
}
add_action( 'init', 'box_custom_post_type' );


//Sidebar
function box_widgets() {
    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id' => 'main_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'box_widgets' );


//Filters
function search_filter ( $query ) {
    if ( $query -> is_search() ) {
        $query -> set( 'post_type', array( 'post', 'project' ) );
    }
}
add_filter( 'pre_get_posts', 'search_filter' );



?>