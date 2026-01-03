<?php
if (!defined('ABSPATH')) exit;
?>

<section aria-labelledby="blog-title" class="accesible-seccion w-full max-w-screen-etg mx-auto px-2.5 lg:px-0">
    <h2 id="blog-title" class="font-bold text-4xl lg:text-4xl text-left mb-5">
        <?php esc_html_e( 'Artículos', 'drdevcustomlanguage' ); ?>
    </h2>
    <?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $blog_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $paged
    ]);
    ?>

    <?php if ( $blog_query->have_posts() ) : ?>
        <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                $published_date = get_the_date( 'Y-m-d' );
                $visible_date   = get_the_date( 'd/m/Y' );
                $excerpt = wp_trim_words( get_the_excerpt(), 20, '...' );
                $author_name = get_the_author();

                $categories = get_the_category();
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
                <div class="rounded-[0.625rem]">
                    <?php get_template_part(
                        'template-parts/commons/content-tempost',
                        null,
                        [
                            'thumbnail_url'  => $thumbnail_url,
                            'published_date' => $published_date,
                            'visible_date'   => $visible_date,
                            'excerpt'        => $excerpt,
                            'author_name'    => $author_name,
                            'parent_cat'     => $parent_cat,
                            'child_cat'      => $child_cat,
                            'flag_path'      => $flag_path,
                        ]
                    ); ?>
                </div>
            <?php endwhile; ?>
        </div>

       <?php get_template_part(
            'template-parts/commons/content',
            'pagination',
            [
                'query'    => $blog_query,
                'template' => 'content-tempost',
                'target'   => '#blog-grid',
                'paged'  => $paged,
            ]
        );
        ?>

    <?php else : ?>
        <p>No hay entradas disponibles.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</section>