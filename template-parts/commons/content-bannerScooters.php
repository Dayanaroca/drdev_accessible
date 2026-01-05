<?php
/**
 * Template part for displaying banners scooters content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<section id="cita-banner-scooters" class="relative w-full  max-w-screen-etg mx-auto px-2.5 lg:px-0 rounded-custom">
    <div class="bg-scooter flex flex-col items-end justify-end w-full min-h-[30rem] md:min-h-[60rem] lg:min-h-[28rem] rounded-custom">
    <div class="flex flex-col items-center lg:items-end gap-4 lg:gap-2 justify-end p-6 lg:p-8 w-full lg:w-[52rem]">
        <h2  id="cita-banner-scooters-title" class="text-white font-bold uppercase text-2xl md:text-5xl text-center lg:text-right tracking-[0.08719rem]">
            <span class="inline lg:block">
                <?php esc_html_e( 'Vive la experiencia', 'drdevcustomlanguage' ); ?>
            </span>

            <span class="inline lg:inline">
                <?php esc_html_e( ' de moverte sin barreras', 'drdevcustomlanguage' ); ?>
            </span>
        </h2>
        <p class="text-white text-base md:text-2xl font-medium text-center lg:text-right tracking-[0.045rem]">
             <?php esc_html_e( 'Servicio exclusivo de', 'drdevcustomlanguage' ); ?>
            <span class="font-black"><?php esc_html_e( 'alquiler de scooters accesibles', 'drdevcustomlanguage' ); ?></span>
            <?php esc_html_e( 'para que disfrutes tu viaje con comodidad y sin preocupaciones.', 'drdevcustomlanguage' ); ?>
        </p>
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center w-full lg:w-auto">
            <?php 
            $text= __( 'Reserva tu scooter', 'drdevcustomlanguage' ); 
            $text2= __( 'Descarga nuestro catálogo', 'drdevcustomlanguage' ); 
            echo drdev_link('btn-primary w-full lg:w-auto', $text, '#'); 
            echo drdev_link('btn-secondary w-full lg:w-auto', $text2, '#'); ?>
        </div>
    </div>
    </div>
</section>