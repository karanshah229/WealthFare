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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'yBj9T+sudUMwjDpLnSyjI/IjOSku5koytRgN6f/efLvG6KJAGgiWUxKrZAy7ivIyR2SUtT+RkzWuDhtLZO+0Vg==');
define('SECURE_AUTH_KEY',  'wHmsYnpJeP1RafMG4nh9eiw/h2a5T+oh4EQy5ZzE6m1bsWXNl7dwpAG58yYjZXw+56ThOXw5KghqPH58XP2gRA==');
define('LOGGED_IN_KEY',    '0xrcIGuT0IwHFeTJZZw+0s3ymTxEQCRAVQvZDGrxVPy8x5MJ4bYkpgS9m2UfJp5a9L5nJnOsU2gIvjSJQUfRYQ==');
define('NONCE_KEY',        '+in8VhH04DCMPDse3oQFwmt8R1j45syUZl1uSL5g7cu81J0aZzsu+ZDWOaQObhj/sMKPThlEGUtFWyPxkZ9Phg==');
define('AUTH_SALT',        'DX2IAAGM84HRU2ZStw00yrOJ23A+kfCyUMfHqdO15lYqzjPMaVXY2h3uMH6yEPGG+IEzrhr++HFMWBVAjx1FbQ==');
define('SECURE_AUTH_SALT', 'EGSnHkQ0WkVxX/U/cJaSIeYAvKWjPD7ZG/KvATAA3ed5ndDbZnBHAQVVIQ2sYVLj8D5XrS7BEEkf6idKY6eifQ==');
define('LOGGED_IN_SALT',   '6SNMz0ZShf1BsGwm4xc6v1YLB8VZlahmLfSHNmS4pVbJOcFpGbzHFchJB1V8cf5+7I3+lat2WRA3H38d7VIvDQ==');
define('NONCE_SALT',       'Usg/hOHG4lTeGf4+5rlwTtNXBWSypwk20247oDvNQd76aLdryQAJF7brIKelIHHkhi/jzTR5EgxhEhqukOQwOQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
