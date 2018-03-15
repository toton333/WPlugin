<?php 
/**
 * @package  BishanPlugin
 */
namespace Inc\Base;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
/**
* 
*/
class WidgetController extends BaseController
{
	public $callbacks;
	public $subpages = array();
	public function register()
	{
		if ( ! $this->activated( 'media_widget' ) ) return;
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->setSubpages();
		$this->settings->addSubPages( $this->subpages )->register();
	}
	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'Bishan_plugin', 
				'page_title' => 'Widgets Manager', 
				'menu_title' => 'Widgets Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'Bishan_widget', 
				'callback' => array( $this->callbacks, 'adminWidget' )
			)
		);
	}
}