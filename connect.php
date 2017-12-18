<?php
ob_start(); 
$host = "192.168.1.15";
$user = "sa";
$pwd = "sapwd";
$db = "hrfict"; 
global $link;
$link = array("Database"=>$db, "UID"=>$user , "PWD"=>$pwd , "MultipleActiveResultSets"=>true,"CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $host, $link);
if($conn)
	{
	//	echo "Database Connected.";
	}
	else
	{
		die( print_r( sqlsrv_errors(), true));
	}

?>
