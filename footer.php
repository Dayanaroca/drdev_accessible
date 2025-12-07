<?php 

if (!defined('ABSPATH')) exit;
global $drdev_global;
?>
       <footer role="contentinfo" class="bg-color3 text-color11 px-2.5 lg:px-0">
            <div class="max-w-screen-xl mx-auto py-10 lg:py-12">
                <div class="flex flex-col lg:flex-row justify-between">
                    <div class="flex flex-col justify-between items-center mb-6">
                        <!-- Logo -->
                        <div class="text-center md:text-left mb-4 md:mb-0">
                            <?php
                                $logofooter = drdev_image('/assets/images/commons/logo-enjoy-white.png', 'Logo ETG', '', '', '160', '60', 'Logo ETG');
                                echo drdev_link('', '', '#', '', '', '', $logofooter);
                            ?>
                        </div>
                        <div class="text-center md:text-right">
                            <p class="text-xs font-normal text-color11">
                                <span class="md:block"><?php esc_html_e( '© Copyright, 2024.', 'drdevsalaprensa' ); ?></span>
                                <span class="md:block"><?php esc_html_e( 'Todos los derechos reservados.', 'drdevsalaprensa' ); ?></span>
                            </p>
                        </div>
                    </div>
                    <!-- Contenido principal del footer -->
                <div class="flex flex-col md:flex-row md:justify-between">
                    <!-- Enlaces en columnas -->
                    <div class="hidden md:grid grid-cols-4 gap-8 flex-1 md:ml-16">
                        <!-- Destinos -->
                        <div>
                            <h4 class="text-base text-white font-bold mb-2">
                                <?php esc_html_e( 'Destinos', 'drdevsalaprensa' ); ?>
                            </h4>
                        <ul class="space-y-2">
                                <li class="flex items-center">
                                    <a href="https://www.enjoytravelgroup.com/cub" target="_blank" class="flex items-center">
                                        <span class="inline-block mr-2">
                                            <?php echo drdev_image_decorative('/assets/images/icons/CU.svg', '', '', '16', '16'); ?>
                                        </span>
                                        <span class="text-xs font-medium"><?php esc_html_e( 'Cuba', 'drdevsalaprensa' ); ?></span>
                                    </a>
                                </li>
                                <li class="flex items-center">
                                    <a href="https://www.enjoytravelgroup.com/mex" target="_blank" class="flex items-center">
                                        <span class="inline-block mr-2">
                                            <?php echo drdev_image_decorative('/assets/images/icons/MX.svg', '', '', '16', '16'); ?>
                                        </span>
                                        <span class="text-xs font-medium"><?php esc_html_e( 'México', 'drdevsalaprensa' ); ?></span>
                                    </a>
                                </li>
                                <li class="flex items-center">
                                    <a href="https://www.enjoytravelgroup.com/dom" target="_blank" class="flex items-center">
                                        <span class="inline-block mr-2">
                                            <?php echo drdev_image_decorative('/assets/images/icons/DR.svg', '', '', '16', '16'); ?>
                                        </span>
                                        <span class="text-xs font-medium"><?php esc_html_e( 'Rep. Dominicana', 'drdevsalaprensa' ); ?></span>
                                    </a>
                                </li>
                                <li class="flex items-center">
                                    <a href="https://www.enjoytravelgroup.com/usa" target="_blank" class="flex items-center">
                                        <span class="inline-block mr-2">
                                            <?php echo drdev_image_decorative('/assets/images/icons/US.svg', '', '', '16', '16'); ?>
                                        </span>
                                        <span class="text-xs font-medium"><?php esc_html_e( 'Florida', 'drdevsalaprensa' ); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Servicios -->
                        <div>
                            <h4 class="text-base text-white font-bold mb-2">
                                <?php esc_html_e( 'Servicios', 'drdevsalaprensa' ); ?>
                            </h4>
                            <ul class="space-y-2">
                                <li class="flex">
                                    <a href="https://www.enjoytravelgroup.com/viajes" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Viajes', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="https://www.enjoytravelgroup.com/vuelos" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Vuelos', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="https://www.enjoytravelgroup.com/car" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Coches', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="https://www.enjoytravelgroup.com/excursiones" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Excursiones', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Nosotros -->
                        <div>
                            <h4 class="text-base text-white font-bold mb-2">
                                <?php esc_html_e( 'Nosotros', 'drdevsalaprensa' ); ?>
                            </h4>
                            <ul class="space-y-2">
                                <li class="flex">
                                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'quienes-somos' ) ) ); ?>" class="text-xs font-medium">
                                    <?php esc_html_e( 'Quiénes somos', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="https://blog.enjoytravelgroup.com/" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Blog', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contacto' ) ) ); ?>" class="text-xs font-medium">
                                        <?php esc_html_e( 'Contacto', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Legal -->
                        <div>
                            <h4 class="text-base text-white font-bold mb-2">
                                <?php esc_html_e( 'Legal', 'drdevsalaprensa' ); ?>
                            </h4>
                            <ul class="space-y-2">
                                <li class="flex">
                                    <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/legal_en_3zFCiw9.pdf" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Aviso legal', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="https://www.enjoytravelgroup.com/cookies" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Políticas de cookies', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/terms_es_F5HPklc.pdf" target="_blank" class="text-xs font-medium">
                                        <?php esc_html_e( 'Condiciones generales', 'drdevsalaprensa' ); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Versión Móvil -->
                    <div class="md:hidden">
                        <!-- Acordeones -->
                        <div class="space-y-4">
                            <!-- Acordeón -->
                            <div>
                                <details class="group">
                                    <summary class="flex justify-between items-center cursor-pointer text-base font-bold py-4 border-t-2 border-b-2 border-t-color15">
                                    <?php esc_html_e( 'Destinos', 'drdevsalaprensa' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <ul class="mt-2 space-y-2 pl-2">
                                        <li class="flex items-center">
                                            <a href="https://www.enjoytravelgroup.com/cub" target="_blank" class="flex items-center">
                                                <span class="inline-block mr-2">
                                                    <?php echo drdev_image_decorative('/assets/images/icons/CU.svg', '', '', '16', '16'); ?>
                                                </span>
                                                <span class="text-base font-medium"><?php esc_html_e( 'Cuba', 'drdevsalaprensa' ); ?></span>
                                            </a>
                                        </li>
                                        <li class="flex items-center">
                                            <a href="https://www.enjoytravelgroup.com/mex" target="_blank" class="flex items-center">
                                                <span class="inline-block mr-2">
                                                    <?php echo drdev_image_decorative('/assets/images/icons/MX.svg', '', '', '16', '16'); ?>
                                                </span>
                                                <span class="text-base font-medium"><?php esc_html_e( 'México', 'drdevsalaprensa' ); ?></span>
                                            </a>
                                        </li>
                                        <li class="flex items-center">
                                            <a href="https://www.enjoytravelgroup.com/dom" target="_blank" class="flex items-center">
                                                <span class="inline-block mr-2">
                                                    <?php echo drdev_image_decorative('/assets/images/icons/DR.svg', '', '', '16', '16'); ?>
                                                </span>
                                                <span class="text-base font-medium"><?php esc_html_e( 'Rep. Dominicana', 'drdevsalaprensa' ); ?></span>
                                            </a>
                                        </li>
                                        <li class="flex items-center">
                                            <a href="https://www.enjoytravelgroup.com/usa" target="_blank" class="flex items-center">
                                                <span class="inline-block mr-2">
                                                    <?php echo drdev_image_decorative('/assets/images/icons/US.svg', '', '', '16', '16'); ?>
                                                </span>
                                                <span class="text-base font-medium"><?php esc_html_e( 'Florida', 'drdevsalaprensa' ); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </div>
                            <div>
                                <details class="group">
                                    <summary class="flex justify-between items-center cursor-pointer text-base font-bold pb-4 border-b-2 border-b-color15">
                                    <?php esc_html_e( 'Servicios', 'drdevsalaprensa' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <ul class="mt-2 space-y-2 pl-2">
                                        <li class="flex">
                                            <a href="https://www.enjoytravelgroup.com/viajes" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Viajes', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="https://www.enjoytravelgroup.com/vuelos" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Vuelos', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="https://www.enjoytravelgroup.com/car" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Coches', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="https://www.enjoytravelgroup.com/excursiones" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Excursiones', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </div>
                            <div>
                                <details class="group">
                                    <summary class="flex justify-between items-center cursor-pointer text-base font-bold pb-4 border-b-2 border-b-color15">
                                    <?php esc_html_e( 'Nosotros', 'drdevsalaprensa' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <ul class="mt-2 space-y-2 pl-2">
                                        <li class="flex">
                                            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'quienes-somos' ) ) ); ?>" class="text-base font-medium">
                                            <?php esc_html_e( 'Quiénes somos', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="https://blog.enjoytravelgroup.com/" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Blog', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contacto' ) ) ); ?>" class="text-base font-medium">
                                                <?php esc_html_e( 'Contacto', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </div>
                            <div>
                                <details class="group">
                                    <summary class="flex justify-between items-center cursor-pointer text-base font-bold pb-4 border-b-2 border-b-color15">
                                    <?php esc_html_e( 'Legal', 'drdevsalaprensa' ); ?>
                                        <?php echo drdev_image_decorative('/assets/images/icons/arrow-down.svg', '', '', '10', '10'); ?>
                                    </summary>
                                    <ul class="mt-2 space-y-2 pl-2">
                                        <li class="flex">
                                            <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/legal_en_3zFCiw9.pdf" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Aviso legal', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="https://www.enjoytravelgroup.com/cookies" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Políticas de cookies', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a href="https://b2b-travel-prod.s3.amazonaws.com/b2b_scope/uploads/legal_documents/terms_es_F5HPklc.pdf" target="_blank" class="text-base font-medium">
                                                <?php esc_html_e( 'Condiciones generales', 'drdevsalaprensa' ); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
                </div>      

                <!-- Sección inferior: redes sociales y newsletter -->
                <div class="md:border-t md:border-white/10 pt-0 md:pt-8 mt-8">
                    <div class="flex flex-col md:flex-row md:justify-between">
                        <!-- Redes sociales -->
                        <div class="mb-6 md:mb-0">
                            <h4 class="text-[0.875rem] font-normal text-color11 mb-2 text-center md:text-left">
                                <?php esc_html_e( 'Si tienes alguna pregunta llámenos 24/7:', 'drdevsalaprensa' ); ?>
                            </h4>
                            <div class="flex flex-row gap-2 items-center justify-center md:justify-start">
                                <?php
                                    $phone = esc_attr($drdev_global['phone']); 
                                    echo drdev_link('text-[0.8125rem] font-bold text-white',$phone, 'tel:' . $phone, '', '', '', '');
                                ?>
                                <span class="text-white">•</span>
                                <?php
                                    $email = esc_attr($drdev_global['email']);
                                    echo drdev_link('text-[0.8125rem] font-bold text-white', $email, 'mailto:' . $email, '', '', '', '');
                                ?>
                            </div>
                            <div class="flex flex-col md:flex-row items-center justify-center gap-6 mt-4">
                                <div class="flex flex-row gap-1 items-center justify-start">
                                   <?php get_template_part('template-parts/commons/content-socialmedia', null, [
                                        'colorClass' => 'text-white',
                                        'iconSize'   => 28,
                                    ]); ?> 
                                </div>
                                <a href="https://wa.me/<?php echo esc_attr($drdev_global['whatsapp']); ?>" class="text-white text-[0.88888rem] font-normal flex flex-row items-center justify-center gap-2">
                                    <?php 
                                    echo drdev_image_decorative('/assets/images/icons/whatsapp-white.svg', '', '', '20', '20'); 
                                    esc_html_e( 'Contacto por WhatsApp', 'drdevsalaprensa' ); 
                                    ?>
                                </a>
                            </div>
                        </div>

                        <!-- Newsletter -->
                        <div class="md:w-[55%] lg:w-[25%]">
                            <h4 class="text-sm font-bold mb-2 text-white">
                                <?php esc_html_e( 'Suscríbete a nuestra Newsletter', 'drdevsalaprensa' ); ?>                            
                            </h4>
                            <form class="flex flex-col space-y-2">
                                <div class="flex flex-row gap-0">
                                    <input type="email" placeholder="<?php esc_html_e( 'E - mail*', 'drdevsalaprensa' ); ?>" class="flex-1 px-6 py-2 border border-color12 bg-color13 text-white placeholder-color14 focus:outline-none focus:ring-2 focus:ring-white/50 rounded-l-lg" required />
                                    <button type="submit" class="bg-primary rounded-r-lg text-xs text-white px-4 py-2 font-bold hover:bg-gray-200 transition-colors">
                                        <?php esc_html_e( 'Suscribirse', 'drdevsalaprensa' ); ?>
                                    </button>
                                </div>
                                <label class="flex items-start text-xs font-medium mt-1">
                                    <input type="checkbox" class="mr-2 mt-1" />
                                    <?php esc_html_e( 'Acepto las políticas de privacidad y recibir información al correo electrónico.', 'drdevsalaprensa' ); ?>  
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