<?php 
/*
 * Abrimos sesion para guardar
 * una variable del modal
 */
error_reporting(E_ERROR);
session_start();
echo '
	<script>
		function load_modal_window(){
			setTimeout(function(){ 
				jQuery(".modal-bienvenida").modal("show");
				jQuery(".modal-cookies").modal("show");	
			}, 3000);
		}
	</script>';
if (!$_SESSION['modal']){
	$_SESSION['modal']  = 'inicial'; 
	echo "<script>load_modal_window();</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Ofiprix</title>
	<link href="_/css/bootstrap.min.css" rel="stylesheet">
	<link href="_/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	    <link rel="stylesheet" type="text/css" href="_/css/ie.css" />
	<![endif]-->
</head>

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
	
	<header>
		<div class="top-bar">
			<div class="inicio-sesion">
				<p>Descubre los mejores descuentos en sofás48! <a href="" >Entra y disfruta</a></p>
			</div>
			<div class="info-extra">
				<ul>
					<li><i class="fa icon-devolucion"></i>Devolución 14 días</li>
					<li><i class="fa icon-envio"></i>Envío gratis</li>
					<li><i class="fa icon-garantia"></i>Garantía 2 años</li>
					<li><i class="fa icon-stock"></i>Productos en stock</li>
				</ul>
			</div>
			<i class="fa icon-close"></i>
		</div>
		<div class="nav">
			<div class="container-cabecera">
				<a class="logo" href="" ><img src="_/images/sofas48.png" alt="" title="Titulo de la imagen" /></a>
				<i class="fa icon-menu"></i>
				<i class="fa icon-close"></i>				
			</div>
			
			<ul class="principal">
				<li><a href="" >Oficina</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver catálogo</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>Sillas operativas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas giratorias</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillones de oficina</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas ergonómicas</p></a></li>
						</ul>
					</div>
				</li>
				<li><a href="" >Tipos</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver catacterísticas</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>Sillas para bares</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>Sillas acolchadas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas apilables</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas con brazos regulables</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas con reposabrazos</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas de con ruedas</p></a></li>
						</ul>
					</div>
				</li>
				<li><a href="" >Características</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver catálogo</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>Sillas comedor</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas de cocina</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas juveniles</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas gaming</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas de escritorio</p></a></li>
						</ul>
					</div>
				</li>
				<li><a href="" >Por estilos</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver estilos</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>Sillas de diseño</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas estilo nórdico</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>Sillas modernas</p></a></li>
						</ul>
					</div>
				</li>
				<li><a href="" >Por materiales</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver catálogo</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>cuero</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>madera</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>plástico</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>tela</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>metacrilato</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>metal</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>poliuretano</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>tapizadas</p></a></li>
						</ul>
					</div>
				</li>
				<li><a href="" >Por colores</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver todos los colores</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>amarillas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>blancas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>negras</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>transparentes</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>verdes</p></a></li>
						</ul>
					</div>
				</li>
			<!--	<li><a href="">Ofertas</a></li>
				<li><a href="">Más vendidos</a></li>-->
			</ul>
			<div class="right">
				<div class="enlaces">
					<ul>
						<li>
							<a href="" >Mi cuenta</a>
							<ul class="mega-menu">
								<li><a href="#">Mi cuenta</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Mis pedidos</a></li>
								<li><a href="#">Sigue tu pedido</a></li>
								<li><a href="#">Descuentos</a></li>
								<li><a href="#">Salir</a></li>
							</ul>						
						</li>
						<li>
							<a href="" >Contactar</a>
						</li>
					</ul>					
				</div>
				<form class="buscador" name="" id="" action="" method="post">
					<i class="fa icon-search"></i>
					<div class="container-buscador">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscador" /></i>
						</div>
						<button type="submit" class="btn btn-rojo">Buscar</button>
					</div>
				</form>
				<div class="carrito">
					<span class="cantidad">€ <span class="precio">240</span></span>
					<i class="fa icon-buy_off"></i>
				</div>
			</div>
		</div>
	</header>
	
	<div class="container-hero"> 
		<div class="carrusel-hero">
			<div class="item"></div>
			<div class="item"></div>
			<div class="item"></div>				
		</div>
		<div class="container-description">
			<p class="desde">Desde</p>
			<div class="carrusel-hero-titular">	
				<div class="item">	
					<div class="titular">
						<h3>Sofá Titular Uno</h3>
						<a href="">Ver producto </a>				
					</div>
				</div>
				<div class="item">	
					<div class="titular">
						<h3>Sofá Titular Dos</h3>
						<a href="">Ver producto </a>				
					</div>
				</div>
				<div class="item">	
					<div class="titular">
						<h3>Sofá Titular Tres</h3>
						<a href="">Ver producto </a>				
					</div>
				</div>
			</div>
			<div class="carrusel-hero-precio">	
				<div class="item">	
					<div class="precio">
						<p class="cantidad">€ <span>790</span> <span class="ud">ud</span></p>
					</div>	
				</div>
				<div class="item">	
					<div class="precio">
						<p class="cantidad">€ <span>850</span> <span class="ud">ud</span></p>
					</div>	
				</div>
				<div class="item">	
					<div class="precio">
						<p class="cantidad">€ <span>320</span> <span class="ud">ud</span></p>
					</div>	
				</div>
			</div>
		</div>
	</div> 
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por colores</h2>
	
	
					<div class="container-info" style="background-color: #ECECEC; padding: 30px; max-width: 1137px; margin: 20px auto;">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
						</div>
					</div>
	<div class="catalogo">
	<div class="container-catalogo">
		<div class="container">
			<div class="container-img">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Blancas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Amarillas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Rojas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Naranjas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Negras</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Grises</p>
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
	</div>
	
	<div class="container">
		<div class="titular-separador">
			<h2>Encuentra el mejor sofá para tu casa</h2>
		</div>
	</div>
	
	<div class="container-mas-vendidos bloque-destacados">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="titular">
						<h2>Los más vendidos</h2>
						<a href="" >Explorar</a>
					</div>
				</div>
				<div class="col-xs-12 col-md-9">
					<div class="carrusel-mas-vendidos carrusel productos">
						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>
												<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>

						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>
					</div>
				</div>
			</div>	
		</div>	
	</div>

	<div class="container-tapiceria">
		<div class="container">
			<div class="container-text">
				<h2>La tapicería perfecta</h2>
				<div class="description">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
				</div>
			</div>

			<div class="container-img">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="row">
							<div class="col-xs-6 col-sm-12">
								<div class="item">
									<img src="http://placehold.it/768x768/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
								</div>
							</div>
							<div class="col-xs-6 col-sm-12">
								<div class="item">
									<img src="http://placehold.it/768x768/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-8">
						<div class="item">
							<img src="http://placehold.it/768x768/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por colores</h2>
	
	
					<div class="container-info" style="background-color: #ECECEC; padding: 30px; max-width: 1137px; margin: 20px auto;">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
						</div>
					</div>
	<div class="catalogo">
	<div class="container-catalogo">
		<div class="container">
			<div class="container-img">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Blancas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Amarillas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Rojas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Naranjas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Negras</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Grises</p>
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
	</div>
	
	
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por características</h2>
	
	
					<div class="container-info" style="background-color: #ECECEC; padding: 30px; max-width: 1137px; margin: 20px auto;">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
						</div>
					</div>
	<div class="catalogo">
	<div class="container-catalogo">
		<div class="container">
			<div class="container-img">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Blancas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Amarillas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Rojas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Naranjas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Negras</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Grises</p>
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
	</div>
	
	
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por tipos</h2>
	
	
					<div class="container-info" style="background-color: #ECECEC; padding: 30px; max-width: 1137px; margin: 20px auto;">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
						</div>
					</div>
	<div class="catalogo">
	<div class="container-catalogo">
		<div class="container">
			<div class="container-img">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Blancas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Amarillas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Rojas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Naranjas</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Negras</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Verdes</p>
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<a href="" class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<p>Grises</p>
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
	</div>

	<div class="container-ofertas-destacadas bloque-destacados">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="titular">
						<h2>Ofertas destacadas</h2>
						<a href="" >Explorar</a>
					</div>
				</div>
				<div class="col-xs-12 col-md-9">
					<div class="carrusel-mas-vendidos carrusel productos">
						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>
						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>

						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>
					</div>
				</div>
			</div>	
		</div>	
	</div>

	<div class="carrusel-destacados">
		<div class="item">
			<div class="contenedor-img"></div>
			<div class="contenedor-info">
				<div class="titular">
					<h3>Sofá gris tela</h3>
				</div>
				<div class="description">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
				<div class="container-desde-precio">
					<div class="desde">
						<p>Desde</p>
					</div>
					<div class="precio">
						<p>€ 590 <span>ud</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="contenedor-img"></div>
			<div class="contenedor-info">
				<div class="titular">
					<h3>Titular producto 2</h3>
				</div>
				<div class="description">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
				<div class="container-desde-precio">
					<div class="desde">
						<p>Desde</p>
					</div>
					<div class="precio">
						<p>€ 590 <span>ud</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="contenedor-img"></div>
			<div class="contenedor-info">
				<div class="titular">
					<h3>Titular producto 3</h3>
				</div>
				<div class="description">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
				<div class="container-desde-precio">
					<div class="desde">
						<p>Desde</p>
					</div>
					<div class="precio">
						<p>€ 590 <span>ud</span></p>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="container-te-puede-interesar bloque-destacados">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="titular">
						<h2>Te puede interesar</h2>
						<a href="" >Explorar</a>
					</div>
				</div>
				<div class="col-xs-12 col-md-9">
					<div class="carrusel-mas-vendidos carrusel productos">
						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>
						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>

						<a class="item-prod">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
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
									</div>	
								</div>
							</div>		
						</a>
					</div>
				</div>			
			</div>	
		</div>	
	</div>
		
	<div class="container-otros">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<div class="container-img"></div>
					<div class="container-info">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Disfruta de todas nuestras ofertas y promociones</p>
						</div>
						<a class="enlace-line" href="">Descubrir</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="carrusel-ultima-semana">
						<div class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<div class="description">
								<p>Descubre lo último de esta semana</p>
							</div>
							<a class="enlace-line" href="">Descubrir</a>
						</div>
						<div class="item">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
							<div class="description">
								<p>Descubre lo último de esta semana</p>
							</div>
							<a class="enlace-line" href="">Descubrir</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
		
	<div class="container-otros-2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5">
					<div class="container-info">
						<div class="titular">
							<h3>Espacios acogedores </h3>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-3">
					<div class="container-img img-3">
						
					</div>
				</div>
				<div class="col-xs-12 col-sm-7 col-md-4 hidden-xs">
					<div class="container-img img-4">
						
					</div>
				</div>
			</div>
		</div>
	</div>	

	<div class="container">
		<div class="container-newsletter">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
					<div class="container-info">
						<div class="titular">
							<h3>Suscríbete a nuestra newsletter</h3>
						</div>
						<div class="description">
							<p>Introduce tu email para recibir las últimas ofertas</p>
						</div>
					</div>
					<form action="" method="" id="formulario-newsletter">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Mail*" />
						</div>
						<button type="submit" class="btn">OK</button>
					</form>
				</div>
			</div>
		</div>
	</div>	
			
	<footer>
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-logos">
						<a class="logo" href="" ><img src="_/images/sofas-48_negativo.png" alt="Sofas 48" title="Sofas 48" /></a>
						<div class="pago-seguro">
							<p>Sistema de pago seguro</p>
							<a href="" ><img class="img-responsive" src="_/images/pago_garantizado.png" alt="Pago garantizado" title="Pago garantizado" /></a>
							<a href="" ><img class="img-responsive" src="_/images/logo_confianza.png" alt="Confianza online" title="Confianza online" /></a>
							<a href="" ><img class="img-responsive" src="_/images/logo_visa.png" alt="Verified by visa" title="Verified by visa" /></a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-2 col-productos">
						<h3>Productos</h3>
						<ul>
							<li><a href="" >3 plazas</a></li>
							<li><a href="" >2 plazas</a></li>
							<li><a href="" >Conjunto 3+2</a></li>
							<li><a href="" >Chaiselongue</a></li>
							<li><a href="" >Rinconera</a></li>
							<li><a href="" >Sofá cama</a></li>
							<li><a href="" >sofá relax</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-2">
						<h3>Ofertas</h3>
						<ul>
							<li><a href="" >Oferta esta semana</a></li>
							<li><a href="" >Ofertas del mes</a></li>
							<li><a href="" >No te lo pierdas</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-2">
						<h3>Más vendidos</h3>
						<ul>
							<li><a href="" >Número 1</a></li>
							<li><a href="" >Más vendidos en primavera</a></li>
							<li><a href="" >Todos los clásicos</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-2">
						<h3>Corporativo</h3>
						<ul>
							<li><a href="" >Quienes somos</a></li>
							<li><a href="" >Guía de compra</a></li>
							<li><a href="" >Método de pago</a></li>
							<li><a href="" >Formas de envío</a></li>
							<li><a href="" >FAQ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="bottom-bar">
				<div class="copy">
					<p><span class="hidden-xs">Todos los derechos reservados</span>© 2017 - Sofas48</p>
				</div>
				<div class="legales">
					<ul>
						<li><a href="" >Aviso Legal</a></li>
						<li><a href="" >Política de Privacidad</a></li>
						<li><a href="" >Política de cookies</a></li>
						<li><a href="" >Términos y condiciones</a></li>
					</ul>
				</div>
				<div class="redes-sociales">
					<p>Síguenos en </p>
					<div class="iconos">
						<a href="" ><i class="fa icon-facebook"></i></a>
						<a href="" ><i class="fa icon-twitter"></i></a>
						<a href="" ><i class="fa icon-instagram"></i></a>						
					</div>

				</div>				
			</div>

		</div>
	</footer>
	
	<script src="./_/js/jquery-1.12.4.min.js"></script>
	<script src="./_/js/bootstrap.min.js"></script>
	<script src="./_/js/slick.min.js"></script>
	<script src="./_/js/main.js"></script>
	<script src="./_/js/placeholders.min.js"></script>
	
</body>
</html>