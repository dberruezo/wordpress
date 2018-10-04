/**
 * Funciones para todos
 * los scripts
 */
jQuery(document).ready(function(){

    var cadena          = location.href.replace("http://www.ecommercebarcelona360.com/", "");
    var emailCambiado   = false;
    var nombreCambiado  = false;
    var messageCambiado = false;
    var urlLocal        = "http://www.ecommercebarcelona360.net";
    var urlServidor     = "http://www.ecommercebarcelona360.com";
    var stageWidth      = $(window).width();
    var stageHeight     = $(window).height();

    /*
     * Cambiamos las url según
     * sea .com o .net == local y servidor
     * en nuestro caso es local
     */

    jQuery("#nav a").each(function(index){
        var url          = $(this).attr("href");
        var n            = url.search(urlLocal);
        if (n != -1){
            //console.log("url: "+url);
            var res = url.replace(urlLocal,urlServidor);
            //console.log("res: "+res);
            $(this).attr("href",res);
        }
    });


    /*
     * Scripts de diferentes funciones
     * para las diferentes paginas
     */
    cadena         = cadena.trim();
    var directorio = cadena.replace(urlServidor+"/","");
    directorio     = directorio.replace("/","");
    if (directorio == "asociacion") {
        /*
        var animation = 'slide'; //: 'slide'
        jQuery(".usquare_module_wrapper").uSquare({
            opening_speed: 300, closing_speed: 500, easing: "swing"
        });
        jQuery('.testimonials-flexslider').flexslider({
            animation: animation,
            slideshowSpeed: 10000,
            animationSpeed: 500,
            touch: false,
            controlNav: false,
            directionNav: true
        });
        jQuery(".usquare_module_wrapper").each(function(index){
            //console.log("Hola don pedro");
            //$(this).css("height","40px!important;");
            //$(this).addClass('square_mio');
        });
        */
    }else if(directorio == "ventajas"){
        $('.span6').addClass('spanMio');
    }else if (directorio == "equipo"){
        $('#footer').addClass('footerMio');
    }else if (directorio == "hosting"){

        var maxHeight = 0;
        jQuery('.team-slides li').each(function () {
            if ($(this).height() > maxHeight) {
                maxHeight = $(this).height();
            }
        });

        jQuery('.team-slides li').height(maxHeight + 20);

        jQuery('.team-slides').imagesLoaded(function () {
            jQuery('.team-slides').carouFredSel({
                auto: true,
                width: '100%',
                prev: '#team-slider-prev',
                next: '#team-slider-next',
                swipe: {
                    onTouch: true
                },
                scroll: {
                    items: 1,
                    duration: 500
                }
            });
        });

        jQuery('.bwWrapper').BlackAndWhite({
            hoverEffect: true, // default true
            webworkerPath: false,
            responsive: true,
            speed: {
                fadeIn: 200,
                fadeOut: 300
            }
        });

    }else if (directorio == "web" || directorio == "media" || directorio == "comercio" || directorio == "crm"){
        jQuery('#last-tweets-3 .list-tweets-3').tweetable({
            listClass: 'tweets-widget-3',
            username: 'YIW',
            time: false,
            limit: 1,
            replies: true
        });
    }else if(directorio == "portfolio" || directorio == "yourspanishwine" || directorio == "2automocion"){
        jQuery('#footer').addClass('footerMio');
        jQuery('.container').css('width','1270px;!important');
        //$('.container').addClass('container2');
    }

    /*
     * Validació del formulario
     * y cuando apretamos cualquier etiqueta
     * se pone en blanco
     */
    jQuery("#name").focus(function() {
        jQuery("#labelNombre").text(" ");
    });
    jQuery("#email").focus(function() {
        jQuery("#labelEmail").text(" ");
    });
    jQuery("#message").focus(function() {
        jQuery("#labelMensaje").text(" ");
    });
    jQuery('#form1').on('submit', function(e){
        // validation code here
        if (emailCambiado == false){
            jQuery("#labelEmail").text(" ");
        }
        if (nombreCambiado == false){
            jQuery("#labelNombre").text(" ");
        }
        if (messageCambiado == false){
            jQuery("#labelMensaje").text(" ");
        }
        //e.preventDefault();
    });
    //jQuery("#form1").validate();
    //jQuery("#form2").validate();
});


