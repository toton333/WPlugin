<?php
/**
 * @package  BishanPlugin
 */

namespace Inc\Base;

class BaseController
{
	public $managers = array();

	public function __construct() {
		$this->managers = array(
			'cpt_manager' => 'Activate CPT Manager',
			'taxonomy_manager' => 'Activate Taxonomy Manager',
			'media_widget' => 'Activate Media Widget',
			'gallery_manager' => 'Activate Gallery Manager',
			'testimonial_manager' => 'Activate Testimonial Manager',
			'templates_manager' => 'Activate Templates Manager',
			'login_manager' => 'Activate Ajax Login/Signup',
			'membership_manager' => 'Activate Membership Manager',
			'chat_manager' => 'Activate Chat Manager'
		);
	}

	public function activated( string $key )
	{
		$option = get_option( 'bishan_plugin' );
		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}