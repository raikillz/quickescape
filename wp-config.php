<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'quickescapephdb');

/** MySQL database username */
define('DB_USER', 'quickescape');

/** MySQL database password */
define('DB_PASSWORD', 'mysqladmin');

/** MySQL hostname */
define('DB_HOST', 'quickescaperds.cbvmhh8nw7h5.us-east-1.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'PX8we,6aJ!=x]l@W_e$9w|?P<77ruA}FC2Fj37HndCV6q%rX#)9<jQ:n<K!=g0@G');
define('SECURE_AUTH_KEY',  'yP45}HQRw[t*[Y{zx?v][OL%% 0to`9f=_Bf)5ZI8U#2*B!318R)KqM!!<X`qofd');
define('LOGGED_IN_KEY',    'k,!,-X[S&<]yz9z^;$+pE#&QH2i,+fGPp-c)+n,kCCB*? 1Q}1yUmR&j1T KmAy.');
define('NONCE_KEY',        ',?|%U/$_xLX>JIx.}fV3P@vE3`+9^lMnR*3ct8mW7N;DraixWi_uvN^>Q4QsLQBg');
define('AUTH_SALT',        'Fj2Thl*UM^Ri:+TKk|-*2&GWm90T}O][iJ1@Ic)+c@Z`:i-+}pvOWm~GP8]48z%E');
define('SECURE_AUTH_SALT', '$ii~k)3lzz%eN8o<96qw4wDT[EM]K#H/lOTL(tac#<0Ty2xc?U]yb&p!E#R4^`!L');
define('LOGGED_IN_SALT',   '^{S:am =DCS xBaYYG4|f?z`vRI2Nk7x=Rha8.D0BI7oD4<^ow3;h:*:2~-0@`<~');
define('NONCE_SALT',       '{FyZuv,*VxheQ6^L:(9OQ_/QtK6EW.^p,aM^|}_O8pc83q8]2coCbL`fL9Kf1Ros');

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

define('FS_METHOD', 'direct');
define('DISALLOW_FILE_MODS',false);
