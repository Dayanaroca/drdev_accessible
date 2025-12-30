<?php
/**
 * Template part for displaying scooters content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<section aria-labelledby="modelos-disponibles" class="flex flex-col gap-4 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
    <h2 id="modelos-disponibles" class="font-bold text-2xl lg:text-3xl text-black">
       <?php esc_html_e( 'Modelos disponibles', 'drdevcustomlanguage' ); ?>
    </h2>
    <p class="text-lg text-baseblack font-medium">
        <span class="font-bold"><?php esc_html_e( '¿No sabes cuál elegir?', 'drdevcustomlanguage' ); ?></span>
        <?php esc_html_e( 'Nuestro equipo te asesora según tu destino.', 'drdevcustomlanguage' ); ?>
    </p>

    <div class="accesible-seccion flex flex-col lg:flex-row gap-6 bg-color1 rounded-custom border-card overflow-visible mt-12">
        <div class="flex-1 flex flex-col ">
            <div class="w-full h-64 overflow-hidden -mt-12">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/scooters/scooters-gran-canaria.png' ); ?>" 
                    alt="Scooter Gran Canaria" 
                    class="w-full h-full object-contain imgcustom"
                    loading="lazy">
            </div>
            <div class="flex gap-2 p-4 justify-evenly">
                <?php
                $thumbs = ['lateral.png','frontal.png','trasera.png'];
                foreach ($thumbs as $thumb): ?>
                    <div class="w-20 h-20 overflow-hidden rounded">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/scooters/' . $thumb ); ?>" 
                            alt="Miniatura <?php echo esc_attr( $thumb ); ?> del scooters" 
                            class="w-full h-full object-cover"
                            loading="lazy" alt="" aria-hidden="true">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex-1 flex flex-col gap-3 px-4 pb-0 lg:pb-4 pt-8 justify-end ">
            <p class="text-base font-normal text-black"><?php esc_html_e( 'Modelo,', 'drdevcustomlanguage' ); ?></p>
            <p class="text-3xl font-black text-black"><?php esc_html_e( 'Gran Canaria', 'drdevcustomlanguage' ); ?></p>
            <div class="flex items-start gap-2 ">
                        <svg class="icon-svg w-6 h-6 text-gray-700 flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                            <path d="M20 18v-3h-2v3h-3v2h3v3h2v-3h3v-2zM18 4h2v9h-2zM4 4h2v16H4zm7 0h2v4h-2zm0 6h2v4h-2zm0 6h2v4h-2z"></path>
                        </svg>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Entorno ideal: Calles, cascos históricos', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
            <div aria-hidden="true" class="h-[1px] w-full bg-black"></div>
             <div class="flex items-start gap-2">
                <?php echo drdev_inline_svg('/assets/images/icons/battery_android_plus.svg', 'icon-svg w-6 h-6 flex-shrink-0'); ?>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Autonomía: 40–45 km', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
            <div aria-hidden="true" class="h-[1px] w-full bg-black"></div>
            <div class="flex items-start gap-2">
                <svg class="icon-svg w-6 h-6 text-gray-700 flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                            <path d="M14 11V8c4.56-.58 8-3.1 8-6H2c0 2.9 3.44 5.42 8 6v3c-3.68.73-8 3.61-8 11h6v-2H4.13c.93-6.83 6.65-7.2 7.87-7.2s6.94.37 7.87 7.2H16v2h6c0-7.39-4.32-10.27-8-11m-2 11c-1.1 0-2-.9-2-2 0-.55.22-1.05.59-1.41C11.39 17.79 16 16 16 16s-1.79 4.61-2.59 5.41c-.36.37-.86.59-1.41.59"></path>
                        </svg>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Peso máximo: 181 kg', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
            <div aria-hidden="true" class="h-[1px] w-full bg-black"></div>
            <div class="flex items-start gap-2">
                <svg class="icon-svg w-6 h-6 text-gray-700 flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h10v-2H4v-6h18V6c0-1.11-.89-2-2-2m0 4H4V6h16zm4 9v2h-3v3h-2v-3h-3v-2h3v-3h2v3z"></path>
                        </svg>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Precio desde: €44 EUR/día', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
        </div>

        <div class="flex-1 px-4 py-4 flex items-end justify-center ">
                <?php 
                    $link = '#contact-form-general';
                    $text = __( 'Reservar scooter', 'drdevcustomlanguage' );
                    echo drdev_link('btn-primary w-full', $text, $link, '', '', '', '' );
                ?>
        </div>
    </div>

    <div class="accesible-seccion flex flex-col lg:flex-row gap-6 bg-color1 rounded-custom border-card overflow-visible mt-12">
        <div class="flex-1 flex flex-col ">
            <div class="w-full h-64 overflow-hidden -mt-12">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/scooters/scooters-mallorka.png' ); ?>" 
                    alt="Scooter Mallorka" 
                    class="w-full h-full object-contain imgcustom"
                    loading="lazy">
            </div>
            <div class="flex gap-2 p-4 justify-evenly">
                <?php
                $thumbs = ['lateral.png','frontal.png','trasera.png'];
                foreach ($thumbs as $thumb): ?>
                    <div class="w-20 h-20 overflow-hidden rounded">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/scooters/mallorka/' . $thumb ); ?>" 
                            alt="Miniatura <?php echo esc_attr( $thumb ); ?> del scooters" 
                            class="w-full h-full object-cover"
                            loading="lazy" alt="" aria-hidden="true">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex-1 flex flex-col gap-3 px-4 pb-0 lg:pb-4 pt-8 justify-end ">
            <p class="text-base font-normal text-black"><?php esc_html_e( 'Modelo,', 'drdevcustomlanguage' ); ?></p>
            <p class="text-3xl font-black text-black"><?php esc_html_e( 'Mallorka', 'drdevcustomlanguage' ); ?></p>
            <div class="flex items-start gap-2 ">
                        <svg class="icon-svg w-6 h-6 text-gray-700 flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                            <path d="M20 18v-3h-2v3h-3v2h3v3h2v-3h3v-2zM18 4h2v9h-2zM4 4h2v16H4zm7 0h2v4h-2zm0 6h2v4h-2zm0 6h2v4h-2z"></path>
                        </svg>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Resorts, zonas planas', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
            <div aria-hidden="true" class="h-[1px] w-full bg-black"></div>
             <div class="flex items-start gap-2">
                 <?php echo drdev_inline_svg('/assets/images/icons/battery_android_plus.svg', 'icon-svg w-6 h-6 flex-shrink-0'); ?>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Autonomía: 30–40 km', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
            <div aria-hidden="true" class="h-[1px] w-full bg-black"></div>
            <div class="flex items-start gap-2">
                <svg class="icon-svg w-6 h-6 text-gray-700 flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                            <path d="M14 11V8c4.56-.58 8-3.1 8-6H2c0 2.9 3.44 5.42 8 6v3c-3.68.73-8 3.61-8 11h6v-2H4.13c.93-6.83 6.65-7.2 7.87-7.2s6.94.37 7.87 7.2H16v2h6c0-7.39-4.32-10.27-8-11m-2 11c-1.1 0-2-.9-2-2 0-.55.22-1.05.59-1.41C11.39 17.79 16 16 16 16s-1.79 4.61-2.59 5.41c-.36.37-.86.59-1.41.59"></path>
                        </svg>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Peso máximo: 136 kg', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
            <div aria-hidden="true" class="h-[1px] w-full bg-black"></div>
            <div class="flex items-start gap-2">
                <svg class="icon-svg w-6 h-6 text-gray-700 flex-shrink-0" aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h10v-2H4v-6h18V6c0-1.11-.89-2-2-2m0 4H4V6h16zm4 9v2h-3v3h-2v-3h-3v-2h3v-3h2v3z"></path>
                        </svg>
                <p class="text-lg font-medium text-black">
                    <?php esc_html_e( 'Precio desde: $45 USD/día', 'drdevcustomlanguage' ); ?>
                </p>
            </div>
        </div>

        <div class="flex-1 px-4 py-4 flex items-end justify-center ">
                <?php 
                    $link = '#contact-form-general';
                    $text = __( 'Reservar scooter', 'drdevcustomlanguage' );
                    echo drdev_link('btn-primary w-full', $text, $link, '', '', '', '' );
                ?>
        </div>
    </div>
</section>