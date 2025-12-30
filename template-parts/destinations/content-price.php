 <?php
/**
 * content price 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}
?>

<p class="text-base text-black font-medium">
    <?php esc_html_e( 'Por persona en', 'drdevcustomlanguage' ); ?><br>
    <span class="font-bold"><?php esc_html_e( 'ocupación DBL', 'drdevcustomlanguage' ); ?></span>
</p>
<div class="w-[2px] bg-primary self-stretch" aria-hidden="true"></div>
<p class="text-black font-bold text-5xl flex items-start">
<span><?php echo esc_html( $travel['price_travel'] ); ?></span>
    <span class="text-xl align-top ml-1 leading-none" aria-hidden="true">€</span>
</p>