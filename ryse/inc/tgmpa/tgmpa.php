<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Undocumented function
 */
function ryse_register_required_plugins() {
	$url = get_option('radiant_purchase_url');
	$purchase_code_val = get_option('radiant_purchasecode');
	$user_name_val = get_option('radiant_user_name');

	$plugins = array(

		   // Redux Framework.
		array(
			'name'     => esc_html__( 'Redux Framework', 'ryse' ),
			'slug'     => 'redux-framework',
			'required' => true,
		),
		// Elementor.
		array(
			'name'     => esc_html__( 'Elementor', 'ryse' ),
			'slug'     => 'elementor',
			'required' => true,
		),
		// Contact Form 7.
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => true,
		),

		// Contact Form7 Widget For Elementor Page Builder.
		array(
			'name'     => 'Contact Form7 Widget',
			'slug'     => 'cf7-widget-elementor',
			'required' => true,
		),

		// Contact Form7 Widget For Elementor Page Builder.
		array(
			'name'     => 'AnyWhere Elementor',
			'slug'     => 'anywhere-elementor',
			'required' => true,
		),

		// Slider Revolution.
		array(
			'name'     => esc_html__( 'Slider Revolution', 'ryse' ),
			'slug'     => 'revslider',
			'source'   => 'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/revslider--4cLsaCdwDzB4jxfMDiKyn8w6aaGoxSAuARhrNfm6.zip',
			'required' => true,
			//'version'  => '6.1.5',
		),
				
		// RadiantThemes Custom Post Type.
		array(
			'name'     => 'RadiantThemes Custom Post Type',
			'slug'     => 'radiantthemes-custom-post-type',
			'source'   => 'https://templatelibrary.radiantthemes.com/ryse-plugin/?id=1&url='.$url.'&userNameVal='.$user_name_val.'&purchaseCodeVal='.$purchase_code_val,
			'required' => true,
			'version'  => '4.0',
			
		),
		// RadiantThemes Addons.
		array(
			'name'     => 'RadiantThemes Addons',
			'slug'     => 'radiantthemes-addons',
			'source'   => 'https://templatelibrary.radiantthemes.com/ryse-plugin/?id=2&url='.$url.'&userNameVal='.$user_name_val.'&purchaseCodeVal='.$purchase_code_val,
			'required' => true,
			'version'  => '4.0',
		
		),
		// WooCommerce.
		array(
			'name'     => esc_html__( 'WooCommerce', 'ryse' ),
			'slug'     => 'woocommerce',
			'required' => true,
		),
		// Unyson.
		
		array(
			'name'     => esc_html__( 'Unyson', 'ryse' ),
			'slug'     => 'unyson',
			'source'   => 'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/unyson.zip',
			'required' => true,
		),

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'ryse_register_required_plugins' );
