<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 * @wordpress-plugin
 * Plugin Name:       Finestdevs Helper
 * Plugin URI:        
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Masum Sakib
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       finestdevs
 * Domain Path:       /languages
 */


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/*
Constants
------------------------------------------ */

/* Set plugin version constant. */
define( 'FINESTDEVS_VERSION', '0.1');

/* Set constant path to the plugin directory. */
define( 'FINESTDEVS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

// Plugin Addons Folder Path
define( 'FINESTDEVS_ADDONS_DIR', plugin_dir_path( __FILE__ ) . 'widget/' );

define( 'FINESTDEVS_ADDONS_INC', plugins_url( __FILE__ ) . 'inc' );

// Assets Folder URL
define( 'FINESTDEVS_ASSETS', plugins_url( 'assets/', __FILE__ ) );
define( 'FINESTDEVS_ASSETS_ADMIN',  plugins_url( 'assets/admin/', __FILE__ ) );
define( 'FINESTDEVS_ASSETS_VENDOR', plugins_url( 'assets/vendor/', __FILE__ ) );


require_once(FINESTDEVS_PATH. 'base.php' );
require_once(FINESTDEVS_PATH. '/inc/helper-functions.php' );
// require_once(FINESTDEVS_PATH. '/inc/elementor-helper.php' );
// require_once(FINESTDEVS_PATH. '/inc/acf.php' );
// require_once(FINESTDEVS_PATH. '/inc/cpt.php' );