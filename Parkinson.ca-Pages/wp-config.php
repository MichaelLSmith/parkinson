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
define( 'WPCACHEHOME', '/home/parkinson/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'parkinson_koaisuyet');

/** MySQL database username */
define('DB_USER', 'parkinson_wpc2120');

/** MySQL database password */
define('DB_PASSWORD', 'M5^5HhoIl=s-');

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
define('AUTH_KEY',         'aH:m3B&^6SK<:|t&xmZ+Zye}^mz7W* %  >2K#?w@dS9[hXg|*4s.FqI$;9eKfC)');
define('SECURE_AUTH_KEY',  'Gh57S1xD*M<|,u31TK{Fkp~9Z}u!+#tM6/:dv6+k0;6ligKA[A6=-?xPG4e@.<EB');
define('LOGGED_IN_KEY',    '?DDW:/I2Z?cbBMwL+hP)U&xc(mCfo _kuADwCOA~HZ>pdpblnJZhF;iltmV}-(fl');
define('NONCE_KEY',        ',$0pF Cs|];=@5I7euKIF@dKO]+:9,nuV&:H/,~+b!~Oc|-mX)9&%`xa-[3=OG|K');
define('AUTH_SALT',        'cW$+2;**Blt~j3t?hz-OAIUtCb*I$LmjJV$cht#@-c;+,+8rEd=/Iq#/y%cY.;+n');
define('SECURE_AUTH_SALT', 'zoM)))z7^1;*bJTW|Zkb<]|5<xP0CLkZ]7<Un5XCviEvb7KO>estx&EZu!j@8T,b');
define('LOGGED_IN_SALT',   'SfOF%qS s6n]/Do`ATD}Gqv>C+B$H:#BPie]K7JWD/_WyMq1PfUr)NX~,+wsx7`q');
define('NONCE_SALT',       'h+jX|b2.m20,XU8|G|R&?b9>SF.*hY~mkdK+f1tq0Asj#q%TQ.nL^H#kbtUP}-26');

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
/*fix for white text in editor 27/11/2018*/
/*define(‘CONCATENATE_SCRIPTS’, false);*/
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
/** Memory Limit */
define('WP_MEMORY_LIMIT', '256M');
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
