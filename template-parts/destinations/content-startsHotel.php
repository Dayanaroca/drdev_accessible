<?php
$travel = $args['travel'] ?? null;

if ( empty( $travel ) ) {
    return;
}

$stars = (int) ( $travel['starts_hotel_travel'] ?? 0 );
$img_start = drdev_inline_svg('/assets/images/icons/star_only.svg', 'h-4 w-auto');
if ( $stars > 0 ) :
?>
    <div class="flex flex-row gap-1 items-center justify-center" aria-hidden="true">
        <?php echo str_repeat( $img_start, $stars ); ?>
    </div>

    <span class="sr-only">
        <?php
        printf(
            esc_html__( '%d estrellas', 'drdevcustomlanguage' ),
            $stars
        );
        ?>
    </span>
<?php endif; ?>

