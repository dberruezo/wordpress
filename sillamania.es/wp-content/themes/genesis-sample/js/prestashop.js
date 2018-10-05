function cambiarcombi(product,combi) {
	$('.addcartcombi'+product).val(combi);
};
function carrito(mensaje='') {
			var getUrl = window.location;
			$.ajax
			({
				type: "GET",
				url: "http://"+getUrl.host+"/tiendaonline/ajaxcart.php?mensaje="+mensaje,
				success: function (data) {
					$('.carrito').html( data );
				}
			})
}
function carritoshow(mensaje='') {
	carrito(mensaje);
	$('.carritocontainer').show();
}
carrito();