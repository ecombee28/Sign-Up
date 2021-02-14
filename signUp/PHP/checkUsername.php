<?php

header("Access-Control-Allow-Origin: *"); 
$host = "localhost";
$user = "combeons_ecombee";
$password = "Jorden2009";
$db = "combeons_MainDatabase";

$connect = mysqli_connect($host, $user, $password, $db);

if ($connect->connect_error) {
   die("Connection failed: " . $connect->connect_error);
}
$username = $_POST["username"];
$count;


$query = "SELECT USERNAME FROM USERS WHERE USERNAME = '$username'";
$result = mysqli_query($connect, $query);

$row_count = mysqli_num_rows($result);

echo $row_count;

?>