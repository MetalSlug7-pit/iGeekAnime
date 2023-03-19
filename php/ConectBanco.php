<?php
	$servername = "localhost";
	$user = "root";
	$pass = "Pedro@1569733";
	$dbname = "iGeekAnime";
	try{
		mysql -hcontainers-us-west-124.railway.app -uroot -pNgvY7wbKOzojXr4YLlcX --port 6833 --protocol=TCP railway;
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>
