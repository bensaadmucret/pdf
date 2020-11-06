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

class Custom_Fields{
  public function __construct(){
   
    add_filter('user_contactmethods',  [$this,'mzb_modified_fields']);
    }
  public function mzb_modified_fields( $contact_methods ){

    
    $val = get_option("mzb_main_options");
  
      foreach ( $val['pr_service'] as $value) {
       $contact_methods[ $value['service_name']] =  __( $value['service_name']); 
  
      }
  
     return $contact_methods;
   }
    

}