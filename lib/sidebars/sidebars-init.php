<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function wwm_2015_widgets_init() {
	//Primary
	register_sidebar( array(
		'name'          => 'Primary',
		'id'            => 'primary_widgets',
		'before_widget' => '<div class="widget-container large-12 medium-12 small-12 columns">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title" data-color="secondary">',
		'after_title'   => '</h3>',
	) );
	//Homepage
	register_sidebar( array(
		'name'          => 'Homepage',
		'id'            => 'homepage_widgets',
		'before_widget' => '<div class="widget-container large-3 medium-6 small-12 columns">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title" data-color="secondary">',
		'after_title'   => '</h3>',
	) );
	//Homepage - secondary
	register_sidebar( array(
		'name'          => 'Homepage Secondary',
		'id'            => 'homepage_secondary_widgets',
		'before_widget' => '<div class="widget-container large-4 medium-6 small-12 columns">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title" data-color="secondary">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'wwm_2015_widgets_init' );
?>