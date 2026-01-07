<?php
/**
 * Template part for displaying social media content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
   global $drdev_global;
     $colorClass = isset( $args['colorClass'] ) ? esc_attr( $args['colorClass'] ) : 'text-primary';
     $iconSize = isset( $args['iconSize'] ) ? intval( $args['iconSize'] ) : 50;

        $urlfb = esc_attr($drdev_global['facebook']);
        $iconfb = drdev_inline_svg('/assets/images/about/facebook.svg', '', '', $iconSize, $iconSize, '');
        echo drdev_link($colorClass, '', $urlfb, '', '', '', $iconfb);

        $urlig = esc_attr($drdev_global['instagram']);
        $iconig = drdev_inline_svg('/assets/images/about/instagram.svg', '', '', $iconSize, $iconSize, '');
        echo drdev_link($colorClass, '', $urlig, '', '', '', $iconig);

        $urltiktok = esc_attr($drdev_global['tiktok']);
        $icontiktok = drdev_inline_svg('/assets/images/about/tiktok.svg', '', '', $iconSize, $iconSize, '');
        echo drdev_link($colorClass, '', $urltiktok, '', '', '', $icontiktok);

        $urllinkedin = esc_attr($drdev_global['linkedin']);
        $iconlinkedin = drdev_inline_svg('/assets/images/about/linkedin.svg', '', '', $iconSize, $iconSize, '');
        echo drdev_link($colorClass, '', $urllinkedin, '', '', '', $iconlinkedin);

        $urlyoutube = esc_attr($drdev_global['youtube']);
        $iconyoutube = drdev_inline_svg('/assets/images/about/youtube.svg', '', '', $iconSize, $iconSize, '');
        echo drdev_link($colorClass, '', $urlyoutube, '', '', '', $iconyoutube);