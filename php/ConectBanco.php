<?php
	$mysql_host = getenv('MYSQLHOST');
	$mysql_port = getenv('MYSQLPORT'));
	$mysql_database = getenv('MYSQLDATABASE');
	$mysql_user = getenv('MYSQLUSER');
	$mysql_password = getenv('MYSQLPASSWORD');

	try{
		$conn = new PDO("mysql:host=$mysql_host; port=$mysql_port; dbname=$mysql_database", $mysql_user, $mysql_password);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>
