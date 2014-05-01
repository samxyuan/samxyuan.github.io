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
define('DB_NAME', 'samxyuan_wor1');

/** MySQL database username */
define('DB_USER', 'samxyuan_wor1');

/** MySQL database password */
define('DB_PASSWORD', 'ZGfCd0T8');

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
define('AUTH_KEY',         ':X|cV|c&nDskb?`bgIIh~Tbt:Z*--g8TJO[PS{/CJgZMs)F|aR:mU_BFW^$hY-Nq');
define('SECURE_AUTH_KEY',  'ieWJq$@T] P8}&eOL*omEK(P7LAxWjcu+>,pI>#k+P@.,xV!<fzEE+_0#.w0-{b;');
define('LOGGED_IN_KEY',    '?K^nitDytYy61b/TJ[O+SQL};Yun+mSwotXrk!{83F4|Jn-my[[R;)Tu%+SUccb0');
define('NONCE_KEY',        '^I3TfZkv}NnBJLGhB[;U~|Jlb-~-#B&wG:=&,y~vYNsR%< C5{KBtwWv2|n,ijZd');
define('AUTH_SALT',        'NSPlK^Rdj>@f=|!^R-&Yp 0Gg[Yi+tzAC#+OU 3Ad-DXGQ}$~x,}9kC+*$*toB}7');
define('SECURE_AUTH_SALT', '`6+)[Xfa|!,ozI.yE !Llt.OiJ81q6nM$&|CD|`+seF4[J(Fu>ebl-8rmxNKtIlG');
define('LOGGED_IN_SALT',   '{498eT !U} ZJ)P%^+;_*+SU+w(wG<`^Y`[9+P=`bNyTT7N~dwC<])GTy$<+9Nmx');
define('NONCE_SALT',       '-k8t|QGqoUg-&r.+zmQ&O>^%>SmFUigr Q#D@a#$OlS+?H?6yvpO)j++bPR`3Nis');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'blc_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
