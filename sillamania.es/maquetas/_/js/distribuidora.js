// var
// y datos de ejemplo
var vector_caracteristicas_nombres = [];
var vector_caracteristicas_valores = [];
var vector_combinaciones_nombres   = [];
var vector_combinaciones_valores   = [];
var filtros_activados 			   = false;
var tipo_activo					   = "caraceristicas";
var valor_activo_seleccionado	   = 5;
var nombre_activo				   = "Composicion";


jQuery(document).ready(function() {
	
	//-- ABRIR / CERRAR FILTROS
	jQuery(".icon-filters").on('click', function(){
		jQuery(".distribuidora .container-filtros").slideToggle();
		jQuery(".icon-filters").toggleClass("before-filtro"); 
	});		
	
	
	//-- "Filtros Rango de Precio"

	jQuery( "#slider-distribuidora" ).slider();
	jQuery( "#slider-resultados" ).slider();

	
	//-- Quitar o dejar titular de los filtros según existan filtros aplicados o no
	function comprobarTitularFiltros(){
		if ( jQuery(".filtros-seleccionados .item").length ) {
			jQuery(".filtros-seleccionados p").removeClass("oculto").addClass("visible")
		} else {
			jQuery(".filtros-seleccionados p").removeClass("visible").addClass("oculto")
		}
	}	

	//-- Recoger el valor del Select y añadirlo
	jQuery('select').on('change',function(){
		var valor = jQuery(this).val();
		valor_activo_seleccionado + jQuery(this).val();
		jQuery(".filtros-seleccionados .container").append('<div class="item"><span>' + valor + '</span><i class="fa icon-close"></i></div>')
		comprobarTitularFiltros();
		eliminarFiltros();
		// Call to David functions
		comprobar_tipo($(this));
		guardar_nombre_selector($(this));
		recoger_valores();
		//filtrarProductos();
	});
	
	//-- Eliminar Filtros Seleccionados
	function eliminarFiltros(){
		jQuery(".filtros-seleccionados .fa").on('click', function(){
			jQuery(this).parent().remove();
			comprobarTitularFiltros()
		});	
	}	
	
	comprobarTitularFiltros();
	eliminarFiltros();


	/*
	 * David functions
	 * 
	 */

	// Comprobar tipo funcion caracteristica o combinacion 
	function comprobar_tipo(objeto){
		var str = objeto.attr("name");
		var n   = str.search("caracteristicas");
		if (n != -1){
			// son caracteristicas
			console.log("son caracteristicas");
			tipo_activo = "caracteristicas";
		}else{
			n   = str.search("combinaciones");
			if (n != -1){
				// son combinaciones
				tipo_activo = "combinaciones";
				console.log("son combinaciones");
			}	
		}
	}

	// Guardar nombre selector que sera el mismo que nombre activo
	function guardar_nombre_selector(objeto){
		var str = objeto.attr("name");
		var n   = str.length;
		if (tipo_activo == "caracteristicas"){
			nombre_activo = str.substring(16, n);
		}else if(tipo_activo == "combinaciones"){
			nombre_activo = str.substring(13, n);	
		}
		console.log("nombre activo: "+nombre_activo);
	}

	// Evaluamos filtros para recorrer el bucle de una manera diferente
	// Si filtros_activados == false pondremos class activado y desactivado segun resultados
	// Si filtros_activados == true pondremos class activado y desactivado SOLO A LOS ACTIVADOS en este momento
	function evaluar_filtros(){
		if (filtros_activados == false){
			activar_filtros();
		}else if (filtros_activados == true){

		}
	}
	
	// Recogemos valores de la posicion de los divs 
	function recoger_valores(){
		
	}	

	// Activamos y desactivamos filtros cuando esta activos
	function activar_desactivar_filtros(){

	}

	// Activamos y desactivamos filtros cuando esta activos
	function activar_filtros(){
		// caracteristicas
		var posicion_caracteristicas 		= 0;
		var cadena_caracteristicas  		= "";
		var vector_caracteristicas  		= "";
		var vector_valores_caracteristicas  = "";
		// combinaciones
		var posicion_combinaciones  		= 0;
		var cadena_combinaciones    		= "";
		var vector_combinacioness   		= "";
		var vector_valores_combinaciones    = "";

		if (tipo_activo == "caracteristicas"){
			$("div .producto").each(function(){
				cadena_caracteristicas 		   = $(this).attr("caracteristica");	
				vector_caracteristicas 		   = cadena_caracteristicas.split(",");
				cadena_caracteristicas 		   = $(this).attr("id_feature_value");
				vector_valores_caracteristicas = cadena_caracteristicas.split(",");		
				vector_caracteristicas.forEach(function comprobar_posicion(item,index,arr){
					//console.log("El item es: "+item);
					//console.log("El index es: "+index);
					//console.log("El vector es: "+arr);
					if (item == nombre_activo){
						posicion_caracteristicas = index;
					}
				});
				if (vector_valores_caracteristicas[posicion] == valor_activo_seleccionado){
					// ponemos la css display:block;
					$(this).addClass("activados");
				}else{
					// ponemos la css display:none;
					$(this).addClass("desactivados");
				}
			});
		}else if (tipo_activo == "cobminaciones"){
				cadena_combinaciones = $(this).attr("grupo_combinations_valor");	
				vector_combinaciones = cadena_caracteristicas.split(",");
				vector_combinaciones.forEach(function comprobar_posicion(item,index,arr){
					//console.log("El item es: "+item);
					//console.log("El index es: "+index);
					//console.log("El vector es: "+arr);
					if (item == nombre_activo){
						posicion_combinaciones = index;
					}
				});
		}
	}

	// Guardamos estado de los filtros si estan activados o no 
	function guardar_estado_filtros(){

	}


	/*
	// Activamos filtros cuando esta inactivos  y se activan por primera vez
	function activar_filtrar(){
		
		
<div class="producto" caracteristica_valor="Manga corta,Informal,Algodón" caracteristica="Propiedades,Estilos,Composición" id_feature_value="17,11,5" id_feature="7,6,5" grupo_combinations_id="1,13" grupo_id="1,3" grupo_combinations_valor="Color,Size" grupo_combinations="Naranja,S"><a href="" class="item-prod"><div class="img-container"><img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen"><img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen"></div><div class="container-text"><div class="wrapper-position"><div class="extra-info"></div><div class="info"><div class="descripcion"><p>Camiseta efecto desteñido de manga corta Naranja,S</p></div><div class="price-box"><span class="price-container normal-price"><span class="price-wrapper ">0.000000</span> <span class="unidad">ud</span></span></div><div class="prod-description"><p></p></div></div></div></div></a></div>
	
		var encontrado = false;
		for (i = 0; i < filtros_seleccionados.length; i++) {
			if (filtros_seleccionados[i] == id){
				encontrado = true;		
			}	
		}
		if(encontrado = false){
			filtros_seleccionados.push(id);
			$("div .producto").each(function(){
				$(this).show();
			});	
			
			$("div .producto").each(function(){
				console.log("El id atributuo es: "+$(this).attr("idatributo"));
				if ($(this).attr("idatributo") != id){
					$(this).hide();
				}
			});		
		}
		
	}
	*/
});

