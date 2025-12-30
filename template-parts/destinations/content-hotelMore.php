 <?php
/**
 * content More hotel 
 */
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
if (!defined('ABSPATH')) exit;
?>
<?php if ( ! empty( $travel['accommodation_options'] ) ) : ?>
<section class="flex flex-col gap-6 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">   
    <h2 class="font-bold text-2xl lg:text-3xl text-black">
        <?php esc_html_e( 'Alojamientos', 'drdevcustomlanguage' ); ?>
    </h2>
    <ul class="grid grid-cols-1 md:grid-cols-2 gap-6" role="list">
        <?php foreach ( $travel['accommodation_options'] as $hotel ) : ?>
            <li class="flex flex-col gap-3">
                <p class="text-base font-bold text-black truncate max-w-full">
                    <?php echo esc_html( $hotel['name'] ); ?>
                    <?php if ( $hotel['stars'] > 0 ) : ?>
                        <sup class="text-xs font-normal ml-1" aria-hidden="true">
                            <?php echo str_repeat( '★', $hotel['stars'] ); ?>
                        </sup>
                        <span class="sr-only">
                            <?php
                            printf(
                                esc_html__( '%d estrellas', 'drdevcustomlanguage' ),
                                $hotel['stars']
                            );
                            ?>
                        </span>
                    <?php endif; ?>
                    <?php if ( $hotel['extras'] ) : ?>
                        <span class="font-normal text-sm">
                            (<?php echo esc_html( $hotel['extras'] ); ?>)
                        </span>
                    <?php endif; ?>
                </p>


                <!-- Imagen -->
                <?php if ( ! empty( $hotel['image'] ) ) : ?>
                    <?php
                    echo wp_get_attachment_image(
                        $hotel['image']['ID'],
                        'large',
                        false,
                        [
                            'class' => 'w-full h-auto rounded-[0.625rem] object-cover',
                        ]
                    );
                    ?>
                <?php endif; ?>

            </li>
        <?php endforeach; ?>

    </ul>
</section>
<?php endif; ?>