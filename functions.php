<?php 

if (!defined('ABSPATH')) exit;

require_once get_template_directory() . '/inc/init.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/components.php';
require_once get_template_directory() . '/inc/global-paths.php';
require get_template_directory() . '/inc/custom-queries.php';
require get_template_directory() . '/inc/custom-language.php';
require get_template_directory() . '/inc/custom-menu-walker.php';

function drdev_enqueue_assets() {
    wp_enqueue_style('drdev-style', get_template_directory_uri() . '/style.css', [], '1.0');
    wp_enqueue_style('drdevoutput-style', get_template_directory_uri() . '/assets/css/output.css', [], '1.0');
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('drdevmain-script', get_template_directory_uri() . '/assets/js/main.js', ['swiper-js'], false, true);
    wp_enqueue_style('drdev-fonts',get_template_directory_uri() . '/assets/css/fonts.css',[],null);

}
add_action('wp_enqueue_scripts', 'drdev_enqueue_assets');



add_action('after_setup_theme', function () {
    global $drdev_global;
    $drdev_global = drdev_get_global_data();
});


//add theme setup
function drdev_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('menus');
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary' => __('Menu principale', 'drdevcustomlanguage'),
        'legal' => __('Menú Footer Legal', 'drdevcustomlanguage'),
    ]);
}
add_action('after_setup_theme', 'drdev_theme_setup');