<?php
namespace classes;
/*
 *  Aplicación 
 *  para ver imagenes de prestashop
 */ 
use mysqli;
class ObjetoImagenes{
    
    private $vectorImagenes = array();

    public function __construct(){
        /*
        $enlace = mysqli_connect("127.0.0.1", "root", "", "sillamaniaes_dos");
        if (!$enlace) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        */
        error_reporting(E_ERROR);
        $mysqli = new mysqli("localhost", "root", "", "sillamaniaes_dos");
        echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
        echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;
        echo "<br><br>";
        /* Consultas de selección que devuelven un conjunto de resultados */
        $sql=' select pi.id_image,pr.id_product from ps_product as pr'; 
        $sql.=' left join ps_image as pi';
        $sql.=' on pi.id_product = pr.id_product';
        $sql.=' order by pr.id_product asc';
        if ($resultado = $mysqli->query($sql)) {
        // if ($resultado = $mysqli->query("SELECT id_product FROM ps_product")) {
            /* obtener el array de objetos */
            while ($fila = $resultado->fetch_assoc()) {
                //$fila["Name"], $fila["CountryCode"]);
                echo "id_image: ".$fila[id_image]."<br>";
                echo "id_product: ".$fila[id_product]."<br>";
                // print_r($fila);
                array_push($this->vectorImagenes,$fila[id_image]);
                // array_push($this->vectorImagenes,$fila[0]);
            }
            /* liberar el conjunto de resultados */
            //print_r($this->vectorImagenes);
            $resultado->close();
        }
        $ruta = realpath(__DIR__ . './../../../../sillamania.es/img/p/');
        foreach($this->vectorImagenes as $imagen){
            //$ruta_dos = realpath(__DIR__ . './../../../../promosillas.com/imagenes/');
            //mkdir($ruta_dos."/".$imagen,0777,TRUE);
            $d = $imagen;
            $r = array();
            for ($i = 0; $i < strlen($d); $i++) {
                $r[] = substr($d, $i, 1);
            }
            $nombre =  implode("\\",$r);
            $directorio = $ruta;
            echo "El directorio mas el nombre es: ".$directorio."\\".$nombre."<br>";
            $ficheros1  = scandir($directorio."\\".$nombre);
            //$ficheros2  = scandir($directorio, 1);
            print_r($ficheros1);
            //print_r($ficheros2);
            //print_r($r);
            echo "<br><br><br>";
            $fichero = 'ejemplo.txt';
            $nuevo_fichero = 'ejemplo.txt.bak';

            if (!copy($fichero, $nuevo_fichero)) {
                echo "Error al copiar $fichero...\n";
            }
        }

        /*
        print_r($this->vectorImagenes);
        mysqli_close($enlace);
        // rtua archivos C:\htdocs\promosillas.com\img\p\4\1\3\1
        // ruta donde estamos C:\htdocs\php\prestashop\imagenes
        // ruta dnd queremos copiar las imagenes C:\htdocs\promosillas.com\imagenes\
        //$ruta = ;
        $ruta = realpath(__DIR__ . './../../../../promosillas.com/img/p/');
        //echo "la ruta actual es: ".$ruta."<br>";
        //print_r(str_split(25));
        foreach($this->vectorImagenes as $imagen){
            //$ruta_dos = realpath(__DIR__ . './../../../../promosillas.com/imagenes/');
            //mkdir($ruta_dos."/".$imagen,0777,TRUE);
            $d = $imagen;
            $r = array();
            for ($i = 0; $i < strlen($d); $i++) {
                $r[] = substr($d, $i, 1);
            }
            $nombre =  implode("\\",$r);
            $directorio = $ruta;
            echo "El directorio mas el nombre es: ".$directorio."\\".$nombre."<br>";
            $ficheros1  = scandir($directorio."\\".$nombre);
            
            //$ficheros2  = scandir($directorio, 1);
            print_r($ficheros1);
            //print_r($ficheros2);
            //print_r($r);
            echo "<br><br><br>";
        }
        */
    }
}
?>

