<?php

/* Template Name: Lost */

    /* Landing Stylesheet */
    add_action('wp_enqueue_scripts', 'add_stylesheets_lost');
    function add_stylesheets_lost() {
        wp_enqueue_style('lost-css', get_bloginfo('stylesheet_directory') . '/assets/css/lost.css', array());
    }

    $stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/';

    get_template_part( 'header-lost' );

?>

    <!-- Before ============================================================ -->


    <!-- After =========================================================== -->
