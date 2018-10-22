<?php
define( 'WP_USE_THEMES',false );
require_once( '../wp-load.php' );
exit;
$categories = get_categories( array(
    'child_of'            => 0,
    'current_category'    => 0,
    'depth'               => 0,
    'echo'                => 1,
    'exclude'             => '',
    'exclude_tree'        => '',
    'feed'                => '',
    'feed_image'          => '',
    'feed_type'           => '',
    'hide_empty'          => 0,
    'hide_title_if_empty' => false,
    'hierarchical'        => true,
    'order'               => 'ASC',
    'orderby'             => 'name',
    'separator'           => '<br />',
    'show_count'          => 0,
    'show_option_all'     => '',
    'show_option_none'    => __( 'No categories' ),
    'style'               => 'list',
    'taxonomy'            => 'category',
    'title_li'            => __( 'Categories' ),
    'use_desc_for_title'  => 1,
) );

foreach( $categories as $category ) {
	$categorias[$category->slug]=$category->term_id;
} 
print_r($categorias);

    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
    $pages = get_pages($args);
    foreach ($pages as $pos) {
		$grupo = get_field('grupo', $pos->ID );	
		if($grupo=="productos") {
			if($categorias[$pos->post_name]!="") {
			$que="DELETE FROM `di_postmeta` WHERE `meta_key`='categoria' AND post_id='".$pos->ID."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$que="DELETE FROM `di_postmeta` WHERE `meta_key`='_categoria' AND post_id='".$pos->ID."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			add_post_meta($pos->ID,'categoria',$categorias[$pos->post_name],true);
			echo "<p>".$pos->post_title."=".$categorias[$pos->post_name]."</p>";
			} else {
			echo "<p>CUIDADO".$pos->post_title."</p>";
			}
		}
	};

