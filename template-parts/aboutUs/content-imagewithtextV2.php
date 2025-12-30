<?php
/**
 * Template part for displaying image with text content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
<section aria-labelledby="creamos-viajes-title"  class="w-auto lg:w-full max-w-[980px] mx-2.5 lg:mx-auto border-b-2 border-b-primary"> 
    <div class="flex flex-col-reverse lg:flex-row gap-6">
        <div class="flex items-end justify-end w-full lg:w-1/3">
            <?php 
            $alt = __( 'Persona con movilidad reducida y logo de Enjoy Travel Group', 'drdevcustomlanguage' );
            echo drdev_image('/assets/images/about/persona-silla-ruedas.png', $alt, 'h-auto w-auto', '', '418', '544', $alt); ?>
        </div>
        <div class="flex flex-col align-center justify-start gap-3 w-full lg:w-2/3 pb-1 lg:pb-8">
            <h2 class="font-bold text-3xl text-left mb-3">
                    <?php esc_html_e( 'Creamos viajes sin barreras para que solo tengas que disfrutar', 'drdevcustomlanguage' ); ?>
            </h2>
            <p class="text-lg text-left font-semibold">
                <?php esc_html_e( 'En Enjoy Travel Group creemos que viajar es un derecho de todos. Por eso creamos experiencias accesibles para que personas con movilidad reducida, discapacidad visual o auditiva, y personas mayores puedan descubrir el mundo con comodidad y libertad.', 'drdevcustomlanguage' ); ?>
            </p>
            <p class="text-lg text-left font-semibold">
                <?php esc_html_e( 'Cada viaje que diseñamos está pensado para eliminar barreras y transformar momentos en recuerdos inolvidables. Desde el primer contacto hasta el regreso a casa, cuidamos cada detalle para que solo tengas que disfrutar.', 'drdevcustomlanguage' ); ?>
            </p>
        </div>
    </div>
</section>