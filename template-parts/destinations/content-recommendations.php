 <?php
/**
 * content baggage 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;
if ( empty( $travel ) ) {
    return;
}
?>
<section class="flex flex-col gap-4 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
        <h2 class="font-bold text-2xl lg:text-3xl text-black">
            <?php esc_html_e( 'Recomendaciones de nuestros expertos Enjoy', 'drdevcustomlanguage' ); ?>
        </h2>
         <div class="hotel text-lg text-baseblack font-medium prose prose-neutral max-w-none">
            <?php echo wp_kses_post( $travel['recommendations_travel'] ); ?>
        </div> 
</section>