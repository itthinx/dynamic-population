<?php
/**
 * Plugin Name: Dynamic Population
 * Plugin URI: http://www.itthinx.com/plugins/affiliates-gravityforms/
 * Description: An example for dynamic population with Affiliates and Gravity Forms.
 * Author: itthinx
 * Author URI: http://www.itthinx.com/
 * Version: 1.0.0
 * License: GPLv3
 */

add_filter( 'gform_field_value_referrer_id', 'dp_gform_field_value_referrer_id' );
function dp_gform_field_value_referrer_id( $value ) {
	include_once AFFILIATES_CORE_LIB . '/class-affiliates-service.php';
	if ( class_exists( 'Affiliates_Service' ) && method_exists( 'Affiliates_Service', 'get_referrer_id' ) ) {
		if ( $affiliate_id = Affiliates_Service::get_referrer_id() ) {
			$value = $affiliate_id;
		}
	}
	return $affiliate_id;
}
