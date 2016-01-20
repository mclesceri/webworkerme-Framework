<?php


/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function wwm_2015_optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function wwm_2015_optionsframework_options() {

	$options = array();
	//Set the Section Tab Title
	$options[] = array(
		'name' => __('General Options', 'wwm_2015'),
		'type' => 'heading');
		//Logo
			$options[] = array(
				'name' => __('Main Logo', 'wwm_2015'),
				'desc' => __('Make sure to use a PNG, with a transparent background (the gray that you see above, is coded in...just for visibility purposes).', 'wwm_2015'),
				'id' => 'main_logo',
				'type' => 'upload',
				'class' => 'large-12 medium-12 small-12 columns');		
		//Primary Color
			$options[] = array(
					'name' => __('Primary Color?', 'wwm_2015'),
					'desc' => __('The main color in the scheme', 'wwm_2015'),
					'id' => 'primary_color',
					'std' => '#565b7b',
					'default'=>'#565b7b',
					'type' => 'color',
					'class'=>'large-6 medium-12 small-12 columns'
				);	
		//Secondary Color
			$options[] = array(
					'name' => __('Secondary Color?', 'wwm_2015'),
					'desc' => __('The secondary color in the scheme', 'wwm_2015'),
					'id' => 'secondary_color',
					'std' => '#d3e2f7',
					'default'=>'#d3e2f7',
					'type' => 'color',
					'class'=>'large-6 medium-12 small-12 columns'
				);		
	return $options;
}