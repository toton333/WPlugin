<?php 
/**
 * @package  BishanPlugin
 */
namespace Inc\Api\Callbacks;
class AdminCallbacks
{
	public function adminDashboard()
	{
		return require_once( PLUGIN_PATH."/templates/admin.php" );
	}

	public function adminCpt()
	{
		return require_once( PLUGIN_PATH."/templates/cpt.php" );
	}

	public function adminTaxonomy()
	{
		return require_once( PLUGIN_PATH."/templates/taxonomy.php" );
	}

	public function adminWidget()
	{
		return require_once( PLUGIN_PATH."/templates/widget.php" );
	}
	
}