<?php /* Template Name: Portfolio */ ?>
<?php
get_header('ecommerce');
get_template_part('template-parts/cabecera','ecommerce');
query_posts('cat=8&orderby=date&order=ASC');
?>
<div class="container2">
<div id="content" class="main">
    <div class="primary-content">
        <h3>Nuestro Proyectos</h3>
        <h6>Aquí tienen un resumen de los proyectos de eCommerceBarcelona360</h6>
        <div class="big-demo go-wide">
            <div class="grid" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 110 } }">
<?php
if ( have_posts()) {
    $contador = 0;
    while (have_posts()) {
        $posicion = "";
        switch($contador){
            case 0:$posicion = "grid-splash-item grid-splash-item--height2";
            break;
            case 1:$posicion = "grid-splash-item";
            break;
            case 2:$posicion = "grid-splash-item";
            break;
            case 3:$posicion = "grid-splash-item";
            break;
            case 4:$posicion = "grid-splash-item";
            break;
            case 5:$posicion = "grid-splash-item grid-splash-item--width2";
            break;
            case 6:$posicion = "grid-splash-item grid-splash-item--width2";
            break;
            case 7:$posicion = "grid-splash-item";
            break;
            case 8:$posicion = "grid-splash-item";
            break;
            case 9:$posicion = "grid-splash-item grid-splash-item--width2";
            break;
            case 10:$posicion = "grid-splash-item grid-splash-item--width2";
            break;
        }
        the_post();
        $custom_fields = get_post_custom(get_the_ID());
        ?>
        <a href="<?php the_permalink() ?>">
            <div class="<?php echo $posicion; ?>" style="background-image:url('<?php echo $custom_fields["imagen1"][0] ?>');background-size: cover"></div>
        </a>
        <?php $contador++;
    }
}
?>
            </div>
       </div>
    </div>
</div>
</div>
<?php get_footer(); ?>
