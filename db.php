<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "restaurant";
   
   
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {

	die("error in connection". mysqli_connect_error());

}

?>