<?php

/* Template Name: Landing */

    /* Landing Stylesheet */
    add_action('wp_enqueue_scripts', 'add_stylesheets_landing');
    function add_stylesheets_landing() {
        wp_enqueue_style('landing-css', get_bloginfo('stylesheet_directory') . '/assets/css/landing.css', array());
    }

    $landing_query = new WP_Query(array(
        'posts_per_page'    => 1,
        'post_type'         => 'post'
    ));

    $stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/';

    get_header();

?>

    <!-- Hero ============================================================== -->
    <section class='content hero active'>

        <button class='button-content' id='contentButton'>
			<span>Back</span>
		</button>

        <div class='wrapper'>

            <div class='icon'>
                <img src='<?php echo $stylesheet_directory ?>img/icon_circle.svg'>
                <div class='flipper'>
                    <img src='<?php echo $stylesheet_directory ?>img/icon_jb.svg'>
                    <img src='<?php echo $stylesheet_directory ?>img/icon_x.svg'>
                </div>
            </div>

            <dl class='roles'>
                <dt></dt>
                <dd><h1>Designer.</h1></dd>
                <dd><h1>Coffee Drinker.</h1></dd>
                <dd><h1>Cat Lover.</h1></dd>
                <dd><h1>Gamer.</h1></dd>
                <dd><h1>Writer.</h1></dd>
            </dl>

        </div>

    </section>

    <?php
        get_footer();
    ?>
