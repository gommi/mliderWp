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

define( 'DB_NAME', "mliderba_wpmlider" );


/** MySQL database username */

define( 'DB_USER', "mliderba_mlideruser" );


/** MySQL database password */

define( 'DB_PASSWORD', "8XTQ2ENsxvX9tT3e" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


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

define( 'AUTH_KEY',         '3AQ.u~!>~]46s/u}d5rgn3guet57mJ(C1^_~xN]Uh^&U6f}qfxai*@)vDj{Pwx5U' );

define( 'SECURE_AUTH_KEY',  'q1DLEJ07R$]Xh2V}Uk(*^|zn7J?y,p6gdgfD@Xw~Fwg>qW)ddD5%|lj$pQwK=g[!' );

define( 'LOGGED_IN_KEY',    'n,OK.&.r4a*%O#r`^1f<*Gp}/zt%*Zs5m0TPHtvi:{NDi6-^3*eW]/#LMJ?2jmm[' );

define( 'NONCE_KEY',        '>bT$afexn- *f`eC!A)dDf:pGoK`&C$QUCDKQyb4Nhx{a{B$9Ynu1LnQV+-XM4I^' );

define( 'AUTH_SALT',        '+n)]}~}ctYUK^TtwmRu{h0/Yap)[;OQ@G: tLz/Kqj8uEP8&&n#%HabVJh`z:jdn' );

define( 'SECURE_AUTH_SALT', 'v0ZAkE$eMz0Im-(7I+6hBC0G/Y8jJO!W#/T1}ah^6VSA?YA#5<_B:yoy/3_8TB8|' );

define( 'LOGGED_IN_SALT',   '&bNZL[i5r?~Q+KGH!c~NH&1V<Yj|Q+0wN2YjEKqD,AfS?0Mpx4]}Er1}h8||YLiP' );

define( 'NONCE_SALT',       'CGE(o,A39ys9Fyq@>~_.0jjJL!;1hmA^G8Biu.6@rg//H:(6(%4Bm`+,42qAvWax' );


/**#@-*/


/**

 * WordPress database table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';


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

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

