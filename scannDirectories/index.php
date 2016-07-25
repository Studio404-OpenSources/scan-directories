<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set("Asia/Tbilisi");

function __autoload($className) { 
	$parts = explode('\\', $className);
	$last = array_pop($parts);
	$pop = implode("/",$parts);
	$path = $pop.'/'.$last.'.php';
	if(file_exists($path)){
    	require $path;
	}else{
		echo "We Could not find $className !";
	}
}

define("DIR", $_SERVER['DOCUMENT_ROOT']);
define("LIB_FOLDER", "scannDirectories");

$options = array( 
	"SEND_EMAIL"=>true,
	"EMAILTO"=>"", /* Administrator's Email address */ 
	"EMAILTO_NAME"=>"Administrator", /* Administrator name */
	"EMAILFROM"=>"", /* Server's Email Address.. */ 
	"EMAILFROM_NAME"=>"", /* Server's name */
	"EMAIL_SUBJECT"=>"",  /* Email Subject */
	"IGNORE_FOLDERS"=>array(
		DIR."/".LIB_FOLDER /* Ignore folder/folders */
	),
	"DIR"=>DIR, 
	"HOMEPAGE"=>"/".LIB_FOLDER."/",
	"LIB_FOLDER"=>LIB_FOLDER,
	"JSON_FILE"=>sprintf("%s/%s/scan-result.json", DIR, LIB_FOLDER), 	
	"JSON_FILE_LOG"=>sprintf("%s/%s/log", DIR, LIB_FOLDER)	
); 

$bootstrap = new lib\lanch\bootstrap();
$bootstrap->index($options);
?>
