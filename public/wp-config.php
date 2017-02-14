<?php
/**
 *  TODO FOR Dev
 *  ============
 *  1. Generate new Wordpress Salts. (https://api.wordpress.org/secret-key/1.1/salt/)
 *  2. Change table prefix
 *
 *  TODO for LIVE
 *  =============
 *. 1. Modify local-config.php with live credentials
 *  2. NO SERVER OR MYSQL INFORMATION SHOULD BE STORED IN THIS FILE!!
 *
 * ================================================
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

/* Load our Local config file.
 * 1. Both LIVE and local development variations
 */
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
    include(dirname(__FILE__) . '/local-config.php');
}

/*
 * Our fall back credentials for development.
 * 1. All LIVE credentials should be in local-config.php (not tracked by GIT)
 * 2. Development variations should be in your own local-conf.php file (not tracked by GIT)
 */

if (!defined('DB_NAME')) {define('DB_NAME', 'ubti_data');}
if (!defined('DB_USER')) {define('DB_USER', 'homestead');}
if (!defined('DB_PASSWORD')) {define('DB_PASSWORD', 'secret');}
if (!defined('DB_HOST')) {define('DB_HOST', 'localhost');}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {define('DB_CHARSET', 'utf8');}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {define('DB_COLLATE', '');}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'kcy*%ps!YrW%YMk.+;7A`yR,{u$G;@Dais8m)HU,:-n;_{F%<8QBD/hI,f|$<sPH');
define('SECURE_AUTH_KEY',  'r)0R`r^j+d9(rBLX;=PR+A-u7z*>A!5-LE]sJvc0n^#jsY7_i5]cTJlMzTh$KO;5');
define('LOGGED_IN_KEY',    'a-Q+.8ky8:^0SMCP3oE8^S..%[>?mHx1J,dXGWkVU@q: lr`M AG]a-6q).0i}8;');
define('NONCE_KEY',        'jBe@TJbB(?JK:*jbHW-xiN:fx2IH:h@|x`9?wytFkbkE*-a,sG+&Nhz;DLHb<[  ');
define('AUTH_SALT',        'v-3.}_j8G5c0(hmmsfn|{#`|Nyb[~X?O[O+D%g8f^fs#0XHL*EE+LPWH8f:o?$8~');
define('SECURE_AUTH_SALT', '`eE+G4{0_(&oaDH0K>+etmEh{6:6ND+>TG>]%W/r9~}3MNSx~=J2ww%lYyy>nq8W');
define('LOGGED_IN_SALT',   '[,} g(r!8[;<Ar4L#>=yG.2K&DP7d2REp7y`8S~<A^zQZ$IrdQZlVl+vGG~fdAC;');
define('NONCE_SALT',       '/C+pj9:XLc 1@2I<@^LIP7z/;rgQ7|} 61uD/1Jr/V|E[hS,<9 -+]Fip!X18Jb?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if (!isset($table_prefix)) {$table_prefix  = 'dev_';}


/**
 * Set custom paths
 *
 * 1. These are required because wordpress is installed in a subdirectory.
 * 2. These are the defaults for dev, and are not suitable for a live env
 * 3. PLEASE DEFINE THESE IN local-config.php!!!
 */
if (!defined('WP_SITEURL')) {
    define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . ':8000/cms');
}
if (!defined('WP_HOME')) {
    define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . ':8000');
}
if (!defined('WP_CONTENT_DIR')) {
    define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
    define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . ':8000/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {define('WP_DEBUG', false);}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')){define('ABSPATH', dirname(__FILE__) . '/');}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
