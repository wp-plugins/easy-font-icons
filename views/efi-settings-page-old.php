<?php
/**
 * Output EFI Settings Page
 * 
 * @package EasyFontIcons
 * 
 * @author Leon Magee
 * @version 1.0.0
 * @since 1.0.0
 * 
 */

?>

<div class="wrap">

    <?php screen_icon(); ?>

    <h2>Easy Font Icons</h2>
    
    <h3>Default Settings</h3>
    
    <table class="form-table">
        
        <?php $color = esc_attr( get_option( 'mm_efi_color' ) ); 
        
        $font_size = intval( get_option( 'mm_efi_font_size' ) ); ?>
        
        <form method="post" action="">
        
            <?php wp_nonce_field( 'mm_efi_update_settings' ); ?>
        
            <tr valign="top">

                <th scope="row"><label>Color: </label></th>

                <td><input type="text" name="mm-efi-color" value="<?php echo $color; ?>" /></td>

            </tr>
            
            <tr valign="top">

                <th scope="row"><label>Font Size: </label></th>

                <td><input type="text" name="mm-efi-font-size" value="<?php echo $font_size; ?>" /></td>

            </tr>
            
            <tr>
                
                <th scope="row"><input class="button-primary" type="submit" value="Update" /></th>

                <td></td>
             
            </tr>
            
        </form>
        
    </table>
  
</div><!-- div wrap -->
    

                    
