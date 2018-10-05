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
if(is_front_page()) {
echo '<article id="post" class="post type-post status-publish format-standard has-post-thumbnail es-ES entry">';
$my_postid = get_the_ID();//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
echo $content;
echo "</article>";
} else {
echo '<div class="row">';
echo '<div class="col-xs-12 col-md-2">';
$prestashop_id = get_field('prestashop_id', $my_postid );
echo getsuperparent($prestashop_id);
echo '</div>';
echo '<article id="post" class="col-xs-12 col-md-10 post type-post status-publish format-standard has-post-thumbnail es-ES entry">';
$my_postid = get_the_ID();//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
echo "<h1>".$content_post->post_title."</h1>";
$content = apply_filters('the_content', $content);
echo $content;
echo "</article>";
echo '</div>';
}
}
genesis();