<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/donaldp
 * @since             1.0.0
 * @package           Audiostreamify_sc
 *
 * @wordpress-plugin
 * Plugin Name:       Audiostreamify Shortcode
 * Plugin URI:        developer.audiostreamify.com
 * Description:       Audiostreamify shortcode allows you to embed songs, albums or playlists.
 * Version:           1.0.0
 * Author:            Donald Pakkies
 * Author URI:        https://github.com/donaldp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       audiostreamify_sc
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-audiostreamify_sc-activator.php
 */
function activate_audiostreamify_sc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-audiostreamify_sc-activator.php';
	Audiostreamify_sc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-audiostreamify_sc-deactivator.php
 */
function deactivate_audiostreamify_sc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-audiostreamify_sc-deactivator.php';
	Audiostreamify_sc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_audiostreamify_sc' );
register_deactivation_hook( __FILE__, 'deactivate_audiostreamify_sc' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-audiostreamify_sc.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_audiostreamify_sc() {

	$plugin = new Audiostreamify_sc();
	$plugin->run();

}

function audiostreamify_sc( $atts ) {
	
	$audiostreamify_sc_border = "";
		
	// Attributes
	$atts = shortcode_atts(
		array(
			'src' => 'http://audiostreamify.com/embed/playlist/official',
			'width' => '100%',
			'height' => '500px',
			'theme' => '',
			'border' => '',
		),
		$atts,
		'audiostreamify'
	);
		
	$source = str_replace("http://play.audiostreamify.com", "http://audiostreamify.com/embed", $atts['src']);
		
	if ( $atts['border'] == "true") {
		if ($atts['theme'] == "light" || $atts['theme'] == "") {
			$audiostreamify_sc_border = "border: 1px solid #eee";
		}
		else {
			$audiostreamify_sc_border = "border: 1px solid #999";
		}
	}
	
	// Return custom embed code
	return '<iframe 
		src="' . $source . '&theme=' . $atts['theme'] . '"
		width="' . $atts['width'] . '"
		height="' . $atts['height'] . '"
		style="' . $audiostreamify_sc_border . '"
		frameborder="0" 
		sandbox="allow-same-origin allow-scripts allow-popups allow-forms allow-top-navigation">
		</iframe>';
	
}
	
add_shortcode( 'audiostreamify', 'audiostreamify_sc' );

run_audiostreamify_sc();