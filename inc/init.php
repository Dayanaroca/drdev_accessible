<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function drdev_init_theme() {
    $pages_to_create = [
        [
            'title'    => __('Inicio', 'drdevcustomlanguage'),
            'slug'     => 'inicio',
            'template' => 'page-home.php'
        ],
        [
            'title'    => __('Testimonios', 'drdevcustomlanguage'),
            'slug'     => 'testimonios',
            'template' => 'page-testimonies.php'
        ],
        [
            'title'    => __('Blog', 'drdevcustomlanguage'),
            'slug'     => 'blog',
            'template' => 'archive.php'
        ],
        [
            'title'    => __('¿Te ayudamos?', 'drdevcustomlanguage'),
            'slug'     => 'te-ayudamos',
            'template' => 'page-contact.php'
        ],
        [
            'title'    => __('Sobre nosotros', 'drdevcustomlanguage'),
            'slug'     => 'sobre-nosotros',
            'template' => 'page-aboutus.php'
        ],
    ];

    $page_ids = [];

    foreach ( $pages_to_create as $page ) {
        $existing_page = get_page_by_path( $page['slug'] );
        if ( ! $existing_page ) {
            $post_id = wp_insert_post([
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page'
            ]);

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_wp_page_template', $page['template'] );
                $page_ids[ $page['slug'] ] = $post_id;

                if ( $page['slug'] === 'inicio' ) {
                    $inicio_id = $post_id;
                }
            }
        } else {
            $page_ids[ $page['slug'] ] = $existing_page->ID;
            if ( $page['slug'] === 'inicio' ) {
                $inicio_id = $existing_page->ID;
            }
        }
    }

    // Front page
    if ( isset( $inicio_id ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $inicio_id );
    }

    // Create menus only if they don't exist
    $menus = wp_get_nav_menus();
    $menu_names = wp_list_pluck( $menus, 'name' );

   // MENU: Main menu -> Location: primary (regenerable)
    $menus = wp_get_nav_menus();
    $menu_names = wp_list_pluck( $menus, 'name' );

    if ( in_array( 'Main menu', $menu_names ) ) {
        $main_menu = wp_get_nav_menu_object( 'Main menu' );
        $main_menu_id = $main_menu->term_id;
    } else {
        $main_menu_id = wp_create_nav_menu( 'Main menu' );
    }

    $destinos_item_id = false;

    $menu_items = wp_get_nav_menu_items( $main_menu_id );
    if ( $menu_items ) {
        foreach ( $menu_items as $item ) {
            if ( $item->title === 'Destinos' ) {
                $destinos_item_id = $item->ID;
                break;
            }
        }
    }

    if ( ! $destinos_item_id ) {
        $destinos_item_id = wp_update_nav_menu_item( $main_menu_id, 0, [
            'menu-item-type'   => 'custom',
            'menu-item-title'  => __('Destinos', 'drdevcustomlanguage'),
            'menu-item-url'    => '#',         // Sin URL
            'menu-item-status' => 'publish'
        ]);
    }
    // Obtener términos de la taxonomía DESTINO
    $terms = get_terms([
        'taxonomy'   => 'destino',
        'hide_empty' => false
    ]);

    // Borramos los submenús antiguos del ítem "Destinos"
    $menu_items = wp_get_nav_menu_items( $main_menu_id );

    if ( $menu_items ) {
        foreach ( $menu_items as $item ) {
            if ( intval( $item->menu_item_parent ) === intval( $destinos_item_id ) ) {
                wp_delete_post( $item->ID, true );
            }
        }
    }

    // Crear submenús con los destinos
    if ( ! is_wp_error($terms) && ! empty($terms) ) {
        foreach ( $terms as $term ) {
            wp_update_nav_menu_item( $main_menu_id, 0, [
                'menu-item-type'      => 'taxonomy',
                'menu-item-object'    => 'destino',
                'menu-item-object-id' => $term->term_id,
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $destinos_item_id
            ]);
        }
    }

    foreach ( [ 'testimonios', 'blog' ] as $slug ) {
        if ( isset( $page_ids[ $slug ] ) ) {
            wp_update_nav_menu_item( $main_menu_id, 0, [
                'menu-item-type'      => 'post_type',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page_ids[ $slug ],
                'menu-item-status'    => 'publish'
            ]);
        }
    }

    $locations = get_theme_mod( 'nav_menu_locations', [] );
    $locations['primary'] = $main_menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );


    if ( ! in_array( 'Legal', $menu_names ) ) {
        $legal_menu_id = wp_create_nav_menu( 'Legal' );

        $legal_items = [
            'Términos y Condiciones' => '#',
            'Política de Privacidad' => '#',
            'Preguntas frecuentes' => '#'
        ];

        foreach ( $legal_items as $title => $url ) {
            wp_update_nav_menu_item( $legal_menu_id, 0, [
                'menu-item-type'   => 'custom',
                'menu-item-title'  => $title,
                'menu-item-url'    => $url,
                'menu-item-status' => 'publish'
            ]);
        }

        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['legal'] = $legal_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    $categories = [
        'Cuba'            => '/assets/images/icons/CU.svg',
        'México'          => '/assets/images/icons/MX.svg',
        'Rep. Dominicana' => '/assets/images/icons/DR.svg',
        'Florida'         => '/assets/images/icons/US.svg',
    ];

    foreach ($categories as $name => $svg_path) {
        $term = term_exists($name, 'category');
        if (!$term) {
            $term = wp_insert_term($name, 'category');
        }

        if (!is_wp_error($term)) {
            $term_id = is_array($term) ? $term['term_id'] : $term;
            if (!get_term_meta($term_id, 'flag_svg', true)) {
                update_term_meta($term_id, 'flag_svg', $svg_path);
            }
        }
    }

    $destinos = [
        'Cuba'            => '/assets/images/icons/CU.svg',
        'México'          => '/assets/images/icons/MX.svg',
        'Rep. Dominicana' => '/assets/images/icons/DR.svg',
        'Florida'         => '/assets/images/icons/US.svg',
    ];

    foreach ($destinos as $name => $svg_path) {

        // Verificar si ya existe en la taxonomía "destino"
        $term = term_exists($name, 'destino');

        // Si no existe, crearlo
        if (!$term) {
            $term = wp_insert_term($name, 'destino');
        }

        // Si se creó correctamente o ya existía
        if (!is_wp_error($term)) {
            $term_id = is_array($term) ? $term['term_id'] : $term;

            // Añadir la bandera al meta, solo si no existe
            if (!get_term_meta($term_id, 'flag_svg', true)) {
                update_term_meta($term_id, 'flag_svg', esc_url_raw($svg_path));
            }
        }
    }
}
add_action( 'after_switch_theme', 'drdev_init_theme' );