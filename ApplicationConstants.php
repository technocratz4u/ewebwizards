<?php
/**
 * This file defines the Global Constants of the Application.
 * This file should be placed in the Root Directory of the Application
 * since it uses 'realpath(dirname(__FILE__))' pointing to the root.
 */

/********************** Application Configuration Constants ************************/

/*** define the site path ***/
$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);

define ('__GALLERY_ROOT', "__gallery");
define ('__IMAGE_FOLDER', "image");
define ('__THUMB_FOLDER', "thumb");
define ('__ITEM_FOLDER', "item");
define ('__CATEGORY_FOLDER', "category");

define ('__FRONT_IMAGE_NAME', "front");
define ('__BACK_IMAGE_NAME', "back");
define ('__LEFT_IMAGE_NAME', "left");
define ('__RIGHT_IMAGE_NAME', "right");

define ('__THUMBNAIL_WIDTH_LIMIT', 200);
define ('__THUMBNAIL_HEIGHT_LIMIT', 200);

define ('__SESSION_KEY_USER_DATA', "USER_DATA");
define ('__SESSION_KEY_CART_DATA', "CART_DATA");
define ('__SESSION_KEY_ADMIN_DATA', "ADMIN_DATA");


define ('__ENV', "PRODUCTION");

if(__ENV=="PRODUCTION"){

	define ('__WEB_ROOT', "/technocratz");
	define ('__APPLICATION_NAME', "Ewebwizards");
	
	define ('__SERVER_NAME', "ewebwizards.com"); // to be changed during deployment
	
	define ('__APPLICATION_URL', "http://".__SERVER_NAME.__WEB_ROOT);
	//define ('__APPLICATION_URL', "http://www.".__SERVER_NAME.__WEB_ROOT);
	
	define ('__ORDER_STATUS_CREATED', "CREATED");
	define ('__ORDER_STATUS_PENDING', "PENDING");
	
	/**************************************************************************************/
	
	/********************** Database Constants ************************/
	define ('__APP_DB_HOST', "127.11.175.130");
	define ('__APP_DB_USER', "adminGfzWpWR");
	define ('__APP_DB_PSWD', "HPC1_L8mLRnW");
	define ('__APP_SCHEMA', "technocratz4u");
	/******************************************************************/
	
	/********************** Mailing Constants ************************/
	define ('__MY_MAIL_NAME', __APPLICATION_NAME);
	define ('__MY_MAIL_ID', "ewebwizards@gmail.com"); // Velvet Fitting Admin Email
	define ('__MY_SMTP_HOST', "ssl://smtp.gmail.com");
	define ('__MY_SMTP_PORT', 465);
	define ('__MY_SMTP_AUTH', true);
	define ('__MY_SMTP_USER', "ewebwizards@gmail.com");
	define ('__MY_SMTP_PSWD', "earnmoney");
	/******************************************************************/
	
	/********************** Paypal Constants ************************/
	define ('__PAYPAL_FORM_SUBMIT_URL', "https://www.sandbox.paypal.com/cgi-bin/webscr");
	define ('__PAYPAL_RETURN_URL', __APPLICATION_URL."/paypal/handlesuccess");
	define ('__PAYPAL_CANCEL_URL', __APPLICATION_URL."/paypal/handlecancel");
	define ('__PAYPAL_IPN_URL', __APPLICATION_URL."/paypal/handleipn");
	define ('__PAYPAL_SELLER_ACCOUNT', "technocratz4u.seller1@gmail.com");
	define ('__PAYPAL_SELLER_IDENTITY', "pIs7juYuGKmJzI7m-Bl-MV2e1I3Yc1MvRqRnZPQ95bgpsrgfwQyBUL2n3NG");
	
	/******************************************************************/
	
} else {
	define ('__WEB_ROOT', "");
	define ('__APPLICATION_NAME', "Technocratz4u");
	
	define ('__SERVER_NAME', "ubuntu-vbox"); // to be changed during deployment
	define ('__APPLICATION_URL', "http://".__SERVER_NAME.__WEB_ROOT);
	
	define ('__ORDER_STATUS_CREATED', "CREATED");
	define ('__ORDER_STATUS_PENDING', "PENDING");
	
	/**************************************************************************************/
	
	/********************** Database Constants ************************/
	define ('__APP_DB_HOST', "localhost");
	define ('__APP_DB_USER', "root");
	define ('__APP_DB_PSWD', "root");
	define ('__APP_SCHEMA', "technocratz");
	/******************************************************************/
	
	/********************** Mailing Constants ************************/
	define ('__MY_MAIL_NAME', __APPLICATION_NAME);
	define ('__MY_MAIL_ID', "ewebwizards@gmail.com"); // Velvet Fitting Admin Email
	define ('__MY_SMTP_HOST', "ssl://smtp.gmail.com");
	define ('__MY_SMTP_PORT', 465);
	define ('__MY_SMTP_AUTH', true);
	define ('__MY_SMTP_USER', "ewebwizards@gmail.com");
	define ('__MY_SMTP_PSWD', "earnmoney");
	/******************************************************************/
	
	/********************** Paypal Constants ************************/
	define ('__PAYPAL_FORM_SUBMIT_URL', "https://www.sandbox.paypal.com/cgi-bin/webscr");
	define ('__PAYPAL_RETURN_URL', __APPLICATION_URL."/paypal/handlesuccess");
	define ('__PAYPAL_CANCEL_URL', __APPLICATION_URL."/paypal/handlecancel");
	define ('__PAYPAL_IPN_URL', __APPLICATION_URL."/paypal/handleipn");
	define ('__PAYPAL_SELLER_ACCOUNT', "technocratz4u.seller1@gmail.com");
	define ('__PAYPAL_SELLER_IDENTITY', "pIs7juYuGKmJzI7m-Bl-MV2e1I3Yc1MvRqRnZPQ95bgpsrgfwQyBUL2n3NG");
	
	/******************************************************************/
		
}


?>