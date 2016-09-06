<?php

class Database{

	private static $db_host = __APP_DB_HOST;
	private static $db_name	= __APP_SCHEMA;
	private static $db_user	= __APP_DB_USER;
	private static $db_pwsd	= __APP_DB_PSWD;

	/*** Declare instance ***/
	private static $instance = NULL;

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

	/**
	 *
	 * Return DB instance or create intitial connection
	 *
	 * @return object (PDO)
	 *
	 * @access public
	 *
	 */
	public static function getInstance() {

		if (!self::$instance)
		{
			try{
				self::$instance = new PDO("mysql:host=".Database::$db_host.";"."dbname=".Database::$db_name, Database::$db_user, Database::$db_pwsd);
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $pe){
				die('Connection error, because: ' .$pe->getMessage());
			}
		}
		return self::$instance;
	}
	
	/**
	 * Runs a query using the current connection to the database.
	 *
	 * @param PDO dbCon
	 * @param string query
	 * @param array $args An array of arguments for the sanitization such as array(":name" => "foo")
	 * @return array Containing all the remaining rows in the result set.
	 */
	public static function fetchResults($dbCon, $query, $args){
		$results;
		try{
			$sth = $dbCon->prepare($query);
			
			if(empty($args)){
				$sth->execute();
			}
			else{
				$sth->execute($args);
			}
			
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$results = $sth->fetchAll();
			
		} catch (PDOException $e) {
			echo 'Query failed: ' . $e->getMessage();
			echo '<br />Query : ' . $query;
		}
		return $results;
	}

	/**
	 * Returns the last inserted ID
	 * 
	 * @param PDO dbCon
	 * @return int ID of the last inserted row
	 */
	public function lastInsertId($dbCon){
		return $dbCon->lastInsertId();
	}


} /*** end of class ***/

?>
