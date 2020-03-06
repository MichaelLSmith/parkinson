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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/parkinsoncadev/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'parkinsoncadev_kaisjyegbs');
/** MySQL database username */
define('DB_USER', 'parkinsoncadev_wpc9186');
/** MySQL database password */
define('DB_PASSWORD', ';FkXCQ@#C-KV');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('RAW_HTML_KEEP_RAW_IN_EXCERPTS', true);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*=QcE~f1P4MO-t7lTBXZ55o3*cW</RA9[LrX1?gFMFuxk99j;3m<[j/w+r]>)@Xe');
define('SECURE_AUTH_KEY',  '}ZoT;murEN|h,omGvGc9gUut4Q:2-i<[X+ANZ4o0b?bZx1]A}Z)EAWC|&--Fz=&z');
define('LOGGED_IN_KEY',    '=zAr.{C1Xql%0R?Ib)py|=M}J#|>:<<9;GYRE/;gP5UY[P+Y7na}`BBvubJ50^8N');
define('NONCE_KEY',        'Z#%2TGkF28M-rqh.U)~fK-7l[g|5}9nhk&t(phscy  HAaXH07<+l_PpSn{jMx|2');
define('AUTH_SALT',        'dKMk0S7|^#+>T7r.+xX/H+{y4])8YuF2ywn/N=p7dTr8BqA~vYv]DpU2&7M.DET?');
define('SECURE_AUTH_SALT', '[b&I;i4b^Y40MfLyy)eYxJ?{;{28J|*JHu5NYNR`fN))|F1Bq2w>360Bn. K}mB(');
define('LOGGED_IN_SALT',   'h`rC|IEEMQih4[/YvJ/x)0IM%ia!/p:oaoG)%!qey_7QnWucH0[jOdn.TA+lt R,');
define('NONCE_SALT',       'E^_w:!les_fK_--|-q++;^[P$YzHodMWF[nj0TxO<ako=$m;BS,@g6c&dS+f~!<y');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'w5o4_';
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
/** Memory Limit */
define('WP_MEMORY_LIMIT', '128M');
define( 'WP_MAX_MEMORY_LIMIT', '128M' );
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');