<?php
define( 'WP_USE_THEMES',false );
require_once( './wp-load.php' );
	$nido=$_GET['nido'];
	$id_product=$_GET['id_product'];
	if($nido=="" || $id_product=="") {
		echo "<p>Faltan datos</p>";
		exit;
	}
	$que="SELECT * FROM  `temp_imagenes` where nido='".$nido."'";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$imgstot=NULL;
		$imgstot2=NULL;
		$kk=0;
		if($row->img1!="" ) {
			$kk=$kk+1;
		$imgstot[$row->img1]=$row->img1;
		}
		if($row->img2!="" ) {
			$kk=$kk+1;
		$imgstot[$row->img2]=$row->img2;
		}
		if($row->img3!="" ) {
			$kk=$kk+1;
		$imgstot[$row->img3]=$row->img3;
		}
		if($row->img4!="" ) {
			$kk=$kk+1;
		$imgstot[$row->img4]=$row->img4;
		}
		if($row->img5!="" ) {
			$kk=$kk+1;
		$imgstot[$row->img5]=$row->img5;
		}
		if($row->img1!="" && file_exists('./tempimagenes/'.$row->img1.'.jpg')) {
			$kk=$kk-1;
			//echo "<p>".$row->img1."</p>";
			$imgstot2[$row->img1]=$row->img1;
		}
		if($row->img2!="" && file_exists('./tempimagenes/'.$row->img2.'.jpg')) {
			$kk=$kk-1;
			//echo "<p>".$row->img2."</p>";
			$imgstot2[$row->img2]=$row->img2;
		}
		if($row->img3!="" && file_exists('./tempimagenes/'.$row->img3.'.jpg')) {
			$kk=$kk-1;
			//echo "<p>".$row->img3."</p>";
			$imgstot2[$row->img3]=$row->img3;
		}
		if($row->img4!="" && file_exists('./tempimagenes/'.$row->img4.'.jpg')) {
			$kk=$kk-1;
			//echo "<p>".$row->img4."</p>";
			$imgstot2[$row->img4]=$row->img4;
		}
		if($row->img5!="" && file_exists('./tempimagenes/'.$row->img5.'.jpg')) {
			$kk=$kk-1;
			//echo "<p>".$row->img5."</p>";
			$imgstot2[$row->img5]=$row->img5;
		}
		if($kk==0) {
			$insertar[$row->referencia]=$row;
			$imagenes[$row->img1]=$row->img1;
			$imagenes[$row->img2]=$row->img2;
			$imagenes[$row->img3]=$row->img3;
			$imagenes[$row->img4]=$row->img4;
			$imagenes[$row->img5]=$row->img5;
			print_r($imgstot2);
		} else {
			echo "<p>Faltan</p>";exit;
		}
	};
		echo "<p>Iniciando insert de ".$nido."</p>";
		$kk=0;
		$cover=1;
		$idimg=0;
		$que="SELECT MAX(id_image) as maxid from ps_image";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($query as $row) {
			$idimg=$row->maxid;
		}
		foreach ($imagenes as $img) {
			$idimg=$idimg+1;
			$caract = str_split($idimg);
			//Crear carpetas
			$base="./tiendaonline/img/p/";
			foreach ($caract as $c) {
				$base.=$c.'/';
				//echo "<p>creando ".$base."</p>";
				if (!file_exists($base)) {
					mkdir($base, 0777, true);
					echo "<p>".$base." Creado</p>";
				}
			};
			$file = './tempimagenes/'.$img.'.jpg';
			$newfile = './tiendaonline/img/p/'.implode('/',$caract).'/'.$idimg.'.jpg';
			if (!copy($file, $newfile)) {
				echo "<p>ha fallado crear imagen ".$idimg." ".$img."</p>";
			} else {
				if($cover==1) {
				$que="INSERT INTO `ps_image`(`id_image`,`id_product`, `position`, `cover`) VALUES ('".$idimg."','".$id_product."','".$kk."','".$cover."')";
				} else {
				$que="INSERT INTO `ps_image`(`id_image`,`id_product`, `position`) VALUES ('".$idimg."','".$id_product."','".$kk."')";
				}
				$insert = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				if($cover==1) {
				$que="INSERT INTO `ps_image_shop`(`id_product`, `id_image`, `id_shop`, `cover`) VALUES ('".$id_product."','".$idimg."','1','".$cover."')";
				} else {
				$que="INSERT INTO `ps_image_shop`(`id_product`, `id_image`, `id_shop`) VALUES ('".$id_product."','".$idimg."','1')";
				}
				$insert = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				$que="INSERT INTO `ps_image_lang`(`id_image`, `id_lang`, `legend`) VALUES ('".$idimg."','1','')";
				$insert = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				$que="INSERT INTO `temp_imagenes_insertadas`(`imagen`, `id_imagen`) VALUES ('".$img."','".$idimg."')";
				$insert = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				echo "<p>Imagen ".$idimg." ".$img." Insertada correctamente</p>";
			}
			$kk=$kk+1;
			$cover="";
		}
		echo "<p>Asociando imágenes a refrencias de ".$nido."</p>";
		foreach ($insertar as $row) {
			$id_product_attribute=NULL;
			$que="SELECT `id_product_attribute` FROM `ps_product_attribute` WHERE reference='".$row->referencia."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			foreach ($query as $row2) {
				$id_product_attribute=$row2->id_product_attribute;
			};
			if($id_product_attribute!="") {
				$que="SELECT * FROM temp_imagenes_insertadas WHERE imagen IN ('".$row->img1."','".$row->img2."','".$row->img3."','".$row->img4."','".$row->img5."')";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				foreach ($query as $row2) {
					$idimg=$row2->id_imagen;
					$que="INSERT INTO `ps_product_attribute_image`(`id_product_attribute`, `id_image`) VALUES ('".$id_product_attribute."','".$idimg."')";
					echo "<p>".$que."</p>";
					$insert = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				}
			};
		}
		//Crear registro imagen ps_image, lang, shop
		//Guardar registro en temp_imagenes_insertadas
		//crear carpeta nueva si no existe
		//Mover imagen a carpeta nueva
		//Borrar img vieja
		//
		//Asociar imagenes a combinaciones
	//echo "<p>Faltan ".count($imgstot2)." imagenes de ".count($imgstot)."</p>";