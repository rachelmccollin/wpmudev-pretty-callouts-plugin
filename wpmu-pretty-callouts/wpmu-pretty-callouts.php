<?php 
/* Plugin Name: Pretty Callouts Plugin
Plugin URI: https://github.com/rachelmccollin/wpmudev-pretty-callouts-plugin
Description: This plugin provides a shortcode you wrap arounf your text to create a pretty callout box in the flow of your post's content.
Version: 1.0
Author: Rachel McCollin
Author URI: http://rachelmccollin.com
License: GPLv2
*/

// register the shortcode
function wpmu_pretty_callouts( $atts, $content = null ) {
	
	$atts = shortcode_atts( array(
		'align' => ''
	), $atts, 'pretty-callout' );
	
	ob_start(); 
	
	echo '<aside class="pretty-callout ' . $atts['align'] . '">' . $content . '</aside>';	
		
	return ob_get_clean();
	
}
add_shortcode ('pretty-callout', 'wpmu_pretty_callouts');

// register the stylesheet
function wpmu_pretty_callouts_add_stylesheet() {
	
	wp_register_style( 'wpmu_pretty_callouts_style', plugins_url( 'style.css', __FILE__ ) );
	wp_enqueue_style( 'wpmu_pretty_callouts_style' );

}
add_action( 'wp_enqueue_scripts', 'wpmu_pretty_callouts_add_stylesheet' );