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

        <div class='overlay'></div>

        <div class='wrapper'>
            <h1>I'm <span>Josh.</span></h1>
            <h1>I practice design. <span id='why'>Why?</span></h1>
        </div>

        <div class='why'>

            <dl class='why-menu'>
                <dt></dt>
                <dd class='return'><button id='whyClose'><i class='fa fa-chevron-left'></i>Return</button></dd>
                <dd class='active'><button id='who'>Who I Am</button></dd>
                <dd><button id='what'>What I Do</button></dd>
                <dd><button id='matters'>Why It Matters</button></dd>
            </dl>

            <div class='why-content'>
                <!-- <h2 class='portrait'>Design</h2> -->
                <!-- <p class='design'>Things</p> -->
                <p class='who active'>Growing up, I idolized some of the most powerful and intelligent people to never-exist: Superman, Batman, Wonder Woman. I was enthralled by having the ability to drastically alter someone's life for the better. It was hardly about Superman's strength – there was this feeling deep in my gut that overwhelmed me when I read about him breaking into a burning building to save not only the young child trapped inside, but the family dog too. I was envious that their fictional powers allowed them to shape people's lives in such a positive way for quite a long time. It was only recently that I discovered that superhuman or not, I had my own set of unique skills. Empathizing, asking, listening, solving. These attributes all combine to allow me to do something extraordinary: <strong>design</strong>. </p>
                <p class='what'>
                <em>“Design is the intentional conception and/or iteration of an idea that prioritizes user needs in order to facilitate meeting a defined goal.”</em><br><br>I design because it allows me to have positive impact. A combination of empathy, research, prototyping, and solution, design creates the opportunity for meeting new people, stepping into their shoes and discovering new perspectives. I am a sponge for new experience and this field is the ideal way for me to facilitate my passion. Through design, I will be able to create and adapt solutions to help the greater good. I might not be able to break into a burning building, but I sure might be able to think up a better fire extinguisher to prevent it in the first place.</p>
                <p class='matters'>Anyone can design, and it's not design that sets me apart. There's something to be said about the individuality of who I am, but the real reason my way of thinking is a superpower is that I genuinely care about people. I'm not afraid to step into an environment and experience the problem first hand. I talk with the people around me and learn about their struggles so that I can iterate upon my ideas. I treat every thought organically, and this allows my design process to grow and change to fit the needs of the problem at hand. Empathy is my biggest asset. People always come first, because without them, all the super-strength in the world would be useless. If you have a similar mindset, I want to <a href='mailto:me@joshbeveridge.com'>hear from you</a>.</p>
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
