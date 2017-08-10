<?php

/**
 * MySQL settings
 * The name of the database for WordPress
 * Set environment variable in vhost file
 * SetEnv APPLICATION_ENV "development"
 */

if ($_SERVER['APPLICATION_ENV'] == 'development'){
    define('DB_NAME', 'dreboard_wordpress');
    define('DB_USER', 'dreboard_user');
    define('DB_PASSWORD', 'flwm1989');
    define('DB_HOST', 'localhost');
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');

    define('AUTH_KEY',         'LZ*Ev~#_{!qjFc2g0(aYSHqc,tAMZR-P!23];X$E(u|(ec|ssm?e~=me`i+U0/E2');
    define('SECURE_AUTH_KEY',  'k`,}}wjgmk4QNBNn`(|SMCrf>:WndV|db5E/7h76.bNnZ_pBC1Hy2PS!,BF3h1|,');
    define('LOGGED_IN_KEY',    '/M}rn)-_-&(O+.r[$8ZB/<-G9Ar8]mx=hXdt^Go^OOb72H.x>4Zdep|.Z|:szIOW');
    define('NONCE_KEY',        'C|*%%.Jj}lmgR!UGgO2=FhRPkOb0]0mvPji.$-rDd+Os!(b4s4MLF~UpP-[=_#sg');
    define('AUTH_SALT',        '_j!6LTY-}A-|Y+4nasbzN2((e5WG;(IgwdO+Y9n,u+pqPx[n+f [-Eb.2}lmyVk>');
    define('SECURE_AUTH_SALT', '!FAw0z`AA2s$0oGxP~X{iKQ,&|sL4&U.-S;sZdd?Il@>) +qx*A<|^|Zl`P[Dv;z');
    define('LOGGED_IN_SALT',   'wLY7,E6u)=pKn N9@x/qDuw@}2&nN3#,:p;$)|#.l7+Z1d6NuOEtcu{Z-dC..+;|');
    define('NONCE_SALT',       'd9S[-7jgK_2@.U_k%5.PPU|-bM?8^+,mt>~;4.q8?hoV2P7EAi6D$ma&e)/Uu%V6');

	$table_prefix  = 'wp_';

	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_LOG', true );
	define( 'WP_DEBUG_DISPLAY', false );
	@ini_set( 'display_errors', 0 );

	// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
	define( 'SCRIPT_DEBUG', true );

} else {
	// ** MySQL PRODUCTION settings - You can get this info from your web host ** //
	/** The name of the database for WordPress */
	define('DB_NAME', 'dreboard_wordpress');
	define('DB_USER', 'dreboard_user');
	define('DB_PASSWORD', 'flwm1989');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');

	/**#@+
	 * Authentication Unique Keys and Salts.
	 *
	 * Change these to different unique phrases!
	 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
	 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
	 *
	 * @since 2.6.0
	 */
    define('AUTH_KEY',         'LZ*Ev~#_{!qjFc2g0(aYSHqc,tAMZR-P!23];X$E(u|(ec|ssm?e~=me`i+U0/E2');
    define('SECURE_AUTH_KEY',  'k`,}}wjgmk4QNBNn`(|SMCrf>:WndV|db5E/7h76.bNnZ_pBC1Hy2PS!,BF3h1|,');
    define('LOGGED_IN_KEY',    '/M}rn)-_-&(O+.r[$8ZB/<-G9Ar8]mx=hXdt^Go^OOb72H.x>4Zdep|.Z|:szIOW');
    define('NONCE_KEY',        'C|*%%.Jj}lmgR!UGgO2=FhRPkOb0]0mvPji.$-rDd+Os!(b4s4MLF~UpP-[=_#sg');
    define('AUTH_SALT',        '_j!6LTY-}A-|Y+4nasbzN2((e5WG;(IgwdO+Y9n,u+pqPx[n+f [-Eb.2}lmyVk>');
    define('SECURE_AUTH_SALT', '!FAw0z`AA2s$0oGxP~X{iKQ,&|sL4&U.-S;sZdd?Il@>) +qx*A<|^|Zl`P[Dv;z');
    define('LOGGED_IN_SALT',   'wLY7,E6u)=pKn N9@x/qDuw@}2&nN3#,:p;$)|#.l7+Z1d6NuOEtcu{Z-dC..+;|');
    define('NONCE_SALT',       'd9S[-7jgK_2@.U_k%5.PPU|-bM?8^+,mt>~;4.q8?hoV2P7EAi6D$ma&e)/Uu%V6');

	/**#@-*/

	/**
	 * WordPress Database Table prefix.
	 *
	 * You can have multiple installations in one database if you give each
	 * a unique prefix. Only numbers, letters, and underscores please!
	 */
	$table_prefix  = 'wp_';

	/**
	 * For developers: WordPress debugging mode.
	 *
	 * Change this to true to enable the display of notices during development.
	 * It is strongly recommended that plugin and theme developers use WP_DEBUG
	 * in their development environments.
	 *
	 * For information on other constants that can be used for debugging,
	 * visit the Codex.
	 *
	 * @link https://codex.wordpress.org/Debugging_in_WordPress
	 */
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
