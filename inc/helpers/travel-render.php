<?php
if (!defined('ABSPATH')) exit;

function drdev_render_travel_block( array $args = [] ): void {

    $instance_id = 'travel-grid-' . uniqid();
    $paged = max(
        1,
        get_query_var('paged'),
        get_query_var('page')
    );

    $defaults = [
        'title'              => '',
        'post_type'          => 'viajes',
        'posts_per_page'     => 3,
        'paged'              => $paged,
        'tax_query'          => [],
        'template'           => '',
        'section_classes'    => 'w-full max-w-screen-etg mx-auto px-2.5 lg:px-0',
        'grid_classes'       => 'grid grid-cols-1 gap-8',
        'show_pagination'    => false,
        'pagination_type'    => 'ajax',
    ];

    $args = wp_parse_args( $args, $defaults );

    if ( empty( $args['template'] ) ) {
        return;
    }

    $query = new WP_Query([
        'post_type'      => $args['post_type'],
        'posts_per_page' => $args['posts_per_page'],
        'paged'          => $args['paged'],
        'tax_query'      => $args['tax_query'],
        'post_status'    => 'publish',
    ]);

    if ( ! $query->have_posts() ) {
        return;
    }
    ?>

    <section class="<?php echo esc_attr( $args['section_classes'] ); ?>">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-8">

            <?php if ( $args['title'] ) : ?>
                <h2 class="font-bold text-2xl lg:text-4xl">
                    <?php echo esc_html( $args['title'] ); ?>
                </h2>
            <?php endif; ?>
            <div class="hidden lg:block">
            <?php if ( $args['show_pagination'] && $query->max_num_pages > 1 ) {
                get_template_part(
                    'template-parts/commons/content',
                    'pagination',
                    [
                        'query'    => $query,
                        'template' => $args['template'],
                        'target'   => '#' . $instance_id,
                        'paged'    => $args['paged'],
                        'tax_query'=> $args['tax_query'],
                    ]
                );
            } ?>
              </div>
        </div>

        <div id="<?php echo esc_attr( $instance_id ); ?>" class="<?php echo esc_attr( $args['grid_classes'] ); ?>">
            <?php
            while ( $query->have_posts() ) :
                $query->the_post();

                get_template_part(
                    'template-parts/travel/cards/card',
                    $args['template'],
                    [
                        'travel' => drdev_get_travel_data( get_the_ID() ),
                    ]
                );
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
        <div class="block lg:hidden">
            <?php if ( $args['show_pagination'] && $query->max_num_pages > 1 ) {
                get_template_part(
                    'template-parts/commons/content',
                    'pagination',
                    [
                        'query'    => $query,
                        'template' => $args['template'],
                        'target'   => '#' . $instance_id,
                        'paged'    => $args['paged'],
                        'tax_query'=> $args['tax_query'],
                    ]
                );
            } ?>
              </div>

    </section>
    <?php
}
