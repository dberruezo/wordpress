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
        ) );

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
    ));

    register_sidebar( array(
        'name'          => __( 'Content Bottom 1', 'mio' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'mio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => __( 'Content Bottom 2', 'mio' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'mio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'mio_widgets_init' );

/*
 * Creamos scripts
 * eCommerce
 * para javascript y estilos
 * mirando el nombre la pagina
 */
if ( ! function_exists( 'ecommerce_scripts' ) ) :
    function ecommerce_scripts() {
        // scripts
        wp_enqueue_script('script-jquery', get_stylesheet_directory_uri() .'/js/jquery/jquery.js' );
        wp_enqueue_script('script-comment-reply', get_stylesheet_directory_uri() .'/js/comment-reply.min.js' );
        wp_enqueue_script('script-underscore', get_stylesheet_directory_uri() .'/js/underscore.min.js' );
        wp_enqueue_script('script-masonry', get_stylesheet_directory_uri() .'/js/jquery/jquery.masonry.min.js' );
        wp_enqueue_script('script-polaroid', get_stylesheet_directory_uri() .'/sliders/polaroid/js/jquery.polaroid.js' );
        wp_enqueue_script('script-colorbox', get_stylesheet_directory_uri() .'/js/jquery.colorbox-min.js' );
        wp_enqueue_script('script-easing', get_stylesheet_directory_uri() .'/js/jquery.easing.js' );
        wp_enqueue_script('script-carouFredSel', get_stylesheet_directory_uri() .'/js/jquery.carouFredSel-6.1.0-packed.js' );
        wp_enqueue_script('script-BlackAndWhite', get_stylesheet_directory_uri() .'/js/jQuery.BlackAndWhite.js' );
        wp_enqueue_script('script-touchSwipe', get_stylesheet_directory_uri() .'/js/jquery.touchSwipe.min.js' );
        //wp_enqueue_script('script-transform', get_template_directory_uri() .'/js/jquery.transform-0.8.0.min.js' );
        wp_enqueue_script('script-preloader', get_stylesheet_directory_uri() .'/sliders/polaroid/js/jquery.preloader.js' );
        wp_enqueue_script('script-responsive', get_stylesheet_directory_uri() .'/js/responsive.js' );
        wp_enqueue_script('script-mobilemenu', get_stylesheet_directory_uri() .'/js/mobilemenu.js' );
        wp_enqueue_script('script-superfish', get_stylesheet_directory_uri() .'/js/jquery.superfish.js' );
        wp_enqueue_script('script-placeholder', get_stylesheet_directory_uri() .'/js/jquery.placeholder.js' );
        wp_enqueue_script('script-contact', get_stylesheet_directory_uri() .'/js/contact.js' );
        wp_enqueue_script('script-tipsy', get_stylesheet_directory_uri() .'/js/jquery.tipsy.js' );
        wp_enqueue_script('script-cycle', get_stylesheet_directory_uri() .'/js/jquery.cycle.min.js' );
        wp_enqueue_script('script-validator', get_stylesheet_directory_uri() .'/js/jquery.validate.js' );
        // Me da errores
        //wp_enqueue_script('script-shortcodes', get_template_directory_uri() .'/js/shortcodes.js' );
        wp_enqueue_script('script-custom', get_stylesheet_directory_uri() .'/js/jquery.custom.js' );
        // styles
        $parent_style = "tweentysixteen-style";
        $child_style  = "tweentysixteen-child-style";
        
        wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css', array());
        wp_enqueue_style($child_style, get_stylesheet_directory_uri() . '/style.css', array());
        
        wp_enqueue_style('style-estilos', get_stylesheet_directory_uri() . '/css/estilos.css', array());
        wp_enqueue_style('style-reset', get_stylesheet_directory_uri() . '/css/reset.css', array());
        wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array());
        wp_enqueue_style('stylecss-style', get_stylesheet_directory_uri() . '/css/style.css', array());
        wp_enqueue_style('syle-thickbox', get_stylesheet_directory_uri() . '/js/thickbox/thickbox.css', array());
        wp_enqueue_style('style-usquare_style',get_stylesheet_directory_uri() . '/sliders/usquare/css/frontend/usquare_style.css', array());
        wp_enqueue_style('style-responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array());
        wp_enqueue_style('style-polaroid', get_stylesheet_directory_uri() . '/sliders/polaroid/css/polaroid.css', array());
        wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
        wp_enqueue_style('style-custom', get_stylesheet_directory_uri() . '/css/custom.css', array());
        wp_enqueue_style('style-contact_form', get_stylesheet_directory_uri() . '/css/contact_form.css', array());

        if (is_page(array($page = 'Asociacion'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-mediaupload', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-flexslider-min', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js' );
            wp_enqueue_script('script-mCustomScrollbar', get_stylesheet_directory_uri() .'/sliders/usquare/js/frontend/jquery.mCustomScrollbar.min.js' );
            wp_enqueue_script('script-usquare', get_stylesheet_directory_uri() .'/sliders/usquare/js/frontend/jquery.usquare.js' );
        }else if (is_page (array($page = 'Hacemos')) ) {
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-media', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-tweetable', get_stylesheet_directory_uri() .'/js/jquery.tweetable.js' );
            //wp_enqueue_style('style-google', get_template_directory_uri() . 'http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1', array());
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/css/hacemos/style.css', array());
        }else if (is_page(array($page = 'Ventajas'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-media', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-tweetable', get_stylesheet_directory_uri() .'/js/jquery.tweetable.js' );
            //wp_enqueue_style('style-google', get_template_directory_uri() . 'http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1', array());
            //wp_enqueue_style('style-fontawesome-css', get_template_directory_uri() . 'css/font-awesome.css', array());
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-contact-form-css', get_stylesheet_directory_uri() . '/css/contact_form.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
        }else if (is_page(array($page = 'Equipo'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-mediaupload', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-flexslider-min', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js' );
            wp_enqueue_script('script-mCustomScrollbar', get_stylesheet_directory_uri() .'/sliders/usquare/js/frontend/jquery.mCustomScrollbar.min.js' );
            wp_enqueue_script('script-usquare-style', get_stylesheet_directory_uri() .'/sliders/usquare/js/frontend/jquery.usquare.js' );
            wp_enqueue_style('script-usquare-bueno', get_stylesheet_directory_uri() .'/css/usquare.css',array() );
            //wp_enqueue_script('script-shortcode', get_template_directory_uri() .'/js/shortcode.js' );
        }else if (is_page(array($page = 'Hosting'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js',array() );
            wp_enqueue_script('script-media-upload', get_stylesheet_directory_uri() .'/js/media-upload.min.js',array() );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js',array() );
            wp_enqueue_script('script-shortcodes', get_stylesheet_directory_uri() .'/js/shortcodes.js',array() );
        }else if(is_page(array($page = 'Web'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-media', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-tweetable', get_stylesheet_directory_uri() .'/js/jquery.tweetable.js' );
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            //wp_enqueue_style('style-google', get_template_directory_uri() . 'http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1', array());
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
        }else if (is_page(array($page = 'Medida'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-media', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-tweetable', get_stylesheet_directory_uri() .'/js/jquery.tweetable.js' );
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            //wp_enqueue_style('style-google', get_template_directory_uri() . 'http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1', array());
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
        }else if (is_page(array($page = 'Comercio'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-media', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-tweetable', get_stylesheet_directory_uri() .'/js/jquery.tweetable.js' );
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri(). '/blog/libra-small/css/style.css', array());
            //wp_enqueue_style('style-google', get_template_directory_uri() . 'http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1', array());
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
        }else if (is_page(array($page = 'Crm'))){
            wp_enqueue_script('script-hoverIntent', get_stylesheet_directory_uri() .'/js/hoverIntent.min.js' );
            wp_enqueue_script('script-media', get_stylesheet_directory_uri() .'/js/media-upload.min.js' );
            wp_enqueue_script('script-clickout', get_stylesheet_directory_uri() .'/js/jquery.clickout.min.js' );
            wp_enqueue_script('script-tweetable', get_stylesheet_directory_uri() .'/js/jquery.tweetable.js' );
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            //wp_enqueue_style('style-google', get_template_directory_uri() . 'http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1', array());
            wp_enqueue_style('style-estilos-hacemos', get_template_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
        }else if (is_page(array($page = 'Portfolio'))) {
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() . '/js/jquery.isotope.min.js');
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_page(array($page = 'Portfolio'))){
            wp_enqueue_script('script-contactar', get_stylesheet_directory_uri() .'/js/contact.js' );
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
        }else if(is_single(array($post = 'yourspanishwine'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = '2automocion'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'hostalparis'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'ibergrapa'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'davidberruezo'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'ibergrapa-blog'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'ecommercebarcelona360-blog'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'todoparasupez-blog'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'fruterias-gaite-sistema-de-gestion-de-pedidos'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if(is_single(array($post = 'todo-para-su-pez'))){
            wp_enqueue_script('script-isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js' );
            wp_enqueue_style('style-isotope', get_stylesheet_directory_uri() . '/css/isotope-docs.css', array());
        }else if (is_single(array($post = 'todo-para-tu-pez-a-vender'))){
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/css/hacemos/style.css', array());
        }else if(is_single(array($post = 'your-spanish-wine-a-vender-vino'))){
            wp_enqueue_style('style-estilos-hacemos', get_stylesheet_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/css/hacemos/style.css', array());
        }else if(is_single(array($post = 'hostal-paris-a-reservar-on-line'))){
            wp_enqueue_style('style-estilos-hacemos', get_template_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/css/hacemos/style.css', array());
        }else if(is_single(array($post = 'nuevo-portfolio-muestra-tus-proyectos'))) {
            wp_enqueue_style('style-estilos-hacemos', get_template_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/css/hacemos/style.css', array());
        }else if(is_single(array($post = 'dosaautomocion'))){
            wp_enqueue_style('style-estilos-hacemos', get_template_directory_uri() . '/css/estilosHacemos.css', array());
            wp_enqueue_style('style-shorcodes', get_stylesheet_directory_uri() . '/css/shortcodes.css', array());
            wp_enqueue_style('style-libra-big', get_stylesheet_directory_uri() . '/blog/libra-big/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/blog/libra-small/css/style.css', array());
            wp_enqueue_style('style-libra-small', get_stylesheet_directory_uri() . '/css/hacemos/style.css', array());
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'ecommerce_scripts' );


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
                    'singular_name' => __( 'Movie' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'movies'),
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
        $urlLocal         = "http://www.ecommercebarcelona360.net/gracias";
        $urlServidor      = "http://www.ecommercebarcelona360.com/gracias";
        $urlLocalError    = "http://www.ecommercebarcelona360.net/error";
        $urlServidorError = "http://www.ecommercebarcelona360.com/error";
        $table            = "wp_contacto";
        $data             = array(
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
            //header('Location: '.$urlLocal);
            header('Location: '.$_POST['url'].'?m=gracias');
            //header('Location: '.$urlServidor);
        }else{
            //echo "ha habidu un error<br>";
            header('Location: '.$_POST['url'].'?m=error');
            //header('Location: '.$urlLocalError);
            //header('Location: '.$urlServidorError);
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
                /*
                $cadena.= '<div class="socials-square-small twitter-small square">';
                $cadena.= '<a href="#" class="socials-square-small twitter" original-title="Twitter" target="_blank">twitter</a>';
                $cadena.= '</div>';
                $cadena.= '<div class="socials-square-small google-small square">';
                $cadena.= '<a href="#" class="socials-square-small google" original-title="Google" target="_blank">google</a>';
                $cadena.= '</div>';
                $cadena.= '<div class="socials-square-small pinterest-small square">';
                $cadena.= '<a href="#" class="socials-square-small pinterest" original-title="Pinterest" target="_blank">pinterest</a>';
                $cadena.= '</div>';
                */
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

/*
 * Removemos soporte emojis
 */

//Desactivar soporte de Emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

//Desactivar soporte y estilos de Emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/*
 * Cambiamos las url del menu segun estan
 * en el servidor o estan el local
 */ 

// servidor
$url_se_www  = 'http://www.ecommercebarcelona360.com';
$url_se_only = 'http://ecommercebarcelona360.com';
// local
$url_www     = 'http://www.ecommercebarcelona360.net';
$url_only    = 'http://ecommercebarcelona360.net';

$valores = wp_get_nav_menu_items( 'main',[]);
foreach($valores as $valor){
    if ($valor->url == $url_se_only || $valor->url == $url_se_www){
        $valor->url = $url_www;
    }
    if ($valor->guid == $url_se_only || $valor->guid == $url_se_www){
        $valor->guid = $url_www;
    }
    echo "El valor es: ".$valor->url."<br>";
}
print_r($valores);
//blog
?>