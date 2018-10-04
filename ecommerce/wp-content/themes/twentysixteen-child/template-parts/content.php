<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (!is_page()){
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
        }
        ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <?php the_content(null,false); ?>
    </div><!-- .entry-content -->

    <?php
    // Author bio.
    if ( is_single() && get_the_author_meta( 'description' ) ) :
        get_template_part( 'author-bio' );
    endif;
    ?>
    <footer class="entry-footer">
        <?php //twentyfifteen_entry_meta(); ?>
        <?php //edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
