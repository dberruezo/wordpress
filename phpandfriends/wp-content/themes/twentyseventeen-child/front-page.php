<?php
get_header();
get_template_part("template-parts/cabecera");
?>
<?php $args = array(
    'posts_per_page'   => 5,
    'offset'           => 0,
    'category'         => '',
    'category_name'    => '',
    'orderby'          => 'date',
    'order'            => 'ASC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'movies',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'	   => '',
    'author_name'	   => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
);
    $posts_array = get_posts( $args );
    foreach($posts_array as $post) {
       //var_dump($post);
    }
?>
<div class="section">
    <div class="row">
        <div class="col-sm-3">
            <h1 class="section-title title"><a href="listing.html">Latest News</a></h1>
            <div class="left-sidebar">
                <?php
                // Primera query para latest news
                $args = array(
                    'order' => 'DESC',
                    'cat'   => 1
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                        <?php the_category( "", 'single', the_ID() ); ?>
                        <div class="post medium-post">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a href="<?php echo the_permalink(); ?>">
                                        <?php
                                            $attr = array(
                                                'class'     => 'img-responsive',
                                                'display'   => 'block',
                                                'max-width' => '100%',
                                                'height'    => 'auto'
                                            );
                                            $size = array(
                                                'width'  => '450px',
                                                'height' => '258px',
                                            );
                                        ?>
                                        <?php the_post_thumbnail('large',$attr); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 5, 2016 </a></li>
                                        <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                        <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                    </ul>
                                </div>
                                <h2 class="entry-title">
                                    <a href="news-details.html"><?php the_title(); ?></a>
                                </h2>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php //wps_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

            </div><!--/left-sidebar-->
        </div>

        <div class="col-sm-6">
            <div id="site-content" class="site-content">
                <h1 class="section-title title"><a href="listing.html">Top News</a></h1>
                <div class="middle-content">
                    <div id="top-news" class="section top-news">

                        <div class="post">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/w2.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                        <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                        <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                        <li class="comments"><i class="fa fa-comment-o"></i><a href="#">267</a></li>
                                    </ul>
                                </div>
                                <h2 class="entry-title">
                                    <a href="news-details.html">Before he was a presidential candidate, Bernie Sanders was barely</a>
                                </h2>
                                <div class="entry-content">
                                    <p>Text of the printing and typesetting industry orem Ipsum has been the industry standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book ......</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="post">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/w1.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                        <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                        <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                        <li class="comments"><i class="fa fa-comment-o"></i><a href="#">267</a></li>
                                    </ul>
                                </div>
                                <h2 class="entry-title">
                                    <a href="news-details.html">Before he was a presidential candidate, Bernie Sanders was barely</a>
                                </h2>
                                <div class="entry-content">
                                    <p>Text of the printing and typesetting industry orem Ipsum has been the industry standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book ......</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="post">
                            <div class="entry-header">
                                <div class="entry-thumbnail">
                                    <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/w3.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                        <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                        <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                        <li class="comments"><i class="fa fa-comment-o"></i><a href="#">267</a></li>
                                    </ul>
                                </div>
                                <h2 class="entry-title">
                                    <a href="news-details.html">Before he was a presidential candidate, Bernie Sanders was barely</a>
                                </h2>
                                <div class="entry-content">
                                    <p>Text of the printing and typesetting industry orem Ipsum has been the industry standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book ......</p>
                                </div>
                            </div>
                        </div>

                    </div><!-- top-news -->

                    <div class="section health-section">
                        <h1 class="section-title"><a href="listing.html">Politics</a></h1>
                        <div class="health-feature">
                            <div class="post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/politics/4.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                            <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                            <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">And a contingent of liberal activists who dreamed of a political revolution</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                            <div class="post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/politics/1.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                            <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                            <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">The same could be said for the senator's once-obscure spoken word folk album</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                            <div class="post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/politics/3.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                            <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                            <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">Nielsen's data found that New York City, Los Angeles and Portland are the top three </a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </div>
                    </div><!--/.health-section -->

                    <div class="add inner-add">
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/add/add4.jpg" alt="" /></a>
                    </div><!--/.section-->

                    <div class="section technology-news">
                        <h1 class="section-title"><a href="listing.html">Technology</a></h1>
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/t1.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                                <li class="comments"><i class="fa fa-comment-o"></i><a href="#">267</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">When he contacted the Sanders camp a few months before the candidate's was</a>
                                        </h2>
                                        <div class="entry-content">
                                            <p>Campaign launch in Burlington, Lockwood industry orem Ipsum has been the industry standard dummy text ever since....</p>
                                        </div>
                                    </div>
                                </div><!--/post-->
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="post small-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/t2.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">Samsung Pay will support online shop</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->
                                <div class="post small-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/t3.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">Why is the media so afraid of Facebook?</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->
                            </div>
                        </div>
                    </div><!--/technology-news-->

                    <div class="section lifestyle-section">
                        <h1 class="section-title"><a href="listing.html">Life Style</a></h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post medium-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/lifestyle/1.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">Naomi & Liev hit the beach, plus more new celeb pics</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->
                                <div class="post medium-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/lifestyle/2.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">18 Great Performances in Mediocre Movies in 2016</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->
                            </div>
                            <div class="col-md-6">
                                <div class="post medium-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/lifestyle/3.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">How the stars celebrated Christmas on Instagram</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->
                                <div class="post medium-post">
                                    <div class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/lifestyle/4.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <ul class="list-inline">
                                                <li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Jan 25, 2016 </a></li>
                                                <li class="views"><a href="#"><i class="fa fa-eye"></i>21k</a></li>
                                                <li class="loves"><a href="#"><i class="fa fa-heart-o"></i>372</a></li>
                                            </ul>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="news-details.html">They would do these amazing tribal songs to lift their spirits for the hours</a>
                                        </h2>
                                    </div>
                                </div><!--/post-->
                            </div>
                        </div>
                    </div><!--/.lifestyle -->


                    <div class="section photo-gallery">
                        <h1 class="section-title title"><a href="listing.html">Photo Gallery</a></h1>
                        <div id="photo-gallery" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/1.jpg" alt="" /></a>
                                    <h2><a href="#">No one can agree on how a dog is supposed to wear human pants</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/2.jpg" alt="" /></a>
                                    <h2><a href="#">500-pound elephant seal causes traffic jam while repeatedly</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/3.jpg" alt="" /></a>
                                    <h2><a href="#">I rode a Metroboard electric skateboard 30 miles around Manhattan</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/4.jpg" alt="" /></a>
                                    <h2><a href="#">The super creepy side of the Internet of Things and smart homes</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/5.jpg" alt="" /></a>
                                    <h2><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/6.jpg" alt="" /></a>
                                    <h2><a href="#">Someone has calculated the total cost of saving Matt Damon</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/7.jpg" alt="" /></a>
                                    <h2><a href="#">Wet wedding: Yorkshire couple dons wellies to tie the knot in flooded town</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/8.jpg" alt="" /></a>
                                    <h2><a href="#">This dog is so stoked for his Christmas present he can hardly stand it</a></h2>
                                </div>
                                <div class="item">
                                    <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/9.jpg" alt="" /></a>
                                    <h2><a href="#">The world's richest people lost $19 billion in 2016, but Jeff Bezos</a></h2>
                                </div>
                            </div><!--/carousel-inner-->

                            <ol class="gallery-indicators carousel-indicators">
                                <li data-target="#photo-gallery" data-slide-to="0" class="active">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb1.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="1">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb2.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="2">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb3.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="3">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb4.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="4">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb5.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="5">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb6.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="6">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb7.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="7">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb8.png" alt="" />
                                </li>
                                <li data-target="#photo-gallery" data-slide-to="8">
                                    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gallery/thumb9.png" alt="" />
                                </li>
                            </ol><!--/gallery-indicators-->

                            <div class="gallery-turner">
                                <a class="left-photo" href="#photo-gallery" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="right-photo" href="#photo-gallery" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div><!--/photo-gallery-->
                </div><!--/.middle-content-->
            </div><!--/#site-content-->
        </div>
        <div class="col-sm-3">
            <div id="sitebar">
                <div class="widget">
                    <h1 class="section-title title"><a href="listing.html">Most Popular</a></h1>
                    <ul class="post-list">
                        <li>
                            <div class="post small-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/rising/1.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="video-catagory"><a href="#">World</a></div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">Patti Solis Doyle, who served as a senior adviser</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/rising/2.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="video-catagory"><a href="#">Business</a></div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">The interview comes as the infidelity scandal and other </a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/rising/3.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="video-catagory"><a href="#">Sports</a></div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">They have long conversations together. It's a very good</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/rising/4.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="video-catagory"><a href="#">Technology</a></div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">He just sort of puts his hands on her shoulders</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>

                        <li>
                            <div class="post small-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/rising/6.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="video-catagory"><a href="#">Health</a></div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">The winner of the caucuses is decided by state</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="entry-header">
                                    <div class="entry-thumbnail">
                                        <a href="news-details.html"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/rising/7.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="video-catagory"><a href="#">Lifestyle</a></div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">Rosa went with the man to another town in Mexico called Tenancingo, where he introduced</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                    </ul>
                </div><!--/#widget-->
                <div class="widget">
                    <h2 class="section-title">Latest Comments</h2>
                    <ul class="comment-list">
                        <li>
                            <div class="post small-post">
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="post-author"><a href="#">Jhon Due ,</a></li>
                                            <li class="publish-date"><a href="#">Feb 11, 2016 </a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">A travel ban in New York City has ended as the eastern</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="post-author"><a href="#">KOlony Wispe ,</a></li>
                                            <li class="publish-date"><a href="#">Jan 25, 2016 </a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">New York, the most populated city in the US, saw its second-highest</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="post-author"><a href="#">KOlony Wispe</a></li>
                                            <li class="publish-date"><a href="#">Jan 25, 2016 </a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">A large chunk of metal that could be from an aircraft washed ashore</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="post-author"><a href="#">Mike Tinson ,</a></li>
                                            <li class="publish-date"><a href="#">Jan 18, 2016 </a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">Showing her the stunning homes around the town, he promised she could</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                        <li>
                            <div class="post small-post">
                                <div class="post-content">
                                    <div class="entry-meta">
                                        <ul class="list-inline">
                                            <li class="post-author"><a href="#">Andrew Matt,</a></li>
                                            <li class="publish-date"><a href="#">Jan 18, 2016 </a></li>
                                        </ul>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="news-details.html">The very next day I started our crusade to see</a>
                                    </h2>
                                </div>
                            </div><!--/post-->
                        </li>
                    </ul>
                </div><!-- widget -->

                <div class="widget">
                    <div class="add">
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/add/add5.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="widget">
                    <div class="post video-post medium-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ji2ohWJfEIQ" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="video-catagory"><a href="#">Politics</a></div>
                            <h2 class="entry-title">
                                <a href="news-details.html">Satellite images released by NASA show the extent of smoke plume</a>
                            </h2>
                        </div>
                    </div><!--/post-->
                    <div class="post video-post medium-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0aqiPyTJv8E"  allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="video-catagory"><a href="#">World</a></div>
                            <h2 class="entry-title">
                                <a href="news-details.html">The next president of the United States is gonna have to get the</a>
                            </h2>
                        </div>
                    </div><!--/post-->
                    <div class="post video-post medium-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/n8_uY4Ro53c" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="video-catagory"><a href="#">Lifestyle</a></div>
                            <h2 class="entry-title">
                                <a href="news-details.html">New Jersey Gov. Chris Christie has been hammering home</a>
                            </h2>
                        </div>
                    </div><!--/post-->

                    <div class="post medium-post">
                        <div class="entry-header">
                            <div class="entry-thumbnail embed-responsive embed-responsive-16by9">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/post/1.jpg" alt="" />
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="video-catagory"><a href="#">Lifestyle</a></div>
                            <h2 class="entry-title">
                                <a href="news-details.html">A bus has exploded in central London — but this time it's</a>
                            </h2>
                        </div>
                    </div><!--/post-->
                </div>
            </div><!--/#sitebar-->
        </div>
    </div>
</div><!--/.section-->
</div><!--/.container-fluid-->
<?php get_footer(); ?>
