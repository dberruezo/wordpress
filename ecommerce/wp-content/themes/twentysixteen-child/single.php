<?php
get_header('ecommerce');
get_template_part('template-parts/cabecera','ecommerce');
while ( have_posts() ) :
    the_post();
    $id              = get_the_ID();
    $custom_fields   = get_post_custom($id);
    $claves          = array_keys($custom_fields);
    $categoriaVector = get_the_category();
    $author          = get_the_author();
    //var_dump($categoriaVector);
    //var_dump($postDetalle);
    $postDetalle     = get_post();
    //var_dump($post);
    wp_reset_postdata();
endwhile;
wp_reset_postdata();
if ($categoriaVector[0]->name == "Proyectos") {
?>
    <div class="container2">
        <div id="content" class="main">
            <div class="primary-content">
                <h3>Nuestro Proyectos</h3>
                <h6>Aquí tienen un resumen de los proyectos de eCommerceBarcelona360</h6>
                <p>A continuación se muestran las características,imágenes y detalles del proyecto<?php the_title(); ?></p>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h6>Descripción</h6>
                    <p><?php echo the_content(); ?></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h6>Detail Project</h6>
                    <p>Client: <?php echo $custom_fields["Client"][0]; ?></p>
                    <p>Technology: <?php echo $custom_fields["Technology"][0]; ?></p>
                    <p>Link: <a href="<?php echo $custom_fields["Link"][0]; ?>"><?php echo $custom_fields["Link"][0]; ?></a></p>
                    <p>Company: <?php echo $custom_fields["Company"][0]; ?></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h6>Características</h6>
                    <?php
                    foreach ($claves as $clave) {
                        $findme = 'carac';
                        $pos = strpos($clave, $findme);
                        if ($pos !== false) {
                            ?>
                            <p><?php echo $custom_fields[$clave][0]; ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="big-demo go-wide">
                    <div class="grid" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 110 } }">
                        <a href="<?php the_permalink() ?>">
                            <div class="grid-splash-item grid-splash-item--height2"
                                 style="background-image:url('<?php echo $custom_fields["imagen1"][0] ?>');background-size: cover;"></div>
                            <div class="grid-splash-item"
                                 style="background-image:url('<?php echo $custom_fields["imagen2"][0] ?>');background-size: cover;"></div>
                            <div class="grid-splash-item"
                                 style="background-image:url('<?php echo $custom_fields["imagen3"][0] ?>');background-size: cover;"></div>
                            <div class="grid-splash-item"
                                 style="background-image:url('<?php echo $custom_fields["imagen4"][0] ?>');background-size: cover;"></div>
                            <div class="grid-splash-item"
                                 style="background-image:url('<?php echo $custom_fields["imagen5"][0] ?>');background-size: cover;"></div>
                            <div class="grid-splash-item grid-splash-item--width2"
                                 style="background-image:url('<?php echo $custom_fields["imagen6"][0] ?>');background-size: cover;"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }else if($categoriaVector[0]->name == "Noticias"){ ?>
        <!-- SLOGAN -->
        <div class="slogan">
            <h2>Detalle de la notícia</h2>
            <h3><?php echo $postDetalle->post_title; ?></h3>
        </div>
        <!-- START PRIMARY -->
        <div id="primary" class="sidebar-right">
            <div class="container group">
                <div class="row">
                    <!-- START CONTENT -->
                    <div id="content-blog" class="span9 content group">
                        <div class="post type-post status-publish format-standard hentry hentry-post group blog-libra-big row">
                            <!-- post featured & title -->
                            <div class="date-comments span1">
                                <p class="date"><span class="month">Nov</span><span class="day">20</span></p>
                                <p class="comments"></p>
                            </div>
                            <div class="thumbnail span8">
                                <!-- post title -->
                                <img width="760" height="290" src="images/blog/23-760x290.jpg" class="attachment-blog_libra_big wp-post-image" alt=""/>
                                <!-- post meta -->
                                <h1 class="post-title">
                                    <a href="<?php echo get_site_url(); ?>/<?php echo $postDetalle->post_name ?>"><?php echo $postDetalle->post_title; ?></a>
                                </h1>
                            </div>
                            <div class="clear"></div>
                            <!-- post content -->
                            <div class="the-content single span8 group">
                                <p><?php the_content(); ?></p>
                                <?php $author = get_the_author(); ?>
                                <p>
                                    <span class="author">Posted by <a href="#" title="Posts by <?php echo $author; ?>" rel="author"><?php echo $author; ?></a></span>
                                    <span class="categories"> in <a href="<?php echo get_category_link($categoriaVector[0]->cat_ID); ?>" title="<?php echo $categoriaVector[0]->name; ?>" rel="<?php echo $categoriaVector[0]->name; ?>"><?php echo $categoriaVector[0]->name; ?></a>,
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row">
                            <!-- START SECTION BLOG -->
                            <div class="section blog span9">
                                <h2 class="title">Posts relacionados</h2>
                                <div class="row">
                                <?php
                                $args         = (array('cat'=>1));
                                $relatedPosts = new WP_Query( $args );
                                $contador     = 0;
                                if ($relatedPosts->have_posts()){
                                    while ($relatedPosts->have_posts()) {
                                        $relatedPosts->the_post();
                                        $author = get_the_author();
                                        if ($postDetalle->ID != get_the_ID() && $contador < 3){
                                        ?>
                                            <div class="post type-post status-publish format-video hentry category-design hentry-post span3">
                                                <div class="row">
                                                    <div class="date span1">
                                                        <p><span class="month">Oct</span><span class="day">17</span></p>
                                                    </div>
                                                    <div class="meta span2">
                                                        <h4>
                                                            <a href="#" title="Section shortcodes &amp; sticky posts!">
                                                                <?php echo get_the_title(); ?>
                                                            </a>
                                                        </h4>
                                                        <p class="author">by <strong><?php echo $author; ?></strong></p>
                                                        <p class="comments">
                                                            <a href="<?php echo get_site_url(); ?>/<?php echo $postDetalle->post_name ?>" title="Comment on Section shortcodes &amp; sticky posts!"><strong>Comments:</strong><?php echo comments_number(); ?></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        $contador++;
                                        }
                                        wp_reset_postdata();
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <!-- START COMMENTS -->
                        <div id="comments">
                            <div id="respond">
                                <h3 id="reply-title">Escribe un <span>Comentario</span>
                                    <small>
                                        <a rel="nofollow" id="cancel-comment-reply-link" href="/libra/2012/11/20/nice-clean-the-best-for-your-blog/#respond" style="display:none;">Cancel
                                            reply</a></small>
                                </h3>
                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                comments_template();
                                }
                                ?>
                            </div>
                            <!-- #respond -->
                        </div>
                        <!-- END COMMENTS -->

                    </div>
                    <!-- END CONTENT -->

                    <!-- START SIDEBAR -->
                    <div id="sidebar-blog-sidebar" class="span3 sidebar group">

                        <div class="widget recent-comments">
                            <h3>Recientes <span class="title-highlight">comentarios</span></h3>
                            <div class="recent-comments group">
                                <?php
                                $comments = get_comments( array('post_id' => $post->ID, 'status' => 'approve') );
                                ?>
                                <div class="the-post group">
                                    <?php foreach ($comments as $comment) { ?>
                                        <p class="comment">
                                            <?php echo $comment->comment_content ?>
                                        </p>
                                        <div class="avatar">
                                            <img alt='' src='<?php get_template_directory_uri(); ?>/wp-content/themes/ecommerce/images/gavatar.png' class='avatar photo' height='33' width='33'/>
                                        </div>
                                        <span class="author">
                                            <strong>
                                                <a href="#">
                                                    <?php echo $comment->comment_author ?>
                                                </a>
                                            </strong> in
                                        </span>
                                        <br />
                                        <a href="<?php echo get_site_url(); ?>/<?php echo $postDetalle->post_name ?>" class="title"><?php echo get_category_link($categoriaVector[0]->cat_ID); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="widget-last widget widget_nav_menu">
                            <h3>Redes Sociales</h3>
                            <div class="menu-socialize-container">
                                <ul class="menu">
                                    <li class="menu-item menu-item-type-custom">
                                        <a href="https://www.facebook.com/ecommercebarcelona360.com">Facebook</a>
                                    </li>
                                    <li class="menu-item menu-item-type-custom">
                                        <a href="https://twitter.com/eCommerceBcn360">Twitter</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR -->
                </div>
            </div>
        </div>
        <!-- END PRIMARY -->
<?php
}
get_footer();
?>
