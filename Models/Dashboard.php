<?php
/*
File: Dashboard.php
Author: Logan Rasmussen
Date: 2/20/2016

Contains all the data for building the Dashboard's pages
Should be included in any page that needs a dashboard view
*/

class Dashboard {
	public $title;
	public $site_nav;
	public $tools_nav;

	public function __construct(){
		// Create data for common dashboard pages
		$this->title = "WebNet Tools";
		$this->site_nav = array(
			new NavLink("Home", "index.php")
		);
		$this->tools_nav = array(
			new NavLink("Scan Local IPs", "localnetwork.php")
		);
	}
}

class NavLink {
	public $text;
	public $url;

	public function __construct($text, $url = "#"){
		$this->text = $text;
		$this->url = $url;
	}
}
?>