<?php
/**
 * Output EFI Settings Page
 * 
 */

?>

    <div class="wrap">
    
        <?php screen_icon( 'options-general' ); ?>

        <h2>Easy Font Icons</h2>
        
        <form action="options.php" method="post">
            
            <?php settings_fields( 'mm_efi_main_settings_group' ); ?>
            
            <?php do_settings_sections( 'mm-efi-admin-main' ); ?>
            
            <br />
            
            <input class="button-primary" name="submit" type="submit" value="Update Settings" />
            
        </form>
    
    </div>