<?php
ini_set('display_errors', 'On');
error_reporting(E_ERROR);

define( 'WP_USE_THEMES',false );
require_once( './wp-load.php' );

$mydb2 = new wpdb('sillamania0','Ofiprix2018','sillamaniaes_dos','localhost');
$mydb = new wpdb('dicorops2','Dicoroweb2011','dicorops2','localhost');

/*
$que="SELECT `id_product`,0 as combi, reference FROM `ps_product` WHERE `reference`!='' UNION SELECT `id_product`,`id_product_attribute`,`reference` FROM `ps_product_attribute` WHERE `reference`!=''";
	$query = $mydb2->get_results( $que, OBJECT );
print_r($query);
*/
$references = array();
array_push($references,00026100000001);
/*
array_push($references,00026100000006);
array_push($references,00026000000652);
array_push($references,00026100000010);
array_push($references,00026100000012);
array_push($references,00026100000013);
array_push($references,00026100000014);
array_push($references,00026000000554);
array_push($references,00026000000556);
array_push($references,00026000000551);
array_push($references,00026000000553);
array_push($references,00026100000018);
array_push($references,00026100000020);
array_push($references,00026100000021);
array_push($references,00026100000029);
array_push($references,00026100000030);
array_push($references,00026100000034);
array_push($references,00026000000591);
array_push($references,00026000000597);
array_push($references,00026000000663);
array_push($references,00026000000609);
array_push($references,00026000000608);
array_push($references,00026000000664);
array_push($references,00026000000611);
array_push($references,00026000000617);
array_push($references,00026000000612);
array_push($references,00026000000613);
array_push($references,00026000000616);
array_push($references,00026000000660);
array_push($references,00026000000662);
array_push($references,00026000000657);
array_push($references,00026000000659);
array_push($references,00026100000035);
array_push($references,00026100000039);
array_push($references,00026000000653);
array_push($references,00026100000040);
array_push($references,00026100000041);
array_push($references,00026100000043);
array_push($references,00026100000044);
array_push($references,00026000000636);
array_push($references,00026100000045);
array_push($references,00026100000046);
array_push($references,00026000000606);
array_push($references,00026000000603);
array_push($references,00026100000056);
array_push($references,00026100000042);
array_push($references,00026000000649);
array_push($references,00026100000057);
array_push($references,00026100000059);
array_push($references,00026100000064);
array_push($references,00026100000065);
array_push($references,00026100000070);
array_push($references,00026000000639);
array_push($references,00026000000640);
array_push($references,00026000000643);
array_push($references,00026000000582);
array_push($references,00026001000025);
array_push($references,00026001000026);
array_push($references,00026000000583);
array_push($references,00026000000584);
array_push($references,00026000000587);
array_push($references,00026000000588);
array_push($references,00026000000644);
array_push($references,00026000000648);
array_push($references,00026100000071);
array_push($references,00026100000072);
array_push($references,00026000000646);
array_push($references,00026000000637);
array_push($references,00026000000647);
array_push($references,00026000000618);
array_push($references,00026000000619);
array_push($references,00026000000620);
array_push($references,00026000000669);
array_push($references,00026000000670);
array_push($references,00026000000567);
array_push($references,00026000000561);
array_push($references,00026000000683);
array_push($references,00026000000525);
array_push($references,00026000000785);
array_push($references,00026000000769);
array_push($references,00026000000797);
array_push($references,00026000000798);
array_push($references,00026000000768);
array_push($references,00026000000675);
array_push($references,00026000000579);
array_push($references,00026000000784);
array_push($references,00026000000531);
array_push($references,00026000000530);
array_push($references,00026000000528);
array_push($references,00026000000529);
array_push($references,00026100000079);
array_push($references,00026100000083);
array_push($references,00026100000084);
array_push($references,00026000000645);
array_push($references,00026100000087);
array_push($references,00026100000102);
array_push($references,00026100000109);
array_push($references,00026000000506);
array_push($references,00026000000518);
array_push($references,00026001000051);
array_push($references,00026001000054);
array_push($references,00026001000057);
array_push($references,00026000000521);
array_push($references,00026001000022);
array_push($references,00026001000027);
array_push($references,00026001000032);
array_push($references,00026001000036);
array_push($references,00026001000039);
array_push($references,00026001000042);
array_push($references,00026001000044);
array_push($references,00009001000009);
array_push($references,00026000000012);
array_push($references,00026000000041);
array_push($references,00008007000000);
array_push($references,00008001000014);
array_push($references,00008001000033);
array_push($references,00008001010000);
array_push($references,00089001000005);
array_push($references,00089002000003);
array_push($references,00066001000007);
array_push($references,00026700000000);
array_push($references,00006008050000);
array_push($references,00006009060000);
array_push($references,00103000000008);
array_push($references,00102000000006);
array_push($references,00102000000010);
array_push($references,00026000000352);
array_push($references,00026000000355);
array_push($references,00026000000358);
array_push($references,00026000000361);
array_push($references,00011008020000);
array_push($references,00011000000018);
array_push($references,00011009050001);
array_push($references,00011000000020);
array_push($references,00100000000009);
array_push($references,00100000000012);
array_push($references,00100000000014);
array_push($references,00100000000015);
array_push($references,00100000000016);
array_push($references,00100000000017);
array_push($references,00008000000005);
array_push($references,00008000000010);
array_push($references,00008000000011);
array_push($references,00009001000000);
array_push($references,00009000000004);
array_push($references,00009001000007);
array_push($references,00009001000021);
array_push($references,00009000000005);
array_push($references,00009000000007);
array_push($references,00009000000010);
array_push($references,00009001000005);
array_push($references,00009013000002);
array_push($references,00009000000013);
array_push($references,00009000000014);
array_push($references,00009001000016);
array_push($references,00009001000020);
array_push($references,00026057000003);
array_push($references,00026057000008);
array_push($references,00101000000027);
array_push($references,00006002010000);
array_push($references,00006003040000);
array_push($references,00006000000005);
array_push($references,00006000000008);
array_push($references,00089002000007);
array_push($references,00089002000008);
array_push($references,00009001000028);
array_push($references,00009001000030);
array_push($references,00009001000034);
array_push($references,00009001000035);
array_push($references,00026000000514);
array_push($references,00026000000513);
array_push($references,00026000000512);
array_push($references,00026000000800);
array_push($references,00026000000802);
array_push($references,00026000000804);
array_push($references,00026000000806);
array_push($references,00026000000807);
array_push($references,00026000000808);
*/


foreach ($references as $reference) {
	$que="SELECT `id_product`,0 as combi, reference FROM `ps_product` WHERE `reference` LIKE '%".$reference."' UNION SELECT `id_product`,`id_product_attribute`,`reference` FROM `ps_product_attribute` WHERE `reference` LIKE '%".$reference."'";
	$query2 = $mydb->get_results( $que, OBJECT );
	foreach ($query2 as $row2) {
		echo "<p>Match ".$reference." con ".$row2->id_product."</p>";
		$que="SELECT * from ps_image a left join ps_image_lang b on a.id_image=b.id_image and b.id_lang=1 where id_product='".$row2->id_product."'";
		$query3 = $mydb->get_results( $que, OBJECT );
		foreach ($query3 as $row3) {
			$row3->url="http://promosillas.com/tiendaonline/img/p/".implode('/',str_split($row3->id_image))."/".$row3->id_image.".jpg";
			print_r($row3);
		};
	};
}
