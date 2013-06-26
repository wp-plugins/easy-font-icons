/**
 * Admin Control Panel JavaScripts
 * 
 * @author Leon Magee
 * @version 1.0.0
 * @since 1.0.0
 */

var $ = jQuery.noConflict();

$( function() {
    
    
    $( '.efi-icons .font-icon' ).click( function() {

            $(this).parents().find( '.selected' ).removeClass( 'selected' );

            $(this).addClass( 'selected' );

            $( 'input[type=hidden].current-icon' ).val( $(this).html() );
    } );



    $( 'select.efi-font-family' ).change( function() {

            $( 'div#mm_efi_js_target' ).attr( 'class', $(this).val() );
            
            $( '.efi-icons .selected' ).removeClass( 'selected' );

    } );
    
    // remove select outline
    
    $( 'select' ).change( function() {
        
        $(this).blur();
    });

        	
});