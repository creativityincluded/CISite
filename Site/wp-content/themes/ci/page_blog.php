<?php
add_filter( 'genesis_pre_get_option_site_layout', 'ci_blog_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_blog_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_blog_head_crumb');

function ci_blog_head_crumb() {
	echo '<h4 class="crumb-title">';
	echo '<span class="current-page">CI Blog</span>';
	echo '</h4>';
}

//REMOVE POST TITLE
remove_action('genesis_post_title', 'genesis_do_post_title');
add_action ('genesis_post_title', 'my_post_title');
function my_post_title() {
	echo '<a href="';
	echo get_permalink();
	echo '">';
	echo '<h2 class="entry-title">';
	echo get_the_title();
	echo '</h2>';
	echo '</a>';
}

/**
 * Add Tip Widget
 *
 */
add_action('genesis_after_content_sidebar_wrap', 'ci_blog_tips');

function ci_blog_tips() {
	if ( ! dynamic_sidebar( 'Blog Rotating Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>