var filtros_seleccionados = new array();

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
		jQuery(".filtros-seleccionados .container").append('<div class="item"><span>' + valor + '</span><i class="fa icon-close"></i></div>')
		comprobarTitularFiltros();
		eliminarFiltros();
		filtrarProductos(valor);
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

	// Eliminar productos por id de atributo
	function filtrarProductos(id){
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

	

});

