<?php
/**
 * Template part for displaying diefernt content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
<section aria-labelledby="nos-diferencia-title"  class="w-auto lg:w-full max-w-[1000px] mx-2.5 lg:mx-auto">
    <h2 class="font-bold text-3xl text-left leading-[3.375rem] mb-3">
        <?php esc_html_e( 'Lo que nos diferencia', 'drdevcustomlanguage' ); ?>
    </h2>
    <div class="flex flex-col gap-4 border-l-2 border-secondary pl-4">
        <p class="text-lg text-left font-medium">
            <span class="font-bold"><?php esc_html_e( 'Profesionalidad y especialización:', 'drdevcustomlanguage' ); ?></span>
            <?php esc_html_e( 'contamos con un equipo formado de manera continua en turismo accesible y en atención a viajeros con diferentes necesidades.', 'drdevcustomlanguage' ); ?>
        </p>
        <p class="text-lg text-left font-medium">
            <span class="font-bold"><?php esc_html_e( 'Presencia local:', 'drdevcustomlanguage' ); ?></span>
            <?php esc_html_e( 'disponemos de equipos en Cuba, México, República Dominicana, Estados Unidos y Canadá para garantizar experiencias auténticas y asistencia 24 horas.', 'drdevcustomlanguage' ); ?>
        </p>
        <p class="text-lg text-left font-medium">
            <span class="font-bold"><?php esc_html_e( 'Compromiso social:', 'drdevcustomlanguage' ); ?></span>
            <?php esc_html_e( 'trabajamos alineados con los Objetivos de Desarrollo Sostenible 2030 y el Código Ético Mundial del Turismo de ONU Turismo, fomentando un turismo responsable e inclusivo.', 'drdevcustomlanguage' ); ?>
        </p>
        <p class="text-lg text-left font-medium">
            <span class="font-bold"><?php esc_html_e( 'Atención personalizada:', 'drdevcustomlanguage' ); ?></span>
            <?php esc_html_e( 'escuchamos, comprendemos y adaptamos cada itinerario a las necesidades y expectativas de nuestros viajeros, creando experiencias únicas y memorables.', 'drdevcustomlanguage' ); ?>
        </p>
    </div>
</section>