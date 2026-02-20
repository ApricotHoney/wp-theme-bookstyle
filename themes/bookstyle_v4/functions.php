<?php
/**
 * Bookstyle V4 Functions
 */

// Scripts and Styles
function bookstyle_v4_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('bookstyle-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'bookstyle_v4_scripts');

// Navigation Menus
register_nav_menus(array(
    'gMenu' => 'Global Menu',
    'footMenu' => 'Footer Menu',
    'spMenu' => 'Smartphone Menu'
));

// Theme Support
add_theme_support('post-thumbnails');
add_image_size('gallery-thumbnail', 250, 188, true);
add_image_size('bookcover-thumbnail', 210, 149, false);

// Helper: Get Thumbnail URL
function get_eye_url()
{
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
    if (is_array($image_url) && isset($image_url[0])) {
        echo esc_url($image_url[0]);
    }
}

// Custom Post Types & Taxonomies
function bookstyle_v4_custom_init()
{
    // New Information (Last Up)
    register_post_type('lastup', array(
        'label' => '新着情報',
        'public' => true,
        'supports' => array('editor', 'custom-fields'),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true, // Enable Block Editor
    ));

    // Link Site
    register_post_type('link_site', array(
        'label' => 'LINK',
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
    ));

    // Gallery
    register_post_type('gallery_add', array(
        'label' => 'GALLERY',
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
    ));

    // Works
    register_post_type('works_add', array(
        'label' => 'WORKS',
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
    ));

    // Blog
    register_post_type('blog', array(
        'label' => 'BLOG',
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('blog_category', 'blog_tag'), // Dedicated taxonomies
        'menu_position' => 5,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-edit',
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

    // Color Taxonomy (for posts)
    register_taxonomy(
        'color',
        'post',
        array(
            'hierarchical' => false,
            'label' => 'カラー',
            'singular_label' => 'カラー',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        )
    );

    // Blog Category Taxonomy
    register_taxonomy(
        'blog_category',
        'blog',
        array(
            'hierarchical' => true,
            'label' => 'ブログカテゴリー',
            'singular_label' => 'ブログカテゴリー',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        )
    );

    // Blog Tag Taxonomy
    register_taxonomy(
        'blog_tag',
        'blog',
        array(
            'hierarchical' => false,
            'label' => 'ブログタグ',
            'singular_label' => 'ブログタグ',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
        )
    );
}
add_action('init', 'bookstyle_v4_custom_init');

// Helper: Custom Term List
function get_the_term_list_nolink($id = 0, $taxonomy, $before = '', $sep = '', $after = '')
{
    $terms = get_the_terms($id, $taxonomy);

    if (is_wp_error($terms))
        return $terms;
    if (empty($terms))
        return false;

    $term_names = [];
    foreach ($terms as $term) {
        $term_names[] = $term->name;
    }

    return $before . join($sep, $term_names) . $after;
}

// Custom Search Filter Logic (pre_get_posts)
function bookstyle_v4_search_filter($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // Apply to home, archive, search
    if ($query->is_home() || $query->is_archive() || $query->is_search()) {

        // Blog Archive specific logic
        if ($query->is_post_type_archive('blog') || is_page('blog') || $query->get('post_type') === 'blog') {
            $query->set('posts_per_page', 9);
            return; // Skip other filters if it's blog
        }

        // Ensure we are targeting 'post' post type if not otherwise specified
        if (!$query->get('post_type')) {
            $query->set('post_type', 'post');
        }

        // Show all posts (no pagination)
        $query->set('posts_per_page', -1);

        // Sort Filter
        if (isset($_GET['sort']) && !empty($_GET['sort'])) {
            switch ($_GET['sort']) {
                case 'old':
                    $query->set('order', 'ASC');
                    $query->set('orderby', 'date');
                    break;
                case 'rand':
                    $query->set('orderby', 'rand');
                    break;
                case 'new':
                default:
                    $query->set('order', 'DESC');
                    $query->set('orderby', 'date');
                    break;
            }
        }

        // Color Filter (Taxonomy)
        if (isset($_GET['color']) && !empty($_GET['color'])) {
            $tax_query = array(
                array(
                    'taxonomy' => 'color',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['color']),
                ),
            );
            $query->set('tax_query', $tax_query);
        }
    }
}
add_action('pre_get_posts', 'bookstyle_v4_search_filter');

// Ensure the "BLOG" link in menus points to the internal blog listing instead of Tumblr
function redirect_tumblr_to_internal_blog($sorted_menu_items, $args)
{
    foreach ($sorted_menu_items as $item) {
        // If the link contains tumblr.com and the label is BLOG, or just point any tumblr blog link to internal
        if (strpos($item->url, 'tumblr.com') !== false) {
            $item->url = home_url('/blog/');
            $item->target = ''; // Force same window
        }
    }
    return $sorted_menu_items;
}
add_filter('wp_nav_menu_objects', 'redirect_tumblr_to_internal_blog', 10, 2);
