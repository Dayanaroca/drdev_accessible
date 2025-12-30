<?php
/**
 * Template part for displaying other services content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section aria-labelledby="otros-servicios-title" class="w-full max-w-screen-lg mx-auto px-2.5 lg:px-16 border-b-2 border-b-color19 pb-4">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
    <div>
        <h2 id="otros-servicios-title" class="font-bold text-2xl lg:text-3xl text-black mb-6">
       <?php esc_html_e( 'Otros servicios', 'drdevcustomlanguage' ); ?>
    </h2>
      <ul class="flex flex-col gap-6">
        <li class="flex items-center justify-start gap-4">
            <?php echo drdev_inline_svg('/assets/images/icons/transporte.svg', 'w-10 h-10 rounded-[6.25rem] border border-[#149CBC] flex p-2 justify-center items-center gap-2 flex-shrink-0') ?>
          <span class="text-lg font-semibold text-black">
            <?php esc_html_e( 'Transporte', 'drdevcustomlanguage' ); ?>            
          </span>
        </li>

        <li class="flex items-center justify-start gap-4">
            <?php echo drdev_inline_svg('/assets/images/icons/seguros.svg', 'w-10 h-10 rounded-[6.25rem] border border-[#149CBC] flex p-2 justify-center items-center gap-2 flex-shrink-0') ?>
          <span class="text-lg font-semibold text-black">
            <?php esc_html_e( 'Seguro y asistencia 24/7', 'drdevcustomlanguage' ); ?>              
          </span>
        </li>

        <li class="flex items-center justify-start gap-4">
          <?php echo drdev_inline_svg('/assets/images/icons/ayudas.svg', 'w-10 h-10 rounded-[6.25rem] border border-[#149CBC] flex p-2 justify-center items-center gap-2 flex-shrink-0') ?>
          <span class="text-lg font-semibold text-black">
            <?php esc_html_e( 'Otras ayudas técnicas', 'drdevcustomlanguage' ); ?>             
          </span>
        </li>

        <li class="flex items-center justify-start gap-4">
          <?php echo drdev_inline_svg('/assets/images/icons/medico.svg', 'w-10 h-10 rounded-[6.25rem] border border-[#149CBC] flex p-2 justify-center items-center gap-2 flex-shrink-0') ?>
          <span class="text-lg font-semibold text-black">
            <?php esc_html_e( 'Servicios médicos', 'drdevcustomlanguage' ); ?>             
          </span>
        </li>

        <li class="flex items-center justify-start gap-4">
          <?php echo drdev_inline_svg('/assets/images/icons/dialisis.svg', 'w-10 h-10 rounded-[6.25rem] border border-[#149CBC] flex p-2 justify-center items-center gap-2 flex-shrink-0') ?>
          <span class="text-lg font-semibold text-black">
            <?php esc_html_e( 'Diálisis', 'drdevcustomlanguage' ); ?>             
          </span>
        </li>

        <li class="flex items-center justify-start gap-4">
          <?php echo drdev_inline_svg('/assets/images/icons/mobilidad.svg', 'w-10 h-10 rounded-[6.25rem] border border-[#149CBC] flex p-2 justify-center items-center gap-2 flex-shrink-0') ?>
          <span class="text-lg font-semibold text-black">
            <?php esc_html_e( 'Equipos de movilidad · Scooters', 'drdevcustomlanguage' ); ?>            
          </span>
        </li>
      </ul>
    </div>

    <!-- Columna derecha -->
    <div class="flex justify-center lg:justify-end">
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/scooters/turismo-accessible.png'); ?>"
        alt="<?php echo  __( 'Persona usuaria de scooter eléctrico disfrutando de vacaciones junto a su acompañante en un entorno accesible', 'drdevcustomlanguage' ); ?>"
        class="w-72 h-72 md:w-96 md:h-96 rounded-full object-cover"
        loading="lazy"
      >
    </div>

  </div>
</section>
