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
define( 'DB_NAME', 'octcoj2_t1' );
/** MySQL database username */
define( 'DB_USER', 'octcoj2_t1' );
/** MySQL database password */
define( 'DB_PASSWORD', '59hvi9OMC=' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
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
define( 'AUTH_KEY',         'wPF(^c;]=Om@?HEwcUncz);mb13-pf+X8{q`lx}zxT:?dgEu7dj 6,)9id;M#ooK' );
define( 'SECURE_AUTH_KEY',  'n^IQ?tLJFYIOB$IYu6?cbY0e=}SiSbPU~t2$Y=%EYH[8${D|r)*;A8:SJm[4KIt*' );
define( 'LOGGED_IN_KEY',    'Kao~$ m&~AzM>JZEL$NV3tg+Cy}%hPc_Jla7!Uc6lQpzqdDz$YP=_`6KsdSbf,Et' );
define( 'NONCE_KEY',        'Q.t)bN(JOAv&g}N!m0A[KK.+RY+tv~N:va^r(f2iNmRVeP.1>kC%dG3w,`sM1h$Y' );
define( 'AUTH_SALT',        'k=_V3B#9u*:Z?ZHnI#4E}?C--ar<}5)^ %KQugLH|7P2q[9<O4,xJ:%$<5M0FO?#' );
define( 'SECURE_AUTH_SALT', ';=usbTk)/o,=^ OtjY1%uFlO|V8gUy++~M7-5ZT#w]h# _4QgzGl3!nA~|a3|!M>' );
define( 'LOGGED_IN_SALT',   'WLYB$qW?iL0Jo86{WJcs*p)i~22flpHu6C;Zu mbmT77SOCRR }V|(+el[r,k:6a' );
define( 'NONCE_SALT',       '_4tEdWhKB7^I=:%[K?=jB;!o)~oP|C=ziU;B/=`%.^>`;pGjNY=G79gcHeyr;UHF' );
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
