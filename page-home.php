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

<main class="accesible-seccion flex flex-col w-full pt-28 pb-14">
    <?php   
        get_template_part('template-parts/commons/content-stickbanner');  
        get_template_part('template-parts/home/content-herohome');
        get_template_part('template-parts/home/content-titlewithtext');
        get_template_part('template-parts/home/content-destinations');
        get_template_part('template-parts/home/content-imagewithtext');
        get_template_part('template-parts/home/content-slideblog');
        get_template_part('template-parts/home/content-testimonials');
    ?>    
</main>

<?php get_footer(); ?>