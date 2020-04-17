<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Pizzakit
 * Plugin URI:        https://github.com/AgileGroup9/Pizzakit-wordpress-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.0.1
 * Author:            AgileGroup9
 * Author URI:        https://github.com/AgileGroup9/
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 */
define('PIZZAKIT_VERSION', '0.0.1');

/**
 * The code that runs during plugin activation.
 */
function activate_pizzakit() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-pizzakit-activator.php';
	Pizzakit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_pizzakit() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-pizzakit-deactivator.php';
	Pizzakit_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_pizzakit');
register_deactivation_hook(__FILE__, 'deactivate_pizzakit');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-pizzakit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_pizzakit() {

	$plugin = new Pizzakit();
	$plugin->run();

}
run_pizzakit();
