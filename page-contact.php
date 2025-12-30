<?php 

if (!defined('ABSPATH')) exit;

/**
 * Template Name: Contact
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
    <?php   
        get_template_part('template-parts/commons/content-stickbanner'); 
        get_template_part( 'template-parts/commons/content', 'cf7Gen'); 
        get_template_part('template-parts/commons/content-contactcita');
    ?>    
</main>

<?php get_footer(); ?>