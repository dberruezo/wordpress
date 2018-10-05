
jQuery(document).ready(function() {

	
	// Slider Ficha Producto
    jQuery('.carrusel-detalle-prod').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.carrusel-min-prod',
		infinite: false,
		swipe: false,
		responsive: [{
			breakpoint: 991,
			settings: {
				arrows: true,
				nextArrow: '<i class="fa icon-next"></i>',
				prevArrow: '<i class="fa icon-back"></i>',
			}
		}]
	});
	
	// Mini Slider Ficha Producto
	jQuery('.carrusel-min-prod').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		vertical: false,
		asNavFor: '.carrusel-detalle-prod',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		infinite: false,
		swipe: false
	});		

	// Carrusel Añade un producto
	jQuery('.carrusel-add-un-producto').slick({
	   centerMode: true,
	   centerPadding: '1px',
	   autoplay: true,      
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
});