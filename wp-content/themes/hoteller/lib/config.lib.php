<?php
//Setup theme constant and default data
$theme_obj = wp_get_theme('hoteller');

define("HOTELLER_THEMENAME", $theme_obj['Name']);
if (!defined('HOTELLER_THEMEDEMO'))
{
	define("HOTELLER_THEMEDEMO", false);
}
define("HOTELLER_THEMEDEMOIG", 'kinfolklifestyle');
define("HOTELLER_SHORTNAME", "pp");
define("HOTELLER_THEMEVERSION", $theme_obj['Version']);
define("HOTELLER_THEMEDEMOURL", $theme_obj['ThemeURI']);

if (!defined('HOTELLER_THEMEDATEFORMAT'))
{
	define("HOTELLER_THEMEDATEFORMAT", get_option('date_format'));
}

if (!defined('HOTELLER_THEMETIMEFORMAT'))
{
	define("HOTELLER_THEMETIMEFORMAT", get_option('time_format'));
}

define("ENVATOITEMID", 22316029);

//Get default WP uploads folder
$wp_upload_arr = wp_upload_dir();
define("HOTELLER_THEMEUPLOAD", $wp_upload_arr['basedir']."/".strtolower(sanitize_title(HOTELLER_THEMENAME))."/");
define("HOTELLER_THEMEUPLOADURL", $wp_upload_arr['baseurl']."/".strtolower(sanitize_title(HOTELLER_THEMENAME))."/");

if(!is_dir(HOTELLER_THEMEUPLOAD))
{
	wp_mkdir_p(HOTELLER_THEMEUPLOAD);
}

/**
*  Begin Global variables functions
*/

//Get default WordPress post variable
function hoteller_get_wp_post() {
	global $post;
	return $post;
}

//Get default WordPress file system variable
function hoteller_get_wp_filesystem() {
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	WP_Filesystem();
	global $wp_filesystem;
	return $wp_filesystem;
}

//Get default WordPress wprewrite variable
function hoteller_get_wp_rewrite() {
	global $wp_rewrite;
	return $wp_rewrite;
}

//Get default WordPress wpdb variable
function hoteller_get_wpdb() {
	global $wpdb;
	return $wpdb;
}

//Get default WordPress wp_query variable
function hoteller_get_wp_query() {
	global $wp_query;
	return $wp_query;
}

//Get default WordPress customize variable
function hoteller_get_wp_customize() {
	global $wp_customize;
	return $wp_customize;
}

//Get default WordPress current screen variable
function hoteller_get_current_screen() {
	global $current_screen;
	return $current_screen;
}

//Get default WordPress paged variable
function hoteller_get_paged() {
	global $paged;
	return $paged;
}

//Get default WordPress registered widgets variable
function hoteller_get_registered_widget_controls() {
	global $wp_registered_widget_controls;
	return $wp_registered_widget_controls;
}

//Get default WordPress registered sidebars variable
function hoteller_get_registered_sidebars() {
	global $wp_registered_sidebars;
	return $wp_registered_sidebars;
}

//Get default Woocommerce variable
function hoteller_get_woocommerce() {
	global $woocommerce;
	return $woocommerce;
}

//Get all google font usages in customizer
function hoteller_get_google_fonts() {
	$hoteller_google_fonts = array('tg_body_font', 'tg_header_font', 'tg_menu_font', 'tg_sidemenu_font', 'tg_sidebar_title_font', 'tg_button_font');
	
	global $hoteller_google_fonts;
	return $hoteller_google_fonts;
}

//Get menu transparent variable
function hoteller_get_page_menu_transparent() {
	global $hoteller_page_menu_transparent;
	return $hoteller_page_menu_transparent;
}

//Set menu transparent variable
function hoteller_set_page_menu_transparent($new_value = '') {
	global $hoteller_page_menu_transparent;
	$hoteller_page_menu_transparent = $new_value;
}

//Get no header checker variable
function hoteller_get_is_no_header() {
	global $hoteller_is_no_header;
	return $hoteller_is_no_header;
}

//Get deafult theme screen CSS class
function hoteller_get_screen_class() {
	global $hoteller_screen_class;
	return $hoteller_screen_class;
}

//Set deafult theme screen CSS class
function hoteller_set_screen_class($new_value = '') {
	global $hoteller_screen_class;
	$hoteller_screen_class = $new_value;
}

//Get theme homepage style
function hoteller_get_homepage_style() {
	global $hoteller_homepage_style;
	return $hoteller_homepage_style;
}

//Set theme homepage style
function hoteller_set_homepage_style($new_value = '') {
	global $hoteller_homepage_style;
	$hoteller_homepage_style = $new_value;
}

//Get page gallery ID
function hoteller_get_page_gallery_id() {
	global $hoteller_page_gallery_id;
	return $hoteller_page_gallery_id;
}

//Get default theme options variable
function hoteller_get_options() {
	global $hoteller_options;
	return $hoteller_options;
}

//Set default theme options variable
function hoteller_set_options($new_value = '') {
	global $hoteller_options;
	$hoteller_options = $new_value;
}

//Get top bar setting
function hoteller_get_topbar() {
	global $hoteller_topbar;
	return $hoteller_topbar;
}

//Set top bar setting
function hoteller_set_topbar($new_value = '') {
	global $hoteller_topbar;
	$hoteller_topbar = $new_value;
}

//Get is hide title option
function hoteller_get_hide_title() {
	global $hoteller_hide_title;
	return $hoteller_hide_title;
}

//Set is hide title option
function hoteller_set_hide_title($new_value = '') {
	global $hoteller_hide_title;
	$hoteller_hide_title = $new_value;
}

//Get theme page content CSS class
function hoteller_get_page_content_class() {
	global $hoteller_page_content_class;
	return $hoteller_page_content_class;
}

//Set theme page content CSS class
function hoteller_set_page_content_class($new_value = '') {
	global $hoteller_page_content_class;
	$hoteller_page_content_class = $new_value;
}

//Get Kirki global variable
function hoteller_get_kirki() {
	global $kirki;
	return $kirki;
}

//Get admin theme global variable
function hoteller_get_wp_admin_css_colors() {
	global $_wp_admin_css_colors;
	return $_wp_admin_css_colors;
}

//Get theme plugins
function hoteller_get_plugins() {
	global $hoteller_tgm_plugins;
	return $hoteller_tgm_plugins;
}

//Set theme plugins
function hoteller_set_plugins($new_value = '') {
	global $hoteller_tgm_plugins;
	$hoteller_tgm_plugins = $new_value;
}

//Get page custom fields values
function hoteller_get_page_postmetas() {
	//Get all sidebars
	$theme_sidebar = array(
		'' => '',
		'Page Sidebar' => 'Page Sidebar', 
		'Contact Sidebar' => 'Contact Sidebar', 
		'Blog Sidebar' => 'Blog Sidebar',
	);
	
	$dynamic_sidebar = get_option('pp_sidebar');
	
	if(!empty($dynamic_sidebar))
	{
		foreach($dynamic_sidebar as $sidebar)
		{
			$theme_sidebar[$sidebar] = $sidebar;
		}
	}
	
	/*
		Get gallery list
	*/
	$args = array(
	    'numberposts' => -1,
	    'post_type' => array('galleries'),
	);
	
	$galleries_arr = get_posts($args);
	$galleries_select = array();
	$galleries_select[0] = '';
	
	foreach($galleries_arr as $gallery)
	{
		$galleries_select[$gallery->ID] = $gallery->post_title;
	}
	
	/*
		Get page templates list
	*/
	if(function_exists('get_page_templates'))
	{
		$page_templates = get_page_templates();
		$page_templates_select = array();
		$page_key = 1;
		
		foreach ($page_templates as $template_name => $template_filename) 
		{
			$page_templates_select[$template_name] = get_template_directory_uri()."/functions/images/page/".basename($template_filename, '.php').".png";
			$page_key++;
		}
	}
	else
	{
		$page_templates_select = array();
	}
	
	/*
		Get all menus available
	*/
	$menus = get_terms('nav_menu');
	$menus_select = array(
		 '' => 'Default Menu'
	);
	foreach($menus as $each_menu)
	{
		$menus_select[$each_menu->slug] = $each_menu->name;
	}
	
	/*
		Get all menus available
	*/
	$menus = get_terms('nav_menu');
	$menus_select = array(
		 '' => 'Default Menu'
	);
	foreach($menus as $each_menu)
	{
		$menus_select[$each_menu->slug] = $each_menu->name;
	}
	
	//Get all footer posts
	$args = array(
		 'post_type'     => 'footer',
		 'post_status'   => array( 'publish' ),
		 'numberposts'   => -1,
		 'orderby'       => 'title',
		 'order'         => 'ASC',
		 'suppress_filters'   => false
	);
	$footers = get_posts($args);
	$tg_footers_select = array();
	$tg_footers_select[''] = '';
	
	if(!empty($footers))
	{
		foreach ($footers as $footer)
		{
			$tg_footers_select[$footer->ID] = $footer->post_title;
		}
	}
	
	//Get all header posts
	$args = array(
		 'post_type'     => 'header',
		 'post_status'   => array( 'publish' ),
		 'numberposts'   => -1,
		 'orderby'       => 'title',
		 'order'         => 'ASC',
		 'suppress_filters'   => false
	);
	$headers = get_posts($args);
	$tg_headers_select = array();
	$tg_headers_select[''] = '';
	
	if(!empty($headers))
	{
		foreach ($headers as $header)
		{
			$tg_headers_select[$header->ID] = $header->post_title;
		}
	}
	
	$hoteller_page_postmetas = array();
	
	$hoteller_page_postmetas_extended = 
		array (
			/*
				Begin Page custom fields
			*/
			array("section" => esc_html__('Page Title', 'hoteller'), "id" => "page_menu_transparent", "type" => "checkbox", "title" => esc_html__('Make Menu Transparent', 'hoteller' ), "description" => esc_html__('Check this option if you want to display main menu in transparent', 'hoteller' )),
			
			array("section" => esc_html__('Page Title', 'hoteller' ), "id" => "page_show_title", "type" => "checkbox", "title" => esc_html__('Hide Default Page Header', 'hoteller' ), "description" => esc_html__('Check this option if you want to hide default page header', 'hoteller' )),
			
			array("section" => esc_html__('Page Tagline', 'hoteller' ), "id" => "page_tagline", "type" => "textarea", "title" => esc_html__('Page Tagline (Optional)', 'hoteller' ), "description" => esc_html__('Enter page tagline. It will displays under page title (*Note: HTML code also support)', 'hoteller' )),
			
			array("section" => esc_html__('Layout', 'hoteller'), "id" => "page_boxed_layout", "type" => "checkbox", "title" => esc_html__('Boxed Layout', 'hoteller' ), "description" => esc_html__('Check this option if you want to enable boxed layout', 'hoteller' )),
			
			array("section" => esc_html__('Select Header (Optional)', 'hoteller' ), "id" => "page_header", "type" => "select", "title" => esc_html__('Page Header (Optional)', 'hoteller' ), "description" => esc_html__('Select this page header content if you want to display header content other than default one', 'hoteller' ), "items" => $tg_headers_select),
			
			array("section" => esc_html__('Select Sticky Header (Optional)', 'hoteller' ), "id" => "page_sticky_header", "type" => "select", "title" => esc_html__('Page Sticky Header (Optional)', 'hoteller' ), "description" => esc_html__('Select this page sticky header content if you want to display header content other than default one', 'hoteller' ), "items" => $tg_headers_select),
			
			array("section" => esc_html__('Select Transparent Header (Optional)', 'hoteller' ), "id" => "page_transparent_header", "type" => "select", "title" => esc_html__('Page Transparent Header (Optional)', 'hoteller' ), "description" => esc_html__('Select this page transparent header content if you want to display transparent header content other than default one', 'hoteller' ), "items" => $tg_headers_select),
			
			array("section" => esc_html__('Select Sidebar (Optional)', 'hoteller' ), "id" => "page_sidebar", "type" => "select", "title" => esc_html__('Page Sidebar (Optional)', 'hoteller' ), "description" => esc_html__('Select this page sidebar to display. To use this option, you have to select page template end with "Sidebar" only', 'hoteller' ), "items" => $theme_sidebar),
			
			array("section" => esc_html__('Select Footer (Optional)', 'hoteller' ), "id" => "page_footer", "type" => "select", "title" => esc_html__('Page Footer (Optional)', 'hoteller' ), "description" => esc_html__('Select this page footer content if you want to display footer content other than default one', 'hoteller' ), "items" => $tg_footers_select),
			
			array("section" => esc_html__('Footer', 'hoteller' ), "id" => "page_hide_footer", "type" => "checkbox", "title" => esc_html__('Hide Footer', 'hoteller' ), "description" => esc_html__('Check this option if you want to hide default page footer', 'hoteller' )),
			
			/*array("section" => esc_html__('Select Menu', 'hoteller' ), "id" => "page_menu", "type" => "select", "title" => esc_html__('Page Menu (Optional)', 'hoteller' ), "description" => esc_html__('Select this page menu if you want to display main menu other than default one', 'hoteller' ), "items" => $menus_select),
			
			array("section" => esc_html__('Footer', 'hoteller' ), "id" => "page_show_footer_sidebar", "type" => "checkbox", "title" => esc_html__('Hide Page Footer Sidebar', 'hoteller' ), "description" => esc_html__('Check this option if you want to hide page footer sidebar', 'hoteller' )),
			
			array("section" => esc_html__('Footer', 'hoteller' ), "id" => "page_show_footer_photostream", "type" => "checkbox", "title" => esc_html__('Hide Page Footer Photostream', 'hoteller' ), "description" => esc_html__('Check this option if you want to hide page footer photostream', 'hoteller' )),
			
			array("section" => esc_html__('Footer', 'hoteller' ), "id" => "page_show_copyright", "type" => "checkbox", "title" => esc_html__('Hide Page Copyright', 'hoteller' ), "description" => esc_html__('Check this option if you want to hide page copyright', 'hoteller' )),*/
		);
	
	
	$hoteller_page_postmetas = $hoteller_page_postmetas + $hoteller_page_postmetas_extended;
		
	return $hoteller_page_postmetas;
}

$is_verified_envato_purchase_code = false;

//Get verified purchase code data
$pp_verified_envato_hoteller = get_option("pp_verified_envato_hoteller");
if(!empty($pp_verified_envato_hoteller))
{
	$is_verified_envato_purchase_code = true;
}

$is_imported_elementor_templates_hoteller = false;
$pp_imported_elementor_templates_hoteller = get_option("pp_imported_elementor_templates_hoteller");
if(!empty($pp_imported_elementor_templates_hoteller))
{
	$is_imported_elementor_templates_hoteller = true;
}

$pp_just_imported = get_option('pp_just_imported');

if(!empty($pp_just_imported))
{
	//Auto set permalink to post name
	add_action( 'init', function() {
	    $wp_rewrite = hoteller_get_wp_rewrite();
	    $wp_rewrite->set_permalink_structure( '/%postname%/' );
	    
	    //Refresh rewrite rules
		flush_rewrite_rules();
		
		delete_option('pp_just_imported');
	} );
}
?>