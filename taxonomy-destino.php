<?php
/**
 * Destinos Template
 */

if (!defined('ABSPATH')) exit;
get_header();
?>

<main class="accesible-seccion flex flex-col gap-12 w-full pt-28 pb-14">

    <?php   
        get_template_part('template-parts/commons/content-stickbanner');  
        get_template_part('template-parts/destinations/content-section1');

        $term = get_queried_object();

        drdev_render_travel_block([
            'title' => __( 'Programas de viaje accesibles para descubrir Cuba', 'drdevcustomlanguage' ),
            'tax_query' => [
                [
                    'taxonomy' => 'destino',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ],
                [
                    'taxonomy' => 'tipo_viaje',
                    'field'    => 'slug',
                    'terms'    => 'programa',
                ],
            ],
            'template' => 'programa',
            'grid_classes' => 'grid grid-cols-1 gap-6',
        ]);

        drdev_render_travel_block([
            'title' => __( '¿Qué hacer en Cuba?', 'drdevcustomlanguage' ),
            'tax_query' => [
                [
                    'taxonomy' => 'destino',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ],
                [
                    'taxonomy' => 'tipo_viaje',
                    'field'    => 'slug',
                    'terms'    => 'experiencia',
                ],
            ],
            'template' => 'experiencia',
            'grid_classes' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
            'show_pagination' => true,
            'posts_per_page'  => 3,
        ]);
     
        get_template_part('template-parts/commons/content-video');

        drdev_render_travel_block([
            'title' => __( 'Elige un hotel a tu medida', 'drdevcustomlanguage' ),
            'tax_query' => [
                [
                    'taxonomy' => 'destino',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ],
                [
                    'taxonomy' => 'tipo_viaje',
                    'field'    => 'slug',
                    'terms'    => 'hotel',
                ],
            ],
            'template' => 'hotel',
            'grid_classes' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
            'show_pagination' => true,
            'posts_per_page'  => 3,
        ]);

            $meses_viaje = get_term_meta( $term->term_id, 'meses_viaje', true );

            if ( ! empty( $meses_viaje ) ) :

                $icons = [
                    'bueno'     => '/assets/images/icons/happy.svg',
                    'regular'   => '/assets/images/icons/neutral.svg',
                    'malo'      => '/assets/images/icons/sad.svg',
                    'muy_malo'  => '/assets/images/icons/very-sad.svg',
                ];

                $meses_abreviados = [
                    'enero'      => 'ENE',
                    'febrero'    => 'FEB',
                    'marzo'      => 'MAR',
                    'abril'      => 'ABR',
                    'mayo'       => 'MAY',
                    'junio'      => 'JUN',
                    'julio'      => 'JUL',
                    'agosto'     => 'AGO',
                    'septiembre' => 'SEP',
                    'octubre'    => 'OCT',
                    'noviembre'  => 'NOV',
                    'diciembre'  => 'DIC',
                ];
            ?>
            <section class="max-w-screen-etg mx-auto px-2.5 lg:px-0">
                <h2 class="font-bold text-2xl lg:text-3xl text-black mb-6 text-center">
                    <?php esc_html_e( 'Mejor época para viajar', 'drdevcustomlanguage' ); ?>
                </h2>

                <div class="grid grid-cols-6 lg:grid-cols-12 gap-4">
                    <?php foreach ( $meses_viaje as $mes => $valoracion ) : 

                        $mes_abrev = $meses_abreviados[ $mes ] ?? strtoupper( substr( $mes, 0, 3 ) );
                    ?>
                        <div class="flex flex-col gap-2 items-center text-center">
                            <span class="text-base font-semibold uppercase">
                                <?php echo esc_html( $mes_abrev ); ?>
                            </span>

                            <?php if ( ! empty( $icons[ $valoracion ] ) ) : ?>
                                <img 
                                    src="<?php echo esc_url( get_template_directory_uri() . $icons[ $valoracion ] ); ?>" 
                                    alt="<?php echo esc_attr( $valoracion ); ?>" 
                                    class="w-20 h-20 mb-1"
                                >
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6 place-items-center">
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-primary"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'Muy recomendado', 'drdevcustomlanguage' ); ?></span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-secondary"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'Recomendado', 'drdevcustomlanguage' ); ?></span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-color20"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'No es mala opción', 'drdevcustomlanguage' ); ?></span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-6 h-6 rounded-full bg-color21"></div>
                        <span class="text-sm lg:text-lg font-bold"><?php esc_html_e( 'No es mala opción', 'drdevcustomlanguage' ); ?></span>
                    </div>
                </div>
            </section>
            <?php endif; ?>


        <?php get_template_part('template-parts/commons/content-contactcita');
        get_template_part( 'template-parts/destinations/content', 'otherServices'); 
        get_template_part( 'template-parts/destinations/content', 'scooters');        
        get_template_part( 'template-parts/commons/content', 'cf7');
        if( function_exists('render_faq_group') ) {
            render_faq_group('general', 'Preguntas frecuentes');
        }
    ?> 
</main>

<?php get_footer(); ?>