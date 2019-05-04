<?php
session_start();
header("Access-Control-Allow-Origin: *"); 
$host = "localhost";
$user = "root";
$password == "";
$db = "";
$email    = $_POST["email"];
$count;

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 $stmt = $conn->prepare("SELECT EMAIL FROM USERS WHERE EMAIL = ?");
 $stmt->bind_param("s",$email);

 $result = $stmt->execute();
 $row_count = mysqli_num_rows($result);

 echo $row_count;

?>