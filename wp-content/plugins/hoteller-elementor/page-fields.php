<?php

/**
 * The PHP code for setup Theme page custom fields.
 */

function hoteller_page_create_meta_box() {

	$hoteller_page_postmetas = hoteller_get_page_postmetas();
	
	if ( function_exists('add_meta_box') && isset($hoteller_page_postmetas) && count($hoteller_page_postmetas) > 0 ) {  
		add_meta_box( 'page_metabox', 'Page Options', 'hoteller_page_new_meta_box', 'page', 'normal', 'default' );  
	}

}  

function hoteller_page_new_meta_box() {
	$post = hoteller_get_wp_post();
	$hoteller_page_postmetas = hoteller_get_page_postmetas();

	echo '<input type="hidden" name="pp_meta_form" id="pp_meta_form" value="' . wp_create_nonce('hoteller_once') . '" />';
	
	$meta_section = '';
	$key = 0;
	foreach ( $hoteller_page_postmetas as $key => $postmeta ) {

		$meta_id = $postmeta['id'];
		$meta_title = $postmeta['title'];
		$meta_description = $postmeta['description'];
		$meta_section = $postmeta['section'];
		
		$meta_type = '';
		if(isset($postmeta['type']))
		{
			$meta_type = $postmeta['type'];
		}
		
		echo '<div id="page_option_'.strtolower($postmeta['id']).'" class="pp_meta_option page key'.intval($key+1).' '.$meta_type.'">';
		echo "<div class=\"meta_title_wrapper\">";
		echo "<strong>".$meta_title."</strong>";
		
		echo "<div class='pp_widget_description'>$meta_description</div>";
		
		echo "</div>";
		echo "<div class=\"meta_title_field\">";

		if ($meta_type == 'checkbox') {
			$checked = get_post_meta($post->ID, $meta_id, true) == '1' ? "checked" : "";
			echo "<input type='checkbox' name='$meta_id' id='$meta_id' class='iphone_checkboxes' value='1' $checked />";
		}
		else if ($meta_type == 'select') {
			echo "<select name='$meta_id' id='$meta_id'>";
			
			if(!empty($postmeta['items']))
			{
				foreach ($postmeta['items'] as $key => $item)
				{
					$page_style = get_post_meta($post->ID, $meta_id);
				
					if(isset($page_style[0]) && $key == $page_style[0])
					{
						$css_string = 'selected';
					}
					else
					{
						$css_string = '';
					}
				
					echo '<option value="'.$key.'" '.$css_string.'>'.$item.'</option>';
				}
			}
			
			echo "</select>";
		}
		else if ($meta_type == 'file') { 
		    echo "<input type='text' name='$meta_id' id='$meta_id' class='' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:calc(100% - 75px)' /><input id='".$meta_id."_button' name='".$meta_id."_button' type='button' value='Upload' class='metabox_upload_btn button' readonly='readonly' rel='".$meta_id."' style='margin:0 0 0 5px' />";
		}
		else if ($meta_type == 'textarea') { 
			echo "<textarea name='$meta_id' id='$meta_id' class='' style='width:100%' rows='7'>".get_post_meta($post->ID, $meta_id, true)."</textarea>";
		}
		else {
			echo "<input type='text' name='$meta_id' id='$meta_id' class='' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:100%' />";
		}
		
		echo '</div>';
		echo '</div>';
	}

}

function hoteller_page_save_postdata( $post_id ) {

	$hoteller_page_postmetas = hoteller_get_page_postmetas();

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	if ( isset($_POST['pp_meta_form']) && !wp_verify_nonce( $_POST['pp_meta_form'], 'hoteller_once' )) {
		return $post_id;
	}

	// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	// Check permissions

	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}

	// OK, we're authenticated

	if ( $parent_id = wp_is_post_revision($post_id) )
	{
		$post_id = $parent_id;
	}
	
	if (isset($_POST['pp_meta_form'])) 
	{
	
		foreach ( $hoteller_page_postmetas as $postmeta ) 
		{
		
			if (isset($_POST[$postmeta['id']]) && $_POST[$postmeta['id']]) {
				hoteller_page_update_custom_meta($post_id, $_POST[$postmeta['id']], $postmeta['id']);
			}
	
			if (isset($_POST[$postmeta['id']]) && $_POST[$postmeta['id']] == "") {
				delete_post_meta($post_id, $postmeta['id']);
			}
			
			if (!isset($_POST[$postmeta['id']])) {
				delete_post_meta($post_id, $postmeta['id']);
			}
		}
	}

}

function hoteller_page_update_custom_meta($postID, $newvalue, $field_name) {

	if (isset($_POST['pp_meta_form'])) 
	{
		if (!get_post_meta($postID, $field_name)) {
			add_post_meta($postID, $field_name, $newvalue);
		} else {
			update_post_meta($postID, $field_name, $newvalue);
		}
	}

}

//init

add_action('admin_menu', 'hoteller_page_create_meta_box'); 
add_action('save_post', 'hoteller_page_save_postdata');  

/*
	End creating custom fields
*/

?>
