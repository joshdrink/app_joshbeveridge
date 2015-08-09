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

    <!-- Splash ============================================================ -->
    <section class='hero'>

        <a href='/' class='logo'>
            <img src='<?php echo $stylesheet_directory ?>img/logo_jbdesign.png'>
        </a>

    </section>

    <!-- Article =========================================================== -->
    <a id='article'></a>

    <?php
        while ($landing_query->have_posts()) : $landing_query->the_post();
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
    ?>

    <article>
        <div class='article-photo' style="background-image: url('<?php echo $thumb_url[0] ?>')">
            <div class='container'>
                <h6>Published on <?php the_date('l, F j, Y') ?></h6>
                <h1><?php the_title() ?></h1>
            </div>
        </div>
        <section class='content'>
            <div class='container'>
                <?php the_content() ?>
                <hr>
                <dl class='social'>
                    <dt></dt>
                    <dd><a href="https://twitter.com/intent/tweet?text=<?php the_title()|urlencode ?>&amp;via=joshdrink&amp;url=<?php the_permalink()|urlencode ?>"  data-counturl='<?php the_permalink() ?>' target='_blank'><i class='fa fa-twitter'></i>#TweetItUp</a></dd>
                    <dd><a href='https://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title()|urlencode ?>&amp;url=<?php the_permalink()|urlencode ?>' target='_blank'><i class='fa fa-linkedin'></i>Spread the Word</a></dd>
                    <dd><a href='http://www.facebook.com/sharer.php?u=<?php the_permalink()|urlencode ?>' target='_blank'><i class='fa fa-facebook'></i>Earn Some Likes</a></dd>
                </dl>
                <h3 class='tol'>Think Out Loud.</h3>
            </div>
        </section>
    </article>

    <?php
        endwhile;
        wp_reset_postdata();

        get_footer();
    ?>
