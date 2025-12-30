<?php
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}

$visibility = (int) ( $travel['visibility_hotel_travel'] ?? 0 );
$img_visibility = drdev_inline_svg('/assets/images/icons/point.svg', 'h-4 w-auto');
if ( $visibility > 0 ) :
?>
<div class="flex flex-row gap-2 items-center justify-center">
    <?php echo drdev_inline_svg('/assets/images/icons/layer.svg') ?>
    <div class="flex flex-row gap-1 items-center justify-center" aria-hidden="true">
        <?php echo str_repeat( $img_visibility, $visibility ); ?>
    </div>

    <span class="sr-only">
        <?php
        printf(
            esc_html__( '%d estrellas', 'drdevcustomlanguage' ),
            $visibility
        );
        ?>
    </span>
</div>    
<?php endif; ?>

