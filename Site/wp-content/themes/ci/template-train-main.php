<?php
/* Template Name: Training Main */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_train_main_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_train_main_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add widgets
 *
 */
 
add_action('genesis_after_post_content', 'ci_train_main_widgets');

function ci_train_main_widgets() {
	require(CHILD_DIR.'/lib/includes/train-main-widgets.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_train_main_tips');

function ci_train_main_tips() {
	if ( ! dynamic_sidebar( 'Training Main Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>