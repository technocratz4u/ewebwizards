<?php

 /* if ($_SERVER['HTTP_HOST'] != 'ubuntu-vbox'){
 	header("HTTP/1.1 301 Moved Permanently");
 	header("Location: http://ubuntu-vbox".$_SERVER['REQUEST_URI']);
 } */


/*** error reporting on ***/
ini_set("error_reporting", E_ALL & ~E_STRICT);
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", "auth_st_error.log");

/*** Global Error Handler defined ***/
include 'GlobalErrorHandler.php';

$global_error_handler = set_error_handler("glblErrorHandler");

/********** start session **********/
session_start();

/*** include the ApplicationConstants.php file ***/
include 'ApplicationConstants.php';

/*** include the init.php file ***/
include 'includes/init.php';

/*** load the router ***/
$registry->router = new Router($registry);

/*** set the controller path ***/
$registry->router->setPath (__SITE_PATH . '/controller');

/*** load up the template ***/
$registry->template = new Template($registry);

/*** load the controller ***/
$registry->router->loader();

?>
