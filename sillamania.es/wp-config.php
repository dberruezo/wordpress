<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'sillamaniaes');
// define('DB_NAME', 'sillamaniaes_dos');

/** Tu nombre de usuario de MySQL */
//define('DB_USER', 'sillamaniaes');
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
// define('DB_PASSWORD', 'Sillasweb2011');
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '&)a~)N,6;*504iwoS8^>Hcqk-Py#n$ ^x4jaQZDFL1N[XSL%&6O%~kq^j~*U<m9J');
define('SECURE_AUTH_KEY', 'EC|FXku=yNM,G_La`*lp=F[`v2;tzY4?}^GcJ6rL~8GOX7li*jrI3Ulv`;d+IAun');
define('LOGGED_IN_KEY', 'Obhu2+blam_DBD1lCsvxuu:x;(X$SKaufEzEG]FodW2Cn(1m}~mtx%3-u)BEhu#/');
define('NONCE_KEY', '2I2l$oc%PNJ)(76;>YlYT4QgEIAC8r]f{buLvCnjmh<Up)qTnG.u=JgTlug2mT  ');
define('AUTH_SALT', 'W+/}|y9/*J.rSWe$vGn)g8: t))?s>FbnGY5bDx&`uY8{Jx1:DR3V3NVRRDD6<tW');
define('SECURE_AUTH_SALT', '[84+)m//4,E>n|Br0{1zgD*aiCd.Z-jqQxrRHN3aoT8U8.mR$l+ySd(]p;al_8.K');
define('LOGGED_IN_SALT', '&5FV%1si7ep|.vI,UVfb@yd6~46)Wo{dpz0K9O=}G4EZk&Efsu_{^@uEMkZpgb;p');
define('NONCE_SALT', 'a/#(i&?+};^u_ iGt/T <2+B$AbttPw~$j8`5mJLsxb#kh5Wf!m;Fg|:B&tIAjFS');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'di_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

