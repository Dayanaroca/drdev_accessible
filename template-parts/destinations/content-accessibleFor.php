 <?php
/**
 * content accessible for 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<?php if ( ! empty( array_filter( $travel['accessible']['values'] ) ) ) : ?>
    <div class="accesibilidad flex flex-col">
        <span class="text-black text-2xl font-bold mb-3"><?php esc_html_e( 'Accesible para', 'drdevcustomlanguage' ); ?> </span>
        <?php foreach ( $travel['accessible']['labels'] as $key => $label ) : ?>
            <?php if ( ! empty( $travel['accessible']['values'][ $key ] ) ) : ?>
                <span class="text-black text-base font-bold"><?php echo esc_html( $label ); ?></span>               
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>