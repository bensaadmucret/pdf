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
use Dompdf\Dompdf;
class Button_shortcode{
  
  public function __construct(){
    add_shortcode('buttom_pdf', [$this,'button_shortcode']);
    add_action('wp_footer', [$this,'add_ajaxex_in_footer']);
    
}
  public function button_shortcode(){
    $nonce = wp_create_nonce('submit-user');
return <<<EOT
   
  <article id="text-39" class="btn btn-button">         
     <div class="row">
    </div>
   </article>
   <form method="POST">
  <input type="submit" value="click me">
  <input type="hidden" name="me_post_pdf" value="submitted">
  <input type="hidden" name="_nonce" value="{$nonce}">
  </form>
EOT;

  }
  
  
    
    
}


   