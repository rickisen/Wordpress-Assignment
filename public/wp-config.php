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

$config = parse_ini_file('mysqliConfig.ini');

/** The name of the database for WordPress */
define('DB_NAME', $config['database']);

/** MySQL database username */
define('DB_USER', $config['user']);

/** MySQL database password */
define('DB_PASSWORD', $config['password']);

/** MySQL hostname */
define('DB_HOST', $config['host']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_bin');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=]h)tZyq;G@v;|snFb8_&Qy8-q$+|=Bg}C$iSEg(|i)|#+:/BSorc54D`}/p`bQ|');
define('SECURE_AUTH_KEY',  '+p?9ZKGfvP}o.Jklk>~L>:=xb-L`;|mOBp03H0P|.lj olU.I(Nk/EA+Gm*qHYho');
define('LOGGED_IN_KEY',    't4t?GC}CBv3HZ!71Ii)SzGu1Vw~?O4D$z_+=o/14?A{N|8wz4YRP7IdQ^?w%,[@H');
define('NONCE_KEY',        ',1yQ4t6oqObg>Z<(IfjJGWH-Dq&xSitY>#Ad<-+T]2ptD-?eyhkYN G8z#z~st}<');
define('AUTH_SALT',        'v-).2yK}dk()|n7an&8g*!QF%mw( XP#-C|pyq,CWZKz&>_(M%jq;K;DbS,6Hf,+');
define('SECURE_AUTH_SALT', 'b+jdb)42N#%`^1(^LgAlJSe,%+1Mb#;+k6d1[xKU%TS*#NaMh4$slM>&Yxx*&EAq');
define('LOGGED_IN_SALT',   'XR{zCXEMKZBkKo-r[AmKk$-_zy_Zs#I6bq/w >!zR(>pn]XY|8e{<|[.<~3*TDyy');
define('NONCE_SALT',       'Hp}Ih3fpH7k-Vx-V/|U+,@ZtB(f/>?+6T^:-X6!%k;|F53[}#XfRW[38jldf#=R(');

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
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
