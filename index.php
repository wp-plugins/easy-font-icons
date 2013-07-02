<?php
/*
Plugin Name: Easy Font Icons
Plugin URI: http://mageemedia.net
Description: Choose from 100s of font icons to add to your posts, pages, or custom post types.
Version: 1.0.12
Author: Leon Magee
Author URI: http://mageemedia.net
License: GPL3
------------------------------------------------------------------------
Copyright 2013 Magee Media
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
// ***** INCLUDE FILES *****

    require_once( dirname( __FILE__ ) . '/lib/mm-easy-font-icons.php' );
    
    //require_once( dirname( __FILE__ ) . '/lib/mm-efi-helper-functions.php' );
    
    require_once( dirname( __FILE__ ) . '/lib/mm-efi-enqueue-scripts.php' );
    

    
    
// ***** ACTIONS *****

    
    add_action( 'admin_menu', 'mm_easy_font_icons::mm_efi_admin_page_main' );
    
    add_action( 'add_meta_boxes', 'mm_easy_font_icons::mm_efi_add_meta_box' );

    add_action( 'save_post', 'mm_easy_font_icons::mm_efi_update_font_icon' );

    add_action( 'the_post', 'mm_easy_font_icons::mm_efi_determine_output' );
    
    add_action( 'admin_init', 'mm_easy_font_icons::mm_efi_main_settings_hook' );
    
    add_action( 'init', 'mm_easy_font_icons::mm_efi_set_variables', 10000 );
    
        
    add_action( 'admin_init', 'mm_efi_enqueue_scripts::mm_efi_scripts_styles' );

    add_action( 'wp_enqueue_scripts', 'mm_efi_enqueue_scripts::mm_efi_font_styles' );