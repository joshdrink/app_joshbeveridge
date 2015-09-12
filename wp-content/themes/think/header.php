<!DOCTYPE html>
<!--[if IE 8]>
	<html class='no-js lt-ie9'>
<![endif]-->

<!--[if IE 9]>
	<html class='no-js lt-ie10'>
<![endif]-->

<!--[if gt IE 9]><!-->
	<html class='no-js'>
<!--<![endif]-->

<head>

	<!-- Site Meta Data ==================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php wp_title(); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Google Analytics ================================================== -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-66136335-1', 'auto');
		ga('send', 'pageview');
	</script>

	<!-- Favicons ========================================================== -->
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#00a300">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Google Fonts ====================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900,300|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

	<!-- Typekit =========================================================== -->
	<script src="//use.typekit.net/osi6lyk.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<!-- wp_head =========================================================== -->
	<?php wp_head(); ?>

</head>

<?php

    $nav_query = new WP_Query(array(
        'posts_per_page'    => -1,
        'post_type'         => 'post'
    ));

    $stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/';

?>

<body <?php body_class(); ?>>

	<?php $stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/'; ?>

	<!-- Navigation ==================================================== -->
	<nav class='navigation'>

	    <div class='pane'>

			<div class='close-area'></div>

			<section class='navigation-content navThink'>

				<?php
			        while ($nav_query->have_posts()) : $nav_query->the_post();
			    ?>

			    <a href='<?php the_permalink() ?>' class='post-preview'>
					<h6>Published on <?php echo get_the_date('l, F j, Y') ?></h6>
	                <h1><?php the_title() ?></h1>
					<?php the_excerpt() ?>
					<hr>
				</a>

			    <?php
			        endwhile;
			        wp_reset_postdata();
			    ?>

		    </section>

			<section class='navigation-content navBuild'>

		    </section>

			<section class='navigation-content navLearn'>

		    </section>

		    <section class='navigation-content navQuest'>

		    </section>

		</div>

	    <section class='menu'>
	        <dl>
	            <dt></dt>
	            <dd><button id='navThink'>Think.</button></dd>
				<dd><button class='disable' id='navBuild'>Build.</button></dd>
	            <dd><button class='disable' id='navLearn'>Learn.</button></dd>
	            <dd><button class='disable' id='navQuest'>Quest.</button></dd>
	            <dd>
	                <button id='navClose' class='close'>
	                    <img src='<?php echo $stylesheet_directory ?>img/icon_circle.svg'>
	                    <div class='flipper'>
	                        <img src='<?php echo $stylesheet_directory ?>img/icon_jb.svg'>
	                        <img src='<?php echo $stylesheet_directory ?>img/icon_x.svg'>
	                    </div>
	                </button>
	            </dd>
	        </dl>
	    </section>

	</nav>
