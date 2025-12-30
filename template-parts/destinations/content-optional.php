 <?php
/**
 * content optional 
 */

if (!defined('ABSPATH')) exit;
/** @var array $args */
$travel = $args['travel'] ?? null;
if ( empty( $travel ) ) {
    return;
}
?>
<?php if ($travel['optional_travel']) : ?>
<section class="flex flex-col gap-4 w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
        <h2 class="font-bold text-2xl lg:text-3xl text-black">
            <?php esc_html_e( 'Opcional', 'drdevcustomlanguage' ); ?>
        </h2>
         <div class="hotel text-lg text-baseblack font-medium prose prose-neutral max-w-none">
            <?php echo wp_kses_post( $travel['optional_travel'] ); ?>
        </div> 
</section>
<?php endif ?>