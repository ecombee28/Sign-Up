<?php

session_start();
header("Access-Control-Allow-Origin: *"); 
$host = "localhost";
$user = "root";
$password == "";
$db = "";
$conn = mysqli_connect($host, $user, $password, $db);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }else{    
      $username     = $_POST["username"];
      $email        = $_POST["email"];
      $password     = $_POST["password"];
      $to       = "youremail@mail.com";
      $subject  = "Your Company";
      $message  = '<h1>Header message</h1>
                 <p>Main message body</p>';
      $headers  = "From: The Sender Name <youremail@mail.com>\r\n";
      $headers .= "Reply-To: youremail@mail.com\r\n";
      $headers .= "Content-type: text/html\r\n";

      $stmt = $conn->prepare("INSERT INTO USERS VALUES (DEFAULT,?, ?, ?)");
      $stmt->bind_param("sss", $username, $email, $password);

    if($stmt->execute())
    {
         mail($to, $subject, $message, $headers);
    }
    header("Location: http://combeecreation.com/signUp/HTML/index.html"); 
}
?>
