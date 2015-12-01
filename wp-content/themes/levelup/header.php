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
	<title>Josh Beveridge</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Google Analytics ================================================== -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-66136335-1', 'auto');
		ga('require', 'landingDesign');
		ga('require', 'landingGaming');
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
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#e1193c">
	<meta name="msapplication-TileColor" content="#e1193c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#e1193c">

	<!-- Google Fonts ====================================================== -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700,500,900,300,100|Roboto+Mono:400,700' rel='stylesheet' type='text/css'>

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
