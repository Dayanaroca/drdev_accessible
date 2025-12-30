 <?php
/**
 * content destination 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<?php if (  $travel['duration_hour_program_travel'] ) : ?>
    <div class="flex flex-row items-center gap-1 border-[0.5px] border-color18 px-2 py-1 rounded-2xl w-auto">
        <?php echo drdev_inline_svg('/assets/images/icons/hour.svg', 'icon-svg', '', '16', '16'); ?>
            <p class="text-sm lg:text-base font-semibold text-color17 tracking-[0.03px]">
            <?php echo esc_html( $travel['duration_hour_program_travel'] ); ?>
        </p>
    </div>
<?php endif; ?>