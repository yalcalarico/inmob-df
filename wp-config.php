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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'inmobiliaira-df' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'KZ3%07IEw<sCEvV&5jMpecxQ1pLRkXR!Z/YT>-Y9f@9|LH}D~#Vz`OJ{yh@j!6ZD' );
define( 'SECURE_AUTH_KEY',  'Iy_1z|.`Rs0*<> B@>Q%Fi%7phj#dv?]8P7d:XVn&Ab0#ZzMjoSaNnjwWn7Q_c-b' );
define( 'LOGGED_IN_KEY',    'N;`vN>XMD1,uDsNEm)hU5+ahwQ22wS7!/97`l8SN7u!Pd~CFP<KanaUxVFV|2,Ny' );
define( 'NONCE_KEY',        '[=:6o|-<l/0R@k]9NNV,{FnP>rNYi@S_tk>:izl@;:)CU#.p3i;=z[FXS<48;RHC' );
define( 'AUTH_SALT',        'yn?(Qiqi5v~ufjPWlUtsl63E7axl$Qu~PnNqu]r:x^C|V$&I# wimaTo&<>GQbao' );
define( 'SECURE_AUTH_SALT', '2<g[_d2!~F|v6ETA=([J R^z-v~7{W{2%hY0HMwZM1jL ^CJ=Zu+u0_:`=`^Sv1$' );
define( 'LOGGED_IN_SALT',   '|8m#R4j6~AH/{;h.*sDSKn}~BcJ4<lZ*&PS}H%9X$gC8i{#En;p<XlIO5OOR= R ' );
define( 'NONCE_SALT',       'xkTx15J2YoKD26#|g@N>[[]/Y^vxJfi-zv)jX,CB(4Z&fT}E-l<K-,*}A9gRJqw(' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
