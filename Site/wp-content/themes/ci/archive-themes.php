<?php

add_filter( 'genesis_pre_get_option_site_layout', 'ci_themes_main_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_themes_main_page_layout( $opt ) {
	return 'full-width-content';
}

add_action('genesis_after_content_sidebar_wrap', 'ci_themes_main_training_tips');

function ci_themes_main_training_tips() {
	if ( ! dynamic_sidebar( 'Themes Main Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_about_philosophy_head_crumb');

function ci_about_philosophy_head_crumb() {
	echo '<h4 class="crumb-title">';
	echo '<span class="current-page">Genesis Child Themes</span>';	
	echo '</h4>';
}

/**
 * Remove Loop and replace with static content
 *
 */
 
remove_action('genesis_loop', 'genesis_do_loop');
 
add_action('genesis_loop', 'ci_train_main_content');

function ci_train_main_content() {
	require(CHILD_DIR.'/lib/includes/themes-main-content.php');
}

genesis();
?>