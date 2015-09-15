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
    <section class='hero' style="background-image: url('<?php echo $stylesheet_directory ?>img/noise.gif')">

        <div class='overlay'></div>

        <div class='wrapper'>
            <h1>I'm <span>Josh.</span></h1>
            <h1>I practice design. <span id='why'>Why?</span></h1>
        </div>

        <div class='why'>

            <dl class='why-menu'>
                <dt></dt>
                <dd class='return'><button id='whyClose'><i class='fa fa-chevron-left'></i>Return</button></dd>
                <dd class='active'><button id='past'>Past</button></dd>
                <dd><button id='present'>Present</button></dd>
                <dd><button id='future'>Future</button></dd>
            </dl>

            <div class='why-content'>
                <!-- <h2 class='portrait'>Design</h2> -->
                <!-- <p class='design'>Things</p> -->
                <p class='past active'>When I was young, I wanted nothing more than to be a superhero. My role models were as powerful as gods and dedicated each and every moment of their fictional existence to the idealistic pursuit of the greater good. I understood that this was a lofty goal, but not once did I believe that joining the likes of Superman was impossible. As I grew, I came to the exasperating conclusion that superpowers might possibly be beyond my reach. At first this was defeating, but with time I discovered that, while I might not be able to lift a car, I sure could solve people’s problems.</p>
                <p class='present'>Today, I learn something new. With every question I ask and every solution I design, I dive deeper into a world that thrives on the organization of chaos. This chaos invigorates me; it challenges me in every facet of my day-to-day life. A problem is the unique essence that allows me to sharpen my skills and navigate the cyclical nature of iteration. Today, I take advantage of every opportunity to ask <strong>why</strong>. One word has never been so powerful.</p>
                <p class='future'>What the future holds is exciting and unclear. I’ve discovered that design is equivalent to having my own superpower. Inquisition and curiosity will fuel my ambition. With every day that passes I will learn how to refine my way of thinking and adapt to the people around me. The more people I meet, the more perspective I’ll experience. My ability to empathize with those people will be what propels me forward in my career, because only once you can see the world through their eyes can you forge solutions that will change their lives forever.</p>
            </div>

        </div>

        <button id='recent' class='recent-post'>The Latest Thought<i class='fa fa-chevron-down'></i></button>

    </section>

    <!-- Article =========================================================== -->

    <?php
        while ($landing_query->have_posts()) : $landing_query->the_post();
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
    ?>

    <article>
        <div class='article-photo' style="background-image: url('<?php echo $thumb_url[0] ?>')">
            <div class='container'>
                <h6>Published on <?php echo get_the_date('l, F j, Y') ?></h6>
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
                <h3 class='tol'>Think out loud.</h3>
            </div>
        </section>
    </article>

    <?php
        endwhile;
        wp_reset_postdata();

        get_footer();
    ?>
