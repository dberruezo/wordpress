<!-- START FOOTER -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-widgets-area with-sidebar-right">
                <div class="widget-first widget span2 widget_text"><h3>Acerca de nosotros</h3>
                    <div class="textwidget">
                        Somos una asociación legalmente constituida nuestro CIF es G66725441 si quieres más información al respecto de nosotros envianos un email pinchando aquí
                    </div>
                </div>

                <div class="widget span2 widget_nav_menu">
                    <h3>Categorías</h3>

                    <div class="menu-widget-footer-container">
                        <ul id="menu-widget-footer" class="menu">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="<?php get_site_url(); ?>/asociacion">Asociación</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="<?php get_site_url(); ?>/hacemos">Que hacemos</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="<?php get_site_url(); ?>/ventajas">Ventajas de asociarte</a>
                            </li>

                            <li class="menu-item menu-item-type-post_type">
                                <a href="<?php get_site_url(); ?>/equipo">Nuestro equipo</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/hosting">Hosting,Servidores y Dominios</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/web">Aplicaciones web</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/medida">Aplicaciones llave en mano</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/comercio">Aplicaciones de comércio electrónico</a>
                            </li>
                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/crm">Instalaciones CRM y ERP</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/portfolio">Portfolio</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/contactar">Contacto</a>
                            </li>

                            <li class="menu-item menu-item-type-custom">
                                <a href="<?php get_site_url(); ?>/avisolegal">Aviso Legal</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="widget-last widget span2 widget_nav_menu">
                    <h3>Redes Sociales</h3>

                    <div class="menu-socialize-container">
                        <ul id="menu-socialize" class="menu">

                            <li class="menu-item menu-item-type-custom">
                                <a href="https://www.facebook.com/ecommercebarcelona360.com">Facebook</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-widgets-sidebar with-sidebar-right">
                <div  class="widget-first widget span6 yit_quick_contact">
                    <h3>Contacta con nosotros</h3>
                    <a name="formulario" href="#"></a>
                    <form method="post" id="form1" name="form1" class="contact-form row" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <div class="usermessagea"></div>
                        <fieldset>
                            <ul>
                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel" id="labelNombre">Nombre</span>
                                    </label>

                                    <div class="input-prepend">
                                            <span class="add-on">
                                                <img src="<?php echo get_stylesheet_directory_uri()?>/images/footer/author-footer.png" alt="" title=""/></span>
                                                <input type="text" name="name" id="name" minlength="5" required class="with-icon required" value=""/>
                                            </span>
                                    </div>
                                    <div class="msg-error"></div>
                                    <div class="clear"></div>
                                </li>

                                <li class="text-field with-icon span3">
                                    <label>
                                        <span class="mainlabel" id="labelEmail">Email</span>
                                    </label>

                                    <div class="input-prepend">
                                            <span class="add-on">
                                                <img src="<?php echo get_stylesheet_directory_uri()?>/images/footer/envelope-footer.png" alt="" title=""/>
                                            </span>
                                            <input name="email" id="email_one" type="email" required minlength="7" class="with-icon required email-validate" value="" onclick="jQuery('#labelEmail').text(' ');"/>
                                    </div>
                                    <div class="msg-error"></div>
                                    <div class="clear"></div>
                                </li>

                                <li class="textarea-field with-icon span6">
                                    <label>
                                        <span class="mainlabel" id="labelMensaje">Mensaje</span>
                                    </label>

                                    <div class="input-prepend">
                                            <span class="add-on">
                                                <img src="<?php echo get_stylesheet_directory_uri()?>/images/footer/pencil-footer.png" alt="" title=""/>
                                            </span>
                                        <textarea name="message" id="message" required minlength="10" rows="8" cols="30" class="with-icon required"></textarea>
                                    </div>
                                    <div class="msg-error"></div>
                                    <div class="clear"></div>
                                </li>
                                <li class="submit-button span6">
                                    <div style="position:absolute;left:-9999px;">
                                        <input type="text" name="email_check_2" id="email_check_2" value=""/>
                                    </div>
                                    <input type="submit" name="submit" id="submit" value="SEND" class="sendmail alignright"/>
                                    <div class="clear"></div>
                                </li>
                                <input type="hidden" name="action" value="contact_form">
                                <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            </ul>
                        </fieldset>
                    </form>
                    
                    <div class="alert alert-success">
                        <!-- <strong>Success!</strong> Indicates a successful or positive action. -->
                    </div>

                    <div class="alert alert-danger">
                        <!-- <strong>Danger!</strong> Indicates a dangerous or potentially negative action. -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END FOOTER -->
<!-- START COPYRIGHT -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="left span6" style="height:70px;width:100%!important;">
                <p style="text-align:center;margin-top:10px;">
                    <a href="http://www.ecommercebarcelona360.com">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/libra-logo1.png" alt="eCommerce Barcelona 360" style="position:relative; top:9px; margin: -22px 5px 0 0;">
                    </a>
                    &nbsp;Copyright 2012 - <strong>eCommerceBarcelona360</strong>
                </p>
            </div>

        </div>
    </div>
</div>
<!-- END COPYRIGHT -->
<div class="wrapper-border"></div>
</div>
<!-- END WRAPPER -->
</div>
