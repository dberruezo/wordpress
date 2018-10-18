// var
// y datos de ejemplo
// guardar datos agregar
var vector_caracteristicas_nombres = [];
var vector_caracteristicas_valores = [];
var vector_combinaciones_nombres   = [];
var vector_combinaciones_valores   = [];
var productos					   = {};
var filtros_activados 			   = false;
var tipo_activo					   = "caraceristicas";
var valor_activo_seleccionado	   = 5;
var nombre_activo				   = "Composicion";
// eliminar
/*
var eliminar_tipo_activo		   = "caraceristicas";
var eliminar_valor_activo_seleccionado = 5;
var eliminar_nombre_activo		    = "Composicion"; 
*/

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
		valor_activo_seleccionado = jQuery(this).val();
		//jQuery(".filtros-seleccionados .container").append('<div class="item"><span>' + valor + '</span><i class="fa icon-close"></i></div>')
		comprobarTitularFiltros();
		// Call to David functions
		comprobar_tipo($(this));
		guardar_nombre_selector($(this));
		jQuery(".filtros-seleccionados .container").append('<div class="item"><span valor_activo_seleccionado="'+valor_activo_seleccionado+'" tipo_activo="'+tipo_activo+'" nombre_activo="'+nombre_activo+'">'+valor+'</span><i class="fa icon-close"></i></div>');
		eliminarFiltros();
		evaluar_filtros();
	});
	
	//-- Eliminar Filtros Seleccionados
	function eliminarFiltros(){
		jQuery(".fa").click(function(){
		//jQuery(".filtros-seleccionados .fa").on('click', function(){
			desactivar_filtros(jQuery(this).parent().find("span"));
			//eliminar_filtro = jQuery(this).parent().find("span").text();
			jQuery(this).parent().remove();
			comprobarTitularFiltros();
		});	
	}	
	
	comprobarTitularFiltros();
	//eliminarFiltros();


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
			nombre_activo = str.substring(14, n);	
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
			activar_desactivar_filtros();
		}
	}
	
	// Activamos filtros cuando esta desactivos por primera vez o no tienen ningun filtro
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
		var contador = 0;
		if (tipo_activo == "caracteristicas"){
			$("div .producto").each(function(){
				cadena_caracteristicas 		   = $(this).attr("caracteristica");	
				vector_caracteristicas 		   = cadena_caracteristicas.split(",");
				cadena_caracteristicas 		   = $(this).attr("id_feature_value");
				vector_valores_caracteristicas = cadena_caracteristicas.split(",");		
				vector_caracteristicas.forEach(function comprobar_posicion(item,index,arr){
					//console.log("El item es: "+item);
					//console.log("El nombre activo es: "+nombre_activo);
					//console.log("El index es: "+index);
					//console.log("El vector es: "+arr);
					if (item == nombre_activo){
						posicion_caracteristicas = index;
						console.log("la posicion caracteristicas es: "+posicion_caracteristicas);
					}
				});
				//console.log("valor_activo_seleccionado"+valor_activo_seleccionado);
				//console.log("vector_valores_caracteristicas"+vector_valores_caracteristicas[posicion_caracteristicas]);
				if (vector_valores_caracteristicas[posicion_caracteristicas] == valor_activo_seleccionado){
					// ponemos la css display:block;
					$(this).addClass("activados");
				}else{
					// ponemos la css display:none;
					$(this).addClass("desactivados");
					if (contador == 0){
						productos[valor_activo_seleccionado] = [];
						productos[valor_activo_seleccionado].push($(this).attr("referencia"));
					}else{
						productos[valor_activo_seleccionado].push($(this).attr("referencia"));
					}	
					contador++;	
				}
			});
			console.log(productos)
		}else if (tipo_activo == "combinaciones"){
			$("div .producto").each(function(){	
				cadena_combinaciones 		 = $(this).attr("grupo_combinations_valor");	
				vector_combinaciones 		 = cadena_combinaciones.split(",");
				cadena_combinaciones 		 = $(this).attr("grupo_combinations_id");
				vector_valores_combinaciones = cadena_combinaciones.split(",");
				//console.log("vector_combinaciones"+vector_combinaciones);
				//console.log("vector_valores_combinaciones"+vector_valores_combinaciones);
				vector_combinaciones.forEach(function comprobar_posicion(item,index,arr){
					//console.log("El item es: "+item);
					//console.log("El index es: "+index);
					//console.log("El vector es: "+arr);
					if (item == nombre_activo){
						posicion_combinaciones = index;
						//console.log("Lap posicion combinaciones es: "+posicion_combinaciones);
					}
				});
				//console.log("vector_valores_combinaciones[posicion_combinaciones]: "+vector_valores_combinaciones[posicion_combinaciones]);
				//console.log("vector_combinaciones[posicion_combinaciones]: "+vector_combinaciones[posicion_combinaciones]);
				console.log("valor_activo_seleccionado: "+valor_activo_seleccionado);
				console.log("vector_valores_combinaciones[posicion_combinaciones]: "+vector_valores_combinaciones[posicion_combinaciones]);	
				if (vector_valores_combinaciones[posicion_combinaciones] == valor_activo_seleccionado){
					// ponemos la css display:block;
					$(this).addClass("activados");
				}else{
					// ponemos la css display:none;
					$(this).addClass("desactivados");
					if (contador == 0){
						productos[valor_activo_seleccionado] = [];
						productos[valor_activo_seleccionado].push($(this).attr("referencia"));
					}else{
						productos[valor_activo_seleccionado].push($(this).attr("referencia"));
					}
					contador++;	
				}
					
			});	
		}
		guardar_estado_filtros("anadir",true);
	}

	// Activamos y desactivamos filtros cuando esta activos
	function activar_desactivar_filtros(boleano){
		//if (!comprobar_filtro_no_actvado()){
			console.log("Acaba de entrar");
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
			var contador = 0;
			if (tipo_activo == "caracteristicas"){
				$("div .activados").each(function(){
					cadena_caracteristicas 		   = $(this).attr("caracteristica");	
					vector_caracteristicas 		   = cadena_caracteristicas.split(",");
					cadena_caracteristicas 		   = $(this).attr("id_feature_value");
					vector_valores_caracteristicas = cadena_caracteristicas.split(",");		
					console.log("vector_caracteristicas: "+vector_caracteristicas);
					console.log("vector_valores_caracteristicas: "+vector_valores_caracteristicas);
					vector_caracteristicas.forEach(function comprobar_posicion(item,index,arr){
						//console.log("El item es: "+item);
						//console.log("El index es: "+index);
						//console.log("El vector es: "+arr);
						if (item == nombre_activo){
							//console.log("la posicion caracteristicas es: "+);
							posicion_caracteristicas = index;
						}
					});
					//console.log("valor_activo_seleccionado"+valor_activo_seleccionado);
					//console.log("vector_valores_caracteristicas"+vector_valores_caracteristicas[posicion_caracteristicas]);
					if (vector_valores_caracteristicas[posicion_caracteristicas] == valor_activo_seleccionado){
						// ponemos la css display:block;
						$(this).addClass("activados");
					}else{
						// ponemos la css display:none;
						$(this).addClass("desactivados");
						if (contador == 0){
							productos[valor_activo_seleccionado] = [];
							productos[valor_activo_seleccionado].push($(this).attr("referencia"));
						}else{
							productos[valor_activo_seleccionado].push($(this).attr("referencia"));
						}	
						contador++;	
					}
					
				});
			}else if (tipo_activo == "combinaciones"){
				$("div .activados").each(function(){	
					cadena_combinaciones 		 = $(this).attr("grupo_combinations_valor");	
					vector_combinaciones 		 = cadena_combinaciones.split(",");
					cadena_combinaciones 		 = $(this).attr("grupo_combinations_id");
					vector_valores_combinaciones = cadena_combinaciones.split(",");
					//console.log("vector_combinaciones"+vector_combinaciones);
					//console.log("vector_valores_combinaciones"+vector_valores_combinaciones);
					vector_combinaciones.forEach(function comprobar_posicion(item,index,arr){
						//console.log("El item es: "+item);
						//console.log("El index es: "+index);
						//console.log("El vector es: "+arr);
						if (item == nombre_activo){
							posicion_combinaciones = index;
							console.log("Lap posicion combinaciones es: "+posicion_combinaciones);
						}
					});
					//console.log("vector_valores_combinaciones[posicion_combinaciones]: "+vector_valores_combinaciones[posicion_combinaciones]);
					//console.log("vector_combinaciones[posicion_combinaciones]: "+vector_combinaciones[posicion_combinaciones]);
					console.log("valor_activo_seleccionado: "+valor_activo_seleccionado);
					console.log("vector_valores_combinaciones[posicion_combinaciones]: "+vector_valores_combinaciones[posicion_combinaciones]);	
					if (vector_valores_combinaciones[posicion_combinaciones] == valor_activo_seleccionado){
						// ponemos la css display:block;
						$(this).addClass("activados");
					}else{
						// ponemos la css display:none;
						$(this).addClass("desactivados");
						if (contador == 0){
							productos[valor_activo_seleccionado] = [];
							productos[valor_activo_seleccionado].push($(this).attr("referencia"));
						}else{
							productos[valor_activo_seleccionado].push($(this).attr("referencia"));	
						}	
						contador++;		
					}
					
				});	
			}
			guardar_estado_filtros("anadir",true);
		//}
		
	}

	function desactivar_filtros(object){
		// valor_activo_seleccionado="'+valor_activo_seleccionado+'" tipo_activo="'+tipo_activo+'" nombre_activo="'+nombre_activo+'"
		var valor_activo_seleccionado = object.attr("valor_activo_seleccionado");
		var tipo_activo 			  = object.attr("tipo_activo");
		var nombre_activo 			  = object.attr("nombre_activo");
		//console.log("valor_activo_seleccionado: "+valor_activo_seleccionado);
		console.log("valor_activo_seleccionado: "+valor_activo_seleccionado);
		console.log("tipo_activo: "+tipo_activo);
		console.log("nombre_activo: "+nombre_activo);

		console.log(productos[valor_activo_seleccionado]);
		
		$("div .desactivados").each(function(){
			//console.log("La referencia es: ".$(this).attr("referencia"));
			for (var i=0;i<productos[valor_activo_seleccionado].length;i++){
				if (productos[valor_activo_seleccionado][i] == $(this).attr("referencia")){
					//console.log("La referencia es: ".$(this).attr("referencia"));
					$(this).removeClass("desactivados").addClass("activados");
				}
				
			}
			
			console.log("La referencia es: "+$(this).attr("referencia"));	
		});

		

		/*
		$("div .desactivados").each(function(){
			productos[valor_activo_seleccionado].each(function recorrer(item,index,arr){
				if (item.referencia == $(this).attr("referencia")){
					$(this).removeClass("desactivados").addClass("activados");
				}
			});
		});	
		*/	

		/*
		console.log("vector_caracteristicas_nombres: "+vector_caracteristicas_nombres);
		console.log("vector_caracteristicas_valores: "+vector_caracteristicas_valores);
		console.log("vector_combinaciones_nombres: "+vector_combinaciones_nombres);
		console.log("vector_combinaciones_valores: "+vector_combinaciones_valores);
		*/		
			
		/*	
		console.log("vector_caracteristicas_nombres: "+vector_caracteristicas_nombres);
		console.log("vector_caracteristicas_valores: "+vector_caracteristicas_valores);
		console.log("vector_combinaciones_nombres: "+vector_combinaciones_nombres);
		console.log("vector_combinaciones_valores: "+vector_combinaciones_valores);	
		*/
		// eliminar_filtro este es el valor
		// identificar el filtro si es caraceristica o combinacion 
		// consultando a los vectores mediante el id de eliminacion
		// aqui luego sobre div desactivados activar los que tengan esa caracteristica
		// también mirar si cuando se desactiva va a quedar vacio activar TODO y ya esta

		/*
		if (tipo_activo == "caracteristicas"){
			$("div .desactivados").each(function(){
				cadena_caracteristicas 		   = $(this).attr("caracteristica");	
				vector_caracteristicas 		   = cadena_caracteristicas.split(",");
				cadena_caracteristicas 		   = $(this).attr("id_feature_value");
				vector_valores_caracteristicas = cadena_caracteristicas.split(",");		
				console.log("vector_valores_caracteristicas: "+vector_valores_caracteristicas);
				vector_caracteristicas.forEach(function comprobar_posicion(item,index,arr){
					//console.log("El item es: "+item);
					//console.log("El index es: "+index);
					//console.log("El vector es: "+arr);
					if (item == nombre_activo){
						posicion_caracteristicas = index;
						console.log("la posicion caracteristicas es: "+posicion_caracteristicas);
						console.log("El item es: "+item);
					}
				});
				
				//console.log("valor_activo_seleccionado"+valor_activo_seleccionado);
				//console.log("vector_valores_caracteristicas"+vector_valores_caracteristicas[posicion_caracteristicas]);
				if (vector_valores_caracteristicas[posicion_caracteristicas] == valor_activo_seleccionado){
					// ponemos la css display:block;
					//console.log("Encontrado");
					//$(this).removeClass("desactivados").addClass("activados");
				}else{
					console.log("Encontrado");
					$(this).removeClass("desactivados").addClass("activados");
				}
				
			});
		}else if (tipo_activo == "combinaciones"){
			// Estanios en combinaciones
			$("div .desactivados").each(function(){
				cadena_combinaciones 		 = $(this).attr("grupo_combinations_valor");	
				vector_combinaciones 		 = cadena_combinaciones.split(",");
				cadena_combinaciones 		 = $(this).attr("grupo_combinations_id");
				vector_valores_combinaciones = cadena_combinaciones.split(",");
				vector_combinaciones.forEach(function comprobar_posicion(item,index,arr){
					//console.log("El item es: "+item);
					//console.log("El index es: "+index);
					//console.log("El vector es: "+arr);
					if (item == nombre_activo){
						posicion_caracteristicas = index;
						//console.log("la posicion caracteristicas es: "+posicion_caracteristicas);
						//console.log("El item es: "+item);
					}
				});
				
				//console.log("valor_activo_seleccionado"+valor_activo_seleccionado);
				//console.log("vector_valores_caracteristicas"+vector_valores_caracteristicas[posicion_caracteristicas]);
				if (vector_valores_combinaciones[posicion_caracteristicas] == valor_activo_seleccionado){
					// ponemos la css display:block;
					//console.log("Encontrado");
					//$(this).removeClass("desactivados").addClass("activados");
				}else{
					console.log("Encontrado");
					$(this).removeClass("desactivados").addClass("activados");
				}
				
			});
		}	
		*/
		
		// Eliminamos el item de los vectores
		if (tipo_activo == "caracteristicas"){
			vector_caracteristicas_nombres.forEach(function comprobar_posicion(item,index,arr){
				if (item == nombre_activo){
					arr.splice(index, 1);	
				}
			});	

			vector_caracteristicas_valores.forEach(function comprobar_posicion(item,index,arr){
				if (item == valor_activo_seleccionado){
					arr.splice(index, 1);	
				}
			});
			
		}else if (tipo_activo == "combinaciones"){
					
			vector_combinaciones_nombres.forEach(function comprobar_posicion(item,index,arr){
				if (item == nombre_activo){
					arr.splice(index, 1);	
				}
			});	

			vector_combinaciones_valores.forEach(function comprobar_posicion(item,index,arr){
				if (item == valor_activo_seleccionado){
					arr.splice(index, 1);	
				}
			});

		}
		
	}

	function borrar_otros_filtros(){

	}
	
	// Guardamos estado de los filtros si estan activados o no 
	function guardar_estado_filtros(operacion,boleano){
		// guardamos filtros
		if (boleano == true){
			filtros_activados = true;
		}else if (boleano == false){
			filtros_activados = false;
		}
		if (operacion == "anadir"){
			// gaurdamos vectores
			if (tipo_activo == "caracteristicas"){
				vector_caracteristicas_nombres.push(nombre_activo);
				vector_caracteristicas_valores.push(valor_activo_seleccionado);
			}else if (tipo_activo == "combinaciones"){
				vector_combinaciones_nombres.push(nombre_activo);
				vector_combinaciones_valores   = [valor_activo_seleccionado];	
			}
			/*
			productos[]
			productos["tipo"]		 = tipo_activo;
			productos[nombre_activo] = valor_activo_seleccionado;
			productos.nombre_activo.productos     = [];
			console.log(productos);
			*/
		}else if(operacion == "borrar"){

		}
		console.log("guardamos el estado de los filtros<br>");
	}

	/*
	 * Habrá que comprobar que si hay alguno 
	 * seleccionado de la misma familia lo elimine
	 */ 

	// Comprobamos que el filtro no este activado el mismo
	function comprobar_filtro_no_actvado(){
		// Solamente se comprueba al principio del activar y desactivar filtro para ver si ya esta activo el mismo
		var encontrado = false;
		if (tipo_activo == "caracteristicas"){
			vector_caracteristicas_nombres.each(function comprobar(item,index,arr){
				if (nombre_activo == item){
					encontrado = true;
				}
			});
			vector_caracteristicas_valores.each(function comprobar(item,index,arr){
				if (valor_activo_seleccionado == item){
					encontrado = true;
				}
			});
		}else if (tipo_activo == "combinaciones"){
			vector_combinaciones_nombres.each(function comprobar(item,index,arr){
				if (nombre_activo == item){
					encontrado = true;
				}
			});
			vector_combinaciones_valores.each(function comprobar(item,index,arr){
				if (valor_activo_seleccionado == item){
					encontrado = true;
				}
			});
		}
		return encontrado;
	}
});

