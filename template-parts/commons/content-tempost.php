<?php
/**
 * Template part for displaying slide blog content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
  if ( ! defined( 'ABSPATH' ) ) exit;
    $thumbnail_url = $args['thumbnail_url'] ?? '';
    $published_date = $args['published_date'] ?? '';
    $visible_date = $args['visible_date'] ?? '';
    $excerpt = $args['excerpt'] ?? '';
    $author_name = $args['author_name'] ?? '';
    $parent_cat = $args['parent_cat'] ?? '';
    $child_cat = $args['child_cat'] ?? '';
    $flag_path = $args['flag_path'] ?? '';

?> 
<article class="accesible-seccion-card bg-white border-card rounded-custom overflow-hidden hover:shadow-2xl focus-within:shadow-2xl transition-shadow">
    <div class="relative">
        <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-48 object-cover rounded-t-[0.625rem]">

        <?php if ($parent_cat): ?>
            <span class="accesible-seccion absolute top-4 left-4 bg-white backdrop-blur px-2 py-1 rounded-full text-base font-semibold flex items-center gap-1 shadow">
                <?php if (!empty($flag_path) && $flag_path !== '0') : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . $flag_path ); ?>" alt="" aria-hidden="true" class="w-6 h-4">
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
                    <?php echo drdev_inline_svg('/assets/images/icons/calendar_month.svg'); ?>
                    <time datetime="<?php echo esc_attr( $published_date ); ?>"
                        class="text-sm font-medium">
                        <?php echo esc_html( $visible_date ); ?>
                    </time>
                </div>
                <div class="flex gap-1 items-center">
                    <?php echo drdev_inline_svg('/assets/images/icons/3p.svg', '', '', '14', '14'); ?>
                    <span class="text-sm font-medium">
                        <?php esc_html_e( 'Publicado por', 'drdevcustomlanguage' ); ?>
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
                $text = esc_html__( 'Leer más', 'drdevcustomlanguage' );
                echo drdev_link(
                'text-base font-medium underline text-primary',
                esc_html__( 'Leer más', 'drdevcustomlanguage' ),
                $link,
                'aria-label="' . esc_attr__( 'Leer más sobre ', 'drdevcustomlanguage' ) . esc_attr( get_the_title() ) . '"'
                );
            ?>
            <div class="flex gap-1 items-center">
                <?php echo drdev_inline_svg('/assets/images/icons/message.svg', '', '', '14', '14'); ?>
                <span class="sr-only">
                <?php esc_html_e( 'Número de comentarios:', 'drdevcustomlanguage' ); ?>
                </span>
                <span aria-hidden="true">
                <?php echo get_comments_number(); ?>
                </span>
            </div>
        </div>
    </div>
</article>