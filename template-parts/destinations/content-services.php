 <?php
/**
 * content services 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<?php foreach ( $travel['services']['labels'] as $key => $label ) : ?>
    <?php if ( ! empty( $travel['services']['values'][ $key ] ) ) : ?>
        <div class="flex flex-row justify-center items-center gap-2 w-auto">
            <?php echo $travel['services']['icons'][ $key ]; ?>
            <p class="text-sm lg:text-base font-semibold text-color17">
                <?php echo esc_html( $label ); ?>
            </p>
        </div>
    <?php endif; ?>
<?php endforeach; ?>