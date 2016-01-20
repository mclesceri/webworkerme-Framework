<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
/*
* Enqueue ALL the things necessary to the frontend
* Broken up into parts, so that if someone wants to disable an 
* entire portion of the theme (for example, if they don't like 
* foundation5 scripts being loaded, then they can simply delete the Foundation Scripts section.)
*/
add_action( 'wp_enqueue_scripts', 'wwm_2015_enqueue_scripts_and_styles' );

function wwm_2015_enqueue_scripts_and_styles(){

    //Setup a template directory variable. 
    $template_dir = get_template_directory_uri() . '/';

    //Primary Stylesheet
    wp_register_style('ConnellCurley-Stylesheet', $template_dir . 'style.css', array(), '1.8.1');
    wp_enqueue_style('ConnellCurley-Stylesheet');    

    //JQuery
    wp_enqueue_script('jquery');

    //Modernizr
    wp_register_script('wwm_2015_modernizr', $template_dir .'lib/frontend/assets/js/vendor/modernizr.js', array(), '1.0.0', true);
    wp_enqueue_script('wwm_2015_modernizr');

    //Smooth Scroll
    wp_register_script('wwm_2015_smooth-scroll', $template_dir . 'lib/frontend/assets/js/vendor/SmoothScroll.js', '1.0.0', true);
    wp_enqueue_script('wwm_2015_smooth-scroll');

    //Owl Carousel
    wp_register_script('wwm_2015_owl-carousel', $template_dir . 'lib/frontend/assets/js/vendor/owl.carousel.min.js', array(), '1.0.0', true);
    wp_enqueue_script('wwm_2015_owl-carousel');

    // Script Activators
    wp_register_script('wwm_2015_main', $template_dir . 'lib/frontend/assets/js/main.js', array(), '1.0.0', true);
    wp_enqueue_script('wwm_2015_main');    
}
// Prepare the Styles for Output
require_once('assets/css/css_output.php');
?>