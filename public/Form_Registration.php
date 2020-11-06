<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://fr.linkedin.com/in/mohammed-bensaad-developpeur
 * @since      1.0.0
 *
 * @package    Custom_pdf_module
 * @subpackage Custom_pdf_module/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Custom_pdf_module
 * @subpackage Custom_pdf_module/public
 * @author     Mohammed BensaaD <bensaadmucret@gmail.com>
 */
namespace App_public;

class Form_Registration
{
    public function __construct()
    {
        add_shortcode('user_registration', array($this,'user_registration' ));
    }
        

    public function user_registration() { ?>

<?php

 
  $key = get_option("mzb_main_options");
        
      if($key['id_gravityform_inscription']){
          echo  do_shortcode('[gravityform id="'.$key['id_gravityform_inscription'].'" title="false" description="false" ajax="true"]');
      }  


 }
}