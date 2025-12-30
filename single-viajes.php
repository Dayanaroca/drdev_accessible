<?php
/**
 * Program Template
 */

if (!defined('ABSPATH')) exit;
get_header();
?>

<main class="accesible-seccion flex flex-col gap-8 w-full pt-28 pb-14">

    <?php   
        get_template_part('template-parts/commons/content-stickbanner'); 

        while ( have_posts() ) :
            the_post();

            // Obtener términos de la taxonomía tipo_viaje
            $terms = wp_get_post_terms( get_the_ID(), 'tipo_viaje' );

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

                // Usamos el primer término (asumiendo 1 tipo por viaje)
                $tipo = $terms[0]->slug;

                switch ( $tipo ) {
                    case 'programa':
                        get_template_part( 'template-parts/destinations/single', 'program' );
                        break;

                    case 'experiencia':
                        get_template_part( 'template-parts/destinations/single', 'experience' );
                        break;

                    case 'hotel':
                        get_template_part( 'template-parts/destinations/single', 'hotel' );
                        break;

                    default:
                        get_template_part( 'template-parts/destinations/single', 'default' );
                        break;
                }

            } else {
                // Fallback si no hay tipo asignado
                get_template_part( 'template-parts/viajes/single', 'default' );
            }

        endwhile;
?>
</main>

<?php get_footer(); ?>