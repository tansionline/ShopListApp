<!DOCTYPE html>
<html>
       <head>
       <meta charset="utf-8">
       <title>Login</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       </head>
<body>

<?php
       
       include "../../../../components/navbar.php";
       require('../config/db-login.php');
       session_start();

       if (isset($_POST['username'])){
       
       $username = stripslashes($_REQUEST['username']);
       $username = mysqli_real_escape_string($con, $username);
              
       $password = stripslashes($_REQUEST['password']);
       $password = mysqli_real_escape_string($con, $password);
       
       $query = "SELECT * FROM `register` WHERE username='$username'
       and password='".md5($password)."'";
      
       $result = mysqli_query($con, $query) or die(mysql_error());
       $check = mysqli_fetch_array($result);
       
       if (isset($check)) {    
       $_SESSION['username'] = $username;
       
       header("Location: ../panel/index.php");

}

       else {
       
       echo "<div class='form'>
       <h3>Username/password is incorrect.</h3>
       <br/>Click here to <a href='login.php'>Login</a></div>";
       }
    }

    else {
?>
       <div class="form">
       <h1>Log In</h1>

       <form action="" method="POST" name="login">
              <input type="text" name="username" placeholder="Username" required />
              <input type="password" name="password" placeholder="Password" required />
              <input name="submit" type="submit" value="Login" />
       </form>
       <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>

</body>
</html>
