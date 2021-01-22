<!DOCTYPE html>
<html>
       <head>
       <meta charset="utf-8">
       <title>Registration</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       </head>
       <body>
       
       <?php
       include "../../../../components/navbar.php";

       require('../config/db-login.php');

       if (isset($_REQUEST['username'])){

       $username = stripslashes($_REQUEST['username']);
       $username = mysqli_real_escape_string($con, $username); 

       $password = stripslashes($_REQUEST['password']);
       $password = mysqli_real_escape_string($con, $password);
       
       $email = stripslashes($_REQUEST['email']);
       $email = mysqli_real_escape_string($con, $email);
               
       $query = "INSERT into `register` (username, email, password)
       VALUES ('$username', '$email', '".md5($password)."')";

       $result = mysqli_query($con,$query);

       if ($result) {
              echo "<div class='form'>
              <h3>You are registered successfully.</h3>
              <br/>Click here to <a href='./login.php'>Login</a></div>";
       }
}
       else {
?>

<div class="form">
       <h1>Registration</h1>
              
       <form name="registration" method="POST">
              <input type="text" name="username" placeholder="Username" required />
              <input type="email" name="email" placeholder="Email" required />
              <input type="password" name="password" placeholder="Password" required />
              <input type="submit" name="submit" value="Register" />
       </form>
</div>

<?php } ?>
</body>

</html>
