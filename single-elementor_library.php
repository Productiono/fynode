<?php

/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Fynode
* @since 1.0.0
*/

	remove_action( 'fynode_main_header', 'fynode_main_header_function', 20 );
	remove_action( 'fynode_main_footer', 'fynode_main_footer_function', 10 );

    get_header();

    while ( have_posts() ) : the_post();
        the_content();
    endwhile;

    get_footer();
?>
