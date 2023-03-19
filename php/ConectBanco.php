<?php
	$servername = "localhost";
	$user = "root";
	$pass = "Pedro@1569733";
	$dbname = "iGeekAnime";
	try{
		$conn = new PDO("mysql:host=$servername; port=3306; dbname=$dbname", $user, $pass);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>
