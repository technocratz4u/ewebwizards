<?php

class SqlInjectionFilter{
	
	
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
	  $data = trim(htmlentities(strip_tags($data)));
	  if (get_magic_quotes_gpc()){
	    $data = stripslashes($data);
	  }
	  //$data = mysql_real_escape_string($data);
	  return $data;
	}
	
} /*** end of class ***/

?>
