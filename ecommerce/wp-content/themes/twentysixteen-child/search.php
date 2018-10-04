<?php
get_header('ecommerce');
get_template_part('template-parts/cabecera','ecommerce');
if (is_home()){ get_template_part('template-parts/letras','ecommerce'); }
?>
<?php
$s=get_search_query();
$args = array('s' =>$s);
// The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
?>
    <div class="container">
        <div class="row">
    <?php
    _e("<h2 style='font-weight:bold;color:#000'>Resultados para: ".get_query_var('s')."</h2>");
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        ?>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
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
                    <p class="author">by <strong><?php echo get_the_author(); ?></strong></p>
                    <p class="comments">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <strong>Comments:</strong> <?php comments_number(); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <?php
    }
    ?>
    <div class="pagination">
            <?php
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
            ) );
            ?>
     </div>
<?php
}else{
    ?>
    <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
    <div class="alert alert-info">
        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    </div>
<?php } ?>
        </div>
    </div>
</div>
</div>
<!-- END SECTION BLOG -->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
