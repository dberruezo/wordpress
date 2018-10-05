<div class="row" style="margin: 0 auto;">
<article id="post-<?php the_ID(); ?>" class="col-xs-12 col-md-8 post type-post status-publish format-standard has-post-thumbnail es-ES entry">
		<?php echo breadcrumbspost();?>
		<?php
			the_content();
		?>
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
</article><!-- #post-## -->
</div>