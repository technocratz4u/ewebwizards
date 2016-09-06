<?php

class Database_util{
	
	const STMNT_EXCTN_SCSS = "SUCCESS";
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
	 * Runs a query using the current connection to the database.
	 *
	 * @param PDO dbCon
	 * @param string query
	 * @param array $args An array of arguments for the sanitization such as array(":name" => "foo")
	 * @return array Containing all the remaining rows in the result set.
	 */
	public static function fetchResults($dbCon, $query, $args){
		$results;
		$sth = $dbCon->prepare($query);
		
		if(empty($args)){
			$sth->execute();
		}
		else{
			$sth->execute($args);
		}
		
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$results = $sth->fetchAll();
			
		return $results;
	}
	
	/**
	 * Runs a query using the current connection to the database.
	 *
	 * @param PDO dbCon
	 * @param string query
	 * @param array $args An array of arguments for the sanitization such as array(":name" => "foo")
	 * @return the statement to execute to get the resultsets.
	 */
	public static function fetchStatementForProc($dbCon, $query, $args){
		$sth;
		$sth = $dbCon->prepare($query);
			
		if(empty($args)){
			$sth->execute();
		}
		else{
			$sth->execute($args);
		}
			
		$sth->setFetchMode(PDO::FETCH_ASSOC);
			
		return $sth;
	}
	
	/**
	 * Executes a statement using the current connection to the database.
	 *
	 * @param PDO dbCon
	 * @param string query
	 * @param array $args An array of arguments for the sanitization such as array(":name" => "foo")
	 * @return string Containing the success message.
	 */
	public static function executeStatement($dbCon, $query, $args){
			$sth = $dbCon->prepare($query);
				
			if(empty($args)){
				$sth->execute();
			}
			else{
				$sth->execute($args);
			}
				
		return Database_util::STMNT_EXCTN_SCSS;
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
