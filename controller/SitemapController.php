<?php

Class SitemapController Extends BaseController {
	
	public function index() {
	
		$this->registry->template->show('sitemap');
	}
}

?>
