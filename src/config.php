<?php

$dbconfig = array("local" => array(
						"host" => "localhost",
						"username" => "root",
						"password" => "root",
						"dbname" => "dogmash"
					),
					"azure" => array(
						"host" => "localhost;port=54063",
						"username" => "azure",
						"password" => "6#vWHD_$",// keine Ahnung
						"dbname" => "dogmash"
					)
				);

require_once("sql.php");

// Wenn es eine lokale Verbindung ist, soll die lokale Datenbankverbindung genutzt werden, sonst die azure
if($_SERVER['REMOTE_ADDR']=='127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
	define('ENV', 'local');
}
//echo $_SERVER['REMOTE_ADDR'];
//if(ENV == 'local') {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	//sql::connect($dbconfig["local"]["host"], $dbconfig["local"]["username"], $dbconfig["local"]["password"], $dbconfig["local"]["dbname"]);
/*} else {
	ini_set("error_reporting", "true");
	error_reporting(E_ALL|E_STRICT);
	*/sql::connect($dbconfig["azure"]["host"], $dbconfig["azure"]["username"], $dbconfig["azure"]["password"], $dbconfig["azure"]["dbname"]);
//}
?>
