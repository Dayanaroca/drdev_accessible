<?php 

if (!defined('ABSPATH')) exit;

global $drdev_global;
$text_link_aboutus = esc_attr__( 'Quiénes somos', 'drdevcustomlanguage' );
$url_aboutus = esc_url( home_url( '/quienes-somos' ) );
$text_link_contact = esc_attr__( 'Contacto', 'drdevcustomlanguage' );
$url_contact = esc_url( home_url( '/contacto' ) );
$whatsapp = esc_attr($drdev_global['whatsapp']);
$whatsapp_clean = esc_attr($drdev_global['whatsapp_clean']);
$icon_whatsapp = drdev_image('/assets/images/icons/whatsapp.svg', 'WhatsApp', '', '', '25', '25', 'WhatsApp');
$facebook = esc_url($drdev_global['facebook']);
$icon_facebook = drdev_image('/assets/images/icons/facebook.svg', 'Facebook', '', '', '25', '25', 'Facebook');
$instagram = esc_url($drdev_global['instagram']); 
$icon_instagram = drdev_image('/assets/images/icons/instagram.svg', 'Instagram', '', '', '25', '25', 'Instagram');    
$tiktok = esc_url($drdev_global['tiktok']);
$icon_tiktok = drdev_image('/assets/images/icons/tiktok.svg', 'TikTok', '', '', '25', '25', 'TikTok');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" sizes="32x32" />
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" sizes="192x192" />
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" />
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" />
  
  <meta name="theme-color" content="#1e40af">


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header bg-white absolute w-full  z-50 transition-all duration-300 h-28" role="banner">
  <div class="flex flex-row h-full items-center justify-between transition-all duration-300"> 
    <!-- Logo -->
     <div class="flex items-center h-full pl-4">
      <?php if (has_custom_logo()) : ?>
        <div class="site-logo h-10 md:h-16 flex items-center">
          <?php the_custom_logo(); ?>
        </div>
      <?php else : ?>
        <div class="site-logo h-10 md:h-16 flex items-center">
          <?php
            $logoheader = drdev_image('/assets/images/commons/logo-enjoy-color.jpg', 'Logo ETG', '', '', '150', '52', 'Logo ETG');
            echo drdev_link('', '', esc_url(home_url('/')), '', '', '', $logoheader);
          ?>
        </div>
      <?php endif; ?>
    </div> 
    
    <div class="flex flex-col h-full">
         <!-- Botón móvil -->
      <!-- <div class="flex items-center mr-4 h-full md:hidden focus:outline-none" aria-label="Abrir menú"> -->
       <?php      
          $icon = drdev_image_decorative('/assets/images/icons/menu.svg', '', '', '48', '48'); 
          echo drdev_button('flex items-center mr-4 h-full md:hidden focus:outline-none', '', '', 'aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu"', 'menu-toggle', $icon);
          ?>
      <!-- </div> -->
        <div class="hidden md:flex flex-row justify-end">
          <div class="header-blue flex items-center justify-center bg-secondary px-6 pt-2 pb-3 border-r border-r-white rounded-bl-[0.625rem]">
            <?php
              $logo = drdev_image('/assets/images/icons/support_agent.svg', 'Te ayudamos', '', '', '24', '24', 'Te ayudamos');
              $text_link = esc_attr__( '¿Te ayudamos?', 'drdevcustomlanguage' );
              $url_contacto = esc_url( home_url( '/contacto/' ) );
              echo drdev_link('text-white text-sm font-semibold tracking-[0.0225rem]', $text_link, $url_contacto, '', '','',$logo);
            ?>
          </div>
          <div class="header-blue flex items-center justify-center bg-secondary px-6 py-3 border-r border-r-white">
            <?php
              $text_link = esc_attr__( 'Quienes somos', 'drdevcustomlanguage' );
              $url_contacto = esc_url( home_url( '/sobre-nosotros/' ) );
              echo drdev_link('text-white text-sm font-semibold tracking-[0.0225rem]', $text_link, $url_contacto, '', '','','');
            ?>
          </div>
          <div class="header-blue flex items-center justify-center bg-secondary px-6 py-3">
            <?php
             echo do_shortcode('[wpml_language_selector_widget]');
            ?>
          </div>
        </div>
        <div class="hidden md:flex items-center justify-end h-full pr-4">
          <nav id="main-menu" role="navigation" aria-label="Menú principal" class="flex md:items-center justify-end :gap-8">
              <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class'     => 'flex flex-row items-center justify-center gap-12 text-base font-semibold text-baseblack uppercase tracking-wide',
                    'fallback_cb'    => false, 
                    'walker'         => new Drdev_Custom_Menu_Walker(),
                ]);
              ?>
          </nav>
        </div>  
  </div>
   
</div>
<!-- Menú móvil lateral -->
   <?php get_template_part('template-parts/commons/content-menumobile'); ?>
  <!-- Overlay -->
  <div id="menu-overlay" class="fixed inset-0 bg-black/50 hidden z-30"></div>
</header>
