<?php
get_header('ecommerce');
get_template_part('template-parts/cabecera','ecommerce');
if (is_home()){ get_template_part('template-parts/letras','ecommerce'); }
?>
<?php query_posts('cat=8'); ?>
<?php if ( have_posts()) { ?>
    <?php $contador = 0; ?>
    <?php while ( have_posts() ) { ?>
        <?php the_post(); ?>
        <?php //get_the_post_thumbnail( int|WP_Post $post = null, string|array $size = 'post-thumbnail', string|array $attr = '' )?>
        <?php if ($contador == 0) { ?>
            <div class="post type-post status-publish format-video category-design span6 sticky">
                <div class="row">
                    <div class="thumbnail span3">
                        <?php echo the_post_thumbnail(); ?>
                        <div class="date span1">
                            <p>
                                <span class="month"><?php echo date("M");?><!--Oct--></span>
                                <span class="day"><?php echo date("d"); ?><!--17--></span>
                            </p>
                        </div>
                    </div>
                    <div class="the-content span3">
                        <h4>
                            <a href="<?php the_permalink(); ?>" title="Section shortcodes &amp; sticky posts!">
                                <?php the_title_attribute(); ?>
                            </a>
                        </h4>
                        <p><?php the_content(); ?></p>
                        <p><a href="<?php the_permalink(); ?>" class="more-link">|| read the article</a></p>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
            <div class="post type-post status-publish format-standard category-design category-themes tag-cleam tag-corporate tag-minimal span3">
                <div class="row">
                    <div class="date span1">
                        <p>
                            <span class="month"><?php echo date("M");?></span>
                            <span class="day"><?php echo date("d"); ?></span>
                        </p>
                    </div>
                    <div class="meta span2">
                        <h4>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_title_attribute(); ?>
                            </a>
                        </h4>
                        <p class="author">by <strong><?php the_title_attribute(); ?></strong></p>
                        <p class="comments">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <strong>Comments:</strong> <?php comments_number(); ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php comments_template(); ?>
        <?php $contador++; ?>
    <?php } ?>
    <?php wp_reset_query(); ?>
    </div>
    </div>
    <!-- END SECTION BLOG -->
    <div class="clear"></div>
    </div>
<?php }else{ ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php } ?>
<?php if (is_home() || is_front_page()){
    get_template_part('template-parts/partners','ecommerce');
}
get_footer();
?>
<!-- End section Blog -->
