<?php
/* Template Name: Disclosures */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_disclosures_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_disclosures_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_disclosures_crumb');

function ci_disclosures_crumb() {
	echo '<h4 class="crumb-title">';
	echo 'Disclosures';	
	echo '</h4>';
}

/**
 * Add widgets
 *
 */
 
add_action('genesis_after_post_content', 'ci_disclosures_widgets');

function ci_disclosures_widgets() {
	require(CHILD_DIR.'/lib/includes/about-tools-widgets.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_disclosures_tips');

function ci_disclosures_tips() {
	if ( ! dynamic_sidebar( 'Disclosures Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>