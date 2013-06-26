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
    
        <?php screen_icon( 'options-general' ); ?>

        <h2>Easy Font Icons</h2>
        
        <?php //settings_errors(); now this isn't necessary???'?>
        
        <form action="options.php" method="post">
            
            <?php settings_fields( 'mm_efi_main_settings_group' ); ?>
            
            <?php do_settings_sections( 'mm-efi-admin-main' ); ?>
            
            <br />
            
            <input class="button-primary" name="submit" type="submit" value="Update Settings" />
            
        </form>
    
    </div>


<?php


/*
 * I need to get these options to do something, to input them into the css somehow? 
 * 
 * For the post types, this should be fairly easy, but I need to write a script that will just pick
 * out the ones that are selected, so first output all possible post types, and then any that are in 
 * the array you will then add to another array for post activation...
 * 
 */

echo "<br /><br />";

echo "<br /><br />";



$array1 = array( '23', '6', '33' );

$array2 = array( '34', '7', '6' );

$array3 = array_intersect( $array1, $array2 );

print_r( $array3 );








echo "<br /><br />";

echo "<br /><br />";

$options_echo = get_option( 'mm_efi_main_settings' );

foreach ( $options_echo as $key => $option ) {
    
    echo $key . " : " . $option . "<br /><br />";

}




?>