<?php

/* Template Name: Article */

	/* Article Stylesheet */
	add_action('wp_enqueue_scripts', 'add_stylesheets_article');
	function add_stylesheets_article() {
		wp_enqueue_style('article-css', get_bloginfo('stylesheet_directory') . '/assets/css/article.css', array());
	}

	get_header();

	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);

?>

	<!-- Article =========================================================== -->
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
        get_footer();
    ?>
