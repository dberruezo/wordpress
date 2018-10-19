<?php
$mysqli = new mysqli("localhost", "root", "Berruezin23", "prestashop16");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

//$consulta = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";

$consulta = " SELECT psi.id_image,psp.id_product,psp.reference,psp.id_category_default ";
$consulta.= " FROM ps_product as psp ";
$consulta.= " LEFT JOIN ps_image as psi ";
$consulta.= " ON psp.id_product = psi.id_product ";
$consulta.= " WHERE psp.reference LIKE '%demo_1%' or ";
$consulta.= " psp.reference LIKE '%demo_2%' or ";
$consulta.= " psp.reference LIKE '%demo_3%' or ";
$consulta.= " psp.reference LIKE '%demo_4%' or ";
$consulta.= " psp.reference LIKE '%demo_5%' or ";
$consulta.= " psp.reference LIKE '%demo_6%' or ";
$consulta.= " psp.reference LIKE '%demo_7%' ";

if ($resultado = $mysqli->query($consulta)) {

    # id_image, id_product, reference, id_category_default
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>";
    echo 'id_image';
    echo "</td>";
    echo "<td>";
    echo 'id_product';
    echo "</td>";
    echo "<td>";
    echo 'reference';
    echo "</td>";
    echo "<td>";
    echo 'id_category_default';
    echo "</td>";
    echo "</tr>";
    while ($fila = $resultado->fetch_array()) {
        echo "<tr>";
        echo "<td>";
        echo $fila['id_image'];
        echo "</td>";
        echo "<td>";
        echo $fila['id_product'];
        echo "</td>";
        echo "<td>";
        echo $fila['reference'];
        echo "</td>";
        echo "<td>";
        echo $fila['id_category_default'];
        echo "</td>";
        //print_r($fila);
        //printf ("%s (%s)\n", $fila[0], $fila[1]);
        echo "</tr>";
    }
    echo "</table>";
    /* liberar el conjunto de resultados */
    $resultado->close();
}

/* cerrar la conexión */
$mysqli->close();
?>