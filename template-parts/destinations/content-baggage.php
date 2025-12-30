 <?php
/**
 * content baggage 
 */

if (!defined('ABSPATH')) exit;
?>
<section class="flex flex-col lg:flex-row gap-6 border-b-2 border-b-primary w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
    <div class="flex flex-col gap-4 w-full lg:w-[70%]">
        <h2 class="font-bold text-2xl lg:text-3xl text-black mb-2">
            <?php esc_html_e( 'Equipaje', 'drdevcustomlanguage' ); ?>
        </h2>
         <p class="text-lg text-baseblack font-medium">
            <?php esc_html_e( 'Viajar ligero siempre es un placer, pero también es importante saber que cuentas con espacio suficiente para lo esencial.', 'drdevcustomlanguage' ); ?>
        </p> 
        <ul class="list-disc list-inside pl-4 flex flex-col gap-2">
            <li class="li-white text-lg text-baseblack font-medium">
                <span class="font-bold">
                    <?php esc_html_e( 'En todos los vehículos:', 'drdevcustomlanguage' ); ?>
                </span>
                <span><?php esc_html_e( 'cada pasajero puede llevar una maleta de hasta 23 kg y una bolsa de mano, perfecta para mantener cerca tus objetos más importantes.', 'drdevcustomlanguage' ); ?> </span>
            </li>
            <li class="li-white text-lg text-baseblack font-medium">
                <span class="font-bold">
                    <?php esc_html_e( 'En vehículo estándar:', 'drdevcustomlanguage' ); ?>
                </span>
                <span><?php esc_html_e( 'se puede transportar una silla de ruedas, que deberá ser plegable para aprovechar mejor el espacio.', 'drdevcustomlanguage' ); ?></span>
            </li>
             <li class="li-white text-lg text-baseblack font-medium">
                 <span class="font-bold">
                    <?php esc_html_e( 'En transporte adaptado:', 'drdevcustomlanguage' ); ?></span>
                </span>
                <span><?php esc_html_e( 'puedes viajar cómodamente en tu propia silla de ruedas o, si lo prefieres, transferirte a un asiento del vehículo.', 'drdevcustomlanguage' ); ?>
            </li>
        </ul>   
    </div>
    <div class="w-full lg:w-[30%]">
         <?php 
        $alt2 = __( 'Persona usuaria de silla de ruedas con su equipaje', 'drdevcustomlanguage' ); 
        echo drdev_image('/assets/images/travels/equipaje.png',$alt2, 'w-full h-auto object-cover rounded-[0.625rem]', '', '287', '324', $alt2); 
        ?>
    </div>
</section>