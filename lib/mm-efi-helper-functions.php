<?php
/**
 * Helper functions
 *
 *
 */


class mm_efi_helper_functions {


    public static function style_tester() {

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

}
