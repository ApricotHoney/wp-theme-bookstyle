<?php
/**
 * Bookstyle V4 Functions
 */

// Scripts and Styles
function bookstyle_v4_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'bookstyle-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'bookstyle_v4_scripts' );

// Navigation Menus
register_nav_menus(array(
    'gMenu' => 'Global Menu',
    'footMenu' => 'Footer Menu',
    'spMenu' => 'Smartphone Menu'
));

// Theme Support
add_theme_support('post-thumbnails');
add_image_size( 'gallery-thumbnail', 250, 188, true );
add_image_size( 'bookcover-thumbnail', 210, 149, false );

// Helper: Get Thumbnail URL
function get_eye_url() {
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
    if (is_array($image_url) && isset($image_url[0])) {
        echo esc_url($image_url[0]);
    }
}

// Custom Post Types & Taxonomies
function bookstyle_v4_custom_init() {
    // New Information (Last Up)
    register_post_type( 'lastup', array(
        'label' => '新着情報',
        'public' => true,
        'supports' => array( 'editor', 'custom-fields' ),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true, // Enable Block Editor
    ));

    // Link Site
    register_post_type( 'link_site', array(
        'label' => 'LINK',
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields' ),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
    ));

    // Gallery
    register_post_type( 'gallery_add', array(
        'label' => 'GALLERY',
        'public' => true,
        'supports' => array( 'title', 'editor' , 'excerpt' , 'custom-fields','thumbnail' ),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
    ));

    // Works
    register_post_type( 'works_add', array(
        'label' => 'WORKS',
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields' ),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
    ));

    // Taxonomies
    register_taxonomy(
        'gallery_add-tag', 
        'gallery_add', 
        array(
            'hierarchical' => false, 
            'label' => 'デザインNo',
            'singular_label' => 'デザインNo',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
        )
    );
    register_taxonomy(
        'works_add-tag', 
        'works_add', 
        array(
            'hierarchical' => false, 
            'label' => '使用用途',
            'singular_label' => '使用用途',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
        )
    );
    register_taxonomy(
        'lastup-tag', 
        'lastup', 
        array(
            'hierarchical' => false, 
            'label' => '投稿年度',
            'singular_label' => '投稿年度',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'bookstyle_v4_custom_init' );

// Helper: Custom Term List
function get_the_term_list_nolink( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
    $terms = get_the_terms( $id, $taxonomy ); 
    
    if ( is_wp_error( $terms ) ) return $terms;
    if ( empty( $terms ) ) return false;
    
    $term_names = [];
    foreach ( $terms as $term ) {
        $term_names[] = $term->name;
    }
    
    return $before . join( $sep, $term_names ) . $after;
}
