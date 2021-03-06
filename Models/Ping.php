<?php
/*
File: Ping.php
Author: Logan Rasmussen
Date: 2/20/2016

Contains all the data for building the Dashboard's pages
Should be included in any page that needs a dashboard view
*/

class Ping {
	// array of output
	public $results;
	public $responses;
	public $info;

	public function __construct($ip){
		$this->responses = array();
		$this->info = array();

		$valid = filter_var($ip, FILTER_VALIDATE_IP);
		if(!$valid) {
			$valid = (preg_match('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/', $ip) == 1);
		}

		if($ip == "localhost"){
			exec("ping -c 4 localhost", $this->results);
		}
		elseif($valid !== false){
			exec("ping -c 4 ".escapeshellarg($ip), $this->results);
		}
		else {
			$this->info[] = "Invalid IP or invalid domain name.";
		}

		$this->parse_results();
	}

	public function parse_results(){
		if(is_array($this->results)){
			foreach($this->results as $line){
				$strings = preg_split('/\s+/',$line);
				if(array_key_exists(1,$strings)){
					if($strings[1] === 'bytes'){
						$this->responses[] = $line; //new Machine($strings[0], $strings[1])
					}
					else{
						$this->info[] = $line;
					}
				}
			}
		}
	}
}

class Response {
	public $ip;
	public $mac;

	public function __construct($ip, $mac){
		$this->ip = $ip;
		$this->mac = $mac;
	}
}
?>