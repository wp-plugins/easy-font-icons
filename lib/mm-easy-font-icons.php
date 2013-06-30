<?php
/**
 * mm_easy_font_icons class
 *
 *
 */



class mm_easy_font_icons {
    
    
// ***** SET CONSTANTS AND VARIABLES ***** //
        
    public static $mm_efi_post_types;
    
    public static $font_size;
    
    public static $font_unit;
    
    public static $font_color;
    
    
    public static function mm_efi_set_variables() {
        
            $array = get_post_types( array( 'public' => true ) );

            $delete = 'attachment';

            $array_new = array_diff( $array, array( $delete ) );
    
        self::$mm_efi_post_types = $array_new;
        
            $options = get_option( 'mm_efi_main_settings' );
            
            $font_size = $options['font-size'];
            
            $font_unit = $options['font-size-unit'];
            
            $font_color = $options['font-color'];
          
        self::$font_size = $font_size;
        
        self::$font_unit = $font_unit;
        
        self::$font_color = $font_color;
    }
    

// ***** MAIN SETTINGS PAGE *****
   
    
    // add settings page

    public static function mm_efi_admin_page_main() {

        add_options_page( 
                __( 'Easy Font Icons' ),                            // Title
                __( 'Easy Font Icons' ),                            // Menu Name
                'manage_options',                                   // Capabilities
                'efi-settings-main',                                // Slug
                'mm_easy_font_icons::mm_efi_admin_page_callback'    // Output Function
            );      
    }

    public static function mm_efi_admin_page_callback() {

        include( dirname( __FILE__ ) . '/../views/efi-settings-page.php' ); 
    }
    
    
    
    // settings API
    
    public static function mm_efi_main_settings_hook() {
        
        register_setting( 'mm_efi_main_settings_group', 
                          'mm_efi_main_settings', 
                          'mm_easy_font_icons::mm_efi_validate_function' );
   
        
        add_settings_section( 'mm_efi_section_id_1', 
                              __( 'Default Settings' ), 
                              'mm_easy_font_icons::mm_efi_section_text', 
                              'mm-efi-admin-main' );
        
        
        
        add_settings_field( 'mm_efi_font_color_id', 
                             __( 'Font Color' ), 
                            'mm_easy_font_icons::mm_efi_cb_font_color', 
                            'mm-efi-admin-main', 
                            'mm_efi_section_id_1' );  
        
        add_settings_field( 'mm_efi_font_size_id', 
                             __( 'Font Size' ), 
                            'mm_easy_font_icons::mm_efi_cb_font_size', 
                            'mm-efi-admin-main', 
                            'mm_efi_section_id_1' );
    
        add_settings_field( 'mm_efi_font_type_id', 
                             __( 'Font Size Unit' ), 
                            'mm_easy_font_icons::mm_efi_cb_font_size_unit', 
                            'mm-efi-admin-main', 
                            'mm_efi_section_id_1' );
        
        
        // post type checkboxes
           
        foreach ( self::$mm_efi_post_types as $post_type ) {
            
            $cpt_name = ucfirst( $post_type );

            add_settings_field( "mm_efi_id_{$post_type}",
                                __( "Display on {$cpt_name}" ), 
                                "mm_easy_font_icons::mm_efi_cb_post_type", 
                                'mm-efi-admin-main', 
                                'mm_efi_section_id_1',
                                $post_type );
        }  
    }
    
    
    // callback for section header
    
    public static function mm_efi_section_text() {
        
    }
    
    
    // callback for font color
    
    public static function mm_efi_cb_font_color() {
        
        $options = get_option( 'mm_efi_main_settings' );
        
        $key = 'font-color';
        
        if ( isset( $options[$key] ) ) {
        
            $val = $options[$key];
            
        } else {
            
            $val = '';
        }
          
        echo "<input type='text' name='mm_efi_main_settings[{$key}]' value='$val' />";
    }
    
    
    public static function mm_efi_cb_font_size() {
        
        $options = get_option( 'mm_efi_main_settings' );
        
        $key = 'font-size';
        
        if ( isset( $options[$key] ) ) {
        
            $val = $options[$key];
            
        } else {
            
            $val = '';
        }
      
        echo "<input type='text' name='mm_efi_main_settings[{$key}]' value='$val' />";
    }
    
    
    public static function mm_efi_cb_font_size_unit() {
        
        $options = get_option( 'mm_efi_main_settings' );
        
        $key = 'font-size-unit';
        
        if ( isset( $options[$key] ) ) {
        
            $val = $options[$key];
            
        } else {
            
            $val = '';
        }
      
        //echo "<input type='text' name='mm_efi_main_settings[{$key}]' value='$val' />";
        
        echo "<select name='mm_efi_main_settings[{$key}]' />" . 
             "<option" . selected( $val, 'px', false ) . " value='px'>pixels (px)</option>" . 
             "<option" . selected( $val, '%', false ) . " value='%'>percent (%)</option>" .
             "<option" . selected( $val, 'em', false ) . " value='em'>em</option>" . 
             "</select>";
    }
    
    
    public static function mm_efi_cb_post_type( $post_type ) {
        
        $options = get_option( 'mm_efi_main_settings' );
        
        if ( isset( $options[$post_type] ) ) {
        
            $val = $options[$post_type];
            
        } else {
            
            $val = '';
        }
        
        
        echo "<input type='checkbox' " . checked( $val, $post_type, false ) . "name='mm_efi_main_settings[$post_type]' 
            value='$post_type' />";
    }
    

    public static function mm_efi_validate_function( $input ) {
        
        $valid = array();
        
        // validate font color
        
            $key = 'font-color';
            
            $input[$key] = preg_replace( '/[#]/', '', $input[$key] );
        
            $valid[$key] = preg_replace( '/[^a-fA-F0-9]/', '', $input[$key] );

            if ( $valid[$key] != $input[$key] ) {

                add_settings_error(

                    'misc_value_unnecessary', 
                    'special_css_id', 
                    'Hexidecimal Color Value Required'
                );

                $options = get_option( 'mm_efi_main_settings' );

                $valid[$key] = $options[$key];
            }
            
            
        // validate font size
            
            $key = 'font-size';
            
            $valid[$key] = preg_replace( '/[^0-9\.]/', '', $input[$key] );
            
            if ( $valid[$key] != $input[$key] ) {
                
                add_settings_error(

                    'misc_value_unnecessary', 
                    'special_css_id', 
                    'Numeric Values Only'
                );

                $options = get_option( 'mm_efi_main_settings' );

                $valid[$key] = $options[$key];
            }
            
            
            // validate font size unit
            
            $key = 'font-size-unit';
            
            switch( $input[$key] ) {
                
                case ( 'px' ) :
                    
                    $valid[$key] = 'px';
                    
                    break;
                
                case ( '%' ) :
                    
                    $valid[$key] = '%';
                    
                    break;
                
                case ( 'em' ) :
                    
                    $valid[$key] = 'em';
                    
                    break;
                
                default :
                    
                    $valid[$key] = 'px';
                    break;       
            }
            
            
            // validate post types
            
            foreach ( self::$mm_efi_post_types as $post_type ) {

                if ( isset( $input[$post_type] ) ) {

                    $valid[$post_type] = $input[$post_type];
                }
            }
                    
        return $valid;
    }
    
     
// ***** POST META BOXES *****
    

    // add meta box
    
    public static function mm_efi_add_meta_box() {
        
        $get_options = get_option( 'mm_efi_main_settings' );
        
        $post_types = array_intersect( self::$mm_efi_post_types, $get_options );
        
        
        foreach ( $post_types as $post_type ) {      

            add_meta_box( 
                            'easy-font-icons',                              // CSS ID
                            __( 'Easy Font Icons' ),                        // Title
                            'mm_easy_font_icons::mm_efi_create_meta_box',   // Output Function
                            $post_type,                                     // Post, Page, CPT
                            'normal',                                       // Context
                            'high'                                          // Priority
                        );
        
        }
    }
    
    
    // 'add_meta_box' callback function

    public static function mm_efi_create_meta_box( $post ) {
        
        $current_icon = get_post_meta( $post->ID, '_mm_efi_font_icon', true );

        $current_font = 'mm_efi_mpn';

        if ( get_post_meta( $post->ID, '_mm_efi_current_font', true ) != null ) {

            $current_font = get_post_meta( $post->ID, '_mm_efi_current_font', true );
        }

        $efi_outupt_type = get_post_meta( $post->ID, '_mm_efi_output_type', true );


    // Letter ranage, not sure if this is the same for all font libraries... 

        $letters_uc = range( 'A', 'Z' );

        $letters_lc = range( 'a', 'z' );

        $numbers = range( '0', '9' );

        // need to find a way to put all keyboard characters into array
        
        $special_chars = array( '!', '@', '#', '$', '%', '^','&', '*', '(', ')','-','_','=','+','`','~','[',']','{','}','|',';',':','"','<','.','>','/','?' );

        $letters = array_merge( $letters_lc, $letters_uc );

        $letters_numbers = array_merge( $letters, $numbers );

        $super_combo = array_merge( $letters_numbers, $special_chars );

        include( dirname( __FILE__ ) . '/../views/efi-meta-box.php' );
    }

    
    // save metabox changes

    public static function mm_efi_update_font_icon( $post_id ) {
        
        // wp nonce, check admin referer?

        if ( isset( $_POST['mm-efi-current-icon'] ) && $_POST['mm-efi-current-icon'] != '' ) {

            update_post_meta( $post_id, '_mm_efi_font_icon', esc_attr( $_POST['mm-efi-current-icon'] ) );
            
            if ( isset( $_POST['mm-efi-current-font'] ) ) {

                update_post_meta( $post_id, '_mm_efi_current_font', esc_attr( $_POST['mm-efi-current-font'] ) );
            }
            
        }

        if ( isset( $_POST['mm-efi-outupt-type'] ) ) {

            update_post_meta( $post_id, '_mm_efi_output_type', esc_attr( $_POST['mm-efi-outupt-type'] ) );   
        }
    }
    
    
    
    
// ***** OUTPUT TO THEME *****
    
    
    // process output

    public static function mm_efi_determine_output() {
        
        if ( ! is_admin() ) {

            global $post;

            $output_type = get_post_meta( $post->ID, '_mm_efi_output_type', true );

            switch ( $output_type ) {

                case 'mm-efi-before-title' :
                    
                    $x = 1;
                    
                    if ( $x == $x ) {

                        add_filter( 'the_title', 'mm_easy_font_icons::mm_efi_append_title', 10, 2 );
                    }

                    break;

                case 'mm-efi-custom' :

                    add_action( 'init', 'mm_easy_font_icons::mm_efi_custom_icon' );

                    break;   

                default :

                    add_action( 'init', 'mm_easy_font_icons::mm_efi_custom_icon' );

                    break;           
            }
        }  
    }
    
   
    // prepend to post title

    public static function mm_efi_append_title( $title, $id ) {

        global $post;

        if ( ( $title == $post->post_title ) && ( $id == $post->ID ) ) {
            
            $output = get_post_meta( $post->ID, '_mm_efi_output_type', true );
            
            if ( $output == 'mm-efi-before-title' ) {
            
                $size = self::$font_size;

                $unit = self::$font_unit;

                $color = self::$font_color; 

                $icon = get_post_meta( $post->ID, '_mm_efi_font_icon', true );

                $font = get_post_meta( $post->ID, '_mm_efi_current_font', true );



                $div = "<span style='font-size:{$size}{$unit}; font-weight: normal; color:#{$color};' class='" . $font . " efi_font_" . $icon . " efi_post_num_" . $post->ID . "'>" . $icon . "</span>";

                return $div . " ". $title; 
            
            }
        }

        return $title;
    }
    
    public static function mm_efi_custom_icon() {
        
        global $post;

        $size = self::$font_size;

        $unit = self::$font_unit;

        $color = self::$font_color; 
        
        $icon = get_post_meta( $post->ID, '_mm_efi_font_icon', true );

        $font = get_post_meta( $post->ID, '_mm_efi_current_font', true );
    
        echo "<span style='font-size:{$size}{$unit}; color:#{$color};' class='" . $font . " efi_font_" . $icon . " efi_post_num_" . $post->ID . "'>" . $icon . "</span>";
    }
    
}