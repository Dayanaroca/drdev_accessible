<?php
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( ! $travel ) {
    return;
}
?>
<article <?php post_class( 'accesible-seccion-card bg-color1 overflow-hidden border-card hover:shadow-2xl rounded-custom flex flex-col h-full' ); ?>>
<?php if ( $travel['thumbnail_url'] ) : ?>
    <div class="w-full h-56">
        <img src="<?php echo esc_url(  $travel['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full object-cover rounded-t-[0.625rem]">
    </div>
<?php endif; ?>
    <div class="accesible-seccion flex flex-col gap-3 justify-between w-full px-3 lg:px-5 pt-2 pb-3 lg:pt-3 lg:pb-5 bg-color1 shadow-black flex-1">
        <h3 class="font-bold text-xl text-black line-clamp-2">
            <?php the_title(); ?>
        </h3>
        <div class="flex flex-row gap-1 flex-wrap">
        <?php get_template_part( 'template-parts/destinations/content', 'destination', ['travel' => $travel,]);
                get_template_part( 'template-parts/destinations/content', 'location', ['travel' => $travel,]);?>
        </div>
        <p class="font-bold text-base text-black">
            <?php echo esc_html( 'Accesible para', 'drdevcustomlanguage' ); ?>
        </p>
        <div class="flex flex-row gap-4">
            <?php get_template_part( 'template-parts/destinations/content', 'accessible', ['travel' => $travel,]);?>                     
        </div>
        <div class="accesible-seccion flex flex-row justify-start gap-3 bg-white rounded-cuatom p-2">
            <?php get_template_part( 'template-parts/destinations/content', 'price', ['travel' => $travel,]);?>
        </div>
        <div class="mt-auto flex items-end justify-end">
            <?php $icon = drdev_image_decorative('/assets/images/icons/arrow-orange.svg', '', '', '20', '20');?>
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-primary text-lg font-semibold self-end" aria-label="<?php echo esc_attr( sprintf(__( 'Ver más detalles de %s', 'drdevcustomlanguage' ), get_the_title()) ); ?>">
                <?php esc_html_e( 'Ver más detalles', 'drdevcustomlanguage' ); 
                echo $icon ?> 
            </a>
        </div>
    </div>
</article>