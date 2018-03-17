<?php
/**
 * @package  BishanPlugin
 */

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();
		if ( ! get_option( 'bishan_plugin' ) ) {
			update_option( 'bishan_plugin', $default );
		}
		if ( ! get_option( 'bishan_plugin_cpt' ) ) {
			update_option( 'bishan_plugin_cpt', $default );
		}
	}
}