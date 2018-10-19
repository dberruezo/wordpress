<?php include_once("vendor/autoload.php"); 
error_reporting(E_ALL);
ini_set('display_errors',1);
use clases\Objeto;
$objeto = new Objeto();
// PhpOffice
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Shared_Font;
use PHPExcel_Style_Border;
use PHPExcel_Style_Borders;
use PHPExcel_Style_Alignment;
use PHPExcel_Worksheet_PageSetup;
// Var
$referencias_raul  = array();
$referencias_jordi = array();
$result            = array();
$urls              = array();
// Excel Jordi
$fileName = realpath(dirname(__FILE__) . './seleccion_articulos.xls');
$fileType = 'Excel5';
$objReader = PHPExcel_IOFactory::createReader($fileType);
$objPHPExcel = $objReader->load($fileName);
$objPHPExcel->setActiveSheetIndex(0);
// Excel Raul
$fileName = realpath(dirname(__FILE__) . './tablas_import.xls');
$fileType = 'Excel5';
$objReader = PHPExcel_IOFactory::createReader($fileType);
$objPHPExcel_raul = $objReader->load($fileName);
$objPHPExcel_raul->setActiveSheetIndex(0);
for ($fila=2;$fila<724;$fila++){
    $temp = array();
    $temp['id_producto'] = trim($objPHPExcel->getActiveSheet()->getCell('A'.$fila)->getValue());
    $temp['referencia']  = trim($objPHPExcel->getActiveSheet()->getCell('B'.$fila)->getValue());
    array_push($referencias_jordi,$temp);
}

for ($fila=2;$fila<180;$fila++){
    array_push($referencias_raul,trim($objPHPExcel_raul->getActiveSheet()->getCell('I'.$fila)->getValue()));
}

foreach ($referencias_jordi as $key => $ref){
    echo "-------------- referencia jordi ------------<br>";
    echo "ref: ".$ref['id_producto']."<br>";
    echo "key: ".$ref['referencia']."<br>";
    echo "-------------- fin referencia jordi ------------<br>";
    
    foreach ($referencias_raul as $raul){
        if ($raul == $ref["referencia"]){
            echo "encontrado<br>";
            array_push($result, $ref["id_producto"]);
        }
    }
}
$contador = 0;
foreach($result as $id){
    if ($contador == 0){
        $url = "http://promosillas.com/tiendaonline/img/p/".implode('/',str_split($id))."/".$id.".jpg";;
        echo $url."<br>";
        array_push($urls,$url);
        $imagen = $id.".jpg";
        array_push($urls,$url);
        grab_image($url,$imagen);
        $contador++;
    }
}
print_r($result);
echo "<br><br>";
//print_r($urls);

function grab_image($url,$saveto){
    $username = "jgallart@ofiprix.com";
    $password = "123456";
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch); 

    /*
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000); 
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    */
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
}
?>
