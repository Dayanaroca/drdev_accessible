 <?php
/**
 * content transport 
 */

if (!defined('ABSPATH')) exit;
?>
<div class="flex flex-col gap-4">
    <h2 class="font-bold text-2xl lg:text-3xl text-black">
       <?php esc_html_e( 'Transporte', 'drdevcustomlanguage' ); ?>
    </h2>
    <p class="text-lg text-baseblack font-medium">
        <?php esc_html_e( 'Para que disfrutes cada instante sin preocupaciones, hemos pensado en cada detalle de tu traslado.', 'drdevcustomlanguage' ); ?>
    </p>
    <div class="flex flex-row gap-3 items-start lg:items-center justify-start  border lg:border-color6 rounded-[0.625rem] p-4">
        <?php echo drdev_inline_svg('/assets/images/icons/airport_shuttle.svg', 'icon-svg', '', '40', '40'); ?>
        <div class="w-[2px] bg-black self-stretch" aria-hidden="true" role="presentation"></div>
        <p class="text-lg text-baseblack font-medium">
            <span class="font-bold uppercase lg:normal-case"><?php esc_html_e( 'Van adaptada:', 'drdevcustomlanguage' ); ?></span>
             <?php esc_html_e( 'equipada con plataforma elevadora y sistemas de seguridad, para que puedas viajar cómodamente en tu propia silla de ruedas, sintiendo que cada trayecto es parte de la experiencia.', 'drdevcustomlanguage' ); ?>
        </p>
    </div>
    <div class="flex flex-row items-start lg:items-center justify-start gap-3 border lg:border-color6 rounded-[0.625rem] p-4">
        <?php echo drdev_inline_svg('/assets/images/icons/directions_car.svg', 'icon-svg', '', '40', '40'); ?>
        <div class="w-[2px] bg-black self-stretch" aria-hidden="true" role="presentation"></div>
        <p class="text-lg text-baseblack font-medium">
            <span class="font-bold uppercase lg:normal-case"><?php esc_html_e( 'Vehículo estándar:', 'drdevcustomlanguage' ); ?></span>
             <?php esc_html_e( 'ideal para quienes pueden realizar la transferencia a un asiento, con un amplio maletero para equipaje y ayudas técnicas. Capacidad para un usuario de silla de ruedas y hasta dos acompañantes.', 'drdevcustomlanguage' ); ?>
        </p>
    </div>
    <p class="text-lg text-baseblack font-medium italic">
        <span class="font-bold"><?php esc_html_e( 'Transporte privado con chofer:', 'drdevcustomlanguage' ); ?></span>
        <?php esc_html_e( 'seleccionamos el vehículo según tus necesidades, condiciones físicas y número de pasajeros, para que cada kilómetro esté hecho a tu medida.', 'drdevcustomlanguage'  ); ?>
    </p>
    <div class="flex flex-col md:flex-row gap-[1.125rem] w-full">
        <div class="w-full lg:w-1/2">
        <?php 
        $alt = __( 'Personas subiendo a vehículo', 'drdevcustomlanguage' ); 
        echo drdev_image('/assets/images/travels/transport1.png',$alt, 'w-full h-auto object-cover max-h-[297px] rounded-[0.625rem]', '', '400', '297', $alt); ?>
        </div>
        <div class="w-full lg:w-1/2">
        <?php 
        $alt2 = __( 'Imagen de vehículo', 'drdevcustomlanguage' ); 
        echo drdev_image('/assets/images/travels/transport2.png',$alt2, 'w-full h-auto object-cover max-h-[297px] rounded-[0.625rem]', '', '400', '297', $alt2); 
        ?>
        </div>
    </div>
</div>