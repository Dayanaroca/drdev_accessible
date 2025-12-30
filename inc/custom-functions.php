<?php 

if (!defined('ABSPATH')) exit;

/**
 * Company data
 * Add settings to the Customizer for company data like email, phone, social media links, etc.
 */
function drdev_customize_register($wp_customize) {
    $wp_customize->add_section('company_data_section', [
        'title'    => __('Datos de la Empresa', 'drdevcustomlanguage'),
        'priority' => 30,
    ]);
    // -------------Email-------------//
    $wp_customize->add_setting('company_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('company_email', [
        'label'    => __('Email', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'type'     => 'email',
    ]);
    // -------------Phone-------------//
    $wp_customize->add_setting('company_phone', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_phone', [
        'label'    => __('Teléfono', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'type'     => 'text',
    ]);
    // --------------WhatsApp-------------//
    $wp_customize->add_setting('company_whatsapp', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_whatsapp', [
        'label'    => __('WhatsApp', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'type'     => 'text',
        'description' => 'Número completo con código país, ej: +34699111222',
    ]);
    // --------------Schedule-------------//
    $wp_customize->add_setting('company_schedule', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('company_schedule', [
        'label'    => __('Horario', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'type'     => 'text',
    ]);
    // ------------Social media------------//
    $wp_customize->add_setting('company_tiktok', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_tiktok_control', [
        'label'    => __('TikTok URL', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_tiktok',
        'type'     => 'url',
    ]);

    $wp_customize->add_setting('company_facebook', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_facebook_control', [
        'label'    => __('Facebook URL', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_facebook',
        'type'     => 'url',
    ]);

    $wp_customize->add_setting('company_facebook_ylv', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_facebook_ylv_control', [
        'label'    => __('Facebook URL YLV', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_facebook_ylv',
        'type'     => 'url',
    ]);

    $wp_customize->add_setting('company_instagram', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_instagram_control', [
        'label'    => __('Instagram URL', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_instagram',
        'type'     => 'url',
    ]);

    $wp_customize->add_setting('company_instagram_ylv', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_instagram__ylv_control', [
        'label'    => __('Instagram URL YLV', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_instagram_ylv',
        'type'     => 'url',
    ]);
    $wp_customize->add_setting('company_linkedin', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_linkedin_control', [
        'label'    => __('LinkedIn URL', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_linkedin',
        'type'     => 'url',
    ]);
    $wp_customize->add_setting('company_youtube', [
        'default'   => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('company_youtube_control', [
        'label'    => __('YouTube URL', 'drdevcustomlanguage'),
        'section'  => 'company_data_section',
        'settings' => 'company_youtube',
        'type'     => 'url',
    ]);
    // ------------Privacy Policy (PDF)------------//
    $wp_customize->add_setting('company_privacy_policy_pdf', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('company_privacy_policy_pdf_control', [
        'label'       => __('Política de Privacidad (PDF)', 'drdevcustomlanguage'),
        'section'     => 'company_data_section',
        'settings'    => 'company_privacy_policy_pdf',
        'type'        => 'url',
        'description' => __('Introduce la URL del PDF con la política de privacidad.', 'drdevcustomlanguage'),
    ]);
    // ------------Terms and Conditions (PDF)------------//
    $wp_customize->add_setting('company_terms_conditions_pdf', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('company_terms_conditions_pdf_control', [
        'label'       => __('Términos y Condiciones (PDF)', 'drdevcustomlanguage'),
        'section'     => 'company_data_section',
        'settings'    => 'company_terms_conditions_pdf',
        'type'        => 'url',
        'description' => __('Introduce la URL del PDF con los términos y condiciones.', 'drdevcustomlanguage'),
    ]);
}
add_action('customize_register', 'drdev_customize_register');
/**
 * To prevent CF7 from inserting p and br
 */
add_filter('wpcf7_autop_or_not', '__return_false');

function drdev_add_duplicate_button($actions, $post) {

    if ($post->post_type !== 'viajes') {
        return $actions;
    }

    if (!current_user_can('edit_post', $post->ID)) {
        return $actions;
    }

    $url = wp_nonce_url(
        admin_url('admin-ajax.php?action=drdev_duplicate_post&post_id=' . $post->ID),
        'drdev_duplicate_post_' . $post->ID
    );

    $actions['duplicate'] = '<a href="' . esc_url($url) . '">' . esc_html__('Duplicar', 'drdevcustomlanguage') . '</a>';

    return $actions;
}
add_filter('post_row_actions', 'drdev_add_duplicate_button', 10, 2);
function drdev_duplicate_post_logic($post_id) {

    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'viajes') {
        return false;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return false;
    }

    $new_post_id = wp_insert_post([
        'post_title'   => $post->post_title . ' (Copia)',
        'post_content' => $post->post_content,
        'post_status'  => 'draft',
        'post_type'    => $post->post_type,
        'post_author'  => get_current_user_id(),
    ]);

    if (is_wp_error($new_post_id)) {
        return false;
    }

    /* ---------
     * Metadatos (excluyendo internos)
     * --------- */
    $meta = get_post_meta($post_id);

    foreach ($meta as $key => $values) {
        if (str_starts_with($key, '_')) {
            continue;
        }

        foreach ($values as $value) {
            add_post_meta($new_post_id, $key, maybe_unserialize($value));
        }
    }

    /* ---------
     * Taxonomías
     * --------- */
    $taxonomies = get_object_taxonomies($post->post_type);

    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_object_terms($post_id, $taxonomy, ['fields' => 'ids']);
        wp_set_object_terms($new_post_id, $terms, $taxonomy);
    }

    /* ---------
     * Imagen destacada
     * --------- */
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        set_post_thumbnail($new_post_id, $thumbnail_id);
    }

    return $new_post_id;
}
function drdev_handle_duplicate_ajax() {

    $post_id = isset($_GET['post_id']) ? absint($_GET['post_id']) : 0;

    if (!$post_id) {
        wp_die('Invalid post ID');
    }

    if (!wp_verify_nonce($_GET['_wpnonce'], 'drdev_duplicate_post_' . $post_id)) {
        wp_die('Security check failed');
    }

    $new_post_id = drdev_duplicate_post_logic($post_id);

    if ($new_post_id) {
        wp_safe_redirect(
            admin_url('post.php?action=edit&post=' . $new_post_id)
        );
        exit;
    }

    wp_die('Error duplicating post');
}
add_action('wp_ajax_drdev_duplicate_post', 'drdev_handle_duplicate_ajax');


function drdev_guardar_meses_viaje() {
    $destinos = [
        'cuba' => [
            'enero'       => 'bueno',
            'febrero'     => 'regular',
            'marzo'       => 'muy_malo',
            'abril'       => 'bueno',
            'mayo'        => 'malo',
            'junio'       => 'regular',
            'julio'       => 'bueno',
            'agosto'      => 'muy_malo',
            'septiembre'  => 'regular',
            'octubre'     => 'bueno',
            'noviembre'   => 'malo',
            'diciembre'   => 'bueno',
        ],
        'florida' => [
            'enero'       => 'regular',
            'febrero'     => 'bueno',
            'marzo'       => 'bueno',
            'abril'       => 'malo',
            'mayo'        => 'malo',
            'junio'       => 'muy_malo',
            'julio'       => 'malo',
            'agosto'      => 'malo',
            'septiembre'  => 'regular',
            'octubre'     => 'bueno',
            'noviembre'   => 'bueno',
            'diciembre'   => 'bueno',
        ],
        'mexico' => [
            'enero'       => 'bueno',
            'febrero'     => 'bueno',
            'marzo'       => 'regular',
            'abril'       => 'regular',
            'mayo'        => 'malo',
            'junio'       => 'malo',
            'julio'       => 'regular',
            'agosto'      => 'malo',
            'septiembre'  => 'muy_malo',
            'octubre'     => 'regular',
            'noviembre'   => 'bueno',
            'diciembre'   => 'bueno',
        ],
        'rep-dominicana' => [
            'enero'       => 'bueno',
            'febrero'     => 'bueno',
            'marzo'       => 'bueno',
            'abril'       => 'bueno',
            'mayo'        => 'regular',
            'junio'       => 'malo',
            'julio'       => 'malo',
            'agosto'      => 'malo',
            'septiembre'  => 'muy_malo',
            'octubre'     => 'regular',
            'noviembre'   => 'bueno',
            'diciembre'   => 'bueno',
        ],
    ];

    foreach ( $destinos as $slug => $meses ) {
        $destino = get_term_by( 'slug', $slug, 'destino' );
        if ( $destino ) {
            update_term_meta( $destino->term_id, 'meses_viaje', $meses );
        }
    }
}
// Se ejecuta solo una vez al activar el tema
add_action( 'after_switch_theme', 'drdev_guardar_meses_viaje' );
