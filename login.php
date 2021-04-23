<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="styles.css"/>
    <script src="Scripts/login.js"></script>
  </head>
  
  <body>
  
  <div id="loginForm">
      <form action="login.php" method="post"><center>
        <input type="text" id="mail" placeholder="Email" name="id" required/><br/><br />
        <input type="password" id="password" placeholder="Password" name="password" required>
        <br /><br />
        <input type="checkbox" id="keeplog" value="keeplog"/>
        <label for="keeplog"> Keep me logged in. </label>
        <a href="forgotPassword.html">Forgot password?</a><br /><br/>
        <input type="submit" id="login" value="LOGIN" name='login'/><br /><br/><br/>
        Don't have an account? <a href="signup.php">Sign Up</a><br/></center>
      </form>
    </div>
  </body>
</html>
<?php
  if(isset($_POST["login"])) {
    $id=$_POST["id"];
    $pwd=$_POST["password"];

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
    $sql = "SELECT * FROM users where mail='$id' and password = '$pwd'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      echo "<b><center style='color:green;'>Login Successful</center></b>";
      header("Location: home.php");
    } else {
      echo "<center style='color:red;'>Wrong username/password</center>";
    }
    $conn->close();
  }
?>
