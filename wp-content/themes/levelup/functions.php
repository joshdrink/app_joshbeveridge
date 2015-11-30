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
		wp_enqueue_script('app-js', $javascript_directory . 'js/app.js', array());

		wp_localize_script( 'app-js', 'site', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		));

	}

	// Page Handler ================================================================
	add_action ('wp_ajax_load_page_data', 'load_page_data');
	add_action ('wp_ajax_nopriv_load_page_data', 'load_page_data');

	function load_page_data(){

		$args = array(
			'posts_per_page'    => -1
		);
		$post_query = new WP_Query( $args );

		$postName = $_POST['post_name'];

		while( $post_query->have_posts() ) : $post_query->the_post();

			$detectSlug = basename(get_the_permalink());

			if($postName == $detectSlug) {

				$postSlug = basename(get_the_permalink());
				$postTitle = get_the_title();
				$postTitleEncoded = urlencode(get_the_title());
				$postDate = get_the_date('l, F j, Y');
				$wordCount = str_word_count( strip_tags( get_the_content() ) );
				$postLength = round(($wordCount/250));
				$postContent = get_the_content();

				if(in_category("design")) {
					$postLinkTemp = "/#designer-post-".$postSlug;
				}
				if(in_category("gaming")) {
					$postLinkTemp = "/#gamer-post-".$postSlug;
				}

				$postLink = urlencode($postLinkTemp);

				$dataArray = array(
					"post_slug"=>$postSlug,
					"post_link"=>$postLink,
					"post_title"=>$postTitle,
					"post_title_encoded"=>$postTitleEncoded,
					"post_date"=>$postDate,
					"post_length"=>$postLength,
					"post_content"=>$postContent
				);

				echo json_encode($dataArray);

			}
			else {

			}

		endwhile;

		exit;

	}

	// Post Handler ================================================================
	add_action ('wp_ajax_load_post_data', 'load_post_data');
	add_action ('wp_ajax_nopriv_load_post_data', 'load_post_data');

	function load_post_data(){

		$args = array(
			'p' => $_POST['post_id']
		);

		$post_query = new WP_Query( $args );
		while( $post_query->have_posts() ) : $post_query->the_post();

			$postSlug = basename(get_the_permalink());
			$postTitle = get_the_title();
			$postTitleEncoded = urlencode(get_the_title());
			$postDate = get_the_date('l, F j, Y');
			$wordCount = str_word_count( strip_tags( get_the_content() ) );
			$postLength = round(($wordCount/250));
			$postContent = get_the_content();

			if(in_category("design")) {
				$postLinkTemp = "/#designer-post-".$postSlug;
			}
			if(in_category("gaming")) {
				$postLinkTemp = "/#gamer-post-".$postSlug;
			}

			$postLink = urlencode($postLinkTemp);

			$dataArray = array(
				"post_slug"=>$postSlug,
				"post_link"=>$postLink,
				"post_title"=>$postTitle,
				"post_title_encoded"=>$postTitleEncoded,
				"post_date"=>$postDate,
				"post_length"=>$postLength,
				"post_content"=>$postContent
			);

			echo json_encode($dataArray);

		endwhile;

		wp_reset_postdata();

		exit;

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

		$postSlug = basename(get_the_permalink());
		$postID = get_the_ID();

		if(in_category("design")) {
			$postLinkTemp = "/#designer-post-".$postSlug;
			$postCategory = "designer";
		}
		if(in_category("gaming")) {
			$postLinkTemp = "/#gamer-post-".$postSlug;
			$postCategory = "gamer";
		}

		return "... <a href='".$postLinkTemp."' class='get-post ".$postCategory."' data-postid='".$postID."'> [Read More]</a>";

	}
	add_filter('excerpt_more', 'new_excerpt_more');
