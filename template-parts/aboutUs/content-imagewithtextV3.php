<?php
/**
 * Template part for displaying image with text content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
<section aria-labelledby="asi-trabajamos-title" class="w-auto lg:w-full max-w-[950px] px-2.5 lg:px-0 mx-auto"> 
    <h2 id="asi-trabajamos-title" class="font-bold text-3xl text-left mb-3">
        <?php esc_html_e( 'Así trabajamos', 'drdevcustomlanguage' ); ?>
    </h2>
    <p class="text-lg text-left font-semibold mb-2">
        <?php esc_html_e( 'En Enjoy Travel Group creemos que cada viaje cuenta una historia y que todas las personas merecen vivir la suya. Nuestra experiencia de más de 20 años en el sector turístico nos ha enseñado que la clave está en escuchar, comprender y transformar las necesidades de cada viajero en experiencias únicas.', 'drdevcustomlanguage' ); ?>
    </p>
    <p class="text-lg text-left font-semibold">
        <?php esc_html_e( 'Nos especializamos en crear programas cuidadosamente planificados, con destinos seleccionados por su belleza, cultura y posibilidades de disfrute, siempre con la tranquilidad de que todo está adaptado para garantizar tu comodidad y seguridad. Más que planificar itinerarios, construimos recuerdos que duran toda la vida.', 'drdevcustomlanguage' ); ?>
    </p>
    <?php 
    $alt = __( 'Persona con movilidad reducida feliz', 'drdevcustomlanguage' );
    echo drdev_image('/assets/images/about/persona-feliz.png', $alt, 'h-auto w-full rounded-custom', '', '418', '544', $alt); ?>
</section>