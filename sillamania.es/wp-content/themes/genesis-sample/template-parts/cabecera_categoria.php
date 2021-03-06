<body class="distribuidora">
	<?php $productos = menu_products_by_categoria(get_field("prestashop_id", $pos->ID ));  ?>
	<div class="container-fondo-carrito"></div>

<div class="block block-minicart empty ui-dialog-content ui-widget-content" id="ui-id-2">
    <div id="minicart-content-wrapper">
		<div class="block-content">
		    <button type="button" id="btn-minicart-close" class="action close">
		        <i class="fa icon-close"></i>
		    </button>
	
	        <div class="items-total">
	            <span class="count"><i class="fa icon-buy_on"><span>0</span></i></span>
	            <span>TU CESTA</span>
	        </div>
	        
			<div class="subtitle empty">
	            <h2>Tu cesta está vacía</h2>
	            <a class="enlace-line" href="">Ver catálogo de productos</a>
	        </div>
			<div class="bottom">
				<div class="subtotal">
				    <span class="label">
				        <span>Total</span>
				    </span>
					<div class="amount price-container">
				    	<span class="price-wrapper"><span class="price">€ 0</span></span>
					</div>
				</div>
		
		        <div class="actions">
		            <div class="primary">
		                <button class="action primary checkout btn btn-rojo">
		                    <span>Finalizar pedido</span>
		                </button>
		            </div>
		        </div>
		        <div class="pago-seguro-carrito">
		        	<div class="iconos">
			        	<i class="fa icon-paypal"></i>
		        		<i class="fa icon-visa"></i>
		        	</div>
		        	<span>Sistema de pago seguro</span>
		        </div>				
			</div>	    
		</div>
	</div>
</div>

<body class="distribuidora">

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
				<li><a href="" >Productos</a>
					<div class="mega-menu">
						<ul>
							<li><a class="ver-catalogo" href="" >Ver catálogo</a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>3 plazas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>2 plazas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>conjunto 3+2</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>chaiselongue</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" /><p>rinconera</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>sofá cama</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>sillones</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>butacas</p></a></li>
							<li><a href="" ><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>sofá relax</p></a></li>
						</ul>
					</div>
				</li>
				<li><a href="">Ofertas</a></li>
				<li><a href="">Más vendidos</a></li>
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