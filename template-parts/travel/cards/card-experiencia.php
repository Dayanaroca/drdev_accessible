<?php
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( ! $travel ) {
    return;
}
?>
<article <?php post_class( 'accesible-seccion-card relative bg-white overflow-hidden border-card hover:shadow-2xl rounded-custom' ); ?>>
<?php if ( $travel['thumbnail_url'] ) : ?>
    <a 
        href="<?php the_permalink(); ?>" 
        class="absolute inset-0 z-10"
        aria-label="<?php echo esc_attr( sprintf(
            __( 'Ver detalles de %s', 'drdevcustomlanguage' ),
            get_the_title()
        ) ); ?>"
    ></a>
    <div class="w-full h-56">
        <img src="<?php echo esc_url(  $travel['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full object-cover rounded-t-[0.625rem]">
    </div>
<?php endif; ?>
    <div class="accesible-seccion flex flex-col gap-3 justify-between w-full px-3 lg:px-5 pt-2 pb-3 lg:pt-3 lg:pb-5 bg-color1 shadow-black">
        <h3 class="font-bold text-xl text-black line-clamp-2">
            <?php the_title(); ?>
        </h3>
        <?php get_template_part( 'template-parts/destinations/content', 'locationV2', ['travel' => $travel,]);?>                                
        <p class="font-bold text-base text-black">
            <?php echo esc_html( 'Accesible para', 'drdevcustomlanguage' ); ?>
        </p>
        <div class="flex flex-row gap-4">
            <?php get_template_part( 'template-parts/destinations/content', 'accessible', ['travel' => $travel,]);?>                     
        </div>
    </div>
</article>