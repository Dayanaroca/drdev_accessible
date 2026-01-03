<?php
if (!defined('ABSPATH')) exit;

if (empty($args['query']) || !$args['query'] instanceof WP_Query) return;

$query      = $args['query'];
$current    = $args['paged'] ?? 1;
$total      = $query->max_num_pages;
$post_type  = $query->get('post_type');
$per_page   = $query->get('posts_per_page');
$template   = $args['template'] ?? 'content-tempost';
$target     = $args['target'] ?? '#blog-grid';

if ($total <= 1) return;

$prev_svg = drdev_inline_svg('/assets/images/commons/prev.svg', '', '', '20', '20', 'aria-hidden="true"');
$next_svg = drdev_inline_svg('/assets/images/commons/next.svg', '', '', '20', '20', 'aria-hidden="true"');
?>

<nav class="pagination-wrapper mt-8 flex justify-end items-center gap-2" aria-label="Paginación">

    <!-- Flecha anterior -->
    <?php if ($current > 1): ?>
        <button class="pagination-btn prev flex justify-center items-center w-[2.95775rem] h-[2.95775rem] p-[0.92431rem] rounded-[0.27731rem] border-[0.739px] border-color16  bg-white text-color16 cursor-pointer font-semibold transition-all duration-200 ease-in-out"
                data-ajax-page="<?php echo $current - 1; ?>"
                data-post-type="<?php echo esc_attr($post_type); ?>"
                data-posts-per-page="<?php echo esc_attr($per_page); ?>"
                data-template="<?php echo esc_attr($template); ?>"
                data-target="<?php echo esc_attr($target); ?>"
                data-tax-query="<?php echo esc_attr( wp_json_encode( $query->get('tax_query') ) ); ?>">
                <span class="sr-only">Anterior</span>
            <?php echo $prev_svg; ?>
        </button>
    <?php endif; ?>

    <!-- Números de página -->
    <?php for ($i = 1; $i <= $total; $i++): ?>
        <button class="pagination-btn page flex justify-center items-center w-[2.95775rem] h-[2.95775rem] p-[0.92431rem] rounded-[0.27731rem] border-[0.739px] border-color16  bg-white text-color16 cursor-pointer font-semibold transition-all duration-200 ease-in-out <?php echo ($i == $current) ? 'active' : ''; ?>"
                data-ajax-page="<?php echo $i; ?>"
                data-post-type="<?php echo esc_attr($post_type); ?>"
                data-posts-per-page="<?php echo esc_attr($per_page); ?>"
                data-template="<?php echo esc_attr($template); ?>"
                data-target="<?php echo esc_attr($target); ?>"
                data-tax-query="<?php echo esc_attr( wp_json_encode( $query->get('tax_query') ) ); ?>"
>
            <?php echo $i; ?>
        </button>
    <?php endfor; ?>

    <!-- Flecha siguiente -->
    <?php if ($current < $total): ?>
        <button class="pagination-btn next flex justify-center items-center w-[2.95775rem] h-[2.95775rem] p-[0.92431rem] rounded-[0.27731rem] border-[0.739px] border-color16  bg-white text-color16 cursor-pointer font-semibold transition-all duration-200 ease-in-out"
                data-ajax-page="<?php echo $current + 1; ?>"
                data-post-type="<?php echo esc_attr($post_type); ?>"
                data-posts-per-page="<?php echo esc_attr($per_page); ?>"
                data-template="<?php echo esc_attr($template); ?>"
                data-target="<?php echo esc_attr($target); ?>"
                data-tax-query="<?php echo esc_attr( wp_json_encode( $query->get('tax_query') ) ); ?>">
                <span class="sr-only">Siguiente</span>
            <?php echo $next_svg; ?>
        </button>
    <?php endif; ?>

</nav>

