<?php get_header(); ?>

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
						<button type="button" id="cerrarCookies" class="btn btn-borde-rojo">Aceptar cookies</button>
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
				<a class="logo" href="" ><img src="<?php echo get_template_directory_uri(); ?>/images_maquetas/sofas48.png" alt="" title="Titulo de la imagen" /></a>
				<i class="fa icon-menu"></i>
				<i class="fa icon-close"></i>				
			</div>
			
			<?php echo menupilar_menu('productos');?>

			<!--
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
				
				
				<li><a href="">Ofertas</a></li>
				<li><a href="">Más vendidos</a></li>
				

			</ul>
			-->

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
	
	<?php echo do_shortcode("[image-carousel]"); ?>

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
	
	<?php $categorias    = categorias_raiz(); ?>
	<?php $subcategorias = subcategorias_raiz(); ?>
	<?php $destacadas    = categorias_destacadas_home(); ?>

	<?php print_r($categorias); ?>

	<!-- <h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por colores</h2> -->
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;"><?php echo $categorias[233]; ?></h2>
	
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
						<?php //print_r($subcategorias[233]); ?>
						<?php 
							foreach($subcategorias[233] as $sub){
								foreach($sub as $clave =>$cat_name){  
									$str = '<div class="col-xs-12 col-sm-6 col-md-3">';
										$str.= '<a href="" class="item">';
										$str.= '<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
										$str.= '<p>'.$cat_name.'</p>';
										$str.= '</a>';
									$str.= '</div>';
									echo $str;		
								}	
							}
						?>

						<!--
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
						-->
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
	
							
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;"><?php echo $categorias[233]; ?></h2>
						
	<!-- <h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por colores</h2>-->
	
	
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
				<?php //print_r($subcategorias[233]); ?>
				<?php 
					foreach($subcategorias[233] as $sub){
						foreach($sub as $clave =>$cat_name){  
							$str = '<div class="col-xs-12 col-sm-6 col-md-3">';
								$str.= '<a href="" class="item">';
								$str.= '<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
								$str.= '<p>'.$cat_name.'</p>';
								$str.= '</a>';
							$str.= '</div>';
							echo $str;		
						}	
					}
				?>
					<!--
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
					-->
				</div>
			</div>	
		</div>
	</div>
	</div>
	

	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;"><?php echo $categorias[217]; ?></h2>
				
	<!-- <h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por características</h2> -->
	
	
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
				<?php 
					foreach($subcategorias[217] as $sub){
						foreach($sub as $clave =>$cat_name){  
							$str = '<div class="col-xs-12 col-sm-6 col-md-3">';
								$str.= '<a href="" class="item">';
								$str.= '<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
								$str.= '<p>'.$cat_name.'</p>';
								$str.= '</a>';
							$str.= '</div>';
							echo $str;		
						}	
					}
				?>	
					<!--
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
					-->
				</div>
			</div>	
		</div>
	</div>
	</div>
	
	
	<!-- <h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">Sillas por tipos</h2> -->
	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;"><?php echo $categorias[240]; ?></h2>
				

	
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
				<?php 
					foreach($subcategorias[240] as $sub){
						foreach($sub as $clave =>$cat_name){  
							$str = '<div class="col-xs-12 col-sm-6 col-md-3">';
								$str.= '<a href="" class="item">';
								$str.= '<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
								$str.= '<p>'.$cat_name.'</p>';
								$str.= '</a>';
							$str.= '</div>';
							echo $str;		
						}	
					}
				?>
					<!--
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
					-->
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
<?php get_footer(); ?>