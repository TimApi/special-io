
<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "root";
	$dbName = "thermometer";
	
	$conn = "mysql:host=$dbServername;dbname=$dbName;charset=utf8";
	$PDO = new PDO($conn, $dbUsername, $dbPassword);
?>
