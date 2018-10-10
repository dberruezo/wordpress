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

		<!-- Menu alternativo RESPONSIVE boton redondo -->
		<ul class="topnav" id="myTopnav" style="display:none;">
			<li class="subtop">
				<a style="padding: 0; font-size: 17px;" href="<?php echo get_site_url();?>/">
				<img src="<?php echo get_site_url();?>/wp-content/uploads/sofas48.png" alt="Sillamanía" title="Sillamanía" />
				</a>
			</li>
			<li class="subtop"><span style="color:red;">% Ofertas</span>
			</li>
			<li class="subtop"><span>Productos</span>
				<ul class="sub-menu row">
				<?php echo menupilar('productos');?>
				</ul>
			</li>
			<li class="subtop"><span>Más vendidos</span>
			</li>
			<li class="fright" onclick="carrito();$('.carritocontainer').show();">
				<i class="fas fa-shopping-cart"></i>
			</li>
			<li class="fright">
				<i class="far fa-envelope"></i>
			</li>
			<li class="fright">
				<i class="far fa-user"></i>
			</li>
		</ul>

		<div id="myTopbutton" class="wprmenu_icon" onclick="responsivemenu();"> 
		<span class="wprmenu_ic_1"></span> 
		<span class="wprmenu_ic_2"></span> 
		<span class="wprmenu_ic_3"></span>
		</div>
		
		<!--
		<div class="slider">
			<img src="http://placehold.it/1920x480/bcbcbc" class="" alt="" title="">
			<ul class="sliderdots" style="display: block;">
				<li class="slide active"></li>
				<li class="slide"></li>
				<li class="slide"></li>
				<li class="slide"></li>
				<li class="slide"></li>
			</ul>
		</div>
		-->	

		<!-- Fin de menu alternativo RESPONSIVE boton redondo -->

	</header>