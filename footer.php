<?php 

if (!defined('ABSPATH')) exit;
global $drdev_global;
?>
       <footer role="contentinfo" class="accesible-footer bg-color3 text-color11 px-2.5 lg:px-0">
            <div class="max-w-screen-xl mx-auto py-10 lg:py-12">
                <div class="flex flex-col lg:flex-row justify-between">
                    <div class="flex flex-col justify-between items-center mb-6">
                        <!-- Logo -->
                        <div class="text-center md:text-left mb-4 md:mb-0">
                            <?php
                                $logofooter = drdev_image('/assets/images/commons/logo-enjoy-white.png', 'Inicio - Enjoy Travel Group', '', '', '160', '60', 'Inicio - Enjoy Travel Group');
                                echo drdev_link('', '', home_url('/'), 'aria-label="Ir al inicio"', '', '', $logofooter);
                            ?>
                        </div>
                        <div class="text-center md:text-right">
                            <p class="text-xs font-normal text-color11">
                                <span class="md:block"><?php esc_html_e( '© Copyright, 2024.', 'drdevcustomlanguage' ); ?></span>
                                <span class="md:block"><?php esc_html_e( 'Todos los derechos reservados.', 'drdevcustomlanguage' ); ?></span>
                            </p>
                        </div>
                    </div>
                    <!-- Contenido principal del footer -->
                <div class="flex flex-col md:flex-row md:justify-between">
                    <!-- Enlaces en columnas -->
                    <div class="hidden md:grid grid-cols-4 gap-8 flex-1 md:ml-16">
                        <!-- Destinos -->
                        <div>
                            <nav aria-labelledby="heading-destinos">
                                <h4 class="text-base text-white font-bold mb-2">
                                    <?php esc_html_e( 'Destinos', 'drdevcustomlanguage' ); ?>
                                </h4>
                                <ul class="space-y-2">
                                    <li class="flex items-center">
                                        <a href="https://www.enjoytravelgroup.com/cub" target="_blank" class="flex items-center">
                                            <span class="inline-block mr-2">
                                                <?php echo drdev_image_decorative('/assets/images/icons/CU.svg', '', '', '16', '16'); ?>
                                            </span>
                                            <span class="text-xs font-medium"><?php esc_html_e( 'Cuba', 'drdevcustomlanguage' ); ?></span>
                                        </a>
                                    </li>
                                    <li class="flex items-center">
                                        <a href="https://www.enjoytravelgroup.com/mex" target="_blank" class="flex items-center">
                                            <span class="inline-block mr-2">
                                                <?php echo drdev_image_decorative('/assets/images/icons/MX.svg', '', '', '16', '16'); ?>
                                            </span>
                                            <span class="text-xs font-medium"><?php esc_html_e( 'México', 'drdevcustomlanguage' ); ?></span>
                                        </a>
                                    </li>
                                    <li class="flex items-center">
                                        <a href="https://www.enjoytravelgroup.com/dom" target="_blank" class="flex items-center">
                                            <span class="inline-block mr-2">
                                                <?php echo drdev_image_decorative('/assets/images/icons/DR.svg', '', '', '16', '16'); ?>
                                            </span>
                                            <span class="text-xs font-medium"><?php esc_html_e( 'Rep. Dominicana', 'drdevcustomlanguage' ); ?></span>
                                        </a>
                                    </li>
                                    <li class="flex items-center">
                                        <a href="https://www.enjoytravelgroup.com/usa" target="_blank" class="flex items-center">
                                            <span class="inline-block mr-2">
                                                <?php echo drdev_image_decorative('/assets/images/icons/US.svg', '', '', '16', '16'); ?>
                                            </span>
                                            <span class="text-xs font-medium"><?php esc_html_e( 'Florida', 'drdevcustomlanguage' ); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Servicios -->
                        <div>
                            <nav aria-labelledby="heading-servicios">
                                <h4 class="text-base text-white font-bold mb-2">
                                    <?php esc_html_e( 'Servicios', 'drdevcustomlanguage' ); ?>
                                </h4>
                                <ul class="space-y-2">
                                    <li class="flex">
                                        <a href="https://www.enjoytravelgroup.com/viajes" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Viajes', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="https://www.enjoytravelgroup.com/vuelos" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Vuelos', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="https://www.enjoytravelgroup.com/car" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Coches', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="https://www.enjoytravelgroup.com/excursiones" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Excursiones', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Nosotros -->
                        <div>
                            <nav aria-labelledby="heading-nosotros">
                                <h4 class="text-base text-white font-bold mb-2">
                                    <?php esc_html_e( 'Nosotros', 'drdevcustomlanguage' ); ?>
                                </h4>
                                <ul class="space-y-2">
                                    <li class="flex">
                                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'quienes-somos' ) ) ); ?>" class="text-xs font-medium">
                                        <?php esc_html_e( 'Quiénes somos', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="https://blog.enjoytravelgroup.com/" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Blog', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contacto' ) ) ); ?>" class="text-xs font-medium">
                                            <?php esc_html_e( 'Contacto', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Legal -->
                        <div>
                            <nav aria-labelledby="heading-legal">
                                <h4 class="text-base text-white font-bold mb-2">
                                    <?php esc_html_e( 'Legal', 'drdevcustomlanguage' ); ?>
                                </h4>
                                <ul class="space-y-2">
                                    <li class="flex">
                                        <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/legal_en_3zFCiw9.pdf" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Aviso legal', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="https://www.enjoytravelgroup.com/cookies" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Políticas de cookies', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/terms_es_F5HPklc.pdf" target="_blank" class="text-xs font-medium">
                                            <?php esc_html_e( 'Condiciones generales', 'drdevcustomlanguage' ); ?>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Versión Móvil -->
                    <div class="md:hidden">
                        <!-- Acordeones -->
                        <div class="space-y-4">
                            <!-- Acordeón -->
                            <div>
                                <details class="group">
                                    <summary aria-expanded="false" aria-controls="list-destinos" class="flex justify-between items-center cursor-pointer text-base font-bold py-4 border-t-2 border-b-2 border-t-color15">
                                    <?php esc_html_e( 'Destinos', 'drdevcustomlanguage' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <nav aria-labelledby="heading-destinos">
                                        <ul class="mt-2 space-y-2 pl-2">
                                            <li class="flex items-center">
                                                <a href="https://www.enjoytravelgroup.com/cub" target="_blank" class="flex items-center">
                                                    <span class="inline-block mr-2">
                                                        <?php echo drdev_image_decorative('/assets/images/icons/CU.svg', '', '', '16', '16'); ?>
                                                    </span>
                                                    <span class="text-base font-medium"><?php esc_html_e( 'Cuba', 'drdevcustomlanguage' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="flex items-center">
                                                <a href="https://www.enjoytravelgroup.com/mex" target="_blank" class="flex items-center">
                                                    <span class="inline-block mr-2">
                                                        <?php echo drdev_image_decorative('/assets/images/icons/MX.svg', '', '', '16', '16'); ?>
                                                    </span>
                                                    <span class="text-base font-medium"><?php esc_html_e( 'México', 'drdevcustomlanguage' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="flex items-center">
                                                <a href="https://www.enjoytravelgroup.com/dom" target="_blank" class="flex items-center">
                                                    <span class="inline-block mr-2">
                                                        <?php echo drdev_image_decorative('/assets/images/icons/DR.svg', '', '', '16', '16'); ?>
                                                    </span>
                                                    <span class="text-base font-medium"><?php esc_html_e( 'Rep. Dominicana', 'drdevcustomlanguage' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="flex items-center">
                                                <a href="https://www.enjoytravelgroup.com/usa" target="_blank" class="flex items-center">
                                                    <span class="inline-block mr-2">
                                                        <?php echo drdev_image_decorative('/assets/images/icons/US.svg', '', '', '16', '16'); ?>
                                                    </span>
                                                    <span class="text-base font-medium"><?php esc_html_e( 'Florida', 'drdevcustomlanguage' ); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </details>
                            </div>
                            <div>
                                <details class="group">
                                    <summary aria-expanded="false" aria-controls="list-servicios" class="flex justify-between items-center cursor-pointer text-base font-bold pb-4 border-b-2 border-b-color15">
                                    <?php esc_html_e( 'Servicios', 'drdevcustomlanguage' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <nav aria-labelledby="heading-viajes">
                                        <ul class="mt-2 space-y-2 pl-2">
                                            <li class="flex">
                                                <a href="https://www.enjoytravelgroup.com/viajes" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Viajes', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="https://www.enjoytravelgroup.com/vuelos" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Vuelos', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="https://www.enjoytravelgroup.com/car" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Coches', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="https://www.enjoytravelgroup.com/excursiones" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Excursiones', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </details>
                            </div>
                            <div>
                                <details class="group">
                                    <summary aria-expanded="false" aria-controls="list-nosotros" class="flex justify-between items-center cursor-pointer text-base font-bold pb-4 border-b-2 border-b-color15">
                                    <?php esc_html_e( 'Nosotros', 'drdevcustomlanguage' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <nav aria-labelledby="heading-quienessomos">
                                        <ul class="mt-2 space-y-2 pl-2">
                                            <li class="flex">
                                                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'quienes-somos' ) ) ); ?>" class="text-base font-medium">
                                                <?php esc_html_e( 'Quiénes somos', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="https://blog.enjoytravelgroup.com/" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Blog', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contacto' ) ) ); ?>" class="text-base font-medium">
                                                    <?php esc_html_e( 'Contacto', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </details>
                            </div>
                            <div>
                                <details class="group">
                                    <summary aria-expanded="false" aria-controls="list-legal" class="flex justify-between items-center cursor-pointer text-base font-bold pb-4 border-b-2 border-b-color15">
                                    <?php esc_html_e( 'Legal', 'drdevcustomlanguage' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <nav aria-labelledby="heading-legal">
                                        <ul class="mt-2 space-y-2 pl-2">
                                            <li class="flex">
                                                <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/legal_en_3zFCiw9.pdf" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Aviso legal', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="https://www.enjoytravelgroup.com/cookies" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Políticas de cookies', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                            <li class="flex">
                                                <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/terms_es_F5HPklc.pdf" target="_blank" class="text-base font-medium">
                                                    <?php esc_html_e( 'Condiciones generales', 'drdevcustomlanguage' ); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
                </div>      

                <!-- Sección inferior: redes sociales y newsletter -->
                <div class="md:border-t md:border-white/10 pt-0 md:pt-8 mt-8">
                    <div class="flex flex-col items-center gap-4 lg:flex-row lg:justify-between">
                        <!-- Redes sociales -->
                        <div class="mb-6 md:mb-0 w-full lg:w-1/3">
                            <h4 class="text-[0.875rem] font-normal text-color11 mb-2 text-center md:text-left">
                                <?php esc_html_e( 'Si tienes alguna pregunta llámenos 24/7:', 'drdevcustomlanguage' ); ?>
                            </h4>
                            <div class="flex flex-row gap-2 items-center justify-center md:justify-start">
                                <?php
                                    $phone = esc_attr($drdev_global['phone']); 
                                    echo drdev_link('text-[0.8125rem] font-bold text-white',$phone, 'tel:' . $phone, '', 'aria-label="Llamar al número ' . $phone . '"', '', '');
                                ?>
                                <span class="text-white">•</span>
                                <?php
                                    $email = esc_attr($drdev_global['email']);
                                    echo drdev_link('text-[0.8125rem] font-bold text-white', $email, 'mailto:' . $email, '', 'aria-label="Enviar correo a ' . $email . '"', '', '');
                                ?>
                            </div>
                            <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-4">
                                <div class="flex flex-row gap-1 items-center justify-start">
                                   <?php get_template_part('template-parts/commons/content-socialmedia', null, [
                                        'colorClass' => 'text-white',
                                        'iconSize'   => 28,
                                    ]); ?> 
                                </div>
                                <a href="https://wa.me/<?php echo esc_attr($drdev_global['whatsapp']); ?>" class="text-white text-[0.88888rem] font-normal flex flex-row items-center justify-center gap-2" rel="noopener noreferrer">
                                    <?php 
                                    echo drdev_image_decorative('/assets/images/icons/whatsapp-white.svg', '', '', '20', '20'); 
                                    esc_html_e( 'Contacto por WhatsApp', 'drdevcustomlanguage' ); 
                                    ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="w-full lg:w-1/3 py-2">
                            <p class="text-white font-normal text-[0.9375rem] leading-[1.05625rem]">
                                <strong class="font-semibold">
                                    <?php esc_html_e( 'Enjoy Travel Group', 'drdevcustomlanguage' ); ?>
                                </strong>
                                <?php esc_html_e( '- Agencia de viajes con líneas especializadas en', 'drdevcustomlanguage' ); ?>
                                <strong class="font-semibold">
                                    <?php esc_html_e( 'turismo accesible, lujo, LGBT+, MICE', 'drdevcustomlanguage' ); ?>
                                </strong>
                                <?php esc_html_e( 'y programas a la medida en', 'drdevcustomlanguage' ); ?>
                                <strong class="font-semibold">
                                    <?php esc_html_e( 'Cuba, México, República Dominicana y Florida', 'drdevcustomlanguage' ); ?>
                                </strong>
                            </p>
                        </div>
                        <!-- Newsletter -->
                        <div class="w-full md:w-[55%] lg:w-1/4">
                            <h4 class="text-sm font-bold mb-2 text-white">
                                <?php esc_html_e( 'Suscríbete a nuestra Newsletter', 'drdevcustomlanguage' ); ?>                            
                            </h4>
                            <form class="flex flex-col space-y-2">
                                <div class="flex flex-row gap-0">
                                    <input type="email" placeholder="<?php esc_html_e( 'E - mail*', 'drdevcustomlanguage' ); ?>" class="flex-1 px-6 py-2 border border-color12 bg-color13 text-white placeholder-color14 focus:outline-none focus:ring-2 focus:ring-white/50 rounded-l-lg" required />
                                    <button type="submit" class="bg-primary rounded-r-lg text-xs text-white px-4 py-2 font-bold hover:bg-gray-200 transition-colors">
                                        <?php esc_html_e( 'Suscribirse', 'drdevcustomlanguage' ); ?>
                                    </button>
                                </div>
                                <label class="flex items-start text-xs font-medium mt-1">
                                    <input type="checkbox" class="mr-2 mt-1" />
                                    <?php esc_html_e( 'Acepto las políticas de privacidad y recibir información al correo electrónico.', 'drdevcustomlanguage' ); ?>  
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php get_template_part('template-parts/commons/content-contrast-switch'); ?>   
        <?php wp_footer(); ?>
    </body>
</html>