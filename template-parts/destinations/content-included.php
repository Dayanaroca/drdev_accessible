 <?php
/**
 * content included
 */
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
if (!defined('ABSPATH')) exit;
$include_icon = drdev_inline_svg('/assets/images/icons/include.svg');
?>
<?php if ($travel['includes_travel']) : ?>
<section class="flex flex-col gap-4 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">   
    <h2 class="font-bold text-2xl lg:text-3xl text-black">
        <?php esc_html_e( 'Incluye', 'drdevcustomlanguage' ); ?>
    </h2>
    <ul class="flex flex-col gap-3" role="list">
        <?php foreach ( $travel['includes_travel'] as $item ) : ?>
            <?php if ( empty( $item['text_includes_travel_'] ) ) continue; ?>
            <li class="flex flex-row gap-3 items-start">
                <span class="mt-1 shrink-0" aria-hidden="true">
                    <?php echo $include_icon; ?>
                </span>
                <p class="text-lg text-baseblack font-medium">
                    <?php echo esc_html( $item['text_includes_travel_'] ); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php endif ?>