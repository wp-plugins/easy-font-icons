<?php
/**
 * Enqueue Scripts
 *
 */

class mm_efi_enqueue_scripts {
    
    // admin styles and scripts
   
    public static function mm_efi_scripts_styles() {
       
      
       wp_register_style( 'mm-efi-stylesheet', plugins_url( 'easy-font-icons/css/admin.css' ) );
       
       wp_enqueue_style( 'mm-efi-stylesheet' );
       
       
       wp_register_style( 'mm-efi-font-styles', plugins_url( 'easy-font-icons/css/font-styles.css' ) );
       
       wp_enqueue_style( 'mm-efi-font-styles' );
       
       
       wp_register_script( 'mm-efi-javascript', plugins_url( 'easy-font-icons/js/admin.js' ) );
       
       wp_enqueue_script( 'mm-efi-javascript' );
   }
   
   // live site styles
   
   public static function mm_efi_font_styles() {
       
       wp_register_style( 'mm-efi-font-styles-live', plugins_url( 'easy-font-icons/css/font-styles.css' ) );
       
       wp_enqueue_style( 'mm-efi-font-styles-live' );   
   }
    
}