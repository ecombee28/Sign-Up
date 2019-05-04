<?php

session_start();
header("Access-Control-Allow-Origin: *"); 
$host = "localhost";
$user = "root";
$password == "";
$db = "";
$username     = $_POST["username"];
$count;

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

$stmt = $conn->prepare("SELECT USERNAME FROM USERS WHERE USERNAME = ?");
$stmt->bind_param("s", $username);

$result = $stmt->execute();

$row_count = mysqli_num_rows($result);

echo $row_count;

?>