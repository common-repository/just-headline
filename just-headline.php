<?php
/*
Plugin Name: Just Headline
Description: Widget to easy add a single HTML heading tag
Tags: heading tag, heading, widget
Version: 1.0
Author: JustCoded / Alex Prokopenko
Author URI: http://justcoded.com/
*/

define('JHL_PATH', dirname(__FILE__));
define('JHL_URL', WP_PLUGIN_URL . '/'. basename(JHL_PATH) . '/' );
require_once( JHL_PATH . '/just-headline.widget.php' );


// print helper function
if( ! function_exists('pa') ) :
function pa($mixed, $stop = false) {
	$ar = debug_backtrace(); $key = pathinfo($ar[0]['file']); $key = $key['basename'].':'.$ar[0]['line'];
	$print = array($key => $mixed); print( '<pre>'.(print_r($print,1)).'</pre>' );
	if($stop == 1) exit();
}
endif;

/**
 * init widget
 */
function jhl_register_widgets() {
	register_widget( 'JHL_Widget_Headline' );
}
add_action( 'widgets_init', 'jhl_register_widgets' );
