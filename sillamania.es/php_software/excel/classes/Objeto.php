<?php
namespace classes;

// PhpOffice
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Shared_Font;
use PHPExcel_Style_Border;
use PHPExcel_Style_Borders;
use PHPExcel_Style_Alignment;
use PHPExcel_Worksheet_PageSetup;

class Objeto{
    // Titulos documento csvs
    private $titulos            = array();
    // Features
    private $features           = array();
    private $titulos_features   = array();
    private $values_features    = array();

    public function __construct(){
        // errors
        //error_reporting(E_ERROR);
        // call to functions
        $this->setTitulos();
        $this->setFeaturesTitulos();
        // Read the file
        //echo "ruta: ".dirname(__FILE__)."<br>";
        $fileName = realpath(dirname(__FILE__) . '/../caracteristicas_import.xls');
        //echo ("El filename es: ".$fileName."<br>");
        $fileType = 'Excel5';
        $objReader = PHPExcel_IOFactory::createReader($fileType);
        $objPHPExcel = $objReader->load($fileName);
        $objPHPExcel->setActiveSheetIndex(0);
        $chars = range('a', 'z');
        $fila = 2;
        $valores = array();
        $contador        = 0;
        $contador_vector = 0;
        $this->features[$contador_vector] = array();
        //
        for ($fila=2;$fila<180;$fila++){
            foreach ($chars as $letter){
                if ($objPHPExcel->getActiveSheet()->getCell($letter.$fila)->getValue() !=""){
                    if ($letter == 'c' || $letter == 'd' || $letter == 'e'|| $letter == 'f' || $letter == 'g'){
                           $string = $this->limitString($objPHPExcel->getActiveSheet()->getCell($letter.$fila)->getValue(),128);
                           array_push($this->features[$contador_vector],$string);   
                    }else{
                        array_push($this->features[$contador_vector],$objPHPExcel->getActiveSheet()->getCell($letter.$fila)->getValue());
                    }
                }else{
                    array_push($this->features[$contador_vector],"No");   
                }
            }   
            $contador_vector++;
            if (!is_array($this->features[$contador_vector])){
                $this->features[$contador_vector] = array();
            }
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
        $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
        // Añadimos titulos
        $chars    = range('a', 'z');
        $contador = 1;
        $contador_letra = 0;
        foreach($this->titulos as $titulo){
            $objPHPExcel->getActiveSheet()->setCellValue($chars[$contador_letra].$contador,$titulo);
            $contador_letra++;
        }
        // Añadimos features
        $contador        = 0;
        $contador_vector = 0;
        $this->values_features[$contador_vector] = array();
        for ($fila=2;$fila<180;$fila++){
            foreach ($chars as $letter){
                $dato = $this->titulos_features[$contador].":".$this->features[$contador_vector][$contador].":0";
                array_push($this->values_features[$contador_vector],$dato);
                echo("El dato es: ".$this->values_features[$contador_vector][$contador]."<br>");
                $contador++;
            }   
            echo "<br><br>";
            $contador_vector++;
            $contador = 0;
            if (!is_array($this->values_features[$contador_vector])){
                $this->values_features[$contador_vector] = array();
            }
        }
        // Escribimos features
        $contador        = 0;
        $contador_vector = 0;
        $this->values_features[$contador_vector] = array();
        $dato='';
        for ($fila=2;$fila<180;$fila++){
            foreach ($chars as $letter){
                if ($contador == 0){
                    $identificador = $this->features[$contador_vector][$contador];
                }else{
                    $dato.=$this->titulos_features[$contador].":".$this->features[$contador_vector][$contador].":0,";
                }
                $contador++;
            }
            str_replace('"', "", $dato);
            str_replace("'", "", $dato);
            $dato = substr_replace($dato, "", -1);
            $objPHPExcel->getActiveSheet()->setCellValue('A'.($contador_vector+2),$identificador);  
            $objPHPExcel->getActiveSheet()->setCellValue('S'.($contador_vector+2),$dato);
            $dato='';
            $contador_vector++;
            $contador = 0;
        }
        // Guardamos el excel
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('plantilla.xlsx');
    }


    public function limitString($string, $limit = 100) {
        // Return early if the string is already shorter than the limit
        if(strlen($string) < $limit) {return $string;}
    
        $regex = "/(.{1,$limit})\b/";
        preg_match($regex, $string, $matches);
        return $matches[1];
    }

    /*
     * Set Titulos
     */
    
    public function setTitulos(){
        array_push($this->titulos,"Product ID");
        array_push($this->titulos,"Active (0/1)");
        array_push($this->titulos,"Name *");
        array_push($this->titulos,"Categories (x,y,z...)");
        array_push($this->titulos,"Price tax included");
        array_push($this->titulos,"Tax rules ID");
        array_push($this->titulos,"Reference #");
        array_push($this->titulos,"EAN13");
        array_push($this->titulos,"Weight");	
        array_push($this->titulos,"Quantity");
        array_push($this->titulos,"Minimal quantity");
        array_push($this->titulos,"Text when in stock");
        array_push($this->titulos,"Available for order (0 = No, 1 = Yes)");
        array_push($this->titulos,"Show price (0 = No, 1 = Yes)");
        array_push($this->titulos,"en oferta");
        array_push($this->titulos,"valor dto");
        array_push($this->titulos,"desde dto");
        array_push($this->titulos,"Image URLs (x,y,z...)");
        array_push($this->titulos,"Feature(Name:Value:Position)");
        /*
        array_push($this->titulos,"hasta dto");
        array_push($this->titulos,"Description");
        */
    }

    /*
     * Set Features
     */
    public function setFeaturesTitulos(){
        $string = $this->limitString("product_id",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("coleccion",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("bullet1",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("bullet2",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("bullet3",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("bullet4",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("bullet5",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("material",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("tipo_de_silla",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("base",128);
        array_push($this->titulos_features,$string);
        $string = $this->limitString("mecanismo",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("nhoras",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("bultos",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("Peso",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("pcs",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("ctn",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete1peso",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete1volumen",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete1A",128);
        array_push($this->titulos_features,$string);
        
        $string = $this->limitString("paquete1B",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete1C",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete2peso",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete2volumen",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete2A",128);
        array_push($this->titulos_features,$string);
        
        $string = $this->limitString("paquete2B",128);
        array_push($this->titulos_features,$string);
        
        $string = $this->limitString("paquete2C",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete3peso",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete3volumen",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete3A",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete3B",128);
        array_push($this->titulos_features,$string);

        $string = $this->limitString("paquete3C",128);
        array_push($this->titulos_features,$string);

    }
}




/*
														
*/
?>