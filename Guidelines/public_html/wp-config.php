<?php


define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

if (isset($_SERVER["HTTP_ORIGIN"]) === true) {
	$origin = $_SERVER["HTTP_ORIGIN"];
 
    // $allowed_origins is an array of domains to be allowed; it could as well be filled by all active languages urls from WPML
    $allowed_origins = [
		"https://parkinsonguideclinique.ca",
		"https://www.parkinsonclinicalguidelines.ca"
	];

    if (in_array($origin, $allowed_origins, true) === true) {
		header('Access-Control-Allow-Origin: ' . $origin);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Content-Type');
	}
	
    if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
        exit; // OPTIONS request wants only the policy, we can stop here
    }
}
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'parkinsonclinica_main' );

/** MySQL database username */
define( 'DB_USER', 'parkinsonclinica_www' );

/** MySQL database password */
define( 'DB_PASSWORD', ')T8kOq)ZYxuxv@YoT9' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WC3k6tZ8MD0/g9LgOOxZqGY29Xz6k5CZoc29vTkRqmkAr1zO1R0EDezMA7ga//VsVlpVjH35NIOunXaASLS6TA==');
define('SECURE_AUTH_KEY',  'e53gi37E65Dn29P9HVqxwK6BymIfbVzw7K29C8UcGkULjPOi0CjYdshQAMbjFpvJzympdqDtzIJGP3NbP/kJZA==');
define('LOGGED_IN_KEY',    '675xHyGcGToXo3A89j0mYcXSkQmtxg2If65jkzo42dWM2kf7Jcuxs49Sr0vMRAKCW3OorH+GFAQacIExRwXgeg==');
define('NONCE_KEY',        'VSXV/nfB3rOgsh/BzN9/jsW+IfxQ5kKFf2uw9HcVXbFJiE1yWJ4/PP9/HjervRmE6kk7STwKSGDxMHzmF+wjbw==');
define('AUTH_SALT',        'hh64LY3u5Tp6rD8G2OjcZlDTx4A3Lz0FG94PhL0gCzjRMcGQPOY1bnSLQrrReZBW5zerkCXyZIlCOO4v7gtP2w==');
define('SECURE_AUTH_SALT', 'Ri2Jlpz+c63pYq1oTl40hWqKtHyhNhAxI7BouzWeqUDPlGsZ+OiLqFvgWbKqecXGXyPOElO9JDxrV8qTz4eTyA==');
define('LOGGED_IN_SALT',   'KVJhSLEubQv60IJvA7EOS7XWNfNjwZG0YO/mirRLdU+AkFyva8RyTBtNEoHjlRI6drMtSrQfQXdkzNjkbfaC8Q==');
define('NONCE_SALT',       '1vDUgWUNXMhf7iqncQIq87Nwqmi7Tx3pQlK//zAJt3+3UWekOzzRxk1DysVqeZShKTumb6DFNJ876qCv78qitg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define('WP_DEBUG', false);

ini_set('log_errors',TRUE);
ini_set('error_reporting', E_ALL);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
