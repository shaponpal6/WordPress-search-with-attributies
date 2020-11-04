<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://shapon.netlify.app/
 * @since      1.0.0
 *
 * @package    Woocommerce_Product_Search_Sp
 * @subpackage Woocommerce_Product_Search_Sp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Product_Search_Sp
 * @subpackage Woocommerce_Product_Search_Sp/includes
 * @author     Shapon Pal <shaponpal4@gmail.com>
 */
class Woocommerce_Product_Search_Sp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woocommerce-product-search-sp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
