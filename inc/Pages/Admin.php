<?php 
/**
 * @package  BishanPlugin
 */
namespace Inc\Pages;
use \Inc\Api\SettingsApi;

class Admin
{

	public $settings;
	public $pages;

    public function __construct(){

      $this->settings = new SettingsApi();
      $this->pages = array(
      	array(

      		'page_title' => 'Bishan Plugin', 
			'menu_title' => 'Bishan', 
			'capability' => 'manage_options', 
			'menu_slug' => 'bishan_plugin', 
			'callback' => function() { echo '<h1>Bishan Settings Page</h1>'; }, 
			'icon_url' => 'dashicons-store', 
			'position' => 110


      ));

    }

	public function register() {
		$this->settings->addPages($this->pages)->register();
	}
	
}