<?php
/**
 * Template part for displaying cita content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<section id="cita-yudith" aria-labelledby="cita-yudith-title" class="relative w-full max-w-screen-etg mx-auto my-10 px-2.5 lg:px-0">
  <!-- Contenedor del fondo -->
  <div class="relative h-[305px] md:h-[235px] overflow-hidden md:overflow-visible z-10 rounded-custom">
    <!-- Imagen de fondo -->
    <?= drdev_image_decorative('/assets/images/commons/bg-yudith.png', 'w-full h-full rounded-[10px] object-cover object-bottom', '', '', ''); ?>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-[rgba(2,67,105,0.75)] z-10 rounded-[10px]"></div>
    <div class="absolute inset-0 flex flex-col justify-center pl-6 lg:pl-10 z-20 w-full max-w-56 md:max-w-lg lg:max-w-2xl">
      <p class="text-white text-2xl lg:text-4xl font-bold mb-2">
        <?php esc_html_e( '¡Hola, soy Yudith!', 'drdevcustomlanguage' ); ?>        
      </p>
      <h2 class="text-white text-base lg:text-2xl font-medium">
        <?php esc_html_e( 'Y quiero ayudarte a realizar el viaje de tus sueños. ¿Aún tienes dudas? Agenda una ', 'drdevcustomlanguage' ); ?>
        <strong><?php esc_html_e( 'cita gratis', 'drdevcustomlanguage' ); ?></strong>
        <?php esc_html_e( 'con uno de nuestros asesores', 'drdevcustomlanguage' ); ?>.
      </h2>
      <a 
        href="https://calendly.com/enjoytravelgroup"
        target="_blank"
        class="btn-primary w-fit mt-5"
      >
        Agendar cita
      </a>
    </div>
      <?= drdev_image_decorative('/assets/images/commons/semicircle.svg', 'hidden md:block object-cover object-bottom z-20 absolute bottom-0 right-5', '', '300', '158'); ?>
      <?= drdev_image_decorative('/assets/images/commons/yudith.png', 'object-cover object-bottom z-10 md:z-30 absolute bottom-0 -right-12 md:right-10', '', '272', '281'); ?>
  </div> 
</section>