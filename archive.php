<?php
/**
 * The template for displaying archive pages
 *
 * Fallback template for all archives:
 * - CPT archives
 * - Taxonomy archives
 * - Date archives
 *
 * @package drdev
 */

get_header();
?>

<main id="primary" class="site-main" role="main">

    <header class="archive-header">
        <h1 class="archive-title">
            <?php the_archive_title(); ?>
        </h1>

        <?php if ( get_the_archive_description() ) : ?>
            <div class="archive-description">
                <?php the_archive_description(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if ( have_posts() ) : ?>

        <section class="archive-posts" aria-label="<?php esc_attr_e( 'Listado de contenidos', 'drdevcustomlanguage' ); ?>">

            <?php
            while ( have_posts() ) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>

                </article>

            <?php endwhile; ?>

        </section>

        <?php
        the_posts_pagination([
            'prev_text' => __('Anterior', 'drdevcustomlanguage'),
            'next_text' => __('Siguiente', 'drdevcustomlanguage'),
        ]);
        ?>

    <?php else : ?>

        <section class="no-results not-found">
            <p><?php esc_html_e( 'No se han encontrado contenidos.', 'drdevcustomlanguage' ); ?></p>
        </section>

    <?php endif; ?>

</main>

<?php
get_footer();