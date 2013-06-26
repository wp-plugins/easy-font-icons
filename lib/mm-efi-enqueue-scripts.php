<?php
/*
Plugin Name: Easy Font Icons
Plugin URI: http://mageemedia.net
Description: Easily choose from 100s of icons to add to your posts or pages
Version: 1.0.0
Author: Leon Magee
Author URI: http://mageemedia.net
License: GPL3

Copyright 2013 Leon Magee  (email : leonmagee@hotmail.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



class mm_efi_enqueue_scripts {
    
    
    
// ***** STYLES AND SCRIPTS *****
   
    public static function mm_efi_scripts_styles() {
       
      
       wp_register_style( 'mm-efi-stylesheet', plugins_url( 'easy-font-icons/css/admin.css' ) );
       
       wp_enqueue_style( 'mm-efi-stylesheet' );
       
       
       wp_register_style( 'mm-efi-font-styles', plugins_url( 'easy-font-icons/css/font-styles.css' ) );
       
       wp_enqueue_style( 'mm-efi-font-styles' );
       
       
       wp_register_script( 'mm-efi-javascript', plugins_url( 'easy-font-icons/js/admin.js' ) );
       
       wp_enqueue_script( 'mm-efi-javascript' );
   }
   
   public static function mm_efi_font_styles() {
       
       wp_register_style( 'mm-efi-font-styles-live', plugins_url( 'easy-font-icons/css/font-styles.css' ) );
       
       wp_enqueue_style( 'mm-efi-font-styles-live' );   
   }
    
}