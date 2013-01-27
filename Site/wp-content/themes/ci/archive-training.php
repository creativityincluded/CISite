<?php

add_filter( 'genesis_pre_get_option_site_layout', 'ci_train_main_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_train_main_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Remove Loop and replace with static content
 *
 */
 
remove_action('genesis_loop', 'genesis_do_loop');
 
add_action('genesis_loop', 'ci_train_main_content');

function ci_train_main_content() {
	require(CHILD_DIR.'/lib/includes/train-main-content.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_main_training_tips');

function ci_main_training_tips() {
	if ( ! dynamic_sidebar( 'Training Main Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>