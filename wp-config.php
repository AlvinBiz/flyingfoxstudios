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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


if (file_exists(dirname(__FILE__) . '/local.php')) {
	/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_videoaudio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
} else {
	/** The name of the database for WordPress */
define( 'DB_NAME', 'flyinhm8_wp_flyingfox' );

/** MySQL database username */
define( 'DB_USER', 'flyinhm8_rafael' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Elwing86' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
}


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&zu^[`>9IRMHP#%u3%7Vl2=Pd6pN%SEqoENA]A_#J<S=0moN$fJn_,biR47jwp%Z' );
define( 'SECURE_AUTH_KEY',  'p:q+pu:E>oG6usMe`?S4L%F;`1Ms1ViM-H[Z>J4TD~x8<pQz8s1B<O:~w`XNs1qU' );
define( 'LOGGED_IN_KEY',    '^HE6nUBwH%&~kl9g>B0=O~gmPRBGr#v*N]d5c0.AY(^I,fI!I*8}<djv(HQAh`zp' );
define( 'NONCE_KEY',        's+&+ !ig,=Gxbg@BD<5OD5+=idOL)y/k*bl`nCf{pE5Jg#tp]z-5h(d<4AX/#vo<' );
define( 'AUTH_SALT',        'w,?2Uq{i`5j5I#t:~Q?qMj}+E1Y;EwWWe5=p~KT#.96A!d*#Epx3^*I}}^8PpI|4' );
define( 'SECURE_AUTH_SALT', 'O^mx!C=r;2jPfX3ynZifpdCJhW^F*Zg4[7c5(N38;h`>~mLC},F_vs*f0myxX~A]' );
define( 'LOGGED_IN_SALT',   'a=DETDQ#M wl9;WWr&LNx9+F]XDh{l&:a /$Qwl~!_/VdQrBetJt?Gdgs91IqrwD' );
define( 'NONCE_SALT',       '<UDg5E_d,fIvz=T4X[.zW5`r_~,$]NrZN724CUZkH<D$G)9_<if;_RCv%wYF>li+' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG', true);
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
