<?php
/* Template Name: eBook Main */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_ebook_main_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_ebook_main_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add widgets
 *
 */
 
add_action('genesis_after_post_content', 'ci_ebook_main_widgets');

function ci_ebook_main_widgets() {
	require(CHILD_DIR.'/lib/includes/ebook-main-widgets.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_ebook_main_tips');

function ci_ebook_main_tips() {
	if ( ! dynamic_sidebar( 'eBook Main Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>