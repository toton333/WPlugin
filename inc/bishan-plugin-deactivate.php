<?php
/**
 * @package  BishanPlugin
 */
class BishanPluginDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}