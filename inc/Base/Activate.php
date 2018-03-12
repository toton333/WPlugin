<?php
/**
 * @package  BishanPlugin
 */

namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if ( get_option( 'bishan_plugin' ) ) {
			return;
		}

		$default = array();
		update_option( 'bishan_plugin', $default );
	}
}