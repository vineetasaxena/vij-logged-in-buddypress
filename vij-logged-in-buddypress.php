<?php



/**

 * The plugin bootstrap file

 *

 * This file is read by WordPress to generate the plugin information in the plugin

 * admin area. This file also includes all of the dependencies used by the plugin,

 * registers the activation and deactivation functions, and defines a function

 * that starts the plugin.

 *

 * @link              http://websitepro.website

 * @since             1.0.0

 * @package           Vij_Logged_In_Buddypress

 *

 * @wordpress-plugin

 * Plugin Name:       Buddypress show logged in user images

 * Plugin URI:        https://github.com/vineetasaxena/vij-logged-in-buddypress

 * Description:       Show the avatars of all logged in users on homepage.

 * Version:           1.0.0

 * Author:            Vijaita Narain

 * Author URI:        http://websitepro.website

 * License:           GPL-2.0+

 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

 * Text Domain:       vij-logged-in-buddypress

 * Domain Path:       /languages

 */



// If this file is called directly, abort.

if ( ! defined( 'WPINC' ) ) {

	die;

}



/**

 * The code that runs during plugin activation.

 * This action is documented in includes/class-vij-logged-in-buddypress-activator.php

 */

function activate_vij_logged_in_buddypress() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vij-logged-in-buddypress-activator.php';

	Vij_Logged_In_Buddypress_Activator::activate();

}



/**

 * The code that runs during plugin deactivation.

 * This action is documented in includes/class-vij-logged-in-buddypress-deactivator.php

 */

function deactivate_vij_logged_in_buddypress() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vij-logged-in-buddypress-deactivator.php';

	Vij_Logged_In_Buddypress_Deactivator::deactivate();

}



register_activation_hook( __FILE__, 'activate_vij_logged_in_buddypress' );

register_deactivation_hook( __FILE__, 'deactivate_vij_logged_in_buddypress' );



/**

 * The core plugin class that is used to define internationalization,

 * admin-specific hooks, and public-facing site hooks.

 */

require plugin_dir_path( __FILE__ ) . 'includes/class-vij-logged-in-buddypress.php';



/**

 * Begins execution of the plugin.

 *

 * Since everything within the plugin is registered via hooks,

 * then kicking off the plugin from this point in the file does

 * not affect the page life cycle.

 *

 * @since    1.0.0

 */

function run_vij_logged_in_buddypress() {



	

	function wp_first_shortcode(){


	global $wpdb;

	
	$time = date('Y-m-d H:i:s', time() - ( 60 * 60) );  // minutes * seconds

	$a_number = $wpdb->get_results( "SELECT user_id FROM wp_bp_activity WHERE component = 'members' AND date_recorded > '$time' ", ARRAY_A);
	if(sizeof($a_number)>0){
		echo "<center><h2>Logged In Members</center></h2>";
	
		for($x=0;$x<sizeof($a_number);$x++)
		{
			//get users information based on the user id
			$user_info = get_userdata( $a_number[$x]['user_id'] );

			// Get the username
			 $username = $user_info->user_login;
			 //display user avatar
			$avatars.="<div class='col-md-1'><a href='".home_url() . "/members/" . $username . "/profile/'>".get_avatar( $a_number[$x]['user_id'], 128, null, null, array('class' => array('img-responsive', 'img-circle') ) )."</a></div>";
	
		}
		$avatars.="</div>";
		echo $avatars;
	}
}

add_shortcode('first', 'wp_first_shortcode');

	
//




}

run_vij_logged_in_buddypress();

