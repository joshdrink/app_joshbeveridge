<?php

/* Template Name: Web Resources */

    /* Landing Stylesheet */
    add_action('wp_enqueue_scripts', 'add_stylesheets_webresources');
    function add_stylesheets_webresources() {
        wp_enqueue_style('webresources-css', get_bloginfo('stylesheet_directory') . '/assets/css/webresources.css', array());
    }

    $stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/';

    get_header();

    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);

?>

    <!-- Splash ============================================================ -->
    <section class='resources'>

        <div class='page-photo' style="background-image: url('<?php echo $thumb_url[0] ?>')">
            <div class='container'>
                <h1><?php the_title() ?></h1>
            </div>
        </div>

        <section class='content'>
            <div class='container'>
                <?php the_content() ?>
            </div>
        </section>

    </section>

    <?php
        get_footer();
    ?>
