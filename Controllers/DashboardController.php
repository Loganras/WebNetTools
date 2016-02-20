<?php
/*
dashboard.php
Author: Logan Rasmussen
Date: 2/20/2016
*/

require_once "Models/Dashboard.php";

class DashboardController {
	private $dashboard;

	public function __construct{
		$dashboard = new Dashboard();
	}

	public function start(){
		include "Views/dashboard/begin.html";
		include "Views/dashboard/end.html";
	}
}
?>