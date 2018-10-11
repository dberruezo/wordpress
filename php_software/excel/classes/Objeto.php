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
        $chars = range('b', 'z');
        $fila = 2;
        $valores = array();
        for ($fila=2;$fila<180;$fila++){
            foreach ($chars as $letter){
                //echo $letter.$fila." vale: ".$objPHPExcel->getActiveSheet()->getCell($letter.$fila)->getValue()."<br>";      
                array_push($this->features,$objPHPExcel->getActiveSheet()->getCell($letter.$fila)->getValue());
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
        //$this->objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
        //$this->objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
        $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

        /*
        // Añadimos los campos etiquetas correspondientes a las columnas
        $this->objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B3', 'P')
            ->setCellValue('C3', 'DESCRIPCIÓN');

        */
        // Añadimos titulos
        $chars    = range('a', 'z');
        $contador = 1;
        foreach($this->titulos as $titulo){
            $objPHPExcel->getActiveSheet()
                ->setCellValue($chars[$contador].$contador,$titulo);
                // Colocamos el tamaño de las celdas
                //$this->objPHPExcel->getActiveSheet()->getColumnDimension($this->abecedaryCapital[$contador])->setWidth(20);
            $contador++;
        }
        // Añadimos features
        $contador = 0;
        foreach($this->titulos_features as $titulo){
            echo "El titulo es: ".$titulo."<br>";
            echo "El feature es: ".$this->features[$contador]."<br>";
            array_push($this->values_features,$titulo.$this->features[$contador]."0");
            $contador++;
        }
        //print_r($this->values_features);
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
        array_push($this->titulos,"hasta dto");
        array_push($this->titulos,"Description");
    }

    /*
     * Set Features
     */
    public function setFeaturesTitulos(){
        array_push($this->titulos_features,"coleccion");
        array_push($this->titulos_features,"bullet1");
        array_push($this->titulos_features,"bullet2");
        array_push($this->titulos_features,"bullet3");
        array_push($this->titulos_features,"bullet4");
        array_push($this->titulos_features,"bullet5");
        array_push($this->titulos_features,"tipo_de_silla");
        array_push($this->titulos_features,"base");
        array_push($this->titulos_features,"mecanismo");
        array_push($this->titulos_features,"nhoras");
        array_push($this->titulos_features,"bultos");	
        array_push($this->titulos_features,"Peso");	
        array_push($this->titulos_features,"pcs");		
        array_push($this->titulos_features,"ctn");	
        array_push($this->titulos_features,"paquete1peso");	
        array_push($this->titulos_features,"paquete1volumen");
        array_push($this->titulos_features,"paquete1volumen");
        array_push($this->titulos_features,"paquete1B");	
        array_push($this->titulos_features,"paquete1C");	
        array_push($this->titulos_features,"paquete2peso");	
        array_push($this->titulos_features,"paquete2volumen");		
        array_push($this->titulos_features,"paquete2A");	
        array_push($this->titulos_features,"paquete2B");		
        array_push($this->titulos_features,"paquete2C");	
        array_push($this->titulos_features,"paquete3peso");	
        array_push($this->titulos_features,"paquete3volumen");	
        array_push($this->titulos_features,"paquete3A");		
        array_push($this->titulos_features,"paquete3B");
        array_push($this->titulos_features,"paquete3C");
    }

}




/*
														
*/
?>