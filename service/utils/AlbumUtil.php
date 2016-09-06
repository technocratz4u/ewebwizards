<?php

class AlbumUtil{
	
	
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
	
	public static function getImageDirectoryForCategory($categoryId){
		return $_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT.'/'.__IMAGE_FOLDER.'/'.__CATEGORY_FOLDER.'/'.$categoryId;
	}
	
	public static function getImageDirectoryForItem($itemId){
		return $_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT.'/'.__IMAGE_FOLDER.'/'.__ITEM_FOLDER.'/'.$itemId;
	}
	
	public static function getThumbForImage($folderDirectory){
		return str_replace($_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT.'/'.__IMAGE_FOLDER, 
						$_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT.'/'.__THUMB_FOLDER, 
						$folderDirectory);
	}
	
	public static function getImageForThumb($folderDirectory){
		return str_replace($_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT.'/'.__THUMB_FOLDER,
				$_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT.'/'.__IMAGE_FOLDER,
				$folderDirectory);
	}
	
	public static function getUrlForDirectory($folderDirectory){
		$folderUrl = str_replace($_SERVER["DOCUMENT_ROOT"].__WEB_ROOT.'/'.__GALLERY_ROOT, 
									__WEB_ROOT.'/'.__GALLERY_ROOT, 
									$folderDirectory);
		return $folderUrl;
	}
	
	public static function getImagesForItem($itemId){
		$imagesForItem = array();
		$imagesForItem["image_url"] = array();
		$imagesForItem["thumb_url"] = array();
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$imageNamesToFind = array(__FRONT_IMAGE_NAME, __BACK_IMAGE_NAME, __LEFT_IMAGE_NAME, __RIGHT_IMAGE_NAME);
		
		for($i = 0; $i < count($imageNamesToFind); $i++) {
			for($ii = 0; $ii < count($allowedExts); $ii++) {
				$baseDirectory = AlbumUtil::getImageDirectoryForItem($itemId);
				$fileNameSearching = $baseDirectory.'/'.$imageNamesToFind[$i].'.'.$allowedExts[$ii];
				//echo "fileNameSearching : ".$fileNameSearching." \n";
				if (file_exists($fileNameSearching)) {
					$imagesForItem["image_url"][$imageNamesToFind[$i]] = AlbumUtil::getUrlForDirectory($fileNameSearching);
					$imagesForItem["thumb_url"][$imageNamesToFind[$i]] = AlbumUtil::getUrlForDirectory(AlbumUtil::getThumbForImage($fileNameSearching));
					//echo "image_url : ".$imagesForItem["image_url"][$imageNamesToFind[$i]]."\n";
					//echo "image_url : ".$imagesForItem["thumb_url"][$imageNamesToFind[$i]]."\n";
					break;
				}
			}
		}
		
		return $imagesForItem;
	}
	
	public static function getImagesForCategory($categoryId){
		$imagesForItem = array();
		$imagesForItem["image_url"] = array();
		$imagesForItem["thumb_url"] = array();
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$imageNamesToFind = array(__FRONT_IMAGE_NAME, __BACK_IMAGE_NAME, __LEFT_IMAGE_NAME, __RIGHT_IMAGE_NAME);
	
		for($i = 0; $i < count($imageNamesToFind); $i++) {
			for($ii = 0; $ii < count($allowedExts); $ii++) {
				$baseDirectory = AlbumUtil::getImageDirectoryForCategory($categoryId);
				$fileNameSearching = $baseDirectory.'/'.$imageNamesToFind[$i].'.'.$allowedExts[$ii];
				//echo "fileNameSearching : ".$fileNameSearching." \n";
				if (file_exists($fileNameSearching)) {
					$imagesForItem["image_url"][$imageNamesToFind[$i]] = AlbumUtil::getUrlForDirectory($fileNameSearching);
					$imagesForItem["thumb_url"][$imageNamesToFind[$i]] = AlbumUtil::getUrlForDirectory(AlbumUtil::getThumbForImage($fileNameSearching));
					//echo "image_url : ".$imagesForItem["image_url"][$imageNamesToFind[$i]]."\n";
					//echo "image_url : ".$imagesForItem["thumb_url"][$imageNamesToFind[$i]]."\n";
					break;
				}
			}
		}
	
		return $imagesForItem;
	}

} /*** end of class ***/

?>