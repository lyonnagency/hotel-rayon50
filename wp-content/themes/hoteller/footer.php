<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
 
?>
</div>
<?php
	$tg_footer_content = get_theme_mod('tg_footer_content', 'sidebar');
	$tg_footer_sidebar = get_theme_mod('tg_footer_sidebar', 4);
	
	//Check if blank template
	$hoteller_is_no_header = hoteller_get_is_no_header();
	$hoteller_screen_class = hoteller_get_screen_class();
	
	if(!is_bool($hoteller_is_no_header) OR !$hoteller_is_no_header)
	{

	$hoteller_homepage_style = hoteller_get_homepage_style();
?>
<div id="footer_wrapper">
<?php
//if using footer post content
if($tg_footer_content == 'content')
{
	if(is_page())
	{
		$tg_footer_content_default = get_post_meta($post->ID, 'page_footer', true);
		
		if(empty($tg_footer_content_default))
		{
			$tg_footer_content_default = get_theme_mod('tg_footer_content_default');
		}
	}
	else
	{
		$tg_footer_content_default = get_theme_mod('tg_footer_content_default');
	}
	
	//Add Polylang plugin support
	if (function_exists('pll_get_post')) {
		$tg_footer_content_default = pll_get_post($tg_footer_content_default);
	}
	
	//Add WPML plugin support
	if (function_exists('icl_object_id')) {
		$tg_footer_content_default = icl_object_id($tg_footer_content_default, 'page', false, ICL_LANGUAGE_CODE);
	}

	if(!empty($tg_footer_content_default) && class_exists("\\Elementor\\Plugin"))
	{
		echo hoteller_get_elementor_content($tg_footer_content_default);
	}	
}
//end if using footer post content

//if use footer sidebar as content
else if($tg_footer_content == 'sidebar')
{
	//Check if page type
	if(is_page())
	{
		$page_show_footer_sidebar = get_post_meta($post->ID, 'page_show_footer_sidebar', true);
	}
	else
	{
		$page_show_footer_sidebar = 0;
	}
	
    if(!empty($tg_footer_sidebar) && empty($page_show_footer_sidebar))
    {
    	$footer_class = '';
    	
    	switch($tg_footer_sidebar)
    	{
    		case 1:
    			$footer_class = 'one';
    		break;
    		case 2:
    			$footer_class = 'two';
    		break;
    		case 3:
    			$footer_class = 'three';
    		break;
    		case 4:
    			$footer_class = 'four';
    		break;
    		default:
    			$footer_class = 'four';
    		break;
    	}
?>
<div id="footer" class="<?php if(isset($hoteller_homepage_style) && !empty($hoteller_homepage_style)) { echo esc_attr($hoteller_homepage_style); } ?> <?php if(!empty($hoteller_screen_class)) { echo esc_attr($hoteller_screen_class); } ?>">

<?php
    //get custom logo
    $tg_footer_retina_logo = get_theme_mod('tg_footer_retina_logo');

    if(!empty($tg_footer_retina_logo))
    {	
    	//Get image width and height
    	$image_id = hoteller_get_image_id($tg_footer_retina_logo);
    	
    	if(!empty($image_id) && is_numeric($image_id))
    	{
    		$obj_image = wp_get_attachment_image_src($image_id, 'original');
    		
    		$image_width = 0;
	    	$image_height = 0;
	    	
	    	if(isset($obj_image[1]))
	    	{
	    		$image_width = intval($obj_image[1]/2);
	    	}
	    	if(isset($obj_image[2]))
	    	{
	    		$image_height = intval($obj_image[2]/2);
	    	}
    	}
    	else if(!is_numeric($image_id))
	    {
		    $image_width = 1;
	    	$image_height = 1;
	    }
    	else
    	{
	    	$image_width = 0;
	    	$image_height = 0;
    	}
?>
<div id="logo_normal" class="logo_container">
	<div class="logo_align">
	    <a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
	    	<?php
				if($image_width > 1 && $image_height > 1)
				{
			?>
			<img src="<?php echo esc_url($tg_footer_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>"/>
			<?php
				}
				else if($image_width == 1 && $image_height == 1)
				{
			?>
	    	<img src="<?php echo esc_url($tg_footer_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" class="custom_logo_no_info"/>
	    	<?php 
    	    	}
    	    ?>
	    </a>
	</div>
</div>
<?php
    }
?>
	
<?php
	if(is_active_sidebar('Footer Sidebar')) 
	{
?>
	<ul class="sidebar_widget <?php echo esc_attr($footer_class); ?>">
	    <?php dynamic_sidebar('Footer Sidebar'); ?>
	</ul>
<?php
	}
?>
</div>
<?php
    }
?>

<?php	
	//Check if page type
	if(is_page())
	{
		$page_show_footer_photostream = get_post_meta($post->ID, 'page_show_footer_photostream', true);
	}
	else
	{
		$page_show_footer_photostream = 0;
	}
	
	if(empty($page_show_footer_photostream))
	{
		//If display photostream
		$pp_photostream = get_option('pp_photostream');
		if(HOTELLER_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
		{
			$pp_photostream = 0;
		}
	
		if(!empty($pp_photostream) && $hoteller_homepage_style != 'fullscreen' && $hoteller_homepage_style != 'fullscreen_white' && $hoteller_homepage_style != 'split')
		{
			$photos_arr = array();
			
			$pp_photostream_rows = get_option('pp_photostream_rows');
			if(empty($pp_photostream_rows))
			{
				$pp_photostream_rows = 1;
			}
			$items = intval((10*$pp_photostream_rows)+10);
		
			if($pp_photostream == 'flickr')
			{
				$pp_flickr_id = get_option('pp_flickr_id');
				$photos_arr = hoteller_get_flickr(array('type' => 'user', 'id' => $pp_flickr_id, 'items' => $items));
			}
			else
			{
				$pp_instagram_username = get_option('pp_instagram_username');
				$pp_instagram_access_token = get_option('pp_instagram_access_token');
				$photos_arr = hoteller_get_instagram($pp_instagram_username, $pp_instagram_access_token, $items);
			}
			
			if(!empty($photos_arr))
			{
?>
<br class="clear"/>
<input type="hidden" id="tg_photostream" name="tg_photostream" value="<?php echo intval($pp_photostream); ?>"/>
<div id="footer_photostream" class="footer_photostream_wrapper ri-grid ri-grid-size-3">
	<h2 class="widgettitle photostream">
		<?php
			if($pp_photostream == 'instagram')
			{
		?>
			<a href="https://instagram.com/<?php echo esc_html($pp_instagram_username); ?>" target="_blank">
				<i class="fab fa-instagram marginright"></i><?php echo esc_html($pp_instagram_username); ?>
			</a>
		<?php
			}
			else
			{
		?>
			<i class="fab fa-flickr marginright"></i>Flickr
		<?php
			}
		?>
	</h2>
	<ul>
		<?php
			foreach($photos_arr as $photo)
			{
		?>
			<li><a target="_blank" href="<?php echo esc_url($photo['link']); ?>"><img src="<?php echo esc_url($photo['thumb_url']); ?>" alt="<?php echo esc_attr($photo['title']); ?>" /></a></li>
		<?php
			}
		?>
	</ul>
</div>
<?php
		}
	}
}
?>

<?php
//Check if page type
if(is_page())
{
	$page_show_copyright = get_post_meta($post->ID, 'page_show_copyright', true);
}
else
{
	$page_show_copyright = 0;
}

if(empty($page_show_copyright))
{
	//Get Footer Sidebar
	if(HOTELLER_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
	    $tg_footer_sidebar = 0;
	}
?>
<div class="footer_bar <?php if(isset($hoteller_homepage_style) && !empty($hoteller_homepage_style)) { echo esc_attr($hoteller_homepage_style); } ?> <?php if(!empty($hoteller_screen_class)) { echo esc_attr($hoteller_screen_class); } ?> <?php if(empty($tg_footer_sidebar)) { ?>noborder<?php } ?>">

	<div class="footer_bar_wrapper <?php if(isset($hoteller_homepage_style) && !empty($hoteller_homepage_style)) { echo esc_attr($hoteller_homepage_style); } ?>">
		<?php
			//Check if display social icons or footer menu
			$tg_footer_copyright_right_area = get_theme_mod('tg_footer_copyright_right_area', 'menu');
			
			if($tg_footer_copyright_right_area=='social')
			{
				if($hoteller_homepage_style!='flow' && $hoteller_homepage_style!='fullscreen' && $hoteller_homepage_style!='carousel' && $hoteller_homepage_style!='flip' && $hoteller_homepage_style!='fullscreen_video')
				{	
					//Check if open link in new window
					$tg_footer_social_link = get_theme_mod('tg_footer_social_link' ,true);
			?>
			<div class="social_wrapper">
			    <ul>
			    	<?php
			    		$pp_facebook_url = get_option('pp_facebook_url');
			    		
			    		if(!empty($pp_facebook_url))
			    		{
			    	?>
			    	<li class="facebook"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url($pp_facebook_url); ?>"><i class="fab fa-facebook"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_twitter_username = get_option('pp_twitter_username');
			    		
			    		if(!empty($pp_twitter_username))
			    		{
			    	?>
			    	<li class="twitter"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="http://twitter.com/<?php echo esc_attr($pp_twitter_username); ?>"><i class="fab fa-twitter"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_flickr_username = get_option('pp_flickr_username');
			    		
			    		if(!empty($pp_flickr_username))
			    		{
			    	?>
			    	<li class="flickr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Flickr" href="http://flickr.com/people/<?php echo esc_attr($pp_flickr_username); ?>"><i class="fab fa-flickr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_youtube_url = get_option('pp_youtube_url');
			    		
			    		if(!empty($pp_youtube_url))
			    		{
			    	?>
			    	<li class="youtube"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Youtube" href="<?php echo esc_url($pp_youtube_url); ?>"><i class="fab fa-youtube"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_vimeo_username = get_option('pp_vimeo_username');
			    		
			    		if(!empty($pp_vimeo_username))
			    		{
			    	?>
			    	<li class="vimeo"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Vimeo" href="http://vimeo.com/<?php echo esc_attr($pp_vimeo_username); ?>"><i class="fab fa-vimeo-square"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_tumblr_username = get_option('pp_tumblr_username');
			    		
			    		if(!empty($pp_tumblr_username))
			    		{
			    	?>
			    	<li class="tumblr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tumblr" href="http://<?php echo esc_attr($pp_tumblr_username); ?>.tumblr.com"><i class="fab fa-tumblr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_google_url = get_option('pp_google_url');
			    		
			    		if(!empty($pp_google_url))
			    		{
			    	?>
			    	<li class="google"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Google+" href="<?php echo esc_url($pp_google_url); ?>"><i class="fab fa-google-plus"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_dribbble_username = get_option('pp_dribbble_username');
			    		
			    		if(!empty($pp_dribbble_username))
			    		{
			    	?>
			    	<li class="dribbble"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Dribbble" href="http://dribbble.com/<?php echo esc_attr($pp_dribbble_username); ?>"><i class="fab fa-dribbble"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_linkedin_url = get_option('pp_linkedin_url');
			    		
			    		if(!empty($pp_linkedin_url))
			    		{
			    	?>
			    	<li class="linkedin"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Linkedin" href="<?php echo esc_url($pp_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			            $pp_pinterest_username = get_option('pp_pinterest_username');
			            
			            if(!empty($pp_pinterest_username))
			            {
			        ?>
			        <li class="pinterest"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Pinterest" href="http://pinterest.com/<?php echo esc_attr($pp_pinterest_username); ?>"><i class="fab fa-pinterest"></i></a></li>
			        <?php
			            }
			        ?>
			        <?php
			        	$pp_instagram_username = get_option('pp_instagram_username');
			        	
			        	if(!empty($pp_instagram_username))
			        	{
			        ?>
			        <li class="instagram"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Instagram" href="http://instagram.com/<?php echo esc_attr($pp_instagram_username); ?>"><i class="fab fa-instagram"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
			        	$pp_behance_username = get_option('pp_behance_username');
			        	
			        	if(!empty($pp_behance_username))
			        	{
			        ?>
			        <li class="behance"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Behance" href="http://behance.net/<?php echo esc_attr($pp_behance_username); ?>"><i class="fab fa-behance-square"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
					    $pp_500px_url = get_option('pp_500px_url');
					    
					    if(!empty($pp_500px_url))
					    {
					?>
					<li class="500px"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="500px" href="<?php echo esc_url($pp_500px_url); ?>"><i class="fab fa-500px"></i></a></li>
					<?php
					    }
					?>
					<?php
					     $pp_snapchat_url = get_option('pp_snapchat_url');
					     
					     if(!empty($pp_snapchat_url))
					     {
					 ?>
					 <li class="snapchat"><a <?php if(!empty($pp_snapchat_url)) { ?>target="_blank"<?php } ?> title="Snapchat" href="<?php echo esc_url($pp_snapchat_url); ?>"><i class="fab fa-snapchat-ghost"></i></a></li>
					 <?php
					     }
					 ?>
					<?php
					    $pp_tripadvisor_url = get_option('pp_tripadvisor_url');
					    
					    if(!empty($pp_tripadvisor_url))
					    {
					?>
					<li class="tripadvisor"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tripadvisor" href="<?php echo esc_url($pp_tripadvisor_url); ?>"><i class="fab fa-tripadvisor"></i></a></li>
					<?php
					    }
					?>
					<?php
					    $pp_yelp_url = get_option('pp_yelp_url');
					    
					    if(!empty($pp_yelp_url))
					    {
					?>
					<li class="yelp"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Yelp" href="<?php echo esc_url($pp_yelp_url); ?>"><i class="fab fa-yelp"></i></a></li>
					<?php
					    }
					?>
			    </ul>
			</div>
		<?php
				}
			} //End if display social icons
			else
			{
				if ( has_nav_menu( 'footer-menu' ) ) 
			    {
				    wp_nav_menu( 
				        	array( 
				        		'menu_id'			=> 'footer_menu',
				        		'menu_class'		=> 'footer_nav',
				        		'theme_location' 	=> 'footer-menu',
				        	) 
				    ); 
				}
			}
		?>
	    <?php
	    	//Display copyright text
	    	if (!function_exists('pll__')) {
	        	$tg_footer_copyright_text = get_theme_mod('tg_footer_copyright_text', '© Copyright');
	        }
	        else
	        {
		        $tg_footer_copyright_text = pll__(get_theme_mod('tg_footer_copyright_text', '© Copyright'));
	        }

	        if(!empty($tg_footer_copyright_text))
	        {
	        	echo '<div id="copyright">'.wp_kses_post(wp_specialchars_decode($tg_footer_copyright_text)).'</div><br class="clear"/>';
	        }
	    ?>
	</div>
</div>
<?php
	}
} //end if using footer sidebar as content
?>
</div>
<?php
    } //End if not blank template
?>

<?php
	//Check if display to top button
	$tg_footer_copyright_totop = get_theme_mod('tg_footer_copyright_totop', true);
	
	if(!empty($tg_footer_copyright_totop))
	{
?>
 	<a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
<?php
 	}
?>

<?php
    //Check if theme demo then enable layout switcher
    if(HOTELLER_THEMEDEMO)
    {	
?>
    <div id="option_wrapper">
    <div class="inner">
    	<div style="text-align:center">
	    	
	    	<div class="purchase_theme_button">
		    	<a class="button" href="https://themeforest.net/item/hoteller-hotel-booking-wordpress/22316029?ref=ThemeGoods" target="_blank">Purchase Theme $64 (1 - Time)</a>
	    	</div>
	    	
	    	<h4>Ready Sites</h2>
	    	<p>
	    		Here are example ready to use sites that can be imported within one click.
	    	</p>
	    	<?php
	    		$customizer_styling_arr = array( 
					array(
						'id'	=>	1, 
						'title' => 'Luxury Hotel', 
						'url' => hoteller_get_demo_url('luxury'),
					),
					array(
						'id'	=>	2, 
						'title' => 'City Hotel', 
						'url' => hoteller_get_demo_url('city'),
					),
					array(
						'id'	=>	3, 
						'title' => 'Mountain Hotel', 
						'url' => hoteller_get_demo_url('mountain'),
					),
					array(
						'id'	=>	4, 
						'title' => 'Beach Hotel', 
						'url' => hoteller_get_demo_url('beach'),
					),
					array(
						'id'	=>	5, 
						'title' => 'Apartment Hotel', 
						'url' => hoteller_get_demo_url('apartment'),
					),
					array(
						'id'	=>	6, 
						'title' => 'Cultural Hotel', 
						'url' => hoteller_get_demo_url('cultural'),
					),
					array(
						'id'	=>	7, 
						'title' => 'Boutique Hotel', 
						'url' => hoteller_get_demo_url('sites'),
					),
					array(
						'id'	=>	8, 
						'title' => 'Bed & Breakfast Hotel', 
						'url' => hoteller_get_demo_url('sites/bedandbreakfast'),
					),
				);
	    	?>
	    	<ul class="demo_list">
	    		<?php
	    			foreach($customizer_styling_arr as $customizer_styling)
	    			{
	    		?>
	    		<li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/xml/demo<?php echo esc_html($customizer_styling['id']); ?>/<?php echo esc_html($customizer_styling['id']); ?>.jpg" alt="<?php echo esc_attr($customizer_styling['title']); ?>"/>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6><?php echo esc_html($customizer_styling['title']); ?></h6>
	    	    	    		<a href="<?php echo esc_url($customizer_styling['url']); ?>" target="_blank" class="button white">Launch</a>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li>
	    		<?php
	    			}
	    		?>
	    		<!-- li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/more.png" alt="More Ready Sites are coming soon"/>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6>More Ready Sites are coming soon</h6>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li -->
	    	</ul>
	    	<br class="clear"/><br/>
	    	<h4>Multilingual Demos</h2>
		    	<p>
	    		Create multilingual website for your hotel easily using Free Polylang plugin. See example below.
	    	</p>
	    	<ul class="demo_list">
		    	<li>
		    		<a class="demo_lang" href="https://themes.themegoods.com/hoteller/polylang/" target="_blank">English</a>
		    	</li>
		    	<li>
		    		<a class="demo_lang" href="https://themes.themegoods.com/hoteller/polylang/it/" target="_blank">Italian</a>
		    	</li>
	    	</ul>
    	</div>
    </div>
    </div>
    <div id="option_btn">
    	<a href="javascript:;" class="demotip" title="Choose Theme Demos"><span class="ti-settings"></span></a>
    	
    	<a href="https://themegoods.com/contact/" class="demotip" title="Presale Question" target="_blank"><span class="ti-comment"></span></a>
    	
    	<a href="https://themes.themegoods.com/hoteller/landing/showcase" class="demotip" title="Showcase" target="_blank"><span class="ti-heart"></span></a>
    	
    	<a href="https://themes.themegoods.com/hoteller/landing/whats-new-in-3-0/" class="demotip" title="What's New" target="_blank"><span class="ti-bookmark"></span></a>
    	
    	<a href="https://docs.themegoods.com/docs/hoteller" class="demotip" title="Theme Documentation" target="_blank"><span class="ti-book"></span></a>
    	
    	<a href="https://1.envato.market/kGaqM" title="Purchase Theme" class="demotip" target="_blank"><span class="ti-shopping-cart"></span></a>
    </div>
<?php
    	wp_enqueue_script("hoteller-jquery-cookie", get_template_directory_uri()."/js/jquery.cookie.js", false, HOTELLER_THEMEVERSION, true);
    	wp_enqueue_script("tooltipster", get_template_directory_uri()."/js/jquery.tooltipster.min.js", false, HOTELLER_THEMEVERSION, true);
    	wp_enqueue_script("hoteller-demo", get_template_directory_uri()."/js/core/demo.js", false, HOTELLER_THEMEVERSION, true);
    }
?>

<?php
    $tg_frame = get_theme_mod('tg_frame', false);
    
    if(HOTELLER_THEMEDEMO && isset($_GET['frame']) && !empty($_GET['frame']))
    {
	    $tg_frame = 1;
    }
    
    if(!empty($tg_frame))
    {
?>
    <div class="frame_top"></div>
    <div class="frame_bottom"></div>
    <div class="frame_left"></div>
    <div class="frame_right"></div>
<?php
    }
?>

</div>

<?php
    $tg_enable_right_click = get_theme_mod('tg_enable_right_click', false);
    $tg_enable_right_click_content = get_theme_mod('tg_enable_right_click_content', false);

    if(!empty($tg_enable_right_click) && !empty($tg_enable_right_click_content))
    {
	    $tg_enable_right_click_content_text = get_theme_mod('tg_enable_right_click_content_text');
?>
    <div id="right_click_content">
	    <div class="right_click_content_table">
		    <div class="right_click_content_cell">
		    	<div><?php echo esc_html($tg_enable_right_click_content_text); ?></div>
	    	</div>
	    </div>
    </div>
<?php
    }
?>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
