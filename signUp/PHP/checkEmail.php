<?php
session_start();
header("Access-Control-Allow-Origin: *"); 
$conn = mysqli_connect("localhost", "combeons_ecombee", "Jorden2009", "combeons_MainDatabase");
$email    = $_POST["email"];
$count;
//   $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
$query = "SELECT EMAIL FROM USERS WHERE EMAIL = '$email'";
$result = mysqli_query($conn, $query);

$row_count = mysqli_num_rows($result);

echo $row_count;

?>