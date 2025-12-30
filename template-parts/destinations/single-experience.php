<?php
/**
 * Single experience
 */

if (!defined('ABSPATH')) exit;

$travel = drdev_get_travel_data( get_the_ID() );
?>

<section class="flex flex-col gap-5 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">

    <?php if ( $travel['thumbnail_url'] ) : ?>
        <img class="w-full object-cover h-auto max-h-96 rounded-[0.625rem]" src="<?php echo esc_url( $travel['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $travel['title'] ); ?>">
    <?php endif; ?>

    <div class="flex flex-row gap-4">
       <?php get_template_part( 'template-parts/destinations/content', 'location', ['travel' => $travel,]);
            get_template_part( 'template-parts/destinations/content', 'duration', ['travel' => $travel,]);?>
    </div>

    <h1 class="font-bold text-2xl lg:text-3xl text-black">
        <?php echo esc_html( $travel['title'] ); ?>
    </h1>

    <div class="accesible-seccion flex flex-row justify-start gap-3">
        <?php get_template_part( 'template-parts/destinations/content', 'price', ['travel' => $travel,]);?>
    </div>

    <div class="descripcion">
        <?php the_content(); ?>
    </div>

    <?php get_template_part( 'template-parts/destinations/content', 'transport');?>   

</section>

 <?php 
    get_template_part( 'template-parts/destinations/content', 'baggage');
    get_template_part( 'template-parts/destinations/content', 'hotels', ['travel' => $travel,]);
    get_template_part( 'template-parts/destinations/content', 'hotelMore', ['travel' => $travel,]);
    get_template_part( 'template-parts/destinations/content', 'included', ['travel' => $travel,]);
    get_template_part( 'template-parts/destinations/content', 'notincluded', ['travel' => $travel,]);
    get_template_part( 'template-parts/destinations/content', 'recommendations', ['travel' => $travel,]);
    get_template_part( 'template-parts/destinations/content', 'optional', ['travel' => $travel,]);
    get_template_part( 'template-parts/commons/content', 'cf7Type');

    $current_hotel_id = get_the_ID(); 
    $terms = wp_get_post_terms( $current_hotel_id, 'destino' );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
        $destino_id = $terms[0]->term_id;
        $args = [
            'post_type'      => 'viajes',
            'posts_per_page' => 3, 
            'post__not_in'   => [ $current_hotel_id ],
            'tax_query'      => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'destino',
                    'field'    => 'term_id',
                    'terms'    => $destino_id,
                ],
                [
                    'taxonomy' => 'tipo_viaje',
                    'field'    => 'slug',
                    'terms'    => 'experiencia', 
                ]
            ],
        ];

        $related_hotels = new WP_Query( $args );

        if ( $related_hotels->have_posts() ) : ?>
            <section class="w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
                <h2 class="font-bold text-2xl lg:text-3xl text-black mb-5 text-center">
                    <?php esc_html_e( 'Excursiones similares', 'drdevcustomlanguage' ); ?>
                </h2>
                <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                    while ( $related_hotels->have_posts() ) :
                        $related_hotels->the_post();
                        $related_travel = drdev_get_travel_data( get_the_ID() );

                        // Plantilla del card hotel
                        get_template_part( 'template-parts/destinations/content', 'relatedPrograms', ['travel' => $related_travel] );
                    endwhile;
                    ?>
                </div>
            </section>
        <?php
        endif;
        wp_reset_postdata();
    endif;


    get_template_part('template-parts/commons/content-contactcita');
  ?>