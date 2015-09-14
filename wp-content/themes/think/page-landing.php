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

            <dl class='why-menu landscape'>
                <dt></dt>
                <dd class='active'><button id='past'>Past</button></dd>
                <dd><button id='present'>Present</button></dd>
                <dd><button id='future'>Future</button></dd>
                <dd><button id='design'>Design</button></dd>
                <dd><button id='whyClose01'>Close</button></dd>
            </dl>

            <div class='why-content'>
                <h2 class='portrait'>Past</h2>
                <p class='past active'>Thigns</p>
                <h2 class='portrait'>Present</h2>
                <p class='present'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h2 class='portrait'>Future</h2>
                <p class='future'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h2 class='portrait'>Design</h2>
                <p class='design'>When I was young, I wanted nothing more than to be a Superhero. My role models were as powerful as gods and dedicated each and every moment of their fictional existence to the idealistic pursuit of the greater good. It was a lofty goal in my mind, but not once did I believe that joining the likes of Superman was impossible. As I grew, I came to the exasperating conclusion that superpowers might possibly be beyond my reach. At first this was defeating, but with time I discovered that, while I might not be able to lift a car, I sure can solve people’s problems.</p>
                <button id='whyClose02' class='portrait'>Close</button>
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
                <h3 class='tol'>Think Out Loud.</h3>
            </div>
        </section>
    </article>

    <?php
        endwhile;
        wp_reset_postdata();

        get_footer();
    ?>
