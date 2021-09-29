<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    

         // When form submitted, insert values into the database.
    
    if (isset($_REQUEST['username'])) 
   {
        // removes backslashes
        $count=null;
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
         // escape string before passing it to query.
         $query    = "SELECT * FROM `user` WHERE username='$username'";
                       $result = mysqli_query($con, $query) or die(mysqli_error($con));
                       $rows = mysqli_num_rows($result);
                       $count=$rows;
                       if ($rows == 1) {
                           
                           
                        echo"<div class='form'>
                        <h3>User already Exists </h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a></p>
                        </div>";
                       } 
       
       else if($count==0)
       {
            $query    = "INSERT into `user` (Email, Username, password)
                     VALUES ('$email', '$username', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } }else
     {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>