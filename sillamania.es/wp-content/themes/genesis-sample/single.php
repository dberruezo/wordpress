<?php
/**
 * Custom Category Template
 *
 * @package      my_child_theme
 * @since        1.0.0
 * @author       Travis Smith <t@wpsmith.net>
 * @copyright    Copyright (c) 2013, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @link         https://gist.github.com/wpsmith/5062834
 *
 */
// Remove default loop
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'wps_category_do_loop_intro', 5 );
/**
 * Custom Loop Intro
 *
 */

function wps_category_do_loop_intro() {
			if ( has_post_format( 'aside' )) {
				get_template_part( 'template-parts/content', 'product' );
			} else {
				get_template_part( 'template-parts/content', 'single' );
			};
}
genesis();