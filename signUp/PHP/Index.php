<?php

      session_start();
      header("Access-Control-Allow-Origin: *"); 
      $host = "localhost";
      $user = "combeons_ecombee";
      $password == "Jorden2009";
      $db = "combeons_MainDatabase";

      $conn = mysqli_connect($host, $user, $password, $db);

     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }

      if(isset($_POST["submit"]))
   {
        $username     = $_POST["username"];
        $email        = $_POST["email"];
        $password     = $_POST["password"];
        $to       = "ecombee28@gmail.com";
        $subject  = "Your Company";
        $message  = '<h1>Header message</h1>
                   <p>Main message body</p>';
        $headers  = "From: The Sender Name <ericcombee@combeecreation.com>\r\n";
        $headers .= "Reply-To: ecombee28@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
  
        $stmt = $conn->prepare("INSERT INTO USERS VALUES (DEFAULT,?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
  
      if($stmt->execute())
      {
           mail($to, $subject, $message, $headers);
      }

      
  }

?>




<!DOCTYPE html>
<html>

        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Movie Gallery</title>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
                <link href="https://fonts.googleapis.com/css?family=Alice|Permanent+Marker" rel="stylesheet">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                <link rel="stylesheet" type="text/css" href="./CSS/style.css" />
                
            </head>
<body>
        <div class="container">
                <div class="banner">
                    <h1>Sign Up</h1>
                    <p>Sign up for your free account today and enjoy
                        all that we have to offer. </p>
                </div>
                <div id="warningMess" class="warningMess">warning</div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                            
                          </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label><label>hi</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          </div>
                         
                          <button type="submit" class="btn btn-primary submitBtn" name = "submit" disabled>Submit</button>
        
                </form>
            </div>
        <script>
            
           
        </script>
</body>
</html>