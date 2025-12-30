<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function drdev_get_travel_data( int $post_id ): array {

    // Imagen destacada
    $thumbnail_url = get_the_post_thumbnail_url( $post_id, 'full' );

    // =========================
    // SERVICIOS
    // =========================
    $services_travel = get_field('services_travel_', $post_id);
    if ( empty($services_travel) ) {
        $services_travel = [
            'accommodation_travel_'      => false,
            'insurance_travel_'          => false,
            'visa_travel_'               => false,
            'on_site_assistance_travel_' => false,
        ];
    }

    $services_labels = [
        'accommodation_travel_'      => __( 'Alojamiento', 'drdevcustomlanguage' ),
        'insurance_travel_'          => __( 'Seguro de viaje', 'drdevcustomlanguage' ),
        'visa_travel_'               => __( 'Visado', 'drdevcustomlanguage' ),
        'on_site_assistance_travel_' => __( 'Asistencia en destino', 'drdevcustomlanguage' ),
    ];

    $services_icons = [
        'accommodation_travel_'      => drdev_inline_svg('/assets/images/icons/accommodation.svg'),
        'insurance_travel_'          => drdev_inline_svg('/assets/images/icons/insurance.svg'),
        'visa_travel_'               => drdev_inline_svg('/assets/images/icons/visa.svg'),
        'on_site_assistance_travel_' => drdev_inline_svg('/assets/images/icons/assistance.svg'),
    ];

    // =========================
    // ACCESIBILIDAD
    // =========================
    $accessible_for_travel = get_field('accessible_for_travel_', $post_id);
    if ( empty($accessible_for_travel) ) {
        $accessible_for_travel = [
            'hearing_impairment_travel_' => false,
            'visual_impairment_travel_'  => false,
            'seniors_travel_'            => false,
            'reduced_mobility_travel_'   => false,
        ];
    }

    $accessible_labels = [
        'hearing_impairment_travel_' => 'personas con discapacidad auditiva',
        'visual_impairment_travel_'  => 'personas con discapacidad visual',
        'seniors_travel_'            => 'para personas mayores',
        'reduced_mobility_travel_'   => 'personas con movilidad reducida',
    ];
    
    $accessible_icons = [
        'hearing_impairment_travel_' => drdev_inline_svg('/assets/images/icons/hearing_impairment_travel.svg'),
        'visual_impairment_travel_'  => drdev_inline_svg('/assets/images/icons/visual_impairment_travel.svg'),
        'seniors_travel_'            => drdev_inline_svg('/assets/images/icons/seniors_travel.svg'),
        'reduced_mobility_travel_'   => drdev_inline_svg('/assets/images/icons/reduced_mobility_travel.svg'),
    ];
    // =========================
    // Facilidades
    // =========================
    $facilities_for_travel = get_field('facilities_for_travel_', $post_id);
    if ( empty($facilities_for_travel) ) {
        $facilities_for_travel = [
            'mobility_access_travel_' => false,
            'rooms_access_travel_'  => false,
            'bathrooms_travel_'            => false,
            'wc_access_travel_'   => false,
            'common_area_travel_'            => false,
            'sensory_access_travel_'   => false,
        ];
    }
   
    $facilities_labels = [
        'mobility_access_travel_' => 'Instalaciones adaptadas para personas con movilidad reducida.',   
        'rooms_access_travel_' => 'Habitaciones accesibles con espacios amplios y recorridos sin barreras.',  
        'bathrooms_travel_' => 'Baños adaptados con ducha a ras de suelo, asiento abatible y barras de apoyo.',  
        'wc_access_travel_' => 'Aseos accesibles señalizados y equipados conforme a normativa.',   
        'common_area_travel_' => 'Zonas comunes accesibles, incluyendo recepción, restaurante y áreas de ocio.',  
        'sensory_access_travel_' => 'Medidas de apoyo a la accesibilidad sensorial y visual.',
    ];
    
    $facilities_icons = [
        'mobility_access_travel_' => drdev_inline_svg('/assets/images/icons/fac1.svg'),
        'rooms_access_travel_'  => drdev_inline_svg('/assets/images/icons/fac.svg'),
        'bathrooms_travel_'            => drdev_inline_svg('/assets/images/icons/fac2.svg'),
        'wc_access_travel_'   => drdev_inline_svg('/assets/images/icons/fac3.svg'),
        'common_area_travel_'   => drdev_inline_svg('/assets/images/icons/fac4.svg'),
        'sensory_access_travel_'   => drdev_inline_svg('/assets/images/icons/fac5.svg'),
    ];
    // =========================
    // HOTELES (REPETIDOR)
    // =========================
    $accommodation_options = get_field( 'accommodation_options_travel_', $post_id );

    $hotels = [];

    if ( ! empty( $accommodation_options ) && is_array( $accommodation_options ) ) {
        foreach ( $accommodation_options as $item ) {

            $hotels[] = [
                'name'   => $item['hotel_name_travel_'] ?? '',
                'stars'  => (int) ( $item['stars_travel_'] ?? 0 ),
                'extras' => $item['extras_travel_'] ?? '',
                'image'  => $item['image_hotel_travel_'] ?? null,
            ];
        }
    }

    $includes_travel = get_field( 'includes_travel_', $post_id );

    if ( empty( $includes_travel ) || ! is_array( $includes_travel ) ) {
        $includes_travel = [];
    }

    $not_includes_travel = get_field( 'not_includes_travel_', $post_id );

    if ( empty( $not_includes_travel ) || ! is_array( $not_includes_travel ) ) {
        $not_includes_travel = [];
    }

    // =========================
    // RETORNO FINAL
    // =========================
    return [

        // Básico
        'post_id'       => $post_id,
        'title'         => get_the_title( $post_id ),
        'permalink'     => get_permalink( $post_id ),
        'thumbnail_url' => $thumbnail_url,

        // Metadatos principales
        'type_travel'             => get_post_meta( $post_id, 'type_travel_', true ),
        'duration_program_travel' => get_post_meta( $post_id, 'duration_program_travel_', true ),
        'location_program_travel' => get_post_meta( $post_id, 'location_program_travel_', true ),
        'duration_hour_program_travel' => get_post_meta( $post_id, 'duration_hour_program_travel_', true ),
        'price_travel'            => get_post_meta( $post_id, 'price_travel_', true ),

        // Servicios
        'services' => [
            'values' => $services_travel,
            'labels' => $services_labels,
            'icons'  => $services_icons,
        ],

        // Accesibilidad
        'accessible' => [
            'values' => $accessible_for_travel,
            'labels' => $accessible_labels,
            'icons'  => $accessible_icons,
        ],

        // Facilidades
        'facilities' => [
            'values' => $facilities_for_travel,
            'labels' => $facilities_labels,
            'icons'  => $facilities_icons,
        ],

        // Hotel
        'hotel' => [
            'accessibility' => get_post_meta( $post_id, 'hotel_accessibility_travel_', true ),
            'room'          => get_post_meta( $post_id, 'hotel_room_travel_', true ),
            'extra'         => get_post_meta( $post_id, 'hotel_extra_travel_', true ),
        ],

        // Otros
        'accommodation_options' => $hotels,
        'includes_travel' => $includes_travel,
        'not_includes_travel' => $not_includes_travel,
        'recommendations_travel'       => get_post_meta( $post_id, 'recommendations_travel_', true ),
        'optional_travel'       => get_post_meta( $post_id, 'optional_travel_', true ),
        'starts_hotel_travel'       => (int) get_field( 'starts_hotel_travel_', $post_id ),
        'visibility_hotel_travel'       => (int) get_field( 'visibility_hotel_travel_', $post_id ),
    ];
}