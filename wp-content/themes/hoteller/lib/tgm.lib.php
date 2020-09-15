<?php
require_once get_template_directory() . "/modules/class-tgm-plugin-activation.php";
add_action( 'tgmpa_register', 'hoteller_require_plugins' );
 
function hoteller_require_plugins() {
 
    $plugins = array(
	    array(
	        'name'      		 => 'Elementor Page Builder',
	        'slug'      		 => 'elementor',
	        'required'  		 => true, 
	    ),
	    array(
	        'name'               => 'Hoteller Theme Elements for Elementor',
	        'slug'      		 => 'hoteller-elementor',
	        'source'             => get_template_directory() . '/lib/plugins/hoteller-elementor.zip',
	        'required'           => true, 
	        'version'            => '2.7',
	    ),
	    array(
	        'name'               => 'One Click Demo Import',
	        'slug'      		 => 'one-click-demo-import',
	        'required'           => true, 
	    ),
	    array(
	        'name'      		 => 'Hotel Booking',
	        'slug'      		 => 'motopress-hotel-booking',
	        'source'             => get_template_directory() . '/lib/plugins/motopress-hotel-booking.zip',
	        'required'  		 => true, 
	        'version'            => '3.7.1',
	    ),
	    array(
	        'name'      		 => 'Hotel Booking Payment Request',
	        'slug'      		 => 'mphb-request-payment',
	        'source'             => get_template_directory() . '/lib/plugins/mphb-request-payment.zip',
	        'required'  		 => true, 
	        'version'            => '1.1.1',
	    ),
	    array(
	        'name'      => 'WooCommerce',
	        'slug'      => 'woocommerce',
	        'required'  => true, 
	    ),
	    array(
	        'name'      		 => 'Hotel Booking WooCommerce Payments',
	        'slug'      		 => 'mphb-woocommerce',
	        'source'             => get_template_directory() . '/lib/plugins/mphb-woocommerce.zip',
	        'required'  		 => true, 
	        'version'            => '1.0.3',
	    ),
	    array(
	        'name'      		 => 'ZM Ajax Login & Register',
	        'slug'      		 => 'zm-ajax-login-register',
	        'required'  		 => true, 
	    ),
	    array(
	        'name'               => 'Envato Market',
	        'slug'               => 'envato-market',
	        'source'             => get_template_directory() . '/lib/plugins/envato-market.zip',
	        'required'           => true, 
	        'version'            => '2.0.3',
	    ),
	    array(
	        'name'      		 => 'Elementor Google Map Extended',
	        'slug'      		 => 'extended-google-map-for-elementor',
	        'required'  		 => true, 
	    ),
	    array(
	        'name'      => 'Contact Form 7',
	        'slug'      => 'contact-form-7',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'MailChimp for WordPress',
	        'slug'      => 'mailchimp-for-wp',
	        'required'  => true, 
	    ),
	);
	
	//If theme demo site add other plugins
	if(HOTELLER_THEMEDEMO)
	{
		$plugins[] = array(
			'name'      => 'EWWW Image Optimizer',
	        'slug'      => 'ewww-image-optimizer',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Disable Comments',
	        'slug'      => 'disable-comments',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Customizer Export/Import',
	        'slug'      => 'customizer-export-import',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Display All Image Sizes',
	        'slug'      => 'display-all-image-sizes',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Easy Theme and Plugin Upgrades',
	        'slug'      => 'easy-theme-and-plugin-upgrades',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Widget Importer & Exporter',
	        'slug'      => 'widget-importer-exporter',
	        'required'  => false, 
		);
		
		$plugins[] = array(
	        'name'      => 'Imsanity',
	        'slug'      => 'imsanity',
	        'required'  => false, 
	    );
		
		$plugins[] = array(
			'name'      => 'Go Live Update URLs',
	        'slug'      => 'go-live-update-urls',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Widget Clone',
	        'slug'      => 'widget-clone',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Duplicate Menu',
	        'slug'      => 'duplicate-menu',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Quick remove menu item',
	        'slug'      => 'quick-remove-menu-item',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'WP-Optimize',
	        'slug'      => 'wp-optimize',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'WP User Avatar',
	        'slug'      => 'wp-user-avatar',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Regenerate post permalinks',
	        'slug'      => 'regenerate-post-permalinks',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Duplicate Post',
	        'slug'      => 'duplicate-post',
	        'required'  => false, 
		);
	}
	
	$config = array(
		'domain'	=> 'hoteller',
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'install-required-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'          => array(
	        'page_title'                      => esc_html__('Install Required Plugins', 'hoteller' ),
	        'menu_title'                      => esc_html__('Install Plugins', 'hoteller' ),
	        'installing'                      => esc_html__('Installing Plugin: %s', 'hoteller' ),
	        'oops'                            => esc_html__('Something went wrong with the plugin API.', 'hoteller' ),
	        'return'                          => esc_html__('Return to Required Plugins Installer', 'hoteller' ),
	        'plugin_activated'                => esc_html__('Plugin activated successfully.', 'hoteller' ),
	        'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'hoteller' ),
	        'nag_type'                        => 'update-nag'
	    )
    );
 
    tgmpa( $plugins, $config );
}
?>