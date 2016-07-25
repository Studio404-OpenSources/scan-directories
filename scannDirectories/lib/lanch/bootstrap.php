<?php 
namespace lib\lanch;

if(!defined("DIR")){ exit(); }

class bootstrap{

	public function index($options){
		$request = new \lib\functions\request(); 
		$page = $request->method("GET", "page");
		switch($page){
			case "create-file":
				/* Get All Files And Folders */
				$get_all_folders_files = new \lib\functions\get_all_folders_files();
				$folder_files_array = $get_all_folders_files->index($options);
				/* Create Json File */
				$create_json_file = new \lib\functions\create_json_file();	
				$create_json_file->index($options, $folder_files_array);
				/* Go To Homepage */
				@include("lib/render/filecreated.php");
				break;
			case "check-file":
				/* Get All Files And Folders */
				$get_all_folders_files = new \lib\functions\get_all_folders_files();
				$nowArray = $get_all_folders_files->index($options);
				if(file_exists($options['JSON_FILE'])){
					$oldJson = json_decode(file_get_contents($options['JSON_FILE']), true);
				}else{
					$oldJson = array();
				}
				@include("lib/render/check.php");
				break;
			default:
				/* Get All Files And Folders */
				$get_all_folders_files = new \lib\functions\get_all_folders_files();
				$folder_files_array = $get_all_folders_files->index($options);
				@include("lib/render/show.php");
				break;
		}
		
	}
}
?>