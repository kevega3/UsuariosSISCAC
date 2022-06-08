<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_siscac";

$mysqli = new mysqli("$servername","$username","$password","$dbname");
$mysqli->set_charset("utf8");

if ($mysqli -> connect_errno) {
	echo "<script> alert('Database error!');</script>";
	echo "<script>location.replace('../index.php')</script>";
}

try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Ocurrio un error en la conexión: ".$e->getMessage();
}

?> 