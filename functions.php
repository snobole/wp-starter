<?php
include 'inc/general-customizer.php';

# Add title tag support
function snodev_theme_support() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'snodev_theme_support');

# Add title thumbnail support
function snodev_thumbnails_support() {
    add_theme_support( 'post-thumbnails' );
}

add_action('init', 'snodev_thumbnails_support');

function snodev_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );

    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'snodev_custom_logo_setup' );

# Add dynamic menu support
function snodev_menus() {
    $locations = [
        'primary' => 'Snodev Primary Menu',
        'footer_quick_links' => 'Snodev Quick Links Menu',
        'footer_resources' => 'Snodev Footer Resources Menu',
    ];

    register_nav_menus($locations);
}

add_action('init', 'snodev_menus');

function snodev_enqueue_styles() {
    $version  = wp_get_theme()->get('version');
    wp_enqueue_style('snodev-tailwind', get_template_directory_uri().'/public/css/style.css', '', $version);
    wp_enqueue_style('snodev-glide-style', 'https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css');
    wp_enqueue_style('snodev-aos-style', 'https://unpkg.com/aos@next/dist/aos.css');
    wp_enqueue_style('snodev-style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'snodev_enqueue_styles');

function snodev_enqueue_scripts() {
    $version  = wp_get_theme()->get('version');
    wp_enqueue_script('snodev-alpine', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js', [], '');
    wp_enqueue_script('snodev-glide', 'https://cdn.jsdelivr.net/npm/@glidejs/glide', [],'', true);
    wp_enqueue_script('snodev-aos', 'https://unpkg.com/aos@next/dist/aos.js', [],'', true);
    wp_enqueue_script('snodev-script', get_template_directory_uri().'/public/js/script.js', [], $version, true);
}

add_action('wp_enqueue_scripts', 'snodev_enqueue_scripts');



/**
 * Register 'Testimonials' post type
 */

function testimonials_post_type()
{

    // Labels
    $labels = array(
        'name' => _x("Testimonials", "post type general name"),
        'singular_name' => _x("Testimonial", "post type singular name"),
        'menu_name' => 'Testimonials',
        'add_new' => _x("Add New", "Testimonial"),
        'add_new_item' => __("Add New Testimonial"),
        'edit_item' => __("Edit Testimonial"),
        'new_item' => __("New Testimonial"),
        'view_item' => __("View Testimonial"),
        'search_items' => __("Search Testimonial"),
        'not_found' => __("No Testimonials Found"),
        'not_found_in_trash' => __("No Testimonial Found in Trash"),
        'parent_item_colon' => ''
    );

    // Register post type
    register_post_type('testimonials', array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'rewrite' => array(
            'with_front' => false,
        ),
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'custom-fields')
    ));

}
add_action('init', 'testimonials_post_type');


/**
 * Register 'Partners' post type
 */

function partners_post_type()
{

    // Labels
    $labels = array(
        'name' => _x("Partners", "post type general name"),
        'singular_name' => _x("Partner", "post type singular name"),
        'menu_name' => 'Partners',
        'add_new' => _x("Add New", "Partner"),
        'add_new_item' => __("Add New Partner"),
        'edit_item' => __("Edit Partner"),
        'new_item' => __("New Partner"),
        'view_item' => __("View Partner"),
        'search_items' => __("Search Partner"),
        'not_found' => __("No Partners Found"),
        'not_found_in_trash' => __("No Partner Found in Trash"),
        'parent_item_colon' => ''
    );

    // Register post type
    register_post_type('partners', array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'rewrite' => array(
            'with_front' => false,
        ),
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'custom-fields')
    ));

}
add_action('init', 'partners_post_type');

/**
 * Register 'Faqs' post type
 */

function faqs_post_type()
{

    // Labels
    $labels = array(
        'name' => _x("Faqs", "post type general name"),
        'singular_name' => _x("Faq", "post type singular name"),
        'menu_name' => 'Faqs',
        'add_new' => _x("Add New", "Faq"),
        'add_new_item' => __("Add New Faq"),
        'edit_item' => __("Edit Faq"),
        'new_item' => __("New Faq"),
        'view_item' => __("View Faq"),
        'search_items' => __("Search Faq"),
        'not_found' => __("No Faqs Found"),
        'not_found_in_trash' => __("No Faq Found in Trash"),
        'parent_item_colon' => ''
    );

    // Register post type
    register_post_type('faqs', array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'rewrite' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'custom-fields')
    ));

}
add_action('init', 'faqs_post_type');

/**
 * Register 'Awards' post type
 */

function awards_post_type()
{

    // Labels
    $labels = array(
        'name' => _x("Awards", "post type general name"),
        'singular_name' => _x("Award", "post type singular name"),
        'menu_name' => 'Awards',
        'add_new' => _x("Add New", "Award"),
        'add_new_item' => __("Add New Award"),
        'edit_item' => __("Edit Award"),
        'new_item' => __("New Award"),
        'view_item' => __("View Award"),
        'search_items' => __("Search Award"),
        'not_found' => __("No Awards Found"),
        'not_found_in_trash' => __("No Award Found in Trash"),
        'parent_item_colon' => ''
    );

    // Register post type
    register_post_type('awards', array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'rewrite' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'custom-fields')
    ));

}
add_action('init', 'awards_post_type');


//create a custom taxonomy name it faq_categories for your posts

function create_faq_categories_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => _x( 'Faq Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Faq Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Faq Categories' ),
        'all_items' => __( 'All Faq Categories' ),
        'parent_item' => __( 'Parent Faq Category' ),
        'parent_item_colon' => __( 'Parent Faq Category:' ),
        'edit_item' => __( 'Edit Faq Category' ),
        'update_item' => __( 'Update Faq Category' ),
        'add_new_item' => __( 'Add New Faq Category' ),
        'new_item_name' => __( 'New Faq Category Name' ),
        'menu_name' => __( 'Faq Categories' ),
    );

// Now register the taxonomy
    register_taxonomy('faq_categories',array('faqs'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'faq-categories' ),
    ));

}
add_action( 'init', 'create_faq_categories_hierarchical_taxonomy', 0 );


function filter_the_content_in_the_main_loop( $content ) {

    // Check if we're inside the main loop in a single Post.
    if ( $content && is_singular() && in_the_loop() && is_main_query() ) {

        $html_tags = [
            'p' => 'leading-relaxed mb-6',
            'code' => 'text-gray-700 text-base leading-relaxed mb-6 p-4 bg-gray-200 whitespace-pre overflow-x-auto',
            'pre' => 'text-gray-700 text-base leading-relaxed mb-6 p-4 bg-gray-200 whitespace-pre overflow-x-auto',
            'blockquote' => 'text-gray-700 text-base font-base leading-relaxed mb-6 p-4 bg-gray-200',
            'a' => 'text-primary',
            'h2' => 'leading-relaxed mb-6 text-2xl sm:text-4xl font-bold',
            'h4' => 'leading-relaxed mb-6 text-lg sm:text-xl text-primary font-bold',
            'h5' => 'leading-relaxed mb-6 text-base sm:text-lg text-primary font-bold',
            'ol' => 'ml-6 sm:ml-12 leading-relaxed text-normal list-decimal list-outside mb-6',
            'ul' => 'ml-6 sm:ml-12 leading-relaxed text-normal list-disc list-outside mb-6',
            'li' => 'mb-3',
        ];


        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content);
        libxml_use_internal_errors(false);

        foreach ($html_tags as $tag => $value) {

            $elements = $dom->getElementsByTagName($tag);

            foreach ($elements as $element) {
                $css_atr_vals = '';
                if ($element->hasAttribute('class')) {
                    $css_atr_vals = $element->getAttribute('class');
                    $values_to_replace = [
                        'has-primary-color' => 'text-primary',
                        'has-secondary-color' => 'text-secondary',
                    ];

                    $arr = explode(' ', $css_atr_vals);

                    foreach ($arr as $key) {
                        if (array_key_exists($key, $values_to_replace)) {
                            $newArr = replace_array_key($arr, $key, $values_to_replace[$key]);
                            $css_atr_vals .= ' '.implode(' ', $newArr);
                        }
                    }
                }

                $css_classes = "$value $css_atr_vals";

                $element->setAttribute('class', $css_classes);
            }
        }

        return $dom->saveHTML();
    }
    return $content;
}

add_filter( 'the_content', 'filter_the_content_in_the_main_loop', 1 );


function replace_array_key($array, $key, $replace_with) {
    $index = array_search($key, $array);

    if (isset($array[$index])) {
        $array[$index] = $replace_with;
    }

    return $array;
}

function get_logo_url( ) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

    if ( has_custom_logo() ) {
        return $logo[0];
    }
    return get_template_directory_uri().'/public/images/logo.png';
}

add_filter( 'init', 'get_logo_url' );