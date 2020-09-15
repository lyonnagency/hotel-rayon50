<?php
$is_verified_envato_purchase_code = false;

//Get verified purchase code cache
$pp_verified_envato_hoteller = get_option("pp_verified_envato_hoteller");
if(!empty($pp_verified_envato_hoteller))
{
	$is_verified_envato_purchase_code = true;
}

if($is_verified_envato_purchase_code)
{
	function hoteller_import_files() {
	  return array(
	    array(
	      'import_file_name'             => 'Luxury Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo1/1.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo1/1.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo1/1.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo1/1.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/luxury/',
	    ),
	    array(
	      'import_file_name'             => 'City Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo2/2.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo2/2.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo2/2.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo2/2.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/city/',
	    ),
	    array(
	      'import_file_name'             => 'Moutain Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo3/3.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo3/3.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo3/3.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo3/3.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/mountain/',
	    ),
	    array(
	      'import_file_name'             => 'Beach Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo4/4.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo4/4.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo4/4.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo4/4.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/beach/',
	    ),
	    array(
	      'import_file_name'             => 'Apartment Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo5/5.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo5/5.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo5/5.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo5/5.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/apartment/',
	    ),
	    array(
	      'import_file_name'             => 'Cultural Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo6/6.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo6/6.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo6/6.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo6/6.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/cultural/',
	    ),
	    array(
	      'import_file_name'             => 'Boutique Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo7/7.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo7/7.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo7/7.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo7/7.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/sites',
	    ),
	    array(
	      'import_file_name'             => 'Bed & Breakfast Hotel',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo8/8.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo8/8.wie',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'cache/demos/xml/demo8/8.dat',
	      'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'cache/demos/xml/demo8/8.jpg',
	      'preview_url'                  => 'https://themes.themegoods.com/hoteller/sites/bedandbreakfast',
	    ),
	  );
	}
	add_filter( 'pt-ocdi/import_files', 'hoteller_import_files' );
	
	function hoteller_menu_page_removing() {
	    remove_submenu_page( 'themes.php', 'tg-one-click-demo-import' );
	}
	add_action( 'admin_menu', 'hoteller_menu_page_removing', 99 );
	
	function hoteller_before_widgets_import( $selected_import ) {
		//Add demo custom sidebar
		$import_custom_sidebar = array(
			"Reservation Sidebar" => "Reservation Sidebar",
			"Booking Confirmation Sidebar" => "Booking Confirmation Sidebar",
			"Terms Sidebar" => "Terms Sidebar",
		);
		add_option(HOTELLER_SHORTNAME."_sidebar", $import_custom_sidebar);
		
		foreach($import_custom_sidebar as $sidebar)
		{
			if ( function_exists('register_sidebar') )
		    register_sidebar(array('id' => sanitize_title($sidebar), 'name' => $sidebar));
		}
	}
	add_action( 'pt-ocdi/before_widgets_import', 'hoteller_before_widgets_import' );
	
	function hoteller_confirmation_dialog_options ( $options ) {
		return array_merge( $options, array(
			'width'       => 300,
			'dialogClass' => 'wp-dialog',
			'resizable'   => false,
			'height'      => 'auto',
			'modal'       => true,
		) );
	}
	add_filter( 'pt-ocdi/confirmation_dialog_options', 'hoteller_confirmation_dialog_options', 10, 1 );
	
	function hoteller_after_import( $selected_import ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
		
		set_theme_mod( 'nav_menu_locations', array(
				'primary-menu' => $main_menu->term_id,
				'side-menu' => $main_menu->term_id,
				'footer-menu' => $footer_menu->term_id,
			)
		);
		
		// Assign front page
		$front_page_id = get_page_by_title( 'Home' );
		
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		
		//Setup theme custom font
		remove_theme_mod('tg_custom_fonts');
		
		$default_custom_fonts = array(
			0 => array(
				'font_name' => 	'Renner',
					'font_url' 	=>	get_template_directory_uri().'/fonts/renner-medium-webfont.woff',
					'font_fallback'	=> 'sans-serif',
			)
		);
		set_theme_mod( 'tg_custom_fonts', $default_custom_fonts );
		
		//Update all URLs in Elementor pages
		hoteller_elementor_replace_url($selected_import['preview_url'], $newurl);
		
		add_option('pp_just_imported', 1);
	}
	add_action( 'pt-ocdi/after_import', 'hoteller_after_import' );
	
	function hoteller_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'themes.php';
		$default_settings['page_title']  = esc_html__( 'Demo Import' , 'hoteller' );
		$default_settings['menu_title']  = esc_html__( 'Import Demo Content' , 'hoteller' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'tg-one-click-demo-import';
	
		return $default_settings;
	}
	add_filter( 'pt-ocdi/plugin_page_setup', 'hoteller_plugin_page_setup' );
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
}

//Disable Elementor getting started
add_action( 'admin_init', function() {
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );

// Hide License Tab. add to function.php
add_filter( 'mphb_use_edd_license', 'hoteller_mphb_use_edd_license' );
function hoteller_mphb_use_edd_license() {
    return false;
}

add_filter( 'mphbw_use_edd_license', 'hoteller_mphbw_use_edd_license' );
function hoteller_mphbw_use_edd_license() {
    return false;
}

add_filter('mphbrp_use_edd_license','theme_mphbrp_use_edd_license');

function theme_mphbrp_use_edd_license(){
  return false;
}

add_filter( 'mphb_show_extension_links', 'hoteller_mphb_show_extension_links' );
function hoteller_mphb_show_extension_links() {
    return false;
}
	
add_filter( 'the_password_form', 'hoteller_password_form' );
function hoteller_password_form() {
    $post = hoteller_get_wp_post();
    
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    
    $return_html = '<div class="protected-post-header"><h1>' . esc_html($post->post_title) . '</h1></div>';
    $return_html.= '<form class="protected-post-form" action="' .wp_login_url(). '?action=postpass" method="post">';
    $return_html.= esc_html__( "This content is password protected. To view it please enter your password below:", 'hoteller'  ).'<p><input name="post_password" id="' . $label . '" type="password" size="40" /></p>';
    
    $return_html.= '<p><input type="submit" name="Submit" class="button" value="' . esc_html__( "Authenticate", 'hoteller' ) . '" /></p>';
    $return_html.= '</form>';
    
    return $return_html;
}
	
if ( ! function_exists( 'hoteller_theme_kirki_update_url' ) ) {
    function hoteller_theme_kirki_update_url( $config ) {
        $config['url_path'] = get_template_directory_uri() . '/modules/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'hoteller_theme_kirki_update_url' );

add_action( 'customize_register', function( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_Title_Control extends Kirki_Control_Base {
		public $type = 'title';
		public function render_content() { 
			echo esc_html($this->label);
		}
	}
	// Register our custom control with Kirki
	add_filter( 'kirki/control_types', function( $controls ) {
		$controls['title'] = 'Kirki_Controls_Title_Control';
		return $controls;
	} );

} );

add_action( 'admin_footer', 'hoteller__welcome_dashboard_widget' );
function hoteller__welcome_dashboard_widget() {
 // Bail if not viewing the main dashboard page
 if ( get_current_screen()->base !== 'dashboard' ) {
  return;
 }
 ?>

 <div id="hoteller_-welcome-id" class="welcome-panel" style="display: none;">
  <div class="welcome-panel-content">
	  <div style="height:10px"></div>
   <h2>Welcome to <?php echo esc_html(HOTELLER_THEMENAME); ?> Theme</h2>
   
   <div style="height:10px"></div>
   
   <p class="about-description">Welcome to <?php echo esc_html(HOTELLER_THEMENAME); ?> theme. <?php echo esc_html(HOTELLER_THEMENAME); ?> is now installed and ready to use! Please follow below steps to getting started.</p>
   
   <div style="height:20px"></div>
   
   <br style="clear:both;"/>
   
   <?php
	$is_verified_envato_purchase_code = false;

	//Get verified purchase code cache
	$pp_verified_envato_hoteller = get_option("pp_verified_envato_hoteller");
	if(!empty($pp_verified_envato_hoteller))
	{
		$is_verified_envato_purchase_code = true;
	}
	  
	//Display product registration notice
	if(!$is_verified_envato_purchase_code)
	{
	?>	
		<div class="tg_notice">
				<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
				Please visit <a href="<?php echo admin_url("themes.php?page=functions.php#pp_panel_registration"); ?>">Product Registration page</a> and enter a valid Envato Token to import the full <?php echo HOTELLER_THEMENAME; ?>' demos and single pages through Elementor.
		</div>
			
		<div style="height:40px"></div>
	<?php
	}
	?>
   
   <div class="welcome-panel-column-container">
    
    <div class="one_half">
		<div class="step_icon">
			<a href="<?php echo admin_url("themes.php?page=install-required-plugins"); ?>">
				<div class="step_number">Step <div class="int_number">1</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Install the recommended plugins</h3>
			<?php echo esc_html(HOTELLER_THEMENAME); ?> has required and recommended plugins in order to build your website using layouts you saw on our demo site. We recommend you to install recommended plugins.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="<?php echo admin_url("themes.php?page=functions.php#pp_panel_import-demo"); ?>">
				<div class="step_number">Step <div class="int_number">2</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Import the demo data</h3>
			Here you can import the demo data to your site. Doing this will make your site look like the demo site. It helps you to understand better the theme and build something similar to our demo quicker.
		</div>
	</div>
	
	<div class="one_half">
		<div class="step_icon">
			<a href="<?php echo admin_url("customize.php"); ?>">
				<div class="step_number">Step <div class="int_number">3</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Customize theme elements and options</h3>
			Start customize theme's layouts, typography, elements colors using WordPress customize and see your changes in live preview instantly.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="<?php echo admin_url("post-new.php?post_type=page"); ?>">
				<div class="step_number">Step <div class="int_number">4</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Create pages</h3>
			<?php echo esc_html(HOTELLER_THEMENAME); ?> support standard WordPress page option. You can also use Elementor page builder to create and organise page contents.
		</div>
	</div>

	<div class="one_half">
		<div class="step_icon">
			<a href="<?php echo admin_url("nav-menus.php"); ?>">
				<div class="step_number">Step <div class="int_number">5</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Setting up navigation menu</h3>
			Once you imported demo or created your own pages. You can setup navigation menu and assign to your website main header or any other places.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="<?php echo admin_url("options-permalink.php"); ?>">
				<div class="step_number">Step <div class="int_number">6</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Permalinks structure</h3>
			You can change your website permalink structure to better SEO result. Click here to setup WordPress permalink options.
		</div>
	</div>
	
	<br style="clear:both;"/>
    
   </div>
  </div>
 </div>
 <script>
  jQuery(document).ready(function($) {
   	jQuery('#welcome-panel').after($('#hoteller_-welcome-id').show());
  });
 </script>
 
<?php }

//Make widget support shortcode
add_filter('widget_text', 'do_shortcode');

function hoteller_tag_cloud_filter($args = array()) {
   $args['smallest'] = 15;
   $args['largest'] = 15;
   $args['unit'] = 'px';
   return $args;
}

add_filter('widget_tag_cloud_args', 'hoteller_tag_cloud_filter', 90);

//Customise Widget Title Code
add_filter( 'dynamic_sidebar_params', 'hoteller_wrap_widget_titles', 1 );
function hoteller_wrap_widget_titles( array $params ) 
{
	$widget =& $params[0];
	$widget['before_title'] = '<h2 class="widgettitle"><span>';
	$widget['after_title'] = '</span></h2>';
	
	return $params;
}

//Control post excerpt length
function hoteller_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'hoteller_custom_excerpt_length', 200 );


function hoteller_theme_queue_js(){
  if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('get_header', 'hoteller_theme_queue_js');

function hoteller_add_meta_tags() {
    $post = hoteller_get_wp_post();
    
    echo '<meta charset="'.get_bloginfo( 'charset' ).'" />';
    
    //Check if responsive layout is enabled
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
	
	//meta for phone number link on mobile
	echo '<meta name="format-detection" content="telephone=no">';
}
add_action( 'wp_head', 'hoteller_add_meta_tags' , 2 );

add_filter('redirect_canonical','custom_disable_redirect_canonical');
function custom_disable_redirect_canonical($redirect_url) {if (is_paged() && is_singular()) $redirect_url = false; return $redirect_url; }

add_action('elementor/widgets/widgets_registered', 'hoteller_unregister_elementor_widgets');

function hoteller_unregister_elementor_widgets($obj){
	$obj->unregister_widget_type('sidebar');
}

//Disable Elementor getting started
add_action( 'admin_init', function() {
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );

function hoteller_body_class_names($classes) 
{
	$post = hoteller_get_wp_post();
	
	if(isset($post->ID))
	{
		//Check if boxed layout is enable
		$page_boxed_layout = get_post_meta($post->ID, 'page_boxed_layout', true);
		if(!empty($page_boxed_layout))
		{
			$classes[] = esc_attr('tg_boxed');
		}
		
		//Get Page Menu Transparent Option
		$page_menu_transparent = get_post_meta($post->ID, 'page_menu_transparent', true);
		if(!empty($page_menu_transparent))
		{
			$classes[] = esc_attr('tg_menu_transparent');
		}
	}
	
	//if password protected
	if(post_password_required() && is_page())
	{
	   	$classes[] = esc_attr('tg_password_protected');
	}
	
	//Get lightbox color scheme
	$tg_lightbox_color_scheme = get_theme_mod('tg_lightbox_color_scheme', 'black');
	
	if(!empty($tg_lightbox_color_scheme))
	{
		$classes[] = esc_attr('tg_lightbox_'.$tg_lightbox_color_scheme);
	}
	
	//Get sidemenu on desktop class
	$tg_sidemenu = get_theme_mod('tg_sidemenu', false);

	if(empty($tg_sidemenu))
	{
		$classes[] = esc_attr('tg_sidemenu_desktop');
	}
	
	//Get main menu layout
	$tg_menu_layout = hoteller_menu_layout();
	if(!empty($tg_menu_layout))
	{
		$classes[] = esc_attr($tg_menu_layout);
	}

	return $classes;
}

//Now add test class to the filter
add_filter('body_class','hoteller_body_class_names');

add_filter('upload_mimes', 'hoteller_add_custom_upload_mimes');
function hoteller_add_custom_upload_mimes($existing_mimes) 
{
  	$existing_mimes['woff'] = 'application/x-font-woff';
  	return $existing_mimes;
}

add_action('init','hoteller_shop_sorting_remove');
function hoteller_shop_sorting_remove() {
	$tg_shop_filter_sorting = get_theme_mod('tg_shop_filter_sorting');
	
	if(empty($tg_shop_filter_sorting))
	{
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );
		
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	}
}
	
add_action( 'personal_options_update', 'hoteller_save_extra_user_fields' );
add_action( 'edit_user_profile_update', 'hoteller_save_extra_user_fields' );

function hoteller_save_extra_user_fields( $user_id ) 
{
    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }else{

        if(isset($_POST['user_homepage']) && $_POST['user_homepage'] != ""){
            update_user_meta( $user_id, 'user_homepage', $_POST['user_homepage'] );
        }
    }
}

add_action( 'admin_enqueue_scripts', 'hoteller_admin_pointers_header' );

function hoteller_admin_pointers_header() {
   if ( hoteller_admin_pointers_check() ) {
      add_action( 'admin_print_footer_scripts', 'hoteller_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function hoteller_admin_pointers_check() {
   $admin_pointers = hoteller_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] )
         return true;
   }
}

function hoteller_admin_pointers_footer() {
   $admin_pointers = hoteller_admin_pointers();
?>
<script type="text/javascript">
/* <![Ccache[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo esc_js($array['anchor_id']); ?>' ).pointer( {
            content: '<?php echo wp_kses_post($array['content']); ?>',
            position: {
            edge: '<?php echo esc_js($array['edge']); ?>',
            align: '<?php echo esc_js($array['align']); ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo esc_js($pointer); ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function hoteller_admin_pointers() {
   $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
   $prefix = 'hoteller_admin_pointer';
   
   //Page help pointers
   $elementor_builder_content = '<h3>Page Builder</h3>';
   $elementor_builder_content .= '<p>Basically you can use WordPress visual editor to create page content but theme also has another way to create page content. By using Elementor Page Builder, you would be ale to drag&drop each content block without coding knowledge. Click here to enable Elementor.</p>';
   
   $page_options_content = '<h3>Page Options</h3>';
   $page_options_content .= '<p>You can customise various options for this page including menu styling, page templates etc.</p>';
   
   $page_featured_image_content = '<h3>Page Featured Image</h3>';
   $page_featured_image_content .= '<p>Upload or select featured image for this page to displays it as background header.</p>';
   
   //Post help pointers
   $post_options_content = '<h3>Post Options</h3>';
   $post_options_content .= '<p>You can customise various options for this post including its layout and featured content type.</p>';
   
   $post_featured_image_content = '<h3>Post Featured Image (*Required)</h3>';
   $post_featured_image_content .= '<p>Upload or select featured image for this post to displays it as post image on blog, archive, category, tag and search pages.</p>';

   $tg_pointer_arr = array(   
   	  //Page help pointers
      $prefix . '_elementor_builder' => array(
         'content' => $elementor_builder_content,
         'anchor_id' => '#elementor-switch-mode-button .elementor-switch-mode-off',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_elementor_builder', $dismissed ) )
      ),
      
      $prefix . '_page_options' => array(
         'content' => $page_options_content,
         'anchor_id' => 'body.post-type-page #page_option_page_menu_transparent',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_page_options', $dismissed ) )
      ),
      
      $prefix . '_page_featured_image' => array(
         'content' => $page_featured_image_content,
         'anchor_id' => 'body.post-type-page #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_page_featured_image', $dismissed ) )
      ),
      
      //Post help pointers
      $prefix . '_post_options' => array(
         'content' => $post_options_content,
         'anchor_id' => 'body.post-type-post #post_option_post_layout',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_post_options', $dismissed ) )
      ),
      
      $prefix . '_post_featured_image' => array(
         'content' => $post_featured_image_content,
         'anchor_id' => 'body.post-type-post #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_post_featured_image', $dismissed ) )
      ),
   );

   return $tg_pointer_arr;
}

function hoteller_create_admin_menu() {
	global $wp_admin_bar;

	$menu_id = 'hoteller_admin';
	$wp_admin_bar->add_menu(array('id' => $menu_id, 'title' => esc_html__('Theme Setting', 'hoteller'), 'href' => '/wp-admin/themes.php?page=functions.php'));
}
add_action('admin_bar_menu', 'hoteller_create_admin_menu', 2000);
?>