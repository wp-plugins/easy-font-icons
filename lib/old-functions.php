<?php
/**
 * Helper functions for this plugin
 * 
 * @package CustomFieldFontIcons
 * 
 * @author Leon Magee
 * @version 1.0.0
 * @since 1.0.0
 * 
 */


function style_tester() {
    
    for ( $x = 1; $x < 7; ++$x ) {
        
        echo "<h" . $x . ">Heading Demo H" . $x . "</h" . $x . ">";
        
    }
    
    echo "<a href='#' class='button-primary'>Button Primary</a><br /><br />";
    
    echo "<a href='#' class='button'>Button</a><br /><br />";
    
    echo "<a href='#' class='button-secondary'>Button Secondary</a><br /><br />";
    
    echo "<a href='#'>Link Regular</a><br /><br />";
    
    echo "<div class='error'>Class Error</div><br /><br />";
    
    echo "<div class='updated'>Class Updated</div><br /><br />";
    
    echo "<div class='tablenav'><div class='tablenav-pages'>
        
    <a href='#' class='page-numbers current'>1</a>
    
    <a href='#' class='page-numbers'>2</a>
    
    <a href='#' class='page-numbers'>3</a>
    
    <a href='#' class='page-numbers next'>&raquo</a>

    </div></div>";
}



function mm_efi_append_content( $content ) {
    
    global $post;
        
        $icon = get_post_meta( $post->ID, '_mm_efi_font_icon', true );
        
        $font = get_post_meta( $post->ID, '_mm_efi_current_font', true );
    
        $div = "<span class='mm-efi-content-icon' id='" . $font . "'>" . $icon . "</span>";
        
        $content_start = substr( $content, 0, 3 );
        
        if ( preg_match( '/<p>/', $content_start ) ) {
            
            $content = substr( $content, 3 );

            return "<p>" . $div . $content; 
        }
        
        return $div . $content; 
}


// tester function

add_filter( 'the_content', 'mm_efi_tester_function' );


function mm_efi_tester_function( $content ) {
    
        global $post;
    
        $icon = get_post_meta( $post->ID, '_mm_efi_font_icon', true );
        
        $font = get_post_meta( $post->ID, '_mm_efi_current_font', true );
        
        $output = get_post_meta( $post->ID, '_mm_efi_output_type', true );
    
    $var_rad = $content 
            . "Icon: " . $icon . "<br />Font: " . $font . "<br />Output: " . $output . "<br />";
    
    
    return $var_rad;
}



function mm_efi_determine_output() {
    
    global $post;
    
    $output_type = get_post_meta( $post->ID, '_mm_efi_output_type', true );
    
    switch ( $output_type ) {
        
        case 'mm-efi-before-title' :
            
            add_filter( 'the_title', 'mm_efi_append_title' );
            
            break;
        
        case  'mm-efi-before-content' :
            
            add_filter( 'the_content', 'mm_efi_append_content' );
            
            break;
        
        case 'mm-efi-outupt-shortcode' :
            
            add_filter( 'init', 'mm_efi_create_shortcode' );
            
            break;
        
        case 'mm-efi-custom' :
            
            add_filter( 'init', 'mm_efi_custom' );
            
            break;   
        
        default:
            
            add_filter( 'init', 'mm_efi_custom' );
            
            break;  
    }  
}
