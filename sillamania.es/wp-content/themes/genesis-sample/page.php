<?php
/**
 * Custom Category Template
 *
 * @package      my_child_theme
 * @since        1.0.0
 * @author       Travis Smith <t@wpsmith.net>
 * @copyright    Copyright (c) 2013, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @link         https://gist.github.com/wpsmith/5062834
 *
 */

 /*
  *  All genesis functions
  */

 // Remove default loop
/*
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'wps_category_do_loop_intro', 5 );
*/

/**
 * Custom Loop Intro
 *
 */

/*
function wps_category_do_loop_intro() {
    if(is_front_page()) {
        echo '<article id="post" class="post type-post status-publish format-standard has-post-thumbnail es-ES entry">';
        $my_postid = get_the_ID();//This is page id or post id
        $content_post = get_post($my_postid);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        echo $content;
        echo "</article>";
    } else {
        echo '<div class="row">';
        echo '<div class="col-xs-12 col-md-2">';
        $prestashop_id = get_field('prestashop_id', $my_postid );
        echo getsuperparent($prestashop_id);
        echo '</div>';
        echo '<article id="post" class="col-xs-12 col-md-10 post type-post status-publish format-standard has-post-thumbnail es-ES entry">';
        $my_postid = get_the_ID();//This is page id or post id
        $content_post = get_post($my_postid);
        $content = $content_post->post_content;
        echo "<h1>".$content_post->post_title."</h1>";
        $content = apply_filters('the_content', $content);
        echo $content;
        echo "</article>";
        echo '</div>';
    }
}
*/



/*
 * Shortcodes que hay 
 * que implementar en
 * en el template hierarchy page
 * [subcategorias]
 * [filtroscategoria]
 * [listaproductos]   
 */

/*
 * Funciones David
 */

$mystring = $_SERVER["REQUEST_URI"];
$findme   = "error";
$pos 	  = strpos($mystring, $findme);
$encontrado = false;
//echo "El pos vale: ".$pos."<br>"; 
if ($pos === true) {
$encontrado = TRUE;
?>
	<script>
		//jQuery(document).ready(function(){
			$result.text("Ha habido un error o el email ya existe");
			$result.css("color", "red");
			function scrollToAnchor(aid){
    			var aTag = $("a[name='"+ aid +"']");
    			$('html,body').animate({scrollTop: aTag.offset().top},'slow');
			}
			scrollToAnchor('email_anchor');
		//});
	</script>
<?php	
}

if ($encontrado == FALSE){
	$mystring = $_SERVER["REQUEST_URI"];
	$findme   = "gracias";
	$pos 	  = strpos($mystring, $findme);
	//echo "El pos vale: ".$pos."<br>"; 
	if ($pos === true) {
?>
	<script>
		//jQuery(document).ready(function(){
			$result.text("Gracias por subscribirte a nuestra newsletter");
			$result.css("color", "green");
			function scrollToAnchor(aid){
				var aTag = $("a[name='"+ aid +"']");
				$('html,body').animate({scrollTop: aTag.offset().top},'slow');
			}
			scrollToAnchor('email_anchor');
		//});
	</script>
<?php
	}
}
get_header(); 
if (get_the_title() == "home"){ ?>
	<?php echo ('<script>jQuery(document).ready(function(){ jQuery(".entry-title").hide(); });</script>'); ?>
	<body class="home">
	<div class="modal fade modal-bienvenida" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<span class="icon-close close" data-dismiss="modal"></span>
				<div class="modal-body">
					<div class="text-container">
						<div class="titular">
							<h2>Bienvenido </h2>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, lorem ipsum consectetur.</p>
						</div>
				
						<form action="" method="" id="formulario-bienvenida">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name*" />
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Mail*" />
							</div>
							<p class="obligatorio">*Datos obligatorios</p>
							<button type="submit" class="btn btn-rojo">OK</button>
							<div class="checkbox">
		                        <input id="checkbox5" type="checkbox" class="styled" />
		                        <label for="checkbox5">
		                            Deseo recibir información de Ofiprix
		                        </label>
		                    </div>
						</form>
					</div>				
	
					<div class="container-img"></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade modal-cookies" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<!-- <form action="" method="" id="formulario-cookies"> -->
						<div class="texto-legal">
							<p>Utilizamos cookies propias y de terceros para ofrecerte una mejor experiencia y servicio, de acuerdo a tus hábitos de navegación. Si continúas navegando, consideramos que aceptas su uso. Puedes obtener más información <a hred=""> política de cookies.</a></p>
					</div>
						<button type="button" class="btn btn-borde-rojo">Aceptar cookies</button>
					<!-- </form> -->		
				</div>
			</div>
		</div>
	</div>

	<div class="podemos-ayudarte">
		<div class="cerrar">
			<span class="icon-close"></span>
		</div>
		<div class="text-container">
			<div class="description">
				<p>Podemos ayudarte </p>
			</div>
			<div class="telefono">
				<p>902 120 000</p>
			</div>
			<a class="btn btn-borde-rojo-tw" href="" >Contactar</a>			
		</div>
	</div>
	<?php get_template_part( "template-parts/cabecera_home"); ?>
	
<?php }else{  ?>
	<?php get_template_part( "template-parts/cabecera_categoria"); ?>
	
	<!--
	<div class="container">
		<ol class="breadcrumb">
		  	<li><a href="#">Home</a></li>
		  	<li><a href="#">Productos</a></li>
		  	<li class="active">sillas de oficina</li>
		</ol>
		<div class="container-hero">
			<div class="bloque-left">
				<div class="row">
					<div class="col-xs-12 col-sm-9 col-sm-push-3">
						<div class="container-img">
							<img src="http://placehold.it/770x360/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>								
					</div>
					<div class="col-xs-12 col-sm-3 col-sm-pull-9">
						<div class="text-container">
							<div class="titular">
								<h2>sillas de oficina</h2>
							</div>
							<div class="description">
								<p>Lorem ipsum dolor sit amet, conceptetur dolor sit</p>
								<a class="enlace-line hidden-sm hidden-md hidden-lg" href="">Volver al catálogo </a>
							</div>								
						</div>
					</div>
				</div>
			</div>
			<div class="bloque-right hidden-xs">
				<a class="enlace-line" href="">Volver al catálogo </a>
			</div>
		</div>
		
		<div class="container-header-filtros">
			<h2>Catálogo de sillas de oficina</h2>
			<div class="bloque-right">
				<div class="item ordenar">
					<p>Ordenar por</p>
					<div class="contenedorPluguinSelect">
						<select name="" id="" class="selectpicker">
							<option value="">precio</option>
							<option value="opcion 1">otro 1</option>
							<option value="opcion 2">otro 2</option>
						</select>
					</div>
				</div>
				<i class="fa icon-filters before-filtro"a></i>
				<i class="fa icon-small_view"></i>
				<i class="fa icon-big_view"></i>				
			</div>
		</div>
	</div>
	-->	
	<!--
	<div class="container-filtros">
		
		<div class="container">
			<form action="" method="" id="">
				<div class="selectores">
	-->	
				<?php //echo do_shortcode("[get_features_and_attributes feature='5,6,7' attribute='1,3' id_category='3']"); ?>
			
				<!--
					<div class="atributo">
						<div class="contenedorPluguinSelect">
							<select name="" id="" class="selectpicker">
								<option value="">Titular filtro</option>
								<option value="opcion 1">Opción 1</option>
								<option value="opcion 2">Opción 2</option>
								<option value="opcion 2">Opción 3</option>
								<option value="opcion 4">Opción 4</option>
							</select>
						</div>
					</div>
					-->				
			
<!--

				</div>
			</form>
		</div>
	</div>

	<div class="filtros-seleccionados">
		<div class="container">
			<p>Filtrado por</p>
		</div>
	</div>
				
	<div class="container">
	
-->

		<!--
		<div class="productos">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info"></div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón confort con titular de dos líneas</p>
									</div>
									<div class="price-box">
										<span class="price-container normal-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>									
									</div>					
								</div>		
							</div>						
						</div>					
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info porcentaje-descuento">
									<p>20%</p>
								</div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container old-price">
											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>
										</span>
										<span class="price-container special-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>	
							</div>
						</div>						
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info"></div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container normal-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
									</div>						
								</div>	
							</div>								
						</div>					
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info porcentaje-descuento">
									<p>20%</p>
								</div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container old-price">
											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>
										</span>
										<span class="price-container special-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>	
							</div>	
						</div>						
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 ">
					<a href="" class="item-destacado">
						<div class="imagen-destacada"></div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>	
									<div class="precio">
										<p class="desde">Desde</p>
										<p class="cantidad">€ 790<span>ud</span></p>
									</div>					
								</div>	
							</div>	
						</div>				
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info porcentaje-descuento">
									<p>20%</p>
								</div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container old-price">
											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>
										</span>
										<span class="price-container special-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>
							</div>
						</div>							
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info"></div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container normal-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>	
							</div>							
						</div>					
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info porcentaje-descuento">
									<p>20%</p>
								</div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container old-price">
											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>
										</span>
										<span class="price-container special-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>									
									</div>						
								</div>	
							</div>
						</div>						
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info"></div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container normal-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>							
								</div>	
							</div>							
						</div>					
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info porcentaje-descuento">
									<p>20%</p>
								</div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container old-price">
											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>
										</span>
										<span class="price-container special-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>	
							</div>
						</div>						
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info"></div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container normal-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>	
							</div>								
						</div>					
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<a href="" class="item-prod">
						<div class="img-container">
							<img src="http://placehold.it/770x510/bcbcbc" class="img-responsive principal" alt="Alt de la imagen" title="Titulo de la imagen" />
							<img src="http://placehold.it/770x510/777777" class="img-responsive secundaria" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
						<div class="container-text">
							<div class="wrapper-position">
								<div class="extra-info porcentaje-descuento">
									<p>20%</p>
								</div>
								<div class="info">
									<div class="descripcion">
										<p>Sillón tela confort</p>
									</div>
									<div class="price-box">
										<span class="price-container old-price">
											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>
										</span>
										<span class="price-container special-price">
											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>
										</span>
									</div>	
									<div class="prod-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>									
									</div>						
								</div>	
							</div>
						</div>						
					</a>
				</div>
			</div>
		</div>
		-->

		<!-- fin de produtos -->

		<!--
		<div class="container-otros-2">
			<div class="row">
				<div class="col-xs-12 col-sm-5">
					<div class="container-info">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="container-img img-3">
						
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 hidden-xs">
					<div class="container-img img-4">
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
	-->
	<script>
		/*
		 * Genesis framework 
		 * crea un tag que pone en
		 * el body de la pagina
		 * por eso nosotros la cambiamos
		 * a distribuidora
		 */
		jQuery(document).ready(function(){
			$('body').addClass('distribuidora');	
			// removeClass('change_me').
		});
	</script>
<?php } ?>
<?php 

/*
 * Genesis execute
 */
genesis();

/*
 * Footer execute
 */
get_footer();
?>
