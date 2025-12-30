 <?php
/**
 * content faciliades 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<?php if ( ! empty( array_filter( $travel['facilities']['values'] ) ) ) : ?>
    <h2 class="font-bold text-2xl lg:text-3xl text-black">
       <?php esc_html_e( 'Facilidades', 'drdevcustomlanguage' ); ?>
    </h2>
    <!-- Íconos -->
    <div class="facilities flex flex-wrap gap-4 mb-2">
        <?php foreach ( $travel['facilities']['labels'] as $key => $label ) : ?>
            <?php 
            $is_active = ! empty( $travel['facilities']['values'][ $key ] ); 
            ?>
            <div class="flex justify-center items-center rounded-[0.5rem] w-12 h-12 lg:w-14 lg:h-14 p-2.5 gap-3 bg-<?php echo $is_active ? 'primary' : 'secondary'; ?>" >
                <span role="img" aria-label="<?php echo esc_attr($label); ?>">
                    <?php echo $travel['facilities']['icons'][$key]; ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Labels activos -->
    <div class="active-labels flex flex-col gap-1">
        <?php foreach ( $travel['facilities']['labels'] as $key => $label ) : ?>
            <?php if ( ! empty( $travel['facilities']['values'][ $key ] ) ) : ?>
                <span class="text-black text-base font-bold"><?php echo esc_html( $label ); ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

