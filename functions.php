<?php
/**
 * Functions
 */



// ==============================================================================
// Included Functions
// ==============================================================================

// Hero slider function
include_once get_stylesheet_directory() . '/inc/hero-slider.php';
// Hero slider function
include_once get_stylesheet_directory() . '/inc/discover-slider.php';
// ==================================================================



// ==============================================================================
// Enqueue Scripts and Styles
// ==============================================================================
function tahiti_scripts_and_styles() {
    if ( ! is_admin() ) {

        // Load stylesheets
        wp_enqueue_style( 'tahiti', get_template_directory_uri() . '/css/app.css');

        // javascript
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
        wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/4a11c97cb2.js');

        //custom javascript
        wp_enqueue_script('slick_js', get_template_directory_uri() . '/assets/js/slick_js.js');
        wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global_js.js', null,null, true);
        wp_enqueue_script( 'global_jq', get_template_directory_uri() . '/assets/js/global_jq.js');

    }
}
add_action( 'wp_enqueue_scripts', 'tahiti_scripts_and_styles' );
// ==================================================================

function true_jquery_register() {
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, false, false );
        wp_enqueue_script( 'jquery' );
    }
}
add_action( 'init', 'true_jquery_register' );



// ==============================================================================
// Allow SVG admin upload
// ==============================================================================
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
// ==================================================================



// ==============================================================================
// Adding custom logo to the customizer
// ==============================================================================
function add_custom_logo(){
    add_theme_support( 'custom-logo', [
        'height'      => 190,
        'width'       => 190,
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
    ] );
}
add_action( 'after_setup_theme', 'add_custom_logo');




// ==============================================================================
// Register menus
// ==============================================================================
add_action( 'after_setup_theme', 'register_menus' );
function register_menus(){
    register_nav_menu('header_menu', 'Header menu');
    register_nav_menu('footer_menu', 'Footer menu');
}
// ====================================================


// ==============================================================================
// ACF Register options page
// ==============================================================================
add_action('acf/init', 'acf_op_init');
function acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}
// ====================================================


// ====================================================
// Preview text  length
// ====================================================
add_filter( 'excerpt_length', function(){
    return 17;
} );
add_filter( 'excerpt_more', fn() => '...' );
// ====================================================

function custom_style_select( $buttons ) {
    array_unshift( $buttons, 'styleselect' );

    return $buttons;
}

add_filter( 'mce_buttons_2', 'custom_style_select' );
function insert_custom_formats( $init_array ) {
    $style_formats               = array(
        array(
            'title'    => 'Primary color text',
            'classes'  => 'colored primary-color',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li,a',
            'wrapper'  => false,
            'icon'    => 'format-painter',
        ),
        array(
            'title'    => 'Secondary color text',
            'classes'  => 'colored secondary-color',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li,a',
            'wrapper'  => false,
            'icon'    => 'format-painter',
        ),
        array(
            'title'    => 'Third color text',
            'classes'  => 'colored third-color',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li,a',
            'wrapper'  => false,
            'icon'    => 'format-painter',
        ),
        array(
            'title'    => 'Body font color text',
            'classes'  => 'colored body-font-color',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,li,a',
            'wrapper'  => false,
            'icon'    => 'format-painter',
        ),
    );
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}

add_filter( 'tiny_mce_before_init', 'insert_custom_formats' );

