<?php

class HtmlAttributeFilter{
	
	
	/**
	 *
	 * the constructor is set to private so
	 * so nobody can create a new instance using new
	 *
	 */
	private function __construct() {
		/*** maybe set the db name here later ***/
	}
	
	/**
	 *
	 * Like the constructor, we make __clone private
	 * so nobody can clone the instance
	 *
	 */
	private function __clone(){
	}
	
	public static function filter($data) {
	  $data = trim(str_replace("/", "__", $data));
	  return $data;
	}
	
} /*** end of class ***/

?>
