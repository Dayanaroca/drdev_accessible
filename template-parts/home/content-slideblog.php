<?php
/**
 * Template part for displaying slide blog content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;

$args = [
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'post_status'    => 'publish'
];

$query = new WP_Query( $args );
?>

<section aria-label="<?php echo esc_attr( __( 'Carrusel de entradas del blog', 'drdevcustomlanguage' ) ); ?>" role="region" aria-roledescription="carrusel" aria-label="Carrusel de entradas del blog" tabindex="0" class="blog-slider-container w-auto lg:w-full max-w-screen-etg mx-2.5 lg:mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h4 class="font-bold text-4xl text-left leading-[3.375rem]">
            <?php esc_html_e( 'Blog', 'drdevcustomlanguage' ); ?>
        </h4>

        <div class="swiper-controls flex gap-4">
            <button class="swiper-button-prev custom-arrow"
                aria-label="<?php esc_attr_e('Anterior', 'drdevcustomlanguage'); ?>">
                <?php echo drdev_inline_svg('/assets/images/icons/primary-arrow.svg', '', '', '20', '20', 'aria-hidden="true"'); ?>
            </button>

            <button class="swiper-button-next custom-arrow"
                aria-label="<?php esc_attr_e('Siguiente', 'drdevcustomlanguage'); ?>">
                <?php echo drdev_inline_svg('/assets/images/icons/primary-arrow.svg', '', '', '20', '20', 'aria-hidden="true"'); ?>
            </button>
        </div>
    </div>

    <div id="event-slider-wrapper" class="accesible-seccion bg-white text-black overflow-hidden">
        <div class="swiper blog-slider">
            <div class="swiper-wrapper">

                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                        <?php
                        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        $published_date = get_the_date( 'Y-m-d' );
                        $visible_date   = get_the_date( 'd/m/Y' );
                        $excerpt = wp_trim_words( get_the_excerpt(), 20, '...' );
                        $author_name = get_the_author();
                        $categories = get_the_category();
                        $category_name = $categories ? $categories[0]->name : '';
                        $category_id   = $categories ? $categories[0]->term_id : '';
                        $parent_cat = '';
                        $child_cat  = '';

                        if ( $categories ) {
                            foreach ( $categories as $cat ) {
                                if ( $cat->parent == 0 ) {
                                    $parent_cat = $cat;
                                } else {
                                    $child_cat = $cat;
                                }
                            }
                        }

                        $flag_path = '';
                        if ($parent_cat) {
                            $flag_path = get_term_meta($parent_cat->term_id, 'flag_svg', true);
                        }
                        ?>

                        <div class="swiper-slide rounded-[0.625rem]">
                           <?php get_template_part(
                                'template-parts/commons/content-tempost',
                                null,
                                [
                                    'thumbnail_url' => $thumbnail_url,
                                    'published_date' => $published_date,
                                    'visible_date'   => $visible_date,
                                    'excerpt'        => $excerpt,
                                    'author_name'    => $author_name,
                                    'parent_cat'     => $parent_cat,
                                    'child_cat'      => $child_cat,
                                    'flag_path'      => $flag_path,
                                ]
                            );
                            ?>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
