<?php
/**
 * @package  BishanPlugin
 */
class BishanPluginActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}