<?php get_header(); ?>

<body class="home">
	
	<?php get_template_part( "template-parts/cabecera_home"); ?>
	
	<?php echo do_shortcode("[image-carousel category='grupo1']"); ?>
	
	<?php 
	$args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '2943',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args); 
	//print_r($pages);
	$shortcodes = $pages[0]->post_content;
	//print_r($shortcodes);
	$data = explode('[',rtrim($shortcodes, ')'));
	$data1 = array_shift($data);
	$contador = 0;
	$vector_funciones = array();
	foreach($data as $value){
		//echo "el value vale: ".$value."<br>";
		$temp = str_replace("]","",$value);
		array_push($vector_funciones,$temp);
		$data[$contador] = str_replace("]", '', $value);
		$data[$contador] = substr($data[$contador], 0, -2);
		$shortcode = '['.$data[$contador].']';
		//$shortcode = "".$shortcode.""; 
		// "%'.$regions.'%"
		//"<p class=\"blue\">";
		//echo "El shortcode vale: ".$shortcode."<br>";
		//echo do_shortcode("$shortcode");
		$contador++;
	}
	foreach($vector_funciones as $funcion){
		$funcion_llamada = trim($funcion); 
		//echo "la funcion llamada es: ".$funcion_llamada."<br>";
		//$funcion_llamada();
	}
	//print_r($vector_funciones);
	
	//genesis();
	
	?>

	
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

	<?php // print_r($categorias); ?>

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
					
				</div>
			</div>	
		</div>
	</div>
	</div>
	

	<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;"><?php echo $categorias[217]; ?></h2>
					
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
					
				</div>
			</div>	
		</div>
	</div>
	</div>
	
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