<?php
/*
Plugin Name: Ofiprix Prestashop Webservice
Plugin URI: http://www.davidberruezo.com
Description: Plugin de ofiprix para wordpress, conecta wordpress con prestastashop mediante webservices
Author: David Berruezo programador ofiprix
Version: 0.666
Author URI: http://www.davidberruezo.com
Version: 0.4.50
*/

// libs
//require_once(dirname( __FILE__ ).'/PSWebServiceLibrary.php');
//require_once(dirname( __FILE__ ).'/CategoriaPrestashop.php');

/*
 * Create a singular product 
 * 
 */

// Applicati+on
class OfiprixClient{
    // var    
    private $webService  = "";
    private $opcion      = "";
    private $categorias  = array();
    private $products    = array();
    
    public function __construct(){
        define('PS_SHOP_PATH', 'http://www.prestashop17.net');			// Root path of your PrestaShop store
        define('PS_WS_AUTH_KEY', 'VWZXENB8GVIKPNR5XXJF6Q5K3CCT8YV5');	// Auth key (Get it in your Back Office)
        // instance
        $this->webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
    }

    public function setOpcion($opcion){
        $this->opcion = $opcion;
    }   
    
    public function getOpcion(){
        return $this->opcion;    
    }

    public function getCategories(){
        try
        {
            $opt['resource'] = $this->opcion;
            // Call
            $xml = $this->webService->get($opt);
            // Here we get the elements from children of customer markup which is children of prestashop root markup
            $resources = $xml->children()->children();
            foreach ($resources as $key => $resource) {
                $id = $resource->attributes();
                if ($id > 2){
                    echo "id: ".$id->id."<br>";
                    $categoria = new CategoriaPrestashop();
                    $categoria->id = $id; 
                    array_push($this->categorias,$categoria);    
                }
            }
            
            foreach ($this->categorias as $categoria) {
                //echo "id bueno es: ".$categoria->id."<br>";
                //$this->webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
                $opt['resource'] = $this->opcion;
                $opt['id']       = $categoria->id;   
                // Call
                $xml_two = $this->webService->get($opt);
                // Here we get the elements from children of customer markup which is children of prestashop root markup
                $resources = $xml_two->children()->children();
                $contador = 3;
                foreach ($resources as $resource) {
                    echo 'id bueno es: '.$resource->id.'<br>';
                    /*
                    //$id = $resource->attributes();
                    echo "id bueno es: ".$contador."<br>";
                    //print_r($resource->attributes());
                    $id = $resource->attributes();
                    if ($id > 2){
                        echo "id: ".$id->id."<br>";
                        $categoria = CategoriaPrestashop();
                        $categoria->id = $id; 
                        array_push($this->categorias,$categoria);    
                    }
                    */
                    $contador++;
                }   
                
            }


        }catch (PrestaShopWebserviceException $e){
            // Here we are dealing with errors
            $trace = $e->getTrace();
            if ($trace[0]['args'][0] == 404) echo 'Bad ID';
            else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
            else echo 'Other error<br />'.$e->getMessage();
        }
    }


    public function  getData(){
        try
        {
            // $opt['resource'] = 'customers';
            $opt['resource'] = $this->opcion;
            // We set an id if we want to retrieve infos from a customer
            if (isset($_GET['id']))
                $opt['id'] = (int)$_GET['id']; // cast string => int for security measures
            // Call
            $xml = $this->webService->get($opt);
            // Here we get the elements from children of customer markup which is children of prestashop root markup
            $resources = $xml->children()->children();

        }catch (PrestaShopWebserviceException $e){
            // Here we are dealing with errors
            $trace = $e->getTrace();
            if ($trace[0]['args'][0] == 404) echo 'Bad ID';
            else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
            else echo 'Other error<br />'.$e->getMessage();
        }
        
        /*
        // We set the Title
        echo '<h1>Customers ';
        if (isset($_GET['id']))
            echo 'Details';
        else
            echo 'List';
        echo '</h1>';

        // We set a link to go back to list if we are in customer's details
        if (isset($_GET['id']))
            echo '<a href="?">Return to the list</a>';

        echo '<table border="5">';
        // if $resources is set we can lists element in it otherwise do nothing cause there's an error
        if (isset($resources))
        {
            if (!isset($_GET['id']))
            {
                echo '<tr><th>Id</th><th>More</th></tr>';
                foreach ($resources as $resource)
                {
                    // Iterates on the found IDs
                    echo '<tr><td>'.$resource->attributes().'</td><td>'.
                    '<a href="?id='.$resource->attributes().'">Retrieve</a>'.
                    '</td></tr>';
                }
            }
            else
            {
                foreach ($resources as $key => $resource)
                {
                    // Iterates on customer's properties
                    echo '<tr>';
                    echo '<th>'.$key.'</th><td>'.$resource.'</td>';
                    echo '</tr>';
                }
            }
        }
        echo '</table>';
        */
    }
}


// Call to function
if(!function_exists('inicializar')) {
	function inicializar() { } 		
}

add_action('init', 'inicializar');
?>