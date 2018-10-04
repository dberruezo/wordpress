<?php
get_header('ecommerce');
get_template_part('template-parts/cabecera','ecommerce');
    if (get_the_ID() == 295){
        echo "encontrado";
        //include_once( 'gracias.php' );
    }

    /*
    echo "cuantas veces entra<br>";
    echo "permalink: ".the_permalink()."<br>";
    echo "El ID es: ".the_ID()."<br>";
    echo "El get page link es: ".get_page_link(29)."<br>";
    $buscar = get_page_link(29);
    $texto_buscar = "gracias";
    echo "Buscar vale: ".$buscar."<br>";
    $pos = strpos($buscar,$texto_buscar);
    echo "pos vale: ".$pos."<br>";
    if ($pos == true){
        echo ("encontrado");
    }else{
        echo ("no encontrado");
    }
    */
while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content', 'page' );
endwhile;
get_footer();
?>