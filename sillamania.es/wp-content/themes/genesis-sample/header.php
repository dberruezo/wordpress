﻿<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

do_action( 'genesis_doctype' );
do_action( 'genesis_title' );
do_action( 'genesis_meta' );

wp_head(); // We need this for plugins.
?>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri();?>/css/styles.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/ie.css" />
	<![endif]-->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/placeholders.min.js"></script>
	
</head>
<?php
genesis_markup( array(
	'open'   => '<body %s>',
	'context' => 'body',
) );
do_action( 'genesis_before' );

genesis_markup( array(
	'open'   => '<div %s>',
	'context' => 'site-container',
) );

?>

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
			}, 3000);
		}
	</script>';

if (!$_SESSION['modal']){
	$_SESSION['modal']  = 'inicial'; 
	echo '<script>jQuery(document).ready(function() {load_modal_window()})</script>';
}
?>

<div class="top-bar">
	<div class="inicio-sesion">
		<p>Descubre los mejores descuentos en Sillamanía! <a href="">Entra y disfruta</a></p>
	</div>
	<div class="info-extra">
		<ul>
			<li><i class="far fa-check-square"></i>Devolución 14 días</li>
			<li><i class="fas fa-shipping-fast"></i>Envío gratis</li>
			<li><i class="far fa-list-alt"></i>Garantía 2 años</li>
			<li><i class="far fa-star"></i>Productos en stock</li>
		</ul>
	</div>
	<i class="fa icon-close"></i>
</div>
<div class="menucontainer <?php if (is_admin_bar_showing()) {?>navbar<?php };?> clearfix">
<div style="position:relative;max-width:1200px;margin:0 auto;">
<a class="logosticky" style="display:none;" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="Tienda de Muebles"><img class="logolat" alt="Tienda de Muebles" title="Tienda de Muebles" src="<?php echo get_site_url();?>/wp-content/uploads/2018/03/cropped-logo-1.jpg" style="float: left;width: 52px;border-radius: 30px;"></a>
<ul class="topnav" id="myTopnav">
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
</div>
</div>
  <div id="myTopbutton" class="wprmenu_icon" onclick="responsivemenu();"> <span class="wprmenu_ic_1"></span> <span class="wprmenu_ic_2"></span> <span class="wprmenu_ic_3"></span></div>
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
<?php
	genesis_markup( array(
		'open'   => '<div %s>',
		'context' => 'site-inner',
	) );
	genesis_structural_wrap( 'site-inner' );
?>