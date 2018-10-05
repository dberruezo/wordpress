<?php
define( 'WP_USE_THEMES',false );
require_once( './wp-load.php' );
	function creadordeurl($kw) {
		$kw=strtolower($kw);
		$kw=explode('/',$kw);
		$kw=$kw[0];
		$kw=str_replace('Á','a',str_replace('É','e',str_replace('Í','i',str_replace('Ó','o',str_replace('Ú','u',str_replace('Ñ','n',str_replace('á','a',str_replace('é','e',str_replace('í','i',str_replace('ó','o',str_replace('ú','u',str_replace('ñ','n',str_replace(' ','-',$kw)))))))))))));
		return $kw;
	}
	$reservados[]="Nombre";
	$reservados[]="Default";
	$reservados[]="Ancho";
	$reservados[]="Alto";
	$reservados[]="Fondo";
	$reservados[]="Peso";
$lascats[84]='Almohadas';
$lascats[85]='Aparadores';
$lascats[86]='Armarios Corredera';
$lascats[87]='Armarios de Puerta Batiente';
$lascats[88]='Armarios de Juvenil';
$lascats[89]='Armarios vestidor';
$lascats[90]='Camas abatibles';
$lascats[91]='Camas articuladas';
$lascats[92]='Camas dormitorio';
$lascats[93]='Camas juveniles';
$lascats[94]='Camas tren';
$lascats[95]='Canapes y bases tapizadas';
$lascats[96]='Colchones alta gama';
$lascats[97]='Colchones baratos';
$lascats[98]='Colchones de muelles';
$lascats[99]='Colchones espumacion';
$lascats[100]='Colchones juvenil';
$lascats[101]='Colchones terapeuticos';
$lascats[102]='Colchones viscolastica';
$lascats[103]='Comodas y sinfonieres';
$lascats[104]='Conjunto 3+2';
$lascats[105]='Dormitorios completos';
$lascats[106]='Espejos';
$lascats[107]='Estanterias juvenil';
$lascats[108]='Juveniles completos';
$lascats[109]='Literas';
$lascats[110]='Mesas auxiliares';
$lascats[111]='Mesas de centro';
$lascats[112]='Mesas de cocina';
$lascats[113]='Mesas de comedor';
$lascats[114]='Mesitas dormitorio';
$lascats[115]='Muebles dormitorio juvenil';
$lascats[116]='Muebles tv';
$lascats[117]='Salones comedor';
$lascats[118]='Sillas cocina';
$lascats[119]='Sillas comedor';
$lascats[120]='Sillones y butacas';
$lascats[121]='Sofas 2 plazas';
$lascats[122]='Sofas 3 plazas';
$lascats[123]='Sofas cama';
$lascats[124]='Sofas chaiselongue';
$lascats[125]='Sofas relax';
$lascats[126]='Sofas rinconera';
$lascats[127]='Somieres';
$lascats[128]='Taburetes';
$lascats[129]='Vitrinas';
$lascats[130]='Zapateros';
$lascats[131]='Zapateros y estanterias';

$categorias['THERAPYINTENSE'][]='102';
$categorias['THERAPY'][]='102';
$categorias['ERGOSMEMORY'][]='102';
$categorias['ERGOOSSENSE'][]='102';
$categorias['KID21'][]='102';
$categorias['KID16'][]='102';
$categorias['ERGOS POCKET'][]='98';
$categorias['ERGOSVISCOLASTIC'][]='102';
$categorias['ERGOSVISCOBOX'][]='102';
$categorias['THERAPYPOCKET'][]='98';
$categorias['THERAPYSPORT'][]='102';
$categorias['BEDPURE NATURE'][]='98';
$categorias['BEDPURE NATURE EXCLUSIVE'][]='98';
$categorias['ERGOS LUXE'][]='98';
$categorias['ERGOSADAPT'][]='98';
$categorias['MESA URBAN'][]='113';
$categorias['MESA COMEDOR HERMES'][]='113';
$categorias['MESA FLY'][]='113';
$categorias['NATURE MESA'][]='113';
$categorias['NADIA'][]='113';
$categorias['BERTA'][]='113';
$categorias['CHROME'][]='113';
$categorias['LIGHT'][]='113';
$categorias['PADOVA'][]='113';
$categorias['TANIA'][]='113';
$categorias['CONSOLA'][]='113';
$categorias['MONTREAL'][]='113';
$categorias['QUEBEC'][]='113';
$categorias['ELEGANT 180'][]='113';
$categorias['ELEGANT 180 LACADO'][]='113';
$categorias['ELEGANT 140'][]='113';
$categorias['ELEGAN 140 LACADO'][]='113';
$categorias['MYKONOS'][]='113';
$categorias['BERLIN 90'][]='113';
$categorias['BERLIN 120'][]='113';
$categorias['LINK'][]='113';
$categorias['MESA EXTENSIBLE DUO'][]='113';
$categorias['MESA CUBIKA EXTENSIBLE'][]='113';
$categorias['MESA EXTENSIBLE TREND 90'][]='113';
$categorias['MESA EXTENSIBLE 140'][]='113';
$categorias['CAROLINE'][]='119';
$categorias['AURIA'][]='119';
$categorias['AURIA MADERA'][]='119';
$categorias['WITNEY'][]='119';
$categorias['SOFIA NEGRA'][]='119';
$categorias['SOFIA CROMO'][]='119';
$categorias['NORDIC MADERA'][]='119';
$categorias['NORDIC METAL'][]='119';
$categorias['VICTORIA'][]='119';
$categorias['JASON'][]='119';
$categorias['DIVA'][]='119';
$categorias['ZETA'][]='119';
$categorias['MAYA'][]='119';
$categorias['STELLA'][]='119';
$categorias['CLOE'][]='119';
$categorias['NANCY'][]='119';
$categorias['ELENA'][]='119';
$categorias['OMEGA 1P'][]='125';
$categorias['DELTA 1P'][]='125';
$categorias['DENIS'][]='125';
$categorias['MADISON 1P'][]='125';
$categorias['OMEGA 2P'][]='125';
$categorias['DELTA 2P'][]='125';
$categorias['ERGO 2P'][]='125';
$categorias['MADISON 2P'][]='125';
$categorias['OMEGA 3P'][]='125';
$categorias['DELTA 3P'][]='125';
$categorias['ERGO 3P'][]='125';
$categorias['MADISON 3P'][]='125';
$categorias['ALBA 315'][]='126';
$categorias['ALBA 345'][]='126';
$categorias['DIESIS 260'][]='124';
$categorias['DIESIS 290'][]='124';
$categorias['PARKER 260'][]='124';
$categorias['PARKER 290'][]='124';
$categorias['QUADRO 260'][]='124';
$categorias['QUADRO 290'][]='124';
$categorias['CONJUNTO OMEGA 3+2'][]='104';
$categorias['CONJUNTO DELTA 3+2'][]='104';
$categorias['CONJUNTO ERGO 3+2'][]='104';
$categorias['CONJUNTO MADISON 3+2'][]='104';
$categorias['COLCHON CUNA ESPUMA'][]='100';
$categorias['COLCHON CUNA MUELLE-COCO'][]='100';
$categorias['COLCHON CUNA VISCO'][]='100';
$categorias['ALMOHADA FIBRA'][]='84';
$categorias['ALMOHADA PLUMA'][]='84';
$categorias['ALMOHADA INNOGEL'][]='84';
$categorias['ALMOHADA VISCOSOJA'][]='84';
$categorias['APARADOR URBAN 3P'][]='85';
$categorias['APARADOR URBAN 2P'][]='85';
$categorias['VITRINA URBAN 2P'][]='129';
$categorias['BUFFET URBAN'][]='85';
$categorias['MESA CENTRO URBAN'][]='111';
$categorias['VITRINA URBAN 1P'][]='129';
$categorias['APARADOR HERMES '][]='85';
$categorias['BUFFET  2 PUERTAS HERMES '][]='85';
$categorias['MUEBLE TV GRANDE HERMES '][]='116';
$categorias['MUEBLE TV PEQUEÑO HERMES '][]='116';
$categorias['MESA DE CENTRO HERMES '][]='111';
$categorias['APARADOR LAND'][]='85';
$categorias['PARED LAND'][]='117';
$categorias['LAND MUEBLE TV'][]='116';
$categorias['VITRINA 2P LAND'][]='129';
$categorias['MESA CENTRO LAND'][]='111';
$categorias['PARED FLY'][]='117';
$categorias['VITRINA 2P FLY'][]='129';
$categorias['MODULO 4P FLY'][]='85';
$categorias['APARADOR 4P FLY'][]='85';
$categorias['MUEBLE TV FLY'][]='116';
$categorias['NATURE APARADOR'][]='85';
$categorias['NATURE MUEBLE TV '][]='116';
$categorias['NATURE BUFFET'][]='85';
$categorias['SALON KIRA'][]='117';
$categorias['BASE TV KIRA'][]='116';
$categorias['PARED KIRA'][]='117';
$categorias['APARADOR MILANO'][]='85';
$categorias['MUEBLE TV MILANO'][]='116';
$categorias['VITRINA 4P MILANO'][]='129';
$categorias['VITRINA 2P MILANO'][]='129';
$categorias['PARED NIZA1'][]='117';
$categorias['PARED NIZA2'][]='117';
$categorias['SALON CRETA'][]='117';
$categorias['SALON STORM'][]='117';
$categorias['ELISA BUFFET'][]='85';
$categorias['ELISA VITRINA 1P'][]='129';
$categorias['ELISA APARADOR 4P'][]='85';
$categorias['ELISA MUEBLE TV'][]='116';
$categorias['SALON VENUS'][]='117';
$categorias['SALON FLAVIA'][]='117';
$categorias['SALON GEMINI'][]='117';
$categorias['SALON FORMA'][]='117';
$categorias['SALON STAR'][]='117';
$categorias['SALON LOTTO'][]='117';
$categorias['OREGON'][]='111';
$categorias['COLUMBIA'][]='111';
$categorias['ALASKA'][]='111';
$categorias['CRISTAL'][]='111';
$categorias['CRISTAL ESTANTE'][]='111';
$categorias['AUXILIAR CRISTAL'][]='110';
$categorias['REVISTERO CRISTAL'][]='110';
$categorias['CONJUNTO 2 CRISTAL'][]='110';
$categorias['TABURETE NORDIC'][]='128';
$categorias['SEVENTY'][]='128';
$categorias['MIRKO'][]='128';
$categorias['HABITACION JUVENIL 1'][]='108';
$categorias['HABITACION JUVENIL 2'][]='108';
$categorias['HABITACION JUVENIL 3'][]='108';
$categorias['HABITACION JUVENIL 4'][]='108';
$categorias['HABITACION JUVENIL 5'][]='108';
$categorias['HABITACION JUVENIL 6'][]='108';
$categorias['HABITACION JUVENIL 7'][]='108';
$categorias['HABITACION JUVENIL 8'][]='108';
$categorias['HABITACION JUVENIL 9'][]='108';
$categorias['HABITACION JUVENIL 10'][]='108';
$categorias['HABITACION JUVENIL 11'][]='108';
$categorias['HABITACION JUVENIL 12'][]='108';
$categorias['HABITACION JUVENIL 13'][]='108';
$categorias['HABITACION JUVENIL 14'][]='108';
$categorias['HABITACION JUVENIL 15'][]='108';
$categorias['HABITACION JUVENIL 16'][]='108';
$categorias['HABITACION JUVENIL 17'][]='108';
$categorias['HABITACION JUVENIL 18'][]='108';
$categorias['HABITACION JUVENIL 19'][]='108';
$categorias['HABITACION JUVENIL 20'][]='108';
$categorias['HABITACION JUVENIL 21'][]='108';
$categorias['HABITACION JUVENIL 22'][]='108';
$categorias['HABITACION JUVENIL 25'][]='108';
$categorias['HABITACION JUVENIL 26'][]='108';
$categorias['ARMARIO 1 PUERTA'][]='88';
$categorias['ARMARIO 1 PUERTA + 2 CAJONES'][]='88';
$categorias['ARMARIO 1 PUERTA + 3 CAJONES'][]='88';
$categorias['ARMARIO 2 PUERTAS'][]='88';
$categorias['ARMARIO 2 PUERTAS + 2 CAJONES'][]='88';
$categorias['ARMARIO 2 PUERTAS + 3 CAJONES'][]='88';
$categorias['ARMARIO 3 PUERTAS'][]='88';
$categorias['ARMARIO 3 PUERTAS + 2 CAJONES'][]='88';
$categorias['ARMARIO 3 PUERTAS + 3 CAJONES'][]='88';
$categorias['ARMARIO RINCON'][]='88';
$categorias['ARMARIO 2 PUERTAS CORREDERAS 140CM'][]='88';
$categorias['ARMARIO 2 PUERTAS CORREDERAS 160CM'][]='88';
$categorias['ESTANTERIA TERMINAL CON DIVISORES'][]='107';
$categorias['ESTANTERIA TERMINAL'][]='107';
$categorias['ARMARIO ZAPATERO'][]='107';
$categorias['CAMA SIM'][]='93';
$categorias['CAMA CRIK'][]='93';
$categorias['CAMA NIDO RECTO'][]='93';
$categorias['CAMA NIDO 3 CAJONES'][]='93';
$categorias['CAMA NIDO CON SUMPLEMENTO CURVO'][]='93';
$categorias['CAMA NIDO 3 CAJ CON SUMPLEMENTO CURVO'][]='93';
$categorias['COMPACTO RECTO'][]='93';
$categorias['COMPACTO CURVO'][]='93';
$categorias['ESTANTERIA 195 REPISA'][]='107';
$categorias['ESTANTERIA 195'][]='107';
$categorias['ESTANTERIA 100'][]='107';
$categorias['ESTANTERIA DOBLE'][]='107';
$categorias['ESTANTERIA CORREDERA'][]='107';
$categorias['ESTANTERIA SUELO'][]='107';
$categorias['LITERA 3 CAJONES'][]='109';
$categorias['LITERA CAMA ARRASTRE'][]='109';
$categorias['TREN COMPACTO 2C'][]='94';
$categorias['TREN COMPACTO 3C'][]='94';
$categorias['CAMA ABATIBLE HORIZONTAL'][]='90';
$categorias['CAMA ABATIBLE CON ARMARIO'][]='90';
$categorias['MESITA 2 CAJONES'][]='115';
$categorias['MESITA 2 CAJONES CON RUEDAS'][]='115';
$categorias['SINFONIER 6 CAJONES'][]='115';
$categorias['SINFONIER 6 CAJONES CON RUEDAS'][]='115';
$categorias['CAMA ITACA G'][]='92';
$categorias['CAMA ITACA B'][]='92';
$categorias['CAMA ITACA CANAPE'][]='92';
$categorias['CAMA RHEA G'][]='92';
$categorias['CAMA RHEA B'][]='92';
$categorias['CAMA RHEA CANAPE'][]='92';
$categorias['CAMA EFESO G'][]='92';
$categorias['CAMA EFESO B'][]='92';
$categorias['CAMA EFESO CANAPE'][]='92';
$categorias['CAMA FOLO G'][]='92';
$categorias['CAMA FOLO B'][]='92';
$categorias['CAMA FOLO CANAPE'][]='92';
$categorias['CAMA ELIDE G'][]='92';
$categorias['CAMA ELIDE B'][]='92';
$categorias['CAMA ELIDE CANAPE'][]='92';
$categorias['MESITA PAR 2C'][]='114';
$categorias['MESITA PAR 3C'][]='114';
$categorias['SINFONIER PAR'][]='103';
$categorias['COMODA PAR 3C'][]='103';
$categorias['COMODA PAR 4C'][]='103';
$categorias['MESITA IBI'][]='114';
$categorias['SINFONIER IBI'][]='103';
$categorias['COMODA IBI'][]='103';
$categorias['ARMARIO 2 PUERTAS CORREDERA CRETA'][]='86';
$categorias['ARMARIO 2 PUERTAS CORREDERA CRETA CON LUNAS'][]='86';
$categorias['ARMARIO 2 PUERTAS CORREDERA CRETA 3 PLAFONES'][]='86';
$categorias['ARMARIO PUERTAS BATIENTES CRETA'][]='87';
$categorias['DORMITORIO LORENA'][]='105';
$categorias['DORMITORIO ATHENA'][]='105';
$categorias['DORMITORIO ARTIC'][]='105';
$categorias['DORMITORIO LUCE'][]='105';
$categorias['DORMITORIO MINERVA 3 PUERTAS CORREDERA'][]='105';
$categorias['DORMITORIO MINERVA 2 PUERTAS CORREDERA'][]='105';
$categorias['DORMITORIO OCEAN'][]='105';
$categorias['DORMITORIO PHIL'][]='105';
$categorias['ARMARIO BASIC ROBLE GRIS'][]='87';
$categorias['ARMARIO BASIC PINO CLARO'][]='87';
$categorias['ARMARIO BASIC FRESNO '][]='87';
$categorias['ARMARIO BASIC NOGAL'][]='87';
$categorias['ARMARIO EMMA LACADO '][]='87';
$categorias['ARMARIO INCANTO ESPEJO'][]='87';
$categorias['ARMARIO INCANTO LACADO '][]='87';
$categorias['ARMARIO VESTIDOR'][]='89';
$categorias['ARMARIO CORREDERA TRENTO 2 PUERTAS'][]='86';
$categorias['ARMARIO CORREDERA TRENTO 2 PUERTAS LACADO '][]='86';
$categorias['ARMARIO CORREDERA TRENTO 2 PUERTAS C/ESPEJO'][]='86';
$categorias['ARMARIO CORREDERA TRENTO 2 PUERTAS C/ESPEJO LACADO '][]='86';
$categorias['ARMARIO CORREDERA TRENTO 2 PUERTAS TODO ESPEJO'][]='86';
$categorias['ARMARIO CORREDERA TRENTO 2 PUERTAS TODO ESPEJO LACADO '][]='86';
$categorias['ARMARIO CORREDERA TRENTO 3 PUERTAS'][]='86';
$categorias['ARMARIO CORREDERA TRENTO 3 PUERTAS LACADO '][]='86';
$categorias['ARMARIO CORREDERA TRENTO 3 PUERTAS C/ESPEJO'][]='86';
$categorias['ARMARIO CORREDERA TRENTO 3 PUERTAS C/ESPEJO LACADO '][]='86';
$categorias['ARMARIO CORREDERA TRENTO 3 PUERTAS TODO ESPEJO'][]='86';
$categorias['ARMARIO CORREDERA TRENTO 3 PUERTAS TODO ESPEJO LACADO '][]='86';
$categorias['CAMA ARTIC  '][]='92';
$categorias['CAMA ARTIC LACADA '][]='92';
$categorias['CAMA ARTIC C/CONTENEDOR '][]='92';
$categorias['CAMA ARTIC C/CONTENEDOR LACADA'][]='92';
$categorias['CAMA PHIL'][]='92';
$categorias['CAMA LOTTO'][]='92';
$categorias['CAMA LOTTO TAPIZADO'][]='92';
$categorias['CAMA LOTTO PATA DE GALLO'][]='92';
$categorias['CAMA LUXURY'][]='92';
$categorias['CAMA TAPIZADA NINA'][]='92';
$categorias['CAMA TAPIZADA DAISY'][]='92';
$categorias['CAMA TAPIZADA PRINCESS'][]='92';
$categorias['CAMA TAPIZADA HAPPY'][]='92';
$categorias['CAMA TAPIZADA EMMA'][]='92';
$categorias['CAMA TAPIZADA CHERRY'][]='92';
$categorias['MUEBLE SALON CALIFORNIA'][]='117';
$categorias['MUEBLE SALON HOUSTON'][]='117';
$categorias['MUEBLE SALON ROCK'][]='117';
$categorias['MUEBLE SALON STAND'][]='117';
$categorias['MUEBLE SALON ALASKA'][]='117';
$categorias['MUEBLE SALON TORONTO'][]='117';
$categorias['MUEBLE SALON QUEBEC'][]='117';
$categorias['MUEBLE SALON BOSTON'][]='117';
$categorias['MUEBLE SALON CANNES'][]='117';
$categorias['MUEBLE SALON NIMES'][]='117';
$categorias['MUEBLE SALON OSLO'][]='117';
$categorias['MUEBLE SALON NEBRASKA'][]='117';
$categorias['MUEBLE SALON DAKOTA'][]='117';
$categorias['MUEBLE SALON GEORGIA'][]='117';
$categorias['MUEBLE SALON COLONIA'][]='117';
$categorias['MUEBLE SALON GANTE'][]='117';
$categorias['MUEBLE SALON CALAIS'][]='117';
$categorias['MUEBLE SALON AMIENS'][]='117';
$categorias['MUEBLE SALON BELFAST'][]='117';
$categorias['MUEBLE SALON ESTOCOLMO'][]='117';
$categorias['MUEBLE SALON BARI'][]='117';
$categorias['MUEBLE SALON PALERMO'][]='117';
$categorias['MUEBLE SALON PESCARA'][]='117';
$categorias['MUEBLE SALON BERNA'][]='117';
$categorias['MUEBLE SALON TRIESTE'][]='117';
$categorias['MUEBLE SALON BASILEA'][]='117';
$categorias['MUEBLE SALON GENOVA'][]='117';
$categorias['MUEBLE SALON GRENOBLE'][]='117';
$categorias['MUEBLE SALON ANCONA'][]='117';
$categorias['APARADOR SALON NIMES'][]='85';
$categorias['APARADOR PADOCK'][]='85';
$categorias['APARADOR ASTOR'][]='85';
$categorias['APARADOR PARMA'][]='85';
$categorias['APARADOR UDINE'][]='85';
$categorias['APARADOR DISON'][]='85';
$categorias['APARADOR LYON'][]='85';
$categorias['MESA DE CENTRO ELEVABLE DEMIS'][]='111';
$categorias['MESA DE CENTRO ELEVABLE SOUL'][]='111';
$categorias['MESA CENTRO CUADRADA'][]='111';
$categorias['MESA CENTRO CIRCULO'][]='111';
$categorias['ZAPATERO MILAN 2 PUERTAS Y ESPEJO'][]='131';
$categorias['MESITA 2 CAJONES COUPLE'][]='114';
$categorias['COMODA COUPLE 3 CAJONES'][]='103';
$categorias['SINFONIER COUPLE 5 CAJONES'][]='103';
$categorias['MODULO TV ARGOS SABLE/'][]='116';
$categorias['APARADOR ARGO SABLE/'][]='85';
$categorias['VITRINA ARGOS 2 PUERTAS SABLE/'][]='129';
$categorias['VITRINA ARGOS 1 PUERTA SABLE/'][]='129';
$categorias['MÓDULO VITRINA ARGOS 2 PUERTAS SABLE/'][]='129';
$categorias['ESTANTERIA JULIETTE'][]='107';
$categorias['COMPACTO JULIETTE  PORO/AZUL NUBE'][]='93';
$categorias['ARMARIO JULIETTE 2 PUERTAS   PORO/AZUL NUBE'][]='88';
$categorias['ESPEJO ALICE SABLE '][]='106';
$categorias['ARMARIO ROMA 3PUERTAS + 3CAJONES '][]='87';
$categorias['ARMARIO ROMA 4 PUERTAS+ 2 CAJONES'][]='87';
$categorias['ARMARIO ROMA 2 PUERTAS+ 3 CAJONES'][]='87';
$categorias[' ARMARIO 2 PUERTAS CORREDERAS'][]='86';
$categorias['ARMARIO GRAN SAVONA 2 PUERTAS CORREDERA'][]='86';
$categorias['ZAPATERO TREND CON ESPEJO '][]='130';
$categorias['ZAPATERO 1 PUERTA  '][]='130';
$categorias['ARMARIO ZAPATERO 2 PUERTAS 55'][]='130';
$categorias['ARMARIO ZAPATERO 2 PUERTAS 60'][]='130';
$categorias['MESA CENTRO TREND'][]='111';
$categorias['MUEBLE SALON LEGOS'][]='117';
$categorias['MUEBLE SALON ARGOS'][]='117';
$categorias['MUEBLE SALON LEGOS 2'][]='117';
$categorias['MUEBLE SALON LEGOS 9'][]='117';
$categorias['MUEBLE SALON ARGOS SABLE'][]='117';
$categorias['MUEBLE SALON ARGOS STREET'][]='117';
$categorias['MUEBLE SALON LEGOS11 '][]='117';
$categorias['LITERA - TREN NATURE'][]='109';
$categorias['LITERA - TREN  NORDIC'][]='109';
$categorias['ARMARIO POLO'][]='87';
$categorias['COMODA ANYA'][]='103';
$categorias['MESITA DE NOCHE ANYA'][]='114';
$categorias['SINFONIER ANYA'][]='103';
$categorias['COMODA STAR'][]='103';
$categorias['COMODA DOBLE STAR'][]='103';
$categorias['MESITA DE NOCHE STAR'][]='114';
$categorias['SINFONIER STAR'][]='103';
$categorias['COMODA COLOURS CRISTAL'][]='103';
$categorias['MESITA COLOURS CRISTAL'][]='114';
$categorias['SINFONIER COLOURS CRISTAL'][]='103';
$categorias['COMODA METROPOLIS'][]='103';
$categorias['MESITA DE NOCHE METROPOLIS'][]='114';
$categorias['SINFONIER METROPOLIS'][]='103';
$categorias['COMODA PHIL'][]='103';
$categorias['MESITA DE NOCHE PHIL'][]='114';
$categorias['SINFONIER RIVER'][]='103';
$categorias['COMODA RIVER'][]='103';
$categorias['MESITA DE NOCHE RIVER'][]='114';
$categorias['SOMIER BASIC'][]='127';
$categorias['CANAPE MAGNUS CHOCOLATE'][]='95';
$categorias['CANAPE MAGNUS BLANCO'][]='95';
$categorias['CANAPE MAGNUS BEIGE'][]='95';
$categorias['CANAPE MAGNUS NEGRO'][]='95';
$categorias['BASE TAPIZADA 3D'][]='95';
$categorias['SOMIER PLUS'][]='127';
$categorias['CAMA ARTICULADA'][]='91';
$categorias['ALEXIA'][]='124';
$categorias['ARIZONA 2P'][]='121';
$categorias['ARIZONA 3P'][]='122';
$categorias['BARCELONA 265'][]='124';
$categorias['BARCELONA 295'][]='124';
$categorias['BENTLEY 2P'][]='121';
$categorias['BENTLEY2+2'][]='126';
$categorias['BENTLEY 250'][]='124';
$categorias['BENTLEY 280'][]='124';
$categorias['BENTLEY 3P'][]='122';
$categorias['BENTLEY 3+3'][]='126';
$categorias['BOSS'][]='124';
$categorias['BUGATTI'][]='124';
$categorias['CAYENNE'][]='124';
$categorias['CORAL'][]='124';
$categorias['CORDOBA 2P'][]='121';
$categorias['CORDOBA 3P'][]='122';
$categorias['ELECTRA'][]='124';
$categorias['GERONA'][]='126';
$categorias['JAGUAR 260'][]='124';
$categorias['JAGUAR 290'][]='124';
$categorias['LUCIA 250'][]='124';
$categorias['LUCIA 280'][]='124';
$categorias['LUCIA RINC'][]='126';
$categorias['MALAGA 2P'][]='121';
$categorias['MALAGA 3P'][]='122';
$categorias['MALENA'][]='126';
$categorias['MAX'][]='124';
$categorias['MAYA'][]='126';
$categorias['OHIO'][]='126';
$categorias['PALERMO 260'][]='124';
$categorias['PALERMO 290'][]='124';
$categorias['QATAR'][]='124';
$categorias['ROLEX 2P'][]='121';
$categorias['ROLEX 260'][]='124';
$categorias['ROLEX 290'][]='124';
$categorias['ROLEX 3P'][]='122';
$categorias['NANTES'][]='124';
$categorias['SIENA 2P'][]='121';
$categorias['SIENA 260'][]='124';
$categorias['SIENA 290'][]='124';
$categorias['SIENA 3P'][]='122';
$categorias['SUZUKI'][]='124';
$categorias['VOLVO 245'][]='124';
$categorias['VOLVO 275'][]='124';
$categorias['VOLVO RINCONERA'][]='126';
$categorias['EROS'][]='120';
$categorias['ATENAS'][]='120';
$categorias['CONJUNTO CORDOBA 3+2'][]='104';
$categorias['CONJUNTO MALAGA 3+2'][]='104';
$categorias['CONJUNTO ARIZONA 3+2'][]='104';
$categorias['CONJUNTO BENTLEY 3+2'][]='104';
$categorias['CONJUNTO SIENA 3+2'][]='104';
$categorias['CONJUNTO ROLEX 3+2'][]='104';
$categorias['THERAPYINTENSE'][]='96';
$categorias['THERAPY'][]='96';
$categorias['ERGOSMEMORY'][]='99';
$categorias['ERGOOSSENSE'][]='100';
$categorias['KID21'][]='100';
$categorias['KID16'][]='100';
$categorias['ERGOS POCKET'][]='100';
$categorias['ERGOSVISCOLASTIC'][]='97';
$categorias['ERGOSVISCOBOX'][]='97';
$categorias['THERAPYPOCKET'][]='96';
$categorias['THERAPYSPORT'][]='96';
$categorias['BEDPURE NATURE'][]='96';
$categorias['BEDPURE NATURE EXCLUSIVE'][]='96';
$categorias['ERGOS LUXE'][]='96';
$categorias['ERGOSADAPT'][]='97';
$categorias['MESA URBAN'][]='112';
$categorias['MESA COMEDOR HERMES'][]='112';
$categorias['MESA FLY'][]='112';
$categorias['NATURE MESA'][]='112';
$categorias['NADIA'][]='112';
$categorias['BERTA'][]='112';
$categorias['CHROME'][]='112';
$categorias['LIGHT'][]='112';
$categorias['PADOVA'][]='112';
$categorias['TANIA'][]='112';
$categorias['CONSOLA'][]='112';
$categorias['MONTREAL'][]='112';
$categorias['QUEBEC'][]='112';
$categorias['ELEGANT 180'][]='112';
$categorias['ELEGANT 180 LACADO'][]='112';
$categorias['ELEGANT 140'][]='112';
$categorias['ELEGAN 140 LACADO'][]='112';
$categorias['MYKONOS'][]='112';
$categorias['BERLIN 90'][]='112';
$categorias['BERLIN 120'][]='112';
$categorias['LINK'][]='112';
$categorias['MESA EXTENSIBLE DUO'][]='112';
$categorias['MESA CUBIKA EXTENSIBLE'][]='112';
$categorias['MESA EXTENSIBLE TREND 90'][]='112';
$categorias['MESA EXTENSIBLE 140'][]='112';
$categorias['CAROLINE'][]='118';
$categorias['AURIA'][]='118';
$categorias['AURIA MADERA'][]='118';
$categorias['WITNEY'][]='118';
$categorias['SOFIA NEGRA'][]='118';
$categorias['SOFIA CROMO'][]='118';
$categorias['NORDIC MADERA'][]='118';
$categorias['NORDIC METAL'][]='118';
$categorias['VICTORIA'][]='118';
$categorias['JASON'][]='118';
$categorias['DIVA'][]='118';
$categorias['ZETA'][]='118';
$categorias['MAYA'][]='118';
$categorias['STELLA'][]='118';
$categorias['CLOE'][]='118';
$categorias['NANCY'][]='118';
$categorias['ELENA'][]='118';
$categorias['OMEGA 1P'][]='120';
$categorias['DELTA 1P'][]='120';
$categorias['DENIS'][]='120';
$categorias['MADISON 1P'][]='120';
$categorias['OMEGA 2P'][]='121';
$categorias['DELTA 2P'][]='121';
$categorias['ERGO 2P'][]='121';
$categorias['MADISON 2P'][]='121';
$categorias['OMEGA 3P'][]='122';
$categorias['DELTA 3P'][]='122';
$categorias['ERGO 3P'][]='122';
$categorias['MADISON 3P'][]='122';
$categorias['ALBA 315'][]='123';
$categorias['ALBA 345'][]='123';
$categorias['DIESIS 260'][]='125';
$categorias['DIESIS 290'][]='125';
$categorias['PARKER 260'][]='125';
$categorias['PARKER 290'][]='125';
$categorias['QUADRO 260'][]='125';
$categorias['QUADRO 290'][]='125';
$categorias['CONJUNTO OMEGA 3+2'][]='125';
$categorias['CONJUNTO DELTA 3+2'][]='125';
$categorias['CONJUNTO ERGO 3+2'][]='125';
$categorias['CONJUNTO MADISON 3+2'][]='125';
$categorias['THERAPYINTENSE'][]='101';
$categorias['THERAPY'][]='101';
$categorias['ERGOSMEMORY'][]='97';
$categorias['ERGOOSSENSE'][]='97';
$categorias['KID21'][]='97';
$categorias['KID16'][]='97';
$categorias['ERGOS POCKET'][]='97';
$categorias['ERGOSVISCOLASTIC'][]='99';
$categorias['ERGOSVISCOBOX'][]='99';
$categorias['THERAPYPOCKET'][]='101';
$categorias['THERAPYSPORT'][]='101';
$categorias['BEDPURE NATURE'][]='101';
$categorias['BEDPURE NATURE EXCLUSIVE'][]='101';
$categorias['THERAPYINTENSE'][]='99';
$categorias['THERAPY'][]='99';
echo "<table>";
foreach ($categorias as $nido=>$cats) {
	$temp=NULL;
	foreach ($cats as $k) {
		if($temp=="") {
		$temp.=$lascats[$k];
		} else {
		$temp.=', '.$lascats[$k];
		};
	}
	echo "<tr><td>".$nido."</td><td>".$temp."</td></tr>";
}

echo "</table>";
exit;
//Carga de productos en Wordpress

	$que="SELECT * FROM  `ps_product` a left join ps_product_lang b on a.id_product=b.id_product AND b.id_lang=1 where isbn!='' AND ean13!=''";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$que="INSERT INTO `di_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('".$row->ean13."','producto','".$row->id_product."')";
		$upd = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		$que="INSERT INTO `di_postmeta`(`post_id`, `meta_key`, `meta_value`) VALUES ('".$row->ean13."','_producto','".$row->id_product."')";
		$upd = $GLOBALS['wpdb']->get_results( $que, OBJECT );
};
exit;

echo "<h2>Carga de atributos</h2>";
//select max position ps_attribute id_group
//select valores ps_attributo y su lang
//los que no existan insert ps_attribute y ps_attribute_lang id_lang=1, ps_attribute_shop id_shop=1
/*
foreach ($atrs as $groupid=>$k) {
	echo "<p>Iniciando carga grupo atributos ".$groupid.": ".count($k)." elementos.</p>";
	$que="SELECT MAX(position) as posicion FROM `ps_attribute` WHERE `id_attribute_group`='".$groupid."'";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		if($row->posicion!="") {
			$order=round($row->posicion,0)+1;
		} else {
			$order=0;
		};
	};
	$que="SELECT * FROM ps_attribute a left join `ps_attribute_lang` b on a.id_attribute=b.id_attribute and b.id_lang=1 WHERE a.id_attribute_group='".$groupid."'";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$actuales=NULL;
	foreach ($query as $row) {
		$actuales[$row->id_attribute]=$row->name;
	};
	foreach ($k as $v) {
		if(!in_array($v,$actuales)) {
			$que="INSERT INTO `ps_attribute`(`id_attribute_group`, `position`) VALUES ('".$groupid."','".$order."')";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$que="SELECT MAX(id_attribute) as laid FROM `ps_attribute` WHERE `id_attribute_group`='".$groupid."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$laid="";
			foreach ($query as $row) {
				$laid=$row->laid;
			};
			if($laid=="") {
				echo "Ocurrió un error al cargar atributos";
				exit;
			}
			$que="INSERT INTO `ps_attribute_shop`(`id_attribute`, `id_shop`) VALUES ('".$laid."',1)";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$que="INSERT INTO `ps_attribute_lang`(`id_attribute`, `id_lang`, `name`) VALUES ('".$laid."',1,'".$v."')";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$order=$order+1;
		} else {
			echo "<p>Ya existe el atributo ".$v.", omitido</p>";
		}
	};
}
	*/
//Carga productos

$que="SELECT * FROM `ps_attribute` a left join ps_attribute_lang b on a.id_attribute=b.id_attribute AND b.id_lang=1 WHERE 1";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$losatributos[$row->id_attribute_group][$row->id_attribute]=strtoupper($row->name);
		$losatributosrev[strtoupper($row->name)]=$row->id_attribute;
	};
	
foreach ($productos as $ref=>$producto) {
	if ($producto['Default']!="") {
	echo "<p>Cargando ".$producto['Nombre']."</p>";
		if($combis[$ref][$producto['Default']]['PVP']!="") {
		$price=$combis[$ref][$producto['Default']]['PVP']/1.21;
	} else {
		$price=0;
	}
	$width=$producto['Ancho'];
	$height=$producto['Alto'];
	$depth=$producto['Fondo'];
	$weight=$producto['Peso'];
	if($width=="" && $combis[$ref][$producto['Default']]['ancho']!="") {
		$width=$combis[$ref][$producto['Default']]['ancho'];
	}
	if($height=="" && $combis[$ref][$producto['Default']]['altura']!="") {
		$height=$combis[$ref][$producto['Default']]['altura'];
	}
	if($depth=="" && $combis[$ref][$producto['Default']]['largo']!="") {
		$depth=$combis[$ref][$producto['Default']]['largo'];
	}
	//Insert en ps_product, ps_product_shop y ps_product_lang
	$que="INSERT INTO `ps_product`(`id_supplier`, `id_manufacturer`, `id_category_default`, `id_shop_default`, `id_tax_rules_group`, `on_sale`, `online_only`, `ean13`, `isbn`, `upc`, `ecotax`, `quantity`, `minimal_quantity`, `price`, `wholesale_price`, `unity`, `unit_price_ratio`, `additional_shipping_cost`, `reference`, `supplier_reference`, `location`, `width`, `height`, `depth`, `weight`, `out_of_stock`, `quantity_discount`, `customizable`, `uploadable_files`, `text_fields`, `active`, `redirect_type`, `id_type_redirected`, `available_for_order`, `available_date`, `show_condition`, `condition`, `show_price`, `indexed`, `visibility`, `cache_is_pack`, `cache_has_attachments`, `is_virtual`, `cache_default_attribute`, `date_add`, `date_upd`, `advanced_stock_management`, `pack_stock_type`, `state`) VALUES (0,0,2,1,1,0,0,'','','',0,0,1,'".$price."',0,'',0,0,'".$ref."','','','".$width."','".$height."','".$depth."','".$weight."',2,0,0,0,0,1,'404',0,1,'0000-00-00',0,'new',1,1,'both',0,0,0,0,NOW(),NOW(),0,3,1)";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$que="SELECT MAX(id_product) as laid FROM `ps_product` WHERE `reference`='".$ref."'";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$laid="";
	foreach ($query as $row) {
		$laid=$row->laid;
	};
	if($laid=="") {
		echo $que."<br>";
		echo "Ocurrió un error al insertar producto";
		exit;
	}
	$que="INSERT INTO `ps_product_lang`(`id_product`, `id_shop`, `id_lang`, `description`, `description_short`, `link_rewrite`, `name`, `available_now`, `available_later`) VALUES ('".$laid."',1,1,'','','".strtolower($ref)."','".$producto['Nombre']."','En Stock','')";
	//echo $que."<br>";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$que="INSERT INTO `ps_product_shop`(`id_product`, `id_shop`, `id_category_default`, `id_tax_rules_group`, `on_sale`, `online_only`, `ecotax`, `minimal_quantity`, `price`, `wholesale_price`, `unity`, `unit_price_ratio`, `additional_shipping_cost`, `customizable`, `uploadable_files`, `text_fields`, `active`, `redirect_type`, `id_type_redirected`, `available_for_order`, `available_date`, `show_condition`, `condition`, `show_price`, `indexed`, `visibility`, `cache_default_attribute`, `advanced_stock_management`, `date_add`, `date_upd`, `pack_stock_type`) VALUES ('".$laid."',1,2,1,0,0,0,1,'".$price."',0,'',0,0,0,0,0,1,'404',0,1,'0000-00-00',0,'new',1,1,'both',0,0,NOW(),NOW(),3)";
	//echo $que."<br>";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	echo "<p>".$producto['Nombre']." Insertado correctamente.</p>";
	
	//Insertar combinaciones
	
	if(count($combis[$ref]>0)){
	foreach ($combis[$ref] as $combi) {
			$default="";
		if($combi['CODIGO']==$producto['Default']) {
			$default=1;
			$pricecombi=0;
		} else {
			$default="";
			$pricecombi=$combi['PVP']/1.21;
			$pricecombi=$pricecombi-$price;
		}
		if($default==1) {
		$que="INSERT INTO `ps_product_attribute`(`id_product`, `reference`, `supplier_reference`, `location`, `ean13`, `isbn`, `upc`, `wholesale_price`, `price`, `ecotax`, `quantity`, `weight`, `unit_price_impact`, `default_on`, `minimal_quantity`, `available_date`) VALUES ('".$laid."','".$combi['CODIGO']."','','','','','','','".$pricecombi."','','','".$combi['peso']."',0,'".$default."',1,'0000-00-00')";
		} else {
		$que="INSERT INTO `ps_product_attribute`(`id_product`, `reference`, `supplier_reference`, `location`, `ean13`, `isbn`, `upc`, `wholesale_price`, `price`, `ecotax`, `quantity`, `weight`, `unit_price_impact`, `default_on`, `minimal_quantity`, `available_date`) VALUES ('".$laid."','".$combi['CODIGO']."','','','','','','','".$pricecombi."','','','".$combi['peso']."',0,NULL,1,'0000-00-00')";
		}
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		$que="SELECT id_product_attribute from ps_product_attribute where reference='".$combi['CODIGO']."'";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		$laidc="";
		foreach ($query as $row) {
			$laidc=$row->id_product_attribute;
		};
		if($laidc=="") {
			echo "Ocurrió un error al cargar combinaciones";
			exit;
		}
		if($default==1) {
		$que="INSERT INTO `ps_product_attribute_shop`(`id_product`, `id_product_attribute`, `id_shop`, `wholesale_price`, `price`, `ecotax`, `weight`, `unit_price_impact`, `default_on`, `minimal_quantity`, `available_date`) VALUES ('".$laid."','".$laidc."',1,0,'".$pricecombi."',0,'".$combi['peso']."',0,'".$default."',1,'0000-00-00')";
		} else {
		$que="INSERT INTO `ps_product_attribute_shop`(`id_product`, `id_product_attribute`, `id_shop`, `wholesale_price`, `price`, `ecotax`, `weight`, `unit_price_impact`, `default_on`, `minimal_quantity`, `available_date`) VALUES ('".$laid."','".$laidc."',1,0,'".$pricecombi."',0,'".$combi['peso']."',0,NULL,1,'0000-00-00')";
		}
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($combi['atr'] as $ela=>$elv) {
			foreach ($losatributos[$ela] as $idt=>$te) {
				if ($te==$elv) {
					$combi['atrid'][$ela]=$idt;
				}
			};
			if($combi['atrid'][$ela]=="") {
				echo "Ocurrió un error al cargar atributos de combinaciones";
				exit;
			};
			$que="INSERT INTO `ps_product_attribute_combination`(`id_attribute`, `id_product_attribute`) VALUES ('".$combi['atrid'][$ela]."','".$laidc."')";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		}
	}
	} else if (count($combis[$ref]==1)){
		//Insertar como producto simple
		foreach ($combis[$ref] as $combi) {
			$price=$combi['PVP']/1.21;
		}
			$que="UPDATE ps_product SET reference='".$combi['CODIGO']."', isbn='".$ref."', price='".$price."' WHERE id_product='".$laid."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	}
	//Insertar features
	//Mirar actuales y maxposicion
	$features=NULL;
	$featuresrev=NULL;
	$featuresv=NULL;
	$featuresvrev=NULL;
	$que="SELECT * FROM `ps_feature_lang` where id_lang=1";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$features[$row->id_feature]=$row->name;
		$featuresrev[$row->name]=$row->id_feature;
	};
	$que="SELECT * FROM `ps_feature_value_lang` a left join ps_feature_value b on a.id_feature_value=b.id_feature_value and a.id_lang=1 where id_lang=1";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$featuresv[$row->id_feature][$row->id_feature_value]=$row->value;
		$featuresvrev[$row->value]=$row->id_feature_value;
	};
	$que="SELECT MAX(position) as posicion from ps_feature";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		if($row->posicion!="") {
			$order=round($row->posicion,0)+1;
		} else {
			$order=0;
		};
	}
	//Revisar cada feature
	foreach ($producto as $atr=>$valor) {
		if (!in_array($atr,$reservados) && $valor!="") {
			//Si no es reservado insertar
			echo $atr."-".$valor."<br>";
			if(in_array($atr,$features) && $featuresrev[$atr]!="") {
				//Si existe feature no insertar
				echo $atr." Ya existe<br>";
				$laid2=$featuresrev[$atr];
			} else {
				//Si no existe feature insertar
				$que="INSERT INTO `ps_feature`(`position`) VALUES ('".$order."')";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				$que="SELECT MAX(id_feature) as laid from ps_feature where position='".$order."'";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				foreach ($query as $row) {
					if($row->laid!="") {
						$laid2=$row->laid;
					} else {
						echo "Error al subir features";
						exit;
					};
				}
				$que="INSERT INTO `ps_feature_lang`(`id_feature`, `id_lang`, `name`) VALUES ('".$laid2."',1,'".$atr."')";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				$que="INSERT INTO `ps_feature_shop`(`id_feature`, `id_shop`) VALUES ('".$laid2."',1)";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				$order=$order+1;
			};
			//Ahora mirar el valor
			if(in_array($valor,$featuresv[$laid2]) && $featuresvrev[$valor]!="") {
				//Si existe valor no insertar
				echo "El valor ".$valor." también.<br>";
				$laid3=$featuresvrev[$valor];
			} else {
				//Si no existe valor insertar
				$que="INSERT INTO `ps_feature_value`(`id_feature`, `custom`) VALUES ('".$laid2."',0)";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				$que="SELECT MAX(id_feature_value) as laid from ps_feature_value where id_feature='".$laid2."'";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				foreach ($query as $row) {
					if($row->laid!="") {
						$laid3=$row->laid;
					} else {
						echo "Error al subir features";
						exit;
					};
				}
				$que="INSERT INTO `ps_feature_value_lang`(`id_feature_value`, `id_lang`, `value`) VALUES ('".$laid3."','1','".$valor."')";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			};
			//Asociar a producto
			$que="INSERT INTO `ps_feature_product`(`id_feature`, `id_product`, `id_feature_value`) VALUES ('".$laid2."','".$laid."','".$laid3."')";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		}
	}
	} else {

	echo "<p>No se puede cargar ".$producto['Nombre']."</p>";
	};
};

exit;

//Carga de productos en Wordpress

foreach ($productos as $ref=>$producto) {
	$que="SELECT * FROM  `ps_product` where reference='".$ref."'";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$producto['prestashopid']=$row->id_product;
	};
	if($producto['prestashopid']!="") {
	$producto['Nombre']=strtoupper(substr($producto['Nombre'],0,1)).strtolower(substr($producto['Nombre'],1,strlen($producto['Nombre'])-1));
	echo "<p>Creando ".$producto['Nombre']."</p>";
		$tipopost='post';
		$lascat=NULL;$extracat=NULL;
		foreach ($producto['categorias'] as $t) {
			$catu = get_field('categoria', $t );
			if($catu!="") {
			if($lascat=="") {
				$lascat=$catu;
			} else {
				$extracat[]=$catu;
			}
			};
		}
		$defaultspost = array(
			'post_author' => 1,
			'post_content' => '[productosimple]',
			'post_content_filtered' => '',
			'post_title' => $producto['Nombre'],
			'post_name' => creadordeurl($producto['Nombre']),
			'post_excerpt' => '',
			'post_status' => 'publish',
			'post_type' => $tipopost,
			'comment_status' => 'open',
			'post_category' => array($lascat),
			'ping_status' => 'closed'
		);
		$laid=wp_insert_post($defaultspost);
		echo $laid."todocorrecto";
		if($laid>0) {
		foreach ($extracat as $cat) {
			wp_set_post_categories( $laid, $cat, true );
		}
		set_post_format( $laid , 'aside');
			echo "ID=".$laid.'<br><a href="'.get_site_url().''.creadordeurl($producto['Nombre']).'/" target="_blank">Ver</a> <a href="'.get_site_url().'/wp-admin/post.php?post='.$laid.'&action=edit" target="_blank">Editar</a>';
		$lasmemetas[]= array(
			"key" => '_edit_last',
			"value" => '1'
		);
			$lasmemetas[]= array(
				"key" => 'producto',
				"value" => $producto['prestashopid']
			);
			$lasmemetas[]= array(
				"key" => '_producto',
				"value" => $producto['prestashopid']
			);
		foreach ($lasmemetas as $temporal) {
			add_post_meta( $laid, $temporal['key'], $temporal['value'], true );
		};
		};
		} else {
		$producto['Nombre']=strtoupper(substr($producto['Nombre'],0,1)).strtolower(substr($producto['Nombre'],1,strlen($producto['Nombre'])-1));
		echo "<p>Error en ".$producto['Nombre']."</p>";
		}
};

exit;

//Carga combinaciones



//Insert en ps_product_attribute, ps_product_attribute_shop
//Insert atributos en ps_product_attribute_combination


//Carga imagenes

//Subir imagenes, para cada imagen moverla al directorio1
//insertar en ps_product_attribute_image


$imagenes['ergoosSENSE']['1']['imagen']='abcd.jpg';	$imagenes['ergoosSENSE']['1']['descripcion']='imagen del colchon';


print_r($atrs);
print_r($imagenes);
print_r($productos);
print_r($combis);