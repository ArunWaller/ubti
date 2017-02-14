<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package ubti
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function ubti_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'ubti_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function ubti_jetpack_setup
add_action( 'after_setup_theme', 'ubti_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function ubti_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function ubti_infinite_scroll_render
