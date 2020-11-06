<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * @since      1.0.0
 *
 * @package    Custom_pdf_module
 * @subpackage Custom_pdf_module/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_pdf_module
 * @subpackage Custom_pdf_module/admin
 * @author     Mohammed BensaaD <bensaadmucret@gmail.com>
 */

namespace App_admin;

class Custom_pdf_module_Manager{
  public function __construct(){
     
    add_action('cmb2_admin_init', [$this, 'register_my_admin_page_pdf']);
  }
 
function register_my_admin_page_pdf() {
  /**
   * Registers options page menu item and form.
   */
  $cmb_options = new_cmb2_box( array(
  'id'           => 'mzb_pdf_option_metabox',
  'title'        => esc_html__( 'PDF Manager', 'mzb_pdf' ),
  'object_types' => array( 'options-page' ),
  'option_key'   => 'mzb_pdf_options',
    
  // 'menu_title'      => esc_html__( 'Options', 'myprefix' ), // Falls back to 'title' (above).
   'parent_slug'     => 'mzb_pdf_options', // Make options page a submenu item of the themes menu.
   //'capability'      => 'manage_options', // Cap required to view options-page.
  // 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
   //'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
  // 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
  // 'save_button'     => esc_html__( 'Save Theme Options', 'myprefix' ), // The text for the options-page save button. Defaults to 'Save'.
  ) );

 
  $cmb_options->add_field( array(
    'name'    => 'Header PDF',
    'desc'    => 'Upload an image ou une URL.',
    'id'      => 'mzb_image',
    'type'    => 'file',
    // Optional:
    'options' => array(
    'url' => false, // Hide the text input for the url
    ),
    'text'    => array(
    'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
    ),
    // query_args are passed to wp.media's library query.
    'query_args' => array(
    'type' => 'application/pdf', // Make library only display PDFs.
    // Or only allow gif, jpg, or png images
     'type' => array(
       'image/gif',
       'image/jpeg',
       'image/png',
     ),
    ),
    'preview_size' => 'large', // Image size to use when previewing in the admin.
  ) );
}

}