<?php 
namespace lib\functions;

if(!defined("DIR")){ exit(); }

class create_json_file{
	public function index($options, $array){
		$jsonData = json_encode($array);
		file_put_contents($options["JSON_FILE"], $jsonData);
	}
}
?>