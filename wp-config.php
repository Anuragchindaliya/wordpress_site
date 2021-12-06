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
define('DB_NAME', 'skelectricals');

/** MySQL database username */
// define( 'DB_USER', 'kapilgupta' );
define('DB_USER', 'root');

/** MySQL database password */
// define( 'DB_PASSWORD', 'Kapil@##666$' );
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         ':}IWeL(+,A}N35lW;T2pv1xH goO!&86hG=TC&jx7:Y:p?_: yveAvoYcuT#2%3v');
define('SECURE_AUTH_KEY',  'g|_&Vk9lxAhu)SbmAofrkbe3%%jE8O,higgOL~[F5QnFt6#V0{x_B@<LG]V6^^X*');
define('LOGGED_IN_KEY',    '1KrwPmBF~D<=f3yBuo714azD-cw%jMw$gENy>+1cMs&n]e7@; M)2cwF{~W~x* b');
define('NONCE_KEY',        'bF8_>RhrD_Lk4</Lq1V.7!#|g9N4~~g?6.3UWUE?-M>}h[y-Y8N+>|-1Y&vobrXk');
define('AUTH_SALT',        '^0QbsP)#=PDTo?IYL#,}<= mi MN{d.#1gA,Iye5i*sM-=L6owxW1-,EMhj~`&I-');
define('SECURE_AUTH_SALT', '@W@LgrUj>T(s?j]bGLL~Jf-Z69XHs_[[u$$8xf(A]HGh-B@PJnvekF5UOYC&/POA');
define('LOGGED_IN_SALT',   'Q% rIA1$CJ2hZa T/l:Co!KONDTSI%SVge-|J0-*]xy>`_ZhxG*oqAF,Zi+>2 Pe');
define('NONCE_SALT',       'R(JC[|J+K3 Kr|z}GlSy*(g+O=V?GK<|fR}2|U[bYmc]csZa;(6jcJS6*cdKwZm;');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'site60_';

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */


define('WP_ALLOW_REPAIR', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
