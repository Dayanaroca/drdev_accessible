<?php
/**
 * Template part for displaying card width button content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
  ?>
<div id="mobile-menu" class="fixed inset-y-0 right-0 w-72 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-40 p-6 flex flex-col gap-6" role="dialog" aria-label="Menú principal"  aria-modal="true"  aria-labelledby="mobile-menu-label" aria-hidden="true" hidden>
    <div class="flex flex-row justify-between items-center">
        <h2 id="mobile-menu-label" class="sr-only">
            <?php esc_html_e('Menú principal', 'drdevcustomlanguage'); ?>
        </h2>
        <?=  do_shortcode('[wpml_language_selector_widget]'); ?>
        <?php      
          $icon = drdev_image_decorative('/assets/images/icons/close_small.svg', '', '', '17', '17'); 
          echo drdev_button('', '', '', 'aria-label="Cerrar menú" aria-expanded="false"', 'closemenu-toggle', $icon);
        ?>
    </div>
    <div class="h-px bg-color4"></div>
    <div class="flex flex-col gap-4 text-baseblack text-sm font-semibold uppercase tracking-wide">
        <?php
            wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'flex flex-col gap-4',
            'fallback_cb'    => false,
            ]);
        ?>
    </div>
    <div class="h-px bg-color4"></div>
    <div class="flex flex-col gap-4">
        <?php
            $logo = drdev_image('/assets/images/icons/support_agentblack.svg', 'Te ayudamos', '', '', '20', '20', 'Te ayudamos');
            $text_link = esc_attr__( '¿Te ayudamos?', 'drdevcustomlanguage' );
            $url_contacto = esc_url( home_url( '/contacto/' ) );
            echo drdev_link('text-baseblack text-sm font-semibold tracking-[0.0225rem]', $text_link,$url_contacto, '', '','',$logo);

            $text_link = esc_attr__( 'Quienes somos', 'drdevcustomlanguage' );
              $url_contacto = esc_url( home_url( '/quienes-somos/' ) );
              echo drdev_link('text-baseblack text-sm font-semibold tracking-[0.0225rem]', $text_link, $url_contacto, '', '','','');
        ?>
    </div>
</div>