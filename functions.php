<?php
/* 
* Register Theme Widget Area
*
* @return void
 */
function mbt_widgets_init() {
    // Primary Sidebar
    register_sidebar([
        'name'          => 'Primary Sidebar',
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
    ]);
    
    // Footer Widget Area
    register_sidebar([
        'name'          => 'Footer Area',
        'id'            => 'footer-widgets',
        'before_widget' => '<aside id="%1$s" class="col-md-4 widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
    ]);
}
add_action('widgets_init', 'mbt_widgets_init');

/* 
* Register out main menu 
*
* @return void
*/
require('inc/bs4navwalker.php');
require('inc/pagination.php');

function mbt_register_menus() {
    register_nav_menus([
        'main-menu' => 'Main Menu',
    ]);
}
add_action('init', 'mbt_register_menus');

/* 
*   Register scripts and styles for our theme
*
*   @return void
*/

function mbt_register_scripts_and_styles()  {
    /* Styles */

    // Add Boostrap CSS
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', [], '4.4.1', 'all');

    // Add Theme CSS
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', ['bootstrap']);

    // Additional CSS
    wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/assets/css/theme.css', ['bootstrap', 'style']);

    /* Scripts */

    // Remove WordPredd jQuery
    wp_deregister_script('jquery');

    // Add jQuery
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], '3.4.1', true);

    // Add Popper.js
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.3.3/umd/popper.min.js', ['jquery'], '2.3.3', true);

    // Add Bootstrap.js
    wp_enqueue_script('bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ['jquery', 'popper'], '4.4.1.', true);
    // My script
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', ['jquery']);
}
add_action('wp_enqueue_scripts', 'mbt_register_scripts_and_styles');

/* 
* Theme Setup Declaration
*/

function mbt_theme_setup() {
    // Add Support for Featured Images
    add_theme_support('post-thumbnails');
    // Set Image Size for blog thumbnail
    set_post_thumbnail_size(100, 0, false);
    // Add support for custom logo
    add_theme_support('custom-logo', [
        'height'        => 40,
        'width'         => 200,
        'flex-height'   => false,
        'flex-width'    => true,
        'header-text'   => ['site-title', 'site-description'],
    ]);
    add_theme_support('custom-header', [
        'default-image'         => get_stylesheet_directory_uri() . '/assets/img/default-header-image.jpg',
        'default-text-color'    => '000',
        'width'                 => 2560,
        'height'                => 1000,
        'flex-width'            => true,
        'flex-height'           => false,
    ]);
}
add_action('after_setup_theme', 'mbt_theme_setup');

/* 
* Function for displaying custom logo
*/

function mbt_the_custom_logo() {
    // Get logo media id
    $custom_logo_id = get_theme_mod('custom_logo');

    // Get URL to logo
    $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');

    // Is logo?
    if (has_custom_logo()) {
        // Yes logo is
        echo '<img src="' . $logo_url[0] . '" class="img-dluid" alt="Site Logo" title="' . get_bloginfo('name') . '">';
    } else {
        // logo No is, Show title
        bloginfo('name');
    }
}

/* 
* Filter the_content()
*/

function mbt_filter_the_content($content) {
    $bad_words = file(get_stylesheet_directory() . '/inc/bad_words.txt', FILE_IGNORE_NEW_LINES);
    $censored_words = [];

    foreach($bad_words as $bad_word) {
        $len = strlen($bad_word);
        $censored_word = str_repeat('*', $len);
        array_push($censored_words, $censored_word);
    }

    return str_ireplace($bad_words, $censored_words, $content);
}
add_filter('the_content', 'mbt_filter_the_content', 10, 1);

/* 
* Restrict the_excerpt to 20 words
*/

function mbt_filter_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'mbt_filter_excerpt_length', 999, 1);

/* 
* Modify excerpt suffix
*/

function mbt_filter_excerpt_more($more) {
    return '<div class="d-flex justify-content-end"><a href="' . get_permalink() . '" class="btn btn-primary">More... &raquo;</a></div>';
}
add_filter('excerpt_more', 'mbt_filter_excerpt_more', 999, 1);

/* 
* Modify all get post queries
*/


/* 
* FAQ post per page
*/

function hwl_home_pagesize( $query ) {
    if ( $query->is_main_query() && is_post_type_archive( 'faq' ) ) {
        // Display 50 posts for a custom post type called 'faq'
        $query->set( 'posts_per_page', 50 );
        return;
    }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );

// function mbt_exclude_faq_posts($query) {
//     if($query->is_home()) {
//         $faq_category = get_category_by_slug('faq');
//         $faq_category_id = $faq_category->term_id;
//         $query->set('cat', '-' . $faq_category_id);
//     }
// }
// add_action('pre_get_posts', 'mbt_exclude_faq_posts');