<?php 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/* Add the Theme Settings Panel
 *  Github Repo: https://github.com/devinsays/options-framework-theme
 *  The Version, used for  has been heavily modified. Do not update it. 
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if(is_child_theme()){
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/lib/settings_panel' );
	require_once dirname( __FILE__ ) . '/options-framework.php';
}else{
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/lib/settings_panel' );
	require_once dirname( __FILE__ ) . '/options-framework.php';
}
?>