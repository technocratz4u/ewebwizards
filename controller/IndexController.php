<?php

include __SITE_PATH . '/service/utils/AlbumUtil.php' ;
include __SITE_PATH . '/service/utils/UrlUtil.php' ;

class IndexController extends BaseController {
	public function index() {
		if(isset($_POST["LOGOUT_FLAG"]) && $_POST["LOGOUT_FLAG"]=="Y"){
			/*** destroy the current session from which logged out ***/
			session_destroy();
			/*** create a new session ***/
			session_start();
		}
		
		/*** load the index template ***/
		$homePageDetails = array();
		$this->registry->template->model = $homePageDetails;
		$this->registry->template->show('home');
	}
	

}

?>
