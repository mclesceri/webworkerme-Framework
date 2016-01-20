<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
/*
* Register Nav Menus
* Registers the nav menus, to be used from the Appearance -> Menu Editor (checkboxes at the bottom)
* and can be called throughout the Theme. 
* http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
*/
register_nav_menus(array(
    'top-bar'           =>  'Top Bar',
    'top-right'         =>  'Top Right',
    'mobile-off-canvas' =>  'Mobile',
    'footer-nav'        =>  'Footer Nav',
    'banner-menu'       =>  'Banner Menu'
));

/**
 * top bar
 */
if ( ! function_exists( 'wwm_2015_top_bar' ) ) {
	function wwm_2015_top_bar() {
	    wp_nav_menu(array( 
	    	'container' => false,                           // remove nav container
	        'menu_class' => 'top-bar-menu',           		// adding custom nav class
	        'theme_location' => 'top-bar',		            // where it's located in the theme
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new top_bar_walker()
	    ));
	}
}

/**
 * Mobile off-canvas
 */
if ( ! function_exists( 'wwm_2015_mobile_off_canvas' ) ) {
	function wwm_2015_mobile_off_canvas() {
	    wp_nav_menu(array( 
	    	'container' => false,                           // remove nav container
	        'menu_class' => 'off-canvas-list',              // adding custom nav class
	        'theme_location' => 'mobile-off-canvas',        // where it's located in the theme
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new top_bar_walker()
	    ));
	}
}

/*
* Walker for the Top Ba
* Customize the output of menus for Foundation top bar
* Thanks to Ole Fredrick Lie and TechAdopters Contributors
* Github: https://github.com/olefredrik/TechAdopters
*/
class top_bar_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children && $max_depth !== 1 ) ? 'has-dropdown' : '';
        
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    
    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args ); 
        
       
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;  
        
        if( in_array('label', $classes) ) {
            $output .= '<li class="divider"></li>';
            $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
        }
        
    if ( in_array('divider', $classes) ) {
        $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }
        
        $output .= $item_html;
    }
    
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\"><li class='sub_menu_wrapp row'><ul class='sub_menu_inner'>";
    }
    function end_lvl( &$output, $depth = 0, $args = array()){
    	$output .= "\n</ul></li></ul>";
    }
    
}
/*
 * Add Search Button to the header Nav
 */
function wwm_2015_top_right_custom_items(){
	
    $link .= "<li><span class='activate_search fa fa-search' data-bg='primary' data-color='quaternary'></span></li>";
    $wrap  = '<ul id="%1$s" class="%2$s">';
        $wrap .= '%3$s';
        $wrap .= $link;
    $wrap .= '</ul>';
	
    return $wrap;
}

?>