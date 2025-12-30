 <?php
/**
 * content hotel 
 */
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
if (!defined('ABSPATH')) exit;
?>
<section class="flex flex-col gap-4 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
    <h2 class="font-bold text-2xl lg:text-3xl text-black">
       <?php esc_html_e( 'Hoteles', 'drdevcustomlanguage' ); ?>
    </h2>
    <p class="text-lg text-baseblack font-medium">
        <?php esc_html_e( 'Después de un día explorando, mereces un lugar donde todo esté pensado para tu descanso y comodidad. Nuestros hoteles combinan hospitalidad, encanto local y accesibilidad real, para que cada momento de tu estancia sea placentero.', 'drdevcustomlanguage' ); ?>
    </p>
    <ul class="flex flex-col gap-4" role="list">
    <?php if (  $travel['hotel']['accessibility'] ) : ?>
        <li class="flex flex-row gap-3 items-start lg:items-center justify-start lg border lg:border-color6 rounded-[0.625rem] p-4">
            <?php echo drdev_inline_svg('/assets/images/icons/accessible.svg', 'icon-svg', '', '40', '40'); ?>
            <div class="w-[2px] bg-black self-stretch" aria-hidden="true" role="presentation"></div>
            <div class="hotel text-lg text-baseblack font-medium prose prose-neutral max-w-none">
                <?php echo wp_kses_post( $travel['hotel']['accessibility'] ); ?>
            </div>
        </li>
    <?php endif; ?>

    <?php if (  $travel['hotel']['room'] ) : ?>
        <li class="flex flex-row gap-3 items-start lg:items-center justify-start lg border lg:border-color6 rounded-[0.625rem] p-4">
            <?php echo drdev_inline_svg('/assets/images/icons/shower.svg', 'icon-svg', '', '40', '40'); ?>
            <div class="w-[1px] bg-black self-stretch" aria-hidden="true" role="presentation"></div>
            <div class="hotel text-lg text-baseblack font-medium prose prose-neutral max-w-none">
                <?php echo wp_kses_post( $travel['hotel']['room'] ); ?>
            </div>
        </li>
    <?php endif; ?>

    <?php if (  $travel['hotel']['extra'] ) : ?>
        <li class="flex flex-row gap-3 items-start lg:items-center justify-start lg border lg:border-color6 rounded-[0.625rem] p-4">
            <?php echo drdev_inline_svg('/assets/images/icons/water_lux.svg', 'icon-svg', '', '40', '40'); ?>
            <div class="w-[2px] bg-black self-stretch" aria-hidden="true" role="presentation"></div>
            <div class="hotel text-lg text-baseblack font-medium prose prose-neutral max-w-none">
                <?php echo wp_kses_post( $travel['hotel']['extra'] ); ?>
            </div>
        </li>
    <?php endif; ?>
    </ul>
</section>