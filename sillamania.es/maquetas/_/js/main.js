// var
// Menu resonsive boolean
var menu_abierto = false;

var devicewidth = jQuery(window).width();

jQuery(document).ready(function() {
	
	/*--------- RESPONSIVE ---------*/
	
	if ( devicewidth < 992 ) {
		topbarMovil()
		nuestrasTiendasMovil();
		wrapperMenuMovil();
		footerDesktop();
		carritoMovil();
		buscadorMovil();
		addmobile();
		altoCarritoScrollDesktop();
		anchoBuscadorMovil();
		disponibilidadMovil();
		if ( devicewidth < 768 ) {
			
			footerMobile();
			altoCarritoScrollMovil();
		
		} else {
					
		}
	
	}else {
		
		footerDesktop();
		topbarDesktop();
		carritoDesktop();
		buscadorDesktop();
		nuestrasTiendasDesktop();
		wrapperMenuDesktop();
		adddesktop();
		menuDesktop()
		altoCarritoScrollDesktop();
		anchoBuscadorDesktop();
		disponibilidadDesktop();
	}

	/*--------- RESIZE ---------*/
	
	jQuery(window).resize(function() {
		
		var widthChanged = false;
		var heightChanged = false;
		
		//var deviceheight = jQuery(window).height();
		
	    if ( jQuery(window).width() != devicewidth ) {	    
	        widthChanged = true;   
	    }
	    
		if ( widthChanged == true ) {
			
			altoProductoDestacado();
			
			if ( jQuery(window).width() < 992 ) {
				
				footerDesktop();
				topbarMovil();
				nuestrasTiendasMovil();
				wrapperMenuMovil();
				carritoMovil();
				buscadorMovil();
				altoCarritoScrollDesktop();
				addmobile();
				anchoBuscadorMovil();
				disponibilidadMovil();
			
			    if ( jQuery(window).width() < 768 ) {
					
					footerMobile();		
					altoCarritoScrollMovil();				
						
				}else {
	
				}
			}else {
				
				footerDesktop();
				topbarDesktop();
				carritoDesktop();
				buscadorDesktop();
				nuestrasTiendasDesktop();
				wrapperMenuDesktop();
				altoCarritoScrollDesktop();
				adddesktop();
				menuDesktop();
				anchoBuscadorDesktop();
				disponibilidadDesktop();
			}		
		}
		
	}); // Fin de resize
	
	

	jQuery('.carrusel-hero').slick({
	   autoplay: false,      
	   speed: 300,           
	   slidesToShow: 1,    
	   slidesToScroll: 1, 
	   fade: true,
	   asNavFor: '.carrusel-hero-titular, .carrusel-hero-precio',  
	   infinite: true,     
	   dots: true,            
	   nextArrow: '',
	   prevArrow: '',
	});


	jQuery('.carrusel-hero-titular').slick({
	   autoplay: false,      
	   speed: 300,           
	   slidesToShow: 1,    
	   slidesToScroll: 1, 
	   fade: true,
	   infinite: true,     
	   dots: false,            
	   nextArrow: '',
	   prevArrow: '',
	});		

	jQuery('.carrusel-hero-precio').slick({
	   autoplay: false,      
	   speed: 300,           
	   slidesToShow: 1,    
	   slidesToScroll: 1, 
	   fade: true,
	   infinite: true,     
	   dots: false,            
	   nextArrow: '',
	   prevArrow: '',
	});


	jQuery('.carrusel-mas-vendidos').slick({
	   centerMode: true,
	   centerPadding: '1px',
	   autoplay: false,      
	   speed: 300,             
	   slidesToShow: 3,    
	   slidesToScroll: 3,   
	   infinite: true,     
	   dots: false,            
	   nextArrow: '',
	   prevArrow: '',
       responsive: [
       {
		breakpoint: 768,
		settings: {
		       slidesToShow: 1.3,
		       slidesToScroll: 1,
		       infinite: false,
		       }
	       },
	       ]
	});

	jQuery('.carrusel-ofertas-destacadas').slick({
	   centerMode: true,
	   centerPadding: '1px',
	   autoplay: false,      
	   speed: 300,             
	   slidesToShow: 3,    
	   slidesToScroll: 3,   
	   infinite: true,     
	   dots: false,            
	   nextArrow: '',
	   prevArrow: '',
       responsive: [
       {
		breakpoint: 768,
		settings: {
		       slidesToShow: 1,
		       slidesToScroll: 1,
		       infinite: true,
		       dots: false,
		       }
	       },
	       ]
	});
	
	jQuery('.carrusel-te-puede-interesar').slick({
	   centerMode: true,
	   centerPadding: '1px',
	   autoplay: false,      
	   speed: 300,             
	   slidesToShow: 3,    
	   slidesToScroll: 3,   
	   infinite: true,     
	   dots: false,            
	   nextArrow: '',
	   prevArrow: '',
       responsive: [
       {
		breakpoint: 768,
		settings: {
		       slidesToShow: 1.3,
		       slidesToScroll: 1,
		       infinite: false,
		       }
	       },
	       ]
	});
	

	jQuery('.carrusel-destacados').slick({
	   autoplay: false,      
	   speed: 300, 
	   fade: true,          
	   slidesToShow: 1,    
	   slidesToScroll: 1,   
	   infinite: true,     
	   dots: true,     
	   nextArrow: '',
	   prevArrow: '',       
	});

	
	jQuery('.carrusel-ultima-semana').slick({
	   autoplay: false,   
	   speed: 300,             
	   slidesToShow: 1,    
	   slidesToScroll: 1,      
	   arrows: true,         
	   nextArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
	   prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
	});

  	function footerMobile(){	
	  	if(jQuery(".bottom-bar .pago-seguro").length == 0 || jQuery(".bottom-bar .pago-seguro").length == undefined){
			jQuery(".pago-seguro").prependTo(".bottom-bar");
		}
		if(jQuery(".footer .redes-sociales").length == 0 || jQuery(".footer .redes-sociales").length == undefined){
			jQuery(".redes-sociales").insertAfter(".pago-seguro");
		}
	}

  	function footerDesktop(){
		if(jQuery(".bottom-bar .redes-sociales").length == 0){
			jQuery(".redes-sociales").insertAfter(".legales");
		}
				
		if(jQuery(".footer .pago-seguro").length == 0 || jQuery(".footer .pago-seguro").length == undefined){
			jQuery(".pago-seguro").insertAfter(".footer .logo");
		}
	}
	
	//-- Cerrar "PODEMOS AYUDARTE"	
	jQuery(".podemos-ayudarte .cerrar").on('click', function(){
		jQuery(".podemos-ayudarte").remove();
	});	
		
	//-- MODALES
	// jQuery('.modal-bienvenida').modal('show'); 
	// Ahora abrimos desde script de php haciendo echo script javascript
	
	// jQuery('.modal-cookies').modal('show');
	// Ahora abrimnos modal cookies desde funcion checkCookie 
	
	//-- CERRAR "TOB-BAR"	
	jQuery(".top-bar .icon-close").on('click', function(){
		jQuery(".top-bar").remove();
	});	
	
	//-- Menu Desktop
	function menuDesktop(){	
	  	jQuery(".nav ul li").hover(function(){
		  	jQuery(".mega-menu").removeAttr("style");
	  	});	
	}

	//-- Abrir/Cerrar Menu
  	jQuery(".nav .icon-menu").on('click', function(){
		jQuery(".wrapperMenuMovil").slideToggle();
		jQuery(this).parents(".nav").toggleClass("cerrar");
		jQuery("body").addClass("body-sin-scroll");
		menu_abierto = true;
	});	
	
	jQuery(".nav .icon-close").on('click', function(){
		jQuery(".wrapperMenuMovil").slideToggle();
		jQuery(this).parents(".nav").toggleClass("cerrar");
		jQuery("body").removeClass("body-sin-scroll");
		menu_abierto = false;
	});
	
	//-- Abrir/Cerrar Megamenu dentro del Menu	

	function addmobile(){
		jQuery('body').addClass('mobile').removeClass('desktop');
		jQuery(".nav").removeClass("cerrar");
		jQuery(".wrapperMenuMovil").css({display:"none"});
	}
	function adddesktop(){
		jQuery('body').removeClass('mobile').addClass("desktop");
		jQuery("body").removeClass("body-sin-scroll");
	}
	jQuery(document).on( "click", ".mobile .nav ul li", function() {
		jQuery(this).find(".mega-menu").slideToggle();
		return false;
	});
	
	//-- Abrir/Cerrar Buscador
	jQuery(".nav .buscador .fa").on('click', function(){
		var anchoWindow = jQuery(window).outerWidth();
		jQuery(this).next(".container-buscador").toggleClass("container-buscador-visible").css({width: anchoWindow});
	});	
	
  	function anchoBuscadorDesktop(){	
	  	var anchoWindow = jQuery(window).outerWidth();
	  	jQuery(".container-buscador").css({width: anchoWindow});
	}	
  	function anchoBuscadorMovil(){	
	  	jQuery(".container-buscador").css({width: "100%"});
	}	
	
	//-- Eliminar Triangulo Apertura en los li que no tengan MEGAMENU
	jQuery(".nav li .mega-menu").parent().addClass("fecha-apertura");

  	function buscadorDesktop(){	
	  	jQuery(".nav .buscador").insertAfter(".nav .enlaces");
	}
  	function buscadorMovil(){	
	  	jQuery(".nav .buscador").prependTo(".nav .wrapperMenuMovil");
	}		
  	function carritoDesktop(){	
	  	jQuery(".nav .carrito").insertAfter(".nav .enlaces");
	}
  	function carritoMovil(){	
	  	jQuery(".nav .carrito").insertAfter(".nav .logo");
	}	
	
  	function topbarDesktop(){	
	  	jQuery(".nav .right .info-extra").insertAfter(".top-bar .inicio-sesion");
	}
  	function topbarMovil(){	
	  	jQuery(".top-bar .info-extra").insertAfter(".nav .right .enlaces");
	}
  	function nuestrasTiendasDesktop(){	
	  	if(jQuery(".container-tiendas .tiendas").length == 0){
			jQuery(".nav .tiendas").appendTo(".container-tiendas");
		}
	}
  	function nuestrasTiendasMovil(){	
	  	if(jQuery(".principal .tiendas").length == 0){
			jQuery(".container-tiendas .tiendas").appendTo(".nav .principal");
		}
	}

  	function wrapperMenuMovil(){
	  	if(jQuery(".wrapperMenuMovil").length == 0 || jQuery(".wrapperMenuMovil").length == undefined){
			jQuery(".nav .principal").before("<div class='wrapperMenuMovil'></div>");	
		}
	  	if(jQuery(".wrapperMenuMovil .principal").length == 0 || jQuery(".wrapperMenuMovil .principal").length == undefined){
			jQuery(".nav .principal").appendTo(".wrapperMenuMovil")
		}
		if(jQuery(".wrapperMenuMovil .right").length == 0 || jQuery(".wrapperMenuMovil .right").length == undefined){
			jQuery(".nav .right").appendTo(".wrapperMenuMovil")
		}
		jQuery(".nav .right").appendTo(".wrapperMenuMovil")
	}

  	function wrapperMenuDesktop(){	
	  	jQuery(".wrapperMenuMovil .principal").insertBefore(".wrapperMenuMovil");
	  	jQuery(".wrapperMenuMovil .right").insertAfter(".principal");
	  	jQuery(".wrapperMenuMovil").remove();
	}

	//-- Altos columnas footer
	var altoColProductos = jQuery(".footer .col-productos").height() ;
	jQuery(".col-logos").css({height: altoColProductos});


	//-- CARRITO
	var altoPantalla = jQuery(window).outerHeight();
	
  	function altoCarritoScrollDesktop(){	
	  	var altoPantalla = jQuery(window).outerHeight();
	  	var altoCarritoScroll =	altoPantalla - 205;
	  	jQuery(".minicart-items-wrapper").css({height:altoCarritoScroll})
	}	

  	function altoCarritoScrollMovil(){	
	  	var altoPantalla = jQuery(window).outerHeight();
	  	var altoCarritoScroll =	altoPantalla - 255;
	  	jQuery(".minicart-items-wrapper").css({height:altoCarritoScroll})
	}	
		
	jQuery(".nav .carrito").on('click', function(){
		jQuery(".block-minicart").slideToggle().toggleClass("carrito-visible")
		
		if(jQuery(".carrito-visible").length == 0 || jQuery(".carrito-visible").length == undefined){
			jQuery(".container-fondo-carrito").css({display: "none"});
			jQuery("body").css({overflow: "visible"})
		}
		else{
			jQuery(".container-fondo-carrito").css({display: "block"});
			jQuery("body").css({overflow: "hidden"})
		}
	});	
	
	jQuery(".block-minicart #btn-minicart-close").on('click', function(){
		jQuery(".block-minicart").removeClass("carrito-visible").css({display: "none"})
		jQuery(".container-fondo-carrito").css({display: "none"});
		jQuery("body").css({overflow: "visible"})
		
	});	
	
	jQuery(".minicart-items-wrapper .delete").on('click', function(){
		jQuery(".cancelar-producto-carrito").addClass("cancelar-producto-carrito-visible");
	});	
	
	jQuery(".cancelar-producto-carrito .no-cancelar").on('click', function(){
		jQuery(".cancelar-producto-carrito").removeClass("cancelar-producto-carrito-visible");
	});	
	
	//-- Boton Finalizar Compra
	if(jQuery(".block-minicart .empty").length == 0){
		jQuery(".actions .primary button").removeClass("btn-gris").addClass("btn-rojo")
	}
	else{
		jQuery(".actions .primary button").removeClass("btn-rojo").addClass("btn-gris")
	}
	//-- Producto destacado calculando alto
  	function altoProductoDestacado(){	
	  	var altoProducto = jQuery(".productos .item-prod").outerHeight();
	  	jQuery(".productos .item-destacado").css({height: altoProducto - 1})
	}	
	
	//-- TIPO DE VISTA 4-COLUMNAS / 2-COLUMNAS
	jQuery(".icon-small_view").on('click', function(){
		jQuery(".item-prod").parent().addClass("col-md-3").removeClass("col-md-6").removeClass("col-sm-12").addClass("col-sm-6").addClass("col-md-3").removeClass("col-md-6");
		jQuery(".item-destacado").parent().removeClass("col-md-12").removeClass("col-md-6").addClass("col-md-3").addClass("col-sm-6");
		jQuery(".distribuidora .productos").removeClass("grid-2")
		jQuery(".icon-big_view").css({display:"inline-block"});
		jQuery(".icon-small_view").css({display:"none"});
		altoProductoDestacado()
	});	
		
	jQuery(".icon-big_view").on('click', function(){
		jQuery(".item-prod").parent().removeClass("col-md-3").addClass("col-sm-12").removeClass("col-sm-6").addClass("col-md-6");
		jQuery(".item-destacado").parent().removeClass("col-sm-6").removeClass("col-md-3").addClass("col-md-12").addClass("col-md-6");
		jQuery(".distribuidora .productos").addClass("grid-2");
		jQuery(".icon-small_view").css({display:"inline-block"});
		jQuery(".icon-big_view").css({display:"none"});
	  	altoProductoDestacado()
	});	

	//-- Disponibilidad (Stock o Disponible) Ficha
	function disponibilidadMovil(){
		jQuery('.disponibilidad').insertAfter(".breadcrumb");
	}
	function disponibilidadDesktop(){
		jQuery('.disponibilidad').insertBefore(".page-title-wrapper");
	}
			
	//eventos_filtros();

});


var lastScrollTop = 0;
	
function navFijaConScrollDesktop(){
    var scroll = window.pageYOffset || document.documentElement.scrollTop; 
   
    if (scroll > lastScrollTop){
		if (scroll > 80){
			jQuery(".tiendas").removeClass("tienda-fija");
			jQuery(".nav").removeClass("nav-fija-con-tienda");
			jQuery(".nav").addClass("nav-fija");
		}
     
	} else {
		jQuery(".tiendas").addClass("tienda-fija");
		jQuery(".nav").addClass("nav-fija-con-tienda");
		if ( scroll < 30 ) {
			jQuery(".tiendas").removeClass("tienda-fija");
			jQuery(".nav").removeClass("nav-fija-con-tienda").removeClass("nav-fija");
		}
   }
   
   lastScrollTop = scroll;
}

	
function navFijaConScrollMovil(){
	jQuery(".tiendas").removeClass("tienda-fija");
	jQuery(".nav").removeClass("nav-fija-con-tienda").removeClass("nav-fija");
}	

jQuery(window).scroll(function () {
	
	var devicewidth = jQuery(window).width();
	
	/*--------- RESPONSIVE ---------*/
	if ( devicewidth < 992 ) {
		navFijaConScrollMovil();

	}else {
		navFijaConScrollDesktop();
	}

	/*--------- RESIZE ---------*/
	jQuery(window).resize(function() {
		
		var widthChanged = false;
		
	    if ( jQuery(window).width() != devicewidth ) {	    
	        widthChanged = true;   
	    }
		
		if ( widthChanged == true ) {
			
			if ( jQuery(window).width() < 992 ) {
				navFijaConScrollMovil();

			}else {
				navFijaConScrollDesktop();
			}		
		}
	});
});	

jQuery(window).load(function() {
	//-- Producto destacado calculando alto
  	function altoProductoDestacado(){	
	  	var altoProducto = jQuery(".productos .item-prod").outerHeight();
	  	jQuery(".productos .item-destacado").css({height: altoProducto - 1 })
	}	
	altoProductoDestacado();
});


/*
 * Function to set and get cookies (FUNCTIONS:)
 * setCookie, getCookie, checkCookie, pre_set_cookie, $(".btn-borde-rojo").submit
 */
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var variable = getCookie("ofiprix");
    if (variable != "") {
        // ya tiene cookies
    } else {
		// jQuery('.modal-cookies').modal('show');
		jQuery('.modal-cookies').modal('show');
	}
}

function pre_set_cookie(){
		variable = "ofiprix";
		if (variable != "" && variable != null) {
            setCookie("ofiprix", variable, 365);
        }
}

$(".btn-borde-rojo").click(function(event){
	event.preventDefault();
	pre_set_cookie();
	jQuery('.modal-cookies').modal('hide');
});

checkCookie();

/* 
 * Funciones relativas al menu
 */
	
function responsivemenu() {
	var x = document.getElementById("myTopnav");
	var y = document.getElementById("myTopbutton");
	if (menu_abierto == false){
		menu_abierto = true;
		jQuery("body").addClass("body-sin-scroll");
		jQuery(".icon-close").show();
		jQuery(".icon-menu").hide();
		x.className += " responsive";
		y.className += " menu_is_opened";
	}else if (menu_abierto == true){
		menu_abierto = false;
		jQuery("body").removeClass("body-sin-scroll");
		jQuery(".icon-close").hide();
		jQuery(".icon-menu").show();
		x.className = "topnav";
		y.className = "wprmenu_icon";
	}
	jQuery(this).parents(".nav").toggleClass("cerrar");
	jQuery(".wrapperMenuMovil").slideToggle();

}

// Esto es lo que habia en el menu responsive
/*
window.onload = function(){
	// Esto es del boton del meunu que hay online
	var x = document.getElementById("myTopnav");
	var y = document.getElementById("myTopbutton");
	if (x.className === "topnav") {
		x.className += " responsive";
		y.className += " menu_is_opened";
	} else {
		x.className = "topnav";
		y.className = "wprmenu_icon";
	}
}
*/	

/*
 * Pequeño ajuste
 * el banner ponerlo al 100%
 * y no al 1920 * 480
 */
function modificar_width_clase_banner(){
	jQuery(".slider img").attr("class","img-responsive");
}

//modificar_width_clase_banner();

/*
 * Function to validate email
 * boton_newsletter
 * formulario-newsletter
 */

function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
  
function validate(email) {
	var $result = $("#result");
	$result.text("");
	if (validateEmail(email)) {
	 	jQuery("#formulario-newsletter").submit();	
	} else {
	  $result.text(email + " no es válido, por favor vuelve a escribirlo");
	  $result.css("color", "red");
	}
	return false;
}

jQuery("#boton_newsletter").click(function(){
	var email = jQuery("#campo_email").val();	
	validate(email);
});

jQuery( "#campo_email" ).keypress(function() {
	var $result = $("#result");
	jQuery("#result").val(" ");
});

/*
 * Eventos para filtros
 */
  function eventos_filtros(){
	$(".selectpicker").change(function(){
		$(this+" option:selected").text();
		$(this+" option:selected").val();
		//$( "#myselect option:selected" ).text();
	});
  }