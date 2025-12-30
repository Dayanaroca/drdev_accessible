<?php
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( ! $travel ) {
    return;
}
?>
<article <?php post_class( 'accesible-seccion flex flex-col md:flex-row gap-0 accesible-seccion bg-white overflow-hidden border-card rounded-t-[0.625rem] rounded-b-none' ); ?>>
<?php if ( $travel['thumbnail_url'] ) : ?>
    <div class="w-full md:w-[28%]">
        <img src="<?php echo esc_url(  $travel['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-auto min-h-[350px] object-cover rounded-t-[0.625rem] md:rounded-l-[0.625rem]">
    </div>
<?php endif; ?>
    <div class="accesible-seccion flex flex-col justify-between w-full md:w-[72%] px-3 lg:px-5 pt-6 pb-8 bg-color1 border-b-2 border-b-primary">
        <div class="flex flex-col gap-3">
            <h3 class="order-1 lg:order-2 font-bold text-xl lg:text-3xl text-black">
                <?php the_title(); ?>
            </h3>
            <div class="order-2 lg:order-1 flex flex-row gap-4">
                <?php get_template_part( 'template-parts/destinations/content', 'destination', ['travel' => $travel,]);
                    get_template_part( 'template-parts/destinations/content', 'location', ['travel' => $travel,]);?>                                
            </div>
            <div class="hidden lg:flex order-3 flex-row gap-4">
                <?php get_template_part( 'template-parts/destinations/content', 'services', ['travel' => $travel,]);?>
            </div>
            <p class="order-4 block lg:hidden font-bold text-2xl text-black">
                <?php echo esc_html( 'Accesibilidad', 'drdevcustomlanguage' ); ?>
            </p>
            <div class="order-5 flex flex-row gap-4">
                <?php get_template_part( 'template-parts/destinations/content', 'accessible', ['travel' => $travel,]);?>                     
            </div>
        </div>
        <div class="flex flex-col gap-4 lg:flex-row items-center justify-between mt-4">
            <div class="accesible-seccion flex flex-row justify-start lg:justify-center gap-3 bg-white p-2 rounded-[0.3125rem] w-full lg:w-auto">
                <?php get_template_part( 'template-parts/destinations/content', 'price', ['travel' => $travel,]);?>
            </div>
            <?php $icon = drdev_image_decorative('/assets/images/icons/arrow-orange.svg', '', '', '20', '20');?>
            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-primary text-xl font-semibold self-end" aria-label="<?php echo esc_attr( sprintf(__( 'Ver más detalles de %s', 'drdevcustomlanguage' ), get_the_title()) ); ?>">
                <?php esc_html_e( 'Ver más detalles', 'drdevcustomlanguage' ); 
                echo $icon ?> 
            </a>
        </div>  
    </div>
</article>