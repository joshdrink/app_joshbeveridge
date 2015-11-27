<?php

$postSlug = basename(get_the_permalink());

if(in_category("design")) {
    // $postLinkTemp = "http://joshbeveridge.com/#designer-post-".$postSlug;
    $postLinkTemp = "/#designer-post-".$postSlug;
}
if(in_category("gaming")) {
    // $postLinkTemp = "http://joshbeveridge.com/#gamer-post-".$postSlug;
    $postLinkTemp = "/#gamer-post-".$postSlug;
}

wp_redirect($postLinkTemp);
exit;
?>
