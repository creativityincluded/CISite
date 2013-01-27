<?php
/* Template Name: About Main */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_about_main_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_about_main_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add widgets
 *
 */
 
add_action('genesis_after_post_content', 'ci_about_main_widgets');

function ci_about_main_widgets() {
	require(CHILD_DIR.'/lib/includes/about-main-widgets.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_about_main_tips');

function ci_about_main_tips() {
	if ( ! dynamic_sidebar( 'About Main Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>