<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sonia_costa' );

/** Database username */
define( 'DB_USER', 'sonia_costa' );

/** Database password */
define( 'DB_PASSWORD', 'pass#123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%BIP-|p~}S9YsNkc(=Jz|K8JYD10[QR=sSO`>6kv[}2T! MCdBRq`c7X1`&TtIQR' );
define( 'SECURE_AUTH_KEY',  'x(j6c/9ytS?E&JYnBjTGQJ V*m2r~bUM&s*;0<nt<6xGOPb#](QKx4yB_a&L )rd' );
define( 'LOGGED_IN_KEY',    'fst5epohJ.o=?@WMl AgpN4`,8s*5jZPU$[)o/g*h=]bZzYaVSVS)8ZAc5oQLUOj' );
define( 'NONCE_KEY',        '=.K;aRHc_vwB,ID43}]j4Ddh.+w<(V?8a4e4tk]d9v1U=T7>Z!q?eG!73}_c>._i' );
define( 'AUTH_SALT',        'OmF`kU&k~t=:ImR%z7XpAk5%W80/P4tiRucMOo-QVIERwsm0clHqEsSLJoq[:;8N' );
define( 'SECURE_AUTH_SALT', '7#k>j2Q}VZ;^d|~b6a3g~3nVLted%10-Xw@3x1E/anV?yoFQ.^d8Wm_)bzlLCbWj' );
define( 'LOGGED_IN_SALT',   'R::c,L4N) !P,d/zS}?Pj[=)$z>QqBSOuK<00%Pd%+><0Fg8>WX;*&9WR2lIj3)x' );
define( 'NONCE_SALT',       'bm]7%n]8w{6z][w?j~tLKSs!fLa~5x!pMs383gHti0T]wd<3FnEGJh_XT$b8H`(O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
