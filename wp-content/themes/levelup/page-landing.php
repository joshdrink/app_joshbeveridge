<?php

/* Template Name: Landing */

    /* Landing Stylesheet */
    add_action('wp_enqueue_scripts', 'add_stylesheets_landing');
    function add_stylesheets_landing() {
        wp_enqueue_style('landing-css', get_bloginfo('stylesheet_directory') . '/assets/css/landing.css', array());
    }

    $design_query = new WP_Query(array(
        'category_name'    => 'Design',
        'posts_per_page'    => -1,
        'post_type'         => 'post'
    ));

    $gaming_query = new WP_Query(array(
        'category_name'    => 'Gaming',
        'posts_per_page'    => -1,
        'post_type'         => 'post'
    ));

    $stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/';

    get_header();

?>

    <div class='stage'>

        <section class='loader'>

    		<p>LOADING</p>

    	</section>

        <div class='pane black'></div>
        <div class='pane white'></div>

        <section class='hero-section design'>

            <button id='landingDesign'>
                <i class='fa fa-chevron-up'></i>
                <h1>Designer</h1>
            </button>

        </section>

        <div class='icon-wrapper'>

            <div class='square-white'></div>
            <div class='square-red'></div>
            <img src='<?php echo $stylesheet_directory ?>img/icon_jb.svg' alt='Josh Beveridge Icon'>

        </div>

        <section class='hero-section gaming'>

            <button id='landingGaming'>
                <h1>Gamer</h1>
                <i class='fa fa-chevron-down'></i>
            </button>

        </section>

        <section class='desktop-navigation'>

            <div class='wrapper'>

                <div class='navigation-wrapper'>
                    <button class='return-to-list listing'>Return to the Listing</button>
                    <button class='return-home'>Return Home</button>
                </div>

                <h1 class='design'>Designer</h1>
                <h1 class='gaming'>Gamer</h1>

                <div class='content-wrapper'>
                    <p class='design'>Anyone can design, and it's not design that sets me apart. My process matters because I genuinely care about people. I embrace context and live the problem first hand. I talk with those who own the problem and learn about their experience so that I can iterate upon my ideas. I treat every thought organically, and this allows my perspective to grow and change to fit the needs of the challenge I've chosen. <strong>Empathy is my biggest asset.</strong> People always come first, because without them, all the design in the world would be useless.</p>
                    <p class='gaming'>Everyone has a different reason to keep getting back up again. Sometimes it's to beat the high score. Sometimes it's to prove your strength. Sometimes it's to show the world that you've got what it takes. I get back up because there's always someone else who can use a hand. <strong>I game because it gives me the chance to be heroic.</strong> Gaming is a relentless challenge that teaches me day-in and day-out that no matter what we're up against, there will always be the opportunity to succeed. Oh, and did I mention how much fun you have?</p>
                </div>

            </div>

        </section>

        <section class='listing-section design'>

            <div class='content-wrapper'>

                <div class='layout-wrapper'>

                    <div class='wrapper'>
                        <button class='return-home'><i class='fa fa-chevron-left'></i> Return Home</button>
                    </div>

                    <h1 class='section-title'>Josh, The Designer</h1>

                    <div class='social'>
                        <a href='https://twitter.com/joshdrink' alt='Twitter'><i class='fa fa-twitter'></i>On Twitter</a>
                        <a href='https://ca.linkedin.com/in/joshdrink' alt='Linkedin'><i class='fa fa-linkedin'></i>On Linkedin</a>
                    </div>

                    <p class='section-summary'>This is an archive of thoughts that address design and its implementation. If you're looking for a specific article, the filter below will help you find it.</p>

                    <input id='designFilter' type='text' placeholder='Filter by Title...'>

                    <?php if($design_query->have_posts()) { ?>

                        <dl class='article-list'>
                            <dt></dt>

                            <?php
        				        while ($design_query->have_posts()) : $design_query->the_post();
                                $wordCount = str_word_count( strip_tags( get_the_content() ) );
                    			$postLength = round(($wordCount/250));
        				    ?>

                            <dd>
                                <button class='get-post designer' data-postid='<?php the_ID() ?>'>
                                    <h3><?php the_title() ?></h3>
                                </button>
                                <span>Published on <?php echo get_the_date('l, F j, Y') ?></span>
                                <a href='https://en.wikipedia.org/wiki/Words_per_minute#Reading_and_comprehension' id='#' alt='Words Per Minute'><?php echo $postLength ?> minute read</a>
                                <?php the_excerpt() ?>
                            </dd>

                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>

                        </dl>

                    <?php } else { ?>

                    <h4 class='section-false'>Check back soon!</h4>

                    <?php } ?>

                </div>

            </div>

        </section>

        <section class='listing-section gaming'>

            <div class='content-wrapper'>

                <div class='layout-wrapper'>

                    <div class='wrapper'>
                        <button class='return-home'><i class='fa fa-chevron-left'></i> Return Home</button>
                    </div>

                    <h1 class='section-title'>Josh, The Gamer</h1>

                    <div class='social'>
                        <a href='https://twitter.com/joshdrink' alt='Twitter'><i class='fa fa-twitter'></i>On Twitter</a>
                        <a href='https://www.youtube.com/channel/UCIt4i63HQ8Xujhmhrl_bo9Q' alt='Youtube'><i class='fa fa-youtube-play'></i>On YouTube</a>
                    </div>

                    <p class='section-summary'>These are my recent videos, tutorials and reviews that cover some of my favourite games and platforms. Looking for something specific? Give it a search below.</p>

                    <input id='gamingFilter' type='text' placeholder='Filter by Title...'>

                    <?php if($gaming_query->have_posts()) { ?>

                        <dl class='article-list'>
                            <dt></dt>

                            <?php
        				        while ($gaming_query->have_posts()) : $gaming_query->the_post();
                                $wordCount = str_word_count( strip_tags( get_the_content() ) );
                    			$postLength = round(($wordCount/250));
        				    ?>

                            <dd>
                                <button class='get-post gamer' data-postid='<?php the_ID() ?>'>
                                    <h3><?php the_title() ?></h3>
                                </button>
                                <span>Published on <?php echo get_the_date('l, F j, Y') ?></span>
                                <a href='https://en.wikipedia.org/wiki/Words_per_minute#Reading_and_comprehension' id='#' alt='Words Per Minute'><?php echo $postLength ?> minute read</a>
                                <?php the_excerpt() ?>
                            </dd>

                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>

                        </dl>

                    <?php } else { ?>

                    <h4 class='section-false'>Check back soon!</h4>

                    <?php } ?>

                </div>

            </div>

        </section>

        <section class='article-section'>

            <div class='content-wrapper'>

                <div class='layout-wrapper'>

                    <div class='wrapper'>
                        <button class='return-to-list'>Return to the Listing</button>
                    </div>

                    <div class='article'></div>

                    <div class='post-sharing'>

                        <hr>

                        <dl>
                            <dt></dt>
                            <dd><a id='twitterLink' target='_blank'><i class='fa fa-twitter'></i>#HashtagIt</a></dd>
                            <dd><a id='linkedinLink' target='_blank'><i class='fa fa-linkedin'></i>Share This</a></dd>
                            <dd><a id='facebookLink' target='_blank'><i class='fa fa-facebook'></i>Get Likes</a></dd>
                        </dl>

                        <h3 class='tol'>Do great things.</h3>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <?php
        get_footer();
    ?>
