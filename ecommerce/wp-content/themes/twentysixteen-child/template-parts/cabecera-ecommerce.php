<!-- END HEAD -->
<!-- START BODY -->
<body class="home page no_js responsive stretched">
<!-- START BG SHADOW -->
<div class="bg-shadow">
    <!-- START WRAPPER -->
    <div id="wrapper" class="container group">
        <!-- START TOP BAR -->
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div id="nav" class="span12 light">
                        <!-- START MAIN NAVIGATION -->
                        <?php
                        /*
                         * Cambiamos las url según
                         * sea .com o .net == local y servidor
                         * en nuestro caso es local
                         */
                        
                        /*
                        $items        = wp_get_nav_menu_items( 'main', array() );
                        $urlLocal     = "http://www.ecommercebarcelona360.net";
                        $urlServidor  = "http://www.ecommercebarcelona360.com";
                        $contador     = 0;
                        foreach ($items as $item){
                           $url = $item->url;
                           if ($url == $urlServidor){
                               $items[$contador]->url = $urlLocal;
                           }else{
                               $mystring = $item->url;
                               // Servidor
                               $findme   = $urlServidor;
                               // Local
                               $pos = strpos($mystring, $findme);
                               // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
                               // porque la posición de 'a' está en el 1° (primer) caracter.
                               if ($pos === false) {
                                   //echo "La cadena '$findme' no fue encontrada en la cadena '$mystring'";
                               } else {
                                   $res = str_replace($urlServidor,$urlLocal,$items[$contador]->url);
                                   $items[$contador]->url = $res;
                               }
                           }
                           $contador++;
                        }
                        */

                        /*
                         * Enlazamos menu principal
                         */
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'container'       => 'ul',
                                'container_class' => 'level-1',
                                'container_id'    => 'menu-menu',
                                'menu_class'      => 'sf-menu',
                                'fallback_cb'     => 'photolab_page_menu'
                            )
                        );
                        ?>
                        <!-- END MAIN NAVIGATION -->
                        <!-- START TOPBAR LOGIN -->
                        <div id="topbar_login" class="not_logged_in">
                            <a class="topbar_login" href="#">LOGIN <span class="sf-sub-indicator"></span></a>
                            <div id="fast-login" class="access-info-box">
                                <form action="#" method="post" name="loginform">

                                    <div class="form">
                                        <p>
                                            <label>
Username<br/>
                                                <input type="text" tabindex="10" size="20" value="" name="log" class="input-text" />
                                            </label>
                                        </p>

                                        <p>
                                            <label>
Password<br/>
                                                <input type="password" tabindex="20" size="20" value="" name="pwd" class="input-text" />
                                            </label>
                                        </p>

                                        <a class="align-left lostpassword" href="#" title="Password Lost and Found">
    lost password?
                                        </a>

                                        <p class="align-right">
                                            <input type="submit" tabindex="100" value="Login" name="wp-submit" class="input-submit" />
                                            <input type="hidden" value="index.html" name="redirect_to" />
                                            <input type="hidden" value="1" name="testcookie" />
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END TOPBAR LOGIN -->
                    </div>
                </div>
            </div>
        </div>
         <!-- END TOP BAR -->

    <!-- START HEADER -->
    <div id="header" class="group margin-bottom">

        <div class="group container">
            <div class="row" id="logo-headersidebar-container">
                <!-- START LOGO -->
                <div id="logo" class="span6 group">
                    <a id="logo-img" href="index.html" title="Libra">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/libra-logo1.png" title="Libra" alt="Libra" />
                    </a>
                    <p id='tagline'><?php echo get_bloginfo('description'); ?></p>
                </div>
                <div id="header-sidebar" class="span9 group">
                    <div style="float:right;margin-left:20px;"><?php get_search_form(); ?></div>
                    <div class="widget-first widget header-text-image">
                        <div class="text-image" style="text-align:left">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone1.png" alt="CUSTOMER SUPPORT" />
                        </div>
                        <div class="text-content">
                            <h3>CUSTOMER SUPPORT</h3>
                            <p>+34 (93) 217 67 57</p>
                        </div>
                    </div>

                    <div class="widget-last widget widget_text">
                        <div class="textwidget">
                            <div class="socials-default-small facebook-small default">
                                <a href="# " class="socials-default-small default facebook" >facebook</a>
                            </div>
                            <!--
                            <div class="socials-default-small skype-small default">
                                <a href="# " class="socials-default-small default skype" >skype</a>
                            </div>

                            <div class="socials-default-small linkedin-small default">
                                <a href="#" class="socials-default-small default linkedin" >linkedin</a>
                            </div>

                            <div class="socials-default-small twitter-small default">
                                <a href="#" class="socials-default-small default twitter" >twitter</a>
                            </div>

                            <div class="socials-default-small flickr-small default">
                                <a href="#" class="socials-default-small default flickr" >flickr</a>
                            </div>

                            <div class="socials-default-small rss-small default">
                                <a href="#" class="socials-default-small default rss" >rss</a>
                            </div>

                            <div class="socials-default-small pinterest-small default">
                                <a href="#" class="socials-default-small default pinterest" >pinterest</a>
                            </div>
                            -->
                         </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN FLEXSLIDER SLIDER -->
        <div id="slider-polaroid-0" class="slider slider-polaroid polaroid no-responsive" style="height:400px;">
            <div class="thumbs  container">

                <div class="thumb">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/001-150x150.png" alt="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/001.png" />
                    <div class="slide-content container align-right" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>'/images/slider/flexslider/001.png');">
                        <div class="text">
                            <h2>Nuestra asociación</h2>
                            <p>Somos una asociación la cual su finalidad es la de ofrecer,asesorar y ayudar a las pymes, autónomos y pequeñas empresas con productos open-source,nuevas tecnologías,formación y un gran abanico de servicios. Recuerda que a parte de ofrecer productos, tu mismo , seas autónomo,sociedad o particular también te puedes asociar con nosotros y formar parte de nuestro equipo.</p>
                        </div>
                    </div>
                </div>

                <div class="thumb">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0026-150x150.jpg" alt="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0026.jpg"/>
                    <div class="slide-content container align-right full" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0026.jpg');">
                        <div class="text" style="margin-left:-330px; margin-top:-50px;">
                            <h2></h2>
                        </div>
                    </div>
                </div>

                <div class="thumb">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/003-150x150.png" alt="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/003.png" />
                    <div class="slide-content container align-right" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/003.png');">
                        <div class="text">
                            <h2>Somos innovadores</h2>
                            <p>En nuestra asociación como tal, somos innovadores en todos los productos que desarrollamos así como en los precios que ofrecemos. Como asociación disfrutamos de una serie de ventajas que nos permiten ofrecer unos precios fuera de mercado.Preguntanos por todos nuestros productos !!!</p>
                        </div>
                    </div>
                </div>

                <div class="thumb">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0043-150x150.jpg" alt="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0043.jpg" />
                    <div class="slide-content container align-right full" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0043.jpg');">
                        <div class="container">
                            <div class="text">
                                <h2>CREZCAMOS JUNTOS COMO CLIENTES O COMO ASOCIACIÓN</h2>
                                <p>Podemos crecer de dos maneras o bien como clientes o bien como asociación !!! consulta nuestros servicios y productos y también consulta que hace nuestra asociación y que hacer para ser SOCIO !!!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="thumb">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0052-150x150.jpg" alt="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0052.jpg" />
                    <div class="slide-content container align-right full" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/0052.jpg');">
                        <div class="container">
                            <div class="text">
                                <h2>CREZCAMOS JUNTOS COMO CLIENTES O COMO ASOCIACIÓN</h2>
                                <p style="color:#658005;">Podemos crecer de dos maneras o bien como clientes o bien como asociación !!! consulta nuestros servicios y productos y también consulta que hace nuestra asociación y que hacer para ser SOCIO !!!</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#slider-polaroid-0').polaroid({
                    animation: '',
                    pause: 8000,
                    animationSpeed: 800
                });
            });
        </script>
        <div class="mobile-slider">
            <div class="slider fixed-image container">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider/flexslider/fixed-polaroid.jpg" alt="" />
            </div>
        </div>
    </div>
    <!-- END HEADER -->
