<?php 
/**
 * @package  BishanPlugin
 */
namespace Inc\Pages;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin
{

	public $settings;
	public $callbacks;
	public $pages = array();
	public $subpages = array();

    public function __construct(){

      $this->settings = new SettingsApi();
      $this->callbacks = new AdminCallbacks();
     

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
		$args = array(
			array(
				'option_group' => 'bishan_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'bishanOptionsGroup' )
			),
			array(
				'option_group' => 'bishan_options_group',
				'option_name' => 'first_name'
			)
		);
		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'bishan_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'bishanAdminSection' ),
				'page' => 'bishan_plugin'
			)
		);
		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'bishanTextExample' ),
				'page' => 'bishan_plugin',
				'section' => 'bishan_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'bishanFirstName' ),
				'page' => 'bishan_plugin',
				'section' => 'bishan_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);
		$this->settings->setFields( $args );
	}


	
}