<?php
/**
 * Template part for displaying image with text content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
<section aria-label="<?php echo esc_attr( __( 'Hero todas las entradas', 'drdevsalaprensa' ) ); ?>" 
 class="w-auto lg:w-full max-w-[1100px] mx-2.5 lg:mx-auto mb-6 lg:mb-14">
    <h2 class="font-bold text-4xl text-left leading-[3.375rem] mb-5">
         <span class="block lg:inline">
            <?php esc_html_e( 'Viaja mejor,', 'drdevcustomlanguage' ); ?>
        </span>
        <span class="block lg:inline">
            <?php esc_html_e( 'de forma inclusiva', 'drdevcustomlanguage' ); ?>
        </span>
    </h2>
    <div class="flex flex-col lg:flex-row gap-4">
        <div class="flex flex-col align-center justify-start gap-5 w-full lg:w-3/5">
            <p class="text-xl text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Oficinas locales y atención personalizada:', 'drdevsalaprensa' ); ?></strong>.
                <?php esc_html_e( 'En Enjoy Travel Group estamos cerca de ti. Con oficinas en Cuba, México, República Dominicana y Florida, nuestros expertos locales preparan viajes adaptados a tus necesidades.', 'drdevsalaprensa' ); ?>
            </p>
            <p class="text-xl text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Transporte y alojamiento adaptado:', 'drdevsalaprensa' ); ?></strong>.
                <?php esc_html_e( 'Sabemos que tu comodidad y seguridad son lo primero. Por eso contamos con coches accesibles y hoteles verificados, pensados para ti.', 'drdevsalaprensa' ); ?>
            </p>
            <p class="text-xl text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Experiencias adaptadas:', 'drdevsalaprensa' ); ?></strong>.
                <?php esc_html_e( 'Queremos que disfrutes cada momento. Organizamos excursiones y actividades adaptadas para que vivas el destino sin limitaciones.', 'drdevsalaprensa' ); ?>
            </p>
            <p class="text-xl text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Asistencia 24/7:', 'drdevsalaprensa' ); ?></strong>.
                <?php esc_html_e( 'Estamos contigo en cada paso. Nuestro equipo local te acompaña y resuelve cualquier necesidad las 24 horas.', 'drdevsalaprensa' ); ?>
            </p>
            <p class="text-xl text-left font-medium border-l-2 border-secondary pl-4">
                <strong><?php esc_html_e( 'Todo incluido desde el inicio:', 'drdevsalaprensa' ); ?></strong>.
                <?php esc_html_e( 'Nos ocupamos de todo para que viajes tranquilo: visado, seguro de viaje y precios competitivos en todos nuestros programas.', 'drdevsalaprensa' ); ?>
            </p>
        </div>
        <div class="">
            <?php echo drdev_image_decorative('/assets/images/home/etg-accesible-logo-silladeruedas.png', 'h-auto w-auto', '', '418', '544'); ?>
        </div>
    </div>
</section>