<?php
define( 'WP_USE_THEMES',false );
require_once( './wp-load.php' );
$mydb2 = new wpdb('sillamania0','Ofiprix2018','sillamaniaes_dos','localhost');
$mydb = new wpdb('dicorops2','Dicoroweb2011','dicorops2','localhost');
//SELECT `id_product`,0 as combi, reference FROM `ps_product` WHERE `reference`!='' UNION 
$que="SELECT `id_product`,`id_product_attribute` as combi,`reference` FROM `ps_product_attribute` WHERE `reference`!=''";
	$query = $mydb->get_results( $que, OBJECT );
$arrimgs['00026100000000']='00026100000000';
$arrimgs['00026100000001']='00026100000001';
$arrimgs['00026100000002']='00026100000002';
$arrimgs['00026100000003']='00026100000003';
$arrimgs['00026100000004']='00026100000004';
$arrimgs['00026100000114']='00026100000114';
$arrimgs['00026100000005']='00026100000005';
$arrimgs['00026100000006']='00026100000006';
$arrimgs['00026100000007']='00026100000007';
$arrimgs['00026100000008']='00026100000008';
$arrimgs['00026000000652']='00026000000652';
$arrimgs['00026100000009']='00026100000009';
$arrimgs['00026100000010']='00026100000010';
$arrimgs['00026100000011']='00026100000011';
$arrimgs['00026100000012']='00026100000012';
$arrimgs['00026100000013']='00026100000013';
$arrimgs['00026100000014']='00026100000014';
$arrimgs['00026000000555']='00026000000555';
$arrimgs['00026000000554']='00026000000554';
$arrimgs['00026000000557']='00026000000557';
$arrimgs['00026000000556']='00026000000556';
$arrimgs['00026000000551']='00026000000551';
$arrimgs['00026000000550']='00026000000550';
$arrimgs['00026000000553']='00026000000553';
$arrimgs['00026000000552']='00026000000552';
$arrimgs['00026100000018']='00026100000018';
$arrimgs['00026100000019']='00026100000019';
$arrimgs['00026100000020']='00026100000020';
$arrimgs['00026100000021']='00026100000021';
$arrimgs['00026100000022']='00026100000022';
$arrimgs['00026100000023']='00026100000023';
$arrimgs['00026100000024']='00026100000024';
$arrimgs['00026000000589']='00026000000589';
$arrimgs['00026000000590']='00026000000590';
$arrimgs['00026100000025']='00026100000025';
$arrimgs['00026100000026']='00026100000026';
$arrimgs['00026100000027']='00026100000027';
$arrimgs['00026100000028']='00026100000028';
$arrimgs['00026100000029']='00026100000029';
$arrimgs['00026100000030']='00026100000030';
$arrimgs['00026100000031']='00026100000031';
$arrimgs['00026100000032']='00026100000032';
$arrimgs['00026100000033']='00026100000033';
$arrimgs['00026000000592']='00026000000592';
$arrimgs['00026000000598']='00026000000598';
$arrimgs['00026100000034']='00026100000034';
$arrimgs['00026000000663']='00026000000663';
$arrimgs['00026000000597']='00026000000597';
$arrimgs['00026000000591']='00026000000591';
$arrimgs['00026000000596']='00026000000596';
$arrimgs['00026000000593']='00026000000593';
$arrimgs['00026000000594']='00026000000594';
$arrimgs['00026000000595']='00026000000595';
$arrimgs['00026000000599']='00026000000599';
$arrimgs['00026000000610']='00026000000610';
$arrimgs['00026000000609']='00026000000609';
$arrimgs['00026000000607']='00026000000607';
$arrimgs['00026000000608']='00026000000608';
$arrimgs['00026000000664']='00026000000664';
$arrimgs['00026000000611']='00026000000611';
$arrimgs['00026000000617']='00026000000617';
$arrimgs['00026000000612']='00026000000612';
$arrimgs['00026000000613']='00026000000613';
$arrimgs['00026000000614']='00026000000614';
$arrimgs['00026000000615']='00026000000615';
$arrimgs['00026000000616']='00026000000616';
$arrimgs['00026000000660']='00026000000660';
$arrimgs['00026000000661']='00026000000661';
$arrimgs['00026000000662']='00026000000662';
$arrimgs['00026000000657']='00026000000657';
$arrimgs['00026000000658']='00026000000658';
$arrimgs['00026000000659']='00026000000659';
$arrimgs['00026100000035']='00026100000035';
$arrimgs['00026100000036']='00026100000036';
$arrimgs['00026100000037']='00026100000037';
$arrimgs['00026100000038']='00026100000038';
$arrimgs['00026100000039']='00026100000039';
$arrimgs['00026000000653']='00026000000653';
$arrimgs['00026000000654']='00026000000654';
$arrimgs['00026000000656']='00026000000656';
$arrimgs['00026000000655']='00026000000655';
$arrimgs['00026100000040']='00026100000040';
$arrimgs['00026100000041']='00026100000041';
$arrimgs['00026100000042']='00026100000042';
$arrimgs['00026100000043']='00026100000043';
$arrimgs['00026000000636']='00026000000636';
$arrimgs['00026100000044']='00026100000044';
$arrimgs['00026100000045']='00026100000045';
$arrimgs['00026100000046']='00026100000046';
$arrimgs['00026100000047']='00026100000047';
$arrimgs['00026100000048']='00026100000048';
$arrimgs['00026100000049']='00026100000049';
$arrimgs['00026100000050']='00026100000050';
$arrimgs['00026000000606']='00026000000606';
$arrimgs['00026000000603']='00026000000603';
$arrimgs['00026000000602']='00026000000602';
$arrimgs['00026000000600']='00026000000600';
$arrimgs['00026000000605']='00026000000605';
$arrimgs['00026000000604']='00026000000604';
$arrimgs['00026000000601']='00026000000601';
$arrimgs['00026100000051']='00026100000051';
$arrimgs['00026100000056']='00026100000056';
$arrimgs['00026000000649']='00026000000649';
$arrimgs['00026000000650']='00026000000650';
$arrimgs['00026000000651']='00026000000651';
$arrimgs['00026100000042']='00026100000042';
$arrimgs['00026100000057']='00026100000057';
$arrimgs['00026100000058']='00026100000058';
$arrimgs['00026100000059']='00026100000059';
$arrimgs['00026100000060']='00026100000060';
$arrimgs['00026100000061']='00026100000061';
$arrimgs['00026100000063']='00026100000063';
$arrimgs['00026100000064']='00026100000064';
$arrimgs['00026100000065']='00026100000065';
$arrimgs['00026100000066']='00026100000066';
$arrimgs['00026100000067']='00026100000067';
$arrimgs['00026100000068']='00026100000068';
$arrimgs['00026000000639']='00026000000639';
$arrimgs['00026000000640']='00026000000640';
$arrimgs['00026000000641']='00026000000641';
$arrimgs['00026000000642']='00026000000642';
$arrimgs['00026000000643']='00026000000643';
$arrimgs['00026000000582']='00026000000582';
$arrimgs['00026001000024']='00026001000024';
$arrimgs['00026001000025']='00026001000025';
$arrimgs['00026001000026']='00026001000026';
$arrimgs['00026000000583']='00026000000583';
$arrimgs['00026000000584']='00026000000584';
$arrimgs['00026000000585']='00026000000585';
$arrimgs['00026000000586']='00026000000586';
$arrimgs['00026000000587']='00026000000587';
$arrimgs['00026000000588']='00026000000588';
$arrimgs['00026000000644']='00026000000644';
$arrimgs['00026000000648']='00026000000648';
$arrimgs['00026100000069']='00026100000069';
$arrimgs['00026100000070']='00026100000070';
$arrimgs['00026100000071']='00026100000071';
$arrimgs['00026100000072']='00026100000072';
$arrimgs['00026000000646']='00026000000646';
$arrimgs['00026000000637']='00026000000637';
$arrimgs['00026000000638']='00026000000638';
$arrimgs['00026000000647']='00026000000647';
$arrimgs['00026000000618']='00026000000618';
$arrimgs['00026000000621']='00026000000621';
$arrimgs['00026000000624']='00026000000624';
$arrimgs['00026000000625']='00026000000625';
$arrimgs['00026000000626']='00026000000626';
$arrimgs['00026000000627']='00026000000627';
$arrimgs['00026000000619']='00026000000619';
$arrimgs['00026000000622']='00026000000622';
$arrimgs['00026000000628']='00026000000628';
$arrimgs['00026000000629']='00026000000629';
$arrimgs['00026000000630']='00026000000630';
$arrimgs['00026000000631']='00026000000631';
$arrimgs['00026000000620']='00026000000620';
$arrimgs['00026000000623']='00026000000623';
$arrimgs['00026000000632']='00026000000632';
$arrimgs['00026000000633']='00026000000633';
$arrimgs['00026000000634']='00026000000634';
$arrimgs['00026000000635']='00026000000635';
$arrimgs['00026000000669']='00026000000669';
$arrimgs['00026000000672']='00026000000672';
$arrimgs['00026000000668']='00026000000668';
$arrimgs['00026000000678']='00026000000678';
$arrimgs['00026000000667']='00026000000667';
$arrimgs['00026000000673']='00026000000673';
$arrimgs['00026000000680']='00026000000680';
$arrimgs['00026000000670']='00026000000670';
$arrimgs['00026000000676']='00026000000676';
$arrimgs['00026000000674']='00026000000674';
$arrimgs['00026000000681']='00026000000681';
$arrimgs['00026000000665']='00026000000665';
$arrimgs['00026000000566']='00026000000566';
$arrimgs['00026000000573']='00026000000573';
$arrimgs['00026000000567']='00026000000567';
$arrimgs['00026000000570']='00026000000570';
$arrimgs['00026000000569']='00026000000569';
$arrimgs['00026000000571']='00026000000571';
$arrimgs['00026000000568']='00026000000568';
$arrimgs['00026000000572']='00026000000572';
$arrimgs['00026000000558']='00026000000558';
$arrimgs['00026000000565']='00026000000565';
$arrimgs['00026000000559']='00026000000559';
$arrimgs['00026000000562']='00026000000562';
$arrimgs['00026000000561']='00026000000561';
$arrimgs['00026000000563']='00026000000563';
$arrimgs['00026000000560']='00026000000560';
$arrimgs['00026000000564']='00026000000564';
$arrimgs['00026000000683']='00026000000683';
$arrimgs['00026000000684']='00026000000684';
$arrimgs['00026000000688']='00026000000688';
$arrimgs['00026000000685']='00026000000685';
$arrimgs['00026000000686']='00026000000686';
$arrimgs['00026000000687']='00026000000687';
$arrimgs['00026000000525']='00026000000525';
$arrimgs['00026000000812']='00026000000812';
$arrimgs['00026000000526']='00026000000526';
$arrimgs['00026000000524']='00026000000524';
$arrimgs['00026000000527']='00026000000527';
$arrimgs['00026000000773']='00026000000773';
$arrimgs['00026000000780']='00026000000780';
$arrimgs['00026000000770']='00026000000770';
$arrimgs['00026000000777']='00026000000777';
$arrimgs['00026000000785']='00026000000785';
$arrimgs['00026000000782']='00026000000782';
$arrimgs['00026000000783']='00026000000783';
$arrimgs['00026000000769']='00026000000769';
$arrimgs['00026000000781']='00026000000781';
$arrimgs['00026000000779']='00026000000779';
$arrimgs['00026000000793']='00026000000793';
$arrimgs['00026000000797']='00026000000797';
$arrimgs['00026000000791']='00026000000791';
$arrimgs['00026000000795']='00026000000795';
$arrimgs['00026000000790']='00026000000790';
$arrimgs['00026000000796']='00026000000796';
$arrimgs['00026000000798']='00026000000798';
$arrimgs['00026000000799']='00026000000799';
$arrimgs['00026000000792']='00026000000792';
$arrimgs['00026000000794']='00026000000794';
$arrimgs['00026000000787']='00026000000787';
$arrimgs['00026000000774']='00026000000774';
$arrimgs['00026000000788']='00026000000788';
$arrimgs['00026000000768']='00026000000768';
$arrimgs['00026000000772']='00026000000772';
$arrimgs['00026000000671']='00026000000671';
$arrimgs['00026000000675']='00026000000675';
$arrimgs['00026000000677']='00026000000677';
$arrimgs['00026000000666']='00026000000666';
$arrimgs['00026000000679']='00026000000679';
$arrimgs['00026000000682']='00026000000682';
$arrimgs['00026000000574']='00026000000574';
$arrimgs['00026000000581']='00026000000581';
$arrimgs['00026000000575']='00026000000575';
$arrimgs['00026000000578']='00026000000578';
$arrimgs['00026000000577']='00026000000577';
$arrimgs['00026000000579']='00026000000579';
$arrimgs['00026000000576']='00026000000576';
$arrimgs['00026000000580']='00026000000580';
$arrimgs['00026000000776']='00026000000776';
$arrimgs['00026000000771']='00026000000771';
$arrimgs['00026000000775']='00026000000775';
$arrimgs['00026000000778']='00026000000778';
$arrimgs['00026000000784']='00026000000784';
$arrimgs['00026000000531']='00026000000531';
$arrimgs['00026000000530']='00026000000530';
$arrimgs['00026000000528']='00026000000528';
$arrimgs['00026000000529']='00026000000529';
$arrimgs['00026100000079']='00026100000079';
$arrimgs['00026100000080']='00026100000080';
$arrimgs['00026100000081']='00026100000081';
$arrimgs['00026100000082']='00026100000082';
$arrimgs['00026100000083']='00026100000083';
$arrimgs['00026100000084']='00026100000084';
$arrimgs['00026100000087']='00026100000087';
$arrimgs['00026000000645']='00026000000645';
$arrimgs['00026100000102']='00026100000102';
$arrimgs['00026100000109']='00026100000109';
$arrimgs['00026100000110']='00026100000110';
$arrimgs['00026100000111']='00026100000111';
$arrimgs['00026000000506']='00026000000506';
$arrimgs['00026000000508']='00026000000508';
$arrimgs['00026000000509']='00026000000509';
$arrimgs['00026000000511']='00026000000511';
$arrimgs['00026000000510']='00026000000510';
$arrimgs['00026000000507']='00026000000507';
$arrimgs['00026000000518']='00026000000518';
$arrimgs['00026000000519']='00026000000519';
$arrimgs['00026000000520']='00026000000520';
$arrimgs['00026001000051']='00026001000051';
$arrimgs['00026001000052']='00026001000052';
$arrimgs['00026001000053']='00026001000053';
$arrimgs['00026001000054']='00026001000054';
$arrimgs['00026001000055']='00026001000055';
$arrimgs['00026001000056']='00026001000056';
$arrimgs['00026001000057']='00026001000057';
$arrimgs['00026000000521']='00026000000521';
$arrimgs['00026000000522']='00026000000522';
$arrimgs['00026000000523']='00026000000523';
$arrimgs['00026001000022']='00026001000022';
$arrimgs['00026001000023']='00026001000023';
$arrimgs['00026001000027']='00026001000027';
$arrimgs['00026001000028']='00026001000028';
$arrimgs['00026001000029']='00026001000029';
$arrimgs['00026001000030']='00026001000030';
$arrimgs['00026001000031']='00026001000031';
$arrimgs['00026001000032']='00026001000032';
$arrimgs['00026001000033']='00026001000033';
$arrimgs['00026001000034']='00026001000034';
$arrimgs['00026001000035']='00026001000035';
$arrimgs['00026001000036']='00026001000036';
$arrimgs['00026001000037']='00026001000037';
$arrimgs['00026001000038']='00026001000038';
$arrimgs['00026001000039']='00026001000039';
$arrimgs['00026001000040']='00026001000040';
$arrimgs['00026001000041']='00026001000041';
$arrimgs['00026001000042']='00026001000042';
$arrimgs['00026001000043']='00026001000043';
$arrimgs['00026001000044']='00026001000044';
$arrimgs['00009001000009']='00009001000009';
$arrimgs['00009001000010']='00009001000010';
$arrimgs['00009001000011']='00009001000011';
$arrimgs['00026000000012']='00026000000012';
$arrimgs['00026000000011']='00026000000011';
$arrimgs['00026000000013']='00026000000013';
$arrimgs['00026000000032']='00026000000032';
$arrimgs['00026000000041']='00026000000041';
$arrimgs['00026000000072']='00026000000072';
$arrimgs['00008007000000']='00008007000000';
$arrimgs['00008007010001']='00008007010001';
$arrimgs['00008007080000']='00008007080000';
$arrimgs['00008001000033']='00008001000033';
$arrimgs['00008001000034']='00008001000034';
$arrimgs['00008001000014']='00008001000014';
$arrimgs['00008001000015']='00008001000015';
$arrimgs['00008001010000']='00008001010000';
$arrimgs['00008001000013']='00008001000013';
$arrimgs['00089001000000']='00089001000000';
$arrimgs['00089001000001']='00089001000001';
$arrimgs['00089001000002']='00089001000002';
$arrimgs['00089001000003']='00089001000003';
$arrimgs['00089001000004']='00089001000004';
$arrimgs['00089001000005']='00089001000005';
$arrimgs['00089002000000']='00089002000000';
$arrimgs['00089002000001']='00089002000001';
$arrimgs['00089002000002']='00089002000002';
$arrimgs['00089002000003']='00089002000003';
$arrimgs['00089002000004']='00089002000004';
$arrimgs['00089002000005']='00089002000005';
$arrimgs['00066001000006']='00066001000006';
$arrimgs['00066001000007']='00066001000007';
$arrimgs['00066006010001']='00066006010001';
$arrimgs['00026700000000']='00026700000000';
$arrimgs['00026700000001']='00026700000001';
$arrimgs['00026700000002']='00026700000002';
$arrimgs['00006008050000']='00006008050000';
$arrimgs['00006008060000']='00006008060000';
$arrimgs['00006008070000']='00006008070000';
$arrimgs['00006009050000']='00006009050000';
$arrimgs['00006009060000']='00006009060000';
$arrimgs['00006009070000']='00006009070000';
$arrimgs['00103000000008']='00103000000008';
$arrimgs['00103000000009']='00103000000009';
$arrimgs['00103000000010']='00103000000010';
$arrimgs['00103000000011']='00103000000011';
$arrimgs['00103000000012']='00103000000012';
$arrimgs['00103000000013']='00103000000013';
$arrimgs['00103000000014']='00103000000014';
$arrimgs['00103000000015']='00103000000015';
$arrimgs['00102000000006']='00102000000006';
$arrimgs['00102000000007']='00102000000007';
$arrimgs['00102000000008']='00102000000008';
$arrimgs['00102000000009']='00102000000009';
$arrimgs['00102000000010']='00102000000010';
$arrimgs['00102000000011']='00102000000011';
$arrimgs['00026000000350']='00026000000350';
$arrimgs['00026000000351']='00026000000351';
$arrimgs['00026000000352']='00026000000352';
$arrimgs['00026000000353']='00026000000353';
$arrimgs['00026000000354']='00026000000354';
$arrimgs['00026000000355']='00026000000355';
$arrimgs['00026000000356']='00026000000356';
$arrimgs['00026000000357']='00026000000357';
$arrimgs['00026000000358']='00026000000358';
$arrimgs['00026000000359']='00026000000359';
$arrimgs['00026000000360']='00026000000360';
$arrimgs['00026000000361']='00026000000361';
$arrimgs['00011008020000']='00011008020000';
$arrimgs['00011008020001']='00011008020001';
$arrimgs['00011008050000']='00011008050000';
$arrimgs['00011000000018']='00011000000018';
$arrimgs['00011009050000']='00011009050000';
$arrimgs['00011009050001']='00011009050001';
$arrimgs['00011000000019']='00011000000019';
$arrimgs['00011000000020']='00011000000020';
$arrimgs['00100000000009']='00100000000009';
$arrimgs['00100000000010']='00100000000010';
$arrimgs['00100000000011']='00100000000011';
$arrimgs['00100000000012']='00100000000012';
$arrimgs['00100000000013']='00100000000013';
$arrimgs['00100000000014']='00100000000014';
$arrimgs['00100000000015']='00100000000015';
$arrimgs['00100000000016']='00100000000016';
$arrimgs['00100000000017']='00100000000017';
$arrimgs['00101000000026']='00101000000026';
$arrimgs['00101000000027']='00101000000027';
$arrimgs['00008000000005']='00008000000005';
$arrimgs['00008000000006']='00008000000006';
$arrimgs['00008000000007']='00008000000007';
$arrimgs['00008000000008']='00008000000008';
$arrimgs['00008000000009']='00008000000009';
$arrimgs['00008000000010']='00008000000010';
$arrimgs['00008000000011']='00008000000011';
$arrimgs['00008000000012']='00008000000012';
$arrimgs['00008000000013']='00008000000013';
$arrimgs['00009001000000']='00009001000000';
$arrimgs['00009001000013']='00009001000013';
$arrimgs['00009000000000']='00009000000000';
$arrimgs['00009000000001']='00009000000001';
$arrimgs['00009001000038']='00009001000038';
$arrimgs['00009001000007']='00009001000007';
$arrimgs['00009000000002']='00009000000002';
$arrimgs['00009000000003']='00009000000003';
$arrimgs['00009000000004']='00009000000004';
$arrimgs['00009001000021']='00009001000021';
$arrimgs['00009001000022']='00009001000022';
$arrimgs['00009000000005']='00009000000005';
$arrimgs['00009000000006']='00009000000006';
$arrimgs['00009000000007']='00009000000007';
$arrimgs['00009000000008']='00009000000008';
$arrimgs['00009017000002']='00009017000002';
$arrimgs['00009000000009']='00009000000009';
$arrimgs['00009000000010']='00009000000010';
$arrimgs['00009001010002']='00009001010002';
$arrimgs['00009001000005']='00009001000005';
$arrimgs['00009013000001']='00009013000001';
$arrimgs['00009013000002']='00009013000002';
$arrimgs['00009013000003']='00009013000003';
$arrimgs['00009000000011']='00009000000011';
$arrimgs['00009000000012']='00009000000012';
$arrimgs['00009000000013']='00009000000013';
$arrimgs['00009000000014']='00009000000014';
$arrimgs['00009000000015']='00009000000015';
$arrimgs['00009001000016']='00009001000016';
$arrimgs['00009001000017']='00009001000017';
$arrimgs['00009001000018']='00009001000018';
$arrimgs['00009001000019']='00009001000019';
$arrimgs['00009001000020']='00009001000020';
$arrimgs['00026057000003']='00026057000003';
$arrimgs['00026057000004']='00026057000004';
$arrimgs['00026000000370']='00026000000370';
$arrimgs['00026057000008']='00026057000008';
$arrimgs['00026057000007']='00026057000007';
$arrimgs['00006002010000']='00006002010000';
$arrimgs['00006002020000']='00006002020000';
$arrimgs['00006002030000']='00006002030000';
$arrimgs['00006002040000']='00006002040000';
$arrimgs['00006003010000']='00006003010000';
$arrimgs['00006003030000']='00006003030000';
$arrimgs['00006003040000']='00006003040000';
$arrimgs['00006000000005']='00006000000005';
$arrimgs['00006000000006']='00006000000006';
$arrimgs['00006000000007']='00006000000007';
$arrimgs['00006000000008']='00006000000008';
$arrimgs['00089002000007']='00089002000007';
$arrimgs['00089002000010']='00089002000010';
$arrimgs['00089002000006']='00089002000006';
$arrimgs['00089002000009']='00089002000009';
$arrimgs['00089002000008']='00089002000008';
$arrimgs['00026001000018']='00026001000018';
$arrimgs['00026001000019']='00026001000019';
$arrimgs['00009001000027']='00009001000027';
$arrimgs['00009001000028']='00009001000028';
$arrimgs['00009001000029']='00009001000029';
$arrimgs['00009001000030']='00009001000030';
$arrimgs['00009001000031']='00009001000031';
$arrimgs['00009001000032']='00009001000032';
$arrimgs['00009001000033']='00009001000033';
$arrimgs['00009001000034']='00009001000034';
$arrimgs['00009001000035']='00009001000035';
$arrimgs['00009001000036']='00009001000036';
$arrimgs['00009001000037']='00009001000037';
$arrimgs['00026000000715']='00026000000715';
$arrimgs['00026000000699']='00026000000699';
$arrimgs['00026000000697']='00026000000697';
$arrimgs['00026000000701']='00026000000701';
$arrimgs['00026000000689']='00026000000689';
$arrimgs['00026000000690']='00026000000690';
$arrimgs['00026000000707']='00026000000707';
$arrimgs['00026000000691']='00026000000691';
$arrimgs['00026000000723']='00026000000723';
$arrimgs['00026000000785']='00026000000785';
$arrimgs['00026000000789']='00026000000789';
$arrimgs['00026000000695']='00026000000695';
$arrimgs['00026000000698']='00026000000698';
$arrimgs['00026000000712']='00026000000712';
$arrimgs['00026000000705']='00026000000705';
$arrimgs['00026000000703']='00026000000703';
$arrimgs['00026000000700']='00026000000700';
$arrimgs['00026000000724']='00026000000724';
$arrimgs['00026000000733']='00026000000733';
$arrimgs['00026000000750']='00026000000750';
$arrimgs['00026000000738']='00026000000738';
$arrimgs['00026000000735']='00026000000735';
$arrimgs['00026000000739']='00026000000739';
$arrimgs['00026000000734']='00026000000734';
$arrimgs['00026000000741']='00026000000741';
$arrimgs['00026000000740']='00026000000740';
$arrimgs['00026000000751']='00026000000751';
$arrimgs['00026000000746']='00026000000746';
$arrimgs['00026000000752']='00026000000752';
$arrimgs['00026000000736']='00026000000736';
$arrimgs['00026000000744']='00026000000744';
$arrimgs['00026000000743']='00026000000743';
$arrimgs['00026000000753']='00026000000753';
$arrimgs['00026000000749']='00026000000749';
$arrimgs['00026000000754']='00026000000754';
$arrimgs['00026000000732']='00026000000732';
$arrimgs['00026000000725']='00026000000725';
$arrimgs['00026000000716']='00026000000716';
$arrimgs['00026000000710']='00026000000710';
$arrimgs['00026000000709']='00026000000709';
$arrimgs['00026000000726']='00026000000726';
$arrimgs['00026000000692']='00026000000692';
$arrimgs['00026000000718']='00026000000718';
$arrimgs['00026000000727']='00026000000727';
$arrimgs['00026000000693']='00026000000693';
$arrimgs['00026000000708']='00026000000708';
$arrimgs['00026000000702']='00026000000702';
$arrimgs['00026000000696']='00026000000696';
$arrimgs['00026000000706']='00026000000706';
$arrimgs['00026000000728']='00026000000728';
$arrimgs['00026000000729']='00026000000729';
$arrimgs['00026000000714']='00026000000714';
$arrimgs['00026000000711']='00026000000711';
$arrimgs['00026000000730']='00026000000730';
$arrimgs['00026000000748']='00026000000748';
$arrimgs['00026000000755']='00026000000755';
$arrimgs['00026000000745']='00026000000745';
$arrimgs['00026000000737']='00026000000737';
$arrimgs['00026000000756']='00026000000756';
$arrimgs['00026000000742']='00026000000742';
$arrimgs['00026000000747']='00026000000747';
$arrimgs['00026000000757']='00026000000757';
$arrimgs['00026000000758']='00026000000758';
$arrimgs['00026000000717']='00026000000717';
$arrimgs['00026000000731']='00026000000731';
$arrimgs['00026000000704']='00026000000704';
$arrimgs['00026000000719']='00026000000719';
$arrimgs['00026000000722']='00026000000722';
$arrimgs['00026000000721']='00026000000721';
$arrimgs['00026000000720']='00026000000720';
$arrimgs['00026000000713']='00026000000713';
$arrimgs['00026000000693']='00026000000693';
$arrimgs['00026000000764']='00026000000764';
$arrimgs['00026000000765']='00026000000765';
$arrimgs['00026000000761']='00026000000761';
$arrimgs['00026000000766']='00026000000766';
$arrimgs['00026000000760']='00026000000760';
$arrimgs['00026000000759']='00026000000759';
$arrimgs['00026000000762']='00026000000762';
$arrimgs['00026000000763']='00026000000763';
$arrimgs['00026000000767']='00026000000767';
$arrimgs['00026000000548']='00026000000548';
$arrimgs['00026000000549']='00026000000549';
$arrimgs['00026000000534']='00026000000534';
$arrimgs['00026000000535']='00026000000535';
$arrimgs['00026000000532']='00026000000532';
$arrimgs['00026000000533']='00026000000533';
$arrimgs['00026000000538']='00026000000538';
$arrimgs['00026000000539']='00026000000539';
$arrimgs['00026000000536']='00026000000536';
$arrimgs['00026000000537']='00026000000537';
$arrimgs['00026000000542']='00026000000542';
$arrimgs['00026000000543']='00026000000543';
$arrimgs['00026000000540']='00026000000540';
$arrimgs['00026000000541']='00026000000541';
$arrimgs['00026000000546']='00026000000546';
$arrimgs['00026000000547']='00026000000547';
$arrimgs['00026000000544']='00026000000544';
$arrimgs['00026000000545']='00026000000545';
$arrimgs['00026000000514']='00026000000514';
$arrimgs['00026000000517']='00026000000517';
$arrimgs['00026000000513']='00026000000513';
$arrimgs['00026000000516']='00026000000516';
$arrimgs['00026000000512']='00026000000512';
$arrimgs['00026000000515']='00026000000515';
$arrimgs['00026000000800']='00026000000800';
$arrimgs['00026000000801']='00026000000801';
$arrimgs['00026000000802']='00026000000802';
$arrimgs['00026000000803']='00026000000803';
$arrimgs['00026000000804']='00026000000804';
$arrimgs['00026000000805']='00026000000805';
$arrimgs['00026000000806']='00026000000806';
$arrimgs['00026000000807']='00026000000807';
$arrimgs['00026000000808']='00026000000808';
$arrimgs['00026000000809']='00026000000809';
$arrimgs['00026000000810']='00026000000810';
$arrimgs['00026000000811']='00026000000811';
foreach ($query as $row) {
	if(in_array($row->reference,$arrimgs)) {
		$bien=$bien+1;
	}
}
echo "<p>Hay ".count($arrimgs)." referencias en sillamania, de las cuales ".$bien." están en la bbdd vieja (".(round($bien/count($arrimgs),2)*100)."%).</p>";
foreach ($query as $row) {
	if(in_array($row->reference,$arrimgs)) {
		$reference=$row->reference;
		echo "<p>Match ".$reference." con ".$row->id_product."</p>";
		if($row->combi==0) {
			$que="SELECT * from ps_image a left join ps_image_lang b on a.id_image=b.id_image and b.id_lang=1 where id_product='".$row->id_product."'";
		} else {
			$que="SELECT * from ps_image a left join ps_image_lang b on a.id_image=b.id_image and b.id_lang=1 where id_product='".$row->id_product."' AND a.id_image IN (SELECT `id_image` FROM `ps_product_attribute_image` WHERE `id_product_attribute`='".$row->combi."')";
		}
		$query3 = $mydb->get_results( $que, OBJECT );
		foreach ($query3 as $row3) {
			$row3->reference=$reference;
			$row3->url="http://promosillas.com/tiendaonline/img/p/".implode('/',str_split($row3->id_image))."/".$row3->id_image.".jpg";
			$imagenes[$row3->reference][]=$row3;
		};
	}
}
print_r($imagenes);