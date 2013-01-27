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
	echo '<h4 class="crumb-title-mult">';
	echo '<a class="parent-cat" href="http://www.creativityincluded.com/blog/" title="Our Blog">Our Blog</a>';
	echo ' &raquo; ';
	echo '<span class="current-page">';
	echo  get_the_title();
	echo '</span>';
	echo '</h4>';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_after_content', 'ci_blog_footer_crumb');

function ci_blog_footer_crumb() {
	echo '<h4 class="crumb-title-bottom">';
	echo '<a class="parent-cat" href="http://www.creativityincluded.com/blog/" title="Our Blog">Our Blog</a>';
	echo ' &raquo; ';
	echo '<span class="current-page">';
	echo  get_the_title();
	echo '</span>';
	echo '</h4>';
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