<?php
/**
 * Require Redux Files
 *
 * @package ryse
 */



// Load the theme/plugin options.
if ( file_exists( get_parent_theme_file_path( '/inc/redux-framework/options-init.php' ) ) ) {
	require_once get_parent_theme_file_path( '/inc/redux-framework/options-init.php' );
}