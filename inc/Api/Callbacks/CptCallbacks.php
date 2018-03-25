<?php 
/**
 * @package  BishanPlugin
 */
namespace Inc\Api\Callbacks;
class CptCallbacks
{
	public function cptSectionManager()
	{
		echo 'Create as many Custom Post Types as you want.';
	}
	public function cptSanitize( $input )
	{

		$output = get_option( 'bishan_plugin_cpt');

        //deleting the custom post
		if ( isset($_POST["remove"]) ) {

			$message = $_POST["remove"]." has been removed";
			$type    = 'error';
			unset($output[$_POST["remove"]]);

			add_settings_error('bishan_plugin_cpt_settings', 'bishan_option_notice', $message, $type);
			return $output;
		}
		


        //if bishan_plugin_cpt is empty then foreach loop won't work,
		// so just need to put new custom post directly
		if ( count($output) == 0  ) {

			$message = $input['post_type']." has been added";
			$type    = 'updated';

            add_settings_error('bishan_plugin_cpt_settings', 'bishan_option_notice', $message, $type);

			$output[$input['post_type']] = $input;
			return $output;
		}

        foreach ($output as $key => $value) {
        	if($input['post_type'] === $key){

        	$message = $input['post_type']." has been updated";
			$type    = 'updated';

            add_settings_error('bishan_plugin_cpt_settings', 'bishan_option_notice', $message, $type);

        		$output[$key] = $input;

        	}else{

        		$message = $input['post_type']." has been added";
			    $type    = 'updated';

                add_settings_error('bishan_plugin_cpt_settings', 'bishan_option_notice', $message, $type);

        		$output[$input['post_type']] = $input;

        	}
        }


       return $output;
	}


	public function textField( $args )
	{
		$name = $args['label_for'];
		$option_name = $args['option_name'];
		$value = '';
		if ( isset($_POST["edit_post"]) ) {
			$input = get_option( $option_name );
			$value = $input[$_POST["edit_post"]][$name];
		}
		echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '" required>';
	}
	
	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checked = false;
		if ( isset($_POST["edit_post"]) ) {
			$checkbox = get_option( $option_name );
			$checked = isset($checkbox[$_POST["edit_post"]][$name]) ?: false;
		}
		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}
}