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
define( 'DB_NAME', 'saosaweb_caongan' );

/** MySQL database username */
define( 'DB_USER', 'saosaweb_caongan' );

/** MySQL database password */
define( 'DB_PASSWORD', 'caongan@123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'vFj(c+Y@OCwr4QR4z@wVM_]dMVmMN)]1m30W6;bw*-|m+l0y9@X#Y1&|7N769m23');
define('SECURE_AUTH_KEY', 'w5K@TS|]4L_677LiAxB91//9AJ9//FF5vR[0n(%GX~o@80WE_W#eb#ze3)ABOPlg');
define('LOGGED_IN_KEY', '!&yq(m*/5zU*~&k+h!CI33TQ-G90_+M5yvC979KKhr)#:]0T[3OJO3&fG(!qd2IR');
define('NONCE_KEY', '4))M6qgLNwd&d[B%p2W[jLXn&sz21fX!U3M%I5]12p-%~Z|r#4m;B#C5(pOJ3Y4[');
define('AUTH_SALT', '4:rvYfe093D+kTNCbN2qy*+@/J_FsZ*jrVWO4JfmxJV|8~sh8/N0FMvK6*KFd626');
define('SECURE_AUTH_SALT', '&h~s73hf5Y3*YsH(q:L*E[3#8j;kR3LFS[X[F!o9Dr7g7~06/F/u@H17YUR71XWX');
define('LOGGED_IN_SALT', 'At]2Gd~8IbO5n[Ws:1Xe8-um8|:0%LE]ddBYz#s_4f5I(8-_+!z93t5AP~)o#Rni');
define('NONCE_SALT', '2JDxuX7LvC;745mj*M!BNYN1E40n|D1l20V|5!)TX&@[24W568%z:o;l)7;s9o6T');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'UOS8Xut1V0_';


define('WP_ALLOW_MULTISITE', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
