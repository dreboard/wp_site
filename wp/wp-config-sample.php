<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1234');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
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
define('AUTH_KEY',         '@2M,~`54SFXj_Vi(ol%|4h}O}ayT=;uD#q[bk9G6!T_DeG,_,q+vJ>2KeK0`Oe|u');
define('SECURE_AUTH_KEY',  'TA+RGD=|ijM5Saht5&}M!V,S,^|D1S: {/AHnXtf{^=O^T8{}RE0]OAxj[i00:Fy');
define('LOGGED_IN_KEY',    'C);HHS`GL,gHfyMfLpVXuvo+1-3U2a056[mjCJMwAdop,Sb{q/-mt:*gt&tK Pd@');
define('NONCE_KEY',        '^7@#@#Q+>EvB1+_t+*-0ii,BtC/^@2LoA} Mn{f)|2(I=+:XwKTfugv(bpu45^;c');
define('AUTH_SALT',        'T(t=QF-{f`xUzMgHs)ruk2NYVGP$)1E?> 6<XRiOy3C[VcjiGnmMcbaB9e;!W@T ');
define('SECURE_AUTH_SALT', 'tsw[Q(wwP8??VcisXz/dl>e|=N_&W5UZ,Uw0|`?x LI/*DNSJi9mng1FAn9eg>(U');
define('LOGGED_IN_SALT',   ']8_[frTV5hK|pD-/y-r(~O,0t. ih}6_yHM@@Hm)[|bjTmlp:y~EDI-`]%fQFb-X');
define('NONCE_SALT',       'gV@}U=hnZ5(+)6G|PuZKfJ@n|fsV}@j.FgL_xFfzSu&-Gf&UX7uuU1O[j[EjIO ,');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
