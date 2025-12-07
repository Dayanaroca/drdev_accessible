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