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
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '9h PurV|Pm=%LZ,i/=3B@OGcG`P0?H7GbZLYtoo-nhfJNLFn&w$)ker{o^;TeK0s');
define('SECURE_AUTH_KEY',  '<P,}?K_*.N$<E#Jo&$+<g9RA0uw*<%]h3C;;_<UsOaexcai=m@gK]Azgod<Y|meM');
define('LOGGED_IN_KEY',    'Kuu`oaD5S03r:TtOx/wY18>f^_P*.pP;$~;7fepG>Fu(T@1GNoZdTxy?U,6+> se');
define('NONCE_KEY',        '~lHE9p[>!}c@cS=68*JvYyRosPF9{RSi=Ktg88.MA|KG)`$/(`]!]<#zE-W+Fje:');
define('AUTH_SALT',        ',]@st(`SClLnR$t2)&<-3FdSqkoM,OS(`fY$Ysh##B:0FN0A4`,)Uh[!$rUpJ;|9');
define('SECURE_AUTH_SALT', '<cq(c,)t+cHwiAMYb01l#BztGfP1x+UY,(My2TjErvy ZkxTFR01:Mz*}e2dE8UA');
define('LOGGED_IN_SALT',   'VyG eVg-|`{&KuZ,!H`<fU(SAMX,96a=-=HX30K#wmslVTZ|+O)a+#Y.qdnE:eBY');
define('NONCE_SALT',       '9.e6;(t)6pyOszEh5c1re%mN^%0z%bI8AxZYkL]r`~ktT5 )==@e^brRvn:&q,.,');

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
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
