<?php
/**
 * Template part for displaying image with text content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
<section aria-label="<?php echo esc_attr( __( 'Hero todas las entradas', 'drdevcustomlanguage' ) ); ?>"  class="w-auto lg:w-full max-w-[1100px] mx-2.5 lg:mx-auto border-b-2 border-b-secondary">
    <h2 class="font-bold text-4xl text-left leading-[3.375rem] mb-5 ml-0 lg:ml-8">
         <span class="block md:inline">
            <?php esc_html_e( 'Viaja mejor,', 'drdevcustomlanguage' ); ?>
        </span>
        <span class="block md:inline">
            <?php esc_html_e( 'de forma inclusiva', 'drdevcustomlanguage' ); ?>
        </span>
    </h2>
    <div class="flex flex-col lg:flex-row gap-6 ml-0 lg:ml-8">
        <div class="flex flex-col align-center justify-start gap-5 w-full lg:w-3/5">
            <p class="text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Oficinas locales y atención personalizada:', 'drdevcustomlanguage' ); ?></strong>.
                <?php esc_html_e( 'En Enjoy Travel Group estamos cerca de ti. Con oficinas en Cuba, México, República Dominicana y Florida, nuestros expertos locales preparan viajes adaptados a tus necesidades.', 'drdevcustomlanguage' ); ?>
            </p>
            <p class="text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Transporte y alojamiento adaptado:', 'drdevcustomlanguage' ); ?></strong>.
                <?php esc_html_e( 'Sabemos que tu comodidad y seguridad son lo primero. Por eso contamos con coches accesibles y hoteles verificados, pensados para ti.', 'drdevcustomlanguage' ); ?>
            </p>
            <p class="text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Experiencias adaptadas:', 'drdevcustomlanguage' ); ?></strong>.
                <?php esc_html_e( 'Queremos que disfrutes cada momento. Organizamos excursiones y actividades adaptadas para que vivas el destino sin limitaciones.', 'drdevcustomlanguage' ); ?>
            </p>
            <p class="text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Asistencia 24/7:', 'drdevcustomlanguage' ); ?></strong>.
                <?php esc_html_e( 'Estamos contigo en cada paso. Nuestro equipo local te acompaña y resuelve cualquier necesidad las 24 horas.', 'drdevcustomlanguage' ); ?>
            </p>
            <p class="text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Todo incluido desde el inicio:', 'drdevcustomlanguage' ); ?></strong>.
                <?php esc_html_e( 'Nos ocupamos de todo para que viajes tranquilo: visado, seguro de viaje y precios competitivos en todos nuestros programas.', 'drdevcustomlanguage' ); ?>
            </p>
        </div>
        <div class="flex items-center justify-center">
            <?php 
            $alt = __( 'Persona con movilidad reducida con fondo de logo de Enjoy Travel Group', 'drdevcustomlanguage' ); 
            echo drdev_image('/assets/images/home/etg-accesible-logo-silladeruedas.png', $alt, 'h-auto w-auto', '', '418', '544', ''); ?>
        </div>
    </div>
</section>