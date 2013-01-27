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

define('DB_NAME', 'creatkv9_main');



/** MySQL database username */

define('DB_USER', 'creatkv9_cichris');



/** MySQL database password */

define('DB_PASSWORD', 'ZVcbEsfUSuWN4JX2');



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

define('AUTH_KEY',         '6n23lL2NhzPakUjhVIjn77rCWNcdj1cdx9B2kOycv5LD3kbJeGjeAHLmm0qZ8L9I');

define('SECURE_AUTH_KEY',  'ozdxEj4ceKz97TG74t5tJAqSoDykX2lbQSlWbP8Gf7EBpXRzeN7vp4LGZcCliGMe');

define('LOGGED_IN_KEY',    '5qypZJQ804aBzEyAJ7cN7taqlIHnq2B1wqfaDGbTAENGgZnVucfFK4zNx4oN1zQE');

define('NONCE_KEY',        'n2qlO6HbOMJIlAV6zZws2XrGLhBQq5gm0ZkYJb9CS0q8LoXdEve26FafnBSb6G9v');

define('AUTH_SALT',        'cvtDfMRWL5w0xaPnLyJsof4IG6zu1SAbXMovp1CkPTUsnPJsaeTVhZuhAXNyICti');

define('SECURE_AUTH_SALT', 'ZFm8mR8ldYulsaX2gcBgyuaidPtkuIDQtErDWcFSmwdX7CyzSlnPbXyNxeaBhadB');

define('LOGGED_IN_SALT',   'eKV5rewoxbWuqTssUQGnKPyEIHGqcLbRLZqs6dhyg3RQXBjLfYvDTRgd0AEMKJpc');

define('NONCE_SALT',       'tflfcpqVd6JYsEpWPNcKkIGLuxBugLRINODlYEfIogsc7aNj737d6EsYwpnDYDa2');



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

/* Set Up WordPress Network */

define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

