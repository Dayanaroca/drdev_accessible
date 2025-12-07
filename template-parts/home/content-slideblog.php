<?php
/**
 * Template part for displaying slide blog content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;

$args = [
    'post_type'      => 'post',
    'posts_per_page' => 10,
    'post_status'    => 'publish'
];

$query = new WP_Query( $args );
?>

<section aria-label="<?php echo esc_attr( __( 'Carrusel de entradas del blog', 'drdevsalaprensa' ) ); ?>"
    role="region"
  aria-roledescription="carrusel"
  aria-label="Carrusel de entradas del blog"
  tabindex="0"
    class="w-auto lg:w-full max-w-[1190px] mx-2.5 lg:mx-auto mb-6 lg:mb-14">

    <div class="flex items-center justify-between mb-4">
        <h4 class="font-bold text-4xl text-left leading-[3.375rem]">
            <?php esc_html_e( 'Blog', 'drdevsalaprensa' ); ?>
        </h4>

        <div class="swiper-controls flex gap-4">
            <button class="swiper-button-prev custom-arrow"
                aria-label="<?php esc_attr_e('Anterior', 'drdevsalaprensa'); ?>">
                <?php echo drdev_inline_svg('/assets/images/icons/primary-arrow.svg', 'aria-hidden="true"', '', '20', '20'); ?>
            </button>

            <button class="swiper-button-next custom-arrow"
                aria-label="<?php esc_attr_e('Siguiente', 'drdevsalaprensa'); ?>">
                <?php echo drdev_inline_svg('/assets/images/icons/primary-arrow.svg', 'aria-hidden="true"', '', '20', '20'); ?>
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
                            <article class="accesible-seccion bg-white overflow-hidden hover:shadow-2xl transition-transform" aria-label="<?php echo esc_attr( get_the_title() ); ?>">

                               <div class="relative">
                                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-48 object-cover rounded-t-[0.625rem]">

                                    <?php if ($parent_cat): ?>
                                        <span class="accesible-seccion absolute top-4 left-4 bg-white backdrop-blur px-2 py-1 rounded-full text-base font-semibold flex items-center gap-1 shadow">
                                            <?php if (!empty($flag_path) && $flag_path !== '0') : ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . $flag_path ); ?>"
                                                    alt=""
                                                    aria-hidden="true"
                                                    class="w-6 h-4">
                                            <?php endif; ?>
                                            <?php echo esc_html($parent_cat->name); ?>
                                        </span>
                                    <?php endif; ?>

                                    <!-- Etiqueta arriba derecha -->
                                    <?php
                                        $tags = get_the_tags();
                                        $tag_name = $tags ? $tags[0]->name : '';
                                    ?>
                                    <?php if ($tag_name): ?>
                                        <span class="accesible-seccion absolute top-4 right-4 bg-white backdrop-blur px-2 py-1 rounded-full text-base font-semibold flex items-center gap-1 shadow">
                                            <?php echo esc_html($tag_name); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($child_cat): ?>
                                        <span class="accesible-seccion absolute bottom-4 left-4 bg-primary text-white px-2 py-1 rounded-full text-base font-semibold shadow">
                                            <?php echo esc_html($child_cat->name); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="accesible-seccion p-5 bg-color1 flex flex-col gap-2 justify-between shadow-black h-[220px] rounded-b-[0.625rem]">
                                    <div class="flex flex-col gap-2">
                                        <h3 class="text-2xl font-bold line-clamp-2">
                                            <?php the_title(); ?>
                                        </h3>
                                        <div class="flex flex-row gap-8">
                                            <div class="flex gap-1 items-center">
                                                <?php echo drdev_image_decorative('/assets/images/icons/calendar_month.svg', '', '', '14', '14'); ?>
                                                <time datetime="<?php echo esc_attr( $published_date ); ?>"
                                                    class="text-sm font-medium">
                                                    <?php echo esc_html( $visible_date ); ?>
                                                </time>
                                            </div>
                                            <div class="flex gap-1 items-center">
                                                <?php echo drdev_image_decorative('/assets/images/icons/3p.svg', '', '', '14', '14'); ?>
                                                <span class="text-sm font-medium">
                                                    <?php esc_html_e( 'Publicado por', 'drdevsalaprensa' ); ?>
                                                    <?php echo esc_html( $author_name ); ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <p class="text-base font-medium line-clamp-2">
                                            <?php echo esc_html( $excerpt ); ?>
                                        </p>
                                    </div>
                                    
                                    <div class="flex flex-row justify-between">
                                        <?php 
                                            $link = get_permalink();
                                            $text = esc_html__( 'Leer más', 'drdevsalaprensa' );
                                            echo drdev_link('text-base font-medium underline text-primary', $text, $link, '', '', '', '');
                                        ?>
                                        <div class="flex gap-1 items-center">
                                            <?php echo drdev_image_decorative('/assets/images/icons/message.svg', '', '', '14', '14'); ?>
                                            <span class="text-base font-medium">
                                                <?php echo get_comments_number(); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </article>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
