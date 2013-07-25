<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ipatent_wmg');

/** MySQL database username */
define('DB_USER', 'dev');

/** MySQL database password */
define('DB_PASSWORD', 'nakujho');

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
define('AUTH_KEY',         'O;kWi9tHk|9kf(Fc+R3da}iK2oo>$7=i)p5uXhXN,|-,CPbLhJ~Kg/sl0m#d.X;_');
define('SECURE_AUTH_KEY',  'F2,&07C[y JdlKTc:jCc>p?0U;cE`(WD;)(jd#6R2|Hz|)h$3`$r_8ZilfjH,WUn');
define('LOGGED_IN_KEY',    'O.V.KT ^Tf 60VFd9D$RN1)REf!Coj_qGwAHTQmXh/lg1m0[_pF:Mmf#/3OP|AWy');
define('NONCE_KEY',        '>U+G{ 5$d1jzOj$CXBBH5`IPc0qbjoS$t-up.cW&r <&w(ty,6*q F{~b}(r-,gb');
define('AUTH_SALT',        'V0KkAKOuc86=* C$:Eq~hB]xYZE4top)SHU14;ZT$q)6OUy/hLhK0FqYiJNfn(9a');
define('SECURE_AUTH_SALT', '^4?UYf7UhC[.|*zY]:@cwcezX|p(P0P)L=I70rmm# U!3D#djjq5v+{p-T1~|LBn');
define('LOGGED_IN_SALT',   'm(|^jao.-M^S7a{t7bhj&l@qN[|5g(P-6:Aeqk35p.CX9sXj;&Yn5F=4Iod X53]');
define('NONCE_SALT',       '.YpM@Z@SMiN-kmz?Tt+G_y!b^ZSOkV+mZy *|~,~zBv%0a1#kuhb+V]T.!=|6EKq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

error_reporting(E_ERROR);
ini_set('display_errors',0);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
