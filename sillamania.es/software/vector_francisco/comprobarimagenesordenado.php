<?php
define( 'WP_USE_THEMES',false );
require_once( './wp-load.php' );
	$que="SELECT * FROM  `temp_imagenes` where 1";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		if($row->img1!="" ) {
		$imgstot[$row->nido][$row->img1]=$row->img1;
		}
		if($row->img2!="" ) {
		$imgstot[$row->nido][$row->img2]=$row->img2;
		}
		if($row->img3!="" ) {
		$imgstot[$row->nido][$row->img3]=$row->img3;
		}
		if($row->img4!="" ) {
		$imgstot[$row->nido][$row->img4]=$row->img4;
		}
		if($row->img5!="" ) {
		$imgstot[$row->nido][$row->img5]=$row->img5;
		}
		if($row->img1!="" && !file_exists('./tempimagenes/'.$row->img1.'.jpg')) {
			//echo "<p>".$row->img1."</p>";
			$imgstot2[$row->nido][$row->img1]=$row->img1;
		}
		if($row->img2!="" && !file_exists('./tempimagenes/'.$row->img2.'.jpg')) {
			//echo "<p>".$row->img2."</p>";
			$imgstot2[$row->nido][$row->img2]=$row->img2;
		}
		if($row->img3!="" && !file_exists('./tempimagenes/'.$row->img3.'.jpg')) {
			//echo "<p>".$row->img3."</p>";
			$imgstot2[$row->nido][$row->img3]=$row->img3;
		}
		if($row->img4!="" && !file_exists('./tempimagenes/'.$row->img4.'.jpg')) {
			//echo "<p>".$row->img4."</p>";
			$imgstot2[$row->nido][$row->img4]=$row->img4;
		}
		if($row->img5!="" && !file_exists('./tempimagenes/'.$row->img5.'.jpg')) {
			//echo "<p>".$row->img5."</p>";
			$imgstot2[$row->nido][$row->img5]=$row->img5;
		}
	};
	if($_GET['nido']!="") {
		echo "<a href='http://promosillas.com/comprobarimagenes.php'>Volver</a>";
		echo "<table>";
		echo "<tr>";
		echo "<th>Imagenes</th>";
		echo "</tr>";
		foreach ($imgstot2[$_GET['nido']] as $valor) {
			echo "<tr>";
			echo "<td>".$valor."</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		$que="SELECT * FROM  `ps_category_lang` where id_category IN (SELECT distinct id_category FROM `ps_category_product`) AND id_lang=1";
		$sq = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($sq as $cat) {
			$que="SELECT * FROM `ps_category_product` a left join temp_nidos b on a.id_product=b.prestashop_id where a.id_category='".$cat->id_category."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$nidossel=NULL;
			foreach ($query as $row) {
				$nidossel[$row->nido]=$row->nido;
				$nidosseltot[$row->nido]=$row->nido;
			}
			echo "<h2>".$cat->name."</h2>";
			echo "<table>";
			echo "<tr>";
			echo "<th>Nido</th>";
			echo "<th>Pendientes</th>";
			echo "<th>Imagenes</th>";
			echo "</tr>";
			foreach ($imgstot as $nido=>$total) {
				if(in_array($nido,$nidossel)) {
				echo "<tr>";
				echo "<td><a href='http://promosillas.com/comprobarimagenes.php?nido=".$nido."'>".$nido."</a></td>";
				echo "<td>".count($imgstot2[$nido])."</td>";
				echo "<td>".count($total)."</td>";
				echo "</tr>";
				};
			}
			echo "</table>";
		};
			echo "<h2>Sin asociar</h2>";
			echo "<table>";
			echo "<tr>";
			echo "<th>Nido</th>";
			echo "<th>Pendientes</th>";
			echo "<th>Imagenes</th>";
			echo "</tr>";
			foreach ($imgstot as $nido=>$total) {
				if(!in_array($nido,$nidosseltot)) {
				echo "<tr>";
				echo "<td><a href='http://promosillas.com/comprobarimagenes.php?nido=".$nido."'>".$nido."</a></td>";
				echo "<td>".count($imgstot2[$nido])."</td>";
				echo "<td>".count($total)."</td>";
				echo "</tr>";
				};
			}
			echo "</table>";
	};
	//echo "<p>Faltan ".count($imgstot2)." imagenes de ".count($imgstot)."</p>";