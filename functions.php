<?php
  function addWordPress_resources() {
    // Load CSS
    wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',false,'1.1','all');
    wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/vendor/owl/assets/owl.carousel.css',false,'1.1','all');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css',false,'1.1','all');
    wp_enqueue_style( 'page', get_template_directory_uri() . '/css/page.css',false,'1.1','all');
    wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css',false,'1.1','all');
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css',false,'1.1','all');
    wp_enqueue_style( 'category', get_template_directory_uri() . '/css/category.css',false,'1.1','all');


    // Load JavaScript
    wp_enqueue_script( 'jQuery', 'https://code.jquery.com/jquery-2.2.4.min.js', array (), false, true);

    wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array ('jQuery'), false, true);

    wp_enqueue_script( 'owl', get_template_directory_uri() . '/vendor/owl/owl.carousel.js', array ('jQuery'), false, true);
    wp_enqueue_script( 'custom-carousel', get_template_directory_uri() . '/js/custom-carousel.js', array ('jQuery'), false, true);
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array ('jQuery'), false, true);
  }

add_action('wp_enqueue_scripts', 'addWordPress_resources');

// Navigation Menus
register_nav_menus(array(
  'primary' => __( 'Primary Menu' ),
  'footer' => __('Footer Menu'),
));

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100);

add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 2 );

function add_parent_url_menu_class( $classes = array(), $item = false ) {
    // Get current URL
    $current_url = current_url();

    // Get homepage URL
    $homepage_url = trailingslashit( get_bloginfo( 'url' ) );

    // Exclude 404 and homepage
    if( is_404() or $item->url == $homepage_url ) return $classes;

    if ( strstr( $current_url, $item->url) ) {
        // Add the 'parent_url' class
        $classes[] = 'active';
    }

    return $classes;
}

function current_url() {
    // Protocol
    $url = ( 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
    $url .= $_SERVER['SERVER_NAME'];

    // Port
    $url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $url .= $_SERVER['REQUEST_URI'];
    return trailingslashit( $url );
}

?>
