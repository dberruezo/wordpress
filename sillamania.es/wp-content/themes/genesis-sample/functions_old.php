<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Genesis Sample' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
}


//Reset todos los scripts
function pm_remove_all_styles() {
    global $wp_styles;
    $wp_styles->queue = array();
}
add_action('wp_print_styles', 'pm_remove_all_styles', 100);

/*
function pm_remove_all_scripts() {
    global $wp_scripts;
    $wp_scripts->queue = array();
}
add_action('wp_print_scripts', 'pm_remove_all_scripts', 100);
*/

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

//Crear Menu Orbital
	

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {
	return 90;
} 

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}
//menus custom

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
  add_posts_page(__('Drafts'), __('Drafts'), 'read', 'edit.php?post_status=draft&post_type=post&lang=es_ES');
  add_posts_page(__('Programados'), __('Programados'), 'read', 'edit.php?post_status=future&post_type=post&lang=es_ES');
  add_posts_page(__('Castellano'), __('Castellano'), 'read', 'edit.php?post_type=post&lang=es_ES');
}

//quitar autor
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//Quitar SEO genesis
remove_theme_support( 'genesis-seo-settings-menu' );
remove_action( 'genesis_meta','genesis_seo_meta_description' );
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );


function isa_load_amp_adsense_script( $data ) {
    $data['amp_component_scripts']['amp-social-share'] = 'https://cdn.ampproject.org/v0/amp-social-share-0.1.js';
    return $data;
}
add_filter( 'amp_post_template_data', 'isa_load_amp_adsense_script' );

//Funciones basicas

//trabajar con aside
add_filter( 'gettext_with_context', 'rename_post_formats', 10, 4 );

function rename_post_formats( $translation, $text, $context, $domain ) {

    $names = array(
        'Audio'  => 'CMS',
        'Chat' => 'Tiendas',
        'Aside' => 'Productos',
    );
    
    if ( $context == 'Post format' ) {
        $translation = str_replace( array_keys( $names ), array_values( $names ), $text );
    }
    
    return $translation;
}
	add_theme_support( 'post-formats', array(
		'aside','chat','audio'
	) );

//quitar h2 en menu
	
//Pie de página Footer

add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] <a href="'.home_url( '/' ).'">'.get_bloginfo( 'name' ).'</a> Todos los derechos reservados';
	return $creds;
}

//Todos productos



function topventas($atts = [],$content=NULL) {
	/*
	$categoria= 206;
	$pageid=2648;
	$filtro=NULL;
	$que="SELECT id_product FROM `ps_category_product` where id_category='".$categoria."' ORDER BY RAND() LIMIT 4";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		$i.="<div class='row' style='max-width:1200px;margin:0 auto;'>";
		foreach ($query as $row) {
			$productos[$row->id_product]=get_product($row->id_product);
		}
		foreach ($productos as $prod) {
			$afiltrar=NULL;
					$precio=round($prod['pricetax'],0)."€";
					$precioneto=round($prod['netprice'],0)."€";
					$link="http://sillamania.es/tiendaonline/".$prod['id_product']."-".$prod['link_rewrite'].".html";
					$i.='<div class="col-md-3 col-sm-6 col-xs-12">';
					$i.='<div class="acaja">';
					if ($prod['imagen']['medium_default']=="") {
						$i.='<div class="imgcaja"><a style="width:100%;" href="'.$link.'">';
							if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
								$dto=round(($precioneto-$precio)/$precio,2)*100;
								$i.='<div class="dto">'.$dto.'%</div>';
							};
							//$i.='<span class="new">NEW</span>';
							$i.='<img style="width:100%;" src="'.get_site_url()."/wp-content/uploads/dicorocuadrado.jpg".'" alt="'.$prod['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
					} else {
						$i.='<div class="imgcaja"><a style="width:100%;" href="'.$link.'">';
							if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
								$dto=round(($precioneto-$precio)/$precio,2)*100;
								$i.='<div class="dto">'.$dto.'%</div>';
							};
							//$i.='<span class="new">NEW</span>';
							if($product['escuadrada']==1) {
							$i.='<img style="width:100%;" src="'.$prod['imagen']['medium_cuadrada'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
							} else {
							$i.='<img style="width:100%;" src="'.$prod['imagen']['medium_default'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
							}
					};
					$i.='<div class="textocaja">';
						if($prod['netprice']<$prod['pricetax'] && $prod['netprice']>0) {
						$i.='<div class="tituloprod">
							<a href="'.$link.'">'.$prod['name'].' '.$valor['name'].'</a>
							<span class="elprecio">
							<span class="preciodto">'.$precioneto.'</span>
							<span class="precioantes">'.$precio.'</span>
							</span>
						</div>';
						} else {
						$i.='<div class="tituloprod">
							<a href="'.$link.'">'.$prod['name'].' '.$valor['name'].'</a>
							<span class="elprecio">
							<span class="preciodto">'.$precio.'</span>
							</span>
						</div>';
						};
						$i.='<div class="entrega enstock">Entrega: 3-5 días laborables</div>';
					$i.='</div>';
					$i.='</div>';
					$i.='</div>';
			}
	$i.="</div>";
	$i.="<div style='text-align:right;max-width:1200px;margin:0 auto;'>";
	$i.='<a href="'.get_permalink($pageid).'" style="color:black;">';
	$i.='Ver Todos';
	$i.='</a>';
	$i.="</div>";
	*/
	$i.='<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="titular">
						<h2>Los más vendidos</h2>
						<a href="">Explorar</a>
					</div>
				</div>
				<div class="col-xs-12 col-md-9">
					
					<div class="row productos">
						
						<a class="item-prod col-xs-12 col-md-4">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen">
							<div class="container-text">
								<div class="wrapper-position">
									<div class="extra-info porcentaje-descuento">
										<p>20%</p>
									</div>
									<div class="info">
										<div class="descripcion">
											Sillón tela confort
										</div>
										<div class="price-box">
											<span class="price-container old-price">
												<span class="price-wrapper ">320 €</span>
											</span>
											<span class="price-container special-price">
												<span class="price-wrapper ">300 €</span>
											</span>
										</div>							
									</div>	
								</div>
							</div>		
						</a>
						
						<a class="item-prod col-xs-12 col-md-4">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen">
							<div class="container-text">
								<div class="wrapper-position">
									<div class="extra-info porcentaje-descuento">
										<p>20%</p>
									</div>
									<div class="info">
										<div class="descripcion">
											Sillón tela confort
										</div>
										<div class="price-box">
											<span class="price-container old-price">
												<span class="price-wrapper ">320 €</span>
											</span>
											<span class="price-container special-price">
												<span class="price-wrapper ">300 €</span>
											</span>
										</div>							
									</div>	
								</div>
							</div>		
						</a>
						
						<a class="item-prod col-xs-12 col-md-4">
							<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen">
							<div class="container-text">
								<div class="wrapper-position">
									<div class="extra-info porcentaje-descuento">
										<p>20%</p>
									</div>
									<div class="info">
										<div class="descripcion">
											Sillón tela confort
										</div>
										<div class="price-box">
											<span class="price-container old-price">
												<span class="price-wrapper ">320 €</span>
											</span>
											<span class="price-container special-price">
												<span class="price-wrapper ">300 €</span>
											</span>
										</div>							
									</div>	
								</div>
							</div>		
						</a>
					</div>
				</div>
			</div>';
	return $i;
}


add_shortcode( 'topventas', 'topventas' );

function todosproductos($atts = [],$content=NULL) {
	$i='<div class="clearfix">';
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'post_type'    => 'post',
        'post_status'  => 'publish',
    );
    $posts = get_posts($args);
    foreach ($posts as $pos) {
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($pos->ID), 'medium'); 
			$i.='<div class="col-md-6 col-sm-6 col-xs-12">';
				$i.='<a href="'.get_permalink($pos->ID).'" class="acaja">';
					$i.='<div class="imgcaja"><img src="'.$img[0].'" alt="'.$img['alt'].'" title="'.$img['alt'].'" /></div>';
					$i.='<div class="textocaja">';
						$i.= '<h3>'.$pos->post_title.'</h3>';
						$i.='<p>'.get_post_meta($pos->ID, '_yoast_wpseo_metadesc', true).'</p>';
					$i.='</div>';
						$i.='<div class="footercaja"><span>Ver Más</span></div>';
				$i.='</a>';
			$i.= '</div>';
	};
	$i.='</div>';
	return $i;
}


add_shortcode( 'todosproductos', 'todosproductos' );


function paginasdelpilar($atts = [],$content=NULL) {
	if($atts['id']=="") {
	$id= get_field( "pilar", get_the_ID() );
	} else {
		$id= $atts['id'];		
	};
	$grupo= get_field( "grupo", get_the_ID() );
	if($atts['tipocontenido']=="") {
		$i=do_shortcode('[bloquenlaces]');
		$i.=do_shortcode('[toc]');
	};
	
	$i.="<div class='clearfix'>";
	$i.=do_shortcode('[paginashijas id='.$id.' tipocontenido="'.$atts['tipocontenido'].'" desc=1 minipost=0]');
	$i.="</div>";
	return $i;
	
}
add_shortcode( 'paginasdelpilar', 'paginasdelpilar' );



function lapaginapilar($atts = [],$content=NULL) {
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
    $pages = get_pages($args);
    foreach ($pages as $pos) {
		$pilar = get_field('pilar', $pos->ID );
		if($pilar==$atts['id']) {
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($pos->ID), 'medium'); 
			$i.='<div class="col-md-6 col-sm-6 col-xs-12">';
			$i.='<a href="'.get_permalink($pos->ID).'" class="acaja">';
			$i.='<div class="imgcaja"><img src="'.$img[0].'" alt="'.$atts['alt'].'" title="'.$atts['alt'].'" /></div>';
			$i.='<div class="textocaja">';
			$i.= '<h3>'.$pos->post_title.'</h3>';
			$i.='</div>';
				$i.='<div class="footercaja"><span>Ver Más</span></div></a></div>';
			
		};
	};
	return $i;
	
}
add_shortcode( 'lapaginapilar', 'lapaginapilar' );

function breadcrumbspost( $atts ) {
            $selected_category = get_the_category($post_id); 
            $selected_category = $selected_category[0]->term_id;
$i='<p id="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#">';
$i.='<span typeof="v:Breadcrumb"><a href="'.get_site_url().'" rel="v:url" property="v:title">'.get_bloginfo('name').'</a> » ';
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
    $pages = get_pages($args);
    foreach ($pages as $pos) {
		$categoria = get_field('categoria', $pos->ID );
		if($categoria==$selected_category && $selected_category!="") {
			$i.='<span rel="v:child" typeof="v:Breadcrumb"><a href="'.get_permalink($pos->ID).'" rel="v:url" property="v:title">'.$pos->post_title.'</a> » ';
		};
	};
$i.='<strong class="breadcrumb_last">'.get_the_title($atts['id']).'</strong></span></span></span>';
$i.='</p>';
return $i;
};
add_shortcode( 'breadcrumbspost', 'breadcrumbspost' );

/* Shortcode Slider */

function slider($atts = [],$content=NULL) {
		$img = wp_get_attachment_image_src( $atts['id'], 'full'); 
		$img=$img[0];
		$img2 = wp_get_attachment_image_src( $atts['mobile'], 'full'); 
		$img2=$img2[0];
		$title=$atts['title'];
		$link=$atts['link'];
		$event=$atts['event'];
		$i='<div class="sliderh">';
		$i.='<a href="'.$link.'" onclick="ga(\'send\', \'event\', \'Slider Home\',\'Clic\', \''.$event.'\');">';
		$i.='<img class="desktop" src="'.$img.'" style="width:100%;" alt="'.$title.'" title="'.$title.'" />';
		$i.='<img class="mobile" src="'.$img2.'" style="width:100%;" alt="'.$title.'" title="'.$title.'" />';
		$i.='</a>';
		$i.='</div>';
	return $i;
}
add_shortcode( 'slider', 'slider' );

function slideratres($atts = [],$content=NULL) {
	$que="SELECT ID from of_posts where post_name like 'slider-".$id."-image%' ORDER BY RAND() LIMIT 3";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$i='<div class="clearfix">';
	foreach ($query as $row) {
		$texto=get_post($row->ID);
		$texto=$texto->post_excerpt;
		$url=get_post_meta($row->ID,"ml-slider_url");
		$url=$url[0];
		$img = wp_get_attachment_image_src( get_post_meta($row->ID,"_thumbnail_id")[0], 'full'); 
		$img=$img[0];
		$title=get_post_meta($row->ID,"ml-slider_title");
		$titleatres=str_replace('/','<br/>',$title[0]);
		$title=str_replace('/','',$title[0]);
		$event=get_post_meta($row->ID,"_wp_attachment_image_alt");
		$event=$event[0];
		$i.='<div class="homeslide col-xs-12 col-md-4">';
		$i.='<a href="'.$url.'" class="item-link" onclick="ga(\'send\', \'event\', \'Banners Home\',\'Clic\', \''.$event.'\');">';
		$i.='<div class="contehome"><div class="pixw"></div>';
		$i.=$titleatres;
		$i.='</div>';
		$i.='<div class="overlay">';
		$i.='<img src="'.$img.'" style="width:100%;" class="item-img alt="'.$title.'" title="'.$title.'" width="100%" />';
		$i.='</div>';
		$i.='<div class="item-html">';
		$i.='<h3 class="tituloitem">'.$title.'</h3>';
		$i.='<p>'.$texto.'</p>';
		$i.='</div>';
		$i.='</a>';
		$i.='</div>';
	}
		$i.='</div>';
	return $i;
}
add_shortcode( 'slideratres', 'slideratres' );

//Paginas Pilar
function get_product($id) {
	
	$que="SELECT * FROM ps_product a left join ps_product_lang b on a.id_product=b.id_product AND b.id_lang=1 WHERE a.id_product=".$id." LIMIT 1";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$product['name']=$row->name;
		$product['id_product']=$row->id_product;
		$product['on_sale']=$row->on_sale;
		$product['online_only']=$row->online_only;
		$product['price']=$row->price;
		if($row->id_tax_rules_group==1) {
			$product['pricetax']=$row->price*1.21;
		} else {
			$product['pricetax']=$row->price*1.21;
		};
		$product['reference']=$row->reference;
		$product['medidas']['width']=$row->width;
		$product['medidas']['height']=$row->height;
		$product['medidas']['depth']=$row->depth;
		$product['medidas']['weight']=$row->weight;
		$product['available_for_order']=$row->available_for_order;
		$product['available_date']=$row->available_date;
		$product['show_price']=$row->show_price;
		$product['description_short']=$row->description_short;
		$product['text_available']=$row->available_now;
		$product['text_navailable']=$row->id_product;
		$product['link_rewrite']=$row->link_rewrite;
		$product['netprice']=$product['pricetax'];
	}
			$que="SELECT * FROM  `ps_large_categories` where id_category ='".$row->id_category_default."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			$escuadrada=1;
			foreach ($query as $row) {
				$escuadrada=0;
			}
			$product['escuadrada']=$escuadrada;
		$product['tipo']="simple";
	$que="SELECT * FROM ps_product_attribute WHERE `id_product`=".$id."";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$product['tipo']="complejo";
		if($row->default_on==1) {
		$product['combidefault']=$row->id_product_attribute;
		};
		$product['combi'][$row->id_product_attribute]['id_product_attribute']=$row->id_product_attribute;
		$product['combi'][$row->id_product_attribute]['reference']=$row->reference;
		$product['combi'][$row->id_product_attribute]['quantity']=$row->quantity;
		$product['combi'][$row->id_product_attribute]['price']=$row->price;
		$product['combi'][$row->id_product_attribute]['price']=$product['price']+$row->price;
		$product['combi'][$row->id_product_attribute]['pricetax']=1.21*($product['price']+$row->price);
		$que="SELECT * FROM ps_specific_price WHERE `id_product`=".$id." AND (id_product_attribute='".$row->id_product_attribute."' OR id_product_attribute=0) AND (`from`<=NOW() OR `from`='0000-00-00 00:00:00') AND (`to`>=NOW() OR `to`='0000-00-00 00:00:00')";
		$query2 = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($query2 as $row2) {
			$from=explode(' ',$row2->from);
			$from=str_replace('-','',$from[0]);
			$to=explode(' ',$row2->to);
			$to2=$to[0];
			$to=str_replace('-','',$to[0]);
			if($from<(date('Ymd')-2) || $to>(date('Ymd')+2)) {
				$product['combi'][$row->id_product_attribute]['specific_price'][$row2->id_specific_price]['tipo']="normal";
			} else {
				$product['combi'][$row->id_product_attribute]['specific_price'][$row2->id_specific_price]['tipo']="flash";
				$product['combi'][$row->id_product_attribute]['specific_price'][$row2->id_specific_price]['to']=$to2;
			}
			$product['combi'][$row->id_product_attribute]['specific_price'][$row2->id_specific_price]['reduction']=$row2->reduction;
			if(($product['combi'][$row->id_product_attribute]['pricetax']-$row2->reduction)>=$product['combi'][$row2->id_product_attribute]['netprice']) {
				$product['combi'][$row->id_product_attribute]['netprice']=$product['combi'][$row->id_product_attribute]['pricetax']-$row2->reduction;
			}
		}
		$que="SELECT a.id_attribute, b.position, c.id_attribute_group, c.group_type, d.public_name,e.name FROM ps_product_attribute_combination a left join ps_attribute b on a.id_attribute=b.id_attribute  left join ps_attribute_group c on b.id_attribute_group=c.id_attribute_group left join ps_attribute_group_lang d on b.id_attribute_group=d.id_attribute_group AND d.id_lang=1 LEFT JOIN ps_attribute_lang e on a.id_attribute=e.id_attribute AND e.id_lang=1 WHERE id_product_attribute='".$row->id_product_attribute."' ORDER BY b.position ASC ,e.name ASC";
		$query2 = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($query2 as $row2) {
			if(!in_array($row2->id_attribute_group,$product['atributosorder'])) {
			$product['atributosorder'][$row2->position]=$row2->id_attribute_group;
			};
			$product['atributos'][$row2->id_attribute_group]['id']=$row2->id_attribute_group;
			$product['atributos'][$row2->id_attribute_group]['tipo']=$row2->group_type;
			$product['atributos'][$row2->id_attribute_group]['nombre']=$row2->public_name;
			if($row2->group_type=="color" && count(explode('-',$row2->name))>0) {
			$t=explode('-',$row2->name);
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['familia']=$t[0];
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['img']=get_site_url()."/tiendaonline/img/co/".$row2->id_attribute.'.jpg';
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['color']=$t[1];
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['name']=$t[0]." ".$t[1];
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['id']=$row2->id_attribute;
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['product_attribute']=$row->id_product_attribute;
			$product['atributos'][$row2->id_attribute_group]['familias'][$t[0]]=$t[0];
			} else {
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['name']=$row2->name;
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['id']=$row2->id_attribute;
			$product['atributos'][$row2->id_attribute_group]['valores'][$row2->id_attribute]['product_attribute']=$row->id_product_attribute;
			};
		}
		$que="SELECT a.id_image, b.legend FROM ps_image a left join ps_image_lang b on a.id_image=b.id_image and b.id_lang=1 left join ps_product_attribute_image c on a.id_image=c.id_image where a.id_product=".$id." AND c.id_product_attribute='".$row->id_product_attribute."' order by a.cover DESC, a.position ASC";
		$query2 = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		$k=0;
		foreach ($query2 as $row2) {
			$que3="SELECT * FROM ps_image_type";
			$query3 = $GLOBALS['wpdb']->get_results( $que3, OBJECT );
			foreach ($query3 as $row3) {
				if($k==0) {
				$product['combi'][$row->id_product_attribute]['imagen'][$row3->name]=get_site_url()."/tiendaonline/".$row2->id_image."-".$row3->name."/".$product['link_rewrite'].".jpg";
				} else {
				$product['combi'][$row->id_product_attribute]['imagenesextra'][$k][$row3->name]=get_site_url()."/tiendaonline/".$row2->id_image."-".$row3->name."/".$product['link_rewrite'].".jpg";
				};
			}
			$k=$k+1;
		}
	}
	$que="SELECT * FROM ps_specific_price WHERE `id_product`=".$id." AND (`from`<=NOW() OR `from`='0000-00-00 00:00:00') AND (`to`>=NOW() OR `to`='0000-00-00 00:00:00')";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	foreach ($query as $row) {
		$from=explode(' ',$row->from);
		$from=str_replace('-','',$from[0]);
		$to=explode(' ',$row->to);
		$to2=$to[0];
		$to=str_replace('-','',$to[0]);
		if($from<(date('Ymd')-2) || $to>(date('Ymd')+2)) {
			$product['specific_price'][$row->id_specific_price]['tipo']="normal";
		} else {
			$product['specific_price'][$row->id_specific_price]['tipo']="flash";
			$product['specific_price'][$row->id_specific_price]['to']=$to2;
		}
		$product['specific_price'][$row->id_specific_price]['reduction']=$row->reduction;
		if(($product['pricetax']-$row->reduction)<=$product['netprice']) {
			$product['netprice']=$product['pricetax']-$row->reduction;
		}
	}
	$que="SELECT a.id_image, b.legend FROM ps_image a left join ps_image_lang b on a.id_image=b.id_image and b.id_lang=1 where a.id_product=".$id." order by a.cover DESC, a.position ASC LIMIT 4";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$k=0;
	foreach ($query as $row) {
		$que2="SELECT * FROM ps_image_type";
		$query2 = $GLOBALS['wpdb']->get_results( $que2, OBJECT );
		foreach ($query2 as $row2) {
			if($k==0) {
			$product['imagen'][$row2->name]=get_site_url()."/tiendaonline/".$row->id_image."-".$row2->name."/".$product['link_rewrite'].".jpg";
			} else {
			$product['imagenesextra'][$k][$row2->name]=get_site_url()."/tiendaonline/".$row->id_image."-".$row2->name."/".$product['link_rewrite'].".jpg";
			};
		}
		$k=$k+1;
	}
	return $product;
}
function productosimple($atts = [],$content=NULL) {
	if($atts['id']!="") {
	$product=get_product($atts['id']);
	} else {
		$product= get_product(get_field( "producto", get_the_ID() ));
	}
	$i='<div class="row">';
	$i.='<div class="col-xs-12 col-md-6">';
		$i.='<div>';
		if($product['escuadrada']==1) {
		$i.='<img src="'.$product['imagen']['medium_cuadrada'].'" alt="'.$product['name'].'" title="'.$product['name'].'" />';
		} else {
		$i.='<img src="'.$product['imagen']['medium_default'].'" alt="'.$product['name'].'" title="'.$product['name'].'" />';
		}
		$i.='</div>';
		if (count($product['imagenesextra'])>0) {
			$i.='<div class="row">';
			foreach ($product['imagenesextra'] as $title=>$img) {
				$i.='<div class="col-xs-3">';
					$i.='<img src="'.$img['cart_default'].'" alt="'.$product['name'].'" title="'.$product['name'].'" />';
				$i.='</div>';
			}
			$i.='</div>';
		};
	$i.='</div>';
	$i.='<div class="col-xs-12 col-md-6">';
		$i.='<h1>'.get_the_title().'</h1>';
		$i.='<p>';
		if($product['pricetax']>$product['netprice']) {
		$i.='<span style="text-decoration:line-through;">'.round($product['pricetax'],0).'</span>';
		};
		$i.=' '.round($product['netprice'],0).'</p>';
		$i.='<p>'.$product['description_short'].'</p>';
		//Comprar
		$i.='<form action="'.get_site_url().'/tiendaonline/carrito" method="post" class="addcartform'.$product['id_product'].'">
		<input type="hidden" name="token" value="" class="gettoken">
		<input type="hidden" name="id_product" value="'.$product['id_product'].'" id="product_page_product_id">
		<input type="hidden" name="id_customization" value="0" id="product_customization_id">
		<input type="hidden" name="action" value="update" id="product_customization_id">
		<input type="hidden" name="add" value="1" id="product_customization_id">';
		if($product['tipo']=="simple") {
			//producto simple
		} else {
			//producto complejo
				$i.='<div class="row">';
			foreach ($product['atributosorder'] as $idat) {
				$atributo=$product['atributos'][$idat];
				if($atributo['tipo']=="radio") {
					//imagen
					$i.='<div class="col-xs-6 col-md-4">'.$atributo['nombre'].'</div>';
						$i.='<div class="col-xs-6 col-md-8">';
					foreach ($atributo['valores'] as $combiv) {
						$extra="";
						if($combiv['product_attribute']==$product['combidefault']) {
							$extra=' checked="checked"';
						}
						$i.='<input type="radio" data-product-attribute="'.$atributo['id'].'" name="group['.$atributo['id'].']" value="'.$combiv['id'].'" '.$extra.'>';
						$i.='<img src="'.$product['combi'][$combiv['product_attribute']]['imagen']['cart_default'].'" alt="'.$combiv['name'].'" title="'.$combiv['name'].'" />';
					}
						$i.='</div>';
				} else if ($atributo['tipo']=="select") {
					$i.='<div class="col-xs-6 col-md-4">'.$atributo['nombre'].'</div>';
						$i.='<div class="col-xs-6 col-md-8">';
					$i.='<select class="form-control form-control-select" id="group_'.$atributo['id'].'" data-product-attribute="'.$atributo['id'].'" name="group['.$atributo['id'].']">';
					foreach ($atributo['valores'] as $combiv) {
						$extra="";
						if($combiv['product_attribute']==$product['combidefault']) {
							$extra=' checked="checked"';
						}
						$i.='<option value="'.$combiv['id'].'" title="'.$combiv['name'].'" '.$extra.'>'.$combiv['name'].'</option>';
					}
					$i.='</select>';
						$i.='</div>';
				} else if ($atributo['tipo']=="color") {
					//imagen
					$i.='<div class="col-xs-12">';
					$i.='<div>'.$atributo['nombre'].'</div>';
					if(count($atributo['familias'])>0) {
						foreach ($atributo['familias'] as $familia) {
							$i.='<p><b>'.$familia.'</b></p>';
							foreach ($atributo['valores'] as $combiv) {
								if($combiv['familia']==$familia) {
								$extra="";
								if($combiv['product_attribute']==$product['combidefault']) {
									$extra=' checked="checked"';
								}
								$i.='<input type="radio" data-product-attribute="'.$atributo['id'].'" name="group['.$atributo['id'].']" value="'.$combiv['id'].'" '.$extra.'>';
								$i.='<img src="'.$combiv['img'].'" alt="'.$combiv['name'].'" title="'.$combiv['name'].'" style="width:100px;" />';
								};
							}
						}
					} else {
							foreach ($atributo['valores'] as $combiv) {
								$extra="";
								if($combiv['product_attribute']==$product['combidefault']) {
									$extra=' checked="checked"';
								}
								$i.='<input type="radio" data-product-attribute="'.$atributo['id'].'" name="group['.$atributo['id'].']" value="'.$combiv['id'].'" '.$extra.'>';
								$i.='<img src="'.$combiv['img'].'" alt="'.$combiv['name'].'" title="'.$combiv['name'].'" style="width:100px;" />';
							}
					}
						$i.='</div>';
				}
			}
			$i.='</div>';
		}
		$i.='
		<div class="row">
		<div class="col-xs-3">
		<input type="text" name="qty" id="quantity_wanted" value="1" class="input-group form-control" min="1" aria-label="Cantidad" style="display: block;">
		</div>
		<div class="col-xs-9">
		<button disabled="disabled" class="addc add-to-cart'.$product['id_product'].'" onclick="addtocart(\''.$product['id_product'].'\')" type="submit">Comprar</button>
		<input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="Actualizar" style="display: none;">
		</div>
		</div>
		</form>';
	$i.='</div>';
	$i.='</div>';
	$i.='<div class="row">';
	$i.='<div class="col-xs-12 col-md-8">';
		$i.='<div style="margin-top:10px;font-weight:bold;">Más Información</div>';
		$i.=wpautop($content);
		$i.='<div style="margin-top:10px;font-weight:bold;">Características</div>';
		if(count($product['caracteristicas']>0)) {
		$i.='<table border=1>';
		foreach ($product['caracteristicas'] as $atr=>$val) {
		$i.='<tr><td>'.$atr.'</td><td>'.$val.'</td></tr>';
		};
		$i.='</table>';
		};

		$i.='<div style="margin-top:10px;font-weight:bold;">Medidas Paquete</div>';
		if(count($product['medidas']>0)) {
		$i.='<table border=1>';
		foreach ($product['medidas'] as $atr=>$val) {
		$i.='<tr><td>'.$atr.'</td><td>'.round($val,0).'</td></tr>';
		};
		$i.='</table>';
		};
	$i.='</div>';
	$i.='<div class="col-xs-0 col-md-4">';
	$i.='</div>';
	$i.='</div>';
	return $i;
	$i.='<div style="margin-top:10px;font-weight:bold;">Imagen</div>';
		if($product['escuadrada']==1) {
			$i.='<img src="'.$product['imagen']['medium_cuadrada'].'" alt="'.$product['name'].'" title="'.$product['name'].'" />';
		} else {
			$i.='<img src="'.$product['imagen']['medium_default'].'" alt="'.$product['name'].'" title="'.$product['name'].'" />';
		}
	
	$i.='<div style="margin-top:10px;font-weight:bold;">Descripcion</div>';
	$i.='<p>'.$product['reference'].'</p>';
	
	$i.='<div style="margin-top:10px;font-weight:bold;">Referencia</div>';
	$i.='<p>'.$product['description_short'].'</p>';
	
	$i.='<div style="margin-top:10px;font-weight:bold;">Precio</div>';
	$i.='<p>';
	if($product['pricetax']>$product['netprice']) {
	$i.='<span style="text-decoration:line-through;">'.round($product['pricetax'],0).'</span>';
	};
	$i.=' '.round($product['netprice'],0).'</p>';
	$i.='<div style="margin-top:10px;font-weight:bold;">Otros caracteristicas</div>';
	$i.='<ul>
	<li>online_only: Solo venta online</li>
	<li>on_sale: oferta</li>
	<li>available_for_order: Desactivar futuros pedidos</li>
	<li>available_date: Fecha reposición (si no hay stock)</li>
	<li>show_price: Mostrar precio? S/N</li>
	<li>text_available: Texto cuando queda stock</li>
	<li>text_navailable: Texto cuando no queda stock</li>
	</ul>';
	$i.='<div style="margin-top:10px;font-weight:bold;">Medidas</div>';
	$i.='<div>'.$product['Altura'].' x '.$product['Anchura'].' x '.$product['Profundidad'].' cm</div>';
	
	$i.='<div style="margin-top:10px;font-weight:bold;">Comprar</div>';
	

	$i.='<div style="margin-top:10px;font-weight:bold;">Características</div>';
	if(count($product['caracteristicas']>0)) {
	$i.='<table border=1>';
	foreach ($product['caracteristicas'] as $atr=>$val) {
	$i.='<tr><td>'.$atr.'</td><td>'.$val.'</td></tr>';
	};
	$i.='</table>';
	};

	$i.='<div style="margin-top:10px;font-weight:bold;">Medidas Paquete</div>';
	if(count($product['medidas']>0)) {
	$i.='<table border=1>';
	foreach ($product['medidas'] as $atr=>$val) {
	$i.='<tr><td>'.$atr.'</td><td>'.round($val,0).'</td></tr>';
	};
	$i.='</table>';
	};
	$accesorios=explode(',',$atts['accesorios']);
	if(count($accesorios)>0) {
		$i.='<h2>Accesorios</h2>';
		foreach ($accesorios as $idac) {
			$elaccesorio=get_product($idac);
		if($elaccesorio['escuadrada']==1) {
			$i.='<img src="'.$elaccesorio['imagen']['medium_cuadrada'].'" alt="'.$elaccesorio['name'].'" title="'.$elaccesorio['name'].'" />';
		} else {
			$i.='<img src="'.$elaccesorio['imagen']['medium_default'].'" alt="'.$elaccesorio['name'].'" title="'.$elaccesorio['name'].'" />';
		}
			$i.='<form action="'.get_site_url().'/tiendaonline/carrito" method="post" class="addcartform'.$elaccesorio['id_product'].'">
		<input type="hidden" name="token" value="" class="gettoken">
		<input type="hidden" name="id_product" value="'.$elaccesorio['id_product'].'" id="product_page_product_id">
		<input type="hidden" name="id_customization" value="0" id="product_customization_id">
		<input type="hidden" name="action" value="update" id="product_customization_id">
		<input type="hidden" name="add" value="1" id="product_customization_id">
		<input type="text" name="qty" id="quantity_wanted" value="1" class="input-group form-control" min="1" aria-label="Cantidad" style="display: block;">
		<button disabled="disabled" class="addc add-to-cart'.$elaccesorio['id_product'].'" onclick="addtocart(\''.$elaccesorio['id_product'].'\')" type="submit">Comprar</button>
		<input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="Actualizar" style="display: none;">
		</form>';
		}
	}
	
	$i.='</div>';
	return $i;
}


add_shortcode( 'productosimple', 'productosimple' );



function footerhome($atts = [],$content=NULL) {
	$i=do_shortcode('[wpens_easy_newsletter firstname="no" lastname="no" button_text="Suscribirse"]');
	return $i;
	
}
add_shortcode( 'footerhome', 'footerhome' );

function opiniones ($atts = [],$content=NULL) {
	if($atts['limit']=="") {
	$limit=3;
	} else {
		$limit=$atts['limit'];
	}
	$fechas[1]="Lunes";
	$fechas[2]="Martes";
	$fechas[3]="Miércoles";
	$fechas[4]="Jueves";
	$fechas[5]="Viernes";
	$fechas[6]="Sábado";
	$fechas[7]="Domingo";
	$mes['01']="Enero";
	$mes['02']="Febrero";
	$mes['03']="Marzo";
	$mes['04']="Abril";
	$mes['05']="Mayo";
	$mes['06']="Junio";
	$mes['07']="Julio";
	$mes['08']="Agosto";
	$mes['09']="Setiembre";
	$mes['10']="Octubre";
	$mes['11']="Noviembre";
	$mes['12']="Diciembre";
	$tiendas[1]="Sant Boi";
	$tiendas[2]="Tienda Online";
	$tiendas[3]="Montigalà";
	$tiendas[4]="Outlet Ripillet";
	$tiendas[5]="San Sebastián de los Reyes";
	$que="SELECT * FROM  `wp_opiniones_clientes` WHERE parent=0 ORDER BY fecha DESC LIMIT ".$limit."";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$i='<div class="row" style="max-width:1200px;margin:0 auto;">';
			foreach ($query as $row) {
		$lafecha=explode(' ',$row->fecha);
		$lafecha=explode('-',$lafecha[0]);
		$fecha=$fechas[date('N', mktime(0,0,0,$lafecha[1],$lafecha[2],$lafecha[0]))].",".$lafecha[2]." de ".$mes[date('m', mktime(0,0,0,$lafecha[1],$lafecha[2],$lafecha[0]))]." de ".date('Y', mktime(0,0,0,$lafecha[1],$lafecha[2],$lafecha[0]));
	$i.='<div class="col-xs-12 col-md-4"><div style="margin:10px;background:#f0f0f0;padding: 20px;">';
	$i.='<div style="max-width:100px;margin:0 auto;"><img src="http://www.dicoro.com//img/5s.png"></div>';
	$i.='<div style="font-weight:bold;font-size: 16px;">'.$row->nombre.' '.substr($row->apellidos,0,1).'. '.$fecha.' '.$categorias[$row->id_category].'. Tienda de '.$tiendas[$row->id_store].'</div>';
	$i.='<div style="font-size: 14px;">El trato en tienda estupendo, nos asesoraron perfectamente, y encontramos justo el dormitorio que necesitábamos para las niñas. Hemos realizado otras dos compras más, un mueble de salón, y unas sillas de comedor, siendo el trato igual de bueno. El montaje fue rápido, limpio, y super atentos los chicos que vinieron. Podéis dar por seguro que volveré a comprar allí.</div>';	
	$i.='</div></div>';
			}
	$i.='</div>';
	return $i;
	
}
add_shortcode( 'opiniones', 'opiniones' );

function bannerslinea2 ($atts = [],$content=NULL) {
	$catalogourl=$atts['catalogourl'];
	$catalogoimg=$atts['catalogoimg'];
	$img = wp_get_attachment_image_src( $catalogoimg, 'full'); 
	$i='<div class="row" style="max-width:1200px;margin:0 auto;">';
	$i.='<div class="padding0 col-xs-12 col-md-6" style="cursor:pointer;background:url();">';
	$i.='<a href="'.get_permalink(2634).'"><img style="width:100%;" src="http://sillamania.es/wp-content/uploads/2018/05/b1.jpg" alt="Tiendas Dicoro" title="Tiendas Dicoro" /></a>';
	$i.='</div>';
	$i.='<div class="padding0 col-xs-12 col-md-3" style="margin-bottom: 9px;background:url(http://sillamania.es/wp-content/uploads/2018/06/b1.jpg);text-align:center;" onmouseover="$(this).find(\'img\').attr(\'src\',\'http://sillamania.es/wp-content/uploads/2018/06/camion_compra_animacion_on.gif\');">';
	$i.='<h2 style="font-size: 40px; padding: 30px 0 20px 0;">Compra online y recíbelo en tu casa</h2>';
	$i.='<img style="width:100%;max-width: 150px;" src="http://sillamania.es/wp-content/uploads/2018/06/camion_compra_animacion_off.jpg">';
	$i.='</div>';
	$i.='<div class="padding0 col-xs-12 col-md-3"><div>';
	$i.='<a href="'.get_permalink($catalogourl).'"><img style="width:100%;" src="'.$img[0].'" alt="Catálogo Dicoro" title="Catálogo Dicoro" /></a>';
	$i.='</div></div>';
	$i.='</div>';
	return $i;
	
}
add_shortcode( 'bannerslinea2', 'bannerslinea2' );


function paginaspilar($atts = [],$content=NULL) {
	$i='<div class="row" style="max-width:1200px;margin:0 auto;">';
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
    $pages = get_pages($args);
			$kk=0;
    foreach ($pages as $pos) {
		$categoria = get_field('categoria', $pos->ID );
		$grupo = get_field('grupo', $pos->ID );
		$destacado = get_field('destacado_home', $pos->ID );
		if($categoria!="" && $grupo==$atts['grupo'] && $destacado!="") {
			$lospos[$destacado]=$pos;
		}
		};
		ksort ($lospos);
		foreach ($lospos as $pos) {
			$kk=$kk+1;
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($pos->ID), 'medium'); 
		if ($img[0]!="") {
			$i.='<div class="col-xs-12 col-sm-6 col-md-3"><div style="padding: 10px;"><div class="row categoprod">';
		} else {
			$i.='<div class="col-md-3 col-sm-6 col-xs-12"><div style="padding: 10px;"><div class="row categoprod" style="background: #f0f0f0;">';
		};
					if ($img[0]!="") {
					//$i.='<div class="col-xs-12 col-sm-3 col-md-12"><a style="width:100%;" href="'.get_permalink($pos->ID).'"><img style="width:100%;" src="'.$img[0].'" alt="'.$pos->post_title.'" title="'.$pos->post_title.'" /></a></div>';
					$i.='<div class="col-xs-12 col-sm-3 col-md-12"><a style="width:100%;" href="'.get_permalink($pos->ID).'"><img style="width:100%;" src="http://placehold.it/511x511/bcbcbc" alt="'.$pos->post_title.'" title="'.$pos->post_title.'" /></a></div>';
					} else {
					$i.='<div class="col-xs-12 col-sm-3 col-md-12"><a style="width:100%;" href="'.get_permalink($pos->ID).'"><img style="width:100%;" src="http://placehold.it/511x511/bcbcbc" alt="'.$pos->post_title.'" title="'.$pos->post_title.'" /></a></div>';
					};
					$i.= '<div class="col-xs-12 col-sm-8 col-md-12"><h3><a style="color:black;" href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></h3></div>';
					/*
				$i.='<div class="acaja">';
					$i.='<div class="textocaja">';
						$i.= '<h3><a style="color:black;" href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></h3>';
						$i.='<p>'.get_post_meta($pos->ID, '_yoast_wpseo_metadesc', true).'</p>';
					$i.='</div>';
					$i.='<div class="footercaja"><span>Ver Más</span></div>';
				$i.='</div>';
					*/
			$i.= '</div></div></div>';
		};
	$i.='</div>';
	return $i;
	
}
add_shortcode( 'paginaspilar', 'paginaspilar' );

function textoseo($atts = [],$content=NULL) {
	$i='<div>';
		$i.='<'.$atts['tipo'].' class="containerhid" onclick="$(\'#'.$atts['identificador'].'\').toggle();"><span>+</span>'.$atts['titulo'].'</'.$atts['tipo'].'>';
		$i.='<div id="'.$atts['identificador'].'" class="hidseo">'.$content.'</div>';
	$i.='</div>';
	return $i;
	
}
add_shortcode( 'textoseo', 'textoseo' );


function menupilar($elgrupo) {
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
	$i='';
    $pages = get_pages($args);
	if($elgrupo=="productos") {
		foreach ($pages as $pos) {
			$pos->categoria = get_field('categoria', $pos->ID );
			$pos->grupo = get_field('grupo', $pos->ID );
			$pos->prestashop_id = get_field('prestashop_id', $pos->ID );
			$que="SELECT * FROM `ps_category` where id_category='".$pos->prestashop_id."'";
			$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			foreach ($query as $row) {
				$parent=$row->id_parent;
			}
			if($pos->categoria!="" && $pos->grupo==$elgrupo) {
			$categorias[$parent][$pos->ID]=$pos;
			};
		};
			foreach ($categorias[2] as $pos) {
				$i.='<li class="col-xs-12 col-sm-6 col-md-3">
				<a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a>';
				if(count($categorias[$pos->prestashop_id])>0) {
				$i.='<ul>';
				$i.=listarcategorias($categorias,$pos->prestashop_id);
				$i.='</ul>';
				};
				$i.='</li>';
			}
	} else {
		echo "entra aqui<br>";
		foreach ($pages as $pos) {
			$categoria = get_field('categoria', $pos->ID );
			$grupo = get_field('grupo', $pos->ID );
			if($categoria!="" && $grupo==$elgrupo) {
				$i.='<li><a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></li>';
			};
		};
	}
	return $i;
	
}


function listarcategorias($categorias,$id) {
		$i="";
		foreach ($categorias[$id] as $pos) {
			$i.='<li><a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a>';
			if(count($categorias[$pos->prestashop_id])>0) {
			$i.='<ul>';
			$i.=listarcategorias($categorias,$pos->prestashop_id);
			$i.='</ul>';
			};
			$i.='</li>';
		}
		return $i;
}

function listaproductos($atts = [],$content=NULL) {
	$categoria= get_field( "prestashop_id", get_the_ID() );
	if($atts['idcat']!="") {
		$categoria=$atts['idcat'];
	}	
	$que="SELECT * FROM ps_product where id_product IN (SELECT id_product FROM `ps_category_product` where id_category='".$categoria."')";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$elprecio=0;
	foreach ($query as $row) {
		$productos[$row->id_product]=get_product($row->id_product);
		if($row->price*1.21>$elprecio) {
			$elprecio=round($row->price*1.21,0);
		}
	}
	$i.="<div class='row'>";
		$i.= '
		<div class="col-xs-12 col-md-4 desplegablecat">
				<div class="titulodesp" onclick="$(this).parent(\'.desplegablecat\').toggleClass(\'active\');">Precio <i></i></div>
				<div class="range-slider desplegable">
					<div style="padding: 0 30px;">
					<p>
					  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
					</p>
					<div id="slider-range"></div>
					</div>
				<div class="cerrar"><span onclick="$(this).parent().parent().parent(\'.desplegablecat\').toggleClass(\'active\');">Cerrar</span></div>
				</div>
		</div>
	  <script>
	  $( function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: '.$elprecio.',
		  values: [ 0, '.$elprecio.' ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "" + ui.values[ 0 ] + "€ - " + ui.values[ 1 ]+"€" );
		  }
		});
		$( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
		  "€ - " + $( "#slider-range" ).slider( "values", 1 )+"€" );
	  } );
	  </script>

		';
	if($atts['filtros']!="") {
		$filtros=explode(",",$atts['filtros']);
		$que="SELECT * FROM `ps_attribute_group_lang` WHERE id_lang=1 AND id_attribute_group IN ('".implode(',',$filtros)."')";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($query as $row) {
			$losfiltros[$row->id_attribute_group]=$row->public_name;
		}
		$atrvalores=NULL;
		foreach ($productos as $producto) {
			foreach ($producto['atributos'] as $atributo=>$valores) {
				if(in_array($atributo,$filtros)) {
					foreach ($valores['valores'] as $valor) {
						$atrvalores[$valor['id']]=$valor['name'];
					};
				}
			}
		}
		asort($atrvalores);
		foreach ($filtros as $filtro) {
			$i.='
		<div class="col-xs-12 col-md-4 desplegablecat">
				<div class="titulodesp" onclick="$(this).parent(\'.desplegablecat\').toggleClass(\'active\');">'.$losfiltros[$filtro].' <i></i></div>
				<div class="desplegable">
					<div class="cajita">';
					foreach ($atrvalores as $atr=>$val) {
						$i.='<div value="'.$atr.'"><input id="fil'.$atr.'" value="'.$atr.'" type="checkbox" /> <label for="fil'.$atr.'">'.$val.'</label></div>';
					}
			$i.='</div>
				<div class="cerrar"><span onclick="$(this).parent().parent().parent(\'.desplegablecat\').toggleClass(\'active\');">Cerrar</span></div></div>
		</div>';
		}
	}
	if($atts['caracteristicas']!="") {
		$filtros=explode(",",$atts['caracteristicas']);
		$losfiltros=NULL;
		$que="SELECT * FROM `ps_feature_lang` WHERE id_lang=1 AND id_feature IN ('".implode(',',$filtros)."')";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($query as $row) {
			$losfiltros[$row->id_feature]=$row->name;
			$filtrosn[$row->name]=$row->name;
			$filtrosnr[$row->name]=$row->id_feature;
		}
		$atrvalores=NULL;
		foreach ($productos as $producto) {
			foreach ($producto['caracteristicas'] as $atributo=>$valores) {
				if(in_array($atributo,$filtrosn)) {
					$atrvalores[$filtrosnr[$atributo]][$valores]=$valores;
				}
			}
		}
		asort($atrvalores);
		foreach ($filtros as $filtro) {
			$i.='
		<div class="col-xs-12 col-md-4 desplegablecat">
				<div class="titulodesp" onclick="$(this).parent(\'.desplegablecat\').toggleClass(\'active\');">'.$losfiltros[$filtro].' <i></i></div>
				<div class="desplegable">
					<div class="cajita">';
					foreach ($atrvalores[$filtro] as $atr=>$val) {
						$i.='<div value="'.$atr.'"><input id="car'.$filtro.$atr.'" value="'.$atr.'" type="checkbox" /> <label for="car'.$filtro.$atr.'">'.$val.'</label></div>';
					}
			$i.='</div>
				<div class="cerrar"><span onclick="$(this).parent().parent().parent(\'.desplegablecat\').toggleClass(\'active\');">Cerrar</span></div></div>
		</div>';
		}
	}
	$i.="</div>";
	if($atts['filtro']!="") {
		$filtro=$atts['filtro'];
	} else {
		$filtro=NULL;
	}
	$que="SELECT id_product FROM `ps_category_product` where id_category='".$categoria."'";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		$i.='<div class="clearfix" style="font-size: 14px;">';
		$i.='<span>('.count($query).' artículos)</span>';
		$i.='<div style="float:right;font-size:14px;">Ordenar por: <select style="width:auto;padding:0;font-size: 14px;">
		<option>Favoritos</option>
		<option>Precio más bajo</option>
		<option>Precio más alto</option>
		<option>Ofertas</option>
		</select></div>';
		$i.='</div>';
		$i.="<div class='row'>";
		foreach ($query as $row) {
			$productos[$row->id_product]=get_product($row->id_product);
		}
		foreach ($productos as $prod) {
			$afiltrar=NULL;
			foreach ($prod['atributos'] as $atributo=>$valores) {
				$afiltrar[$atributo]=$atributo;
			}
				if(in_array($filtro,$afiltrar) && $filtro!="") {
					foreach ($valores['valores'] as $valor) {
						$precio=round($prod['combi'][$valor['product_attribute']]['pricetax'],0)."€";
						$precioneto=round($prod['combi'][$valor['product_attribute']]['netprice'],0)."€";
						$imagen=$prod['combi'][$valor['product_attribute']]['imagen'];
						$link="http://sillamania.es/tiendaonline/".$prod['id_product']."-".$valor['product_attribute']."-".$prod['link_rewrite'].".html";
						$i.='<div class="col-md-4 col-sm-6 col-xs-12">';
						$i.='<div class="acaja">';
						if ($imagen['medium_default']=="") {
							$i.='<div class="imgcaja"><a style="width:100%;" href="'.$link.'">';
							if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
								$dto=round(($precioneto-$precio)/$precio,2)*100;
								$i.='<div class="dto">'.$dto.'%</div>';
							};
							//$i.='<span class="new">NEW</span>';
							$i.='<img style="width:100%;" src="'.get_site_url()."/wp-content/uploads/dicorocuadrado.jpg".'" alt="'.$prod['name'].' '.$valor['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
						} else {
							$i.='<div onmouseleave="cambiarimgslide('.$prod['id_product']."-".$valor['product_attribute'].',\'i\');" onmouseenter="cambiarimgslide('.$prod['id_product']."-".$valor['product_attribute'].',\'s\');" class="imgcaja"><a style="width:100%;" href="'.$link.'">';
								if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
									$dto=round(($precioneto-$precio)/$precio,2)*100;
									$i.='<div class="dto">'.$dto.'%</div>';
								};
							//$i.='<span class="new">NEW</span>';
							if(count($prod['imagenesextra'])>0) {
								$j=NULL;
									$j='totalim="'.count($prod['imagenesextra']).'"';
									if($prod['escuadrada']==1) {
									$j.='actual=0 imgex0="'.$imagen['medium_cuadrada'].'"';
									} else {
									$j.='actual=0 imgex0="'.$imagen['medium_default'].'"';
									}
								foreach ($prod['combi'][$valor['product_attribute']]['imagenesextra'] as $k=>$extras) {
									if($prod['escuadrada']==1) {
									$j.=' imgex'.$k.'="'.$extras['medium_cuadrada'].'"';
									} else {
									$j.=' imgex'.$k.'="'.$extras['medium_default'].'"';
									}
								}
									if($prod['escuadrada']==1) {
							$i.='<img class="laimg'.$prod['id_product']."-".$valor['product_attribute'].'" style="width:100%;" '.$j.' src="'.$imagen['medium_cuadrada'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" />';
									} else {
							$i.='<img class="laimg'.$prod['id_product']."-".$valor['product_attribute'].'" style="width:100%;" '.$j.' src="'.$imagen['medium_default'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" />';
									}
							$i.='</a>';
							$i.='<span onclick="cambiarimgslide('.$prod['id_product']."-".$valor['product_attribute'].',0);" class="leftarr"><</span><span class="rightarr" onclick="cambiarimgslide('.$prod['id_product']."-".$valor['product_attribute'].');">></span>';
							$i.='</div>';
							} else {
									if($prod['escuadrada']==1) {
							$i.='<img style="width:100%;" src="'.$imagen['medium_cuadrada'].'" alt="'.$prod['name'].' '.$valor['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
									} else {
							$i.='<img style="width:100%;" src="'.$imagen['medium_default'].'" alt="'.$prod['name'].' '.$valor['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
									}
							};
						};
						$i.='<div class="textocaja">';
						/*
						*/
						if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
						$i.='<div class="tituloprod">
							<a href="'.$link.'">'.$prod['name'].' '.$valor['name'].'</a>
							<span class="elprecio">
							<span class="preciodto">'.$precioneto.'</span>
							<span class="precioantes">'.$precio.'</span>
							</span>
						</div>';
						} else {
						$i.='<div class="tituloprod">
							<a href="'.$link.'">'.$prod['name'].' '.$valor['name'].'</a>
							<span class="elprecio">
							<span class="preciodto">'.$precio.'</span>
							</span>
						</div>';
						};
						$i.='<div class="entrega enstock">Entrega: 3-5 días laborables</div>';
						$i.='</div>';
						$i.='</div>';
						$i.='</div>';
					};
				} else {
					$precio=round($prod['pricetax'],0)."€";
					$precioneto=round($prod['netprice'],0)."€";
					$link="http://sillamania.es/tiendaonline/".$prod['id_product']."-".$prod['link_rewrite'].".html";
					$i.='<div class="col-md-4 col-sm-6 col-xs-12">';
					$i.='<div class="acaja">';
					if ($prod['imagen']['medium_default']=="") {
						$i.='<div class="imgcaja"><a style="width:100%;" href="'.$link.'">';
							if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
								$dto=round(($precioneto-$precio)/$precio,2)*100;
								$i.='<div class="dto">'.$dto.'%</div>';
							};
							//$i.='<span class="new">NEW</span>';
							$i.='<img style="width:100%;" src="'.get_site_url()."/wp-content/uploads/dicorocuadrado.jpg".'" alt="'.$prod['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
					} else {
						$i.='<div onmouseleave="cambiarimgslide('.$prod['id_product'].',\'i\');" onmouseenter="cambiarimgslide('.$prod['id_product'].',\'s\');"  class="imgcaja"><a style="width:100%;" href="'.$link.'">';
							if($prod['combi'][$valor['product_attribute']]['netprice']<$prod['combi'][$valor['product_attribute']]['pricetax'] && $prod['combi'][$valor['product_attribute']]['netprice']>0) {
								$dto=round(($precioneto-$precio)/$precio,2)*100;
								$i.='<div class="dto">'.$dto.'%</div>';
							};
							//$i.='<span class="new">NEW</span>';
							if(count($prod['imagenesextra'])>0) {
								$j=NULL;
									$j='totalim="'.count($prod['imagenesextra']).'"';
									$j.='actual=0 imgex0="'.$prod['imagen']['medium_default'].'"';
								foreach ($prod['imagenesextra'] as $k=>$extras) {
									$j.=' imgex'.$k.'="'.$extras['medium_default'].'"';
								}
									if($prod['escuadrada']==1) {
							$i.='<img class="laimg'.$prod['id_product'].'" style="width:100%;" '.$j.' src="'.$prod['imagen']['medium_cuadrada'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" />';
									} else {
							$i.='<img class="laimg'.$prod['id_product'].'" style="width:100%;" '.$j.' src="'.$prod['imagen']['medium_default'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" />';
									}
							$i.='</a>';
							$i.='<span onclick="cambiarimgslide('.$prod['id_product'].',0);" class="leftarr"><</span><span class="rightarr" onclick="cambiarimgslide('.$prod['id_product'].');">></span>';
							$i.='</div>';
							} else {
									if($prod['escuadrada']==1) {
							$i.='<img style="width:100%;" src="'.$prod['imagen']['medium_cuadrada'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
									} else {
							$i.='<img style="width:100%;" src="'.$prod['imagen']['medium_default'].'" alt="'.$prod['name'].'" title="'.$prod['name'].'" /><span class="hidden hiddenbg"></span><span class="hidden hiddentxt">Más Información</span></a></div>';
									}
							};
					};
					$i.='<div class="textocaja">';
						if($prod['netprice']<$prod['pricetax'] && $prod['netprice']>0) {
						$i.='<div class="tituloprod">
							<a href="'.$link.'">'.$prod['name'].' '.$valor['name'].'</a>
							<span class="elprecio">
							<span class="preciodto">'.$precioneto.'</span>
							<span class="precioantes">'.$precio.'</span>
							</span>
						</div>';
						} else {
						$i.='<div class="tituloprod">
							<a href="'.$link.'">'.$prod['name'].' '.$valor['name'].'</a>
							<span class="elprecio">
							<span class="preciodto">'.$precio.'</span>
							</span>
						</div>';
						};
						$i.='<div class="entrega enstock">Entrega: 3-5 días laborables</div>';
						foreach ($prod['specific_price'] as $spe) {
							if($spe['tipo']=="flash") {
								$i.='<p>Oferta Flash '.countdown('oferta123',$spe['to']).'</p>';
							}
						}
					$i.='</div>';
					$i.='</div>';
					$i.='</div>';
				}
			}
	$i.="</div>";
	$i.='<script>
	function cambiarimgslide(idprod,sube=1) {
		if(sube==\'i\') {
		var actual=0;
		} else if(sube==\'s\') {
		var actual=1;
		} else if(sube==1) {
		var actual=Math.round($(\'.laimg\'+idprod).attr(\'actual\'))+1;
		} else {
		var actual=Math.round($(\'.laimg\'+idprod).attr(\'actual\'))-1;
		}
		if(actual>$(\'.laimg\'+idprod).attr(\'totalim\')) {
			actual=0
		} else if (actual<0) {
			actual=$(\'.laimg\'+idprod).attr(\'totalim\');
		}
		$(\'.laimg\'+idprod).attr(\'actual\',actual);
		$(\'.laimg\'+idprod).attr(\'src\',$(\'.laimg\'+idprod).attr(\'imgex\'+actual));
	}
	
	</script>';
	return $i;
	
}

add_shortcode( 'listaproductos', 'listaproductos' );


function countdown($id,$fecha) {
$fecha = date('Y/m/d',strtotime($fecha.' 23:59:59'));
		$i='<span style="margin:10px;" id="countdown'.$id.'"></span>
		<script src="'.get_site_url().'/wp-content/themes/genesis-sample/js/countdown.js"></script>
		<script type="text/javascript">
		  $("#countdown'.$id.'")
		  .countdown("'.$fecha.'", function(event) {
			$(this).text(
			  event.strftime("%D dias %H:%M:%S")
			);
		  });
		</script>
		';
	return $i;
}

function getsuperparent($prestashop_id) {
			$que="SELECT * FROM `ps_category` WHERE id_category='".$prestashop_id."'";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				foreach ($query as $row) {
					$parent=$row->id_parent;
				}
		if($parent==NULL) {
			return '';
		} else if($parent==2) {
			return getarbolcategorias($prestashop_id);
		} else {
			return getsuperparent($parent);
		}
}

function getarbolcategorias ($prestashop_id,$cats=NULL) {
			$que="SELECT * FROM di_postmeta where meta_key='prestashop_id' AND meta_value='".$prestashop_id."' AND post_id IN (SELECT ID FROM di_posts where post_status='publish')";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				foreach ($query as $row) {
					$page=get_post($row->post_id);
				}
			$i.='<ul class="submenucat">';
			if($page->ID==get_the_ID()) {
				$i.='<li><span>'.$page->post_title."</span>";
			} else {
				$i.='<li><a href="'.get_permalink($page->ID).'">'.$page->post_title.'</a>';				
			}
			$i.=getlassubcategorias($prestashop_id);
			$i.='</li>';
			$i.='</ul>';
			return $i;
}

function getlassubcategorias ($prestashop_id) {
			$subs=getsubcategorias($prestashop_id);
			if(count(getsubcategorias($prestashop_id))>0) {
				$i.='<ul>';
				foreach ($subs as $page) {
					if($page->ID==get_the_ID()) {
						$i.='<li><span>'.$page->post_title."</span>";
					} else {
						$i.='<li><a href="'.get_permalink($page->ID).'">'.$page->post_title.'</a>';				
					}
					$kk = get_field('prestashop_id', $page->ID );
					$i.=getlassubcategorias($kk);
					$i.='</li>';
				}
				$i.='</ul>';
			};
			return $i;
};

function getsubcategorias ($prestashop_id,$cats=NULL) {
		if($cats!="") {
			$cats=explode(',',$atts['cat']);
		} else {
			$que="SELECT * FROM `ps_category` WHERE id_parent='".$prestashop_id."'";
				$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
				foreach ($query as $row) {
					$cats[]=$row->id_category;
				}
		};
    $args = array(
			'sort_order'   => 'ASC',
			'sort_column'  => 'post_title',
			'hierarchical' => 1,
			'post_type'    => 'page',
			'post_status'  => 'publish',
		);
		$pages = get_pages($args);
				$kk=0;
		foreach ($pages as $pos) {
			if($atts['cat']!="") {
				$categoria = get_field('categoria', $pos->ID );
			} else {
				$categoria = get_field('prestashop_id', $pos->ID );
			};
			$grupo = get_field('grupo', $pos->ID );
			$destacado = get_field('destacado_home', $pos->ID );
			if(in_array($categoria,$cats)) {
				$lascat[]=$pos;
			}
		};
	return $lascat;
}

function subcategorias($atts = [],$content=NULL) {
	$i='<div class="row" style="max-width:1200px;margin:0 auto;">';
		$prestashop_id = get_field('prestashop_id', get_the_ID() );
	if($atts['cat']!="" || $prestashop_id!="") {
		if($atts['cat']!="") {
		$pages=getsubcategorias($prestashop_id,$atts['cat']);
		} else {
		$pages=getsubcategorias($prestashop_id);
		};
		foreach ($pages as $pos) {
			if($atts['cat']!="") {
				$categoria = get_field('categoria', $pos->ID );
			} else {
				$categoria = get_field('prestashop_id', $pos->ID );
			};
			$grupo = get_field('grupo', $pos->ID );
			$destacado = get_field('destacado_home', $pos->ID );
				$kk=$kk+1;
				$img = wp_get_attachment_image_src( get_post_thumbnail_id($pos->ID), 'medium'); 
				if ($img[0]!="") {
					$i.='<div class="col-md-3 col-sm-6 col-xs-12"><div style="padding: 10px;"><div class="row categoprod">';
				} else {
					$i.='<div class="col-md-3 col-sm-6 col-xs-12"><div style="padding: 10px;"><div class="row categoprod" style="background: #f0f0f0;">';
				};
				if ($img[0]!="") {
					$i.='<div class="col-xs-12 col-sm-3 col-md-12"><a style="width:100%;" href="'.get_permalink($pos->ID).'"><img style="width:100%;" src="'.$img[0].'" alt="'.$pos->post_title.'" title="'.$pos->post_title.'" /></a></div>';
				} else {
					$i.='<div class="col-xs-12 col-sm-3 col-md-12"><a style="width:100%;" href="'.get_permalink($pos->ID).'"><img style="width:100%;" src="http://sillamania.es/wp-content/uploads/2018/05/f2f2f2.jpg" alt="'.$pos->post_title.'" title="'.$pos->post_title.'" /></a></div>';
				};
				$i.= '<div class="col-xs-12 col-sm-8 col-md-12"><h3><a style="color:black;" href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></h3></div>';
				/*
					$i.='<div class="acaja">';
					$i.='<div class="textocaja">';
						$i.= '<h3><a style="color:black;" href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></h3>';
						$i.='<p>'.get_post_meta($pos->ID, '_yoast_wpseo_metadesc', true).'</p>';
					$i.='</div>';
					$i.='<div class="footercaja"><span>Ver Más</span></div>';
					$i.='</div>';
							*/
				$i.= '</div></div></div>';
		};
	}
	$i.='</div>';
	print_r($i);
	return $i;
}

add_shortcode( 'subcategorias', 'subcategorias' );



function filtroscategoria($atts = [],$content=NULL) {
	if($atts['categoria']!="") {
		$categoria= $atts['categoria'];
	} else {
		$categoria= get_field( "prestashop_id", get_the_ID() );
	}
	$que="SELECT * FROM ps_product where id_product IN (SELECT id_product FROM `ps_category_product` where id_category='".$categoria."')";
	$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
	$elprecio=0;
	foreach ($query as $row) {
		$productos[$row->id_product]=get_product($row->id_product);
		if($row->price*1.21>$elprecio) {
			$elprecio=round($row->price*1.21,0);
		}
	}
	$i.="<div class='row'>";
		$i.= '
		<div class="col-xs-12 col-md-4 desplegablecat">
				<div class="titulodesp" onclick="$(this).parent(\'.desplegablecat\').toggleClass(\'active\');">Precio <i></i></div>
				<div class="range-slider desplegable">
					<div style="    padding: 0 30px;">
					<p>
					  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
					</p>
					<div id="slider-range"></div>
					</div>
				<div class="cerrar"><span onclick="$(this).parent().parent().parent(\'.desplegablecat\').toggleClass(\'active\');">Cerrar</span></div>
				</div>
		</div>
	  <script>
	  $( function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: '.$elprecio.',
		  values: [ 0, '.$elprecio.' ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "" + ui.values[ 0 ] + "€ - " + ui.values[ 1 ]+"€" );
		  }
		});
		$( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
		  "€ - " + $( "#slider-range" ).slider( "values", 1 )+"€" );
	  } );
	  </script>

		';
	if($atts['filtros']!="") {
		$filtros=explode(",",$atts['filtros']);
		$que="SELECT * FROM `ps_attribute_group_lang` WHERE id_lang=1 AND id_attribute_group IN ('".implode(',',$filtros)."')";
		$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
		foreach ($query as $row) {
			$losfiltros[$row->id_attribute_group]=$row->public_name;
		}
		$atrvalores=NULL;
		foreach ($productos as $producto) {
			foreach ($producto['atributos'] as $atributo=>$valores) {
				if(in_array($atributo,$filtros)) {
					foreach ($valores['valores'] as $valor) {
						$atrvalores[$valor['id']]=$valor['name'];
					};
				}
			}
		}
		asort($atrvalores);
		foreach ($filtros as $filtro) {
			$i.='
		<div class="col-xs-12 col-md-4 desplegablecat">
				<div class="titulodesp" onclick="$(this).parent(\'.desplegablecat\').toggleClass(\'active\');">'.$losfiltros[$filtro].' <i></i></div>
				<div class="desplegable">
					<div class="cajita">';
					foreach ($atrvalores as $atr=>$val) {
						$i.='<div value="'.$atr.'"><input id="fil'.$atr.'" value="'.$atr.'" type="checkbox" /> <label for="fil'.$atr.'">'.$val.'</label></div>';
					}
			$i.='</div>
				<div class="cerrar"><span onclick="$(this).parent().parent().parent(\'.desplegablecat\').toggleClass(\'active\');">Cerrar</span></div></div>
		</div>';
		}
	}
	$i.="</div>";
	$i="";
	return $i;
	
}

add_shortcode( 'filtroscategoria', 'filtroscategoria' );

/* SHORTCODES CMS */


function mapatiendas($atts = [],$content=NULL) {
	
	$img = wp_get_attachment_image_src( 2637, 'medium'); 
	$i='<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6"> <img alt="Mapa señalizado con las comunidades autónomas donde tenemos tiendas" style="width: 100%;" src="'.$img[0].'" title="Mapa señalizado con las comunidades autónomas donde tenemos tiendas" usemap="#Map" width="557" id="mapaes"></div>
    <div class="col-xs-12 col-md-6 col-lg-6">
        <div id="ide1" class="tieide">
            <h2>Tiendas en Catalunya</h2>
            <ul>';
                $i.='<li><a href="'.get_site_url().'/tiendas/dicoro-sant-boi/">Sant Boi de Llobregat</a></li>';
                $i.='<li><a href="'.get_site_url().'/tiendas/dicoro-badalona/">Badalona</a></li>';
                $i.='<li><a href="'.get_site_url().'/tiendas/dicoro-outlet-ripollet/">Badalona</a></li>';
            $i.='</ul>
        </div>
        <div id="ide6" class="tieide">
            <h2>Tiendas en la Comunidad de Madrid</h2>
            <ul>';
                $i.='<li><a href="'.get_site_url().'/tiendas/dicoro-san-sebastian-reyes/">San Sebastián de los Reyes</a></li>';
            $i.='</ul>
        </div>
    </div>
</div>';
	return $i;
	
}

add_shortcode( 'mapatiendas', 'mapatiendas' );


function elproducto($atts = [],$content=NULL) {
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($pos->ID), 'large'); 
	$texto= get_field( "texto", get_the_ID() );
	$i='<div class="row">
    <div class="col-xs-12 col-md-8"> 
		<img alt="" style="width: 100%;" src="'.$img[0].'" title="" />
	</div>
    <div class="col-xs-12 col-md-4">
		<h1>'.get_the_title().'</h1>
		<div class="row current-price">';
		$precio= get_field( "precio", get_the_ID() );
		$neto= get_field( "neto", get_the_ID() );
		if($precio!="") {
		$dto= round(($precio-$neto)/$precio,2)*100;
          $i.='<div class="col-xs-4">'.$neto.'€</div>
		  			<div class="product-discount col-xs-4">
			  
			  <div class="regular-price">'.$precio.'€</div>
			</div>
                        <div class="discount discount-amount col-xs-4">
                  -'.$dto.'%
              </div>';
		} else {
          $i.='<div class="col-xs-12">'.$neto.'€</div>';
		}
		$i.='</div>
		<div class="tax-shipping-delivery-label">Impuestos incluidos</div>
		<div>
		'.$texto.'
		</div>
    </div>
</div>';
	return $i;
	
}

add_shortcode( 'elproducto', 'elproducto' );



function elcatalogo($atts = [],$content=NULL) {
	$img = wp_get_attachment_image_src( $atts['img'], 'medium'); 
	$url=$atts['url'];
	$event=$atts['event'];
$i='<div class="clearfix">
<div style="float: left; background-color: #fff; text-align: center; padding: 9px; width: 220px; margin-bottom: 15px; border: 1px solid #eee;"><a target="_blank" onclick="ga(\'send\', \'event\', \'Catalogo\',\'Clic\', \''.$event.'\');" href="'.$url.'"><img src="'.$img[0].'" alt="width=" width="199" /></a>
<div><a class="btn btn-default" href="'.$url.'" onclick="ga(\'send\', \'event\', \'Catalogo\',\'Clic\', \''.$event.'\');" target="_blank">Descargar Catálogo</a></div>
</div>';
	return $i;
	
}

add_shortcode( 'elcatalogo', 'elcatalogo' );


function jsmetodosentrega($atts = [],$content=NULL) {
$i.='<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOwe0PUA3Ul3_iRxDl2u7BD0hcRr4GEJI&sensor=false"></script>
      	
<script type="text/javascript">

var origin, destination, service;
function calcular() {
	if ($(\'#origen_id\').val()=="SB") {
	origin = new google.maps.LatLng(41.328321,2.047434);
	} else if ($(\'#origen_id\').val()=="SS") {
	origin = new google.maps.LatLng(40.54165,-3.61086);
	} else if ($(\'#origen_id\').val()=="RI") {
	origin = new google.maps.LatLng(41.500855,2.139952);
	} else {
	origin = new google.maps.LatLng(41.456849,2.2234258);
	}
	if ($(\'#zone_id\').val() !="" && $(\'#direccion\').val()!="") {
    destination = $(\'#zone_id\').val()+\' \'+$(\'#direccion\').val();
    service = new google.maps.DistanceMatrixService();

	service.getDistanceMatrix(
		{
			origins: [origin],
			destinations: [destination],
			travelMode: google.maps.TravelMode.DRIVING,
			avoidHighways: false,
			avoidTolls: false
		}, 
		callback
	);
	} else {
		$(\'#dist\').html(\'Selecciona tu provincia e inserta tu código postal:\');
	};
};
	
	function callback(response, status) {
	
		if(status=="OK") {
			var distancia = Math.round(response.rows[0].elements[0].distance.value/10)/100;
			var precio = distancia-60;
			if (precio<0) { precio = 0};
			precio = Math.round((precio*1.6)*100)/100;
			if (precio>0) {
				$(\'.importeadicional\').show();
				$(\'.importeadicional .valor\').html(precio+\'€ por kilometraje +10% del valor del pedido\');	
			} else {
				$(\'.importeadicional\').show();
				$(\'.importeadicional .valor\').html(\'10% del valor del pedido\');	
			}
			$(\'#dist\').html(\'Nuestro almacén se encuentra aproximadamente a <strong>\'+distancia+\' km</strong> de tu casa.\');
			$(\'#tablatransporte\').show();
			$(\'#tablatransporte\').css(\'background\',\'none\');
			$(\'#tablatransporte .tabla\').show();
		} else {
			$(\'#dist\').html(\'No hemos podido procesar tu solicitud\');
		}
	}
</script>';
return $i;
	
}

add_shortcode( 'jsmetodosentrega', 'jsmetodosentrega' );

function datostienda($atts = [],$content=NULL) {
$i.='<div class="row" style="border: 1px solid #e3d3b9; background: white;">
<div class="col-xs-12 col-md-6 col-lg-6">
<h2 style="font-weight: bold;text-transform: uppercase;font-size: 14px;letter-spacing: 0.1em;padding-left: 20px;color:white;background:url(http://www.dicoro.com/img/iconos/bcbg.png);padding: 10px;">Horario</h2>
<div class="clearfix">
<div class="fotocalendario" style="width:120px;height:148px;float:left;background:url(http://www.dicoro.com/img/servicios/donde-estamos/jueves1.jpg) no-repeat center;">
</div>
<div style="width: 225px;float: right;padding-top: 25px;font-size: 13px;"> <strong>Abierto</strong> <span style="color:#931E1C;">Lunes a Sábado</span><br> <strong>Horario contínuo</strong> <span style="color:#931E1C;">9:00 a 21:00</span><br><br><br> <strong>At. al Cliente</strong> <span style="color:#931E1C;">93 700 11 01</span><br> <strong></strong> <span style="color:#931E1C;">Lunes a Viernes</span><br> <strong>Horario contínuo</strong> <span style="color:#931E1C;">09:30 a 17:00</span><br> <strong></strong> <span style="color:#931E1C;">Sábados</span><br> <strong>Horario</strong> <span style="color:#931E1C;">10:00 a 14:00</span><br></div></div><h2 style="margin-top: 20px;font-weight: bold;text-transform: uppercase;font-size: 14px;letter-spacing: 0.1em;padding-left: 20px;color:white;background:url(http://www.dicoro.com/img/iconos/bcbg.png);padding: 10px;">Dirección</h2>
<div class="clearfix"> 
<strong>DICORO SANT BOI</strong>
<br> ALBEREDES, 24 <br>
POL. IND. SALINES
<strong><br>08830 SANT BOI</strong><br><br>
<ul style="list-style: none none;margin: 0;padding: 0;vertical-align: baseline;width:100%;">
<li style="border-top: 1px dotted #CACACA;font-size: 16px;font-weight: normal;color:black;padding: 10px 0 0px 10px !important;"> 
<a href="https://maps.google.com/maps?q=41.328321,2.047434&amp;ll=41.328321,2.047421&amp;spn=0.001696,0.003878&amp;num=1&amp;t=m&amp;z=19" style="padding-left: 20px;font-size:13px;color:black;letter-spacing:0.1em;" target="_blank"> <span style="color:#931E1C;">Ver en google maps &gt;&gt;</span> </a>
</li>
</ul>
</div>
<h2 style="margin-top: 20px;font-weight: bold;text-transform: uppercase;font-size: 14px;letter-spacing: 0.1em;padding-left: 20px;color:white;background:url(http://www.dicoro.com/img/iconos/bcbg.png);padding: 10px;">Dias Festivos Abierto</h2><ul style="list-style: none none;margin: 0;padding: 0;vertical-align: baseline;width:100%;" class="diasabierto"></ul><h2 style="margin-top: 20px;font-weight: bold;text-transform: uppercase;font-size: 14px;letter-spacing: 0.1em;padding-left: 20px;color:white;background:url(http://www.dicoro.com/img/iconos/bcbg.png);padding: 10px;">Retiradas de clientes</h2><div style="padding:15px;font-size: 13px;"> <strong>ALMACÉN DICORO BARCELONA</strong><br> HORARIO: <br>LUNES A VIERNES DE 10:00 A 17:00 H<br> HORARIO: <br>SÁBADOS DE 10:00 A 13:00 H<br> Doctor Ferrán,
43 (P.I. de la Llagosta)<br> <strong>08210 La Llagosta</strong></div></div><div class="col-xs-12 col-md-6 col-lg-6"> <img src="http://www.dicoro.com/img/servicios/donde-estamos/img1.jpg" style="width: 100%;display:block;margin:10px auto;margin-top: 0;"> <a href="https://maps.google.com/maps?q=41.328321,2.047434&amp;ll=41.328321,2.047421&amp;spn=0.001696,0.003878&amp;num=1&amp;t=m&amp;z=19" target="_BLANK"> <img src="http://www.dicoro.com/img/servicios/donde-estamos/mapa-sant-boi.gif?v=2" style="width:100%;" alt="donde estamos"> </a></div></div>';
	return $i;
	
}

add_shortcode( 'datostienda', 'datostienda' );


/*
 * Funciones David
 */


/*
 *	 ESTRATEGIA 1
 *   Esto es el principio de un plugin
 *   webservice que se conecta a prestashop
 *   y devuelve todos los datos
 *   EL UNICO PROBLEMA POR RESOLVER AHORA
 *   ES CAMBIAR CURL POR MULTICURL 
 *   PARA ASI PODER MEJORAR LA VELOCIDAD
 * 	 Y CARGAR TODOS LOS DATOS COMO DIOS MANDA 
 */

/*
$application = new OfiprixClient();
$application->setOpcion("categories");
//$application->getData();
$application->getCategories();
*/


/*
 *	 ESTRATEGIA 2
 *   Esto es el principio de cargar
 *   la estructura de prestashop
 *   y cargar los objetos para asi 
 *   poder interactuar con las consultas
 *   de los objetos en 1.6 va perfecto en 1.7
 *   hace un redirect dnd esta la tienda 
 * 	 hay que mirarlo 
 */


/* 
include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/init.php');
Context::getContext()->cookie->id_lang
$default_lang = Configuration::get('PS_LANG_DEFAULT');
*/


/*
 * Get paginas_pilar
 * por el custom_field
 * paginas_pilar == si
 */

/*
function get_paginas_pilar(){
	$paginas = get_pages();
	foreach ($paginas as $pagina){
		$pilar = get_field('pagina-pilar', $pagina->ID );
	}
	// get pages
}

get_paginas_pilar();
*/


/*
 * Menu functions 
 */


function menupilar_mio($elgrupo) {
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
	$i='';
    $pages = get_pages($args);
	if($elgrupo=="productos") {
		foreach ($pages as $pos) {
			$pos->categoria = get_field('categoria', $pos->ID );
			$pos->grupo = get_field('grupo', $pos->ID );
			$pos->prestashop_id = get_field('prestashop_id', $pos->ID );
			$que="SELECT * FROM `ps_category` where id_category='".$pos->prestashop_id."'";
			$my_wpdb = new wpdb('root','','sillamaniaes_dos','localhost');
			$query = $my_wpdb->get_results( $que, OBJECT );
			//$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			foreach ($query as $row) {
				$parent=$row->id_parent;
			}
			if($pos->categoria!="" && $pos->grupo==$elgrupo) {
			$categorias[$parent][$pos->ID]=$pos;
			};
		};
			foreach ($categorias[2] as $pos) {
				$i.='<li class="col-xs-12 col-sm-6 col-md-3">
				<a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a>';
				if(count($categorias[$pos->prestashop_id])>0) {
				$i.='<ul>';
				$i.=listarcategorias($categorias,$pos->prestashop_id);
				$i.='</ul>';
				};
				$i.='</li>';
			}
	} else {
		echo "entra aqui<br>";
		foreach ($pages as $pos) {
			$categoria = get_field('categoria', $pos->ID );
			$grupo = get_field('grupo', $pos->ID );
			if($categoria!="" && $grupo==$elgrupo) {
				$i.='<li><a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></li>';
			};
		};
	}
	return $i;
	
} 

function menupilar_menu($elgrupo) {
    $args = array(
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    );
	$i='';
    $pages = get_pages($args);
	if($elgrupo=="productos") {
		foreach ($pages as $pos) {
			$pos->categoria = get_field('categoria', $pos->ID );
			$pos->grupo = get_field('grupo', $pos->ID );
			$pos->prestashop_id = get_field('prestashop_id', $pos->ID );
			$que="SELECT * FROM `ps_category` where id_category='".$pos->prestashop_id."'";
			$my_wpdb = new wpdb('root','','sillamaniaes_dos','localhost');
			$query = $my_wpdb->get_results( $que, OBJECT );
			//$query = $GLOBALS['wpdb']->get_results( $que, OBJECT );
			foreach ($query as $row) {
				$parent=$row->id_parent;
			}
			if($pos->categoria!="" && $pos->grupo==$elgrupo) {
			$categorias[$parent][$pos->ID]=$pos;
			};
		};
		$i= '<ul class="principal">';
		foreach ($categorias[2] as $pos) {
				//$i.='<li class="col-xs-12 col-sm-6 col-md-3">
				$i.='<li>
				<a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a>';
				if(count($categorias[$pos->prestashop_id])>0) {
				$i.='<div class="mega-menu">';
				$i.='<ul>';
				$i.=listarcategorias_menu($categorias,$pos->prestashop_id);
				$i.='</ul>';
				$i.='</div>';
				};
				$i.='</li>';
		}
		$i.= '</ul>';
	} else {
		foreach ($pages as $pos) {
			$categoria = get_field('categoria', $pos->ID );
			$grupo = get_field('grupo', $pos->ID );
			if($categoria!="" && $grupo==$elgrupo) {
				$i.='<li><a href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a></li>';
			};
		};
	}
	return $i;
}

function menu_products_by_categoria($id_categoria){
	//echo "Consulta productos por categorias";	
}

function listarcategorias_menu($categorias,$id) {
	$i="";
	$contador = 0;
	foreach ($categorias[$id] as $pos) {
		if ($contador == 0){
			$i.='<li><a class="ver-catalogo" href="'.get_permalink($pos->ID).'">'.$pos->post_title.'</a>';
		}else{
			$i.='<li><a href="'.get_permalink($pos->ID).'"><img src="http://placehold.it/80x80/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen"/><p>'.$pos->post_title.'</p></a>';
		}
		if(count($categorias[$pos->prestashop_id])>0) {
		$i.='<ul>';
		$i.=listarcategorias_menu($categorias,$pos->prestashop_id);
		$i.='</ul>';
		};
		$i.='</li>';
		$contador++;
	}
	return $i;
}

/*
 * Categorias en 
 * home
 * 
 */ 

 $categorias_raiz = array();
 $subcategorias   = array();	

 function categorias_destacadas_home($prestashop_id){
	$categorias = getsubcategorias($prestashop_id);
	return $categorias;
}


function categorias_raiz(){
	global $categorias_raiz;
	$sql="SELECT categorylang.name,category.id_category ";
	$sql.="from ps_category as category "; 
	$sql.="LEFT JOIN ps_category_lang as categorylang "; 
	$sql.="ON categorylang.id_category = category.id_category ";
	$sql.="where categorylang.id_lang = 1 ";
	$sql.="AND category.id_parent = 2 ";
	$my_wpdb = new wpdb('root','','sillamaniaes_dos','localhost');
	$query = $my_wpdb->get_results( $sql, OBJECT );
	//$query = $GLOBALS['wpdb']->get_results( $sql, OBJECT );
				foreach ($query as $row) {
					$categorias_raiz[$row->id_category] = $row->name;
				}
	//print_r($categorias_raiz);
	return $categorias_raiz;
}

/*
function subcategorias_raiz(){
	global $categorias_raiz;
	foreach ($categorias_raiz as $indice => $nombre){
		$sql="SELECT categorylang.name,category.id_category ";
		$sql.="from ps_category as category "; 
		$sql.="LEFT JOIN ps_category_lang as categorylang "; 
		$sql.="ON categorylang.id_category = category.id_category ";
		$sql.="where categorylang.id_lang = 1 ";
		$sql.="AND category.id_parent = ".$indice;
		$query = $GLOBALS['wpdb']->get_results( $sql, OBJECT );
					foreach ($query as $row) {
						if (!is_array($subcategorias[$indice])){
							$subcategorias[$indice] = array();
						}
						$temp = array(
							$row->id_category => $row->name
						);
						array_push($subcategorias[$indice],$temp);
					}
	}
	//print_r($subcategorias);
	return $subcategorias;
}
*/

function subcategorias_raiz($atts = [], $content = null, $tag = ''){
	$categorias    = categorias_raiz();
	global $categorias_raiz;
	foreach ($categorias_raiz as $indice => $nombre){
		$sql="SELECT categorylang.name,category.id_category ";
		$sql.="from ps_category as category "; 
		$sql.="LEFT JOIN ps_category_lang as categorylang "; 
		$sql.="ON categorylang.id_category = category.id_category ";
		$sql.="where categorylang.id_lang = 1 ";
		$sql.="AND category.id_parent = ".$indice;
		$my_wpdb = new wpdb('root','','sillamaniaes_dos','localhost');
		$query = $my_wpdb->get_results( $sql, OBJECT );
		//$query = $GLOBALS['wpdb']->get_results( $sql, OBJECT );
					foreach ($query as $row) {
						if (!is_array($subcategorias[$indice])){
							$subcategorias[$indice] = array();
						}
						$temp = array(
							$row->id_category => $row->name
						);
						array_push($subcategorias[$indice],$temp);
					}
	}
	$str='<div class="catalogo">';
	$str.='<div class="container-catalogo">';
	$str.='	<div class="container">';
	$str.='		<div class="container-img">';
	$str.='			<div class="row">';
	 
	foreach($subcategorias[$atts['subcategoria']] as $sub){
		foreach($sub as $clave =>$cat_name){  
			$str.= '<div class="col-xs-12 col-sm-6 col-md-3">';
				$str.= '<a href="" class="item">';
				$str.= '<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
				$str.= '<p>'.$cat_name.'</p>';
				$str.= '</a>';
			$str.= '</div>';
		}
	}
	$str.='			</div>';
	$str.='		</div>';	
	$str.='	</div>';
	$str.='</div>';
	$str.='</div>';
	return $str;
}

add_shortcode( 'subcategorias_raiz', 'subcategorias_raiz' );

function titulo_categoria($atts = [], $content = null, $tag = ''){
	$categorias    = categorias_raiz();
	// $categorias[233]
	$str= '<h2 style="font-weight: 700; font-size: 60px; margin-bottom: 50px; text-align: center;">'.$categorias[$atts['subcategoria']].'</h2>';
	$str.= '<div class="container-info" style="background-color: #ECECEC; padding: 30px; max-width: 1137px; margin: 20px auto;">';
	$str.= '<div class="titular">';
	$str.= '	<h3>'.$atts['titulo'].'</h3>';
	$str.= '</div>';
	$str.= '<div class="description">';
	$str.= '	<p>'.$content.'</p>';
	$str.= '</div>';
	$str.='</div>';
	return $str;
}

add_shortcode( 'titulo_categoria', 'titulo_categoria' );

/*
function encuentra_el_mejor_sofa(){
	$str='<div class="container">';
	$str.='	<div class="titular-separador">';
	$str.='		<h2>Encuentra el mejor sofá para tu casa</h2>';
	$str.='	</div>';
	$str.='</div>';
	return $str;
}

add_shortcode( 'encuentra_el_mejor_sofa', 'encuentra_el_mejor_sofa' );
*/

function bloque_mas_vendidos($atts = [], $content = null, $tag = ''){
	$str='<div class="container-mas-vendidos bloque-destacados">';
	$str.='	<div class="container">';
	$str.='		<div class="row">';
	$str.='	<div class="col-xs-12 col-md-3">';
	$str.='		<div class="titular">';
	$str.='			<h2>Los más vendidos</h2>';
	$str.='			<a href="" >Explorar</a>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='	<div class="col-xs-12 col-md-9">';
	$str.='		<div class="carrusel-mas-vendidos carrusel productos">';
	$str.='			<a class="item-prod">';
	$str.='				<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='				<div class="container-text">';
	$str.='					<div class="wrapper-position">';
	$str.='						<div class="extra-info porcentaje-descuento">';
	$str.='							<p>20%</p>';
	$str.='						</div>';
	$str.='						<div class="info">';
	$str.='							<div class="descripcion">';
	$str.='								<p>Sillón tela confort</p>';
	$str.='							</div>';
	$str.='							<div class="price-box">';
	$str.='								<span class="price-container old-price">';
	$str.='									<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='								</span>';
	$str.='								<span class="price-container special-price">';
	$str.='									<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='								</span>';
	$str.='							</div>';							
	$str.='						</div>';	
	$str.='					</div>';
	$str.='				</div>';		
	$str.='			</a>';
	$str.='				<a class="item-prod">';
	$str.='				<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='				<div class="container-text">';
	$str.='					<div class="wrapper-position">';
	$str.='						<div class="extra-info porcentaje-descuento">';
	$str.='							<p>20%</p>';
	$str.='						</div>';
	$str.='						<div class="info">';
	$str.='							<div class="descripcion">';
	$str.='								<p>Sillón tela confort</p>';
	$str.='							</div>';
	$str.='							<div class="price-box">';
	$str.='								<span class="price-container old-price">';
	$str.='									<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='								</span>';
	$str.='								<span class="price-container special-price">';
	$str.='									<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='								</span>';
	$str.='							</div>';							
	$str.='						</div>';	
	$str.='					</div>';
	$str.='				</div>';		
	$str.='			</a>';
	$str.='		<a class="item-prod">';
	$str.='				<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='				<div class="container-text">';
	$str.='					<div class="wrapper-position">';
	$str.='						<div class="extra-info porcentaje-descuento">';
	$str.='							<p>20%</p>';
	$str.='						</div>';
	$str.='						<div class="info">';
	$str.='							<div class="descripcion">';
	$str.='								<p>Sillón tela confort</p>';
	$str.='							</div>';
	$str.='							<div class="price-box">';
	$str.='								<span class="price-container old-price">';
	$str.='									<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='								</span>';
	$str.='								<span class="price-container special-price">';
	$str.='									<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='								</span>';
	$str.='							</div>';							
	$str.='						</div>';	
	$str.='					</div>';
	$str.='				</div>';		
	$str.='			</a>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='</div>';	
	$str.='	</div>';	
	$str.='</div>';
	return $str;
}

add_shortcode( 'bloque_mas_vendidos', 'bloque_mas_vendidos' );

/*
function banner_prueba(){
	$str='<div class="container-tapiceria">';
	$str.='	<div class="container">';
	$str.='<div class="container-text">';
	$str.='	<h2>La tapicería perfecta</h2>';
	$str.='	<div class="description">';
	$str.='		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>';
	$str.='	</div>';
	$str.='</div>';
	$str.='<div class="container-img">';
	$str.='	<div class="row">';
	$str.='		<div class="col-xs-12 col-sm-4">';
	$str.='			<div class="row">';
	$str.='				<div class="col-xs-6 col-sm-12">';
	$str.='					<div class="item">';
	$str.='						<img src="http://placehold.it/768x768/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='					</div>';
	$str.='				</div>';
	$str.='				<div class="col-xs-6 col-sm-12">';
	$str.='					<div class="item">';
	$str.='						<img src="http://placehold.it/768x768/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='					</div>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='		<div class="col-xs-12 col-sm-8">';
	$str.='			<div class="item">';
	$str.='				<img src="http://placehold.it/768x768/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='			</div>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='</div>';
	$str.='	</div>';
	$str.='</div>';
	return $str;
}

add_shortcode( 'banner_prueba', 'banner_prueba' );
*/

function ofertas_destacadas($atts = [], $content = null, $tag = ''){
	$str='<div class="container-ofertas-destacadas bloque-destacados">';
	$str.='	<div class="container">';
	$str.='		<div class="row">';
	$str.='			<div class="col-xs-12 col-md-3">';
	$str.='				<div class="titular">';
	$str.='					<h2>Ofertas destacadas</h2>';
	$str.='					<a href="" >Explorar</a>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='			<div class="col-xs-12 col-md-9">';
	$str.='				<div class="carrusel-mas-vendidos carrusel productos">';
	$str.='					<a class="item-prod">';
	$str.='						<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='						<div class="container-text">';
	$str.='							<div class="wrapper-position">';
	$str.='								<div class="extra-info porcentaje-descuento">';
	$str.='									<p>20%</p>';
	$str.='								</div>';
	$str.='								<div class="info">';
	$str.='									<div class="descripcion">';
	$str.='										<p>Sillón tela confort</p>';
	$str.='									</div>';
	$str.='									<div class="price-box">';
	$str.='										<span class="price-container old-price">';
	$str.='											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='										<span class="price-container special-price">';
	$str.='											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='									</div>';					
	$str.='								</div>';	
	$str.='							</div>';
	$str.='						</div>';		
	$str.='					</a>';
	$str.='					<a class="item-prod">';
	$str.='						<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='						<div class="container-text">';
	$str.='							<div class="wrapper-position">';
	$str.='								<div class="extra-info porcentaje-descuento">';
	$str.='									<p>20%</p>';
	$str.='								</div>';
	$str.='								<div class="info">';
	$str.='									<div class="descripcion">';
	$str.='										<p>Sillón tela confort</p>';
	$str.='									</div>';
	$str.='									<div class="price-box">';
	$str.='										<span class="price-container old-price">';
	$str.='											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='										<span class="price-container special-price">';
	$str.='											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='									</div>';							
	$str.='								</div>';	
	$str.='							</div>';
	$str.='						</div>';		
	$str.='					</a>';
	$str.='					<a class="item-prod">';
	$str.='						<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='						<div class="container-text">';
	$str.='							<div class="wrapper-position">';
	$str.='								<div class="extra-info porcentaje-descuento">';
	$str.='									<p>20%</p>';
	$str.='								</div>';
	$str.='								<div class="info">';
	$str.='									<div class="descripcion">';
	$str.='										<p>Sillón tela confort</p>';
	$str.='									</div>';
	$str.='									<div class="price-box">';
	$str.='										<span class="price-container old-price">';
	$str.='											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='										<span class="price-container special-price">';
	$str.='											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='									</div>';							
	$str.='								</div>';	
	$str.='							</div>';
	$str.='						</div>';		
	$str.='					</a>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';	
	$str.='	</div>';	
	$str.='	</div>';
	return $str;
}

add_shortcode( 'ofertas_destacadas', 'ofertas_destacadas' );

function carousel_destacados(){
	$str='<div class="carrusel-destacados">';
	$str.='	<div class="item">';
	$str.='		<div class="contenedor-img"></div>';
	$str.='		<div class="contenedor-info">';
	$str.='			<div class="titular">';
	$str.='				<h3>Sofá gris tela</h3>';
	$str.='			</div>';
	$str.='			<div class="description">';
	$str.='				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
	$str.='			</div>';
	$str.='			<div class="container-desde-precio">';
	$str.='				<div class="desde">';
	$str.='					<p>Desde</p>';
	$str.='				</div>';
	$str.='				<div class="precio">';
	$str.='					<p>€ 590 <span>ud</span></p>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='	<div class="item">';
	$str.='		<div class="contenedor-img"></div>';
	$str.='		<div class="contenedor-info">';
	$str.='			<div class="titular">';
	$str.='				<h3>Titular producto 2</h3>';
	$str.='			</div>';
	$str.='			<div class="description">';
	$str.='				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
	$str.='			</div>';
	$str.='			<div class="container-desde-precio">';
	$str.='				<div class="desde">';
	$str.='					<p>Desde</p>';
	$str.='				</div>';
	$str.='				<div class="precio">';
	$str.='					<p>€ 590 <span>ud</span></p>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='	<div class="item">';
	$str.='		<div class="contenedor-img"></div>';
	$str.='		<div class="contenedor-info">';
	$str.='			<div class="titular">';
	$str.='				<h3>Titular producto 3</h3>';
	$str.='			</div>';
	$str.='			<div class="description">';
	$str.='				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
	$str.='			</div>';
	$str.='			<div class="container-desde-precio">';
	$str.='				<div class="desde">';
	$str.='					<p>Desde</p>';
	$str.='				</div>';
	$str.='				<div class="precio">';
	$str.='					<p>€ 590 <span>ud</span></p>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='</div>';
	$str.='<div class="container-te-puede-interesar bloque-destacados">';
	$str.='	<div class="container">';
	$str.='		<div class="row">';
	$str.='			<div class="col-xs-12 col-md-3">';
	$str.='				<div class="titular">';
	$str.='					<h2>Te puede interesar</h2>';
	$str.='					<a href="" >Explorar</a>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='			<div class="col-xs-12 col-md-9">';
	$str.='				<div class="carrusel-mas-vendidos carrusel productos">';
	$str.='					<a class="item-prod">';
	$str.='						<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='						<div class="container-text">';
	$str.='							<div class="wrapper-position">';
	$str.='								<div class="extra-info porcentaje-descuento">';
	$str.='									<p>20%</p>';
	$str.='								</div>';
	$str.='								<div class="info">';
	$str.='									<div class="descripcion">';
	$str.='										<p>Sillón tela confort</p>';
	$str.='									</div>';
	$str.='									<div class="price-box">';
	$str.='										<span class="price-container old-price">';
	$str.='											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='										<span class="price-container special-price">';
	$str.='											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='									</div>';						
	$str.='								</div>';
	$str.='							</div>';
	$str.='						</div>';		
	$str.='					</a>';
	$str.='					<a class="item-prod">';
	$str.='						<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='						<div class="container-text">';
	$str.='							<div class="wrapper-position">';
	$str.='								<div class="extra-info porcentaje-descuento">';
	$str.='									<p>20%</p>';
	$str.='								</div>';
	$str.='								<div class="info">';
	$str.='									<div class="descripcion">';
	$str.='										<p>Sillón tela confort</p>';
	$str.='									</div>';
	$str.='									<div class="price-box">';
	$str.='										<span class="price-container old-price">';
	$str.='											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='										<span class="price-container special-price">';
	$str.='											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='									</div>';							
	$str.='								</div>';	
	$str.='							</div>';
	$str.='						</div>';		
	$str.='					</a>';
	$str.='					<a class="item-prod">';
	$str.='						<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='						<div class="container-text">';
	$str.='							<div class="wrapper-position">';
	$str.='								<div class="extra-info porcentaje-descuento">';
	$str.='									<p>20%</p>';
	$str.='								</div>';
	$str.='								<div class="info">';
	$str.='									<div class="descripcion">';
	$str.='										<p>Sillón tela confort</p>';
	$str.='									</div>';
	$str.='									<div class="price-box">';
	$str.='										<span class="price-container old-price">';
	$str.='											<span class="price-wrapper ">€ 320</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='										<span class="price-container special-price">';
	$str.='											<span class="price-wrapper ">€ 300</span> <span class="unidad">ud</span>';
	$str.='										</span>';
	$str.='									</div>';							
	$str.='								</div>';	
	$str.='							</div>';
	$str.='						</div>';		
	$str.='					</a>';
	$str.='				</div>';
	$str.='			</div>';			
	$str.='		</div>';	
	$str.='	</div>';	
	$str.='</div>';
	return $str;
}

add_shortcode( 'carousel_destacados', 'carousel_destacados' );

/*
[espacios_acogedores titulo_izquierda="Espacios Acogedores" foto_izquierda="" titulos="Descubre lo último de esta semana, Descubre lo último de esta mes ,Descubre lo último de esta año, Descubre lo último de este siglo" imagenes="foto1, foto2, foto3, foto4" titulo_desc="Espacios acogedores" desc="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim." imagen_uno="imagen1" imagen_dos="imagen2"]
*/

function espacios_acogedores($atts = [], $content = null, $tag = ''){
	$str='<div class="container-otros">';
	$str.='	<div class="container">';
	$str.='	<div class="row">';
	$str.='		<div class="col-xs-12 col-sm-8">';
	$str.='			<div class="container-img"></div>';
	$str.='			<div class="container-info">';
	$str.='				<div class="titular">';
	$str.='					<h3>Espacios acogedores </h3>';
	$str.='				</div>';
	$str.='				<div class="description">';
	$str.='					<p>Disfruta de todas nuestras ofertas y promociones</p>';
	$str.='				</div>';
	$str.='				<a class="enlace-line" href="">Descubrir</a>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='		<div class="col-xs-12 col-sm-4">';
	$str.='			<div class="carrusel-ultima-semana">';
	$str.='				<div class="item">';
	$str.='					<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='					<div class="description">';
	$str.='						<p>Descubre lo último de esta semana</p>';
	$str.='					</div>';
	$str.='					<a class="enlace-line" href="">Descubrir</a>';
	$str.='				</div>';
	$str.='				<div class="item">';
	$str.='					<img src="http://placehold.it/770x511/bcbcbc" class="img-responsive" alt="Alt de la imagen" title="Titulo de la imagen" />';
	$str.='					<div class="description">';
	$str.='						<p>Descubre lo último de esta semana</p>';
	$str.='					</div>';
	$str.='					<a class="enlace-line" href="">Descubrir</a>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='</div>';
	$str.='</div>';	
	$str.='<div class="container-otros-2">';
	$str.='<div class="container">';
	$str.='	<div class="row">';
	$str.='		<div class="col-xs-12 col-sm-12 col-md-5">';
	$str.='			<div class="container-info">';
	$str.='				<div class="titular">';
	$str.='					<h3>Espacios acogedores </h3>';
	$str.='				</div>';
	$str.='				<div class="description">';
	$str.='					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>';
	$str.='				</div>';
	$str.='			</div>';
	$str.='		</div>';
	$str.='		<div class="col-xs-12 col-sm-5 col-md-3">';
	$str.='			<div class="container-img img-3">';
	$str.='			</div>';
	$str.='		</div>';
	$str.='		<div class="col-xs-12 col-sm-7 col-md-4 hidden-xs">';
	$str.='			<div class="container-img img-4">';
	$str.='			</div>';
	$str.='		</div>';
	$str.='	</div>';
	$str.='</div>';
	$str.='</div>';
	return $str;
}

add_shortcode( 'espacios_acogedores', 'espacios_acogedores' );


function newsletter(){
	$str= '<div class="container">';
	$str= '<a name="email_anchor" href="#"></a>';
	$str.= '<div class="container-newsletter">';
	$str.=	'	<div class="row">';
	$str.=	'		<div class="col-xs-12 col-sm-10 col-sm-offset-1">';
	$str.=	'			<div class="container-info">';
	$str.=	'				<div class="titular">';
	$str.=	'					<h3>Suscríbete a nuestra newsletter</h3>';
	$str.=	'				</div>';
	$str.=	'				<div class="description">';
	$str.=	'					<p>Introduce tu email para recibir las últimas ofertas</p>';
	$str.=	'				</div>';
	$str.=	'			</div>';
	$str.=	'			<form action="" method="post" name="formulario-newsletter" id="formulario-newsletter">';
	$str.=	'				<div class="form-group">';
	$str.=	'					<input type="email" name="campo_email" id="campo_email" class="form-control" placeholder="Mail*" />';
	$str.=	' 					<p id="result" name="result"></p>';
	$str.=	'				</div>';
	$str.=	'				<button type="submit" id="boton_newsletter" name="boton_newsletter" class="btn">OK</button>';
	$str.=	'			</form>';
	$str.=	'		</div>';
	$str.=	'	</div>';
	$str.=	'</div>';
	$str.='</div>';
	return $str;
}

add_shortcode( 'newsletter', 'newsletter' );


function modal_home(){
	$str = "";
	$str.= '<div class="modal fade modal-bienvenida" role="dialog">';
	$str.= '<div class="modal-dialog">';
	$str.= '<div class="modal-content">';
	$str.= '	<span class="icon-close close" data-dismiss="modal"></span>';
	$str.= '	<div class="modal-body">';
	$str.= '		<div class="text-container">';
	$str.= '			<div class="titular">';
	$str.= '				<h2>Bienvenido </h2>';
	$str.= '			</div>';
	$str.= '			<div class="description">';
	$str.= '				<p>Lorem ipsum dolor sit amet, lorem ipsum consectetur.</p>';
	$str.= '			</div>';
	$str.= '				<form action="" method="" id="formulario-bienvenida">';
	$str.= '				<div class="form-group">';
	$str.= '					<input type="text" class="form-control" placeholder="Name*" />';
	$str.= '				</div>';
	$str.= '				<div class="form-group">';
	$str.= '					<input type="email" class="form-control" placeholder="Mail*" />';
	$str.= '				</div>';
	$str.= '				<p class="obligatorio">*Datos obligatorios</p>';
	$str.= '				<button type="submit" class="btn btn-rojo">OK</button>';
	$str.= '				<div class="checkbox">';
	$str.= '                    <input id="checkbox5" type="checkbox" class="styled" />';
	$str.= '                    <label for="checkbox5">';
	$str.= '                            Deseo recibir información de Ofiprix';
	$str.= '                    </label>';
	$str.= '                </div>';
	$str.= '			</form>';
	$str.= '		</div>';				
	$str.= 
	$str.= '		<div class="container-img"></div>';
	$str.= '	</div>';
	$str.= '</div>';
	$str.= '</div>';
	$str.= '</div>';
	$str.= '<div class="modal fade modal-cookies" role="dialog">';
	$str.= '	<div class="modal-dialog">';
	$str.= '		<div class="modal-content">';
	$str.= '			<div class="modal-body">';
	$str.= '					<div class="texto-legal">';
	$str.= '						<p>Utilizamos cookies propias y de terceros para ofrecerte una mejor experiencia y servicio, de acuerdo a tus hábitos de navegación. Si continúas navegando, consideramos que aceptas su uso. Puedes obtener más información <a hred=""> política de cookies.</a></p>';
	$str.= '				</div>';
	$str.= '					<button type="button" id="cerrarCookies" class="btn btn-borde-rojo">Aceptar cookies</button>';
	$str.= '			</div>';
	$str.= '		</div>';
	$str.= '	</div>';
	$str.= '</div>';
	return $str;
}

add_shortcode( 'modal_home', 'modal_home' );


function podemos_ayudarte(){
	$str = "";
	$str.= '<div class="podemos-ayudarte">';
	$str.= '	<div class="cerrar">';
	$str.= '		<span class="icon-close"></span>';
	$str.= '	</div>';
	$str.= '	<div class="text-container">';
	$str.= '		<div class="description">';
	$str.= '			<p>Podemos ayudarte </p>';
	$str.= '		</div>';
	$str.= '		<div class="telefono">';
	$str.= '			<p>902 120 000</p>';
	$str.= '		</div>';
	$str.= '		<a class="btn btn-borde-rojo-tw" href="" >Contactar</a>';			
	$str.= '	</div>';
	$str.= '</div>';
	return $str;
}

add_shortcode( 'podemos_ayudarte', 'podemos_ayudarte' );

/*
 * Consulta para hacer las queries 
 * de los productos mas vendidos 
 */



 /*
  * Recibir formulario para insertar
  * en base de datos el email del cliente
  */
  
if ($_POST['campo_email']){
		global $wpdb;
		$table            = "di_mail";
		$data             = array(
			'id'        => null,
			'firstname' => "no_firstname",
			'lastname'  => "no_lastname",
			'email'     => $_POST['campo_email']
		);
		$format = array(
			'%s',
			'%s'
		);
		//$success = $wpdb->insert( $table, $data, $format );
		$query 		= "SELECT * FROM di_mail ORDER BY id ASC";
		$my_wpdb 	= new wpdb('root','','sillamaniaes_dos','localhost');
		$mails 		= $my_wpdb->get_results( $query, OBJECT );
		//$mails 	= $wpdb->get_results($query, OBJECT);
		$encontrado = false;
		foreach ($mails as $mail){
			if ($mail->mail == $_POST['campo_email']){
				$encontrado = true;	
				//echo "Hemos encotnrado el email<br>";
			}	
		}
		if ($encontrado == false){
			$success = $wpdb->insert($table,array('firstname'=>"no_firstname", 'lastname'=>"no_lastname",'mail'=>$_POST['campo_email']), array('%s','%s','%s'));
			if($success){
				$url = $_SERVER['REQUEST_URI'].'?gracias';	
			}else{
				$url = $_SERVER['REQUEST_URI'].'?error';
			}
		}else{
			$url = $_SERVER['REQUEST_URI'].'?error';	
		}
		wp_redirect( $url );
		exit;
}
?>
  

