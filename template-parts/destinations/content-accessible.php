 <?php
/**
 * content accessible 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<?php if ( ! empty( array_filter( $travel['accessible']['values'] ) ) ) : ?>
    <div class="accesibilidad flex flex-wrap gap-4">
        <?php foreach ( $travel['accessible']['labels'] as $key => $label ) : ?>
            <?php if ( ! empty( $travel['accessible']['values'][ $key ] ) ) : ?>
                <div class="flex items-center gap-2">
                    <?php echo $travel['accessible']['icons'][ $key ]; ?>
                    <span class="sr-only"><?php esc_html_e( 'Accesible para', 'drdevcustomlanguage' ); ?> <?php echo esc_html( $label ); ?></span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>