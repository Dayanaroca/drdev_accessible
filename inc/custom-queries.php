<?php 

if (!defined('ABSPATH')) exit;

function drdev_register_cpt() {
    register_post_type('faq', [
        'label' => 'FAQs',
        'public' => false, 
        'publicly_queryable' => false, 
        'show_ui' => true,
        'supports' => ['title', 'editor'],
        'menu_icon' => 'dashicons-editor-help',
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'show_in_rest' => false, 
        'rewrite' => false,
        'query_var' => false,
    ]);

    register_taxonomy('faq_group', 'faq', [
    'label' => 'Grupos de FAQ',
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_menu'      => true,
    'show_admin_column' => true,
    'public'            => false,         
    'rewrite'           => false, 
    'query_var'         => false,
    'show_in_rest'      => true, 
    ]);

    $testimonies = array(
        'name'                  => __('Testimonies', 'drdevcustomlanguage'),
        'singular_name'         => __('Testimonie', 'drdevcustomlanguage'),
        'menu_name'             => __('Testimonies', 'drdevcustomlanguage'),
        'name_admin_bar'        => __('Testimonies', 'drdevcustomlanguage'),
        'add_new'               => __('Add New', 'drdevcustomlanguage'),
        'add_new_item'          => __('Add New Testimonies', 'drdevcustomlanguage'),
        'new_item'              => __('New Testimonies', 'drdevcustomlanguage'),
        'edit_item'             => __('Edit Testimonies', 'drdevcustomlanguage'),
        'view_item'             => __('View Testimonies', 'drdevcustomlanguage'),
        'all_items'             => __('All Testimonies', 'drdevcustomlanguage'),
        'search_items'          => __('Search Testimonies', 'drdevcustomlanguage'),
        'not_found'             => __('No Testimonies found.', 'drdevcustomlanguage'),
        'not_found_in_trash'    => __('No Testimonies found in Trash.', 'drdevcustomlanguage'),
    );

    $testimonies_args = array(
        'labels'                => $testimonies,
        'public'                => true, 
        'publicly_queryable'    => true, 
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => false,
        'rewrite'               => false,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-clipboard',
        'supports'              => array('title', 'editor', 'thumbnail'),
        'show_in_rest'          => true, 
    );

    register_post_type('testimonies', $testimonies_args);

    $travel = [
        'name'               => __('Viajes', 'drdevcustomlanguage'),
        'singular_name'      => __('Viaje', 'drdevcustomlanguage'),
        'menu_name'          => __('Viajes', 'drdevcustomlanguage'),
        'add_new'            => __('Añadir Viaje', 'drdevcustomlanguage'),
        'add_new_item'       => __('Añadir nuevo Viaje', 'drdevcustomlanguage'),
        'edit_item'          => __('Editar Viaje', 'drdevcustomlanguage'),
        'new_item'           => __('Nuevo Viaje', 'drdevcustomlanguage'),
        'view_item'          => __('Ver Viaje', 'drdevcustomlanguage'),
        'search_items'       => __('Buscar Viajes', 'drdevcustomlanguage'),
    ];

    $args_travel = [
        'labels'             => $travel,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => [
        'slug'       => 'viajes/%destino%/%tipo_viaje%',
            'with_front' => false
        ],
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'          => 'dashicons-location-alt',
        'show_in_rest'       => true,
        'publicly_queryable' => true
    ];

    register_post_type( 'viajes', $args_travel );

    $destinations = [
        'name'              => __('Destinos', 'drdevcustomlanguage'),
        'singular_name'     => __('Destino', 'drdevcustomlanguage'),
        'search_items'      => __('Buscar Destinos', 'drdevcustomlanguage'),
        'all_items'         => __('Todos los Destinos', 'drdevcustomlanguage'),
        'edit_item'         => __('Editar Destino', 'drdevcustomlanguage'),
        'update_item'       => __('Actualizar Destino', 'drdevcustomlanguage'),
        'add_new_item'      => __('Añadir Nuevo Destino', 'drdevcustomlanguage'),
        'menu_name'         => __('Destinos', 'drdevcustomlanguage'),
    ];

    register_taxonomy('destino', 'viajes', [
        'hierarchical'      => true,
        'labels'            => $destinations,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'destino'],
    ]);

    $travel_type = [
        'name'              => __('Tipos de Viaje', 'drdevcustomlanguage'),
        'singular_name'     => __('Tipo de Viaje', 'drdevcustomlanguage'),
        'menu_name'         => __('Tipo de Viaje'),
    ];

    register_taxonomy('tipo_viaje', 'viajes', [
        'hierarchical'      => false, 
        'labels'            => $travel_type,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'tipo'],
    ]);
}
add_action('init', 'drdev_register_cpt');
/**
 * tax for destinations
 */
function drdev_register_destinations_taxonomy() {

    $labels = [
        'name'          => __('Destination Categories', 'drdevcustomlanguage'),
        'singular_name' => __('Destination Category', 'drdevcustomlanguage'),
    ];

    register_taxonomy('destinations_category', ['destinations'], [
        'labels'        => $labels,
        'public'        => true,
        'hierarchical'  => true,
        'show_in_rest'  => true, // WPML + Divi + ACF compatibility
        'rewrite'       => [ 'slug' => 'destination-category' ],
    ]);
}
add_action( 'init', 'drdev_register_destinations_taxonomy' );
/**
 * add default terms to destination categories
 */
function drdev_create_destination_categories() {

    $terms = [
        'Cuba',
        'República Dominicana',
        'México',
        'Estados Unidos'
    ];

    foreach ( $terms as $term ) {
        if ( ! term_exists( $term, 'destinations_category' ) ) {
            wp_insert_term( $term, 'destinations_category' );
        }
    }
}
add_action( 'after_switch_theme', 'drdev_create_destination_categories' );

require_once get_template_directory() . '/template-parts/home/content-faq.php';
function render_faq_group($group_slug = 'faq-home', $title = 'Preguntas frecuentes') {
    $faqs = get_posts([
        'post_type' => 'faq',
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'faq_group',
                'field' => 'slug',
                'terms' => $group_slug
            ]
        ]
    ]);

    if (empty($faqs)) return;

    $parsed_faqs = array_map(function($faq) {
        return [
            'question' => get_the_title($faq),
            'answer' => apply_filters('the_content', $faq->post_content),
        ];
    }, $faqs);

    faq_component($parsed_faqs, $title);
}
add_filter( 'post_type_link', 'drdev_viajes_permalink', 10, 2 );
function drdev_viajes_permalink( $permalink, $post ) {

    if ( $post->post_type !== 'viajes' ) {
        return $permalink;
    }

    // DESTINO
    $destinos = wp_get_post_terms( $post->ID, 'destino' );
    $destino_slug = ! empty( $destinos ) && ! is_wp_error( $destinos )
        ? $destinos[0]->slug
        : 'sin-destino';

    // TIPO DE VIAJE
    $tipos = wp_get_post_terms( $post->ID, 'tipo_viaje' );
    $tipo_slug = ! empty( $tipos ) && ! is_wp_error( $tipos )
        ? $tipos[0]->slug
        : 'sin-tipo';

    $permalink = str_replace(
        ['%destino%', '%tipo_viaje%'],
        [$destino_slug, $tipo_slug],
        $permalink
    );

    return $permalink;
}
add_action( 'init', 'drdev_viajes_rewrite_rules' );
function drdev_viajes_rewrite_rules() {

    add_rewrite_rule(
        '^viajes/([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?post_type=viajes&name=$matches[3]',
        'top'
    );
}

add_filter( 'wpcf7_form_tag', function ( $tag ) {

    if ( $tag['name'] !== 'program' ) {
        return $tag;
    }

    $destino = get_queried_object();
    if ( empty($destino) || empty($destino->slug) ) {
        return $tag;
    }

    $groups = [
        'programa'  => __('Programas', 'drdevcustomlanguage'),
        'hotel'     => __('Hoteles', 'drdevcustomlanguage'),
        'excursion' => __('Experiencias', 'drdevcustomlanguage'),
    ];

    $raw_values = [];
    $labels     = [];

    // Placeholder
    $raw_values[] = '';
    $labels[]     = __('Selecciona un programa', 'drdevcustomlanguage');

    foreach ( $groups as $tipo_slug => $group_label ) {

        $query = new WP_Query([
            'post_type'      => 'viajes',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'tax_query'      => [
                [
                    'taxonomy' => 'destino',
                    'field'    => 'slug',
                    'terms'    => $destino->slug,
                ],
                [
                    'taxonomy' => 'tipo_viaje',
                    'field'    => 'slug',
                    'terms'    => $tipo_slug,
                ],
            ],
        ]);

        if ( $query->have_posts() ) {

            // 🔹 Simulación visual de grupo (NO seleccionable)
            $raw_values[] = '';
            $labels[]     = '— ' . $group_label . ' —';

            while ( $query->have_posts() ) {
                $query->the_post();

                $raw_values[] = get_the_title();
                $labels[]     = get_the_title();
            }
        }

        wp_reset_postdata();
    }

    $tag['raw_values'] = $raw_values;
    $tag['values']     = $raw_values;
    $tag['labels']     = $labels;

    return $tag;
});

add_filter('wpcf7_form_tag', function($tag) {

    // Solo modificar el tag 'programtype'
    if ($tag['name'] !== 'programtype') {
        return $tag;
    }

    // Obtener el post actual
    global $post;
    if (!$post) return $tag;

    // Rellenar el valor con el título del post
    $tag['values']     = [ get_the_title($post) ];
    $tag['raw_values'] = [ get_the_title($post) ];
    $tag['labels']     = [ get_the_title($post) ];

    return $tag;

});
