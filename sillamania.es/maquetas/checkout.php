
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

<body>	
	<header class="checkout-cabecera">
		<a class="logo" href="" ><img src="_/images/sofas48.png" alt="Alt de la imagen" title="Titulo de la imagen" /></a>
	</header>
	
	<div class="checkout-body">
		<div class="container">
			<form name="" id="" action="" method="post">
				
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<div class="step datos-personales">
							<div class="titular">
								<p>Datos personales</p>
							</div>
	
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#soy-cliente" aria-controls="soy-cliente" role="tab" data-toggle="tab">Ya soy cliente</a></li>
								<li role="presentation"><a href="#soy-nuevo" aria-controls="soy-nuevo" role="tab" data-toggle="tab">Soy nuevo</a></li>
							</ul>
						
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="soy-cliente">
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Email@email.com" />
									</div>
									<div class="form-group password">
										<input type="password" class="form-control" placeholder="Contraseña" />
									</div>
									
									<div class="form-group pass-olvidada">
										<a href="#">¿Olvidaste tu contraseña?</a>
									</div>
									<a href="#" class="btn btn-borde-rojo ">Entrar</a>
								</div>
								<div role="tabpanel" class="tab-pane" id="soy-nuevo">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Nombre" />
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Apellidos" />
									</div>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Email@email.com" />
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Dirección" />
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Ciudad" />
									</div>
									<div class="form-group">	
										<div class="contenedorPluguinSelect">
											<select name="" id="" class="selectpicker">
												<option value="">Seleccione Provincia</option>
												<option value="opcion 1">Opción 1</option>
												<option value="opcion 2">Opción 2</option>
												<option value="opcion 3">Opción 3</option>
											</select>
										</div>						
									</div>
									<div class="form-group">	
										<div class="contenedorPluguinSelect">
											<select name="" id="" class="selectpicker">
												<option value="">Seleccione Pais</option>
												<option value="opcion 1">Opción 1</option>
												<option value="opcion 2">Opción 2</option>
												<option value="opcion 3">Opción 3</option>
											</select>
										</div>							
									</div>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Código Postal" />
									</div>
									<div class="form-group ">
										<input type="password" class="form-control" placeholder="Contraseña" />
									</div>	
									<div class="checkbox title-factura">
				                        <input class="styled" type="checkbox" id="factura" name="factura" data-target="factura" />
				                        <label class="text-legal" for="factura">¿Quieres factura?</label>
				                    </div>
									<div class="factura collapse">
										<h3>Factura</h3>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Nombre / Empresa" />
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="DNI / CIF" />
										</div>
									</div>
									<p class="obligatorio">* Campos obligatorios</p>										
								</div>								
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="step pago-y-envio">
							<div class="titular">
								<p>Pago y envío</p>
							</div>
							<h3>Método de envío</h3>
							<div class="metodo-envio">
								<div class="radio">
			                        <input type="radio" name="radio1" id="radio1" value="" />
			                        <label for="radio1">Envío standard (3 días)</label>
			                    </div>
			                    <div class="radio">
			                        <input type="radio" name="radio1" id="radio2" value="" />
			                        <label for="radio2">Recogida en tienda (gratis)</label>
			                    </div>
							</div>
							
							<h3>Método de pago</h3>
							<div class="metodo-pago">
								<div class="radio visa">
			                        <input type="radio" name="radio2" id="radio3" value="" />
			                        <label for="radio3"><i class="fa icon-visa"></i>Tarjeta bancaria</label>
			                    </div>
			                    <div class="radio paypal">
			                        <input type="radio" name="radio2" id="radio4" value="" />
			                        <label for="radio4"><i class="fa icon-paypal"></i>Paypal</label>
			                    </div>
			                    <div class="radio transferencia">
			                        <input type="radio" name="radio2" id="radio5" value="" />
			                        <label for="radio5">Transferencia bancaria</label>
			                    </div>
			                </div>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="step resumen-pedido">
							<div class="titular">
								<p>Resumen del pedido</p>
							</div>
							<h3>Tu cesta</h3>
							<div class="cesta">
								<div class="item-cesta">
									<img src="http://placehold.it/200x120/F9F9F9" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
									<div class="info">
										<p class="nombre">Sofá 3 plazas</p>
										<p class="precio">€ 320 <span>ud</span><p>
									</div>
								</div>
								<div class="item-cesta">
									<img src="http://placehold.it/200x120/F9F9F9" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />
									<div class="info">
										<p class="descuento">40%</p>
										<p class="nombre">Sofá 2 plazas</p>
										<p class="precio">€ 320 <span>ud</span><p>
									</div>
								</div>
							</div>
							
							<div class="codigo-promocional">
								<div class="form-group">
									<p>Código promocional</p>
									<div class="container-codigo-promocional">
										<input type="text" class="form-control" name="" id="" placeholder="Escribe tu código" />
									</div>
								</div>
							</div>	
							
							<div class="resumen-precio">
								<p class="subtotal">Subtotal <span>130 EUR </span></p>
								<p class="envio">Envío <span>4,99 EUR </span></p>
								<p class="precio-total precio">Total <span>246€</span></p>
							</div>
							
							<div class="finalizar">
								<div class="checkbox">
			                        <input id="checkbox3" class="styled" type="checkbox" />
			                        <label class="text-legal" for="checkbox3">
			                            He leido y acepto las condiciones
			                        </label>
			                    </div>
								<a href="#" class="btn btn-rojo btn-block">Tramitar pedido</a>
							</div>		
									
						</div>
					</div>	
				</div>
			</form>	
		</div>
	</div>	




	
	<script src="_/js/jquery-1.12.4.min.js"></script>
	<script src="_/js/bootstrap.min.js"></script>
	<script src="_/js/bootstrap-select.min.js"></script>
	<script src="_/js/slick.min.js"></script>
	<script src="_/js/main.js"></script>
	<script src="_/js/checkout.js"></script>
	<script src="_/js/placeholders.min.js"></script>
	
</body>
</html>