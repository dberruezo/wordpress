<?php
if ( ! function_exists( 'mio_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mio_setup() {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'mio_setup' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-thumbnails', array( 'post', 'movie','page' ) ); // Posts and Movies
        add_image_size( 'mio-thumb', 360, 270 );

        // This theme uses wp_nav_menu() in four location.
        register_nav_menus( array(
            'primary'     => esc_html__( 'Primary Menu', 'mio' ),
            'footer'      => esc_html__( 'Footer Menu', 'mio' ),
            'social'      => esc_html__( 'Social Menu', 'mio' ),
            'quick-links' => esc_html__( 'Quick Links Menu', 'mio' ),
            'notfound'    => esc_html__( '404 Menu', 'mio' ),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Activamos custom header
         */
        /*
        $defaults = array(
            'default-image'          => '',
            'random-default'         => false,
            'width'                  => 0,
            'height'                 => 0,
            'flex-height'            => false,
            'flex-width'             => false,
            'default-text-color'     => '',
            'header-text'            => true,
            'uploads'                => true,
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );
        add_theme_support( 'custom-header', $defaults );
        */

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'mio_custom_background_args', array(
            'default-color' => 'dfdfd0',
            'default-image' => '',
        ) ) );

        /*
         * Enable support for custom logo.
         */
        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        /*
         * Enable support for selective refresh of widgets in Customizer.
         */
        add_theme_support( 'customize-selective-refresh-widgets' );

        $min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

        // Editor style.
        add_editor_style( 'css/editor-style' . $min . '.css' );

        // Enable support for footer widgets.
        add_theme_support( 'footer-widgets', 4 );

        // Load Supports.
        //require get_template_directory() . '/inc/support.php';

        //global $mio_default_options;
        //$mio_default_options = mio_get_default_theme_options();
    }
endif;
add_action( 'after_setup_theme', 'mio_setup' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function mio_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'mio' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'mio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Content Bottom 1', 'mio' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'mio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Content Bottom 2', 'mio' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'mio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mio_widgets_init' );


/*
 * Creamos scripts
 * phpandfriends
 * para javascript y estilos
 * mirando el nombre la pagina
 */


 if ( ! function_exists( 'cargarScripts' ) ) :
    function cargarScripts() {
        // Parent and Child Theme
        $parent_style = "tweentyseventeen-style";
        $child_style  = "tweentyseventeen-child-style";
        wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css', array());
        wp_enqueue_style($child_style, get_stylesheet_directory_uri() . '/style.css', array());
        
        wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array());
        wp_enqueue_style('style-fonts', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array());
        wp_enqueue_style('style-popup', get_stylesheet_directory_uri() . '/css/magnific-popup.css', array());
        wp_enqueue_style('style-owl', get_stylesheet_directory_uri() . '/css/owl.carousel.css', array());
        //wp_enqueue_style('style-main', get_stylesheet_directory_uri() . '/css/main.css', array());
        wp_enqueue_style('style-responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array());
        wp_enqueue_style('style-googlefonts', 'https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700', array());
        wp_enqueue_style('style-googlefonts', 'https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700', array());
        wp_enqueue_script('script-jquery', get_stylesheet_directory_uri() .'/js/jquery.js' );
        wp_enqueue_script('script-bootstrap', get_stylesheet_directory_uri() .'/js/bootstrap.min.js' );
        wp_enqueue_script('script-magnific', get_stylesheet_directory_uri() .'/js/jquery.magnific-popup.min.js' );
        wp_enqueue_script('script-carousel', get_stylesheet_directory_uri() .'/js/owl.carousel.min.js' );
        wp_enqueue_script('script-main', get_stylesheet_directory_uri() .'/js/main.js' );
        wp_enqueue_script('script-funciones', get_stylesheet_directory_uri() .'/js/funciones.js' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cargarScripts' );

/*
 * Popular posts
 */
if ( ! function_exists( 'popularPosts' ) ) :
    function popularPosts() {
        $count_key = 'wpb_post_views_count';
        $count     = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 View";
        }
        return $count.' Views';
    }
endif;
add_action( 'wp_head', 'popularPosts' );

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*
 * Creamos post-type
 */
if ( !function_exists( 'create_posttype' ) ) :
    /**
     * Cargamos eCommerce Scripts
     */
    function create_posttype (){
        register_post_type( 'movies',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Movies' ),
                    'singular_name' => __( 'Movie' ),
                    //'add_new' => ('product'),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array('slug' => 'movies'),
                //'taxonomies'  => array('top', 'category' ),
                'taxonomies'  => array('category' ),
                'supports' => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats')
            )
        );
    }
endif;
add_action( 'init', 'create_posttype' );


/*
 * Creamos la funcion
 * para recoger los datos de las urls
 * y lugo hacer los inserts en las bases de datos
 */
if ( !function_exists( 'prefix_send_email_to_admin' ) ) :
    function prefix_send_email_to_admin() {
        global $wpdb;
        $table = "wp_contacto";
        $data = array(
            'id'        => 0,
            'name'      => $_POST['name'],
            'email'     => $_POST['email'],
            'message'   => $_POST['message'],
            //'chord'     => $_POST['chord']
        );
        $format = array(
            '%s',
            '%s'
        );
        //$success = $wpdb->insert( $table, $data, $format );
        $success = $wpdb->insert($table,array('name'=>$_POST['name'],'email'=>$_POST['email'],'message'=>$_POST['message'] ), array('%s','%s','%s'));
        if($success){
            //echo "realizado con exito<br>";
            header('Location: http://www.ecommercebarcelona360.com/gracias');
        }else{
            //echo "ha habidu un error<br>";
            header('Location: http://www.ecommercebarcelona360.com/error');
        }
    }
endif;
add_action('admin_post_nopriv_contact_form', 'prefix_send_email_to_admin');
add_action('admin_post_contact_form', 'prefix_send_email_to_admin');


/*
 * Shortcodes
 */
function shortcode_comentarios($parametros) {
    switch ($parametros["pagina"]){
        case "hacemos":$args = array("post_id" => 2,'order' => 'ASC');
            break;
        case "ventajas":$args = array("post_id" => 356,'order' => 'ASC');
            break;
        case "web":$args = array("post_id" => 24,'order' => 'ASC');
            break;
        case "medida":$args = array("post_id" => 24,'order' => 'ASC');
            break;
        case "comercio":$args = array("post_id" => 24,'order' => 'ASC');
            break;
        case "crm":$args = array("post_id" => 24,'order' => 'ASC');
            break;
    }
    $comentarios = get_comments($args);
    //var_dump($args);
    //var_dump($comentarios);
    $cadena      = "";
    switch ($parametros["pagina"]){
        case "hacemos":
            foreach($comentarios as $coment){
                $cadena.='<div class="hentry-post group">';
                $cadena.='<div class="thumb-img">';
                $cadena.='<img width="75" height="75" src="/wp-content/themes/ecommerce/images/gavatar.png" class="attachment-blog_thumb wp-post-image" alt="23" />';
                $cadena.='</div>';
                $cadena.='<div class="text">';
                $cadena.='<a href="../../blog" title="'.$coment->comment_content.'" class="title">';
                $cadena.= $coment->comment_content;
                $cadena.= '</a>';
                $cadena.= '<p class="post-date">'.$coment->comment_date.'</p>';
                $cadena.= '</div></div>';
            }
            break;
        case "ventajas":
            $indiceComentario = $parametros["ventajas"];
            if ($indiceComentario <= 3){
                $cadena.= '<div class="thumbnail">';
                $cadena.= '<div class="row">';
                $cadena.= '<div class="meta group span3">';
                $cadena.= '<div>';
                $cadena.= '<h2 class="post-title">';
                $cadena.= '<a href="#">';
                $cadena.= $comentarios[$indiceComentario]->comment_content;
                $cadena.= '</a>';
                $cadena.= '</h2>';
                $cadena.= '<p class="author">';
                $cadena.= '<img src="/wp-content/themes/ecommerce/images/icons/author.png" alt="icon-user"/><span>Author:</span>';
                $cadena.= '<a href="#" title="'.$comentarios[$indiceComentario]->comment_content.'">';
                $cadena.= $comentarios[$indiceComentario]->comment_author;
                $cadena.= '</a>';
                $cadena.= '</p>';
                $cadena.= '<p class="date">';
                $cadena.= '<img src="/wp-content/themes/ecommerce/images/icons/date.png" alt="icon-calendar"/>';
                $cadena.= '<span>Date:</span>';
                $cadena.= $comentarios[$indiceComentario]->comment_date;
                $cadena.= '</p>';
                $cadena.= '</div>';
                $cadena.= '<div>';
                $cadena.= '<p class="comments">';
                $cadena.= '<img src="/wp-content/themes/ecommerce/images/icons/comments.png" alt="icon-comment"/>';
                $cadena.= '<span>';
                $cadena.= '<a href="#"> title="'.$comentarios[$indiceComentario]->comment_content.'">';
                $cadena.= '<span>Comments:</span>1';
                $cadena.= '</a>';
                $cadena.= '</span>';
                $cadena.= '</p>';
                $cadena.= '</div>';
                $cadena.= '<div>';
                $cadena.= '<div class="socials">';
                $cadena.= '<h2>Share on</h2>';
                $cadena.= '<div class="socials-square-small facebook-small square">';
                $cadena.= '<a href="#" class="socials-square-small facebook" original-title="Facebook" target="_blank">facebook</a>';
                $cadena.= '</div>';
                $cadena.= '<div class="socials-square-small twitter-small square">';
                $cadena.= '<a href="#" class="socials-square-small twitter" original-title="Twitter" target="_blank">twitter</a>';
                $cadena.= '</div>';
                $cadena.= '<div class="socials-square-small google-small square">';
                $cadena.= '<a href="#" class="socials-square-small google" original-title="Google" target="_blank">google</a>';
                $cadena.= '</div>';
                $cadena.= '<div class="socials-square-small pinterest-small square">';
                $cadena.= '<a href="#" class="socials-square-small pinterest" original-title="Pinterest" target="_blank">pinterest</a>';
                $cadena.= '</div>';
                $cadena.= '</div>';
                $cadena.= '</div>';
                $cadena.= '</div>';
            }else{
                $cadena.= '<div class="hentry-post group">';
                $cadena.= '<div class="thumb-img">';
                $cadena.= '<img width="75" height="75" src="/wp-content/themes/ecommerce/images/23-75x75.jpg" class="attachment-blog_thumb wp-post-image" alt="23" />';
                $cadena.= '</div>';
                $cadena.= '<div class="text">';
                $cadena.= '<a href="#" title="'.$comentarios[$indiceComentario]->comment_content.'" class="title">';
                $cadena.= $comentarios[$indiceComentario]->comment_content;
                $cadena.= '</a>';
                $cadena.= '<p class="post-date">'.$comentarios[$indiceComentario]->comment_date.'</p>';
                $cadena.= '</div>';
                $cadena.= '</div>';
            }
            break;
        case "web":
            foreach($comentarios as $coment){
                $cadena.= '<div class="hentry-post group">';
                $cadena.= '<div class="thumb-img">';
                $cadena.= '<img width="75" height="75" src="/wp-content/themes/ecommerce/images/gavatar.png" class="attachment-blog_thumb wp-post-image" alt="23" />';
                $cadena.= '</div>';
                $cadena.= '<div class="text">';
                $cadena.= '<a href="#" title="'.$coment->comment_content.'" class="title">'.$coment->comment_content;
                $cadena.= '</a>';
                $cadena.= '<p class="post-date">'.$coment->comment_date.'</p>';
                $cadena.= '</div>';
                $cadena.='</div>';
            }
            break;
        case "medida":
            foreach($comentarios as $coment){
                $cadena.= '<div class="hentry-post group">';
                $cadena.= '<div class="thumb-img">';
                $cadena.= '<img width="75" height="75" src="/wp-content/themes/ecommerce/images/gavatar.png" class="attachment-blog_thumb wp-post-image" alt="23" />';
                $cadena.= '</div>';
                $cadena.= '<div class="text">';
                $cadena.= '<a href="#" title="'.$coment->comment_content.'" class="title">'.$coment->comment_content;
                $cadena.= '</a>';
                $cadena.= '<p class="post-date">'.$coment->comment_date.'</p>';
                $cadena.= '</div>';
                $cadena.='</div>';
            }
            break;
        case "comercio":
            foreach($comentarios as $coment){
                $cadena.= '<div class="hentry-post group">';
                $cadena.= '<div class="thumb-img">';
                $cadena.= '<img width="75" height="75" src="/wp-content/themes/ecommerce/images/gavatar.png" class="attachment-blog_thumb wp-post-image" alt="23" />';
                $cadena.= '</div>';
                $cadena.= '<div class="text">';
                $cadena.= '<a href="#" title="'.$coment->comment_content.'" class="title">'.$coment->comment_content;
                $cadena.= '</a>';
                $cadena.= '<p class="post-date">'.$coment->comment_date.'</p>';
                $cadena.= '</div>';
                $cadena.='</div>';
            }
            break;
        case "crm":
            foreach($comentarios as $coment){
                $cadena.= '<div class="hentry-post group">';
                $cadena.= '<div class="thumb-img">';
                $cadena.= '<img width="75" height="75" src="/wp-content/themes/ecommerce/images/gavatar.png" class="attachment-blog_thumb wp-post-image" alt="23" />';
                $cadena.= '</div>';
                $cadena.= '<div class="text">';
                $cadena.= '<a href="#" title="'.$coment->comment_content.'" class="title">'.$coment->comment_content;
                $cadena.= '</a>';
                $cadena.= '<p class="post-date">'.$coment->comment_date.'</p>';
                $cadena.= '</div>';
                $cadena.='</div>';
            }
            break;
    }
    return $cadena;
}
add_shortcode('comentarios_shortcode', 'shortcode_comentarios');

function say_hello(){
    echo "Hello world";
}

add_action('hello_custom_hook',say_hello);

function say_goodbye(){
    echo "Goodbye world";
}

add_action('hello_custom_hook',say_goodybe);


if (class_exists('MultiPostThumbnails')) {

    new MultiPostThumbnails(array(
        'label' => 'Secondary Image',
        'id' => 'secondary-image',
        'post_type' => 'post'
    ) );

}


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Puesto por mí', 'custom_dashboard_help');
}

function custom_dashboard_help() {
    echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}
?>