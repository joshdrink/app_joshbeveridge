<?php

	// Enqueues ================================================================
	add_action('wp_enqueue_scripts', 'enqueue_stylesheets');
	function enqueue_stylesheets() {
		$stylesheet_directory = get_bloginfo('stylesheet_directory') . '/assets/';
		wp_enqueue_style('normalize-css', $stylesheet_directory . 'bower_components/normalize.css/normalize.css', array());
		wp_enqueue_style('fontawesome-css', $stylesheet_directory . 'bower_components/fontawesome/css/font-awesome.min.css', array());
		wp_enqueue_style('ionicons-css', $stylesheet_directory . 'bower_components/ionicons/css/ionicons.min.css', array());
	}

	add_action('wp_enqueue_scripts', 'enqueue_javascripts');
	function enqueue_javascripts() {
		$javascript_directory = get_bloginfo('stylesheet_directory') . '/assets/';
		wp_enqueue_script('modernizr-js', $javascript_directory . 'bower_components/modernizr/modernizr.js', array());
		wp_enqueue_script('jquery-js', $javascript_directory . 'bower_components/jQuery/dist/jquery.min.js', array());
		wp_enqueue_script('buggyfill-js', $javascript_directory . 'bower_components/viewport-units-buggyfill/viewport-units-buggyfill.js', array());
		wp_enqueue_script('match-media-js', $javascript_directory . 'bower_components/matchMedia/matchMedia.js', array());
		wp_enqueue_script('smoothstate-js', $javascript_directory . 'bower_components/smoothstate/jquery.smoothState.min.js', array());
		wp_enqueue_script('app-js', $javascript_directory . 'js/app.js', array());
	}

	// Featured Image Support ==================================================
	add_theme_support( 'post-thumbnails' );

	// Custom Excerpt Length ===================================================
	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	// Custom Ellipsis =========================================================
	function new_excerpt_more( $more ) {
		return ' [Read.]';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
