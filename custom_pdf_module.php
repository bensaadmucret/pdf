<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * @since             1.0.0
 * @package           Custom_pdf_module
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Pdf Module
 * Plugin URI:        https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mohammed BensaaD
 * Author URI:        https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom_pdf_module
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOM_PDF_MODULE_VERSION', '1.0.0' );
require plugin_dir_path( __FILE__ ) . './vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
use App_admin\Custom_Fields;
use App_public\Button_shortcode;
use App_public\Form_Registration;
use App_admin\Custom_pdf_module_Manager;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_active( 'dashboard/dashboard.php' ) ):

    new Custom_pdf_module_Manager();

else:

   dd('The plugin is NOT activated'); 

endif;
new Button_shortcode();
new Custom_Fields();
new Form_Registration();



   function me_post_pdf(){
    if (isset($_POST['me_post_pdf'])):
        if(wp_verify_nonce($_POST['_nonce'], 'submit-user')):
			//global $wp;
			//$current_url = home_url(add_query_arg(array(),$wp->request));
			$html = file_get_contents( plugin_dir_path( __FILE__ ) . './public/partials/template.php');
			
			//$html = file_get_contents($current_url);
			
			$options = new Options();
			$options->set('A4','potrait');
			$options->set('enable_css_float',true);
			$options->set('isHtml5ParserEnabled', true);
		
			$dompdf = new DOMPDF($options);
			$dompdf->loadHtml($html);
		
			$dompdf->render();
		
			$dompdf->stream('Devis.pdf');

		endif;
        
	endif;

}

add_action('init', 'me_post_pdf');

   


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom_pdf_module-activator.php
 */
function activate_custom_pdf_module() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom_pdf_module-activator.php';
	Custom_pdf_module_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom_pdf_module-deactivator.php
 */
function deactivate_custom_pdf_module() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom_pdf_module-deactivator.php';
	Custom_pdf_module_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_pdf_module' );
register_deactivation_hook( __FILE__, 'deactivate_custom_pdf_module' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom_pdf_module.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_pdf_module() {

	$plugin = new Custom_pdf_module();
	$plugin->run();

}
run_custom_pdf_module();
