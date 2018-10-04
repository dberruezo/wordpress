<div class="margin-bottom">
    <div class="logos-slider wrapper">
        <h2>
            Nuestros <span class="title-highlight">Partners</span>
        </h2>
        <div class="list_carousel">
            <ul class="logos-slides">

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        get_style
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner1.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner2.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner3.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner4.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner5.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner6.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>

                <li style="height: 70px;">
                    <a href="#" class="bwWrapper" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/partner7.jpg" style="max-height: 70px;" class="logo" />
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="nav">
            <a class="prev" href="#"></a>
            <a class="next" href="#"></a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<script type="text/javascript">
    jQuery(function($){

        $('.logos-slides').imagesLoaded(function(){
            $('.logos-slides').carouFredSel({
                auto: true,
                width: '100%',
                prev: '.logos-slider .prev',
                next: '.logos-slider .next',
                swipe: {
                    onTouch: true
                },
                scroll : {
                    items     : 1,
                    duration  :	500				}
            });
        });

        $('.bwWrapper').BlackAndWhite({
            hoverEffect : true, // default true
            // set the path to BnWWorker.js for a superfast implementation
            webworkerPath : false,
            // for the images with a fluid width and height
            responsive:true,
            speed: { //this property could also be just speed: value for both fadeIn and fadeOut
                fadeIn: 200, // 200ms for fadeIn animations
                fadeOut: 300 // 800ms for fadeOut animations
            }
        });

        $("a.bwWrapper[href='#']").click(function(){ return false })

    });
</script>
</div>
<!-- START COMMENTS -->
<div id="comments"></div>
<!-- END COMMENTS -->
</div>
<!-- END CONTENT -->

<!-- START EXTRA CONTENT -->
<!-- END EXTRA CONTENT -->

</div>
</div>
</div>
<!-- END PRIMARY -->


