<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://shapon.netlify.app/
 * @since             1.0.0
 * @package           Woocommerce_Product_Search_Sp
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Product Search
 * Plugin URI:        https://www.fiverr.com/shapon_pal
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Shapon Pal
 * Author URI:        https://shapon.netlify.app/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-product-search-sp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOOCOMMERCE_PRODUCT_SEARCH_SP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-product-search-sp-activator.php
 */
function activate_woocommerce_product_search_sp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-product-search-sp-activator.php';
	Woocommerce_Product_Search_Sp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-product-search-sp-deactivator.php
 */
function deactivate_woocommerce_product_search_sp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-product-search-sp-deactivator.php';
	Woocommerce_Product_Search_Sp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_product_search_sp' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_product_search_sp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-product-search-sp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woocommerce_product_search_sp() {

	$plugin = new Woocommerce_Product_Search_Sp();
	$plugin->run();

}
run_woocommerce_product_search_sp();
