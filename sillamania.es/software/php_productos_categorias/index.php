<?php
include_once("vendor/autoload.php");
use clases\Productos_categorias;
$categorias = new Productos_categorias();
$categorias->create_excel();
?>