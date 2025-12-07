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
        'supports'              => array('title', 'editor'),
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
        'rewrite'            => ['slug' => 'viajes'],
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

