<?php
/**
 * Template part for displaying section 1 content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
$archive_name = single_term_title( '', false );
?>
<section class="flex flex-col lg:flex-row gap-2 lg:gap-0 w-full max-w-screen-etg mx-auto border-0 lg:border lg:border-color6 rounded-[0.625rem] mt-0 lg:mt-20 overflow-visible" aria-labelledby="feature-title">
    <div class="px-2.5 pt-2 pb-1 lg:px-12 lg:pt-12 lg:pb-6 w-full lg:w-1/2">
        <span class="text-base font-bold text-black">
            <?php esc_html_e( 'Explora nuestro destino', 'drdevcustomlanguage' ); ?>
        </span>
        <h2 class="text-2xl font-black text-black uppercase mb-2">
            <?php esc_html_e( 'Viajar sin límites, vivir experiencias que quedan para siempre', 'drdevcustomlanguage' ); ?>
        </h2>
        <p class="text-lg font-medium text-black">
            <?php esc_html_e( 'En', 'drdevcustomlanguage' ); ?>
            <span class="font-bold"><?php esc_html_e( 'Enjoy Travel Group', 'drdevcustomlanguage' ); ?></span>
            <?php esc_html_e( 'creemos que todos merecen la oportunidad de explorar el mundo sin límites.', 'drdevcustomlanguage' ); ?>
            <span class="font-bold"><?php
                printf(
                    esc_html__( 'Nuestros viajes a %s están diseñados para que cualquier persona', 'drdevcustomlanguage' ),
                    esc_html( $archive_name )
                );
        ?></span>
            <?php esc_html_e( '(incluidas aquellas con movilidad reducida, discapacidad visual o auditiva, personas mayores o con necesidades de accesibilidad específicas) pueda disfrutar de', 'drdevcustomlanguage' ); ?>
            <span class="font-bold"><?php esc_html_e( 'experiencias únicas, cómodas y seguras.', 'drdevcustomlanguage' ); ?></span>
        </p>
    </div>
    <div class="w-full lg:w-1/2 mt-0 lg:-mt-20" aria-hidden="true">
        <?php echo drdev_image('/assets/images/archive/duo.png', 'Viajar sin limites', 'w-full h-auto block', '', '525', '379', 'Viajar sin límites'); ?>
    </div>
</section>
