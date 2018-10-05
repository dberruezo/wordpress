jQuery(document).ready(function() {

	//--DESPLEGAR CONTENEDORES CHEQUEADOS
	jQuery('input[data-target]').on('change', function(){			
		var $target = jQuery(this).data('target');
		
		jQuery('.' + $target).collapse('toggle');
	});
	
	jQuery(".resumen-pedido .codigo-promocional p").on('click', function(){
		jQuery(".checkout-body form .resumen-pedido .codigo-promocional .form-group .container-codigo-promocional").slideToggle();
	});	
		
});