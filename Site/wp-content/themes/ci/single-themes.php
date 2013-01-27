<?php

add_filter( 'genesis_pre_get_option_site_layout', 'ci_themes_single_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_themes_single_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Remove Post Info
 *
 */
 remove_action( 'genesis_before_post_content', 'genesis_post_info' );
 
/**
 * Remove Post Meta
 *
 */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

/**
 * Remove Author Box
 *
 */
remove_action( 'genesis_after_post', 'genesis_do_author_box_single' );

/**
 * Rotating Tip Box
 *
 */
 add_action('genesis_after_content_sidebar_wrap', 'ci_rotate_themes_tips');

function ci_rotate_themes_tips() {
	if ( ! dynamic_sidebar( 'Themes Rotate Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>