<?php
namespace clases;
include_once("vendor/autoload.php"); 
error_reporting(E_ALL);
ini_set('display_errors',1);
// PhpOffice
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Shared_Font;
use PHPExcel_Style_Border;
use PHPExcel_Style_Borders;
use PHPExcel_Style_Alignment;
use PHPExcel_Worksheet_PageSetup;
class Combinacion{
    
    private $vector_colores_femenino = array(
        "negra" 	=> "negro",
        "roja"		=> "rojo",
        "blanca"	=> "blanco",
    );

    private $vector_colores = array(
        "burdeos" 	=> "variante",
        "aubergine"	=> "verde",
        "perla"		=> "gris",
        "plomo"		=> "gris",
        "grafito"	=> "gris",
        "chocolate" => "marron",
        "madera" 	=> "marron",
        "plata"		=> "gris",
        "pino"		=> "marron",
        "elephant"  => "gris",
        "marrón"    => "marron"
    );

    private $vector_colores_total = array();

    public function __construct(){
        echo "Hola automatización";
    }

    public function create_excel(){
        // Excel Jordi
        /*
        $fileName = realpath(dirname(__FILE__) . './../seleccion_articulos.xls');
        $fileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);
        $objPHPExcel->setActiveSheetIndex(0);
        */    
        // Excel Raul
        $fileName = realpath(dirname(__FILE__).'./../tablas_sillamania2.xls');
        echo "El fichero es: ".realpath(dirname(__FILE__))."<br>";
        $fileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel_raul = $objReader->load($fileName);
        $objPHPExcel_raul->setActiveSheetIndex(0);
        // Excel combinaciones
        // Despues cambiar por csv
        $fileName = realpath(dirname(__FILE__) . './../combinations_import.xls');
        $fileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel_combinations = $objReader->load($fileName);
        $objPHPExcel_combinations->setActiveSheetIndex(0);
        // Guardamos los colores de Raul
        $vectorTotalColores = array();
        $filas_amarillo_rojo = array(
            "48",
            "49",
            "50",
            "51",
            "52",
            "53",
            "54",
            "55",
            "60",
            "62",
            "67",
            "79",
            "80",
            "81",
            "82",
            "87",
            "95",
            "96",
            "97",
            "98",
            "99",
            "100",
            "101",
            "123",
        );
        for ($fila=2;$fila<584;$fila++){
            $encontrado = false;
            foreach($filas_amarillo_rojo as $fila_amarillo){
                if ($fila == (int)$fila_amarillo){
                    $encontrado = true;
                }
            }
            if ($encontrado == false){
                $temp = $objPHPExcel_raul->getActiveSheet()->getCell('E'.$fila)->getValue();
                $temp = trim($temp);
                $temp = strtolower($temp);
                //$temp = ucfirst($temp);
                array_push($this->vector_colores_total,$temp);   
            }
        }
        
        $imagenes = $this->get_vector();
        //print_r($imagenes);

        $contador = 0;
        foreach($imagenes as $img){
            // Productos
            $reference	= $img["reference"];
            $img_url	= $img["url"];
            $id_product = $img["id_product"];
            $position   = $img["position"];
            $cover		= $img["cover"];
            $legend	    = $img["legend"];
            $img_url	= $img->url;
            echo "El titulo con el color es: ".$legend."<br>";
            $legend = $this->comprobar_color_todos($legend);
            if ($legend == false){
                $legend = $this->convertir_femenino($img["legend"]);
                if ($legend == false){
                    $legend = $this->comprobar_color($img["legend"]);
                }
            }
            $imagenes[$contador]["color"] = $legend;
            $contador++;
        }
            
        // Creamos un nuevo fichero
        // Objeto Excel
        $objPHPExcel = new PHPExcel();
        // Set document properties
        $objPHPExcel->getProperties()->setCreator("David Berruezo")
            ->setLastModifiedBy("David Berruezo")
            ->setTitle("PHPExcel Test Document")
            ->setSubject("PHPExcel Test Document")
            ->setDescription("Test document for PHPExcel, generated using PHP classes.")
            ->setKeywords("office PHPExcel php")
            ->setCategory("Test result file");
        // Set Orientation, size and scaling
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        //$this->objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
        //$this->objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

        // Añadimos titulos
        $labels = array(
            "Product ID*",
            "Attribute (Name:Type:Position)*	Value (Value:Position)*",
            "Supplier reference",
            "Reference",
            "EAN13",
            "UPC",
            "Wholesale price",
            "Impact on price",
            "Ecotax",
            "Quantity",
            "Minimal quantity",
            "Impact on weight",
            "Default (0 = No, 1 = Yes)",
            "Combination available date",
            "Image position",
            "Image URL",
            "Delete existing images (0 = No, 1 = Yes)",
            "ID / Name of shop",
            "Advanced Stock Managment",
            "Depends on stock",
            "Warehouse"
        );
        $chars    = range('A', 'V');
        $contador = 0;
        foreach($labels as $titulo){
            $objPHPExcel->getActiveSheet()
                ->setCellValue($chars[$contador].'1',$titulo);
            $contador++;
        }
        // Añadimos features
        $contador = 2;
        
        /*
        foreach($imagenes as $imagen){
            $objPHPExcel->getActiveSheet()
                ->setCellValue('A'.$contador,$imagen[]);
            //echo "El titulo es: ".$titulo."<br>";
            //echo "El feature es: ".$this->features[$contador]."<br>";
            //array_push($this->values_features,$titulo.$this->features[$contador]."0");
            $contador++;
        }
        */

        foreach($imagenes as $img){
            $objPHPExcel->getActiveSheet()
                ->setCellValue('A'.$contador,$img["id_product"]);
            $objPHPExcel->getActiveSheet()
                ->setCellValue('B'.$contador,'Color:color:0');
            $objPHPExcel->getActiveSheet()
                ->setCellValue('C'.$contador,$img["color"].":0");
            $objPHPExcel->getActiveSheet()
                ->setCellValue('D'.$contador,$img["reference"]);        
            $objPHPExcel->getActiveSheet()
                ->setCellValue('P'.$contador,$img["url"]);
            $objPHPExcel->getActiveSheet()
                ->setCellValue('o'.$contador,$img["position"]); 
           // $objPHPExcel->getActiveSheet()
             //   ->setCellValue('Q'.$contador,$img["url"]);     
                
            // Productos
            /*
            $reference	= $img["reference"];
            $img_url	= $img["url"];
            $id_product = $img["id_product"];
            $position   = $img["position"];
            $cover		= $img["cover"];
            $legend	    = $img["legend"];
            $img_url	= $img->url;
            echo "El titulo con el color es: ".$legend."<br>";
            $legend = $this->comprobar_color_todos($legend);
            if ($legend == false){
                $legend = $this->convertir_femenino($img["legend"]);
                if ($legend == false){
                    $legend = $this->comprobar_color($img["legend"]);
                }
            }
            $imagenes[$contador]["color"] = $legend;
            */
            $contador++;
        }

        // Guardamos el excel
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('plantilla.xls');

        
    }

    public function comprobar_color_todos($legend){
        $findme   = $legend;
        $encontrado = false;
        foreach($this->vector_colores_total as $convertir_color){
            $pos = strpos($legend, $convertir_color);
            if ($pos === false) {
                //echo "La cadena '$findme' no fue encontrada en la cadena '$convertir_color'";
            } else {
                //echo "La cadena '$findme' fue encontrada en la cadena '$convertir_color'";
                echo "encontrado ".$convertir_color."<br><br><br>";
                return ucfirst($convertir_color);
                $encontrado = true;
            }
        }
        if ($encontrado == false){
            return false;
        }
    }

    public function convertir_femenino($legend){
        $findme   = $legend;
        $encontrado = false;
        foreach($this->vector_colores_femenino as $clave_color => $convertir_color){
                $pos = strpos($legend,$clave_color);
                if ($pos === false) {
                    //echo "La cadena '$findme' no fue encontrada en la cadena '$clave_color'";
                } else {
                    //echo "La cadena '$findme' fue encontrada en la cadena '$clave_color'";
                    //echo " y existe en la posición $pos";
                    //return $convertir_color;
                    echo "encontrado ".$convertir_color."<br><br><br>";
                    return ucfirst($convertir_color);
                    $encontrado = true;
                }
            //}
        }
        if ($encontrado == false){
            return false;
        }
    }

    public function comprobar_color($legend){
        $findme   = $legend;
        $encontrado = false;
        foreach($this->vector_colores as $clave_color => $convertir_color){
            $pos = strpos($legend,$clave_color);
            // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
            // porque la posición de 'a' está en el 1° (primer) caracter.
            if ($pos === false) {
                //echo "La cadena '$findme' no fue encontrada en la cadena '$clave_color'";
            } else {
                echo "encontrado ".$convertir_color."<br><br><br>";
                return ucfirst($convertir_color);
                $encontrado = true;
            }
        }
        if ($encontrado == false){
            return false;
        }
    }

    public function get_vector(){
        // create the vector
        $imagenes = array();

        $temp = array();
        $temp["id_product"] = 179696;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Air negra";
        $temp["reference"] = "00026100000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/6/4/3964.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179696;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Air gris";
        $temp["reference"] = "00026100000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/6/8/3968.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179696;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Air azul";
        $temp["reference"] = "00026100000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/7/3/3973.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179696;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Air roja";
        $temp["reference"] = "00026100000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/7/8/3978.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179700;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Acer ecopiel baja blanca";
        $temp["reference"] = "00026100000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/3/4/3934.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179700;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Acer red baja negra";
        $temp["reference"] = "00026100000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/3/8/3938.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179702;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Acer red alta blanca";
        $temp["reference"] = "00026100000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/4/4/3944.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179702;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Acer red alta negra";
        $temp["reference"] = "00026100000012";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/4/8/3948.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179708;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Smart blanca 1";
        $temp["reference"] = "00026100000018";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/7/0/4270.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179708;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Smart negra";
        $temp["reference"] = "00026100000019";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/7/4/4274.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179711;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nicole azul";
        $temp["reference"] = "00026100000021";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/2/5/4325.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179711;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nicole gris";
        $temp["reference"] = "00026100000022";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/2/9/4329.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179711;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nicole negra";
        $temp["reference"] = "00026100000023";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/3/4/4334.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179711;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nicole roja";
        $temp["reference"] = "00026100000024";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/3/9/4339.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179719;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gioconda azul";
        $temp["reference"] = "00026100000025";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/4/1/4141.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179719;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gioconda burdeos";
        $temp["reference"] = "00026100000026";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/4/5/4145.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179719;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gioconda naranja";
        $temp["reference"] = "00026100000027";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/5/0/4150.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179719;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gioconda negra";
        $temp["reference"] = "00026100000028";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/5/5/4155.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179719;
        $temp["position"] = 22;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gioconda gris";
        $temp["reference"] = "00026100000029";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/6/0/4160.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179720;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Kendo negra";
        $temp["reference"] = "00026100000030";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/7/5/4175.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179720;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Kendo azul";
        $temp["reference"] = "00026100000031";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/7/9/4179.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179720;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "";
        $temp["reference"] = "00026100000032";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/8/4/4184.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179720;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Kendo gris";
        $temp["reference"] = "00026100000033";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/8/9/4189.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179725;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Spine negro 1";
        $temp["reference"] = "00026100000035";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/0/0/4200.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179725;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Spine rojo";
        $temp["reference"] = "00026100000036";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/0/4/4204.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179725;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Spine azul";
        $temp["reference"] = "00026100000037";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/0/9/4209.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179725;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Spine gris";
        $temp["reference"] = "00026100000038";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/1/4/4214.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179736;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Sila Keystone aubergine";
        $temp["reference"] = "00026100000045";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/2/0/4220.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179736;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Sila Keystone azul";
        $temp["reference"] = "00026100000046";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/2/4/4224.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179736;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Sila Keystone naranja";
        $temp["reference"] = "00026100000047";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/2/9/4229.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179736;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Sila Keystone negra";
        $temp["reference"] = "00026100000048";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/3/4/4234.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179736;
        $temp["position"] = 21;
        $temp["cover"] = 0;
        $temp["legend"] = "Sila Keystone gris";
        $temp["reference"] = "00026100000049";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/3/9/4239.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179736;
        $temp["position"] = 26;
        $temp["cover"] = 0;
        $temp["legend"] = "Sila Keystone verde";
        $temp["reference"] = "00026100000050";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/4/4/4244.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179749;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia piel blanca 1";
        $temp["reference"] = "00026100000057";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/4/2/4042.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179749;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia piel negra";
        $temp["reference"] = "00026100000058";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/4/6/4046.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179749;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia piel marrón";
        $temp["reference"] = "00026100000059";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/5/1/4051.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179749;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia piel perla";
        $temp["reference"] = "00026100000060";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/5/6/4056.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179749;
        $temp["position"] = 20;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia piel plomo";
        $temp["reference"] = "00026100000061";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/6/1/4061.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179755;
        $temp["position"] = 0;
        $temp["cover"] = 1;
        $temp["legend"] = "Sillon Bahia Patin negro";
        $temp["reference"] = "00026100000064";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/1/9/4119.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179755;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia Patin blanco";
        $temp["reference"] = "00026100000065";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/2/1/4121.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179755;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia Patin marrón";
        $temp["reference"] = "00026100000066";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/2/2/4122.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179755;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia Patin perla";
        $temp["reference"] = "00026100000067";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/2/3/4123.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179755;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Bahia Patin plomo";
        $temp["reference"] = "00026100000068";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/2/4/4124.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179762;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillón Chesterfield blanco 1";
        $temp["reference"] = "00026100000071";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/5/4/3954.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179762;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillón Chesterfield negro";
        $temp["reference"] = "00026100000072";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/5/8/3958.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179769;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maya confidente negra";
        $temp["reference"] = "00026100000079";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/9/4/3894.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179769;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maya confidente gris";
        $temp["reference"] = "00026100000080";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/9/8/3898.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179769;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maya confidente azul";
        $temp["reference"] = "00026100000081";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/0/3/3903.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179769;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "";
        $temp["reference"] = "00026100000082";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/0/8/3908.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4131;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Eros chocolate 1";
        $temp["reference"] = "00006002010000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/8/0/3580.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4131;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Eros blanco";
        $temp["reference"] = "00006002020000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/8/4/3584.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4131;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Eros beige";
        $temp["reference"] = "00006002030000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/8/9/3589.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4131;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Eros negro";
        $temp["reference"] = "00006002040000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/9/4/3594.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4137;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Atenas con elevación chocolate 1";
        $temp["reference"] = "00006003010000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/9/2/3792.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4137;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Atenas con elevación beige";
        $temp["reference"] = "00006003030000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/9/6/3796.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4137;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Atenas con elevación negro";
        $temp["reference"] = "00006003040000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/0/1/3801.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4149;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Seventy blanco detalle";
        $temp["reference"] = "00006008050000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/3/0/1830.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4149;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Seventy negro";
        $temp["reference"] = "00006008060000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/3/2/1832.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4149;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Seventy rojo";
        $temp["reference"] = "00006008070000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/3/4/1834.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4153;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Mirko blanco 1";
        $temp["reference"] = "00006009050000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/3/7/1837.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4153;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Mirko negro";
        $temp["reference"] = "00006009060000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/4/1/1841.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4153;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Mirko rojo";
        $temp["reference"] = "00006009070000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/4/6/1846.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4164;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Stella lacado blanco";
        $temp["reference"] = "00008001010000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/3/7/3/3373.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 4164;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Stella madera 1";
        $temp["reference"] = "00008001000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/3/6/9/3369.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 43768;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Eliot negro 1";
        $temp["reference"] = "00026057000003";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/1/5/1815.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 43768;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Eliot blanco";
        $temp["reference"] = "00026057000004";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/1/9/1819.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 43768;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "";
        $temp["reference"] = "00026000000370";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/2/4/1824.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 43773;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Graffit blanco";
        $temp["reference"] = "00026057000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/0/9/1809.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 43773;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Graffit negro 1";
        $temp["reference"] = "00026057000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/0/5/1805.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 54733;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Metalica Tex blanca";
        $temp["reference"] = "00011008020000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/0/1/6/19016.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 54733;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "";
        $temp["reference"] = "00011008020001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/0/2/0/19020.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 54733;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Metalica Tex negra";
        $temp["reference"] = "00011008050000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/0/2/4/19024.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 54737;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete metálico Job blanco";
        $temp["reference"] = "00011009050000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/9/5/1795.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 54737;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete metálico Job plata";
        $temp["reference"] = "00011009050001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/8/0/0/1800.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 54737;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete metálico Job negro 1";
        $temp["reference"] = "00011000000019";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/9/1/1791.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 65593;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Diva negra";
        $temp["reference"] = "00008007000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/7/7/3777.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 65593;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Diva blanca";
        $temp["reference"] = "00008007010001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/8/1/3781.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 65593;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Diva chocolate";
        $temp["reference"] = "00008007080000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/8/6/3786.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69237;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Cloe Blanco";
        $temp["reference"] = "00089001000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/2/3/3723.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69237;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Cloe Negro";
        $temp["reference"] = "00089001000001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/2/7/3727.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69237;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Cloe Chocolate";
        $temp["reference"] = "00089001000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/3/1/3731.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69237;
        $temp["position"] = 13;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Cloe gris perla";
        $temp["reference"] = "00089001000003";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/3/5/3735.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69237;
        $temp["position"] = 17;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Cloe beige";
        $temp["reference"] = "00089001000004";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/3/9/3739.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69237;
        $temp["position"] = 21;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Cloe antracita";
        $temp["reference"] = "00089001000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/4/3/3743.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69241;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nancy Blanca";
        $temp["reference"] = "00089002000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/5/6/3856.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69241;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nancy Negra";
        $temp["reference"] = "00089002000001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/6/0/3860.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69241;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nancy Chocolate";
        $temp["reference"] = "00089002000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/6/4/3864.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69241;
        $temp["position"] = 13;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nancy Gris Perla";
        $temp["reference"] = "00089002000003";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/6/8/3868.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69241;
        $temp["position"] = 17;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nancy Beige";
        $temp["reference"] = "00089002000004";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/7/2/3872.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 69241;
        $temp["position"] = 21;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nancy Antracita";
        $temp["reference"] = "00089002000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/7/6/3876.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 70759;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Victoria negro";
        $temp["reference"] = "00009001000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/8/9/4389.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 70759;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Victoria blanca";
        $temp["reference"] = "00009001000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/9/4/4394.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 70759;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Victoria gris perla";
        $temp["reference"] = "00009000000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/8/0/4380.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 70759;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Victoria chocolate";
        $temp["reference"] = "00009000000001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/8/4/4384.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 97692;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Elena fresno blanco";
        $temp["reference"] = "00066001000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/2/6/3826.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 97692;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Elena pino claro";
        $temp["reference"] = "00066001000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/3/0/3830.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 97692;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Elena roble gris";
        $temp["reference"] = "00066006010001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/8/3/4/3834.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 122690;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nordic Madera blanca";
        $temp["reference"] = "00026000000012";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/7/1/4071.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 122690;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nordic Madera negra";
        $temp["reference"] = "00026000000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/6/7/4067.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 122690;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nordic Madera gris";
        $temp["reference"] = "00026000000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/7/5/4075.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 122725;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nordic metal blanca";
        $temp["reference"] = "00026000000032";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/2/9/4629.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 122725;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nordic metal negra";
        $temp["reference"] = "00026000000041";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/3/3/4633.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 122725;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nordic metal gris";
        $temp["reference"] = "00026000000072";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/3/8/4638.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 129154;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maya gris plomo";
        $temp["reference"] = "00008001000014";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/7/1/4471.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 129154;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maya chocolate";
        $temp["reference"] = "00008001000015";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/7/5/4475.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 141203;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Auria gris";
        $temp["reference"] = "00009001010002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/2/3/4623.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 141203;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Auria marrón";
        $temp["reference"] = "00009001000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/1/9/4619.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154540;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Gris Auria vintage marrón";
        $temp["reference"] = "00009013000001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/8/9/4589.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154540;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Gris Auria vintage plomo";
        $temp["reference"] = "00009013000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/9/3/4593.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154540;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Gris Auria vintage gris claro";
        $temp["reference"] = "00009013000003";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/9/8/4598.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154542;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Witney gris claro";
        $temp["reference"] = "00009001000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/6/5/4365.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154542;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Witney marrón";
        $temp["reference"] = "00009001000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/6/9/4369.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154542;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Witney plomo";
        $temp["reference"] = "00009001000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/7/4/4374.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154554;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Sofia vintage gris plomo";
        $temp["reference"] = "00009001000016";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/3/3/4433.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154554;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Sofia vintage negra";
        $temp["reference"] = "00009001000017";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/3/7/4437.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154554;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Sofia vintage marrón";
        $temp["reference"] = "00009001000018";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/4/2/4442.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154558;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Sofia cromo negra";
        $temp["reference"] = "00009001000019";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/4/8/4448.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154558;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Sofia cromo blanca";
        $temp["reference"] = "00009001000020";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/5/2/4452.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154559;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Jason grafito";
        $temp["reference"] = "00009001000021";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/1/7/4517.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154559;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Jason chocolate";
        $temp["reference"] = "00009001000022";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/2/1/4521.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154881;
        $temp["position"] = 1;
        $temp["cover"] = 1;
        $temp["legend"] = "Silla Zeta negra";
        $temp["reference"] = "00008001000033";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/5/4/4354.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 154881;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Zeta blanca";
        $temp["reference"] = "00008001000034";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/5/9/4359.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 186789;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete nordic blanco 1";
        $temp["reference"] = "00026700000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/6/7/1767.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 186789;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete nordic negro";
        $temp["reference"] = "00026700000001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/7/1/1771.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 186789;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete nordic gris";
        $temp["reference"] = "00026700000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/7/5/1775.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 187385;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Lake negra";
        $temp["reference"] = "00026100000109";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/5/5/4255.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 187385;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Lake gris";
        $temp["reference"] = "00026100000110";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/5/9/4259.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 187385;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Lake azul";
        $temp["reference"] = "00026100000111";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/6/4/4264.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191376;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Eros Nobuck gris claro 1";
        $temp["reference"] = "00006000000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/7/3/3573.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191376;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Eros Nobuck elephant";
        $temp["reference"] = "00006000000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/7/6/3576.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191379;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Atenas con elevación gris claro 1";
        $temp["reference"] = "00006000000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/1/6/3716.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191379;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Atenas con elevación elephant";
        $temp["reference"] = "00006000000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/7/1/9/3719.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191380;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maurice natural";
        $temp["reference"] = "00103000000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/8/4/4484.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191380;
        $temp["position"] = 7;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maurice negra";
        $temp["reference"] = "00103000000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/8/9/4489.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191380;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maurice blanca";
        $temp["reference"] = "00103000000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/9/4/4494.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191380;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Maurice gris";
        $temp["reference"] = "00103000000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/9/9/4499.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191384;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Ivette nature";
        $temp["reference"] = "00103000000012";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/2/7/4527.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191384;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Ivette negra";
        $temp["reference"] = "00103000000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/3/0/4530.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191384;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Ivette blanca";
        $temp["reference"] = "00103000000014";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/3/4/4534.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191384;
        $temp["position"] = 12;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Ivette gris";
        $temp["reference"] = "00103000000015";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/3/8/4538.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191388;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Versalles natural";
        $temp["reference"] = "00102000000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/9/9/4399.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191388;
        $temp["position"] = 7;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Versalles negra";
        $temp["reference"] = "00102000000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/0/4/4404.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191388;
        $temp["position"] = 13;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Versalles blanca";
        $temp["reference"] = "00102000000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/0/9/4409.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191392;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Klint natural";
        $temp["reference"] = "00102000000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/0/1/1/19011.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191392;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Klint blanca";
        $temp["reference"] = "00102000000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/0/0/8/19008.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191439;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Spiro blanco azul 1";
        $temp["reference"] = "00026000000359";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/4/8/1748.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191439;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Spiro blanco rojo";
        $temp["reference"] = "00026000000360";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/5/0/1750.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191439;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Taburete Spiro blanco gris";
        $temp["reference"] = "00026000000361";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/7/5/2/1752.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191458;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eiffel blanca";
        $temp["reference"] = "00100000000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/7/1/4571.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191458;
        $temp["position"] = 7;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eiffel negra";
        $temp["reference"] = "00100000000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/7/5/4575.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191461;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eiffel metal blanca";
        $temp["reference"] = "00100000000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/6/2/4562.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191461;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eiffel metal negra";
        $temp["reference"] = "00100000000012";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/6/6/4566.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191463;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eiffel tapizada blanca";
        $temp["reference"] = "00100000000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/4/8/4548.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191463;
        $temp["position"] = 7;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eiffel tapizada negra";
        $temp["reference"] = "00100000000014";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/5/2/4552.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191480;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillón Delfos de piel con elevación blanco";
        $temp["reference"] = "00101000000026";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/2/3/6/19236.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191480;
        $temp["position"] = 7;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillón Delfos de piel con elevación chocolate";
        $temp["reference"] = "00101000000027";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/2/4/1/19241.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191486;
        $temp["position"] = 14;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nina negra";
        $temp["reference"] = "00008000000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/7/2/19172.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191486;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nina blanca";
        $temp["reference"] = "00008000000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/6/0/19160.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191486;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nina chocolate";
        $temp["reference"] = "00008000000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/6/4/19164.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191486;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Nina gris plomo";
        $temp["reference"] = "00008000000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/6/8/19168.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191491;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Larissa negra";
        $temp["reference"] = "00008000000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/8/4/19184.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191491;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Larissa blanca";
        $temp["reference"] = "00008000000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/7/6/19176.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191492;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Freya negra";
        $temp["reference"] = "00008000000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/9/7/19197.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191492;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Freya blanca";
        $temp["reference"] = "00008000000012";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/8/8/19188.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191492;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Freya gris plomo";
        $temp["reference"] = "00008000000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/1/9/1/9/2/19192.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191507;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Paula negra";
        $temp["reference"] = "00009000000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/5/8/4458.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191507;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Paula blanca";
        $temp["reference"] = "00009000000003";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/6/2/4462.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191507;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Paula chocolate";
        $temp["reference"] = "00009000000004";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/6/6/4466.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191508;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Velvet grafito";
        $temp["reference"] = "00009000000005";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/1/5/4415.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191508;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Velvet chocolate";
        $temp["reference"] = "00009000000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/1/9/4419.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191510;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Marlene negra";
        $temp["reference"] = "00009000000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/0/5/4505.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191510;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Marlene blanca";
        $temp["reference"] = "00009000000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/0/8/4508.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191510;
        $temp["position"] = 8;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Marlene chocolate";
        $temp["reference"] = "00009017000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/5/1/2/4512.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191513;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Adele blanca";
        $temp["reference"] = "00009000000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/4/4/4644.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191513;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Adele gris perla";
        $temp["reference"] = "00009000000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/4/7/4647.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191516;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Gris Auria madera gris plomo";
        $temp["reference"] = "00009000000011";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/1/3/4613.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191516;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Gris Auria madera marrón";
        $temp["reference"] = "00009000000012";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/0/8/4608.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191516;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Gris Auria madera gris claro";
        $temp["reference"] = "00009000000013";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/6/0/4/4604.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191517;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Turner grafito";
        $temp["reference"] = "00009000000014";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/2/4/4424.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191517;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Turner chocolate";
        $temp["reference"] = "00009000000015";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/4/2/8/4428.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 193584;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Barna negra";
        $temp["reference"] = "00026001000018";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/2/5/4/7/9/25479.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 193584;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Sillon Barna blanca";
        $temp["reference"] = "00026001000019";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/2/5/4/7/7/25477.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194599;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sofa Cambridge 3 plazas negro 1";
        $temp["reference"] = "00026000000512";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/3/9/3/3393.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194599;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Sofa Cambridge 3 plazas blanco";
        $temp["reference"] = "00026000000515";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/3/9/6/3396.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194600;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sofa Cambridge 2 plazas negro 1";
        $temp["reference"] = "00026000000513";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/3/9/9/3399.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194600;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sofa Cambridge 2 plazas blanco";
        $temp["reference"] = "00026000000516";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/4/0/3/3403.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194601;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Sofá Cambridge 1 plaza negro 1";
        $temp["reference"] = "00026000000514";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/4/5/3545.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194601;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Sofá Cambridge 1 plaza blanco";
        $temp["reference"] = "00026000000517";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/5/4/9/3549.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 189242;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Nancy Microfibra gris";
        $temp["reference"] = "00089002000007";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/1/7/3917.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 189242;
        $temp["position"] = 9;
        $temp["cover"] = 0;
        $temp["legend"] = "Nancy Microfibra beige";
        $temp["reference"] = "00089002000010";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/2/0/3920.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 189242;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Nancy Microfibra blanca";
        $temp["reference"] = "00089002000006";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/1/3/3913.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 189243;
        $temp["position"] = 4;
        $temp["cover"] = 0;
        $temp["legend"] = "Nancy Tejido Amarillo";
        $temp["reference"] = "00089002000009";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/8/7/3987.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 189243;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Nancy Tejido Turquesa";
        $temp["reference"] = "00089002000008";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/8/4/3984.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191430;
        $temp["position"] = 2;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla gaming Racer negro-negro";
        $temp["reference"] = "00026000000350";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/2/6/4126.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191430;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla gaming Racer negro-rojo";
        $temp["reference"] = "00026000000351";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/3/0/4130.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191430;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla gaming Racer negro-azul";
        $temp["reference"] = "00026000000352";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/3/5/4135.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191433;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gaming Diablo X negro-gris";
        $temp["reference"] = "00026000000353";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/9/5/4095.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191433;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gaming Diablo X negro-blanco";
        $temp["reference"] = "00026000000354";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/9/9/4099.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191433;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gaming Diablo X negro-rojo";
        $temp["reference"] = "00026000000355";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/0/4/4104.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191433;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gaming Diablo X negro-azul";
        $temp["reference"] = "00026000000356";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/0/9/4109.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 191433;
        $temp["position"] = 20;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Gaming Diablo X negro-amarillo";
        $temp["reference"] = "00026000000357";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/1/1/4/4114.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179691;
        $temp["position"] = 3;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eco2 negra";
        $temp["reference"] = "00026100000000";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/0/6/4006.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179691;
        $temp["position"] = 6;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eco2 azul";
        $temp["reference"] = "00026100000001";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/1/0/4010.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179691;
        $temp["position"] = 11;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eco2 gris";
        $temp["reference"] = "00026100000002";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/1/5/4015.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179691;
        $temp["position"] = 16;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eco2 roja";
        $temp["reference"] = "00026100000003";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/2/0/4020.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179691;
        $temp["position"] = 21;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eco2 verde";
        $temp["reference"] = "00026100000004";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/2/5/4025.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 179691;
        $temp["position"] = 29;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Eco2 naranja";
        $temp["reference"] = "00026100000114";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/3/5/4035.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194608;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Bridget ecopiel negra";
        $temp["reference"] = "00026000000518";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/9/1/3991.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194608;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Bridget ecopiel blanca";
        $temp["reference"] = "00026000000519";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/3/9/9/5/3995.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194608;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Bridget ecopiel gris";
        $temp["reference"] = "00026000000520";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/0/0/0/4000.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194593;
        $temp["position"] = 5;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Parma negro";
        $temp["reference"] = "00026000000508";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/9/9/4299.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194593;
        $temp["position"] = 1;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Parma gris 1";
        $temp["reference"] = "00026000000506";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/2/9/5/4295.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194593;
        $temp["position"] = 15;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Parma rojo";
        $temp["reference"] = "00026000000509";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/0/9/4309.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194593;
        $temp["position"] = 25;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Parma verde";
        $temp["reference"] = "00026000000511";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/1/9/4319.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194593;
        $temp["position"] = 20;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Parma mostaza";
        $temp["reference"] = "00026000000510";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/1/4/4314.jpg";
        array_push($imagenes,$temp);


        $temp = array();
        $temp["id_product"] = 194593;
        $temp["position"] = 10;
        $temp["cover"] = 0;
        $temp["legend"] = "Silla Parma azul";
        $temp["reference"] = "00026000000507";
        $temp["url"] = "http://promosillas.com/tiendaonline/img/p/4/3/0/4/4304.jpg";
        array_push($imagenes,$temp);
        
        return $imagenes;

    }



}
?>