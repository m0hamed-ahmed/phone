<?php

$dsn  = "mysql:host=localhost;dbname=cart";
$name = "root";
$pass = "";

try
{
	$conn = new PDO($dsn,$name,$pass);
}
catch(PDOException $e)
{
	echo "Failed :" . $e->getMessage();
}