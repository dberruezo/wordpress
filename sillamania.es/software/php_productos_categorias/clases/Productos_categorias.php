<?php
namespace clases;
include_once("vendor/autoload.php"); 
// PhpOffice
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Shared_Font;
use PHPExcel_Style_Border;
use PHPExcel_Style_Borders;
use PHPExcel_Style_Alignment;
use PHPExcel_Worksheet_PageSetup;

class Productos_categorias{
    
    private $vector_categoria_uno = array(
        "SILLA DE OFICINA"          => 4,
        "SILLAS OFICINA"            => 4,
        "SILLONES DE OFICINA"       => 4,
        "SILLONES OFICINA"          => 4,
        "SILLAS HOGAR"              => 5 ,
        "SILLAS HOSTELERIA"         => 6 ,
        "ACCESORIOS"                => 28, 
        "TABURETES"                 => 29, 
        "SILLAS OPERATIVAS"         => 7 ,
        "SILLONES DE DIRECCION"     => 8 ,
        "SILLAS DE ORDENADOR"       => 9 ,
        "SILLAS ORDENADOR"          => 9 ,
        "SILLAS ERGONOMICAS"        => 10, 
        "SILLONES EN PIEL NATURAL"  => 11, 
        "SILLAS CONFIDENTE"         => 12, 
        "SILLAS DE VISITA"          => 13,
        "SILLAS VISITA"             => 13,
        "SILLAS GAMING"             => 14, 
        "SILLAS MESAS REUNION"      => 15, 
        "SILLAS PARA MESAS REUNION" => 15,
        "SOFAS RECEPCION"           => 16, 
        "SILLAS COCINA"             => 17, 
        "SILLAS COMEDOR"            => 18, 
        "SILLAS GAMING"             => 19, 
            "SILLAS DISENO"             => 20,
            "SILLAS DISEÑO"             => 20,
        "SILLONES RELAX"            => 21, 
            "SILLAS DE DISENO"          => 22,  
            "SILLAS DISEÑO"             => 22,
        "SILLAS PARA ESCUELAS"      => 23, 
        "SILLAS POLIURETANO"        => 24, 
        "SILLAS MADERA"             => 25, 
        "SILLAS METALICAS"          => 26, 
        "SILLAS METAL"              => 26,
        "SILLAS TAPIZADAS"          => 27 
    );

    /*
    silla de oficina           4      
    sillas hogar5 
    sillas hosteleria6 
    sillas operativas7 
    sillones de direccion8 
    sillas de ordenador9 
    sillas ergonomicas10
    sillones en piel natural11
    sillas confidente12
    sillas de visita13
    sillas gaming14
    sillas mesas reunion15
    sofas recepcion16
    sillas cocina17
    sillas comedor18
    sillas gaming19
    sillas diseno20
    sillones relax21
    sillas de diseno    22
    sillas para escuelas23
    sillas poliuretano24
    sillas madera25
    sillas metalicas26
    sillas tapizadas27
    accesorios28
    taburetes29
    */

    private $vector_jerarquia = array(
        2 => array(
            "nombre"    => "root",
            "parent"    => -1
        ),

        4 => array(
            "nombre"    => "silla de oficina",
            "parent"    => 2
        ),
        5 => array(
            "nombre"    => "sillas hogar",
            "parent"    => 2
        ),
        6 => array(
            "nombre"    => "sillas hosteleria",
            "parent"    => 2
        ),
        28 => array(
            "nombre"    => "accesorios",
            "parent"    => 2
        ), 
        
        7 => array(
            "nombre"    => "sillas operativas",    
            "parent"    => 4
        ),
        8 => array(
            "nombre"    => "sillones de direccion",
            "parent"    => 4
        ),
        9 => array(
            "nombre"    => "sillas de ordenador",    
            "parent"    => 4
        ),
        10 => array(
            "nombre"    => "sillas ergonomicas",
            "parent"    => 4
        ),
        11 => array(
             "nombre"    => "sillones en piel natural",    
             "parent"    => 4
        ),
        12 => array(
             "nombre"    => "sillas confidente",    
             "parent"    => 4
        ),
        13 => array(
             "nombre"    => "sillas de visita",       
             "parent"    => 4
        ),   
        14 => array(
              "nombre"    => "sillas gaming",    
              "parent"    => 4
        ),  
        15 => array(
              "nombre"    => "sillas mesas reunion",    
              "parent"    => 4
        ),  
        16 => array(
             "nombre"    => "sofas recepcion",
             "parent"    => 4
        ),
        17 => array(
             "nombre"    => "sillas cocina",
             "parent"    => 5
        ),   
        18 => array(
             "nombre"    => "sillas comedor",
             "parent"    => 5
        ),   
        19 => array(
             "nombre"    => "sillas gaming",
             "parent"    => 5
        ),   
        20 => array(
             "nombre"    => "sillas diseno",
             "parent"    => 5
        ),
        21 => array(
             "nombre"    => "sillones relax",
             "parent"    => 5
       ),    
        22 => array(
             "nombre"   => "sillas de diseno",
             "parent"    => 6
        ),
        23 => array(
             "nombre"   => "sillas para escuelas",    
             "parent"    => 6
        ),
        24 => array(    
            "nombre"    => "sillas poliuretano",    
            "parent"    => 6
        ),
        25 => array(
            "nombre"    => "sillas madera",     
            "parent"    => 6
        ),
        
        26 => array(
            "nombre"    => "sillas metalicas",
            "parent"    => 6
        ), 
        27 => array(
            "nombre"    => "sillas tapizadas",
            "parent"    => 6
        ),
        29 => array(
            "nombre"    => "taburetes",
            "parent"    => 6
        ),

    );

    private $vector_ids = array();

    public function __construct(){
        //echo "Hola automatización<br>";
        // show all errors
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        // no show warnings
        // error_reporting(E_ERROR);
        // ini_set('display_errors',0);
    }

    //$categorias
    public function obtener_id_parent(){
        $númargs = func_num_args();
        /*
        echo "Número de argumentos: $númargs<br />\n";
        if ($númargs >= 2) {
            echo "El segundo argumento es: " . func_get_arg(1) . "<br />\n";
        }
        */
        
        echo "------------ valores --------<br>";
        $arg_list = func_get_args();
        $temp = array();
        for ($i = 0; $i < $númargs; $i++) {
            echo "La categoria es: " . $arg_list[$i];
            foreach($this->vector_categoria_uno as $nombre => $id){
                //echo "nombre: ".$categoria."<br>";
                //echo "categoria: ".$nombre."<br>";
                if ($arg_list[$i] === $nombre){
                    echo " id: ".$id;   
                    array_push($temp,$id);
                    foreach($this->vector_jerarquia as $ide => $vector){
                         if ($ide == $id){
                               echo " parent: ".$vector['parent']."<br>"; 
                               array_push($temp,$vector['parent']);
                        }   
                    }
                }  
            }
        }
        $temp = array_unique($temp);
        $cade = implode(",",$temp);
        echo "ids: ".$cade."<br>";
        array_push($this->vector_ids,$cade); 
        //print_r($this->vector_ids);
        echo "------------ fin valores --------<br><br><br>";
    }

    
    public function create_excel(){
        // Excel Raul
        $fileName = realpath(dirname(__FILE__).'./../tablas_import.xls');
        //echo "El fichero es: ".realpath(dirname(__FILE__))."<br>";
        $fileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel_raul = $objReader->load($fileName);
        $objPHPExcel_raul->setActiveSheetIndex(0);
        for ($fila=2;$fila<180;$fila++){
            $categoria_uno  = $objPHPExcel_raul->getActiveSheet()->getCell('K'.$fila)->getValue();
            //echo $categoria_uno."<br>";
            $categoria_dos  = $objPHPExcel_raul->getActiveSheet()->getCell('L'.$fila)->getValue();
            //$categoria_tres = $objPHPExcel_raul->getActiveSheet()->getCell('M'.$fila)->getValue();
            if ($categoria_uno != "" && $categoria_dos != ""){
                $ids            = $this->obtener_id_parent($categoria_uno,$categoria_dos);
            }else if($categoria_uno != "" && $categoria_dos == ""){
                $ids            = $this->obtener_id_parent($categoria_uno);    
            //}else if($categoria_uno != "" && $categoria_dos == "" && $categoria_tres == ""){
            //    $ids            = $this->obtener_id($categoria_uno);    
            }
            
        }    
        // Excel product categories
        $fileName = realpath(dirname(__FILE__) . './../products_import_categorias.xls');
        $fileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel_products = $objReader->load($fileName);
        $objPHPExcel_products->setActiveSheetIndex(0);
        // Guardamos las categorias de Raul
        $contador = 0;
        for ($fila=2;$fila<180;$fila++){
            $objPHPExcel_products->getActiveSheet()
                ->setCellValue('D'.$fila,$this->vector_ids[$contador]);    
        $contador++;
        }
        // Guardamos el excel
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel_products, 'Excel2007');
        $objWriter->save('productos_categorias.xls');
    }
}
?>