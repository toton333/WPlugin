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
	public function adminGallery()
	{
		echo "<h1>Gallery Manager</h1>";
	}
	public function adminTestimonial()
	{
		echo "<h1>Testimonial Manager</h1>";
	}
	public function adminTemplates()
	{
		echo "<h1>Templates Manager</h1>";
	}
	public function adminAuth()
	{
		echo "<h1>Templates Manager</h1>";
	}
	public function adminMembership()
	{
		echo "<h1>Membership Manager</h1>";
	}
	public function adminChat()
	{
		echo "<h1>Chat Manager</h1>";
	}
	
}