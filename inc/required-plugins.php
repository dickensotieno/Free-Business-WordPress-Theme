<?php
 
require_once get_template_directory() . '/inc/plugin-activation.php';

add_action( 'tgmpa_register', 'jadonai_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function jadonai_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array( 

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Page Builder: KingComposer',
			'slug'      => 'kingcomposer',
			'required'  => false,
		),
		array(
			'name'      => 'Testimonials Creator',
			'slug'      => 'testimonials-creator',
			'required'  => false,
		),
 

	);

 
	$config = array(
		'id'           => 'jadonai',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                   
		'dismiss_msg'  => '',                     
		'is_automatic' => false,                   
		'message'      => '',                     
	);

	tgmpa( $plugins, $config );
}
