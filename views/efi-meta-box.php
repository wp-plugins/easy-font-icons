<?php
/**
 * Output EFI Meta Box
 * 
 */
?>


<div class="efi-header">

    <table class="widefat">

        <thead>

            <tr>

                <th>Current Icon</th>

                <th>Current CSS Classes</th>

                <th>Change Font Family</th>

                <th>Change Output</th>

                <th>Save Change</th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>

                    <div class="efi-current-font-icon <?php echo $current_font; ?>">

                        <?php echo $current_icon; ?>

                    </div>

                </td>

                <td><?php echo "." . $current_font . "<br /> .efi_font_" . $current_icon . "<br /> .efi_post_num_" . $post->ID; ?></td>

                <td>

                    <select name="mm-efi-current-font" class="efi-font-family">

                        <option value="mm_efi_mpn" <?php selected( $current_font, 'mm_efi_mpn' ); ?> >Modern Pictograms</option>

                        <option value="mm_efi_hir" <?php selected( $current_font, 'mm_efi_hir' ); ?> >Heydings Icons</option>

                        <option value="mm_efi_hcr" <?php selected( $current_font, 'mm_efi_hcr' ); ?> >Heydings Controls</option>

                        <option value="mm_efi_etr" <?php selected( $current_font, 'mm_efi_etr' ); ?> >Entypo Regular</option>

                        <option value="mm_efi_soc" <?php selected( $current_font, 'mm_efi_soc' ); ?> >Socialico</option>
                        
                    </select>

                </td>

                <td>

                    <select name="mm-efi-outupt-type" class="efi-outupt-type">

                        <option value="mm-efi-custom" <?php selected( $efi_outupt_type, 'mm-efi-custom' ); ?> >Normal Output</option>

                        <option value="mm-efi-before-title" <?php selected( $efi_outupt_type, 'mm-efi-before-title' ); ?> >Before Title</option>                       

                    </select>

                </td> 

                <td><input type="submit" value="Update" class="button" /></td>

            </tr>

        </tbody>

    </table>

    <input type="hidden" name="mm-efi-current-icon" value="" class="current-icon" />

</div><!-- efi header -->  

<h2 id="select_new_icon">Select New Icon:</h2>

<div class='efi-icons'>

    <div id="mm_efi_js_target" class='<?php echo $current_font; ?>' >

    <?php 

        foreach ( $super_combo as $icon ) {

            echo "<div class='font-icon'>" . $icon . "</div> ";
        } 

    ?>

    </div>

</div>

<div class='pushbottom'></div>