<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="styles.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="Scripts/login.js"></script>
  </head>
  
  <body>
  <div id="signupForm">
      <form action="signup.php" method="post"><center>
        <input type="email" id="mail" placeholder="Email" name="mail" required/><br/><br/>
        <input type="password" id="password" placeholder="Password" name="password" required/><br/><br/>
        <input type="submit" id="signup" name="signup" value="SIGN UP FOR FREE" /><br /><br/><br/>
        Already have an account? <a href="login.php">Login</a><br/></center>
      </form>
    </div>
  </body>
</html>

<?php
  if(isset($_POST["signup"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "websites";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $name=$_POST['mail'];
    $password=$_POST['password'];
   

    $sql = "SELECT mail FROM users where mail='$name'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      echo "<center style='color:red;'>Email Already Exist!</center>";
    } else {
      
      $sql = "INSERT INTO users(mail,password) VALUES('$name', '$password')";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<script type='text/javascript'>document.location.href='login.php';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . 'login.php' . '">';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      $conn->close();

    }
  }
?>