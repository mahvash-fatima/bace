<?php
/**
 * Template Name: Home
 *
 * Used for showing Home page.
 *
 * @package Bace
 */

get_header();

get_template_part('template-parts/banner');

get_template_part( 'template-parts/main-content' ); ?>

<?php get_template_part( 'template-parts/our-partners' );

get_footer();
