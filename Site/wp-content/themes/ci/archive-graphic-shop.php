<?php

add_filter( 'genesis_pre_get_option_site_layout', 'ci_graphic_main_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_graphic_main_page_layout( $opt ) {
	return 'full-width-content';
}

add_action('genesis_after_content_sidebar_wrap', 'ci_graphic_main_training_tips');

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
add_action('genesis_before_content', 'ci_aff_crumb');

function ci_aff_crumb() {
	echo '<h4 class="crumb-title">';
	echo '<span class="current-page">Graphic Shop</span>';	
	echo '</h4>';
}

/**
 * Remove Loop and replace with static content
 *
 */
 
remove_action('genesis_loop', 'genesis_do_loop');
 
add_action('genesis_loop', 'ci_graphic_main_content');

function ci_graphic_main_content() {
	require(CHILD_DIR.'/lib/includes/graphics-main-content.php');
}

genesis();
?>