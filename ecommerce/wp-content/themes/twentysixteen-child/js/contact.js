jQuery(document).ready(function($){     
    
    // contact                           
	var error 	= true;      
	var nombre  = "";
	var email   = "";
	var mensaje = "";
	
	/*
    function addLoading( e )
    {
		$(e).val( '{wait}'.replace('{wait}', contactForm.wait) ).attr('disabled', true);
	}    
    
    function removeLoading( e )
    {
		$(e).val(value_submit).attr('disabled', false);
	}
	
	function addError(msg, e, effect)
	{
		error = true;           
		$(e).removeClass('icon success');
		$(e).addClass('icon error');
		$(e).parents('li').find('.msg-error').text(msg);	
		if( effect !== undefined && effect == true )
		{
			$(e).css({position:'relative'}).animate({left:-10}, 100).animate({left:10}, 100).animate({left:-5}, 100).animate({left:5}, 100).animate({left:0}, 100);
		}
	}                 
	
	function addSuccess(e)
	{                                     
		$(e).addClass('icon success');	
	}
	
	function removeError(e)
	{
		error = false;
		$(e).parents('li').find('.msg-error').text('');     
		$(e).removeClass('icon error');
        $(e).removeClass( 'formRed')
		addSuccess(e);
	}           

	$('.contact-form .required').blur(function(){             
		var name = $(this).attr('name').match( /(.*)\[(.*)\]/ );
		var id_form = $(this).parents('.contact-form').find('input[name="id_form"]').val(); 
		jQuery.globalEval( 'var msg = messages_form_'+id_form+'.'+name[2] );  
		if( $(this).val() == '' )
			addError( msg, this );       
		else               
			removeError(this);
	});

	$('.contact-form .email-validate').blur(function(){             
		var expr = /^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/;
		var name = $(this).attr('name').match( /(.*)\[(.*)\]/ );       
		var id_form = $(this).parents('.contact-form').find('input[name="id_form"]').val();
		jQuery.globalEval( 'var msg = messages_form_'+id_form+'.'+name[2] );
		if( ( $(this).val() != '' && !expr.test( $(this).val() ) ) || ( $(this).is('.required') && $(this).val() == '' ) )  
			addError( msg, this );            
		else 
			removeError(this);
	});

	$('.contact-form').submit(function(){
		addLoading( '.contact-form input:submit' );  
	});

	$('input[placeholder], textarea[placeholder]').placeholder();    
		   
	function validarEmail(){
		var expr = /^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/;
		var name = $(this).attr('name').match( /(.*)\[(.*)\]/ );       
		var id_form = $(this).parents('.contact-form').find('input[name="id_form"]').val();
		jQuery.globalEval( 'var msg = messages_form_'+id_form+'.'+name[2] );
		if( ( $(this).val() != '' && !expr.test( $(this).val() ) ) || ( $(this).is('.required') && $(this).val() == '' ) )  
			return false; //addError( msg, this );            
		else 
			return true; //removeError(this);
	}
	*/
	
	

	/*
	 * Solo validamos si el campo
	 * del nombre, email, mensaje 
	 * no estan en blanco y si 
	 * el email esta validado
	 */
	
	function validarEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(String(email).toLowerCase());
	}
	
	function validar(){
		nombre  = $("#name").val();
		email   = $("#email_one").val();
		mensaje = $("#message").val();
		if (nombre != "" && email != "" && mensaje != ""){
			if (validarEmail(email)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}	
	}

	$('#submit').click(function(event) {
		if (validar()){
			$('#form1').submit();
		}else{
			$(".alert-danger").show();
			$(".alert-danger").html('<strong>Error!</strong> El email introducido es incorrecto.');
			return false;
		}
	});

	/*
	 * Contactar
	 */

	function graciasOrErrorContact(){
		var url = location.href;
		var resultado = url.search("gracias");
		if (resultado != -1){
			$(".alert-success").show();
			$(".alert-success").html('<strong>Success!</strong> Gracias por contactar con nosotros.');			
			scrollToAnchor('formulario');		
		}		
	}

	function initialize(){
		$(".alert").hide();
	}

	function scrollToAnchor(aid){
		var aTag = $("a[name='"+ aid +"']");
		$('html,body').animate({scrollTop: aTag.offset().top},'slow');
	}

	// call to functions
	initialize();
	graciasOrErrorContact();

});   