<?php 

if (!defined('ABSPATH')) exit;

require_once get_template_directory() . '/inc/init.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/components.php';
require_once get_template_directory() . '/inc/global-paths.php';
require get_template_directory() . '/inc/custom-queries.php';
require get_template_directory() . '/inc/custom-language.php';
require get_template_directory() . '/inc/custom-menu-walker.php';
require_once get_template_directory() . '/inc/helpers/travel-data.php';
require_once get_template_directory() . '/inc/helpers/travel-render.php';


function drdev_enqueue_assets() {
    wp_enqueue_style('drdev-style', get_template_directory_uri() . '/style.css', [], '1.0');
    wp_enqueue_style('drdevoutput-style', get_template_directory_uri() . '/assets/css/output.css', [], '1.0');
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('drdevmain-script', get_template_directory_uri() . '/assets/js/main.js', ['swiper-js'], false, true);
    wp_enqueue_style('drdev-fonts',get_template_directory_uri() . '/assets/css/fonts.css',[],null);
    wp_enqueue_script(
    'ajax-pagination',
    get_template_directory_uri() . '/assets/js/ajax-pagination.js',
    [],
    null,
    true
);

wp_localize_script(
    'ajax-pagination',
    'drdevAjax',
    [
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('drdev_ajax_pagination'),
    ]
);


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

add_action('wp_ajax_drdev_ajax_pagination', 'drdev_ajax_pagination');
add_action('wp_ajax_nopriv_drdev_ajax_pagination', 'drdev_ajax_pagination');

function drdev_ajax_pagination() {
    $tax_query = [];

if ( ! empty($_POST['tax_query']) ) {
    $decoded = json_decode( wp_unslash($_POST['tax_query']), true );
    if ( is_array($decoded) ) {
        $tax_query = $decoded;
    }
}


    if (
        ! isset($_POST['nonce']) ||
        ! wp_verify_nonce($_POST['nonce'], 'drdev_ajax_pagination')
    ) {
        wp_send_json_error('Nonce inválido', 403);
    }

    $paged          = isset($_POST['paged']) ? (int) $_POST['paged'] : 1;
    $post_type      = sanitize_text_field($_POST['post_type'] ?? 'post');
    $posts_per_page = (int) ($_POST['posts_per_page'] ?? 6);
    $template       = sanitize_text_field($_POST['template'] ?? '');
    $target         = sanitize_text_field($_POST['target'] ?? '#blog-grid');

    if (empty($template)) {
        wp_send_json_error('Template no definido');
    }

    $query = new WP_Query([
        'post_type'      => $post_type,
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'post_status'    => 'publish',
        'tax_query'      => $tax_query,
    ]);

    // HTML de posts
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $published_date = get_the_date('Y-m-d');
            $visible_date = get_the_date('d/m/Y');
            $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
            $author_name = get_the_author();

            $categories = get_the_category();
            $parent_cat = '';
            $child_cat = '';
            if ($categories) {
                foreach ($categories as $cat) {
                    if ($cat->parent == 0) {
                        $parent_cat = $cat;
                    } else {
                        $child_cat = $cat;
                    }
                }
            }

            $flag_path = $parent_cat ? get_term_meta($parent_cat->term_id, 'flag_svg', true) : '';

           if ( $post_type === 'viajes' ) {

            get_template_part(
                    'template-parts/travel/cards/card',
                    $template,
                    [
                        'travel' => drdev_get_travel_data( get_the_ID() ),
                        'ajax'   => true,
                    ]
                );

            } else {

                get_template_part(
                    'template-parts/commons/' . $template,
                    null,
                    [
                        'ajax'            => true,
                        'thumbnail_url'   => $thumbnail_url,
                        'published_date'  => $published_date,
                        'visible_date'    => $visible_date,
                        'excerpt'         => $excerpt,
                        'author_name'     => $author_name,
                        'parent_cat'      => $parent_cat,
                        'child_cat'       => $child_cat,
                        'flag_path'       => $flag_path,
                    ]
                );
            }

        }
    }
    wp_reset_postdata();
    $posts_html = ob_get_clean();

    // HTML de paginación
    ob_start();
    get_template_part('template-parts/commons/content', 'pagination', [
        'query'    => $query,
        'template' => $template,
        'target'   => $target,
        'paged'    => $paged ,
        'tax_query'=> $tax_query,
    ]);
    $pagination_html = ob_get_clean();


    // Envía todo en un solo JSON
    wp_send_json_success([
        'html'            => $posts_html,
        'pagination_html' => $pagination_html,
        'max'             => $query->max_num_pages,
        'paged'           => $paged
    ]);
}
