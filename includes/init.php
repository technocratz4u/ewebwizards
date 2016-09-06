<?php

/*** include the controller class ***/
include __SITE_PATH . '/application/' . 'BaseController.class.php';

/*** include the registry class ***/
include __SITE_PATH . '/application/' . 'Registry.class.php';

/*** include the router class ***/
include __SITE_PATH . '/application/' . 'Router.class.php';

/*** include the template class ***/
include __SITE_PATH . '/application/' . 'Template.class.php';

include __SITE_PATH . '/service/handlers/ExceptionHandler.php' ;

/*** auto load model classes ***/
function __autoload($class_name) {
	$filename = $class_name . '.class.php';
	$file = __SITE_PATH . '/model/' . $filename;

	if (file_exists($file) == false)
	{
		return false;
	}
	include ($file);
}

/*** a new registry object ***/
$registry = new Registry();

/*** create the database registry object ***/
$registry->db = Database::getInstance();
?>
