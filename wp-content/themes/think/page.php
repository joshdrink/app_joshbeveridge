<?php

/* Template Name: Subpage */

	global $post;
	$smarty = wp_smarty();

	get_header();

	$smarty->display('page-article.tpl');

	get_footer();
