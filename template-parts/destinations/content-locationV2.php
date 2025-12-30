 <?php
/**
 * content location V2
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<?php if ( $travel['location_program_travel'] ) : ?>
    <div class="flex flex-row items-center gap-1 w-auto">
        <?php echo drdev_inline_svg('/assets/images/icons/location_on.svg', '', '', '16', '16'); ?>
        <p class="text-sm lg:text-base font-semibold text-color17 tracking-[0.03px] whitespace-nowrap">
            <?php echo esc_html( $travel['location_program_travel'] ); ?>
        </p>
    </div>
<?php endif; ?>