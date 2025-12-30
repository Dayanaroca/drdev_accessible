<?php
/**
 * Template part for displaying contact fotm 7 content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section aria-label="<?php esc_attr_e( 'Formulario de contacto', 'drdevcustomlanguage' ); ?>" class="w-full max-w-[824px] mx-2.5 lg:mx-auto border-2 border-color6/30 p-8 rounded-[0.625rem]">
    <div class="flex flex-col gap-4 mb-8">
        <h2 class="text-2xl lg:text-3xl font-bold w-auto">
            <?php esc_html_e( 'Queremos diseñar tu estancia perfecta', 'drdevcustomlanguage' ); ?>
        </h2>
        <p class="text-base font-medium text-color7 pr-0 lg:pr-16">
            <?php esc_html_e( 'Completa el formulario y en menos de 24 horas uno de nuestros asesores te contactará para crear una propuesta adaptada a tus necesidades de viaje y accesibilidad.', 'drdevcustomlanguage' ); ?>
        </p>
    </div>
    <?php $host = $_SERVER['HTTP_HOST'];
    if ( $host === 'accessible.local' ) {
        echo do_shortcode( '[contact-form-7 id="d39238e" title="Formulario por tipo de programa"]' );
    } else {
        echo do_shortcode( '[contact-form-7 id="6ea0aac" title="Formulario de contacto 1"]' );
    } ?>
</section>