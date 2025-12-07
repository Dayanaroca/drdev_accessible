<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Drdev_Custom_Menu_Walker extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

        $has_children = is_array($item->classes) && in_array('menu-item-has-children', $item->classes);


        $output .= '<li class="relative group">';

        // Enlace del menú
        $output .= '<a href="'. esc_url( $item->url ) .'"
                        class="flex items-center gap-1 py-2 px-1"
                        role="menuitem"
                        '. ( $has_children ? 'aria-haspopup="true" aria-expanded="false"' : '' ) .'
                    >';

        // Texto
        $output .= esc_html( $item->title );

        // Flecha dinámica
      if ( $has_children ) {
            $output .= '
            <span class="transition-transform duration-200 ml-1 group-hover:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" class="icon-arrow">
                    <mask id="mask0_1473_2216" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                        <rect x="30" y="1.31134e-06" width="30" height="30" transform="rotate(90 30 1.31134e-06)" fill="currentColor"/>
                    </mask>
                    <g mask="url(#mask0_1473_2216)">
                        <path d="M15 16.3125L20.9062 10.4063L22.5 12L15 19.5L7.5 12L9.09375 10.4063L15 16.3125Z" fill="currentColor"/>
                    </g>
                </svg>
            </span>';
        }


        $output .= '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>";
    }

    // Submenú
    public function start_lvl( &$output, $depth = 0, $args = null ) {

        $output .= '
        <div class="absolute left-0 top-full opacity-0 invisible
                    translate-y-3 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                    transition-all duration-200 z-50
                    accesible-seccion bg-white rounded-xl shadow-custom p-3">

            <ul class="min-w-[180px]">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul></div>';
    }
}