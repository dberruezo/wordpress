<?php
$post=get_post(get_the_ID());?>
<h1><?php echo get_the_title();?></h1>
<div class="clearfix" style="margin: 0 auto;">
<article id="post-<?php the_ID(); ?>" class="post type-post status-publish format-standard has-post-thumbnail es-ES entry">
		<?php echo breadcrumbspost();?>
		<?php
			echo do_shortcode(wpautop($post->post_content));
		?>
</article><!-- #post-## -->
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</div>