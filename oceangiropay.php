<?php
/*
	Plugin Name: Oceanpayment Giropay Gateway
	Plugin URI: http://www.oceanpayment.com/
	Description: WooCommerce Oceanpayment Giropay Gateway.
	Version: 6.0
	Author: Oceanpayment
	Requires at least: 4.0
	Tested up to: 6.1
    Text Domain: oceanpayment-giropay-gateway
*/


/**
 * Plugin updates
 */

load_plugin_textdomain( 'wc_oceangiropay', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

add_action( 'plugins_loaded', 'woocommerce_oceangiropay_init', 0 );

/**
 * Initialize the gateway.
 *
 * @since 1.0
 */
function woocommerce_oceangiropay_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

	require_once( plugin_basename( 'class-wc-oceangiropay.php' ) );

	add_filter('woocommerce_payment_gateways', 'woocommerce_oceangiropay_add_gateway' );

} // End woocommerce_oceangiropay_init()

/**
 * Add the gateway to WooCommerce
 *
 * @since 1.0
 */
function woocommerce_oceangiropay_add_gateway( $methods ) {
	$methods[] = 'WC_Gateway_Oceangiropay';
	return $methods;
} // End woocommerce_oceangiropay_add_gateway()