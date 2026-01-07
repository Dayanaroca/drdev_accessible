<?php 

if (!defined('ABSPATH')) exit;

/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header(); ?>

<main class="accesible-seccion flex flex-col gap-12 w-full pt-28 pb-14">
    <?php get_template_part('template-parts/commons/content-stickbanner'); ?>  
    <section aria-labelledby="404-heading"  class="flex flex-col gap-4 w-auto lg:w-full max-w-screen-etg mx-2.5 lg:mx-auto border-b-2 border-b-secondary">
        <h2 id="404-heading" class="font-bold text-4xl text-center mb-5 text-color6 w-full lg:w-3/5 mx-auto">
            <?php esc_html_e( 'No se encontraron resultados disponibles para esta búsqueda', 'drdevcustomlanguage' ); ?>
        </h2>
        <?php 
            echo drdev_image_decorative('/assets/images/404/etg-404.png', 'w-full h-auto', '', '1120', '477'); ?>
    </section>
</main>

<?php get_footer(); ?>