<?php
/**
 * Template part for displaying contact fotm 7 content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section aria-label="<?php esc_attr_e( 'Formulario de contacto', 'drdevcustomlanguage' ); ?>" class="w-full max-w-[824px] mx-2.5 lg:mx-auto border-2 border-color6/30 p-8 rounded-custom mt-12">
    <div class="flex flex-col gap-4 mb-8">
        <h2 class="text-2xl lg:text-3xl font-bold w-auto">
            <?php esc_html_e( 'Comparte tu experiencia o deja tu pregunta', 'drdevcustomlanguage' ); ?>
        </h2>
        <p class="text-base font-bold text-color7 pr-0 lg:pr-16">
            <?php esc_html_e( 'Nos encantaría saber tu opinión. Comparte tu experiencia de viaje, deja tus dudas o comenta qué te gustaría saber más sobre este tema. Tu correo electrónico no será publicado y los campos marcados con * son obligatorios.', 'drdevcustomlanguage' ); ?>
        </p>
    </div>
    <?php $host = $_SERVER['HTTP_HOST'];
    if ( $host === 'accessible.local' ) {
        echo do_shortcode( '[contact-form-7 id="5e4596f" title="Formulario general"]' );
    } else {
        echo do_shortcode( '[contact-form-7 id="36fb7fe" title="Formulario general"]' );
    } ?>
</section>