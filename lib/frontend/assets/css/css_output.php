<?php
// Output the CSS, to the frontend
add_action('wp_head', 'wwm_2015_settings_panel_styles');
//Setup that function.
function wwm_2015_settings_panel_styles(){
		//Set up the Template directory, if needed throughout.
	$template_directory = get_template_directory_uri() . "/";
	
	//Initiate the style string.
	$style_str = '';	
	/*------------------------------------------------
	*   Styles Created by the Theme Settings Panel   *
	------------------------------------------------*/
		/*
		 * General Stuff
		 */
			/*
			 * Primary Color
			 */
				//A primary color used throughout the theme.
				$primary_color = of_get_option('primary_color');

				//Using the color for font color
				$style_str .= "	[data-color='primary']
								{
									color: ".$primary_color.";
								}";
				//Importantify a few things
				$style_str .= " [data-color-hov='primary']:hover
								{
									color: ".$primary_color."!important;
								}";
				//Using the color for Backgrounds
				$style_str .= "	[data-bg='primary']
								{
									background: ".$primary_color.";
								}";
				//Using the color for SVG Fills
				$style_str .= "";

				//Using the color for border colors
				$style_str .= "	[data-border='primary']
								{
									border-color: ".$primary_color.";
								}";
		


			/*
			 * Secondary Color
			 */
				//A secondary color used throughout the theme.
				$secondary_color = of_get_option('secondary_color');

				//Using the color for font color

				$style_str .= " [data-color='secondary']
								{
									color: ".$secondary_color.";
								}";

				//Using the color for font color
				$style_str .= "";
				//Using the color for Backgrounds
				$style_str .= "	[data-bg='secondary']
								{
									background-color: ".$secondary_color.";
								}";		
				

				//Using the color for SVG Fills
				$style_str .= "";
												
		
		/*---------------
		*   Minify it   *
		---------------*/
			// Normalize whitespace
			$style_str = preg_replace( '/\s+/', ' ', $style_str );

			// Remove spaces before and after comment
			$style_str = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $style_str );
			// Remove comment blocks, everything between /* and */, unless
			// preserved with /*! ... */ or /** ... */
			$style_str = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $style_str );
			// Remove ; before }
			$style_str = preg_replace( '/;(?=\s*})/', '', $style_str );
			// Remove space after , : ; { } */ >
			$style_str = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $style_str );
			// Remove space before , ; { } ( ) >
			$style_str = preg_replace( '/ (,|;|\{|}|\)|>)/', '$1', $style_str );
			// Strips leading 0 on decimal values (converts 0.5px into .5px)
			$style_str = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $style_str );
			// Strips units if value is 0 (converts 0px to 0)
			$style_str = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $style_str );
			// Converts all zeros value into short-hand
			$style_str = preg_replace( '/0 0 0 0/', '0', $style_str );
			// Shortern 6-character hex color codes to 3-character where possible
			$style_str = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $style_str );

	$style_output = "<style>" . trim($style_str) . "</style>\n";

	echo $style_output;
}
?>