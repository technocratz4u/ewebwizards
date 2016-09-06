<?php

class DirectoryUtil{
	
	
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
	
	public static function getRecursiveDirectoryContents( $path , $level ){

		if(is_dir($path)){
			
			$ignore = array( 'cgi-bin', '.', '..' );
			// Directories to ignore when listing output. Many hosts
			// will deny PHP access to the cgi-bin.
			
			$dh = @opendir( $path );
			// Open the directory to the handle $dh
			
			while( false !== ( $file = readdir( $dh ) ) ){
				// Loop through the directory
			
				if( !in_array( $file, $ignore ) ){
					// Check that this file is not to be ignored
			
					if( is_dir( "$path/$file" ) ){
						// Its a directory, so we need to keep reading down...
			
						DirectoryUtil::getRecursiveDirectoryContents( "$path/$file", ($level+1) );
						// Re-call this same function but on a new directory.
						// this is what makes function recursive.
			
					} else {
			
						if(!array_key_exists("$path", $_REQUEST["GALLERY_STRUCT"])){
							$_REQUEST["GALLERY_STRUCT"]["$path"]=array();
							//$_REQUEST["CODE_TRAIL"] = CodeTrailHandler::appendTrail($_REQUEST["CODE_TRAIL"], "initialised ---- $path in GALLERY_STRUCT ___".count($_REQUEST["GALLERY_STRUCT"])."_____<br />");
						}
						$dirStrct["$path"][]=$file;
						$_REQUEST["GALLERY_STRUCT"]["$path"][]=$file;
						//$_REQUEST["CODE_TRAIL"] = CodeTrailHandler::appendTrail($_REQUEST["CODE_TRAIL"], "added ---- $file into GALLERY_STRUCT under $path  _____<br />");
			
					}
				}
			}
			
			closedir( $dh );
			// Close the directory handle
		}else{
			//$_REQUEST["CODE_TRAIL"] = CodeTrailHandler::appendTrail($_REQUEST["CODE_TRAIL"], "directory $path does not exist _____<br />");
		}
		
	}
	

	
	public static function getRecursiveDirectoryStructure($galleryHomeDir, $galleryHomeUrl){
		
		$_REQUEST["GALLERY_STRUCT"]=array();
		DirectoryUtil::getRecursiveDirectoryContents($galleryHomeDir, 0);
		
		$retVals = array();
		$retVals["galleryHomeDir"] = $galleryHomeDir;
		$retVals["galleryHomeUrl"] = $galleryHomeUrl;
		
		return $retVals;
	}
	
	public static function getDirectoryContents( $path , $level ){
	
		if(is_dir($path)){
				
			$ignore = array( 'cgi-bin', '.', '..' );
			// Directories to ignore when listing output. Many hosts
			// will deny PHP access to the cgi-bin.
				
			$dh = @opendir( $path );
			// Open the directory to the handle $dh
				
			while( false !== ( $file = readdir( $dh ) ) ){
				// Loop through the directory
					
				if( !in_array( $file, $ignore ) ){
					// Check that this file is not to be ignored
						
					if( is_dir( "$path/$file" ) ){
						// Its a directory, so do nothing since we don't need to read recursively...
					} else {
							
						if(!array_key_exists("$path", $_REQUEST["GALLERY_STRUCT"])){
							$_REQUEST["GALLERY_STRUCT"]["$path"]=array();
							//$_REQUEST["CODE_TRAIL"] = CodeTrailHandler::appendTrail($_REQUEST["CODE_TRAIL"], "initialised ---- $path in GALLERY_STRUCT ___".count($_REQUEST["GALLERY_STRUCT"])."_____<br />");
						}
						//$dirStrct["$path"][]=$file;
						$_REQUEST["GALLERY_STRUCT"]["$path"][]=$file;
						//$_REQUEST["CODE_TRAIL"] = CodeTrailHandler::appendTrail($_REQUEST["CODE_TRAIL"], "added ---- $file into GALLERY_STRUCT under $path  _____<br />");
							
					}
				}
			}
				
			closedir( $dh );
			// Close the directory handle
		}else{
			//$_REQUEST["CODE_TRAIL"] = CodeTrailHandler::appendTrail($_REQUEST["CODE_TRAIL"], "directory $path does not exist _____<br />");
		}
	
	}
	
	public static function getDirectoryStructure($galleryHomeDir, $galleryHomeUrl){
	
		$_REQUEST["GALLERY_STRUCT"]=array();
		DirectoryUtil::getDirectoryContents($galleryHomeDir, 0);
	
		$retVals = array();
		$retVals["galleryHomeDir"] = $galleryHomeDir;
		$retVals["galleryHomeUrl"] = $galleryHomeUrl;
	
		return $retVals;
	}
	
	public static function createPathRecursive($path) {
	    if (is_dir($path)) return true;
	    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
	    $return = DirectoryUtil::createPathRecursive($prev_path);
	    return ($return && is_writable($prev_path)) ? mkdir($path, 0755) : false;
	}
	
	
	

} /*** end of class ***/

?>
