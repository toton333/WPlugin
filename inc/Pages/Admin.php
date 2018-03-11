<?php 
/**
 * @package  BishanPlugin
 */
namespace Inc\Pages;
use \Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;


class Admin extends BaseController
{

	public $settings;
	public $callbacks;
	public $callbacks_mngr;
	public $pages = array();
	public $subpages = array();

    public function __construct(){
      
      parent::__construct();
      $this->settings       = new SettingsApi();
      $this->callbacks      = new AdminCallbacks();
      $this->callbacks_mngr = new ManagerCallbacks();

    }

	public function register() {

		$this->setPages();
		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}

	public function setPages(){

     $this->pages = array(
      	array(

      		'page_title' => 'Bishan Plugin', 
			'menu_title' => 'Bishan', 
			'capability' => 'manage_options', 
			'menu_slug' => 'bishan_plugin', 
			'callback' => array( $this->callbacks, 'adminDashboard' ), 
			'icon_url' => 'dashicons-store', 
			'position' => 110


      ));

	}

	public function setSubpages(){

     $this->subpages = array(
			array(
				'parent_slug' => 'bishan_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'bishan_cpt', 
				'callback' => array( $this->callbacks, 'adminCpt' )
			),
			array(
				'parent_slug' => 'bishan_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'bishan_taxonomies', 
				'callback' =>  array( $this->callbacks, 'adminTaxonomy' )
			),
			array(
				'parent_slug' => 'bishan_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'bishan_widgets', 
				'callback' => array( $this->callbacks, 'adminWidget' )
			)
		);
	}




	public function setSettings()
	{

		/*//this for multiple options fields in database
		$args = array();
		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'option_group' => 'bishan_plugin_settings',
				'option_name' => $key,
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			);
		}*/
          

        //this for single option field in database  
		$args = array(
			array(
				'option_group' => 'bishan_plugin_settings',
				'option_name' => 'bishan_plugin',
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			)
		);
		


		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'bishan_admin_index',
				'title' => 'Settings Manager',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'bishan_plugin'
			)
		);
		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array();

		/*//this for multiple options fields in database
		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'bishan_plugin',
				'section' => 'bishan_admin_index',
				'args' => array(
					'label_for' => $key,
					'class' => 'ui-toggle'
				)
			);
		}*/
        

        //this for single options field in database
		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'bishan_plugin',
				'section' => 'bishan_admin_index',
				'args' => array(
					'option_name' => 'bishan_plugin',
					'label_for' => $key,
					'class' => 'ui-toggle'
				)
			);
		}
		$this->settings->setFields( $args );
	
	}


	
}