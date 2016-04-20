<?php

/**
 *
 * @link              http://adambradford.codes
 * @since             1.0.0
 * @package           Display_Screens
 *
 * @wordpress-plugin
 * Plugin Name:       Display Screens
 * Plugin URI:        https://github.com/admbradford/display-screen-wp
 * Description:       A plugin for simple screen management
 * Version:           1.0.0
 * Author:            Adam Bradford
 * Author URI:        http://adambradford.codes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       display-screens
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-display-screens.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_displays() {

	$plugin = new DisplayScreens();

}
run_displays();
