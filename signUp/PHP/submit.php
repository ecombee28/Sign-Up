<?php

      session_start();
      header("Access-Control-Allow-Origin: *"); 
      $conn = mysqli_connect("localhost", "combeons_ecombee", "Jorden2009", "combeons_MainDatabase");

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      
      $username     = $_POST["username"];
      $email        = $_POST["email"];
      $password     = $_POST["password"];
      $to       = "ecombee28@gmail.com";
      $subject  = "Your Company";
      $message  = '<h1>Header message</h1>
                 <p>Main message body</p>';
      $headers  = "From: The Sender Name <your-email>\r\n";
      $headers .= "Reply-To: replyto@johnnyh.com\r\n";
      $headers .= "Content-type: text/html\r\n";

      $stmt = $conn->prepare("INSERT INTO USERS VALUES (DEFAULT,?, ?, ?)");
      $stmt->bind_param("sss", $username, $email, $password);

    if($stmt->execute())
    {
         mail($email, $subject, $message, $headers);
    }
    header("Location: https://combeecreations.com/signUp/"); 
?>
