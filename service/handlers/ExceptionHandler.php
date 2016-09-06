<?php

class ExceptionHandler{
	
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

	
	public static function logException($exception, $__db){
		$impactedUser=0;
		if(isset($_SESSION["userData"])==true){
			$impactedUser = $_SESSION["userData"]["user_id"];
		}
		$query = " INSERT INTO ".__MY_SCHEMA.".tbl_glbl_err_log(description, user_impacted, created_on, logged_by) ".
			" VALUES(:description, :user_impacted, now(), :logged_by)";
		$queryArgs = array(
				":description"=>"<stacktrace>\n".$exception->getTraceAsString()."\n</stacktrace>"."\n"."<message>\n".$exception->getMessage()."\n</message>",
				":user_impacted"=>$impactedUser,
				":logged_by"=>"APP"
		);
		$message = Database_util::executeStatement($__db, $query, $queryArgs);
	}
	

} /*** end of class ***/

?>
