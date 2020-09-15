<?php

namespace MPHBW\Settings;

class MainSettings {

	/**
	 *
	 * @return int
	 */
	public function getProductId(){
		return (int) get_option( 'mphbw_product_id', 0 );
	}

	/**
	 *
	 * @return false
	 */
	public function isUseRedirect(){
		return (bool) get_option( 'mphbw_use_redirect' );
	}

	/**
	 *
	 * @return boolean
	 */
	public function isHideIfOnlyOne(){
		return (bool) get_option( 'mphbw_hide_only_one', true );
	}

}
